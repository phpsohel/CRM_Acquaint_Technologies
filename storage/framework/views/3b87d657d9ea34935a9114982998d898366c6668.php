<div id="importLead" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <?php echo Form::open(['route' => 'lead.import', 'method' => 'post', 'files' => true]); ?>

            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">Import Product</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
            </div>
            <div class="modal-body">
                <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                <p><?php echo e(trans('file.The correct column order is')); ?> ( name *,company *, email *, phone numner *,address *, description *, lead status *,lead source *,  lead category *,  employee, stage,) <?php echo e(trans('file.and you must follow this')); ?>.</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo e(trans('file.Upload CSV File')); ?> *</label>
                            <?php echo e(Form::file('file', array('class' => 'form-control','required'))); ?>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> <?php echo e(trans('file.Sample File')); ?></label>
                            <a href="public/sample_file/sample_lead.csv" class="btn btn-info btn-block btn-md"><i class="dripicons-download"></i>  <?php echo e(trans('file.Download')); ?></a>
                        </div>
                    </div>
                </div>
                <?php echo e(Form::submit('Submit', ['class' => 'btn btn-primary'])); ?>

            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div><?php /**PATH C:\laragon\www\crm\resources\views/lead/import_lead_modal.blade.php ENDPATH**/ ?>