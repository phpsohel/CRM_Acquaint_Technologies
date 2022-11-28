 <?php $__env->startSection('content'); ?>
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>Add Reminder</h4>
                        </div>
                        <div class="card-body">
                            <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                            <?php echo Form::open(['route' => 'remainder.store', 'method' => 'post', 'files' => true]); ?>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Lead </label>
                                        <select required  name="lead_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Lead Person">
                                            <?php $__currentLoopData = $lims_lead_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($lead->id); ?>"><?php echo e($lead->name); ?> ( <?php echo e($lead->company); ?> )</option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label> Notification Datetime *</strong> </label>
                                        <input type="date" name="noti_datetime" required class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label> Details</label>
                                        <textarea name="description" class="form-control" rows="3"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Employee </label>
                                        <select required name="user_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Employee...">
                                            <?php $__currentLoopData = $lims_user_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
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


// Description

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
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crm\resources\views/remainder/create.blade.php ENDPATH**/ ?>