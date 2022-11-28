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

        <?php if(in_array("lead-add", $all_permission)): ?>
            <div class="container-fluid">
                <a  href="<?php echo e(route('lead.create')); ?>" class="btn btn-info"><i class="dripicons-plus"></i>Add Lead </a>
                <a href="#" data-toggle="modal" data-target="#importLead" class="btn btn-primary"><i class="dripicons-copy"></i>Import Lead</a>
            </div>
        <?php endif; ?>
        <div class="table-responsive">
            <table id="lead_status-table" class="table">
                <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Lead Status</th>
                    <th>Lead Category</th>
                    <th>Employee</th>
                    <th>Next Reminder Date</th>
                    <th>Stage</th>
                    <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $lims_lead_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                  // dd($lead);
                   $remainder = \App\Remainder::where('lead_id',$lead->id)->first();
                    //dd($remainder);
                    ?>
                    <tr data-id="<?php echo e($lead->id); ?>">
                        <td><?php echo e($key); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($lead->created_at)->format('Y-m-d')); ?></td>
                        <td><?php echo e($lead->name); ?></td>
                        <td><?php echo e($lead->company); ?></td>
                        <td><?php echo e($lead->email); ?></td>
                        <td><?php echo e($lead->phone_number); ?></td>
                        <td><?php echo e($lead->address); ?></td>
                         <?php if($lead->lead_status_id == null): ?>
                             <td></td>
                        <?php else: ?>
                            <td><?php echo e($lead->lead_status->status_name); ?></td>
                        <?php endif; ?>
                        <?php if($lead->lead_category_id == null): ?>
                          <td></td>
                         <?php else: ?>
                        <td><?php echo e($lead->lead_category->lead_cat_name); ?></td>
                        <?php endif; ?>

                        <?php if($lead->employee_id == null): ?>
                            <td></td>
                        <?php else: ?>
                            <td><?php echo e($lead->employee->name); ?></td>
                        <?php endif; ?>

                        <?php if($remainder == null): ?>
                        <td></td>
                        <?php else: ?>
                        <td><?php echo e(\Carbon\Carbon::parse($remainder->noti_datetime)->format('Y-m-d')); ?></td>
                        <?php endif; ?>


                        <?php if($lead->stage == 1 ): ?>
                            <td>
                                <a href="#" class="btn btn-danger"><strong> Unapproved</strong></a>
                            </td>
                            <?php elseif($lead->stage == 2): ?>
                            <td>
                                <a href="#" class="btn btn-success"> <strong>Approved</strong></a>
                            </td>
                            <?php else: ?>
                            <td>
                                <a href="#" class="btn btn-warning"> <strong>Pending</strong></a>
                            </td>
                            <?php endif; ?>

                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(trans('file.action')); ?>

                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                    <li>
                                        
                                        <a href="<?php echo e(route('lead.details', $lead->id)); ?>" class="btn btn-link"><i class="fa fa-bars"></i> Details</a>
                                    </li>

                                   <?php if(in_array("lead-edit", $all_permission)): ?>
                                        <li>
                                            <button type="button" data-id="<?php echo e($lead->id); ?>" data-name="<?php echo e($lead->name); ?>" data-company="<?php echo e($lead->company); ?>" data-email="<?php echo e($lead->email); ?>" data-another_email="<?php echo e($lead->another_email); ?>" data-another_phone_no="<?php echo e($lead->another_phone_no); ?>" data-phone_number="<?php echo e($lead->phone_number); ?>"  data-designation="<?php echo e($lead->designation); ?>" data-description="<?php echo e($lead->description); ?>"  data-address="<?php echo e($lead->address); ?>" data-date="<?php echo e($lead->date); ?>" data-lead_status_id="<?php echo e($lead->lead_status_id); ?>"  data-stage="<?php echo e($lead->stage); ?>"  data-lead_source_id="<?php echo e($lead->lead_source_id); ?>" data-employee_id="<?php echo e($lead->employee_id); ?>" data-user_id="<?php echo e($lead->user_id); ?>"  data-lead_category_id="<?php echo e($lead->lead_category_id); ?>"  data-stage="<?php echo e($lead->stage); ?>" class="edit-btn btn btn-link" data-toggle="modal" data-target="#editModal"><i class="dripicons-document-edit"></i> <?php echo e(trans('file.edit')); ?></button>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(in_array("lead-delete", $all_permission)): ?>
                                        <li>
                                            <a  href="<?php echo e(route('lead.destroy', $lead->id)); ?>" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> <?php echo e(trans('file.delete')); ?></a>
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
                    <?php echo Form::open(['route' => ['lead.update', 1], 'method' => 'put', 'files' => true]); ?>

                    <div class="row">
                        <div class="col-md-6">


                            <div class="form-group">
                                <label>Company *</label>
                                <input type="text" name="company"  required class="form-control" >
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="lead_id" />
                                <label> Name *</strong> </label>
                                <input type="text" name="name" required class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Email </label>
                                <input type="email" name="email"   class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Phone Number *</label>
                                <input type="text" name="phone_number"  required class="form-control" >
                            </div>
                            <div class="form-group">
                                <label> Address *</strong> </label>
                                <input type="text" name="address" required class="form-control">
                            </div>



                            <div class="form-group">
                                <label>Employee </label>
                                <select  name="employee_id" class="form-control selectpicker" >
                                    <?php $__currentLoopData = $lims_employee_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option selected value="<?php echo e($employee->id); ?>"><?php echo e($employee->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Date </label>
                                <input type="date" name="date"  class="form-control" >
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Designation </label>
                                <input type="text" name="designation"  class="form-control" >
                            </div>

                            
                                
                                
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                
                            



                            <div class="form-group">
                                <label>Another Email </label>
                                <input type="email" name="another_email"   class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Another Phone Number </label>
                                <input type="text" name="another_phone_no"   class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Lead Category </label>

                                <select  name="lead_category_id" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title="Select Lead Category...">
                                    <?php $__currentLoopData = $lims_lead_category_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option selected value="<?php echo e($lead_category->id); ?>"><?php echo e($lead_category->lead_cat_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Lead Status </label>
                                <select  name="lead_status_id" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title="Select Lead Status...">
                                    <?php $__currentLoopData = $lims_lead_status_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option selected value="<?php echo e($lead_status->id); ?>"><?php echo e($lead_status->status_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Lead Source </label>
                                <select  name="lead_source_id" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title="Select Lead Source...">
                                    <?php $__currentLoopData = $lims_lead_source_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead_source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option selected value="<?php echo e($lead_source->id); ?>"><?php echo e($lead_source->source_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>

                            <div class="form-group">
                                <label>Stage *</label>
                                <select required name="stage" class="form-control selectpicker">
                                    <option selected value="1">Unapproved</option>
                                    <option selected value="2">Approved</option>
                                    <option selected value="3">Pending</option>
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

    <div id="importLead" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <?php echo Form::open(['route' => 'lead.import', 'method' => 'post', 'files' => true]); ?>

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Import Product</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                    <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                    <p><?php echo e(trans('file.The correct column order is')); ?> ( name *,company *, email *, phone numner *,address *, description *, lead status *,lead source *,  lead category *,  employee, stage,) <?php echo e(trans('file.and you must follow this')); ?>.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(trans('file.Upload CSV File')); ?> *</label>
                                <?php echo e(Form::file('file', array('class' => 'form-control','required'))); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> <?php echo e(trans('file.Sample File')); ?></label>
                                <a href="public/sample_file/sample_lead.csv" class="btn btn-info btn-block btn-md"><i class="dripicons-download"></i>  <?php echo e(trans('file.Download')); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::submit('Submit', ['class' => 'btn btn-primary'])); ?>

                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>

    <script type="text/javascript">

        $("ul#lead").siblings('a').attr('aria-expanded','true');
        $("ul#lead").addClass("show");
        $("ul#lead #employee-menu").addClass("active");
        $("#other").hide();

        var lead_id = [];
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




        $('select[name="designation"]').on('change', function() {

            if($(this).val() == 'other'){
                $('#other').show(400);
            }
            else{
                $('#other').hide(400);


            }
        });



        $('.edit-btn').on('click', function() {
            $("#editModal input[name='lead_id']").val( $(this).data('id') );
            $("#editModal input[name='name']").val( $(this).data('name') );
            $("#editModal input[name='company']").val( $(this).data('company') );
            $("#editModal input[name='email']").val( $(this).data('email') );
            $("#editModal input[name='another_email']").val( $(this).data('another_email') );
            $("#editModal input[name='phone_number']").val( $(this).data('phone_number') );
            $("#editModal input[name='another_phone_no']").val( $(this).data('another_phone_no') );
            $("#editModal input[name='designation']").val( $(this).data('designation') );
          //  $("#editModal select[name='designation']").val( $(this).data('designation') );
            //$("#editModal input[name='web']").val( $(this).data('web') );
            $("#editModal input[name='address']").val( $(this).data('address') );
            $("#editModal select[name='lead_category_id']").val( $(this).data('lead_category_id') );
            $("#editModal select[name='lead_status_id']").val( $(this).data('lead_status_id') );
            $("#editModal select[name='lead_source_id']").val( $(this).data('lead_source_id') );
            $("#editModal select[name='employee_id']").val( $(this).data('employee_id') );
            $("#editModal select[name='user_id']").val( $(this).data('user_id') );
            $("#editModal textarea[name='description']").val( $(this).data('description') );
            $("#editModal input[name='date']").val( $(this).data('date') );
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
                            lead_id.length = 0;
                            $(':checkbox:checked').each(function(i){
                                if(i){
                                    lead_id[i-1] = $(this).closest('tr').data('id');
                                }
                            });
                            if(lead_id.length && confirm("Are you sure want to delete?")) {
                                $.ajax({
                                    type:'POST',
                                    url:'lead/deletebyselection',
                                    data:{
                                        employeeIdArray: lead_id
                                    },
                                    success:function(data){
                                        alert(data);
                                    }
                                });
                                dt.rows({ page: 'current', selected: true }).remove().draw(false);
                            }
                            else if(!lead_status_id.length)
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
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\somporko\resources\views/lead/index.blade.php ENDPATH**/ ?>