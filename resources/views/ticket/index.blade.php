@extends('layout.main') @section('content')
    @if($errors->has('name'))
        <div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ $errors->first('name') }}</div>
    @endif
    @if($errors->has('image'))
        <div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ $errors->first('image') }}</div>
    @endif
    @if($errors->has('email'))
        <div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ $errors->first('email') }}</div>
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{!! session()->get('message') !!}</div>
    @endif
    @if(session()->has('not_permitted'))
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
    @endif
    <section>
        @if(in_array("ticket-add", $all_permission))
            <div class="container-fluid">
                <h3>Ticket List</h3>
                {{--<a href="{{route('ticket.create')}}" class="btn btn-info"><i class="dripicons-plus"></i>Add Ticket </a>--}}
            </div>
        @endif
        <div class="table-responsive">
            <table id="ticket-table" class="table">
                <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th>Subject</th>
                    <th>Reference</th>
                    <th> Project Name </th>
                    <th>Customer</th>
                    <th>Department</th>
                    <th>Employee</th>
                    <th>Priority</th>
                    <th class="not-exported">{{trans('file.action')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lims_ticket_all as $key=>$ticket)

                    @php
                    @endphp
                    <tr data-id="{{$ticket->id}}">
                        <td>{{$key}}</td>
                        <td>{{ $ticket->subject }}</td>
                        <td>{{ $ticket->ticket_code }}</td>
                        <td>{{$ticket->project->project_name }}</td>
                        <td>{{ $ticket->customer->name }}</td>
                        <td>{{ $ticket->department->name }}</td>
                        <td>{{ $ticket->employee->name }}</td>
                        @if($ticket->priority == 1 )
                            <td><strong>High</strong></td>
                        @else
                            <td><strong>Low</strong></td>
                        @endif
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{trans('file.action')}}
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">

                                    @if(in_array("create_ticket_reply", $all_permission))
                                    <li>
                                        <a class="btn btn-link" href="{{ route('ticket_replies.create_replies', ['id' => $ticket->id]) }}"><i class="fa fa-plus"></i> Create Ticket Replies</a></button>
                                    </li>
                                    @endif
                                    @if(in_array("ticket-edit", $all_permission))
                                        <li>
                                            <button type="button" data-id="{{$ticket->id}}" data-subject="{{$ticket->subject}}" data-description="{{$ticket->description}}" data-project_id="{{$ticket->project_id}}"  data-project_name="{{$ticket->project->project_name}}" data-customer_id="{{$ticket->customer_id}}" data-name="{{$ticket->customer->name}}" data-priority="{{$ticket->priority}}"  data-employee_id="{{$ticket->employee_id}}" data-department_id="{{$ticket->department_id}}" data-attachment="{{$ticket->attachment}}"  class="edit-btn btn btn-link" data-toggle="modal" data-target="#editModal"><i class="dripicons-document-edit"></i> {{trans('file.edit')}}</button>
                                        </li>
                                    @endif

                                    @if(in_array("ticket-delete", $all_permission))
                                        <li>
                                            <a href="{{route('ticket.destroy', $ticket->id)}}" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> {{trans('file.delete')}}</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Update Ticket</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                    <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                    {!! Form::open(['route' => ['ticket.update', 1], 'method' => 'put', 'files' => true]) !!}
                    <div class="row">
                        <div class="col-md-5">


                            <div class="form-group">
                                <input type="hidden" name="ticket_id"  class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Subject * </label>
                                <input type="text" name="subject" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Project Name </label>
                                <input type="text" name="project_name"  readonly required class="form-control">
                            </div>


                            <div class="form-group">
                                <label>Customer *</label>
                                <input type="text" name="customer_name"  readonly required class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Employee *</label>
                                <select required name="employee_id" class="form-control selectpicker">
                                    @foreach($lims_employee_list as $employee)
                                        <option selected value="{{$employee->id}}">{{$employee->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Priority *</label>
                                <select  required name="priority" class="form-control">
                                    <option  value="1">High</option>
                                    <option   value="0">Low</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Department *</label>
                                <select required name="department_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Department ...">
                                    @foreach($lims_department_list as $department)
                                        <option selected value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Attachment </label>
                                <input type="file" name="attachment"  class="form-control">
                            </div>

                            <div class="form-group">

                                <input type="hidden" name="customer_id"  class="form-control">
                                <input type="hidden" name="project_id"  class="form-control">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

  
@endsection
@section('js')
@include('layout.all_data_table_js')

<script type="text/javascript">

    $("ul#ticket").siblings('a').attr('aria-expanded','true');
    $("ul#ticket").addClass("show");
    $("ul#ticket #employee-menu").addClass("active");

    var ticket_id = [];
    var user_verified = <?php echo json_encode(env('USER_VERIFIED')) ?>;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function confirmDelete() {
        if (confirm("Are you sure want to delete?")) {
            return true;
        }
        return false;
    }

    $('.edit-btn').on('click', function() {

       // alert($(this).data('priority'));

        $("#editModal input[name='ticket_id']").val( $(this).data('id') );
        $("#editModal input[name='subject']").val( $(this).data('subject') );
        $("#editModal input[name='customer_name']").val( $(this).data('name') );
        $("#editModal input[name='project_name']").val( $(this).data('project_name') );
        $("#editModal input[name='customer_id']").val( $(this).data('customer_id') );
        $("#editModal input[name='project_id']").val( $(this).data('project_id') );
        $("#editModal textarea[name='description']").val( $(this).data('description') );
        $("#editModal select[name='priority']").val( $(this).data('priority') );
        $("#editModal select[name='employee_id']").val( $(this).data('employee_id') );
        $("#editModal input[name='department_id']").val( $(this).data('department_id') );
        $("#editModal input[name='attachment']").val( $(this).data('attachment') );
        $('.selectpicker').selectpicker('refresh');
    });

    $('#ticket-table').DataTable( {
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
                'targets': [0, 1]
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
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                    stripHtml: false
                },
                customize: function(doc) {
                    for (var i = 1; i < doc.content[1].table.body.length; i++) {
                        if (doc.content[1].table.body[i][0].text.indexOf('<img src=') !== -1) {
                            var imagehtml = doc.content[1].table.body[i][0].text;
                            var regex = /<img.*?src=['"](.*?)['"]/;
                            var src = regex.exec(imagehtml)[1];
                            var tempImage = new Image();
                            tempImage.src = src;
                            var canvas = document.createElement("canvas");
                            canvas.width = tempImage.width;
                            canvas.height = tempImage.height;
                            var ctx = canvas.getContext("2d");
                            ctx.drawImage(tempImage, 0, 0);
                            var imagedata = canvas.toDataURL("image/png");
                            delete doc.content[1].table.body[i][0].text;
                            doc.content[1].table.body[i][0].image = imagedata;
                            doc.content[1].table.body[i][0].fit = [30, 30];
                        }
                    }
                },
            },
            {
                extend: 'csv',
                text: '{{trans("file.CSV")}}',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                    format: {
                        body: function ( data, row, column, node ) {
                            if (column === 0 && (data.indexOf('<img src=') != -1)) {
                                var regex = /<img.*?src=['"](.*?)['"]/;
                                data = regex.exec(data)[1];
                            }
                            return data;
                        }
                    }
                },
            },
            {
                extend: 'print',
                text: '{{trans("file.Print")}}',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                    stripHtml: false
                },
            },
            {
                text: '{{trans("file.delete")}}',
                className: 'buttons-delete',
                action: function ( e, dt, node, config ) {
                    if(user_verified == '1') {
                        ticket_id.length = 0;
                        $(':checkbox:checked').each(function(i){
                            if(i){
                                ticket_id[i-1] = $(this).closest('tr').data('id');
                            }
                        });
                        if(ticket_id.length && confirm("Are you sure want to delete?")) {
                            $.ajax({
                                type:'POST',
                                url:'ticket/deletebyselection',
                                data:{
                                    employeeIdArray: ticket_id
                                },
                                success:function(data){
                                    alert(data);
                                }
                            });
                            dt.rows({ page: 'current', selected: true }).remove().draw(false);
                        }
                        else if(!ticket_id.length)
                            alert('No Lead Status is selected!');
                    }
                    else
                        alert('This feature is disable for demo!');
                }
            },
            {
                extend: 'colvis',
                text: '{{trans("file.Column visibility")}}',
                columns: ':gt(0)'
            },
        ],
    } );
</script>

@endsection