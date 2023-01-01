            <!---Modal start----->
            <div class="modal" id="myModal<?php echo e($remainder->id); ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Delete item</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <form action="<?php echo e(route('remainder.destroy',$remainder->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field("DELETE"); ?>
                            <!-- Modal body -->
                            <div class="modal-body">
                                Are you sure to delete ?
                                <input type="hidden" value="<?php echo e($remainder->id); ?>" name="id">
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            </div>
            <!---Modal end----->

<?php /**PATH C:\laragon\www\crm\resources\views/remainder/deleted_modal.blade.php ENDPATH**/ ?>