 <?php $__env->startSection('content'); ?>
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>Add Project </h4>
                        </div>
                        <div class="card-body">
                            <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                            <?php echo Form::open(['route' => 'project.store', 'method' => 'post', 'files' => true]); ?>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Project Name *</strong> </label>
                                        <input type="text" name="project_name" required class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Customer *</label>
                                        <input type="hidden" name="customer_id_hidden" value="<?php echo e($lims_sale_list->customer_id); ?>">
                                        <select required name="customer_id" class="form-control">
                                            <?php $__currentLoopData = $lims_customer_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option  selected value="<?php echo e($customer->id); ?> "><?php echo e($customer->name); ?> ( <?php echo e($customer->company_name); ?> )</option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group selectpicker">
                                        <label>Progress(%) *</strong> </label>
                                        <input type="text" id="progress" name="progress"  required class="form-control">

                                    </div>

                                    <div class="form-group selectpicker">
                                    <label for="file"> progress:</label>
                                    <progress id="file"  value="10" max="100"> 10% </progress>
                                    </div>



                                    <div class="form-group">
                                        <input type="hidden" name="sales_id" value="<?php echo e($lims_sale_list->id); ?>">
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


        //assigning value

       // alert($('input[name="customer_id_hidden"]').val());
       $('select[name="customer_id"]').val($('input[name="customer_id_hidden"]').val());


        $('#progress').on('change', function() {
            var percent = $(this).val();
           $('#file').val(percent);

            $('.selectpicker').selectpicker('refresh');
        });


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
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crm\resources\views/project/create_project.blade.php ENDPATH**/ ?>