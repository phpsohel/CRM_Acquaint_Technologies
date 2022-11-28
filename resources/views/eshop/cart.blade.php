@extends('layout.website')
@section('home_content')
 <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-table-container">
                            <table class="table table-cart">
                                 @if($carts->count() > 0)
                                <thead>
                                    <tr>
                                        <th class="product1-col"></th>
                                        <th class="product-col">Product</th>
                                        <th class="price-col">Price</th>
                                        <th class="qty-col">Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach($carts as $row)
                                   
                                        
                                    <tr class="product-row">
                                        <td  class="product1-col">
                                            <button type="button" class="close" aria-label="Close">
                                             <a href="{{ route('cart-destroy', $row->id) }}"> <span aria-hidden="true"> <span aria-hidden="true"></span>&times;</a>
                                            </button>
                                        </td>
                                        <td class="product-col">
                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image">
                                                    <img src="{{ url('public/images/product', $row->product->image ?? '') }}" style="height: 150; width: auto;" alt="product">
                                                </a>
                                            </figure>
                                            <h2 class="product-title">
                                                <a href="product.html">{{ $row->product->name ?? '' }}</a>
                                            </h2>
                                        </td>
                                        <td>৳{{ $row->product_price }}</td>
                                        <td>
                                            <form action="{{ route('cart-quantity-update', $row->id) }}" method="POST">
                                                @csrf
                                            <input class="vertical-quantity form-control" type="text" value="{{  $row->product_quantity }}" name="product_quantity"><br>
                                            <button type="submit" class="btn btn-outline-secondary btn-update-cart">Update Shopping Cart</button>
                                            </form>
                                        </td>
                                        <td>৳{{ $row->product_price * $row->product_quantity }}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <h1>No Products in the Cart!</h1>
                                    @endif

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="clearfix">
                                            <div class="float-left">
                                                <a href="{{ route('eshop') }}" class="btn btn-outline-secondary">Continue Shopping</a>
                                            </div><!-- End .float-left -->

                                             @if($carts->count() > 0)
                                            <div class="float-right">
                                                <a href="{{ route('clear-cart') }}" class="btn btn-outline-secondary btn-clear-cart">Clear Shopping Cart</a>
                                               <!--  <button type="submit" class="btn btn-outline-secondary btn-update-cart">Update Shopping Cart</button> -->
                                               
                                            </div><!-- End .float-right -->
                                            @endif
                                        </td>
                                    </tr>
                                </tfoot>
                               
                            </table>
                        </div><!-- End .cart-table-container -->

                        <div class="cart-discount">
                            
                        </div><!-- End .cart-discount -->
                    </div><!-- End .col-lg-8 -->

                     @if($carts->count() > 0)
                    <div class="col-lg-4">
                        <div class="cart-summary">
                            <h3>Summary</h3>

                            <h4>
                                <a data-toggle="collapse" href="#total-estimate-section" class="collapsed" role="button" aria-expanded="false" aria-controls="total-estimate-section">Shipping Cost</a>
                            </h4>

                            <div class="collapse" id="total-estimate-section">
                                <form action="{{ route('checkout', request()->ip()) }}" method="POST">
                                    @csrf

                                   

                                   
                                    <div class="form-group form-group-custom-control">
                                       
                                        
                                         <input type="radio" id="male" name="shipping_cost" value="{{ 60 }}" checked="">
                                          <label for="male">Inside Dhaka BDT 60</label><br>
                                          <input type="radio" id="female" name="shipping_cost" value="{{ 100 }}">
                                          <label for="female">Outside Dhaka BDT 100</label><br>
                                            
                                   
                                     </div><!-- End .form-group -->
                                   
                               
                            </div><!-- End #total-estimate-section -->

                            <table class="table table-totals">
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td>৳{{ $subtotal }}</td>
                                    </tr>

                                    <!-- <tr>
                                        <td>Tax</td>
                                        <td>$0.00</td>
                                    </tr> -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Order Total</td>
                                        <td>৳{{ $subtotal }}</td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="checkout-methods">
                                <button type="submit" class="btn btn-block btn-sm btn-primary">Go to Checkout</button>
                               <!--  <a href="#" class="btn btn-link btn-block">Check Out with Multiple Addresses</a> -->
                            </div><!-- End .checkout-methods -->
                            </form>
                            @endif
                        </div><!-- End .cart-summary -->
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-6"></div><!-- margin -->
        </main><!-- End .main -->
@endsection