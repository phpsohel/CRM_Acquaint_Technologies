 <?php $__env->startSection('content'); ?>
    <?php if($errors->has('name')): ?>
        <div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e($errors->first('name')); ?></div>
    <?php endif; ?>
    <?php if($errors->has('image')): ?>
        <div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e($errors->first('image')); ?></div>
    <?php endif; ?>
    <?php if($errors->has('email')): ?>
        <div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e($errors->first('email')); ?></div>
    <?php endif; ?>
    <?php if(session()->has('message')): ?>
        <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo session()->get('message'); ?></div>
    <?php endif; ?>
    <?php if(session()->has('not_permitted')): ?>
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div>
    <?php endif; ?>
    <section>
        <div class="table-responsive">
            <table id="lead_status-table" class="table">
                <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th> Lead Person</th>
                     <th> Company Name</th>
                    <th> Phone Number</th>
                    <th> Address</th>
                    <th> Employee</th>
                    <th> Notification Datetime</th>
                    <th>Details</th>
                    <th>User</th>
                    <th>Status</th>
                    <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $lims_reminder_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$remainder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php
                   // dd($remainder);
                    ?>



                    <tr data-id="<?php echo e($remainder->id); ?>">
                        <td><?php echo e($key); ?></td>
                          <td><?php echo e($remainder->lead->name ?? ''); ?> </td>
                        <td><?php echo e($remainder->lead->company ?? ''); ?></td>
                        <td><?php echo e($remainder->lead->phone_number ?? ''); ?></td>
                        <td><?php echo e($remainder->lead->address ?? ''); ?></td>
                        <td><?php echo e($remainder->lead->employee->name ?? ''); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($remainder->noti_datetime)->format('Y-m-d')); ?></td>
                        <td><?php echo Str::limit($remainder->description, 50, ' ...'); ?></td>
                        <td><?php echo e($remainder->user->name); ?></td>
                        <?php if($remainder->stage == 0): ?>
                            <td> <strong style="color: red">Incomplete</strong></td>
                        <?php else: ?>
                            <td> <strong style="color: green">Complete</strong></td>
                        <?php endif; ?>


                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(trans('file.action')); ?>

                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">


                                    <li>
                                        
                                        <a class="btn btn-link" href="<?php echo e(route('addremainderLeadId',$remainder->lead_id)); ?>" target="_blank"><i class="fa fa-shopping-cart"></i> Create New Reminder</a>
                                        
                                    </li>

                                    <li>
                                        <button type="button" data-id="<?php echo e($remainder->id); ?>" data-stage="<?php echo e($remainder->stage); ?>" data-lead_id="<?php echo e($remainder->lead_id); ?>" data-noti_datetime="<?php echo e(\Carbon\Carbon::parse($remainder->noti_datetime)->format('Y-m-d')); ?>" data-description="<?php echo e($remainder->description); ?>" data-user_id="<?php echo e($remainder->user_id); ?>" data-stage="<?php echo e($remainder->stage); ?>"  class="edit-btn btn btn-link" data-toggle="modal" data-target="#editModal"><i class="dripicons-document-edit"></i> <?php echo e(trans('file.edit')); ?></button>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('todays.remainder.changestatus', $remainder->id)); ?>" class="btn btn-link"> <i class="fa fa-edit"></i>Change Status</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo e(route('todays.remainder.destroy', $remainder->id)); ?>" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> <?php echo e(trans('file.delete')); ?></a>
                                    </li>

                                </ul>
                            </div>
                        </td>


                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </section>


    <div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Update Reminder</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                    <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                    <?php echo Form::open(['route' => ['todays.remainder.update', 1], 'method' => 'put', 'files' => true]); ?>

                    <div class="row">
                        <div class="col-md-6">


                            <div class="form-group">
                                <label>Lead </label>
                                <input type="hidden" name="remainder_id"/>
                                <select required name="lead_id" class="form-control selectpicker">
                                    <?php $__currentLoopData = $lims_lead_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lead->id); ?>"><?php echo e($lead->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">

                                <label> Notification Datetime *</strong> </label>
                                <input type="date" name="noti_datetime" required class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Lead Details</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label>User </label>
                                <input type="hidden" name="user_hidden_id"/>
                                <select required id="user_id" name="user_id" class="form-control selectpicker">
                                    <?php $__currentLoopData = $lims_user_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Stage </label>
                                
                                <select required id="stage" name="stage" class="form-control selectpicker">
                                    <option selected value="0">Incomplete</option>
                                    <option selected value="1">Complete</option>
                                </select>
                            </div>


                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>

 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php echo $__env->make('layout.all_data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script type="text/javascript">

    $("ul#lead").siblings('a').attr('aria-expanded','true');
    $("ul#lead").addClass("show");
    $("ul#lead #employee-menu").addClass("active");

    var remainder_id = [];
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
        $("#editModal input[name='remainder_id']").val( $(this).data('id') );
        $("#editModal select[name='lead_id']").val( $(this).data('lead_id') );
        $("#editModal input[name='noti_datetime']").val( $(this).data('noti_datetime') );
        $("#editModal textarea[name='description']").val( $(this).data('description') );
        $("#editModal input[name='user_hidden_id']").val( $(this).data('user_id') );
        // $("#editModal select[name='stage']").val( $(this).data('stage') );
        $("#editModal select[name='user_id']").val( $(this).data('user_id') );
        $("#editModal select[name='stage']").val( $(this).data('stage') );
        $('.selectpicker').selectpicker('refresh');
    });

    $('#lead_status-table').DataTable( {
        "order": [],
        'language': {
            'lengthMenu': '_MENU_ <?php echo e(trans("file.records per page")); ?>',
            "info":      '<small><?php echo e(trans("file.Showing")); ?> _START_ - _END_ (_TOTAL_)</small>',
            "search":  '<?php echo e(trans("file.Search")); ?>',
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
                text: '<?php echo e(trans("file.PDF")); ?>',
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
                text: '<?php echo e(trans("file.CSV")); ?>',
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
                text: '<?php echo e(trans("file.Print")); ?>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                    stripHtml: false
                },
            },
            {
                text: '<?php echo e(trans("file.delete")); ?>',
                className: 'buttons-delete',
                action: function ( e, dt, node, config ) {
                    if(user_verified == '1') {
                        remainder_id.length = 0;
                        $(':checkbox:checked').each(function(i){
                            if(i){
                                remainder_id[i-1] = $(this).closest('tr').data('id');
                            }
                        });
                        if(remainder_id.length && confirm("Are you sure want to delete?")) {
                            $.ajax({
                                type:'POST',
                                url:'remainder/deletebyselection',
                                data:{
                                    employeeIdArray: remainder_id
                                },
                                success:function(data){
                                    alert(data);
                                }
                            });
                            dt.rows({ page: 'current', selected: true }).remove().draw(false);
                        }
                        else if(!remainder_id.length)
                            alert('No Lead Status is selected!');
                    }
                    else
                        alert('This feature is disable for demo!');
                }
            },
            {
                extend: 'colvis',
                text: '<?php echo e(trans("file.Column visibility")); ?>',
                columns: ':gt(0)'
            },
        ],
    } );
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\crm\resources\views/remainder/todays-reminder.blade.php ENDPATH**/ ?>