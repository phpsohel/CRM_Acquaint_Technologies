@extends('layout.website')
@section('home_content')
<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-lg-last dashboard-content">
                        <h2>Edit Account Information</h2>
                        @include('includes.message')
                        <form action="{{ route('update-profile') }}" method="POST">
                        	@csrf
                        	<input type="hidden" name="id" value="{{ $profile->user_id }}">
                        	<input type="hidden" name="user_id" value="{{ $profile->user_id }}">
                            <div class="row">
                                <div class="col-sm-11">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group required-field">
                                                <label for="acc-name">Customer Name</label>
                                                <input type="text" class="form-control" id="acc-name" name="name" required value="{{ $profile->name }}">
                                            </div><!-- End .form-group -->
                                        </div><!-- End .col-md-4 -->

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="company_name">Company Name</label>
                                                <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $profile->company_name }}">
                                            </div><!-- End .form-group -->
                                        </div><!-- End .col-md-4 -->

                                        <div class="col-md-4">
                                            <div class="form-group required-field">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone_number" required value="{{ $profile->phone_number }}">
                                            </div><!-- End .form-group -->
                                        </div><!-- End .col-md-4 -->
                                    </div><!-- End .row -->
                                </div><!-- End .col-sm-11 -->
                            </div><!-- End .row -->

                            <div class="form-group required-field">
                                <label for="acc-email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required value="{{ $profile->user_email }}">
                            </div><!-- End .form-group -->

                           

                            <div class="form-group required-field">
                                <label for="tax_no">Tax Number</label>
                                <input type="text" class="form-control" id="tax_no" name="tax_no" value="{{ $profile->tax_no }}">
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" required value="{{ $profile->address }}">
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" required value="{{ $profile->city }}">
                            </div><!-- End .form-group -->

                             <div class="form-group required-field">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" name="state" required value="{{ $profile->state }}">
                            </div><!-- End .form-group -->

                             <div class="form-group required-field">
                                <label for="postal_code">Postal Code</label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code" required value="{{ $profile->postal_code }}">
                            </div><!-- End .form-group -->

                             <div class="form-group required-field">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" required value="{{ $profile->country }}">
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label for="user_name">User Name</label>
                                <input type="text" class="form-control" id="user_name" name="user_name" required value="{{ $profile->user_name }}">
                            </div><!-- End .form-group -->

                            <div class="form-footer">
                            <div class="form-footer-right">
                                 <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </div>
                        </form>
                            <h2>Edit Password</h2>

                            <form action="{{ route('update-password') }}" method="POST">
                            	@csrf
                            <input type="hidden" name="id" value="{{ $profile->user_id }}">
                            <div class="form-group required-field">
                                <label for="acc-password">Current Password</label>
                                <input type="password" class="form-control" id="acc-password" name="old_password">
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label for="acc-password">New Password</label>
                                <input type="password" class="form-control" id="acc-password" name="new_password">
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label for="acc-password">Confirm Password</label>
                                <input type="password" class="form-control" id="acc-password" name="confirm_password">
                            </div><!-- End .form-group -->

                            <div class="mb-2"></div><!-- margin -->

                           

                           

                            <!-- <div class="required text-right">* Required Field</div> -->
                            <div class="form-footer">
                                

                                <div class="form-footer-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div><!-- End .form-footer -->
                        </form>
                    </div><!-- End .col-lg-9 -->

                    <aside class="sidebar col-lg-3">
                        <div class="widget widget-dashboard">
                            <h3 class="widget-title">My Account</h3>

                            <ul class="list">
                                <li class=""><a href="{{ route('eshop-profile') }}">Account Dashboard</a></li>
                                <li><a href="{{ route('edit-profile', Auth::user()->id) }}">Account Information</a></li>
                                <!-- <li><a href="#">Address Book</a></li> -->
                                <li><a href="{{ route('orders') }}">My Orders</a></li>
                                <!-- <li><a href="#">Billing Agreements</a></li> -->
                                <!-- <li><a href="#">Recurring Profiles</a></li> -->
                                <li><a href="#">My Product Reviews</a></li>
                                <!-- <li><a href="#">My Tags</a></li> -->
                                <li><a href="#">My Wishlist</a></li>
                                <!-- <li><a href="#">My Applications</a></li> -->
                                <!-- <li><a href="#">Newsletter Subscriptions</a></li> -->
                                <!-- <li><a href="#">My Downloadable Products</a></li> -->
                            </ul>
                        </div><!-- End .widget -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-5"></div><!-- margin -->
        </main><!-- End .main -->

@endsection