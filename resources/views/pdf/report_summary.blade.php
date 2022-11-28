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

<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css'>
                    <div class="x">
                        <img src="{{ $setting->site_logo }}" class="image" /><br><br>
                        <h1 class="title" style="margin: 12px;">{{ $setting->company_name }}</h1>
                        <p class="title" style="margin: -10px;">{{ $setting->address }}</p>
                        <p class="title"><strong>Phone:</strong> {{ $setting->phone }}  <strong> Email:</strong> {{ $setting->email }}</p>  
                        <p class="date"><strong>Date:</strong> {{ $date }}</p>
                    </div>
                    <p class="report">Summary Report</p>

<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
     <div class="card">
        
         <!-- purchase -->
         <div class="card-body">
            <h3 class="mb-0">Purchases</h3>
             <div class="table-responsive-sm">
                 <table class="table table-striped" width="100%" border="1px">
                     <thead >
                         <tr>
                             
                             <th>Amount</th>
                             <th>Purchase</th>
                             <th class="right">Paid</th>
                             <th class="center">Tax</th>
                             
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             
                             <td class="left strong">{{number_format((float)$purchase[0]->grand_total, 2, '.', '') }}</td>
                             <td class="left">{{$total_purchase}}</td>
                             <td class="right">{{number_format((float)$purchase[0]->paid_amount, 2, '.', '')}}</td>
                             <td class="center">{{number_format((float)$purchase[0]->tax, 2, '.', '')}}</td>
                            
                         </tr>
                        
                        
                         
                     </tbody>
                 </table>
                 <br>
                
             </div>
             
         </div>

         <!-- sale -->
         <div class="card-body">
            <h3 class="mb-0">Sale</h3>
             <div class="table-responsive-sm">
                 <table class="table table-striped" width="100%" border="1px">
                     <thead>
                         <tr>
                             
                             <th>Amount</th>
                             <th>Sale</th>
                             <th class="right">Paid</th>
                             <th class="center">Tax</th>
                             
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             
                             <td class="left strong">{{number_format((float)$sale[0]->grand_total, 2, '.', '') }}</td>
                             <td class="left">{{$total_sale}}</td>
                             <td class="right">{{number_format((float)$sale[0]->paid_amount, 2, '.', '')}}</td>
                             <td class="center">{{number_format((float)$sale[0]->tax, 2, '.', '')}}</td>
                            
                         </tr>
                        
                        
                         
                     </tbody>
                 </table>
                 <br>
                
             </div>
             
         </div>

          <!-- sale Return -->
         <div class="card-body">
            <h3 class="mb-0">Sale Return</h3>
             <div class="table-responsive-sm">
                 <table class="table table-striped" width="100%" border="1px">
                     <thead>
                         <tr>
                             
                             <th>Amount</th>
                             <th>Return</th>
                   
                             <th class="center">Tax</th>
                             
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             
                             <td class="left strong">{{number_format((float)$return[0]->grand_total, 2, '.', '') }}</td>
                             <td class="left">{{$total_return}}</td>
                           
                             <td class="center">{{number_format((float)$return[0]->tax, 2, '.', '')}}</td>
                            
                         </tr>
                        
                        
                         
                     </tbody>
                 </table>
                 <br>
                
             </div>
             
         </div>
         <!-- sale return end -->

          <!-- Purchase Return -->
         <div class="card-body">
            <h3 class="mb-0">Purchase Return</h3>
             <div class="table-responsive-sm">
                 <table class="table table-striped" width="100%" border="1px">
                     <thead>
                         <tr>
                             
                             <th>Amount</th>
                             <th>Return</th>
                   
                             <th class="center">Tax</th>
                             
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             
                             <td class="left strong">{{number_format((float)$purchase_return[0]->grand_total, 2, '.', '') }}</td>
                             <td class="left">{{$total_purchase_return}}</td>
                           
                             <td class="center">{{number_format((float)$purchase_return[0]->tax, 2, '.', '')}}</td>
                            
                         </tr>
                        
                        
                         
                     </tbody>
                 </table>
                 <br>
                
             </div>
             
         </div>
         <!-- Purchase return end -->

         <!-- Profit/loss -->
         <div class="card-body">
            <h3 class="mb-0">Profit/Loss</h3>
             <div class="table-responsive-sm">
                 <table class="table table-striped" width="100%" border="1px">
                     <thead>
                         <tr>
                             
                             <th>Sale</th>
                             <th>Purchase</th>
                   
                             <th class="center">Profit</th>
                             
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             
                             <td class="left strong">{{number_format((float)$sale[0]->grand_total, 2, '.', '')}}</td>
                             <td class="left">{{number_format((float)$purchase[0]->grand_total, 2, '.', '')}}</td>
                           
                             <td class="center">{{number_format((float)$purchase_return[0]->tax, 2, '.', '')}}</td>
                            
                         </tr>
                        
                        
                         
                     </tbody>
                 </table>
                 <br>
                
             </div>
             
         </div>
         <!-- Profit/loss end -->

          <!-- Profit/loss -->
         <div class="card-body">
            <h3 class="mb-0">Profit/Loss</h3>
             <div class="table-responsive-sm">
                 <table class="table table-striped" width="100%" border="1px">
                     <thead>
                         <tr>
                             
                             <th>Sale</th>
                             <th>Purchase</th>
                             <th>Sale Return</th>
                             <th>Purchase Return</th>
                   
                             <th class="center">Profit</th>
                             
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             
                             <td class="left strong">{{number_format((float)$sale[0]->grand_total, 2, '.', '')}}</td>
                             <td class="left">{{number_format((float)$purchase[0]->grand_total, 2, '.', '')}}</td>
                           
                             <td class="center">{{number_format((float)$return[0]->grand_total, 2, '.', '')}}</td>
                             <td class="center">{{number_format((float)$purchase_return[0]->grand_total, 2, '.', '')}}</td>
                             <td class="center">{{number_format((float)($sale[0]->grand_total - $purchase[0]->grand_total - $return[0]->grand_total + $purchase_return[0]->grand_total), 2, '.', '') }}</td>
                            
                         </tr>
                        
                        
                         
                     </tbody>
                 </table>
                 <br>
                
             </div>
             
         </div>
         <!-- Profit/loss end -->

