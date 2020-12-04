@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard FAQ Page -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Staff Information</h2>
                                        <a href="{!! url('admin/staffs') !!}" class="add-newProduct-btn"><i class="fa fa-arrow-left"></i> back</a>
                                    </div>
                                    <div class="table-responsive order-details-table">
                                        <table class="table">
                                            <tr>
                                                <th>Staff ID#</th>
                                                <td>{{$staff->id}}</td>
                                            </tr>
                                            <tr>
                                                <th>Staff Photo</th>
                                                <td><img style="width: 300px;" src="{{url('/')}}/assets/images/admin/{{$staff->photo}}" alt="No Photo Found"></td>
                                            </tr>
                                            <tr>
                                                <th>Staff Name:</th>
                                                <td>{{$staff->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Staff Role:</th>
                                                <td>{{ucfirst($staff->role)}}</td>
                                            </tr>
                                            <tr>
                                                <th>Staff Email:</th>
                                                <td>{{$staff->email}}</td>
                                            </tr>
                                            <tr>
                                                <th>Staff Phone:</th>
                                                <td>{{$staff->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th>Joined:</th>
                                                <td>{{$staff->created_at->diffForHumans()}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard FAQ Page -->

                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop