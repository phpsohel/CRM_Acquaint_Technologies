@extends('layout.website')
@section('home_content')
<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading">
                            <h2 class="title">Login</h2>
                            <p>If you have an account with us, please log in.</p>
                        </div><!-- End .heading -->
                         @include('includes.message')
                         <form method="POST" action="{{ route('eshop-post-login') }}" id="login-form">
                         @csrf
                            <!-- <input type="email" class="form-control" placeholder="Email Address" required> -->

                             <input id="login-username" type="text" name="name" required class="form-control" placeholder="User Name">

                            <!-- <input type="password" class="form-control" placeholder="Password" required> -->

                             <input id="login-password" type="password" name="password" required class="form-control" value="" placeholder="Password">

                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary">LOGIN</button>
                                <a href="#" class="forget-pass"> Forgot your password?</a>
                            </div><!-- End .form-footer -->
                        </form>
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="heading">
                            <h2 class="title">Create An Account</h2>
                            <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                        </div><!-- End .heading -->

                        <form method="POST" action="{{ route('eshop-post-register') }}">
                         @csrf

                            
                            <div class="form-group-material" style="display: none;">
                                <select name="customer_group_id" required class="selectpicker form-control customer-field" data-live-search="true" data-live-search-style="begins" title="Select customer group...">
                                  
                                      <option value="1"></option>
                                  
                                </select>
                            </div>

                            <input id="register-username" type="text" name="name" class="form-control" placeholder="User Name" required>
                              
                            <input id="register-email" type="email" name="email" class="form-control" placeholder="Email Address" required>

                            <input id="register-phone" type="text" name="phone_number" class="form-control" placeholder="Phone Number" required>

                            <input id="register-company" type="hidden" name="company_name" class="form-control" value="None">

                            <div class="form-group-material" style="display: none;">
                                <select name="role_id" id="role-id" required class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select Role...">
                                  
                                      <option value="5"></option>
                                 
                                </select>
                            </div>

                            <div class="form-group-material">
                                    <input id="customer-name" type="text" name="customer_name" class="form-control customer-field" placeholder="Customer Name">
                                
                            </div>

                            <div class="form-group-material" style="display: none;">
                                <select name="customer_group_id" required class="selectpicker form-control customer-field" data-live-search="true" data-live-search-style="begins" title="Select customer group...">
                                 
                                      <option value="1"></option>
                                 
                                </select>
                            </div>
                            <div class="form-group-material">
                                <input id="customer-tax-number" type="text" name="tax_no" class="form-control" placeholder="Tax Number">
                                
                            </div>

                            <div class="form-group-material">
                                <input id="customer-address" type="text" name="address" class="form-control customer-field" placeholder="Address">
                                
                            </div>

                            <div class="form-group-material">
                                <input id="customer-city" type="text" name="city" class="form-control customer-field" placeholder="City">
                               
                            </div>

                            <div class="form-group-material">
                                <input id="customer-state" type="text" name="state" class="form-control" placeholder="State">
                                
                            </div>

                            <div class="form-group-material">
                                <input id="customer-postal" type="text" name="postal_code" class="form-control" placeholder="Postal Code">
                                
                            </div>

                            <div class="form-group-material">
                                <input id="customer-country" type="text" name="country" class="form-control" placeholder="Country">
                               
                            </div>


                            <div class="form-group-material" id="biller-id" style="display: none;">
                                <select name="biller_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select Biller*...">
                                 
                                      <option value="1"></option>
                                  
                                </select>
                            </div>
                            <div class="form-group-material" id="warehouse-id" style="display: none;">
                                <select name="warehouse_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select Warehouse*...">
                                  
                                      <option value="1"></option>
                                  
                                </select>
                            </div>

                            


                            <input id="password" type="password" name="password" class="form-control" placeholder="Password" required>

                            <input id="password-confirm" type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>

                           

                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary">Create Account</button>
                            </div><!-- End .form-footer -->
                        </form>
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-5"></div><!-- margin -->
        </main><!-- End .main -->

        <script>
    if ('serviceWorker' in navigator ) {
        window.addEventListener('load', function() {
            navigator.serviceWorker.register('/saleproposmajed/service-worker.js').then(function(registration) {
                // Registration was successful
                console.log('ServiceWorker registration successful with scope: ', registration.scope);
            }, function(err) {
                // registration failed :(
                console.log('ServiceWorker registration failed: ', err);
            });
        });
    }
</script>
<script type="text/javascript">
    $('.admin-btn').on('click', function(){
        $("input[name='name']").focus().val('admin');
        $("input[name='password']").focus().val('admin');
    });

  $('.staff-btn').on('click', function(){
      $("input[name='name']").focus().val('staff');
      $("input[name='password']").focus().val('staff');
  });

  $('.customer-btn').on('click', function(){
      $("input[name='name']").focus().val('shakalaka');
      $("input[name='password']").focus().val('shakalaka');
  });
  // ------------------------------------------------------- //
    // Material Inputs
    // ------------------------------------------------------ //

    var materialInputs = $('input.input-material');

    // activate labels for prefilled values
    materialInputs.filter(function() { return $(this).val() !== ""; }).siblings('.label-material').addClass('active');

    // move label on focus
    materialInputs.on('focus', function () {
        $(this).siblings('.label-material').addClass('active');
    });

    // remove/keep label on blur
    materialInputs.on('blur', function () {
        $(this).siblings('.label-material').removeClass('active');

        if ($(this).val() !== '') {
            $(this).siblings('.label-material').addClass('active');
        } else {
            $(this).siblings('.label-material').removeClass('active');
        }
    });
</script>





<script type="text/javascript">
      // ------------------------------------------------------- //
    // Material Inputs
    // ------------------------------------------------------ //

        var materialInputs = $('input.input-material');

        // activate labels for prefilled values
        materialInputs.filter(function() { return $(this).val() !== ""; }).siblings('.label-material').addClass('active');

        // move label on focus
        materialInputs.on('focus', function () {
            $(this).siblings('.label-material').addClass('active');
        });

        // remove/keep label on blur
        materialInputs.on('blur', function () {
            $(this).siblings('.label-material').removeClass('active');

            if ($(this).val() !== '') {
                $(this).siblings('.label-material').addClass('active');
            } else {
                $(this).siblings('.label-material').removeClass('active');
            }
        });
        $("#biller-id").hide();
        $("#warehouse-id").hide();
        $("#customer-section").hide();

        $("#role-id").on("change", function () {
            if($(this).val() == '5') {
              $("#customer-section").show(300);
              $(".customer-field").prop('required', true);
              $("#biller-id").hide(300);
              $("#warehouse-id").hide(300);
              $("select[name='biller_id']").prop('required', false);
              $("select[name='warehouse_id']").prop('required', false);
            }
            else if($(this).val() > 2) {
              $("#customer-section").hide(300);
              $("#biller-id").show(300);
              $("#warehouse-id").show(300);
              $("select[name='biller_id']").prop('required', true);
              $("select[name='warehouse_id']").prop('required', true);
              $(".customer-field").prop('required', false);
            }
            else {
              $("#biller-id").hide(300);
              $("#warehouse-id").hide(300);
              $("#customer-section").hide(300);
              $("select[name='biller_id']").prop('required', false);
              $("select[name='warehouse_id']").prop('required', false);
              $(".customer-field").prop('required', false);
            }
        });
    </script>
@endsection