 <?php $__env->startSection('content'); ?>
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>Add Lead Category</h4>
                        </div>
                        <div class="card-body">
                            <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                            <?php echo Form::open(['route' => 'lead_category.store', 'method' => 'post', 'files' => true]); ?>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Lead Category Name *</strong> </label>
                                        <input type="text" name="lead_cat_name" required class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" rows="3"></textarea>
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
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crm\resources\views/lead_category/create.blade.php ENDPATH**/ ?>