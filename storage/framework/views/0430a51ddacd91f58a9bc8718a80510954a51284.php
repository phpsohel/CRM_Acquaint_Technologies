 <?php $__env->startSection('content'); ?>
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header ">
                            <h4>Add Lead </h4>
                            <div class="card-title">
                              
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="italic"><small class=" text-danger"><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                            <?php echo Form::open(['route' => 'lead.store', 'method' => 'post', 'files' => true]); ?>

                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Company <sup class="text-danger">*</sup></label>
                                                        <input type="text" name="company" value="<?php echo e(old('company')); ?>"  required class="form-control" >
                                                        <?php if($errors->has('company')): ?>
                                                        <span class="text-danger"> <?php echo e($errors->first('company')); ?></span>
                                                         <?php endif; ?>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label> Name <sup class="text-danger">*</sup></strong> </label>
                                                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" required class="form-control">
                                                        <?php if($errors->has('name')): ?>
                                                        <span class="text-danger"> <?php echo e($errors->first('name')); ?></span>
                                                         <?php endif; ?>
                                                    </div>
                
                
                                                    <div class="form-group">
                                                        <label>Phone Number <sup class="text-danger">*</sup></label>
                                                        <input type="text" name="phone_number" value="<?php echo e(old('phone_number')); ?>"  required class="form-control" >
                                                        <?php if($errors->has('phone_number')): ?>
                                                        <span class="text-danger"> <?php echo e($errors->first('phone_number')); ?></span>
                                                         <?php endif; ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Select Upazila <sup class="text-danger">*</sup></label>
                                                        <select  name="thana_id" required  class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Upazila">
                                                            <?php $__currentLoopData = $thanas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($thana->id); ?>" <?php echo e($thana->id==old('thana_id') ? "Selected":''); ?> ><?php echo e($thana->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <?php if($errors->has('thana_id')): ?>
                                                        <span class="text-danger"> <?php echo e($errors->first('thana_id')); ?></span>
                                                         <?php endif; ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label> Address <sup class="text-danger">*</sup></strong> </label>
                                                        <input type="text" name="address" value="<?php echo e(old('address')); ?>" required class="form-control">
                                                        <?php if($errors->has('address')): ?>
                                                        <span class="text-danger"> <?php echo e($errors->first('address')); ?></span>
                                                         <?php endif; ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" >
                                                        <?php if($errors->has('email')): ?>
                                                        <span class="text-danger"> <?php echo e($errors->first('email')); ?></span>
                                                         <?php endif; ?>
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
                                                        <textarea name="description"  class="form-control" rows="3"><?php echo e(old('description')); ?></textarea>
                                                    </div>
                
                                                </div>
                
                                                <div class="col-md-6">
                                                   
                                                    
                                                        
                                                        
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                        
                                                        
                                                    
                
                                                     <div class="form-group" >
                                                        <label>Designation </label>
                                                        <input type="text" name="designation" value="<?php echo e(old('designation')); ?>"  placeholder="Designation"  class="form-control" >
                                                    </div>
                
                
                
                                                    <div class="form-group">
                                                        <label>Another Email</label>
                                                        <input type="email" name="another_email" value="<?php echo e(old('another_email')); ?>"  placeholder="If have a another Email"  class="form-control" >
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label>Another Phone Number</label>
                                                        <input type="text" name="another_phone_no" value="<?php echo e(old('another_phone_no')); ?>" placeholder="If have a another Phone No" class="form-control" >
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label>Lead Category <sup class="text-danger">*</sup></label>
                
                                                        <select  name="lead_category_id" required class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Lead Category...">
                                                            <?php $__currentLoopData = $lims_lead_category_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($lead_category->id); ?>"<?php echo e($lead_category->id == old('lead_category_id') ? 'Selected':''); ?> ><?php echo e($lead_category->lead_cat_name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <?php if($errors->has('lead_category_id')): ?>
                                                        <span class="text-danger"> <?php echo e($errors->first('lead_category_id')); ?></span>
                                                         <?php endif; ?>
                
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label>Lead Status <sup class="text-danger">*</sup></label>
                                                        <select  name="lead_status_id" required class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Lead Status...">
                                                            <?php $__currentLoopData = $lims_lead_status_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($lead_status->id); ?>" <?php echo e($lead_status->id == old('lead_status_id') ? 'Selected':''); ?>><?php echo e($lead_status->status_name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <?php if($errors->has('lead_status_id')): ?>
                                                        <span class="text-danger"> <?php echo e($errors->first('lead_status_id')); ?></span>
                                                         <?php endif; ?>
                                                    </div>
                
                
                
                
                                                    <div class="form-group">
                                                        <label>Lead Source <sup class="text-danger">*</sup></label>
                                                        <select  name="lead_source_id" required class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Lead Source...">
                                                            <?php $__currentLoopData = $lims_lead_source_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead_source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($lead_source->id); ?>" <?php echo e($lead_source->id == old('lead_source_id')? "Selected":''); ?>><?php echo e($lead_source->source_name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <?php if($errors->has('lead_source_id')): ?>
                                                        <span class="text-danger"> <?php echo e($errors->first('lead_source_id')); ?></span>
                                                         <?php endif; ?>
                
                                                    </div>
                
                
                                                    <div class="form-group">
                                                        <label>Employee <sup class="text-danger">*</sup></label>
                                                        <select  name="employee_id" required  class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Employee...">
                                                            <?php $__currentLoopData = $lims_employee_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($employee->id); ?>" <?php echo e($employee->id==old('employee_id') ? "Selected":''); ?> ><?php echo e($employee->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <?php if($errors->has('employee_id')): ?>
                                                        <span class="text-danger"> <?php echo e($errors->first('employee_id')); ?></span>
                                                         <?php endif; ?>
                                                    </div>

                                                 
                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                                <br>
                                <div class="col-md-12 mt-2" id="diffPrice-option">
                                    <h5>
                                        <input name="is_remainder"   type="checkbox" id="is-diffPrice" value="1">&nbsp;
                                        Add Reminder
                                    </h5>
                                </div>


                                <div class="col-md-12 row" id="diffPrice-section">
                                    <div class="col-md-5">

                                        <div class="form-group">
                                            <label> Notification Datetime </strong> </label>
                                            <input type="date" name="noti_datetime" value="<?php echo e(old('noti_datetime')); ?>" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Follow Up User </label>
                                            <select  name="user_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select User...">
                                                <?php $__currentLoopData = $lims_user_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($user->id); ?>"<?php echo e($user->id == old('user_id')? "Selected":''); ?> ><?php echo e($user->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label> Details</label>
                                            <textarea name="remainder_description"  class="form-control" rows="3"><?php echo e(old('remainder_description')); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-4">
                                        <a href="<?php echo e(URL::Previous()); ?>" class="btn btn-info btn-sm float-left"><i class="fa fa-undo px-2"></i>Back</a>
                                        <input type="submit" value="<?php echo e(trans('file.submit')); ?>" class="btn btn-primary btn-sm float-right">
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
    $("#diffPrice-section").hide();
       // $("#other").hide();

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

    //  $('select[name="designation"]').on('change', function() {
    //
    //     if($(this).val() == 'other'){
    //         $('#other').show(400);
    //     }
    //     else{
    //         $('#other').hide(400);
    //
    //
    //     }
    // });



    $("input[name='is_remainder']").on("change", function () {
        if ($(this).is(':checked')) {
            $("#diffPrice-section").show(300);
        }
        else
            $("#diffPrice-section").hide(300);
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/acquqkkb/public_html/atechcrm/resources/views/lead/create.blade.php ENDPATH**/ ?>