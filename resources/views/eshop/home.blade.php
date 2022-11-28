@extends('layout.website')
@section('home_content')
     <style>
         .feature-box-simple h3 { font-size: 20px;}
         h3, .h3 {   font-size: 3rem; }
         
         @media only screen and (min-width: 600px) {
          .info-box h4 {   font-size: 2rem; }
          .info-box{ padding-top: 3.7rem;  padding-bottom: 3.7rem; }
        }
        
     </style>   
        <main class="main">
            <div class="home-slider-container">
                <div class="home-slider owl-carousel owl-theme owl-theme-light">
                    <div class="home-slide">
                        <div class="slide-bg owl-lazy"  data-src="{{ asset('/') }}public/assets/frontend/images/slider/slide-1.jpg"></div><!-- End .slide-bg -->
                        <div class="container">
                            <div class="home-slide-content">
                                <div class="slide-border-top">
                                    <!-- <img src="{{ asset('/') }}public/assets/frontend/images/slider/border-top.png" alt="Border" width="290" height="38"> -->
                                </div><!-- End .slide-border-top -->
                                <h3>80% off for select items</h3>
                                <h1>Jewellery mega sale</h1>
                                <a href="category.html" class="btn btn-primary">Shop Now</a>
                                <div class="slide-border-bottom">
                                    <!-- <img src="{{ asset('/') }}public/assets/frontend/images/slider/border-bottom.png" alt="Border" width="290" height="111"> -->
                                </div><!-- End .slide-border-bottom -->
                            </div><!-- End .home-slide-content -->
                        </div><!-- End .container -->
                    </div><!-- End .home-slide -->

                    <div class="home-slide">
                        <div class="slide-bg owl-lazy"  data-src="{{ asset('/') }}public/assets/frontend/images/slider/slide-2.jpg"></div><!-- End .slide-bg -->
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-8 col-md-6 text-center slide-content-right">
                                    <div class="home-slide-content">
                                        <h3>up to 20% off</h3>
                                        <h1>Women's Earrings</h1>
                                        <a href="category.html" class="btn btn-primary">Shop Now</a>
                                    </div><!-- End .home-slide-content -->
                                </div><!-- End .col-lg-5 -->
                            </div><!-- End .row -->
                        </div><!-- End .container -->
                    </div><!-- End .home-slide -->
                </div><!-- End .home-slider -->
            </div><!-- End .home-slider-container -->

            <div class="info-boxes-container">
                <div class="container">
                    <div class="info-box">
                        <i class="icon-shipping"></i>

                        <div class="info-box-content">
                            <h4>FREE DELIVERY</h4>
                            <p>Get free delivery for purchasing over 3500 BDT</p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->

                    <div class="info-box">
                        <i class="icon-us-dollar"></i>

                        <div class="info-box-content">
                            <h4>SECURE PAYMENT</h4>
                            <p>Simple and easy payment procedure through bKash</p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->

                    <div class="info-box">
                        <i class="icon-support"></i>

                        <div class="info-box-content">
                            <h4>ONLINE SUPPORT 24/7</h4>
                            <p>Our hotline number is 24/7 open for customer support</p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->
                </div><!-- End .container -->
            </div><!-- End .info-boxes-container -->
            
            <div class="banners-group">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="banner banner-image">
                                <a href="#">
                                    <img src="{{ asset('/') }}public/assets/frontend/images/banners/banner-1.jpg" alt="banner">
                                </a>
                            </div><!-- End .banner -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-md-4">
                            <div class="banner banner-image">
                                <a href="#">
                                    <img src="{{ asset('/') }}public/assets/frontend/images/banners/banner-2.jpg" alt="banner">
                                </a>
                            </div><!-- End .banner -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-md-4">
                            <div class="banner banner-image">
                                <a href="#">
                                    <img src="{{ asset('/') }}public/assets/frontend/images/banners/banner-3.jpg" alt="banner">
                                </a>
                            </div><!-- End .banner -->
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .banneers-group -->
            
            <div class="featured-products-section carousel-section">
                <div class="container">
                    <h2 class="h3 title mb-4 text-center">All Products</h2>

                    <div class="featured-products owl-carousel owl-theme">

                        @foreach($products as $row)
                        <div class="product-default">
                            <figure>
                                
                                <a href="{{ route('eshop-detail', $row->id) }}">
                                    <img src="{{ url('public/images/product', $row->image) }}" alt="product" style="height: 275px; width: auto; margin: auto;">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <h2 class="product-title">
                                    <a href="{{ route('eshop-detail', $row->id) }}">{{$row->name}}</a>
                                </h2>
                                <div class="price-box">
                                    <span class="product-price">৳{{$row->price}}</span>
                                </div><!-- End .price-box -->

                                <form action="{{ route('add-to-cart', $row->id) }}" method="POST">
                                    @csrf
                                    <div class="product-action">
                                        <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        <button type="submit" class="btn-icon btn-add-cart"><i class="icon-bag"></i>ADD TO CART</button>
                                        <input type="hidden" name="product_price" value="{{ $row->price}}">
                                        <a href="{{ route('eshop-detail', $row->id) }}" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a> 
                                    </div>
                                </form>
                            </div><!-- End .product-details -->
                        </div>
                       @endforeach
                      
                       
                       
                        
                    </div><!-- End .featured-proucts -->
                </div><!-- End .container -->
            </div><!-- End .featured-proucts-section -->

            <div class="mb-5"></div><!-- margin -->

            <div class="carousel-section">
                <div class="container">
                    <h2 class="h3 title mb-4 text-center">New Arrivals</h2>

                    <div class="new-products owl-carousel owl-theme">
                        @foreach($products as $row)
                        <div class="product-default">
                            <figure>
                                <a href="{{ route('eshop-detail', $row->id) }}">
                                    <img src="{{ url('public/images/product', $row->image) }}" alt="product" style="height: 275px; width: auto; margin: auto;">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <h2 class="product-title">
                                    <a href="{{ route('eshop-detail', $row->id) }}" >{{$row->name}}</a>
                                </h2>
                                <div class="price-box">
                                    <span class="product-price">৳{{$row->price}}</span>
                                </div><!-- End .price-box -->
                                <form action="{{ route('add-to-cart', $row->id) }}" method="POST">
                                    @csrf
                                    <div class="product-action">
                                        <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        <button type="submit" class="btn-icon btn-add-cart"><i class="icon-bag"></i>ADD TO CART</button>
                                        <input type="hidden" name="product_price" value="{{ $row->price}}">
                                        <a href="{{ route('eshop-detail', $row->id) }}" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a> 
                                    </div>
                                </form>
                            </div><!-- End .product-details -->
                        </div>
                      @endforeach
                       
          
                        
                       
                    </div><!-- End .news-proucts -->
                </div><!-- End .container -->
            </div><!-- End .carousel-section -->

            <div class="mb-5"></div><!-- margin -->

            <div class="info-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="icon-earphones-alt"></i>

                                <div class="feature-box-content">
                                    <h3>Customer Support<span>Need Assistence?</span></h3>
                                    <p>Our hotline number is 24/7 open for customer support</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-md-4 -->
                        
                        <div class="col-md-4">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="icon-credit-card"></i>

                                <div class="feature-box-content">
                                    <h3>secured payment <span>Safe & Fast</span></h3>
                                    <p>Simple and easy payment procedure through bKash</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-md-4">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="icon-action-undo"></i>

                                <div class="feature-box-content">
                                    <h3>Returns <span>Easy & Free</span></h3>
                                    <p>Products can be returned free of cost within 3 days</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .info-section -->

            <div class="promo-section" style="background-blend-mode: overlay; background-image: url({{ asset('/') }}public/assets/frontend/images/promo-bg.jpg)">
                <div class="container">
                    <h3>Exclusive Jewellery collection</h3>
                    <a href="#" class="btn btn-dark">Shop Now</a>
                </div><!-- End .container -->
            </div><!-- End .promo-section -->

            <div class="partners-container">
                <div class="container">
                    <div class="partners-carousel owl-carousel owl-theme">
                        @foreach($brands as $row)
                        <a href="{{ route('brands-product', $row->id) }}" class="partner">
                            <img src="{{ url('public/images/brand', $row->image) }}" alt="logo" style="width: auto; height: 70px;">
                        </a>
                       @endforeach
                       
                       
                       
                       
                       
                    </div><!-- End .partners-carousel -->
                </div><!-- End .container -->
            </div><!-- End .partners-container -->

            <div class="blog-section">
                <div class="container">
                    <h2 class="h3 title text-center">From the Blog</h2>

                    <div class="blog-carousel owl-carousel owl-theme">

                        @foreach($blog as $row)
                        <article class="entry">
                            <div class="entry-media">
                                <a href="{{ route('blog-post', $row->id) }}">
                                    <img src="{{ $row->blog_image }}" alt="Post">
                                </a>
                                <div class="entry-date">{{ date('d', strtotime($row->created_at)) }}<span>{{ date('M', strtotime($row->created_at)) }}</span></div><!-- End .entry-date -->
                            </div><!-- End .entry-media -->

                            <div class="entry-body">
                                <h3 class="entry-title">
                                    <a href="{{ route('blog-post', $row->id) }}">{{ $row->blog_title }}</a>
                                </h3>
                                <div class="entry-content">
                                    <p>{{ \Illuminate\Support\Str::limit($row->blog, 250, '..........') }}</p>

                                    <a href="{{ route('blog-post', $row->id) }}" class="btn btn-dark">Read More</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                        @endforeach
                    </div><!-- End .blog-carousel -->
                </div><!-- End .container -->
            </div><!-- End .blog-section -->
        </main><!-- End .main -->

    
@endsection