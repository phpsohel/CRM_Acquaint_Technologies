 <?php $__env->startSection('content'); ?>
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>Add Lead </h4>
                        </div>
                        <div class="card-body">
                            <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                            <?php echo Form::open(['route' => 'lead.store', 'method' => 'post', 'files' => true]); ?>

                            <div class="row">
                                <div class="col-md-5">

                                    <div class="form-group">
                                        <label>Company *</label>
                                        <input type="text" name="company"  required class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label> Name *</strong> </label>
                                        <input type="text" name="name" required class="form-control">
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
                                        <label>Email </label>
                                        <input type="email" name="email" class="form-control" >
                                    </div>

                                    <?php
                                        $date = \Carbon\Carbon::now()->format('Y-m-d');
                                    ?>


                                    <div class="form-group">
                                        <label>Date </label>
                                        <input type="date" name="date"   value="<?php echo e($date); ?>" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" rows="3"></textarea>
                                    </div>

                                </div>

                                <div class="col-md-5">
                                    
                                        
                                        
                                    
                                    <div class="form-group">
                                        <label>Designation </label>
                                        <select  id="designation"  name="designation" class="form-control selectpicker" title="Select Designation">
                                            <option  value="Chairman">Chairman</option>
                                            <option  value="Chief Executive Officer (CEO)">Chief Executive Officer (CEO)</option>
                                            <option  value="Managing Director (MD)">Managing Director (MD)</option>
                                            <option  value="Manager">Manager</option>
                                            <option  value="General Manager">General Manager</option>
                                            <option  value="Assistant Manager">Assistant Manager</option>
                                            <option  value="IT Executive">IT Executive</option>
                                            <option  value="Sales Manager">Sales Manager</option>
                                            <option  value="Sales Executive">Sales Executive</option>
                                            <option  value="Executive">Executive</option>
                                        </select>
                                    </div>



                                    <div class="form-group">
                                        <label>Another Email</label>
                                        <input type="email" name="another_email"  placeholder="If have a another Email"  class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label>Another Phone Number</label>
                                        <input type="text" name="another_phone_no" placeholder="If have a another Phone No" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label>Lead Category </label>

                                        <select  name="lead_category_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Lead Category...">
                                            <?php $__currentLoopData = $lims_lead_category_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($lead_category->id); ?>"><?php echo e($lead_category->lead_cat_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label>Lead Status </label>
                                        <select  name="lead_status_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Lead Status...">
                                            <?php $__currentLoopData = $lims_lead_status_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($lead_status->id); ?>"><?php echo e($lead_status->status_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>




                                    <div class="form-group">
                                        <label>Lead Source </label>
                                        <select  name="lead_source_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Lead Source...">
                                            <?php $__currentLoopData = $lims_lead_source_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead_source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($lead_source->id); ?>"><?php echo e($lead_source->source_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                    </div>


                                    <div class="form-group">
                                        <label>Employee </label>
                                        <select  name="employee_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Employee...">
                                            <?php $__currentLoopData = $lims_employee_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                </div>
                                <br>
                                <div class="col-md-12 mt-2" id="diffPrice-option">
                                    <h5>
                                        <input name="is_remainder"  type="checkbox" id="is-diffPrice" value="1">&nbsp;
                                        Add Reminder
                                    </h5>
                                </div>


                                <div class="col-md-12 row" id="diffPrice-section">
                                    <div class="col-md-5">

                                        <div class="form-group">
                                            <label> Notification Datetime </strong> </label>
                                            <input type="date" name="noti_datetime" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>User </label>
                                            <select  name="user_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select User...">
                                                <?php $__currentLoopData = $lims_user_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label> Details</label>
                                            <textarea name="remainder_description" class="form-control" rows="3"></textarea>
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

    <script type="text/javascript">
        $("ul#hrm").siblings('a').attr('aria-expanded','true');
        $("ul#hrm").addClass("show");
        $("ul#hrm #employee-menu").addClass("active");

        $('#warehouse').hide();
        $('#biller').hide();
        $("#diffPrice-section").hide();

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


        $("input[name='is_remainder']").on("change", function () {
            if ($(this).is(':checked')) {
                $("#diffPrice-section").show(300);
            }
            else
                $("#diffPrice-section").hide(300);
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crm\resources\views/lead/create.blade.php ENDPATH**/ ?>