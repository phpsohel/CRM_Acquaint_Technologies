@extends('layout.main') @section('content')

    @if(empty($product_name))
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{'No Data exist between this date range!'}}</div>
    @endif

    <section class="forms">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header mt-2">
                    <h3 class="text-center">Lead Report</h3>
                </div>
                {!! Form::open(['route' => 'report.lead', 'method' => 'post']) !!}
                <div class="row mb-3">
                    <div class="col-md-3 offset-md-1">
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
                            <label class="d-tc"><strong> Select Lead Category</strong> &nbsp;</label>
                            <div class="d-tc">
                                <input type="hidden" name="lead_cat_id_hidden" value="{{$lead_cat_id}}" />
                                <select id="lead_cat_id" name="lead_cat_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" >
                                    <option value="0">All Lead Category</option>
                                    @foreach($lims_lead_category_list as $lead_cat)
                                        <option value="{{$lead_cat->id}}">{{$lead_cat->lead_cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group row">
                            <label class="d-tc"><strong> Select Lead Source</strong> &nbsp;</label>
                            <div class="d-tc">
                                <input type="hidden" name="lead_source_id_hidden" value="{{$lead_source_id}}" />
                                <select id="lead_source_id" name="lead_source_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" >
                                    <option value="0">All Lead Source</option>
                                    @foreach($lims_source_list as $lead_source)
                                        <option value="{{$lead_source->id}}">{{$lead_source->source_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group row">
                            <label class="d-tc"><strong> Select Lead Status</strong></label>
                            <div class="d-tc">
                                <input type="hidden" name="lead_status_id_hidden" value="{{$lead_status_id}}" />
                                <select id="lead_status_id" name="lead_status_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" >
                                    <option value="0">All Lead Status</option>
                                    @foreach($lims_status_list as $lead_status)
                                        <option value="{{$lead_status->id}}">{{$lead_status->status_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2" style="margin-top: 27px;">
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
                    <th>Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Lead Category</th>
                    <th>Employee</th>
                    <th>Stage</th>
                </tr>
                </tr>
                </thead>
                <tbody>
                @foreach($lims_lead_data as $key=>$lead)
                    <tr data-id="{{$lead->id}}">
                        <td>{{$key}}</td>
                        <td>{{date($general_setting->date_format, strtotime($lead->date))}}</td>
                        <td>{{ $lead->name }}</td>
                        <td>{{ $lead->company }}</td>
                        <td>{{ $lead->email }}</td>
                        <td>{{ $lead->phone_number }}</td>
                        <td>{{ $lead->address }}</td>
                        <td>{{ $lead->lead_category->lead_cat_name }}</td>
                        <td>{{ $lead->employee->name}}</td>

                        @if($lead->stage == 1 )
                            <td>
                                <a href="#" class="btn btn-danger"><strong> Unapproved</strong></a>
                            </td>
                        @elseif($lead->stage == 2)
                            <td>
                                <a href="#" class="btn btn-success"> <strong>Approved</strong></a>
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


    <script type="text/javascript">
        $("ul#report").siblings('a').attr('aria-expanded','true');
        $("ul#report").addClass("show");
        $("ul#report #sale-report-menu").addClass("active");

        $('#lead_cat_id').val($('input[name="lead_cat_id_hidden"]').val());
        $('#lead_source_id').val($('input[name="lead_source_id_hidden"]').val());
        $('#employee_id').val($('input[name="employee_id_hidden"]').val());
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