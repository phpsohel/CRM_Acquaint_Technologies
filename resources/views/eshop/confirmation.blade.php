@extends('layout.website')
@section('home_content')

<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center"><br><br>
					<h2>Order Confirmation</h2>
					<div class="page_link">
						<!-- <a href="index.html">Home</a> -->
						<!-- <a href="confirmation.html">Confirmation</a> -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Order Details Area =================-->
	<section class="order_details p_120">
		<div class="container">
			<h3 class="title_confirmation" style="text-align: center;">Thank you. Your order has been received.</h3><br>

			<div class="row order_d_inner">
				<div class="col-lg-4" style="border: 1px solid #d0cfcf; border-radius: 10px; padding: 20px; margin: 2px;">
					<div class="details_item"><br><br>
						<h4>Order Info</h4>
						<!-- <p><strong>*Please Remember The Order Number to Track</strong></p> -->
						<ul class="list">
							<li>
								<a href="#">
									<span><strong> Reference</strong></span> : {{ $sale->reference_no }}</a>
							</li>
							<li>
								<a href="#">
									<span><strong> Date</strong></span> : {{ date('d-m-Y', strtotime($sale->created_at)) }}</a>
							</li>
							<li>
								<a href="#">
									<span><strong>Total</strong></span> :৳ {{ $sale->grand_total }}</a>
							</li>

							
							
							<!-- <li>
								<a href="#">
									<span>Payment method</span> : Check payments</a>
							</li> -->
						</ul>
					</div>
				</div>



				<div class="col-lg-4" style="border: 1px solid #d0cfcf; border-radius: 10px; padding: 20px; margin: 2px;">
					<div class="details_item"><br><br>
						<h4>Billing & Shipping Detail</h4>
						<ul class="list">
							<li>
								<a href="#">
									<span><strong> Customer</strong></span>: {{ $customer->name }}</a>
							</li>
							<li>
								<a href="#">
									<span><strong>City</strong></span> : {{ $customer->city }}</a>
							</li>
							<li>
								<a href="#">
									<span><strong>Address</strong></span> : {{ $customer->address }}</a>
							</li>
							<li>
								<a href="#">
									<span><strong>Phone</strong> </span>: {{ $customer->phone_number }}</a>
							</li>
							
						</ul>
					</div>
				</div>
				@if(!Auth::user() && $sale_count <= 1)
				<div class="col-lg-3" style="border: 1px solid #d0cfcf; border-radius: 10px; padding: 20px; margin: 2px;">
					<div class="details_item"><br><br>
						<h4>Login Info</h4>
						<ul class="list">
							<li>
								<a href="#">
									<span><strong>User Name</strong></span> :{{ $user->name }}</a>
							</li>

							<li>
								<a href="#">
									<span><strong>Password</strong></span> :{{ 12345678 }}</a>
							</li>
	
						</ul>
					</div>
				</div>
				@endif
			</div>
				
			

			
			<div class="order_details_table" style="border: 1px solid #d0cfcf; border-radius: 10px; padding: 20px; margin: 2px;">
				<h2>Order Details</h2>
				<!-- <p>Download the Memo By clicking The Button Below</p> -->
				<!-- <p><strong>*Shipping Cost will be Added</strong></p> -->
				<!-- <a href="" class="btn btn-success">Memo</a> -->
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Quantity</th>
								<th scope="col">Unit Price</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>

						@foreach($products as $row)
							<tr>
								<td>
									<p>{{ $row->name }}</p>
								</td>
								<td>
									<h5>x {{ $row->qty }}</h5>
								</td>
								<td>
									<p>৳{{ $row->net_unit_price }}</p>
								</td>
								<td>
									<p>৳{{ $row->net_unit_price  * $row->qty }}</p>
								</td>
							</tr>
						@endforeach
							<br>
							
							
							
							<tr>
								<td></td>
								<td>
									<h4></h4>
								</td>
								<td>
									<h5>Shipping Cost</h5>
								</td>
								<td>
									<p>৳{{ $sale->shipping_cost }}</p>
								</td>
							</tr>
							
						
							<tr>
								<td></td>
								<td>
									<h4></h4>
								</td>
								<td>
									<h5>Total</h5>
								</td>
								<td>
									<p>৳{{ $sum  + $sale->shipping_cost }}</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			</div>
		</div>
	</section>
 

@endsection