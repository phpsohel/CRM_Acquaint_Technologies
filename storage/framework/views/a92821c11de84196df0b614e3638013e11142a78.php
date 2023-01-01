 <?php $__env->startSection('content'); ?>
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4><?php if($item->id): ?> Update <?php else: ?> Add <?php endif; ?> Reminder </h4>
                    </div>
                    <div class="card-body">
                        <?php if($item->id): ?>
                        <?php echo Form::open(['route' => ['remainder.update',$item->id], 'method' => 'put', 'files' => true]); ?>

                        <?php else: ?>
                        <?php echo Form::open(['route' => 'remainder.store', 'method' => 'post', 'files' => true]); ?>

                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label>Lead Name :</label>
                                            <input type="hidden" class="" name="lead_id" value="<?php echo e($lead->id ?? ''); ?>">
                                            <strong class=""><?php echo e($lead->name ?? ''); ?></strong>
                                        </div>
                                        <div class="form-group">
                                            <label for=""> Lead Company Name :</label>
                                            <strong class=""><?php echo e($lead->company ?? ''); ?></strong>

                                        </div>


                                        <div class="form-group">
                                            <label> Notification Date *</strong> </label>
                                            <input type="date" name="noti_datetime" value="<?php echo e(old('noti_datetime',$item->noti_datetime)); ?>" required class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label> Details</label>
                                            <textarea name="description" class="form-control" rows="3"><?php echo e(old('description',$item->description)); ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Follow Up User </label>
                                            <select required name="user_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select User...">
                                                <?php $__currentLoopData = $lims_user_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->id); ?>" <?php echo e(old('user_id', $item->user_id) == $user->id ? 'selected' : ''); ?>><?php echo e($user->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Stage </label>
                                            
                                            <select required id="stage" name="stage" class="form-control selectpicker">
                                                <option value="0" <?php echo e(old('stage',$item->stage)==0 ? "Selected":''); ?>>Incomplete</option>
                                                <option value="1" <?php echo e(old('stage',$item->stage)==1 ? "Selected":''); ?>>Complete</option>

                                            </select>
                                        </div>
                                        <div class="form-group mt-4">
                                            <input type="submit" value="<?php echo e(trans('file.submit')); ?>" class="btn btn-primary">
                                        </div>
                                    </div>
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
    $("ul#hrm").siblings('a').attr('aria-expanded', 'true');
    $("ul#hrm").addClass("show");
    $("ul#hrm #employee-menu").addClass("active");

    $('#warehouse').hide();
    $('#biller').hide();


    // Description

    $('input[name="user"]').on('change', function() {
        if ($(this).is(':checked')) {
            $('#user-input').show(400);
            $('input[name="name"]').prop('required', true);
            $('input[name="password"]').prop('required', true);
            $('select[name="role_id"]').prop('required', true);
        } else {
            $('#user-input').hide(400);
            $('input[name="name"]').prop('required', false);
            $('input[name="password"]').prop('required', false);
            $('select[name="role_id"]').prop('required', false);
            $('select[name="warehouse_id"]').prop('required', false);
            $('select[name="biller_id"]').prop('required', false);
        }
    });

    $('select[name="role_id"]').on('change', function() {
        if ($(this).val() > 2) {
            $('#warehouse').show(400);
            $('#biller').show(400);
            $('select[name="warehouse_id"]').prop('required', true);
            $('select[name="biller_id"]').prop('required', true);
        } else {
            $('#warehouse').hide(400);
            $('#biller').hide(400);
            $('select[name="warehouse_id"]').prop('required', false);
            $('select[name="biller_id"]').prop('required', false);
        }
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\crm\resources\views/remainder/create.blade.php ENDPATH**/ ?>