@extends('layouts.backend', ['title' => 'All Products'])

@section('content')

<div class="row">
        <div class="col-12">
            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>#SN</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Avtar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Product as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->catParent }}, {{ $item->catName }}</td>
                        <td>Rs 
                            @if ($item->discount == NULL)
                                {{ $item->price }}
                            @else
                                <strike>{{ $item->price }}</strike>&nbsp;{{ $item->price - ($item->price * $item->discount)/100 }} ({{$item->discount}}% off)
                            @endif
                        </td>
                        <td><a href="#">
                            @if ($item->status == "in-stock")
                                <span class="badge badge-primary">In Stock</span>
                            @endif
                            @if ($item->status == "out-of-stock")
                                <span class="badge badge-danger">Out Of Stock</span>
                            @endif
                        </a></td>
                        <td>
                            <div class="table-img flex-center">
                                <img src="{{ asset('images/products/' .$item->cover) }}" />
                            </div>
                        </td>
                        <td style="display: flex; flex-direction:row; justify-content: space-around; align-items:center;">
                            <a href="{{route('product.edit',['product'=>$item->slug])}}" class="btn btn-info btn-sm">
                                <span class="fa fa-edit"></span>
                            </a>
                            <form style="display: inline;" action="{{route('product.destroy',['product'=>$item->id])}}" method="POST">
                                @method('delete')
                                    <button type="submit" onclick="return confirm('Are you sure to delete this product?')" class="btn btn-danger btn-sm">
                                        <span class="fa fa-trash-alt"></span>
                                    </button>
                                @csrf
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12 my-3">
            <a href="{{route('product.create')}}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Add Product
            </a>
        </div>
    </div>
    <!-- end row -->

@endsection


@section('scripts')
<script>
    
</script>
@endsection
