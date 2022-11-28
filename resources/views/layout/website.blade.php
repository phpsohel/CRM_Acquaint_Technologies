<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Acquaint - eCommerce System</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">
        
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/') }}public/assets/frontend/images/icons/logo.png">
    
    <script type="text/javascript">
        WebFontConfig = {
            google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700','Segoe Script:300,400,500,600,700' ] }
        };
        (function(d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '{{ asset('/') }}public/assets/frontend/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('/') }}public/assets/frontend/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('/') }}public/assets/frontend/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}public/assets/frontend/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}public/assets/frontend/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}public/assets/frontend/vendor/fontawesome-free/css/all.min.css">
    <style>
        .product-default .product-title {
            max-width: 100%;
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left header-dropdowns">
                        <div class="">
                            <a href="{{ route('eshop-category-page') }}">ALL CATEGORIES</a>
                            
                        </div>

                    </div><!-- End .header-left -->


                    <div class="header-right">
                        <!-- <p class="welcome-msg">Default welcome msg! </p> -->

                        <div class="header-dropdown dropdown-expanded">
                            <a href="#">Links</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="{{ route('eshop-blogs') }}">BLOG</a></li>
                                    @if(Auth::user())
                                    @if(Auth::user()->role_id == 5)
                                    <li><a href="{{ route('eshop-profile') }}">MY ACCOUNT </a></li>
                                    @endif
                                    @endif
                                    <!-- <li><a href="#">DAILY DEAL</a></li> -->
                                    <!-- <li><a href="#">MY WISHLIST </a></li> -->
                                    <!-- <li><a href="#">BLOG</a></li> -->
                                    <li><a href="{{ route('contact') }}">Contact</a></li>
                                   @if(!Auth::user())
                                  
                                    <li><a href="{{ route('eshop-login') }}" class="">LOG IN</a>
                                    </li>
                                    
                                   @endif
                                    @if(Auth::user())
                                     @if(Auth::user()->role_id != 5)
                                    <li><a href="{{ route('eshop-login') }}" class="">LOG IN</a>
                                    </li>
                                    @endif
                                   @endif
                                    @if(Auth::user())
                                    @if(Auth::user()->role_id == 5)
                                    <li><a href="{{ route('logout') }}" class=""  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">LOG OUT</a>
                                    </li>
                                    <form id="logout-form" action="{{ route('customer-logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @endif
                                    @endif
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <a href="{{ route('eshop') }}" class="logo">
                            <img src="{{ asset('/') }}public/assets/frontend/images/logo.png" alt="Porto Logo">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                            <form action="{{ route('search') }}" method="POST">
                                @csrf
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="search" id="q" placeholder="Search..." required>
                                    
                                    <button class="btn" type="submit"><i class="icon-magnifier"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div><!-- End .headeer-center -->

                    <div class="header-right">
                        <button class="mobile-menu-toggler" type="button">
                            <i class="icon-menu"></i>
                        </button>
                        <div class="header-contact">
                            <span>Call us now</span>
                            <a href="tel:#"><strong style="font-size:150%;">+8801734222391</strong></a>
                        </div><!-- End .header-contact -->
                        @php

                            $quantity = App\Cart::where('user_ip', request()->ip())->sum('product_quantity');
                        @endphp

                        <div class="dropdown cart-dropdown">
                            <a href="{{ route('cart-page') }}" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                @if($quantity)
                                    <span class="cart-count">{{ $quantity }}</span>
                                @endif
                               
                            </a>
                            @if($carts->count()>0)
                            <div class="dropdown-menu" >
                                <div class="dropdownmenu-wrapper">
                                    <div class="dropdown-cart-products">

                                       
                                        @foreach($carts as $row)
                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="#">{{ $row->product->name ?? ''}}</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">{{  $row->product_quantity ?? ''}}</span>
                                                    x ৳{{ $row->product_price }}
                                                </span>
                                            </div><!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="#" class="product-image">
                                                    <img src="{{ url('public/images/product', $row->product->image ?? '') }}" alt="product">
                                                </a>
                                                <a href="{{ route('cart-destroy-master', $row->id) }}" class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></a>
                                            </figure>
                                        </div><!-- End .product -->
                                        @endforeach
                                       
                                       
                                    </div><!-- End .cart-product -->

                                    <div class="dropdown-cart-total">
                                        <span>Total</span>

                                        <span class="cart-total-price">৳{{$subtotal}}</span>
                                    </div><!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="{{ route('cart-page') }}" class="btn">View Cart</a>
                                        <!-- <a href="#" class="btn">Checkout</a> -->
                                    </div><!-- End .dropdown-cart-total -->
                                </div><!-- End .dropdownmenu-wrapper -->
                            </div><!-- End .dropdown-menu -->
                            @else
                             <div class="dropdown-menu" >
                                <div class="dropdownmenu-wrapper">
                                    <div class="dropdown-cart-products">

                                       
                                        
                                       
                                       
                                    </div><!-- End .cart-product -->

                                    <div class="dropdown-cart-total">
                                        <span>No products in the cart.</span>

                                        
                                    </div><!-- End .dropdown-cart-total -->

                                    
                                </div><!-- End .dropdownmenu-wrapper -->
                            </div><!-- End .dropdown-menu -->
                            @endif
                        </div><!-- End .dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                            <li class="active"><a href="{{route('eshop')}}">Home</a></li>
                            <li>
                                <a href="#" class="sf-with-ul">All Categories</a>
                                <div class="megamenu megamenu-fixed-width">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="menu-title">
                                                
                                                    </div>
                                                    <ul>
                                                        @foreach($categories as $row)
                                                        <li><a href="{{ route('all-categories', $row->id) }}">{{ $row->name }}</a></li>
                                                       @endforeach      
                                                    </ul>
                                                </div><!-- End .col-lg-6 -->
                                                
                                            </div><!-- End .row -->
                                        </div><!-- End .col-lg-8 -->
                                        
                                    </div>
                                </div><!-- End .megamenu -->
                            </li>

                            @php
                                $cat = App\Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('categories.is_active', true)
                                ->where('products.is_active', true)
                                ->select('categories.id', 'categories.name')
                                ->distinct('categories.name')
                                ->limit(5)
                                ->get();


                            @endphp

                            @foreach($cat as $key)
                            <li class="megamenu-container">
                                <a href="{{ route('all-categories', $key->id) }}" class="">{{ $key->name }}</a>
                               
                            </li>
                            @endforeach
                            <!-- <li>
                                <a href="#" class="sf-with-ul">Pages</a>

                               
                            </li> -->
                           <!--  <li><a href="#" class="sf-with-ul">Features</a>
                            
                            </li> -->
                            <!-- <li class="float-right"><a href="#" target="_blank">Buy Porto!</a></li> -->
                            <li class="float-right"><a href="{{ route('eshop-offer') }}">Special Offer!</a></li>
                        </ul>
                    </nav>
                </div><!-- End .header-bottom -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->






        @yield('home_content')







            <footer class="footer">
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="widget widget-newsletter">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h4 class="widget-title">Subscribe newsletter</h4>
                                        <p>Get all the latest information on Events,Sales and Offers. Sign up for newsletter today</p>
                                    </div><!-- End .col-lg-6 -->

                                    <div class="col-lg-6">
                                        <form action="{{ route('newsletter') }}" method="POST">
                                            @csrf
                                            <input type="email" name="email" class="form-control" placeholder="Email address" required>

                                            <input type="submit" class="btn" value="Subscribe">
                                        </form>
                                    </div><!-- End .col-lg-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-md-9 -->

                        <div class="col-md-3 widget-social">
                            <div class="social-icons">
                                <a href="https://www.facebook.com/AcquaintTechnologies/" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                                <a href="https://twitter.com/acquain02282636" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                                <!-- <a href="#" class="social-icon" target="_blank"><i class="icon-linkedin"></i></a> -->
                            </div><!-- End .social-icons -->
                        </div><!-- End .col-md-3 -->
                    </div><!-- End .row -->
                </div><!-- End .footer-top -->
            </div><!-- End .container -->

            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Contact Us</h4>
                                <ul class="contact-info">
                                    <li>
                                        <span class="contact-info-label">Address:</span>G.A Bhaban Suit # 2, (3rd floor),162, Shaheed Syed Nazrul Islam Sarani,(Old- 8 Purana Paltan), Dhaka-1000.
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Phone:</span>Toll Free <a href="tel:">+8801734222391</a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Email:</span> <a href="mailto:mail@example.com">hello@acquaintbd.com</a>
                                    </li>
                                </ul>
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="widget">
                                        <h4 class="widget-title">My Account</h4>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-5">
                                                <ul class="links">
                                                    <!-- <li><a href="#">About Us</a></li> -->
                                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                                     <li><a href="{{ route('eshop-login') }}">Login</a></li>
                                                    <!-- <li><a href="{{ route('eshop-profile') }}">My Account</a></li> -->
                                                </ul>
                                            </div><!-- End .col-sm-6 -->
                                           
                                        </div><!-- End .row -->
                                        
                                    </div><!-- End .widget -->
                                </div><!-- End .col-md-5 -->

                                @php
                                    $brands = App\Brand::orderBy('id', 'DESC')
                                                            ->limit(5)
                                                            ->get();
                                @endphp

                                <div class="col-md-7">
                                    <div class="widget">
                                        <h4 class="widget-title">Categories</h4>
                                        
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <ul class="links">
                                                     @foreach($cat as $key)
                                                    <li><a href="{{ route('all-categories', $key->id) }}">{{ $key->name }}</a></li>
                                                    @endforeach
                                                    
                                                    
                                                </ul>
                                            </div><!-- End .col-sm-6 -->
                                            <div class="col-sm-6">
                                                 <h4 class="widget-title">Brands</h4>
                                                <ul class="links">
                                                    @foreach($brands as $val)
                                                    <li><a href="{{ route('brands-product', $val->id) }}">{{ $val->title}}</a></li>
                                                    @endforeach
                                                    
                                                </ul>
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .widget -->
                                </div><!-- End .col-md-7 -->

                            </div><!-- End .row -->

                            <div class="footer-bottom">
                                <p class="footer-copyright">Acquaint eCommerce. &copy;  2021.  All Rights Reserved</p>

                                <ul class="contact-info">
                                    <li>
                                        <span class="contact-info-label">Working Days/Hours:</span>
                                        Sat - Thu / 9:30AM - 6:00PM
                                    </li>
                                </ul>
                                <!-- <img src="{{ asset('/') }}public/assets/frontend/images/payments.png" alt="payment methods" class="footer-payments"> -->
                            </div><!-- End .footer-bottom -->
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-cancel"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active"><a href="{{ route('eshop') }}">Home</a></li>
                    <li>
                        @foreach($categories as $row)
                        <a href="{{ route('eshop-category-page') }}">{{ $row->name }}</a>
                        @endforeach
                       
                    </li>
                    <!-- <li>
                        <a href="#">Products</a>
                        
                    </li> -->
                    <!-- <li>
                        <a href="#">Pages<span class="tip tip-hot">Hot!</span></a>
                        
                    </li> -->
                    <!-- <li><a href="#">Blog</a>
                        
                    </li> -->
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <li><a href="{{ route('eshop-offer') }}">Special Offer!<span class="tip tip-hot">Hot!</span></a></li>
                    <!-- <li><a href="#" target="_blank">Buy Porto!</a></li> -->
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="https://www.facebook.com/AcquaintTechnologies/" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                <a href="https://twitter.com/acquain02282636" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                <!-- <a href="#" class="social-icon" target="_blank"><i class="icon-instagram"></i></a> -->
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

   <!--  <div class="newsletter-popup mfp-hide" id="newsletter-popup-form" style="background-image: url({{ asset('/') }}public/assets/frontend/images/newsletter_popup_bg.jpg)">
        <div class="newsletter-popup-content">
            <img src="{{ asset('/') }}public/assets/frontend/images/logo-black.png" alt="Logo" class="logo-newsletter">
            <h2>BE THE FIRST TO KNOW</h2>
            <p>Subscribe to the Porto eCommerce newsletter to receive timely updates from your favorite products.</p>
            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Email address" required>
                    <input type="submit" class="btn" value="Go!">
                </div>
            </form>
            <div class="newsletter-subscribe">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="1">
                        Don't show this popup again
                    </label>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Add Cart Modal -->
    <div class="modal fade" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="addCartModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body add-cart-box text-center">
            <p>You've just added product to the<br>cart</p>
           
            <div class="btn-actions">
                <a href="{{ route('cart-page') }}"><button class="btn-primary">Go to cart page</button></a>
                <a href="{{ route('eshop') }}"><button class="btn-primary" data-dismiss="modal">Continue</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Newsletter Modal -->
    <div class="modal fade" id="newsletterModal" tabindex="-1" role="dialog" aria-labelledby="newsletterModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body add-cart-box text-center">
            <p>Thanks For the Subscription</p>
           
            <div class="btn-actions">
                
                <a href="{{ route('eshop') }}"><button class="btn-primary" data-dismiss="modal">Continue</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>

     <!-- clearCartModal Modal -->
    <div class="modal fade" id="clearCartModal" tabindex="-1" role="dialog" aria-labelledby="clearCartModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body add-cart-box text-center">
            <p>Your Cart is Empty!</p>
           
            <div class="btn-actions">
                
                <a href="{{ route('eshop') }}"><button class="btn-primary" data-dismiss="modal">Continue</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>

     <!-- clearCart Modal -->
    <div class="modal fade" id="clearCart" tabindex="-1" role="dialog" aria-labelledby="clearCart" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body add-cart-box text-center">
            <p>Your Cart is Empty!</p>
           
            <div class="btn-actions">
                
                <a href="{{ route('eshop') }}"><button class="btn-primary" data-dismiss="modal">Continue</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>


     <!-- qtyUpdate Modal -->
    <div class="modal fade" id="qtyUpdate" tabindex="-1" role="dialog" aria-labelledby="qtyUpdate" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body add-cart-box text-center">
            <p>Quantity Update!</p>
           
            <div class="btn-actions">
                
                <a href="{{ route('eshop') }}"><button class="btn-primary" data-dismiss="modal">Continue</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>


    

    <a id="scroll-top" href="#top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="{{ asset('/') }}public/assets/frontend/js/jquery.min.js"></script>
    <script src="{{ asset('/') }}public/assets/frontend/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}public/assets/frontend/js/plugins.min.js"></script>

    <!-- Main JS File -->
    <script src="{{ asset('/') }}public/assets/frontend/js/main.min.js"></script>
    <script type="text/javascript">
        $('#editor').html($('#editorCopy').val());
        $('#editor1').html($('#editorCopy1').val());
        $('#postSubmit').click(function () {
             $('#editorCopy').val($('#editor').html());
        });
    </script>

    <!-- Google Map-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDc3LRykbLB-y8MuomRUIY0qH5S6xgBLX4"></script>
    <script src="{{ asset('/') }}public/assets/frontend/js/map.js"></script>

    <!-- range slider -->
    <script src="{{ asset('/') }}public/assets/frontend/js/nouislider.min.js"></script>

     <!-- www.addthis.com share plugin -->
    <script src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b927288a03dbde6"></script>

    @if(!empty(Session::get('modal')) && Session::get('modal') == 5)
    <script>
        $(function() {
            $('#addCartModal').modal('show');
        });
    </script>
    @endif   

    @if(!empty(Session::get('clear_cart')) && Session::get('clear_cart') == 5)
    <script>
        $(function() {
            $('#clearCartModal').modal('show');
        });
    </script>
    @endif

    @if(!empty(Session::get('newsletter_modal')) && Session::get('newsletter_modal') == 1)
    <script>
        $(function() {
            $('#newsletterModal').modal('show');
        });
    </script>
    @endif    

    @if(!empty(Session::get('clear')) && Session::get('clear') == 4)
    <script>
        $(function() {
            $('#clearCart').modal('show');
        });
    </script>
    @endif

     @if(!empty(Session::get('qty_update')) && Session::get('qty_update') == 5)
    <script>
        $(function() {
            $('#qtyUpdate').modal('show');
        });
    </script>
    @endif

    

     <script> 
        $(".input").on('input', function(){
            var shipping_cost = document.getElementById('shipping_cost').value;
            shipping_cost = parseFloat(shipping_cost);
            // alert('aaa');
            // alert(shipping_cost);

            var subtotal = document.getElementById('subtotal').value;
            subtotal = parseFloat(subtotal);



             var order_total = document.getElementById('order_total').value = shipping_cost + subtotal;
             // order_total = parseFloat(order_total);
            // alert(order_total);
        });
    </script>     
   
</body>
</html>