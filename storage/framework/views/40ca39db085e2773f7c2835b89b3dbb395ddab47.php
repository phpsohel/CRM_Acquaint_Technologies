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
        <?php if(in_array("project-add", $all_permission)): ?>
            <div class="container-fluid">
                <h3>Project List</h3>
                
            </div>
        <?php endif; ?>
        <div class="table-responsive">
            <table id="lead_status-table" class="table">
                <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th> Project Name</th>
                    <th>Customer</th>
                    
                    <th>Progress</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $lims_project_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr data-id="<?php echo e($project->id); ?>">
                        <td><?php echo e($key); ?></td>
                        <td><?php echo e($project->project_name); ?></td>
                        <td><?php echo e($project->customer->name); ?></td>
                        
                        <td>
                            <progress id="file"  value="<?php echo e($project->progress); ?>" max="100"> <?php echo e($project->progress); ?>% </progress> <?php echo e($project->progress); ?>%
                        </td>
                        <td><?php echo e($project->start_date); ?></td>
                        <td><?php echo e($project->end_date); ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(trans('file.action')); ?>

                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                    <?php if(in_array("project-edit", $all_permission)): ?>
                                        <li>
                                            <button type="button" data-id="<?php echo e($project->id); ?>" data-project_name="<?php echo e($project->project_name); ?>" data-customer_id="<?php echo e($project->customer_id); ?>" data-lead_id="<?php echo e($project->lead_id); ?>" data-progress="<?php echo e($project->progress); ?>" data-start_date="<?php echo e($project->start_date); ?>"  data-end_date="<?php echo e($project->end_date); ?>" data-sale_id="<?php echo e($project->sale_id); ?>" class="edit-btn btn btn-link" data-toggle="modal" data-target="#editModal"><i class="dripicons-document-edit"></i> <?php echo e(trans('file.edit')); ?></button>
                                        </li>
                                    <?php endif; ?>

                                        <?php if(in_array("create_ticket", $all_permission)): ?>
                                        <li>
                                            <a class="btn btn-link" href="<?php echo e(route('project.create_ticket', ['id' => $project->id])); ?>"><i class="fa fa-plus"></i> Create Ticket</a></button>
                                        </li>
                                        <?php endif; ?>

                                    <?php if(in_array("project-delete", $all_permission)): ?>
                                        <li>
                                            <a href="<?php echo e(route('project.destroy', $project->id)); ?>" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> <?php echo e(trans('file.delete')); ?></a>
                                        </li>
                                    <?php endif; ?>
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
                    <h5 id="exampleModalLabel" class="modal-title">Update Lead</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                    <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                    <?php echo Form::open(['route' => ['project.update', 1], 'method' => 'put', 'files' => true]); ?>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="hidden" name="project_id">
                                <label>Project Name *</strong> </label>
                                <input type="text" name="project_name" required class="form-control">
                            </div>


                            <div class="form-group">
                                <label>Customer *</label>
                                <select required name="customer_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Lead Status...">
                                    <?php $__currentLoopData = $lims_customer_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option selected value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                            <label>Progress (%) *</strong> </label>
                            <input type="text" name="progress" required class="form-control">
                            </div>

                        </div>

                        <div class="col-md-5">


                            <div class="form-group">
                                <label>Start Date *</strong> </label>
                                <input type="date" name="start_date" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>End Date *</strong> </label>
                                <input type="date" name="end_date" required class="form-control">
                            </div>

                        </div>


                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <input type="submit" value="<?php echo e(trans('file.submit')); ?>" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $("ul#lead").siblings('a').attr('aria-expanded','true');
        $("ul#lead").addClass("show");
        $("ul#lead #employee-menu").addClass("active");

        var project_id = [];
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
            $("#editModal input[name='project_id']").val( $(this).data('id') );
            $("#editModal input[name='project_name']").val( $(this).data('project_name') );
            $("#editModal input[name='customer_id']").val( $(this).data('customer_id') );
            $("#editModal input[name='lead_id']").val( $(this).data('lead_id') );
            $("#editModal input[name='progress']").val( $(this).data('progress') );
            $("#editModal input[name='start_date']").val( $(this).data('start_date') );
            $("#editModal input[name='end_date']").val( $(this).data('end_date') );
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
                            project_id.length = 0;
                            $(':checkbox:checked').each(function(i){
                                if(i){
                                    project_id[i-1] = $(this).closest('tr').data('id');
                                }
                            });
                            if(project_id.length && confirm("Are you sure want to delete?")) {
                                $.ajax({
                                    type:'POST',
                                    url:'project/deletebyselection',
                                    data:{
                                        employeeIdArray: project_id
                                    },
                                    success:function(data){
                                        alert(data);
                                    }
                                });
                                dt.rows({ page: 'current', selected: true }).remove().draw(false);
                            }
                            else if(!project_id.length)
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
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crm\resources\views/project/index.blade.php ENDPATH**/ ?>