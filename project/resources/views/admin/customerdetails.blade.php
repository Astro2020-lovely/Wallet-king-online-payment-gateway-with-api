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
                                        <h2>Customer Details</h2>
                                        <a href="{!! url('admin/customers') !!}" class="add-newProduct-btn"><i class="fa fa-arrow-left"></i> back</a>
                                    </div>
                                    <hr/>
                                    <div class="customer-details-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                <div class="customer-tab">
                                                    <ul class="tab-list">
                                                        <li class="col-lg-3 col-md-3 col-xs-12 customer-tab active">
                                                            <a data-toggle="tab" href="#customer-tab-1">
                                                                <h1 class="customer-details-value"></h1>
                                                                <h4>Profile Info</h4>
                                                                <p>view details</p>
                                                            </a>
                                                        </li>
                                                        <li class="col-lg-3 col-md-3 col-xs-12 customer-tab">
                                                            <a data-toggle="tab" href="#customer-tab-2">
                                                                <h1 class="customer-details-value">{{\App\Transaction::where('mainacc',$customer->id)->count()}}</h1>
                                                                <h4>Transactions</h4>
                                                                <p>Total: {{$settings[0]->currency_sign}}{{number_format((float)\App\Transaction::where('mainacc',$customer->id)->sum('amount'), 2, '.', '')}}</p>
                                                            </a>
                                                        </li>
                                                        <li class="col-lg-3 col-md-3 col-xs-12 customer-tab">
                                                            <a data-toggle="tab" href="#customer-tab-3">
                                                                <h1 class="customer-details-value">{{\App\Transaction::where('mainacc',$customer->id)->where('type','deposit')->count()}}</h1>
                                                                <h4>Deposits</h4>
                                                                <p>Total: {{$settings[0]->currency_sign}}{{number_format((float)\App\Transaction::where('mainacc',$customer->id)->where('type','deposit')->sum('amount'), 2, '.', '')}}</p>
                                                            </a>
                                                        </li>
                                                        <li class="col-lg-3 col-md-3 col-xs-12 customer-tab">
                                                            <a data-toggle="tab" href="#customer-tab-4">
                                                                <h1 class="customer-details-value">{{count($withdraws)}}</h1>
                                                                <h4>Withdraw Log</h4>
                                                                <p>Total: {{$settings[0]->currency_sign}}{{number_format((float)\App\Withdraw::where('acc',$customer->id)->sum('amount'), 2, '.', '')}}</p>
                                                            </a>
                                                        </li>
                                                        <li class="col-lg-3 col-md-3 col-xs-12 customer-tab">
                                                            <a data-toggle="tab" href="#customer-tab-5">
                                                                <h1 class="customer-details-value">{{count($logins)}}</h1>
                                                                <h4>Logins</h4>
                                                                <p>view details</p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="tab-content">
                                                    <div id="customer-tab-1" class="tab-pane active fade in">
                                                        <div class="row">
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <div class="customer-details-updateProfile">
                                                                    <div class="section-title">
                                                                        <h2>Details</h2>
                                                                    </div>
                                                                    <hr/>
                                                                    <div id="response" class="col-md-12">
                                                                        @if(Session::has('message'))
                                                                            <div class="alert alert-success alert-dismissable">
                                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                                {{ Session::get('message') }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <form class="form-horizontal customer-details" method="POST" action="{{ action('CustomerController@update',['id' => $customer->id]) }}">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="_method" value="PATCH">
                                                                        <div class="form-group">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <label for="customer_details_firstname">Full Name</label>
                                                                                <input class="form-control" type="text" name="name" value="{{$customer->name}}" placeholder="Full Name" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <label for="customer_details_mobile">Phone Number</label>
                                                                                <input class="form-control" type="text" name="phone" value="{{$customer->phone}}" placeholder="Phone Number">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <label for="customer_details_dob">Date of birth</label>
                                                                                <input class="form-control" type="date" value="{{$customer->dob}}" name="dob" id="customer_details_dob">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <label for="customer_details_gender">Gender</label>
                                                                                <select class="form-control" id="customer_details_gender" name="gender">
                                                                                    <option value="">Select Gender</option>
                                                                                    @if($customer->gender == "Male")
                                                                                        <option value="Male" selected>Male</option>
                                                                                    @else
                                                                                        <option value="Male">Male</option>
                                                                                    @endif
                                                                                    @if($customer->gender == "Female")
                                                                                        <option value="Female" selected>Female</option>
                                                                                    @else
                                                                                        <option value="Female">Female</option>
                                                                                    @endif
                                                                                    @if($customer->gender == "Other")
                                                                                        <option value="Other" selected>Other</option>
                                                                                    @else
                                                                                        <option value="Other">Other</option>
                                                                                    @endif

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <label for="customer_details_country">Country</label>
                                                                                <select class="form-control" id="customer_details_country" name="country" required>
                                                                                    <option value="">Select Country</option>
                                                                                    @foreach($countries as $country)
                                                                                        @if($customer->country == $country->name)
                                                                                            <option value="{{$country->name}}" selected>{{$country->nicename}}</option>
                                                                                        @else
                                                                                            <option value="{{$country->name}}">{{$country->nicename}}</option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <label for="customer_details_packege">Customer Type</label>
                                                                                <select name="acctype" id="customer_details_packege" class="form-control">
                                                                                    @if($customer->acctype == "basic")
                                                                                        <option value="basic" selected>Basic</option>
                                                                                    @else
                                                                                        <option value="basic">Basic</option>
                                                                                    @endif
                                                                                    @if($customer->acctype == "business")
                                                                                        <option value="business" selected>Business</option>
                                                                                    @else
                                                                                        <option value="business">Business</option>
                                                                                    @endif
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        @if($customer->api_key != "" && $customer->acctype == "business")
                                                                        <div class="form-group">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <label for="customer_details_api_key">API Key</label>
                                                                                <input class="form-control" type="text" value="{{$customer->api_key}}" placeholder="Current Api key" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            <div class="form-group">
                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <label for="customer_details_api_key">API Key</label>
                                                                                    <input class="form-control" name="api_key" type="text" value="{{$customer->api_key}}" placeholder="No Current Api key(Add Api Key)">
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                        <div class="form-group">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                                                <input class="btn btn-success add-product_btn" type="submit" name="customer_details_btn" value="UPDATE">
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <div class="customer-details-profile">

                                                                    <div class="single-profile-area text-center">
                                                                        <h2 class="customer-name">{{$customer->name}}</h2>
                                                                        <p class="customer-email">{{$customer->email}}</p>
                                                                        <p class="customer-balance">
                                                                            <strong>CURRENT BALANCE : <span>{{$customer->current_balance}} {{$settings[0]->currency_code}}</span>
                                                                            </strong>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="customer-details-profile">
                                                                    <div class="single-profile-area text-center">
                                                                        <h5>Last Login</h5>
                                                                        <p>{{\App\UserLogins::lastLogin($customer->id)->ip}} <br> {{\App\UserLogins::lastLogin($customer->id)->agent}} <br> {{\App\UserLogins::lastLogin($customer->id)->os}} </p>
                                                                        <h4>
                                                                            @if(\App\UserLogins::lastLogin($customer->id)->login_time != "No Login Yet")
                                                                                {{\App\UserLogins::lastLogin($customer->id)->login_time->diffForHumans()}}
                                                                            @else
                                                                                {{\App\UserLogins::lastLogin($customer->id)->login_time}}
                                                                            @endif
                                                                        </h4>
                                                                    </div>
                                                                    <hr/>
                                                                    <div class="single-profile-area text-center">
                                                                        <a href="balance/{{$customer->id}}" class="btn btn-block add-product_btn"> add/substruct balance</a>
                                                                        <a href="email/{{$customer->id}}" class="btn btn-block add-product_btn"> send email</a>
                                                                        <a href="create-ticket/{{$customer->id}}" class="btn btn-block add-product_btn"> Create Ticket</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="customer-tab-2" class="tab-pane fade">
                                                        <div class="section-padding add-product-1">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="add-product-box">
                                                                        <div class="add-product-header orders">
                                                                            <h2>transactions</h2>
                                                                        </div>
                                                                        <hr/>
                                                                        <div class="table-responsive">
                                                                            <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive nowrap" cellspacing="0" width="100%">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Date</th>
                                                                                    <th width="15%">Transaction ID#</th>
                                                                                    <th>Reason</th>
                                                                                    <th width="10%">Amount</th>
                                                                                    <th>Account</th>
                                                                                    <th>Actions</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                @foreach($transactions as $transaction)
                                                                                    <tr>
                                                                                        <td>{{date('d F Y h:i:sa',strtotime($transaction->trans_date))}}</td>
                                                                                        <td>{{$transaction->transid}}</td>
                                                                                        <td>{{$transaction->reason}}</td>
                                                                                        <td>{{$settings[0]->currency_sign}}{!! $transaction->amount !!}</td>
                                                                                        <td>{{$transaction->mainacc->email}}</td>

                                                                                        <td>
                                                                                            <a href="{{url('admin/transactions')}}/{{$transaction->id}}" class="btn btn-primary product-btn"><i class="fa fa-eye"></i> View Details </a>
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
                                                    </div>

                                                    <div id="customer-tab-3" class="tab-pane fade">
                                                        <div class="section-padding add-product-1">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="add-product-box">
                                                                        <div class="add-product-header orders">
                                                                            <h2> Deposit LOG</h2>
                                                                        </div>
                                                                        <hr/>
                                                                        <div class="table-responsive">
                                                                            <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive nowrap wrapper_deposite" cellspacing="0" width="100%">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Date</th>
                                                                                    <th width="15%">Transaction ID#</th>
                                                                                    <th>Method</th>
                                                                                    <th width="10%">Amount</th>
                                                                                    <th>Account</th>
                                                                                    <th>Actions</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                @foreach($deposits as $deposit)
                                                                                    <tr>
                                                                                        <td>{{date('d F Y h:i:sa',strtotime($deposit->trans_date))}}</td>
                                                                                        <td>{{$deposit->transid}}</td>
                                                                                        <td>{{$deposit->deposit_method}}</td>
                                                                                        <td>{{$settings[0]->currency_sign}}{!! $deposit->amount !!}</td>
                                                                                        <td>{{$deposit->mainacc->email}}</td>

                                                                                        <td>
                                                                                            <a href="{{url('admin/transactions')}}/{{$deposit->id}}" class="btn btn-primary product-btn"><i class="fa fa-eye"></i> View Details </a>
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
                                                    </div>

                                                    <div id="customer-tab-4" class="tab-pane fade">
                                                        <div class="section-padding add-product-1">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="add-product-box">
                                                                        <div class="add-product-header orders">
                                                                            <h2>Withdraw Log</h2>
                                                                        </div>
                                                                        <hr/>
                                                                        <div class="table-responsive">
                                                                            <table id="product-table_wrapper_login" class="table table-striped table-hover products dt-responsive nowrap wrapper_withdraw" cellspacing="0" width="100%">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Date</th>
                                                                                    <th>Method</th>
                                                                                    <th width="10%">Amount</th>
                                                                                    <th width="10%">Fee</th>
                                                                                    <th>Account</th>
                                                                                    <th>Status</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                @foreach($withdraws as $withdraw)
                                                                                    <tr>
                                                                                        <td>{{date('d F Y h:i:sa',strtotime($withdraw->updated_at))}}</td>
                                                                                        <td>{{$withdraw->method}}</td>
                                                                                        <td>{{$settings[0]->currency_sign}}{!! $withdraw->amount !!}</td>
                                                                                        <td>{{$settings[0]->currency_sign}}{{$withdraw->fee}}</td>
                                                                                        <td>{{$withdraw->acc_email}}</td>
                                                                                        <td>
                                                                                            {{ucfirst($withdraw->status)}}
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
                                                    </div>

                                                    <div id="customer-tab-5" class="tab-pane fade">
                                                        <div class="section-padding add-product-1">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="add-product-box">
                                                                        <div class="add-product-header orders">
                                                                            <h2>Login Information</h2>
                                                                        </div>
                                                                        <hr/>
                                                                        <div class="table-responsive">
                                                                            <table id="product-table_wrapper_login" class="table table-striped table-hover products dt-responsive wrapper_login" cellspacing="0" width="100%">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>IP</th>
                                                                                    <th>Location </th>
                                                                                    <th>Agent</th>
                                                                                    <th>Time</th>
                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                @foreach($logins as $login)
                                                                                <tr>
                                                                                    <td>{{$login->id}}</td>
                                                                                    <td><strong>{{$login->ip}}</strong></td>
                                                                                    <td><strong>{{$login->location}}</strong></td>
                                                                                    <td>{{$login->agent}} - {{$login->os}}</td>
                                                                                    <td>{{$login->login_time}}</td>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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