
<?php $__env->startSection('content'); ?>

<?php if(session()->has('message')): ?>
 <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('message')); ?></div> 
<?php endif; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(Auth::user()->is_active): ?>
                    You are Expired! Please contact with admin to renew date.
                    <?php else: ?>
                    You are logged in but id is not activated! Please contact with admin.
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script type="text/javascript">
    alert('You are Expired! Please contact with admin to renew date.');
</script> -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/acquqkkb/public_html/atechcrm/resources/views/expire.blade.php ENDPATH**/ ?>