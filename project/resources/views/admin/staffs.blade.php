@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard orders data-table area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box customers">
                                    <div class="add-product-header">
                                        <h2>Staff</h2>
                                        <a href="{!! url('admin/staffs/create') !!}" class="add-newProduct-btn"><i class="fa fa-plus-circle"></i> Add New Staff</a>
                                    </div>
                                    <hr/>
                                    <div class="table-responsive">
                                        <div id="response" class="col-md-12">
                                            @if(Session::has('message'))
                                                <div class="alert alert-success alert-dismissable">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    {{ Session::get('message') }}
                                                </div>
                                            @endif
                                        </div>
                                        <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Staff Name</th>
                                                <th width="10%">Email</th>
                                                <th>Phone</th>
                                                <th width="10%">Role</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($staffs as $staff)
                                                <tr>
                                                    <td>{{$staff->name}}</td>
                                                    <td>{{$staff->email}}</td>
                                                    <td>{{$staff->phone}}</td>
                                                    <td>{{ucfirst($staff->role)}}</td>
                                                    <td>
                                                        @if($staff->status == 1)
                                                            Active
                                                        @else
                                                            Banned
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form method="POST" action="{!! action('StaffController@destroy',['id' => $staff->id]) !!}">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <a href="staffs/{{$staff->id}}" class="btn btn-primary product-btn"><i class="fa fa-check"></i> View Details </a>
                                                            {{--@if($staff->status != 0)--}}
                                                                {{--<a href="customers/status/{{$staff->id}}/0" class="btn btn-danger product-btn"><i class="fa fa-toggle-off"></i> Ban</a>--}}
                                                            {{--@else--}}
                                                                {{--<a href="customers/status/{{$staff->id}}/1" class="btn btn-success product-btn"><i class="fa fa-toggle-on"></i> Activate</a>--}}
                                                            {{--@endif--}}
                                                            @if($staff->id != 1)
                                                            <button type="submit" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove </button>
                                                            @endif
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard orders data-table area -->

                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop