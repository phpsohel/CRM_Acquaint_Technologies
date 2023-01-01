@extends('layout.main') @section('content')
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div>
@endif
@if(session()->has('not_permitted'))
<div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif

<section>
    <div class="container-fluid">
        @if(in_array("expenses-add", $all_permission))
        <button class="btn btn-info" data-toggle="modal" data-target="#expense-modal"><i class="dripicons-plus"></i> {{trans('file.Add Expense')}}</button>
        @endif
        <br>
        <br>
    </div>
    <div class="table-responsive">
        <table id="expense-table" class="table">
            <thead>
                <tr class="text-center">


                    <th class="not-exported"></th>
                    <th>Date</th>
                    <th> Bill Number</th>
                    <th>Name</th>
                    <th>Note</th>
                    {{-- <th>{{trans('file.Warehouse')}}</th> --}}
                    <th style="width: 12%">Category</th>

                    <th style="width: 12%">Amount</th>

                    <th class="not-exported" style="width: 12%">Action</th>

                </tr>
            </thead>
            <tbody>
                @php
                $total = 0;
                @endphp
                    @foreach($lims_expense_all as $key=>$expense)
                @php
                $total += $expense->amount;
                @endphp
                <tr data-id="{{$expense->id}}" style="text-align: center;">
                    <td style="background: #e3f3f3">{{++$key}}</td>



                    <td style="background: #fde9f1;">{{date($general_setting->date_format, strtotime($expense->created_at->toDateString())) . ' '. $expense->created_at->toTimeString() }}</td>

                    <td style="background: #e3f3f3;">{{ $expense->reference_no }}</td>


                    <td style="background: #fde9f1;">{{ $expense->user->name ?? ''}}</td>


                    <td style="background: #e3f3f3;">{{ $expense->note ?? '' }}</td>


                    {{-- <td>{{ $expense->warehouse->name ?? ''}}</td> --}}
                    <td style="background: #fde9f1;">{{ $expense->expenseCategory->name ?? '' }}</td>
                    <td style="background: #e3f3f3; color:#000;"><b>{{ number_format((float)$expense->amount, 2, '.', '') }}</b></td>
                    <td style=" background: #107c8e4d;">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{trans('file.action')}}
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                @if(in_array("expenses-edit", $all_permission))
                                <li> <a href="{{ route('expenses.edit', $expense->id)}}">
                                        <button type="button" data-id="{{$expense->id}}" class="open-Editexpense_categoryDialog btn btn-link" data-toggle="modal" data-target="#editModal"><i class="dripicons-document-edit"></i> {{trans('file.edit')}}</button>
                                    </a></li>
                                @endif
                                @if(in_array("expenses-delete", $all_permission))
                                <li class="divider"></li>
                                {{ Form::open(['route' => ['expenses.destroy', $expense->id], 'method' => 'DELETE'] ) }}
                                <li>
                                    <button type="submit" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> {{trans('file.delete')}}</button>
                                </li>
                                {{ Form::close() }}
                                @endif
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="tfoot active">

                <th colspan='6' class="text-center">{{trans('file.Total')}}</th>


                <th class="text-center">= {{ $total ?? ''}}</th>
                <th></th>

            </tfoot>
        </table>
    </div>
</section>
<!-- expense modal -->
<div id="expense-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Add Expense')}}</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
            </div>
            <div class="modal-body">
                <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                {!! Form::open(['route' => 'expenses.store', 'method' => 'post']) !!}
                <?php 
                      $lims_expense_category_list = DB::table('expense_categories')->where('is_active', true)->get();
                      if(Auth::user()->role_id > 2)
                        $lims_warehouse_list = DB::table('warehouses')->where([
                          ['is_active', true],
                          ['id', Auth::user()->warehouse_id]
                        ])->get();
                      else
                        $lims_warehouse_list = DB::table('warehouses')->where('is_active', true)->get();
                        $lims_account_list = \App\Account::where('is_active', true)->get();
                    
                    ?>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>{{trans('file.Expense Category')}} *</label>
                        <select name="expense_category_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select Expense Category...">
                            @foreach($lims_expense_category_list as $expense_category)
                            <option value="{{$expense_category->id}}">{{$expense_category->name . ' (' . $expense_category->code. ')'}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>{{trans('Employee Name')}} *</label>
                        <select name="user_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select User...">

                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name?? ''}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div class="col-md-6 form-group" style="display:none;">
                        <label>{{trans('file.Warehouse')}} *</label>
                    <select name="warehouse_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select Warehouse...">
                        @foreach($lims_warehouse_list as $warehouse)
                        <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="col-md-6 form-group">
                    <label>{{trans('file.Amount')}} *</label>
                    <input type="number" name="amount" step="any" required class="form-control">
                </div>
                <div class="col-md-6 form-group">
                    <label> {{trans('file.Account')}}</label>
                    <select class="form-control selectpicker" name="account_id">
                        @foreach($lims_account_list as $account)
                        @if($account->is_default)
                        <option selected value="{{$account->id}}">{{$account->name}} [{{$account->account_no}}]</option>
                        @else
                        <option value="{{$account->id}}">{{$account->name}} [{{$account->account_no}}]</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>{{trans('file.Note')}}</label>
                <textarea name="note" rows="3" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">{{trans('file.submit')}}</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
</div>
{{-- Edit Modal Include --}}


@endsection
@section('js')
@include('layout.all_data_table_js')

<script type="text/javascript">
    $("ul#expense").siblings('a').attr('aria-expanded', 'true');
    $("ul#expense").addClass("show");
    $("ul#expense #exp-list-menu").addClass("active");

    var expense_id = [];
    var user_verified = <?php echo json_encode(env('USER_VERIFIED')) ?>;
    var all_permission = <?php echo json_encode($all_permission) ?>;
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('.open-Editexpense_categoryDialog').on('click', function() {
            var url = "expenses/"
            var id = $(this).data('id').toString();
            url = url.concat(id).concat("/edit");
            $.get(url, function(data) {
                $('#editModal #reference').text(data['reference_no']);
                $("#editModal select[name='warehouse_id']").val(data['warehouse_id']);
                $("#editModal select[name='expense_category_id']").val(data['expense_category_id']);
                $("#editModal select[name='account_id']").val(data['account_id']);
                $("#editModal input[name='amount']").val(data['amount']);
                $("#editModal input[name='expense_id']").val(data['id']);
                $("#editModal textarea[name='note']").val(data['note']);
                $('.selectpicker').selectpicker('refresh');
            });
        });
    })

function confirmDelete() {
    if (confirm("Are you sure want to delete?")) {
        return true;
    }
    return false;
}

    $('#expense-table').DataTable( {
        "order": [],
        'language': {
            'lengthMenu': '_MENU_ {{trans("file.records per page")}}',
             "info":      '<small>{{trans("file.Showing")}} _START_ - _END_ (_TOTAL_)</small>
    ',
    "search": '{{trans("file.Search")}}'
    , 'paginate': {
        'previous': '<i class="dripicons-chevron-left"></i>'
        , 'next': '<i class="dripicons-chevron-right"></i>'
    }
    }
    , 'columnDefs': [{
            "orderable": false
            , 'targets': [0, 1, 2, 3, 4, 5, 6, 7]
        }
        , {
            'render': function(data, type, row, meta) {
                if (type === 'display') {
                    data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                }

                return data;
            }
            , 'checkboxes': {
                'selectRow': true
                , 'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
            }
            , 'targets': [0, 8]
        }
    ]
    , 'select': {
        style: 'multi'
        , selector: 'td:first-child'
    }
    , 'lengthMenu': [
        [10, 25, 50, -1]
        , [10, 25, 50, "All"]
    ]
    , dom: '<"row"lfB>rtip'
        , buttons: [{
                extend: 'pdf'
                , text: '{{trans("file.PDF")}}'
                , exportOptions: {
                    columns: ':visible:Not(.not-exported)'
                    , rows: ':visible'
                }
                , action: function(e, dt, button, config) {
                    datatable_sum(dt, true);
                    $.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, button, config);
                    datatable_sum(dt, false);
                }
                , footer: true
            }
            , {
                extend: 'csv'
                , text: '{{trans("file.CSV")}}'
                , exportOptions: {
                    columns: ':visible:Not(.not-exported)'
                    , rows: ':visible'
                }
                , action: function(e, dt, button, config) {
                    datatable_sum(dt, true);
                    $.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, button, config);
                    datatable_sum(dt, false);
                }
                , footer: true
            }
            , {
                extend: 'print'
                , text: '{{trans("file.Print")}}'
                , exportOptions: {
                    columns: ':visible:Not(.not-exported)'
                    , rows: ':visible'
                }
                , action: function(e, dt, button, config) {
                    datatable_sum(dt, true);
                    $.fn.dataTable.ext.buttons.print.action.call(this, e, dt, button, config);
                    datatable_sum(dt, false);
                }
                , footer: true
            }
            , {
                text: '{{trans("file.delete")}}'
                , className: 'buttons-delete'
                , action: function(e, dt, node, config) {
                    if (user_verified == '1') {
                        expense_id.length = 0;
                        $(':checkbox:checked').each(function(i) {
                            if (i) {
                                expense_id[i - 1] = $(this).closest('tr').data('id');
                            }
                        });
                        if (expense_id.length && confirm("Are you sure want to delete?")) {
                            $.ajax({
                                type: 'POST'
                                , url: 'expenses/deletebyselection'
                                , data: {
                                    expenseIdArray: expense_id
                                }
                                , success: function(data) {
                                    alert(data);
                                }
                            });
                            dt.rows({
                                page: 'current'
                                , selected: true
                            }).remove().draw(false);
                        } else if (!expense_id.length)
                            alert('No expense is selected!');
                    } else
                        alert('This feature is disable for demo!');
                }
            }
            , {
                extend: 'colvis'
                , text: '{{trans("file.Column visibility")}}'
                , columns: ':gt(0)'
            }
        , ]
        , drawCallback: function() {
            var api = this.api();
            datatable_sum(api, false);
        }
    });

    function datatable_sum(dt_selector, is_calling_first) {
        if (dt_selector.rows('.selected').any() && is_calling_first) {
            var rows = dt_selector.rows('.selected').indexes();
            $(dt_selector.column(6).footer()).html(dt_selector.cells(rows, 6, {
                page: 'current'
            }).data().sum().toFixed(2));
        } else {
            $(dt_selector.column(6).footer()).html(dt_selector.cells(rows, 6, {
                page: 'current'
            }).data().sum().toFixed(2));
        }
    }

    if (all_permission.indexOf("expenses-delete") == -1)
        $('.buttons-delete').addClass('d-none');

</script>
@endsection