<br>
<br>
<br>
<br>
<br>
<br>
         <!-- Net Profit/ Net loss -->
         <div class="card-body">
            <h3 class="mb-0">Net Profit/ Net loss</h3>
             <div class="table-responsive-sm">
                 <h4>{{number_format((float)(($sale[0]->grand_total-$sale[0]->tax) - ($purchase[0]->grand_total-$purchase[0]->tax) - ($return[0]->grand_total-$return[0]->tax) + ($purchase_return[0]->grand_total-$purchase_return[0]->tax)), 2, '.', '') }}</h4>

                 <p>({{trans('file.Sale')}} {{number_format((float)($sale[0]->grand_total), 2, '.', '')}} - {{trans('file.Tax')}} {{number_format((float)($sale[0]->tax), 2, '.', '')}}) - ({{trans('file.Purchase')}} {{number_format((float)($purchase[0]->grand_total), 2, '.', '')}} - {{trans('file.Tax')}} {{number_format((float)($purchase[0]->tax), 2, '.', '')}}) - ({{trans('file.Return')}} {{number_format((float)($return[0]->grand_total), 2, '.', '')}} - {{trans('file.Tax')}} {{number_format((float)($return[0]->tax), 2, '.', '')}}) + ({{trans('file.Purchase Return')}} {{number_format((float)($purchase_return[0]->grand_total), 2, '.', '')}} - {{trans('file.Tax')}} {{number_format((float)($purchase_return[0]->tax), 2, '.', '')}})</p>
                
             </div>
             
         </div>
         <!-- Net Profit/ Net loss end -->

          <!-- Payment received -->
         <div class="card-body">
            <h3 class="mb-0">Payment Received</h3>
             <div class="table-responsive-sm">
                 <table class="table table-striped" width="100%" border="1px">
                     <thead>
                         <tr>
                             
                             <th>Amount</th>
                             <th>Received</th>
                             <th>Cash</th>
                             <th>Cheque</th>
                             <th>Credit Card</th>
                             <th>Gift Card</th>
                             <th>Paypal</th>
                             <th>Deposit</th>
                   
                             
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             
                             <td class="left strong">{{number_format((float)$payment_recieved, 2, '.', '') }}</td>
                             <td class="left">{{$payment_recieved_number}}</td>
                           
                             <td class="center">{{number_format((float)$cash_payment_sale, 2, '.', '')}}</td>
                             <td class="center">{{number_format((float)$cheque_payment_sale, 2, '.', '')}}</td>
                             <td class="center">{{number_format((float)$credit_card_payment_sale, 2, '.', '')}}</td>
                             <td class="center">{{number_format((float)$gift_card_payment_sale, 2, '.', '')}}</td>
                             <td class="center">{{number_format((float)$paypal_payment_sale, 2, '.', '')}}</td>
                             <td class="center">{{number_format((float)$deposit_payment_sale, 2, '.', '')}}</td>
                            
                         </tr>
                        
                        
                         
                     </tbody>
                 </table>
                 <br>
                
             </div>
             
         </div>
         <!-- Payment Recieved end -->

           <!-- Payment Sent -->
         <div class="card-body">
            <h3 class="mb-0">Payment Sent</h3>
             <div class="table-responsive-sm">
                 <table class="table table-striped" width="100%" border="1px">
                     <thead>
                         <tr>
                             
                             <th>Amount</th>
                             <th>Received</th>
                             <th>Cash</th>
                             <th>Cheque</th>
                             <th>Credit Card</th>
                             
                   
                             
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             
                             <td class="left strong">{{number_format((float)$payment_sent, 2, '.', '') }}</td>
                             <td class="left">{{$payment_sent_number}}</td>
                           
                             <td class="center">{{number_format((float)$cash_payment_purchase, 2, '.', '')}}</td>
                             <td class="center">{{number_format((float)$cheque_payment_purchase, 2, '.', '')}}</td>
                             <td class="center">{{number_format((float)$credit_card_payment_purchase, 2, '.', '')}}</td>
                            
                            
                         </tr>
                        
                        
                         
                     </tbody>
                 </table>
                 <br>
                
             </div>
             
         </div>
         <!-- Payment Sent end -->

            <!-- Expense -->
         <div class="card-body">
            <h3 class="mb-0">Expense</h3>
             <div class="table-responsive-sm">
                 <table class="table table-striped" width="100%" border="1px">
                     <thead>
                         <tr>
                             
                             <th>Amount</th>
                             <th>Expense</th>
      
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             
                             <td class="left strong">{{number_format((float)$expense, 2, '.', '') }}</td>
                             <td class="left">{{$total_expense}}</td>
    
                         </tr>
      
                     </tbody>
                 </table>
                 <br>
                
             </div>
             
         </div>
         <!-- Expense end -->

            <!-- Payroll -->
         <div class="card-body">
            <h3 class="mb-0">Payroll</h3>
             <div class="table-responsive-sm">
                 <table class="table table-striped" width="100%" border="1px">
                     <thead>
                         <tr>
                             
                             <th>Amount</th>
                             <th>Payroll</th>
      
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             
                             <td class="left strong">{{number_format((float)$payroll, 2, '.', '') }}</td>
                             <td class="left">{{$total_payroll}}</td>
    
                         </tr>
      
                     </tbody>
                 </table>
                 <br>
                
             </div>
             
         </div>
         <!-- Payroll end -->

      <!-- Cash in Hand-->
         <div class="card-body">
            <h3 class="mb-0">Cash in Hand</h3>
             <div class="table-responsive-sm">
                 <table class="table table-striped" width="100%" border="1px">
                     <thead>
                         <tr>
                             
                             <th>Received</th>
                             <th>Sent</th>
                             <th>Sale Return</th>
                             <th>Purchase Return</th>
                             <th>Expense</th>
                             <th>Payroll</th>
                             <th>In Hand</th>
      
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             
                             <td class="left strong">{{number_format((float)($payment_recieved), 2, '.', '') }}</td>
                             <td class="left">{{number_format((float)($payment_sent), 2, '.', '') }}</td>
                             <td class="left">{{number_format((float)$return[0]->grand_total, 2, '.', '')}}</td>
                             <td class="left">{{number_format((float)$purchase_return[0]->grand_total, 2, '.', '')}}</td>
                             <td class="left">{{number_format((float)$expense, 2, '.', '')}}</td>
                             <td class="left">{{number_format((float)$payroll, 2, '.', '')}}</td>
                             <td class="left">{{number_format((float)($payment_recieved - $payment_sent - $return[0]->grand_total + $purchase_return[0]->grand_total - $expense - $payroll), 2, '.', '') }}</td>
    
                         </tr>
      
                     </tbody>
                 </table>
                 <br>
                
             </div>
             
         </div>
         <!-- Cash in Hand end -->
