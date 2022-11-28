 <?php $__env->startSection('content'); ?>
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>Add Ticket </h4>
                        </div>
                        <div class="card-body">
                            <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                            <?php echo Form::open(['route' => 'ticket.store', 'method' => 'post', 'files' => true]); ?>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Subject *</strong> </label>
                                        <input type="text" name="subject" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Project Name *</strong> </label>
                                        <input type="text" name="project_id" value="<?php echo e($lims_project_list->project_name); ?>"  readonly required class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Customer *</label>
                                        <input type="text" name="customer_id" value="<?php echo e($lims_customer_list->name); ?>"  readonly required class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-5">

                                    <div class="form-group">
                                        <label>Priority *</label>
                                        <select required name="priority" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select One ...">
                                            <option value="1">High</option>
                                            <option value="0">Low</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Department *</label>
                                        <select required name="department_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Department ...">
                                            <?php $__currentLoopData = $lims_department_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Employee *</label>
                                        <select required name="employee_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select User ...">
                                            <?php $__currentLoopData = $lims_employee_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Attachment </strong> </label>
                                        <input type="file" name="attachment"  class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <input type="hidden" name="project_id" value="<?php echo e($lims_project_list->id); ?>">
                                        <input type="hidden" name="customer_id" value="<?php echo e($lims_customer_list->id); ?>">
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group mt-4">
                                        <input type="submit" value="<?php echo e(trans('file.submit')); ?>" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $("ul#hrm").siblings('a').attr('aria-expanded','true');
        $("ul#hrm").addClass("show");
        $("ul#hrm #employee-menu").addClass("active");

        $('#warehouse').hide();
        $('#biller').hide();

        $('select[name="customer_id"]').val($('input[name="customer_id_hidden"]').val());

        $('input[name="user"]').on('change', function() {
            if ($(this).is(':checked')) {
                $('#user-input').show(400);
                $('input[name="name"]').prop('required',true);
                $('input[name="password"]').prop('required',true);
                $('select[name="role_id"]').prop('required',true);
            }
            else{
                $('#user-input').hide(400);
                $('input[name="name"]').prop('required',false);
                $('input[name="password"]').prop('required',false);
                $('select[name="role_id"]').prop('required',false);
                $('select[name="warehouse_id"]').prop('required',false);
                $('select[name="biller_id"]').prop('required',false);
            }
        });

        $('select[name="role_id"]').on('change', function() {
            if($(this).val() > 2){
                $('#warehouse').show(400);
                $('#biller').show(400);
                $('select[name="warehouse_id"]').prop('required',true);
                $('select[name="biller_id"]').prop('required',true);
            }
            else{
                $('#warehouse').hide(400);
                $('#biller').hide(400);
                $('select[name="warehouse_id"]').prop('required',false);
                $('select[name="biller_id"]').prop('required',false);
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crm\resources\views/ticket/create_ticket.blade.php ENDPATH**/ ?>