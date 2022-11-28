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
                        <h2>Dashboard</h2>
                        <div class="row">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="brand-text float-left mt-4">
          <h3>{{trans('file.welcome')}} <span>{{Auth::user()->name}}</span> </h3>
      </div>
    </div>
  </div>
</div>
<!-- Counts Section -->
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h3 class="card-title">Total Orders</h3>
    <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
    <p class="card-text"><strong>{{ $order_count }}</strong> </p>
    <a href="{{ route('orders') }}" class="card-link">View Orders</a>
    <!-- <a href="#" class="card-link">Another link</a> -->
  </div>

</div>



      

                       
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