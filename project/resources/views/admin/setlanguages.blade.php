@extends('admin.includes.masterpage-admin')

@section('content')
    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Website Logo -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Website Languages</h2>
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
                                    <form method="POST" action="{!! action('SettingsController@language') !!}" class="form-horizontal" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_title">Home * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="title" value="{{$language->home}}" id="website_title" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language1">About Us * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="about_us" value="{{$language->about_us}}" id="website_language1" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language2">Contact Us * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="contact_us" value="{{$language->contact_us}}" id="website_language2" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language3">FAQ * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="faq" value="{{$language->faq}}" id="website_language3" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language4">Log In * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="log_in" value="{{$language->log_in}}" id="website_language4" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language5">Sign Up * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="sign_up" value="{{$language->sign_up}}" id="website_language5" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language59">Next * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="next" value="{{$language->next}}" id="website_language59" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language55">Personal Account * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="personal" value="{{$language->personal}}" id="website_language55" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language56">Business Account * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="business" value="{{$language->business}}" id="website_language56" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language57">Personal Account Details * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="personal_details" value="{{$language->personal_details}}" id="website_language57" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language58">Business Account Details * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="business_details" value="{{$language->business_details}}" id="website_language58" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language6">My Account * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="my_account" value="{{$language->my_account}}" id="website_language6" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language6">Current Balance * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="current_balance" value="{{$language->current_balance}}" id="website_language6" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language7">Recent Transactions * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="recent_transaction" value="{{$language->recent_transaction}}" id="website_language7" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language8">Date
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="dates" value="{{$language->dates}}" id="website_language8" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language9">Action
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="action" value="{{$language->action}}" id="website_language9" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language10">Amount
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="amount" value="{{$language->amount}}" id="website_language10" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language11">Send
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="send" value="{{$language->send}}" id="website_language11" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language12">Deposit
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="deposit" value="{{$language->deposit}}" id="website_language12" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language13">Withdraw
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="withdraw" value="{{$language->withdraw}}" id="website_language13" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language14">Request
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="request" value="{{$language->request}}" id="website_language14" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language15">Settings
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="settings" value="{{$language->settings}}" id="website_language15" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language16">Transactions
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="transactions" value="{{$language->transactions}}" id="website_language16" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language17">Account Settings
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="account_settings" value="{{$language->account_settings}}" id="website_language17" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language18">Security Settings
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="security_settings" value="{{$language->security_settings}}" id="website_language18" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language19">API Details
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="api_details" value="{{$language->api_details}}" id="website_language19" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language20">Update Info
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="update_info" value="{{$language->update_info}}" id="website_language20" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language21">Pending Withdraws
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="pending_withdraws" value="{{$language->pending_withdraws}}" id="website_language21" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language22">Pending Requests
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="pending_requests" value="{{$language->pending_requests}}" id="website_language22" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language23">Total
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="total" value="{{$language->total}}" id="website_language23" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language24">Address
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="address" value="{{$language->address}}" id="website_language24" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language25">Contact Us Today
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="contact_us_today" value="{{$language->contact_us_today}}" id="website_language25" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language26">Phone
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="phone" value="{{$language->phone}}" id="website_language26" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language27">Email
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="email" value="{{$language->email}}" id="website_language27" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language28">Fax
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fax" value="{{$language->fax}}" id="website_language28" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language29">Submit
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="submit" value="{{$language->submit}}" id="website_language29" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language30">Name
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="name" value="{{$language->name}}" id="website_language30" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language31">Dashboard
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="dashboard" value="{{$language->dashboard}}" id="website_language31" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language32">Update Profile
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="update_profile" value="{{$language->update_profile}}" id="website_language32" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language33">Change Password
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="change_password" value="{{$language->change_password}}" id="website_language33" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language34">Latest Blogs
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="latest_blogs" value="{{$language->latest_blogs}}" id="website_language34" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language35">Footer Links
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="footer_links" value="{{$language->footer_links}}" id="website_language35" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language36">View Details
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="view_details" value="{{$language->view_details}}" id="website_language36" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language37">Blog
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="blog" value="{{$language->blog}}" id="website_language37" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language38">Share In Social
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="share_in_social" value="{{$language->share_in_social}}" id="website_language38" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language339">Support
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="support_center" value="{{$language->support_center}}" id="website_language339" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language339">Pending Deposits
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="pending_deposits" value="{{$language->pending_deposits}}" id="website_language339" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language339">Notification
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="notification" value="{{$language->notification}}" id="website_language339" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language39">Logout
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="logout" value="{{$language->logout}}" id="website_language39" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">update Languages</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Website Logo -->


                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop