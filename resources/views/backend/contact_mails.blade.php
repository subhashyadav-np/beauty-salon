@extends('layouts.backend', ['title' => 'Customer Mails'])


@section('content')
<div class="row">
    <div class="col-12">
        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>#SN</th>
                    <th>Customer</th>
                    <th>Message</th>
                    <th>Send On</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($CusMails as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->customer}}</td>
                        <td>{{$item->message}}</td>
                        <td>
                            {{$item->created_at}}
                        </td>
                        <td>
                            @if ($item->status == "un-read")
                                <a onclick="return confirm('Did you read this message?')" href="{{route('markMailAsRead',['id'=>$item->id])}}"><span class="badge badge-primary">Mark As Read</span></a>
                            @endif
                            @if ($item->status == "read")
                                <span class="badge badge-success">Read</span>
                            @endif
                        </td>
                        <td style="display: flex; justify-content: space-around; align-items:center;">
                            <a href="mailto:{{$item->email}}" class="btn btn-info btn-sm">
                                <span class="fa fa-envelope"></span>
                            </a>
                            <a href="tel:{{$item->phone}}" class="btn btn-success btn-sm">
                                <span class="fa fa-phone"></span>
                            </a>
                            <a onclick="return confirm('Are you sure delete this message?')" href="{{route('ContactMailDelete',['id'=>$item->id])}}" class="btn btn-danger btn-sm">
                                <span class="fa fa-trash-alt"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection