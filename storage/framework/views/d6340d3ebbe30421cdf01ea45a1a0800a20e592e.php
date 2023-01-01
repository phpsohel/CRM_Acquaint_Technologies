<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/css/select2-bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>
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

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-4 col-md-3">
                    <h4 class=""> Lead Remainder List</h4>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <input type="text" class=" form-control searchingdata" placeholder="Searching User Name Or Lead Company">
                        



                    </div>
                </div>
                <div class="col-lg-4 col-md-3">
                    <?php if(in_array("employees-add", $all_permission)): ?>

                    
                    <?php endif; ?>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="" class="table table-bordered table-sm table-striped text-nowrap">
                    <thead>
                        <tr>
                            <th class="not-exported">SL</th>
                            <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                            <th>Status</th>
                            <th>User</th>
                            <th> Notification Date</th>
                            <th> Lead Person</th>
                            <th>Company Name</th>
                            <th>Mobile No</th>
                            <th>Address</th>
                            <th>Employee Name</th>
                            <th>Details</th>


                        </tr>
                    </thead>
                    <tbody class="tr_search_wise_data_show">
                        <?php $__currentLoopData = $lims_remainder_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$remainder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr data-id="<?php echo e($remainder->id); ?>">
                            <td><?php echo e(++$i); ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(trans('file.action')); ?>

                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                        
                                      
                                        <li>
                                            <a class="edit_btn btn btn-link" href="<?php echo e(route('remainder.edit',$remainder->id)); ?>"><i class="dripicons-document-edit"></i> <?php echo e(trans('file.edit')); ?></a>
                                        </li>
                                      
                                        
                                        <?php if(in_array("remainder-add", $all_permission)): ?>
                                        <li>
                                            <a href="<?php echo e(route('addremainderLeadId',$remainder->lead_id)); ?>" class="btn btn-link" target="_blank"><i class="fa fa-plus"></i>Add Remainder data</a>
                                        </li>
                                        <?php endif; ?>

                                        
                                        <li>
                                            <a href="<?php echo e(route('remainder.changestatus', $remainder->id)); ?>" class="btn btn-link"> <i class="fa fa-edit"></i>Change Status</a>
                                        </li>
                                        
                                        <?php if(in_array("employees-delete", $all_permission)): ?>

                                            <li>
                                                <a class="btn btn-link" data-toggle="modal" data-target="#myModal<?php echo e($remainder->id); ?>"><i class=" dripicons-trash"></i> Delete</a>
                                            </li>

                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <?php if($remainder->stage == 0): ?>
                                <strong class="" style="color: red">RE <i class="fa fa-times-circle px-2" aria-hidden="true"></i></strong>
                                <?php else: ?>
                                <strong style="color: green">RE <i class="fa fa-check-square px-2" aria-hidden="true"></i></strong>
                                <?php endif; ?>

                            <td>
                                <?php echo e($remainder->user->name ?? ''); ?>

                            </td>
                            <td><?php echo e(\Carbon\Carbon::parse($remainder->noti_datetime)->format('Y-m-d')); ?></td>
                            <td><?php echo e($remainder->lead->name ?? ''); ?> </td>
                            <td><?php echo e($remainder->lead->company ?? ''); ?></td>
                            <td><?php echo e($remainder->lead->phone_number ?? ''); ?></td>
                            <td><?php echo e($remainder->lead->address ?? ''); ?></td>
                            <td><?php echo e($remainder->lead->employee->name ?? ''); ?></td>

                            <td><?php echo Str::limit($remainder->description, 50, ' ...'); ?></td>


                        </tr>
                        <?php echo $__env->make('remainder.modal_for_update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('remainder.deleted_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <br>
                <br>
            </div>
            <?php echo e($lims_remainder_all->links()); ?>

        </div>
    </div>

</section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('public/js/select2.full.min.js')); ?>"></script>

<script>
    $("ul#lead").siblings('a').attr('aria-expanded', 'true');
    $("ul#lead").addClass("show");
    $("ul#lead #employee-menu").addClass("active");

    $(document).on('keyup', '.searchingdata', function() {
        var searchingdata = $('.searchingdata').val();

        console.log(searchingdata);
        $.ajax({
            type: 'get'
            , url: "<?php echo e(route('getRemainderData')); ?>"
            , dataType: 'HTML'
            , data: {
                searchingdata: searchingdata
            }
            , 'global': false
            , asyn: true
            , success: function(data) {
                $(".tr_search_wise_data_show").html(data)
                console.log(data)
            }
            , error: function(response) {
                console.log(response);
            }
        });
    });

</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\crm\resources\views/remainder/index.blade.php ENDPATH**/ ?>