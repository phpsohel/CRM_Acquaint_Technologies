<style type="text/css">
	table {
       		border-collapse: collapse;
		  }
	.title {text-align: center; font-family: Arial, Helvetica, sans-serif;}
	.report{text-align: center; color: black; height: 3%; padding: 10px; font-weight: bold;
			text-decoration: underline; font-family: Arial, Helvetica, sans-serif;}
	.a{text-align: center; color: black; font-family: Arial, Helvetica, sans-serif;}
	.year{text-align: center; color: black;}
	.b{text-align: center; background-color: #FFF8DC;}
	.c{text-align: center; background-color: #FFFAF0; font-weight: bold;}


	p {text-align: right;}
	.date {text-align: center;
			 padding: 0px 0px 0px 0px;}
	/*.x{ display: inline-block; font-size: small; }*/

	/*.image{
		  margin: auto;
		  width: 10%;
		  padding: 25px 0px 20px 450px;
	}*/
</style>

				@if($setting->logo_position > 0)
					<style type="text/css">
						.image{
						  margin: auto;
						  width: 10%;
						  /*height: 1%;*/
						  padding: 25px 0px 20px 300px;}
					</style>
				@else
					<style type="text/css">
						.image{
						  margin: auto;
						  width: 10%;
						  /*height: 1%;*/
						  padding: 70px 0px 2px 100px;}
					</style>
				@endif

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


					<div class="x">
						<img src="{{ $setting->site_logo }}" class="image" /><br><br>
						<h1 class="title" style="margin: 12px;">{{ $setting->company_name }}</h1>
						<p class="title" style="margin: -10px;">{{ $setting->address }}</p>
						<p class="title"><strong>Phone:</strong> {{ $setting->phone }}  <strong> Email:</strong> {{ $setting->email }}</p>	
						<p class="date"><strong>Date:</strong> {{ $date }}</p>
					</div>
					<p class="report">Daily Purchase Report</p>
<table class="table table-bordered" style="border-top: 1px solid #dee2e6; border-bottom: 1px solid #dee2e6;" border="1px" width="100%">
						<thead>
							<tr>
								
						    	<th colspan="7" class="text-center">{{date("F", strtotime($year.'-'.$month.'-01')).' ' .$year}}</th>
						    	
						    </tr>
						</thead>
					    <tbody>
						    <tr>
							    <td><strong>Sunday</strong></td>
							    <td><strong>Monday</strong></td>
							    <td><strong>Tuesday</strong></td>
							    <td><strong>Wednesday</strong></td>
							    <td><strong>Thrusday</strong></td>
							    <td><strong>Friday</strong></td>
							    <td><strong>Saturday</strong></td>
						    </tr>
						    <?php 
						    	$i = 1;
						    	$flag = 0;
						    	while ($i <= $number_of_day) {
						    		echo '<tr>';
						    		for($j=1 ; $j<=7 ; $j++){
						    			if($i > $number_of_day)
						    				break;

						    			if($flag){
						    				if($year.'-'.$month.'-'.$i == date('Y').'-'.date('m').'-'.(int)date('d'))
						    					echo '<td><p style="color:red"><strong>'.$i.'</strong></p>';
						    				else
						    					echo '<td><p><strong>'.$i.'</strong></p>';

						    				if($total_discount[$i]){
						    					echo '<strong>'.trans("file.Product Discount").'</strong><br><span>'.$total_discount[$i].'</span><br><br>';
						    				}
						    				if($order_discount[$i]){
						    					echo '<strong>'.trans("file.Order Discount").'</strong><br><span>'.$order_discount[$i].'</span><br><br>';
						    				}
						    				if($total_tax[$i]){
						    					echo '<strong>'.trans("file.Product Tax").'</strong><br><span>'.$total_tax[$i].'</span><br><br>';
						    				}
						    				if($order_tax[$i]){
						    					echo '<strong>'.trans("file.Order Tax").'</strong><br><span>'.$order_tax[$i].'</span><br><br>';
						    				}
						    				if($shipping_cost[$i]){
						    					echo '<strong>'.trans("file.Shipping Cost").'</strong><br><span>'.$shipping_cost[$i].'</span><br><br>';
						    				}
						    				if($grand_total[$i]){
						    					echo '<strong>'.trans("file.grand total").'</strong><br><span>'.$grand_total[$i].'</span><br><br>';
						    				}
						    				echo '</td>';
						    				$i++;
						    			}
						    			elseif($j == $start_day){
						    				if($year.'-'.$month.'-'.$i == date('Y').'-'.date('m').'-'.(int)date('d'))
						    					echo '<td><p style="color:red"><strong>'.$i.'</strong></p>';
						    				else
						    					echo '<td><p><strong>'.$i.'</strong></p>';

						    				if($total_discount[$i]){
						    					echo '<strong>'.trans("file.Product Discount").'</strong><br><span>'.$total_discount[$i].'</span><br><br>';
						    				}
						    				if($order_discount[$i]){
						    					echo '<strong>'.trans("file.Order Discount").'</strong><br><span>'.$order_discount[$i].'</span><br><br>';
						    				}
						    				if($total_tax[$i]){
						    					echo '<strong>'.trans("file.Product Tax").'</strong><br><span>'.$total_tax[$i].'</span><br><br>';
						    				}
						    				if($order_tax[$i]){
						    					echo '<strong>'.trans("file.Order Tax").'</strong><br><span>'.$order_tax[$i].'</span><br><br>';
						    				}
						    				if($shipping_cost[$i]){
						    					echo '<strong>'.trans("file.Shipping Cost").'</strong><br><span>'.$shipping_cost[$i].'</span><br><br>';
						    				}
						    				if($grand_total[$i]){
						    					echo '<strong>'.trans("file.grand total").'</strong><br><span>'.$grand_total[$i].'</span><br><br>';
						    				}
						    				echo '</td>';
						    				$flag = 1;
						    				$i++;
						    				continue;
						    			}
						    			else {
						    				echo '<td></td>';
						    			}
						    		}
						    	    echo '</tr>';
						    	}
						    ?>
					    </tbody>
					</table>




<br>
<br>
<p>Developed By {{ $setting->developed_by }}</p>	