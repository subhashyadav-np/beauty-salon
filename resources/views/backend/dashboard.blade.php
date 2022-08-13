@extends('layouts.backend', ['title' => 'Dashboard'])

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h4 class="header-title mb-3">Recent Appointments!</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>#SN</th>
                    <th>Customer</th>
                    <th>Type</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($AppointsData as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->customer}}</td>
                        <td>
                            @if ($item->visited_before == "no")
                                New Customer
                            @endif
                            @if ($item->visited_before == "yes")
                                Returning Customer
                            @endif
                        </td>
                        <td>
                            {{$item->service}}
                        </td>
                        <td>{{$item->appointDate}}</td>
                        <td>
                            @if ($item->status == "visited")
                                <span class="badge badge-success">Visited</span>
                            @endif
                            @if ($item->status == "not-visited")
                                <a onclick="return confirm('Are you sure the customer is visited to shop?')" href="{{route('markAppointVisited',['id'=>$item->id])}}"><span class="badge badge-danger">Not Visited</span></a>
                            @endif
                        </td>
                        <td style="display: flex; justify-content: space-around; align-items:center;">
                            <a href="mailto:{{$item->email}}" class="btn btn-info btn-sm">
                                <span class="fa fa-envelope"></span>
                            </a>
                            <a href="tel:{{$item->phone}}" class="btn btn-success btn-sm">
                                <span class="fa fa-phone"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="row my-4">
    <div class="col-12">
        <div>
            <h4 class="header-title mb-3">Recent Unread Messages!</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table id="responsive-datatable-2" class="table table-bordered table-bordered dt-responsive nowrap"
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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
