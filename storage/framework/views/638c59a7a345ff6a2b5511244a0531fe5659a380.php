<div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">Update Reminder</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
            </div>
            <div class="modal-body">
                <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                <?php echo Form::open(['route' => ['remainder.update', 1], 'method' => 'put', 'files' => true]); ?>

                <div class="row">
                    <div class="col-md-6">


                        <div class="form-group">
                            <label>Lead </label>
                            <input type="text" name="remainder_id"/>
                            
                        </div>

                    <div class="form-group">

                        <label> Notification Datetime *</strong> </label>
                        <input type="date" name="noti_datetime" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Lead Details</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label>User </label>
                        <input type="hidden" name="user_hidden_id"/>
                        <select required id="user_id" name="user_id" class="form-control selectpicker">
                            <?php $__currentLoopData = $lims_user_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>


                        <div class="form-group">
                            <label>Stage </label>
                            
                            <select required id="stage" name="stage" class="form-control selectpicker">
                               <option selected value="0">Incomplete</option>
                               <option selected value="1">Complete</option>
                            </select>
                        </div>


                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
</div><?php /**PATH /home/acquqkkb/public_html/atechcrm/resources/views/remainder/modal_for_update.blade.php ENDPATH**/ ?>