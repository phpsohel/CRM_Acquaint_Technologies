@extends('layout.main') @section('content')

    {{--@if(empty($product_name))--}}
    {{--<div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{'No Data exist between this date range!'}}</div>--}}
    {{--@endif--}}

    <section class="forms">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header mt-2">
                    <h3 class="text-center">Lead Reminder Report</h3>
                </div>
                {!! Form::open(['route' => 'report.lead_reminder_report', 'method' => 'post']) !!}
                <div class="row mb-3">
                    <div class="col-md-3" style="margin-left: 30px;">
                        <div class="form-group row">
                            <label class="d-tc"><strong>{{trans('file.Choose Your Date')}}</strong> &nbsp;</label>
                            <div class="d-tc">
                                <div class="input-group">
                                    <input type="text" class="daterangepicker-field form-control" value="{{$start_date}} To {{$end_date}}" required />
                                    <input type="hidden" name="start_date" value="{{$start_date}}" />
                                    <input type="hidden" name="end_date" value="{{$end_date}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group row">
                            <label class="d-tc"><strong> Select User</strong> &nbsp;</label>
                            <div class="d-tc">
                                <input type="hidden" name="user_id_hidden" value="{{$user_id}}" />
                                <select id="user_id" name="user_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" >
                                    <option selected value="0">All User</option>
                                    @foreach($lims_user_list as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group row">
                            <label class="d-tc"><strong> Select Reminder Status</strong> &nbsp;</label>
                            <div class="d-tc">
                                <input type="hidden" name="lead_status_id_hidden" value="{{$stage}}" />
                                <select  id="stage" name="stage" class="form-control selectpicker">
                                    <option value="2" >Select One</option>
                                    <option  value="0">Incomplete</option>
                                    <option  value="1">Complete</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2" style="margin-top: 30px;">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">{{trans('file.submit')}}</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="table-responsive">
            <table id="report-table" class="table table-hover">
                <thead>
                <tr>
                <tr>
                    <th class="not-exported"></th>
                    <th>Date</th>
                    <th>Lead Name</th>
                    <th>Company</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Lead Status</th>
                    <th>User</th>
                    <th>Stage</th>
                </tr>
                </tr>
                </thead>
                <tbody>
                @foreach($lims_reminder_data as $key=>$reminder)


                    <tr data-id="{{$reminder->id}}">
                        <td>{{$key}}</td>
                        <td>{{date($general_setting->date_format, strtotime($reminder->noti_datetime))}}</td>
                        <td>{{ $reminder->lead->name ?? '' }}</td>
                        <td>{{ $reminder->lead->company ?? '' }}</td>
                        <td>{{ $reminder->lead->phone_number ?? ''}}</td>
                        <td>{{ $reminder->lead->address ?? ''}}</td>
                        <td>{{ $reminder->lead->lead_status->status_name ?? '' }}</td>
                        <td>{{ $reminder->user->name ?? ''}}</td>
                        @if($reminder->stage == 0 )
                            <td>
                                <a href="#" class="btn btn-danger"><strong> Incomplete</strong></a>
                            </td>
                        @elseif($reminder->stage == 1)
                            <td>
                                <a href="#" class="btn btn-success"> <strong>Complete</strong></a>
                            </td>
                        @else
                            <td>
                                <a href="#" class="btn btn-warning"> <strong>Pending</strong></a>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>



@endsection

@section('js')
@include('layout.all_data_table_js')
<script type="text/javascript">
    $("ul#report").siblings('a').attr('aria-expanded','true');
    $("ul#report").addClass("show");
    $("ul#report #sale-report-menu").addClass("active");

    $('#user_id').val($('input[name="user_id_hidden"]').val());
    $('#lead_status_id').val($('input[name="lead_status_id_hidden"]').val());
    $('.selectpicker').selectpicker('refresh');

    $('#report-table').DataTable( {
        "order": [],
        'language': {
            'lengthMenu': '_MENU_ {{trans("file.records per page")}}',
            "info":      '<small>{{trans("file.Showing")}} _START_ - _END_ (_TOTAL_)</small>',
            "search":  '{{trans("file.Search")}}',
            'paginate': {
                'previous': '<i class="dripicons-chevron-left"></i>',
                'next': '<i class="dripicons-chevron-right"></i>'
            }
        },
        'columnDefs': [
            {
                "orderable": false,
                'targets': 0
            },
            {
                'render': function(data, type, row, meta){
                    if(type === 'display'){
                        data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                    }

                    return data;
                },
                'checkboxes': {
                    'selectRow': true,
                    'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
                },
                'targets': [0]
            }
        ],
        'select': { style: 'multi',  selector: 'td:first-child'},
        'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: '<"row"lfB>rtip',
        buttons: [
            {
                extend: 'pdf',
                text: '{{trans("file.PDF")}}',
                exportOptions: {
                    columns: ':visible:not(.not-exported)',
                    rows: ':visible'
                },
                action: function(e, dt, button, config) {
                    datatable_sum(dt, true);
                    $.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, button, config);
                    datatable_sum(dt, false);
                },
                footer:true
            },
            {
                extend: 'csv',
                text: '{{trans("file.CSV")}}',
                exportOptions: {
                    columns: ':visible:not(.not-exported)',
                    rows: ':visible'
                },
                action: function(e, dt, button, config) {
                    datatable_sum(dt, true);
                    $.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, button, config);
                    datatable_sum(dt, false);
                },
                footer:true
            },
            {
                extend: 'print',
                text: '{{trans("file.Print")}}',
                exportOptions: {
                    columns: ':visible:not(.not-exported)',
                    rows: ':visible'
                },
                action: function(e, dt, button, config) {
                    datatable_sum(dt, true);
                    $.fn.dataTable.ext.buttons.print.action.call(this, e, dt, button, config);
                    datatable_sum(dt, false);
                },
                footer:true
            },
            {
                extend: 'colvis',
                text: '{{trans("file.Column visibility")}}',
                columns: ':gt(0)'
            }
        ],
        drawCallback: function () {
            var api = this.api();
            datatable_sum(api, false);
        }
    } );

    function datatable_sum(dt_selector, is_calling_first) {
        if (dt_selector.rows( '.selected' ).any() && is_calling_first) {
            var rows = dt_selector.rows( '.selected' ).indexes();

            $( dt_selector.column( 2 ).footer() ).html(dt_selector.cells( rows, 2, { page: 'current' } ).data().sum().toFixed(2));
            $( dt_selector.column( 3 ).footer() ).html(dt_selector.cells( rows, 3, { page: 'current' } ).data().sum());
            $( dt_selector.column( 4 ).footer() ).html(dt_selector.cells( rows, 4, { page: 'current' } ).data().sum().toFixed(2));
        }
        else {
            $( dt_selector.column( 2 ).footer() ).html(dt_selector.column( 2, {page:'current'} ).data().sum().toFixed(2));
            $( dt_selector.column( 3 ).footer() ).html(dt_selector.column( 3, {page:'current'} ).data().sum());
            $( dt_selector.column( 4 ).footer() ).html(dt_selector.column( 4, {page:'current'} ).data().sum().toFixed(2));
        }
    }

    $(".daterangepicker-field").daterangepicker({
        callback: function(startDate, endDate, period){
            var start_date = startDate.format('YYYY-MM-DD');
            var end_date = endDate.format('YYYY-MM-DD');
            var title = start_date + ' To ' + end_date;
            $(this).val(title);
            $('input[name="start_date"]').val(start_date);
            $('input[name="end_date"]').val(end_date);
        }
    });

</script>
@endsection