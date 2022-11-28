@extends('layout.main')

@section('content')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
<style type="text/css">
  .a{
    font-size: 16px;
    font-weight: 700;
  }
</style><br>
<h1 style="text-align: center;">{{ $detail->name }} ({{ $detail->code }}) </h1>

<div class="col-md-15">
              <div class="card col-md-25">
               <br>
                <ul class="nav nav-tabs a" role="tablist">

                  <li class="nav-item" >
                    <a class="nav-link active" href="#product-detail" role="tab" data-toggle="tab">Product Detail</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#sales-detail" role="tab" data-toggle="tab">Sales</a>
                  </li>
                  <li class="nav-item" >
                    <a class="nav-link" href="#purchase-detail" role="tab" data-toggle="tab">Purchase</a>
                  </li>
                  <li class="nav-item" >
                    <a class="nav-link" href="#transfer-detail" role="tab" data-toggle="tab">Transfer</a>
                  </li>
                   <li class="nav-item" >
                    <a class="nav-link" href="#adjustment-detail" role="tab" data-toggle="tab">Adjustment</a>
                  </li>
                  <li class="nav-item" >
                    <a class="nav-link" href="#return-detail" role="tab" data-toggle="tab">Return</a>
                  </li>
   
                </ul>

                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade show active" id="product-detail">
                   
                       <div style="padding: 10px 20px;">
                        
                         
                           <?php $images = explode(",", $lims_product_data->image)?>
                                @foreach($images as $key => $image)
                                    <tr>
                                                   
                                         <td>
                                              <img src="{{url('public/images/product', $image)}}" height="100" width="100">
                                                       
                                          </td>
                                                   
                            @endforeach
                       </div>
                       <div style="padding: 10px 20px;"> 
                       		<strong>Type:</strong>  {{ $detail->type }}	
                       </div>
                       @if($detail->name)
                       <div style="padding: 10px 20px;">
                        	<strong>Name:</strong>  {{ $detail->name }}
                       
                       </div>
                       @endif
                       @if($detail->code)
                       <div style="padding: 10px 20px;">
                       		<strong>Code:</strong>  {{ $detail->code }}
                       </div>
                       @endif
                       @if($detail->brand)
                       <div style="padding: 10px 20px;">
                       		<strong>Brand:</strong>  {{ $detail->brand->title }}
                       </div>
                       @endif
                       @if($detail->category)
                        <div style="padding: 10px 20px;">
                       		<strong>Category:</strong>  {{ $detail->category->name }}
                       </div>
                       @endif
                       @if($detail->qty)
                        <div style="padding: 10px 20px;">
                       		<strong>Quantity:</strong>  {{ $detail->qty }}
                       </div>
                       @endif
                       @if($detail->unit)
                       <div style="padding: 10px 20px;">
                       		<strong>Unit:</strong>  {{ $detail->unit->unit_name }}
                       </div>
                       @endif
                       @if($detail->cost)
                        <div style="padding: 10px 20px;">
                       		<strong>cost:</strong>  {{ $detail->cost }}
                       </div>
                       @endif
                       @if($detail->price)
                        <div style="padding: 10px 20px;">
                       		<strong>price:</strong>  {{ $detail->price }}
                       </div>
                       @endif

                       @if($detail->tax_id)
                       <div style="padding: 10px 20px;">
                       		<strong>Tax:</strong>  {{ $detail->tax->name }} 	
                       </div>
                       @else
                       <div style="padding: 10px 20px;">
                         <strong>Tax:</strong>  N/A
                       </div>
                       @endif

                       <div style="padding: 10px 20px;">
                        @if($detail->tax_method)
                       	@if($detail->tax_method == 1)
                       		<strong>Tax Method:</strong>  Exclusive
                       	@else
                       		<strong>Tax Method:</strong>  Inclusive
                        @endif
                        @endif
                       </div>

                       <div style="padding: 10px 20px;">
                       		<strong>Alert Quantity:</strong>  {{ $detail->alert_quantity }}
                       </div>
                       <div style="padding: 10px 20px;">
                       		<strong>Product Detail:</strong>
                          <textarea style="display: none;" id="editorCopy" name="body">{{ $lims_product_data->product_details }}</textarea>

                          <div id="editor">
                          </div>
                       </div>
                      
                    
                  </div>


                  <div role="tabpanel" class="tab-pane fade" id="sales-detail">
                      <div class="table-responsive"><br>
                        <table class="table" id="example">
                          <thead>
                            <tr>
                             
                              <th>{{trans('file.Date')}}</th>
                              <th>{{trans('file.reference')}}</th>
                              <th>{{trans('file.Biller')}}</th>
                              <th>{{trans('file.customer')}}</th>
                              <th>{{trans('file.Sale Status')}}</th>
                              <th>{{trans('file.Payment Status')}}</th>
                              <th>{{trans('file.grand total')}}</th>
                              <th>{{trans('file.Paid')}}</th>
                              <th>{{trans('file.Due')}}</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($sale as $row)
                              <tr>
                                
                                <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                <td>{{ $row->reference_no }}</td>
                                <td>{{ $row->biller->name }}</td>
                                <td>{{ $row->customer->name }}</td>
                                @if($row->sale_status == 1)
                                <td>Completed</td>
                                @else
                                <td>Draft</td>
                                @endif

                                @if($row->payment_status == 1)
                                <td>Pending</td>
                                @elseif($row->payment_status == 2)
                                <td>Due</td>
                                @elseif($row->payment_status == 3)
                                <td>Partial</td>
                                @else
                                <td>Paid</td>
                                @endif
                                <td>{{ $row->grand_total }}</td>
                                <td>{{ $row->paid_amount }}</td>
                                <td>{{ $row->grand_total - $row->paid_amount }}</td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>


                  <div role="tabpanel" class="tab-pane fade" id="purchase-detail">
                      <div class="table-responsive"><br>
                         <table class="table" id="example1">
                          <thead>
                            <tr>
                              <th>{{trans('file.Date')}}</th>
                             
                              <th>{{trans('file.reference')}}</th>
                              <th>Expire Warranty</th>
                              <th>Quantity</th>
                              <th>{{trans('file.Supplier')}}</th>
                              <th>{{trans('file.Purchase Status')}}</th>
                              <th>Grand Total</th>
                              <th>{{trans('file.Paid')}}</th>
                              <th>{{trans('file.Due')}}</th>
                              <th>{{trans('file.Payment Status')}}</th>
                              
            
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($purchase as $row)
                              <tr>
                                
                                <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                
                                <td>{{ $row->reference_no }}</td>
                                <td>{{ date('d-m-Y', strtotime($row->expire_date)) }}</td>
                                <td>{{ $row->qty }}</td>
                                @if($row->supplier)
                                <td>{{ $row->supplier->name }}</td>
                                @else
                                <td></td>
                                @endif
                                @if($row->status == 1)
                                 <td>Received</td>
                                 @else
                                 <td>Ordered</td>
                                 @endif
                                <td>{{ $row->grand_total }}</td>
                                
                                <td>{{ $row->paid_amount }}</td>
                               

                               
                                <td>{{ $row->grand_total - $row->paid_amount }}</td>
                              
                                @if($row->payment_status == 2)
                                <td>Paid</td>
                                @else
                                <td>Due</td>
                                @endif
                                
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>



                   <div role="tabpanel" class="tab-pane fade" id="transfer-detail">
                      <div class="table-responsive"><br>
                         <table class="table" id="example2">
                          <thead>
                            <tr>
                              
                              <th>{{trans('file.Date')}}</th>
                              <th>{{trans('file.reference')}}</th>
                              <th>Warehouse(From)</th>
                              <th>Warehouse(To)</th>
                              
                              <th>Product Cost</th>
                              <th>Product Tax</th>
                              <th>Grand Total</th>
                              <th>Status</th>
                              
                              
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($transfer as $row)
                              <tr>
                                
                                <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                <td>{{ $row->reference_no }}</td>
                                
                                <td>{{ $row->fromWarehouse->name}}</td>
                              
                              
                                 <td>{{ $row->toWarehouse->name }}</td>
                                
                                <td>{{ $row->total_cost}}</td>
                                
                                <td>{{ $row->total_tax }}</td>
                               

                               
                                <td>{{ $row->grand_total }}</td>
                              
                               @if($row->status == 1)
                               <td>Completed</td>
                               @elseif($row->status == 2)
                               <td>Pending</td>
                               @else
                               <td>Sent</td>
                               @endif
                               
                                
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>


                  <div role="tabpanel" class="tab-pane fade" id="adjustment-detail">
                      <div class="table-responsive"><br>
                         <table class="table" id="example3">
                          <thead>
                            <tr>
                              
                              <th>{{trans('file.Date')}}</th>
                              <th>{{trans('file.reference')}}</th>
                              <th>Warehouse</th>  
                              
                              <th>Note</th>
                              
                              
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($adjustment as $row)
                              <tr>
                                
                                <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                <td>{{ $row->reference_no }}</td>
                                
                                <td>{{ $row->name}}</td>

                                <td>{{ $row->note }}</td>
    
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>


                  <div role="tabpanel" class="tab-pane fade" id="return-detail">
                      <div class="table-responsive"><br>
                        <label style="font-weight: 700;">Sales Return</label>
                         <table class="table" id="example4">
                          <thead>
                            <tr>
                              
                              <th>{{trans('file.Date')}}</th>
                              <th>{{trans('file.reference')}}</th>
                              <th>Biller</th>  
                              
                              <th>Customer</th>
                              <th>Warehouse</th>
                              <th>Grand Total</th>
                              
                              
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($return as $row)
                              <tr>
                                
                                <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                <td>{{ $row->reference_no }}</td>
                                
                                <td>{{ $row->biller->name}}</td>

                                <td>{{ $row->customer->name }}</td>
                                <td>{{ $row->warehouse->name }}</td>
                                <td>{{ $row->grand_total }}</td>
    
                              </tr>
                            @endforeach
                          </tbody>
                        </table><br><br>

                         <label style="font-weight: 700;">Purchase Return</label>
                         <table class="table" id="example5">
                          <thead>
                            <tr>
                              
                              <th>{{trans('file.Date')}}</th>
                              <th>{{trans('file.reference')}}</th>
                           
                              <th>Warehouse</th>
                              <th>Supplier</th>
                              <th>Account</th>
                              <th>Grand Total</th>
                              
                              
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($return_purchase as $row)
                              <tr>
                                
                                <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                <td>{{ $row->reference_no }}</td>
                                
                                <td>{{ $row->warehouse->name}}</td>

                                <td>{{ $row->supplier->name }}</td>
                                <td>{{ $row->account->name }}</td>
                                <td>{{ $row->grand_total }}</td>
    
                              </tr>
                            @endforeach
                          </tbody>
                        </table>



                      </div>
                  </div>

               
                  
                </div>
              </div>
            </div>

<script type="text/javascript">
 $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example4').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example5').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<script type="text/javascript">
  $('#editor').html($('#editorCopy').val());

    $('#postSubmit').click(function () {
         $('#editorCopy').val($('#editor').html());
    });
</script>
@endsection

