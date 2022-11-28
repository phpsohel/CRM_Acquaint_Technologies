 <?php $__env->startSection('content'); ?>
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4><?php echo e(trans('file.Add Employee')); ?></h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small class="text-danger"><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                        <?php echo Form::open(['route' => 'employees.store', 'method' => 'post', 'files' => true]); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('file.name')); ?> <sup class="text-danger">*</sup></strong> </label>
                                    <input type="text" name="employee_name" value="<?php echo e(old('employee_name')); ?>" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('file.Email')); ?> <sup class="text-danger">*</sup></label>
                                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="example@example.com" required class="form-control">
                                    <?php if($errors->has('email')): ?>
                                   <span>
                                       <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('file.Phone Number')); ?> <sup class="text-danger">*</sup></label>
                                    <input type="text" name="phone_number" value="<?php echo e(old('phone_number')); ?>" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('file.Address')); ?></label>
                                    <input type="text" name="address" value="<?php echo e(old('address')); ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(trans('file.Image')); ?></label>
                                    <input type="file" name="image" class="form-control">
                                    <?php if($errors->has('image')): ?>
                                   <span>
                                       <strong><?php echo e($errors->first('image')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            
                            
                              
                             
                            </div>
                            <div class="col-md-6">
                             
                                <div id="" class="">
                                  
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.UserName')); ?> <sup class="text-danger">*</sup></label>
                                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" required class="form-control" required>
                                        <?php if($errors->has('name')): ?>
                                       <span>
                                           <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Password')); ?> <sup class="text-danger">*</sup></label>
                                        <input required type="password" name="password" value="<?php echo e(old('password')); ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Role')); ?> <sup class="text-danger">*</sup></label>
                                        <select name="role_id" class="selectpicker form-control" required>
                                            <?php $__currentLoopData = $lims_role_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>" <?php echo e(old('role_id') == $role->id ? 'Selected':''); ?>><?php echo e($role->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Department')); ?> <sup class="text-danger">*</sup></label>
                                        <select class="form-control selectpicker" name="department_id" required>
                                            <?php $__currentLoopData = $lims_department_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($department->id); ?>" <?php echo e(old('department_id') == $department->id ? "Selected" :''); ?> ><?php echo e($department->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                
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


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    $("ul#hrm").siblings('a').attr('aria-expanded','true');
    $("ul#hrm").addClass("show");
    $("ul#hrm #employee-menu").addClass("active");

    $('#warehouse').hide();
    $('#biller').hide();

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
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/acquqkkb/public_html/atechcrm/resources/views/employee/create.blade.php ENDPATH**/ ?>