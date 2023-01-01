@extends('layout.main')
@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
@endsection
@section('content')
 
    <style type="text/css">
        .a{
            font-size: 16px;
            font-weight: 700;
        }
    </style><br>
    {{--<h1 style="text-align: center;">{{ $detail->name }} ({{ $detail->code }}) </h1>--}}

    <div class="col-md-12">
        <div class="card col-md-12">
            <br>
            <ul class="nav nav-tabs a" role="tablist">

                <li class="nav-item" >
                    <a class="nav-link active" href="#product-detail" role="tab" data-toggle="tab">Lead Detail</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#remainder" role="tab" data-toggle="tab">Reminder</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" href="#quotation" role="tab" data-toggle="tab">Quotation</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" href="#sales" role="tab" data-toggle="tab">Sales</a>
                </li>

                <li class="nav-item" >
                    <a class="nav-link" href="#projects" role="tab" data-toggle="tab">Project</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" href="#tickets" role="tab" data-toggle="tab">Ticket</a>
                </li>

            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade show active" id="product-detail">
                    <br>
                    @if($lead->name ?? '')
                        <div style="padding: 10px 20px;">
                            <strong>Name:</strong>  {{ $lead->name ?? '' }}

                        </div>
                    @endif
                    @if($lead->company ?? '')
                        <div style="padding: 10px 20px;">
                            <strong>Company:</strong>  {{ $lead->company ?? '' }}
                        </div>
                    @endif
                    @if($lead->email ?? '')
                        <div style="padding: 10px 20px;">
                            <strong>Email:</strong>  {{ $lead->email  ?? ''}}
                        </div>
                    @endif
                    @if($lead->phone_number ?? '')

                        <div style="padding: 10px 20px;">
                            <strong>Phone Number:</strong>  {{ $lead->phone_number ?? '' }}
                        </div>
                    @endif

                    @if($lead->another_phone_no ?? '')

                        <div style="padding: 10px 20px;">
                            <strong>Another Phone Number:</strong>  {{ $lead->another_phone_no ?? '' }}
                        </div>
                    @endif



                    @if($lead->web ?? '')

                        <div style="padding: 10px 20px;">
                            <strong>Website:</strong>  {{ $lead->web  ?? ''}}
                        </div>
                    @endif
                    @if($lead->address ?? '')

                        <div style="padding: 10px 20px;">
                            <strong>Address:</strong>  {{ $lead->address ?? '' }}
                        </div>
                    @endif

                    @if($lead->employee_id ?? '')

                        <div style="padding: 10px 20px;">
                            <strong>Employee :</strong>  {{ $lead->employee->name ?? '' }}
                        </div>
                    @endif

                    @if($lead->lead_category_id ?? '')

                        <div style="padding: 10px 20px;">
                            <strong>Lead Category :</strong>  {{ $lead->lead_category->lead_cat_name ?? '' }}
                        </div>
                    @endif


                @if($lead->lead_status_id ?? '')

                        <div style="padding: 10px 20px;">
                            <strong>Lead Status:</strong>  {{ $lead->lead_status->status_name ?? "" }}
                        </div>
                    @endif


                    @if($lead->lead_source_id ?? '')

                        <div style="padding: 10px 20px;">
                            <strong>Lead Source:</strong>  {{ $lead->lead_source->source_name ?? '' }}
                        </div>
                    @endif


                    @if($lead->description ?? '')
                        <div style="padding: 10px 20px;">
                            <strong>Description:</strong>  {!! $lead->description ?? '' !!}
                        </div>
                    @endif

                </div>

                <div role="tabpanel" class="tab-pane fade" id="remainder">
                    <div class="table-responsive"><br>
                        <table class="table" id="example">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th style="width: 40%">Details</th>
                                <th> Lead Person</th>
                                <th> Notification Datetime</th>
                                <th>User</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lims_remainder_all as $key=>$remainder)

                                <tr data-id="{{$remainder->id}}">
                                    <td>{{++$key}}</td>
                                    <td style="width: 30%">{!! ($remainder->description ?? '') !!}</td>
                                    <td>{{ $remainder->lead->name ?? ''}} ( {{ $remainder->lead->company ?? '' }} )</td>
                                    <td>{{ \Carbon\Carbon::parse($remainder->noti_datetime ?? '')->format('Y-m-d') }}</td>
                                    <td>{{ $remainder->employee->name ?? '' }}</td>
                                    @if($remainder->stage == 0)
                                        <td> <strong style="color: red">Incomplete</strong></td>
                                    @else
                                        <td> <strong style="color: green">Complete</strong></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="quotation">
                    <div class="table-responsive"><br>
                        <table class="table" id="example2">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>{{trans('file.Date')}}</th>
                                <th>{{trans('file.reference')}}</th>
                                <th>Contact Person</th>
                                <th>User</th>
                                <th>{{trans('file.Quotation Status')}}</th>
                                <th> Stage</th>
                                <th>{{trans('file.grand total')}}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lims_quotation_all as $key=>$quotation)
                                <?php
                                if($quotation->quotation_status == 1)
                                    $status = trans('file.Pending');
                                else
                                    $status = trans('file.Sent');
                                ?>
                                <tr class="quotation-link" data-quotation='["{{date($general_setting->date_format, strtotime($quotation->created_at->toDateString()))}}", "{{$quotation->reference_no}}", "{{$status}}", "{{$quotation->user->name}}", "{{$quotation->user->email}}","{{$quotation->user->name}}", "{{$quotation->user->name}}", "{{$quotation->user->name}}", "{{$quotation->user->name}}", "{{$quotation->lead->name}}", "{{$quotation->lead->phone_number}}", "{{$quotation->lead->address}}", "{{$quotation->lead->company}}", "{{$quotation->id}}", "{{$quotation->total_tax}}", "{{$quotation->total_discount}}", "{{$quotation->total_price}}", "{{$quotation->order_tax}}", "{{$quotation->order_tax_rate}}", "{{$quotation->order_discount}}", "{{$quotation->shipping_cost}}", "{{$quotation->grand_total}}", "{{$quotation->note}}", "{{$quotation->user->name}}", "{{$quotation->user->email}}"]'>

                                    <td>{{++$key}}</td>
                                    <td>{{ date(($general_setting->date_format ?? ''), strtotime($quotation->created_at->toDateString())) . ' '. $quotation->created_at->toTimeString() }}</td>
                                    <td>{{ $quotation->reference_no ?? ''}}</td>
                                    <td>{{ $quotation->lead->name ?? "" }} ( {{ $quotation->lead->company ?? "" }} )</td>
                                    <td>{{ $quotation->user->name ?? '' }}</td>
                                    @if($quotation->quotation_status == 1)
                                        <td><div class="badge badge-danger">{{$status}}</div></td>
                                    @else
                                        <td><div class="badge badge-success">{{$status}}</div></td>
                                    @endif
                                    @if($quotation->stage == 1)
                                        <td><div class="badge badge-danger"> Unapproved</div></td>
                                    @elseif($quotation->stage == 2)
                                        <td><div class="badge badge-success">Approved</div></td>
                                    @else
                                        <td><div class="badge badge-warning">Pending</div></td>
                                    @endif
                                    <td>{{ $quotation->grand_total ?? 0 }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if(!empty($lims_sale_all))
                <div role="tabpanel" class="tab-pane fade" id="sales">
                    <div class="table-responsive"><br>
                        <table class="table" id="example1">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>{{trans('file.date')}}</th>
                                <th>{{trans('file.reference')}}</th>
                                <th>{{trans('file.customer')}}</th>
                                <th>Sale Status</th>
                                <th>Payment Status</th>
                                <th>Ground Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lims_sale_all as $key=>$sale)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{date(($general_setting->date_format ?? ''), strtotime($sale->created_at->toDateString())) }}</td>
                                    <td>{{$sale->reference_no ?? ''}}</td>
                                    <td>{{$sale->customer->name ?? ''}}</td>
                                    @if($sale->sale_status == 1)
                                        <td><div class="badge badge-success">Completed</div></td>
                                    @else
                                        <td><div class="badge badge-danger">Pending</div></td>
                                    @endif

                                    @if($sale->payment_status == 1)
                                        <td><div class="badge badge-danger">Pending</div></td>
                                    @elseif($sale->payment_status == 2)
                                        <td><div class="badge badge-warning">Due</div></td>
                                    @elseif($sale->payment_status == 3)
                                        <td><div class="badge badge-warning">Partial</div></td>
                                    @else
                                        <td><div class="badge badge-success">Paid</div></td>
                                    @endif
                                    <td>{{$sale->grand_total ?? 0}} BDT</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
                @if(!empty($lims_project_all))
                <div role="tabpanel" class="tab-pane fade" id="projects">
                    <div class="table-responsive"><br>
                        <table class="table" id="example3">
                            <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Sale Reference</th>
                                <th>Customer</th>
                                <th>Company</th>
                                <th>Progress</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Grand Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lims_project_all as $project)
                                @php
                                    $sales = App\Sale::where('id',$project->sales_id)->first();
                                @endphp
                                <tr>
                                    <td>{{$project->project_name ?? ""}}</td>
                                    <td>{{$sales->reference_no ?? ""}}</td>
                                    <td>{{$project->customer->name ?? ""}}</td>
                                    <td>{{$project->customer->company_name ?? ""}}</td>
                                    <td>
                                        <progress id="file"  value="{{ $project->progress ?? '' }}" max="100"> {{ $project->progress }}% </progress> {{ $project->progress }}%
                                    </td>
                                    <td>{{date($general_setting->date_format, strtotime($project->start_date)) }}</td>
                                    <td>{{date($general_setting->date_format, strtotime($project->end_date)) }}</td>
                                    <td>{{$sales->grand_total ?? 0}} BDT</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
                @if(!empty($lims_ticket_all))

                <div role="tabpanel" class="tab-pane fade" id="tickets">
                    <div class="table-responsive"><br>
                        <table class="table" id="example4">
                            <thead>
                            <tr>
                                <th>{{trans('file.date')}}</th>
                                <th>Subject</th>
                                <th>Project Name</th>
                                <th>Customer Name</th>
                                <th> Employee</th>
                                <th> Priority</th>
                                <th> Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lims_ticket_all as $ticket)
                                <tr>
                                    <td>{{date($general_setting->date_format, strtotime($ticket->created_at->toDateString())) }}</td>
                                    <td><a target="_blank" href="{{ route('ticket_replies.create_replies', ['id' => $ticket->id]) }}">{{$ticket->subject}}</a></td>
                                    <td>{{$ticket->project->project_name ?? ""}}</td>
                                    <td>{{$ticket->customer->name ?? ""}}</td>
                                    <td>{{$ticket->employee->name ?? ""}}</td>
                                    @if($ticket->priority == 1)
                                        <td>High</td>
                                    @else
                                        <td>Low</td>
                                    @endif
                                    <td>{!! Str::limit(($ticket->description ?? ""), 30, ' ...') !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

@endsection
@section('js')

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


