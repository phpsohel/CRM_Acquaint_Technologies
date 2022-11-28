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
                    <th> Phone Number</th>
                    <th> Notification Datetime</th>
                    <th>Details</th>
                    <th>Employee</th>
                    <th>Status</th>
                    <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $lims_reminder_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$remainder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    //dd($remainder) ;

                    ?>
                    <tr data-id="<?php echo e($remainder->id); ?>">
                        <td><?php echo e($key); ?></td>
                        <td><?php echo e($remainder->lead->name); ?> ( <?php echo e($remainder->lead->company); ?> )</td>
                        <td><?php echo e($remainder->lead->phone_number); ?></td>
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
                                        <a class="btn btn-link" href="<?php echo e(route('create.new_reminder', ['lead_id' => $remainder->lead_id])); ?>"><i class="fa fa-shopping-cart"></i> Create New Reminder</a></button>
                                    </li>

                                    <li>
                                        <button type="button" data-id="<?php echo e($remainder->id); ?>" data-stage="<?php echo e($remainder->stage); ?>" data-lead_id="<?php echo e($remainder->lead_id); ?>" data-noti_datetime="<?php echo e(\Carbon\Carbon::parse($remainder->noti_datetime)->format('Y-m-d')); ?>" data-description="<?php echo e($remainder->description); ?>" data-user_id="<?php echo e($remainder->user_id); ?>" data-stage="<?php echo e($remainder->stage); ?>"  class="edit-btn btn btn-link" data-toggle="modal" data-target="#editModal"><i class="dripicons-document-edit"></i> <?php echo e(trans('file.edit')); ?></button>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('remainder.changestatus', $remainder->id)); ?>" class="btn btn-link"> <i class="fa fa-edit"></i>Change Status</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo e(route('remainder.destroy', $remainder->id)); ?>" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> <?php echo e(trans('file.delete')); ?></a>
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
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crm\resources\views/remainder/todays-reminder.blade.php ENDPATH**/ ?>