<br>
<br>
<br>
<br>
         <!-- Warehouse-->
         @foreach($warehouse_name as $key => $name)
         <div class="card-body">
            <h3 class="mb-0">{{$name}}</h3>
             <div class="table-responsive-sm">
                 
                 <h4 class="text-center mt-3">{{number_format((float)($warehouse_sale[$key][0]->grand_total - $warehouse_purchase[$key][0]->grand_total - $warehouse_return[$key][0]->grand_total + $warehouse_purchase_return[$key][0]->grand_total), 2, '.', '') }}</h4>
						<p class="text-center">
							{{trans('file.Sale')}} {{number_format((float)($warehouse_sale[$key][0]->grand_total), 2, '.', '')}} - {{trans('file.Purchase')}} {{number_format((float)($warehouse_purchase[$key][0]->grand_total), 2, '.', '')}} - {{trans('file.Sale Return')}} {{number_format((float)($warehouse_return[$key][0]->grand_total), 2, '.', '')}} + {{trans('file.Purchase Return')}} {{number_format((float)($warehouse_purchase_return[$key][0]->grand_total), 2, '.', '')}}
						</p>

				<h4 class="text-center">{{number_format((float)(($warehouse_sale[$key][0]->grand_total - $warehouse_sale[$key][0]->tax) - ($warehouse_purchase[$key][0]->grand_total - $warehouse_purchase[$key][0]->tax) - ($warehouse_return[$key][0]->grand_total - $warehouse_return[$key][0]->tax) + ($warehouse_purchase_return[$key][0]->grand_total - $warehouse_purchase_return[$key][0]->tax) ), 2, '.', '') }}</h4>
						<p class="text-center">
							 {{trans('file.Net Sale')}} {{number_format((float)($warehouse_sale[$key][0]->grand_total - $warehouse_sale[$key][0]->tax), 2, '.', '')}} -  {{trans('file.Net Purchase')}} {{number_format((float)($warehouse_purchase[$key][0]->grand_total - $warehouse_purchase[$key][0]->tax), 2, '.', '')}} - {{trans('file.Net Sale Return')}} {{number_format((float)($warehouse_return[$key][0]->grand_total - $warehouse_return[$key][0]->tax), 2, '.', '')}} + {{trans('file.Net Purchase Return')}} {{number_format((float)($warehouse_purchase_return[$key][0]->grand_total - $warehouse_purchase_return[$key][0]->tax), 2, '.', '')}}
						</p>
				<h4 class="text-center">{{number_format((float)$warehouse_expense[$key], 2, '.', '') }}</h4>
						<p class="text-center">{{trans('file.Expense')}}</p>
                
             </div>
             
         </div>
         @endforeach
         <!-- Warehouse end -->
        
     </div>
 </div>
<br>
<p>Developed By {{ $setting->developed_by }}</p>


 <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js'></script>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>