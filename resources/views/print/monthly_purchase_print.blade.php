<style type="text/css">
        @media print{
            #p {
                display: none;
            }
        }
</style>
<style type="text/css">
	table {
       		border-collapse: collapse;
		  }
	.title {text-align: center; }
	/*.report{text-align: center; color: black; height: 3%; padding: 10px; font-weight: bold;
			text-decoration: underline; font-family: Arial, Helvetica, sans-serif;}*/
	/*.a{text-align: center; color: black; font-family: Arial, Helvetica, sans-serif;}*/
	.year{text-align: center; color: black;}
	.b{text-align: center; background-color: #FFF8DC;}
	.c{text-align: center; background-color: #FFFAF0; font-weight: bold;}


	p {text-align: right;}
	.date {text-align: center;
			 padding: 0px 0px 0px 0px;}
	.grand_total{
		font-weight: bold;
	}
	/*.x{ display: inline-block; font-size: small; }*/

	/*.image{
		  margin: auto;
		  width: 10%;
		  padding: 25px 0px 20px 450px;
	}*/
</style>			
				<!-- IMAGE POSITION -->
				@if($setting->logo_position > 0)
					<style type="text/css">
						.image{
						  margin: auto;
						  width: 10%;
						  /*height: 1%;*/
						  padding: 0px 0px 0px 0px;
							text-align: center;}

					</style>
				@else
					<style type="text/css">
						.image{
						  margin: auto;
						  width: 10%;
						  /*height: 1%;*/
						  padding: 0px 700px 0px 100px;
						  text-align: center;
						}
					</style>
				@endif

				<!-- TEXT SIZE -->
				@if($setting->text_font == 0)
				<style type="text/css">
					.x{ display: inline-block; font-size: small; }
				</style>
				@elseif($setting->text_font == 1)
				<style type="text/css">
					.x{ display: inline-block; font-size: medium; }
				</style>
				@else
				<style type="text/css">
					.x{ display: inline-block; font-size: large; }
				</style>
				@endif

				<!-- TEXT FORNT -->
				@if($setting->text_format == 0)
				<style type="text/css">
					.x{ font-family: Arial, Helvetica, sans-serif; }
					.a{text-align: center; color: black; font-family: Arial, Helvetica, sans-serif;}
					.report{text-align: center; color: black; height: 3%; padding: 10px; font-weight: bold; text-decoration: underline; font-family: Arial, Helvetica, sans-serif;}
				</style>
				@elseif($setting->text_format == 1)
				<style type="text/css">
					.x{ font-family: "Times New Roman", Times, serif; }
					.a{text-align: center; color: black; font-family: "Times New Roman", Times, serif;}
					.report{text-align: center; color: black; height: 3%; padding: 10px; font-weight: bold; text-decoration: underline; font-family: "Times New Roman", Times, serif;}
				</style>
				@else
				<style type="text/css">
					.x{ font-family: "Lucida Console", "Courier New", monospace; }
					.a{text-align: center; color: black; font-family: "Lucida Console", "Courier New", monospace;}
					.report{text-align: center; color: black; height: 3%; padding: 10px; font-weight: bold; text-decoration: underline; font-family: "Lucida Console", "Courier New", monospace;}
				</style>
				@endif
				<input type="button" id="p" value="print" onclick="printPage();" class="btn btn-label-success btn-sm btn-upper">
					
					<div align="center" class="x">
						<img alt="aa" src="http://localhost/salepropos/public/{{ $setting->site_logo }}" width="200px" height="auto" class="image" /><br><br>
						<!-- <p>{{ $setting->site_logo }}</p> -->
						<h1 class="title" style="margin: 12px;">{{ $setting->company_name }}</h1>
						<p class="title" style="margin: -10px;">{{ $setting->address }}</p>
						<p class="title"><strong>Phone:</strong> {{ $setting->phone }}  <strong> Email:</strong> {{ $setting->email }}</p>	
						<p class="date"><strong>Date:</strong> {{ $date }}</p>
					</div>
					<p class="report">Monthly Purchase Report</p>
					<table style="border-top: 1px solid #dee2e6; border-bottom: 1px solid #dee2e6; border: 1px solid black;" border="1px" width="100%">
						<thead>
							<tr>
								
						    	<th colspan="14" class="text-center year a">{{$year}}</th>
						    	
						    </tr>
						</thead>
					    <tbody>
					    	
						    <tr>
						      <td class="a"></td>
						      <td class="a"><strong>January</strong></td>
						      <td class="a"><strong>February</strong></td>
						      <td class="a"><strong>March</strong></td>
						      <td class="a"><strong>April</strong></td>
						      <td class="a"><strong>May</strong></td>
						      <td class="a"><strong>June</strong></td>
						      <td class="a"><strong>July</strong></td>
						      <td class="a"><strong>August</strong></td>
						      <td class="a"><strong>September</strong></td>
						      <td class="a"><strong>October</strong></td>
						      <td class="a"><strong>November</strong></td>
						      <td class="a"><strong>December</strong></td>
						     
						    </tr>
						    <tr>
						    	<td class="a"><strong>Product Discount</strong></td>
						    	
						    	@foreach($total_discount as $key => $discount)
						        <td>
						        	@if($discount > 0)
							      	<span>{{$discount}}</span><br><br>
							      	@else
							      	<span class="a"></span><br><br>
							      	@endif	
						        </td>
						       
						        @endforeach
						        
						    </tr>
						    <tr>
						    	<td class="a">
						    		<strong>Order Discount</strong>
						    	</td>
						    	
						    	@foreach($total_discount as $key => $discount)
						    	<td>
						    		@if($order_discount[$key] > 0)
							      	<span class="a">{{$order_discount[$key]}}</span><br><br>
							    	@endif
							    </td>
							     
							    @endforeach
							    
						    </tr>
						    <tr>
						    	<td class="a">
						    		<strong>Product Tax</strong>
						    	</td>
						    	
						    	@foreach($total_discount as $key => $discount)
						    	<td>
						    		@if($total_tax[$key] > 0)
							      	<span class="a">{{$total_tax[$key]}}</span><br><br>
							    	@endif
							    </td>
							      
							    @endforeach
							    
						    </tr>
						    <tr>
						    	<td class="a">
						    		<strong>Order Tax</strong>
						    	</td>
						    	
						    	@foreach($total_discount as $key => $discount)
						    	<td>
						    		@if($order_tax[$key] > 0)
							      	<span class="a">{{$order_tax[$key]}}</span><br><br>
							    	@endif
							    </td>
							     
							    @endforeach
							   
						    </tr>
						    <tr>
						    	<td class="a">
						    		<strong>Shipping Cost</strong>
						    	</td>
						    	
						    	@foreach($total_discount as $key => $discount)
						    	<td>
						    		@if($shipping_cost[$key] > 0)
							      	<span class="a">{{$shipping_cost[$key]}}</span><br><br>
							    	@endif
							    </td>
							     
							    @endforeach
							    
						    </tr>
						    <tr>
						    	<td class="a">
						    		<strong>grand total</strong>
						    	</td>
						    	
						    	@foreach($total_discount as $key => $discount)
						    	<td class="grand_total">
						    		@if($grand_total[$key] > 0)
							      	<span class="a">{{$grand_total[$key]}}</span><br><br>
							    	@endif

							    </td>
							    
							    @endforeach
							    
						    </tr>
					    </tbody>
					</table>
<br>
<br>
<br>
<br>
<p>Developed By {{ $setting->developed_by }}</p>

<script type="text/javascript">
        function printPage() {
            window.print();
        }
</script>