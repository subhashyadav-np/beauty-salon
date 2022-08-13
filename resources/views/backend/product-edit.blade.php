@extends('layouts.backend', ['title' => 'Edit Products'])

@section('styles')
    <link href="{{ asset('backend/libs/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <style>
    #discount_box.removed{
        display: none;
    }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <!--Form-->
        <form action="{{route('product.update',['product'=>$productData->id])}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-xl-8">
                    <div class="form-group row">
                        <h5 class="col-12 mt-0 font-14">Product Title</h5>
                        <div class="col-12">
                            <input type="text" class="form-control" name="title" value="{{$productData->title}}" id="productTitle"
                                placeholder="write title here..." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <h5 class="col-12 mt-0 font-14">Product Category</h5>
                        <div class="col-12">
                            <select class="form-control" name="cat_id" required id="productCategory">
                                <option value="{{$productData->catID}}">{{$productData->catParent}} - {{$productData->catName}}</option>
                                @foreach ($Cats as $item)
                                    <option value="{{$item->id}}">{{$item->if_has_parent}} @if ($item->if_has_parent != NULL) - @endif {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <h5 class="mt-0 font-14">Product Description</h5>
                            <textarea class="form-control" name="productDesc" id="productDesc" rows="8" placeholder="write product dscription here..." required>{{$productData->description}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="form-group row">
                        <h5 class="col-12 mt-0 font-14">Price</h5>
                        <div class="col-12">
                            <input type="number" class="form-control" name="price" value="{{$productData->price}}" id="price"
                                placeholder="enter the price of product" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <h5 class="col-12 mt-0 font-14">Discount</h5>
                        <div class="col-12">
                            <select class="form-control" id="discountChooser">
                                @if ($productData->discount != NULL)
                                    <option value="yes">Yes</option>
                                @endif
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row @if ($productData->discount == NULL) removed @endif " id="discount_box">
                        <h5 class="col-12 mt-0 font-14">Discount%</h5>
                        <div class="col-12">
                            <input type="number" class="form-control" value="{{$productData->discount}}" name="discount" id="discount" placeholder="enter discount percent">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <h5 class="mt-0 font-14">Meta Description</h5>
                            <textarea class="form-control" name="meta_desc" id="metaDesc" rows="4"
                                placeholder="write blog meta description..." required>{{$productData->meta_desc}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <h5 class="col-12 mt-0 font-14">Product Tags</h5>
                        <div class="col-12">
                            <input type="text" class="form-control" name="keywords" value="{{$productData->keywords}}" id="blogTags"
                                placeholder="separate tags with comma" required data-role="tagsinput">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <h5 class="mt-0 font-14">Product Cover</h5>
                            <input type="file" class="filestyle" data-btnClass="btn-primary" name="cover">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success waves-effect waves-light">Update Product</button> 
        </form>
    </div>
</div>
@endsection


@section('scripts')
<script type="text/javascript" src="{{ asset('backend/libs/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('backend/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('backend/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js') }}"></script>

<script type="text/javascript">
    CKEDITOR.replace('productDesc');
    $(document).ready(function() {
        $('#discountChooser').change(function() {
            if(this.value == "yes") {
                $('#discount_box').removeClass("removed");
            }else {
                $('#discount_box').addClass("removed");
                $('#discount').val('')
            }
        })
    })
</script>

@endsection
