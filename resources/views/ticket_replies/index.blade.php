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
        @if(in_array("employees-add", $all_permission))
            <div class="container-fluid">
                <a href="{{route('ticket_replies.create')}}" class="btn btn-info"><i class="dripicons-plus"></i>Add Ticket Replies </a>
            </div>
        @endif
        <div class="table-responsive">
            <table id="lead_status-table" class="table">
                <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th>Ticket</th>
                    <th>Employee</th>
                    <th>Description</th>
                    <th>Attachment</th>
                    <th class="not-exported">{{trans('file.action')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lims_ticket_replies_list as $key=>$ticket_replies)
                    <tr data-id="{{$ticket_replies->id}}">
                        <td>{{$key}}</td>
                        <td>{{ $ticket_replies->ticket->subject }}</td>
                        <td>{{ $ticket_replies->employee->name }}</td>
                        <td>{!! Str::limit($ticket_replies->description, 30, ' ...') !!}</td>
                        <td>{{ $ticket_replies->attachment }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{trans('file.action')}}
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                    @if(in_array("employees-edit", $all_permission))
                                        <li>
                                            <button type="button" data-id="{{$ticket_replies->id}}" data-ticket_id="{{$ticket_replies->ticket_id}}" data-description="{{$ticket_replies->description}}" data-employee_id="{{$ticket_replies->employee_id}}" data-attachment="{{$ticket_replies->attachment}}"  class="edit-btn btn btn-link" data-toggle="modal" data-target="#editModal"><i class="dripicons-document-edit"></i> {{trans('file.edit')}}</button>
                                        </li>
                                    @endif
                                    <li class="divider"></li>
                                    @if(in_array("employees-delete", $all_permission))
                                        <li>
                                            <a href="{{route('ticket_replies.destroy', $ticket_replies->id)}}" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> {{trans('file.delete')}}</a>
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
<style>
.badge.badge-primary {
    background-color: #0da9ef;
}
.with-badge .badge {
    position: absolute;
    top: 50%;
    right: 1.15rem;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
}
.list-group-item i {
    margin-top: -4px;
    margin-right: 8px;
    font-size: 1.1em;
}
.comment {
    display: block;
    position: relative;
    margin-bottom: 30px;
    padding-left: 66px
}

.comment .comment-author-ava {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    width: 50px;
    border-radius: 50%;
    overflow: hidden
}

.comment .comment-author-ava>img {
    display: block;
    width: 100%
}

.comment .comment-body {
    position: relative;
    padding: 24px;
    border: 1px solid #e1e7ec;
    border-radius: 7px;
    background-color: #fff
}

.comment .comment-body::after,
.comment .comment-body::before {
    position: absolute;
    top: 12px;
    right: 100%;
    width: 0;
    height: 0;
    border: solid transparent;
    content: '';
    pointer-events: none
}

.comment .comment-body::after {
    border-width: 9px;
    border-color: transparent;
    border-right-color: #fff
}

.comment .comment-body::before {
    margin-top: -1px;
    border-width: 10px;
    border-color: transparent;
    border-right-color: #e1e7ec
}

.comment .comment-title {
    margin-bottom: 8px;
    color: #606975;
    font-size: 14px;
    font-weight: 500
}

.comment .comment-text {
    margin-bottom: 12px
}

.comment .comment-footer {
    display: table;
    width: 100%
}

.comment .comment-footer>.column {
    display: table-cell;
    vertical-align: middle
}

.comment .comment-footer>.column:last-child {
    text-align: right
}

.comment .comment-meta {
    color: #9da9b9;
    font-size: 13px
}

.comment .reply-link {
    transition: color .3s;
    color: #606975;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: .07em;
    text-transform: uppercase;
    text-decoration: none
}

.comment .reply-link>i {
    display: inline-block;
    margin-top: -3px;
    margin-right: 4px;
    vertical-align: middle
}

.comment .reply-link:hover {
    color: #0da9ef
}

.comment.comment-reply {
    margin-top: 30px;
    margin-bottom: 0
}

@media (max-width: 576px) {
    .comment {
        padding-left: 0
    }
    .comment .comment-author-ava {
        display: none
    }
    .comment .comment-body {
        padding: 15px
    }
    .comment .comment-body::before,
    .comment .comment-body::after {
        display: none
    }
}
</style>

<div class="container padding-bottom-3x mb-2">
    <div class="row">
        <div class="col-lg-12">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <div class="table-responsive margin-bottom-2x">
                <table class="table margin-bottom-none">
                    <thead>
                        <tr>
                            <th>Date Submitted</th>
                            <th>Last Updated</th>
                            <th>Type</th>
                            <th>Priority</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>08/08/2017</td>
                            <td>08/14/2017</td>
                            <td>Website problem</td>
                            <td><span class="text-warning">High</span></td>
                            <td><span class="text-primary">Open</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Messages-->
            <div class="comment">
                <div class="comment-author-ava"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Avatar"></div>
                <div class="comment-body">
                    <p class="comment-text">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.</p>
                    <div class="comment-footer"><span class="comment-meta">Daniel Adams</span></div>
                </div>
            </div>
            <div class="comment">
                <div class="comment-author-ava"><img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="Avatar"></div>
                <div class="comment-body">
                    <p class="comment-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                    <div class="comment-footer"><span class="comment-meta">Jacob Hammond, Staff</span></div>
                </div>
            </div>
            <div class="comment">
                <div class="comment-author-ava"><img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="Avatar"></div>
                <div class="comment-body">
                    <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="comment-footer"><span class="comment-meta">Jacob Hammond, Staff</span></div>
                </div>
            </div>
            <!-- Reply Form-->
            <h5 class="mb-30 padding-top-1x">Leave Message</h5>
            <form method="post">
                <div class="form-group">
                    <textarea class="form-control form-control-rounded" id="review_text" rows="8" placeholder="Write your message here..." required=""></textarea>
                </div>
                <div class="text-right">
                    <button class="btn btn-outline-primary" type="submit">Submit Message</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Update Ticket Replies </h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                    <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                    {!! Form::open(['route' => ['ticket_replies.update', 1], 'method' => 'put', 'files' => true]) !!}
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <input type="hidden" name="ticket_replies_id">
                            </div>
                            <div class="form-group">
                                <label>Ticket *</label>
                                <select required name="ticket_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select  Ticket...">
                                    @foreach($lims_ticket_all as $ticket)
                                        <option selected value="{{$ticket->id}}">{{$ticket ->subject}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>User *</label>
                                <select required name="employee_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select User ...">
                                    @foreach($lims_emoloyee_list as $employee)
                                        <option selected value="{{$employee->id}}">{{$employee->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Attachment </strong> </label>
                                <input type="file" name="attachment"  class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
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

    <script type="text/javascript">

        $("ul#lead").siblings('a').attr('aria-expanded','true');
        $("ul#lead").addClass("show");
        $("ul#lead #employee-menu").addClass("active");

        var ticket_replies_id = [];
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
            $("#editModal input[name='ticket_replies_id']").val( $(this).data('id') );
            $("#editModal input[name='ticket_id']").val( $(this).data('ticket_id') );
            $("#editModal textarea[name='description']").val( $(this).data('description') );
            $("#editModal input[name='employee_id']").val( $(this).data('employee_id') );
            $("#editModal input[name='attachment']").val( $(this).data('attachment') );
            $('.selectpicker').selectpicker('refresh');
        });

        $('#lead_status-table').DataTable( {
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
                            ticket_replies_id.length = 0;
                            $(':checkbox:checked').each(function(i){
                                if(i){
                                    ticket_replies_id[i-1] = $(this).closest('tr').data('id');
                                }
                            });
                            if(ticket_replies_id.length && confirm("Are you sure want to delete?")) {
                                $.ajax({
                                    type:'POST',
                                    url:'ticket_replies/deletebyselection',
                                    data:{
                                        employeeIdArray: ticket_replies_id
                                    },
                                    success:function(data){
                                        //alert(data);
                                    }
                                });
                                dt.rows({ page: 'current', selected: true }).remove().draw(false);
                            }
                            else if(!ticket_replies_id.length)
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