
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 
    <style type="text/css">
        .a{
            font-size: 16px;
            font-weight: 700;
        }
    </style><br>
    

    <div class="col-md-12">
        <div class="card col-md-12">
            <br>
            <ul class="nav nav-tabs a" role="tablist">

                <li class="nav-item" >
                    <a class="nav-link active" href="#product-detail" role="tab" data-toggle="tab">Lead Detail</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#remainder" role="tab" data-toggle="tab">Reminder</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" href="#quotation" role="tab" data-toggle="tab">Quotation</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" href="#sales" role="tab" data-toggle="tab">Sales</a>
                </li>

                <li class="nav-item" >
                    <a class="nav-link" href="#projects" role="tab" data-toggle="tab">Project</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" href="#tickets" role="tab" data-toggle="tab">Ticket</a>
                </li>

            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade show active" id="product-detail">
                    <br>
                    <?php if($lead->name): ?>
                        <div style="padding: 10px 20px;">
                            <strong>Name:</strong>  <?php echo e($lead->name ?? ''); ?>


                        </div>
                    <?php endif; ?>
                    <?php if($lead->company): ?>
                        <div style="padding: 10px 20px;">
                            <strong>Company:</strong>  <?php echo e($lead->company ?? ''); ?>

                        </div>
                    <?php endif; ?>
                    <?php if($lead->email): ?>
                        <div style="padding: 10px 20px;">
                            <strong>Email:</strong>  <?php echo e($lead->email  ?? ''); ?>

                        </div>
                    <?php endif; ?>
                    <?php if($lead->phone_number): ?>
                        <div style="padding: 10px 20px;">
                            <strong>Phone Number:</strong>  <?php echo e($lead->phone_number ?? ''); ?>

                        </div>
                    <?php endif; ?>

                    <?php if($lead->another_phone_no): ?>
                        <div style="padding: 10px 20px;">
                            <strong>Another Phone Number:</strong>  <?php echo e($lead->another_phone_no ?? ''); ?>

                        </div>
                    <?php endif; ?>



                    <?php if($lead->web): ?>
                        <div style="padding: 10px 20px;">
                            <strong>Website:</strong>  <?php echo e($lead->web  ?? ''); ?>

                        </div>
                    <?php endif; ?>
                    <?php if($lead->address): ?>
                        <div style="padding: 10px 20px;">
                            <strong>Address:</strong>  <?php echo e($lead->address ?? ''); ?>

                        </div>
                    <?php endif; ?>

                    <?php if($lead->employee_id): ?>
                        <div style="padding: 10px 20px;">
                            <strong>Employee :</strong>  <?php echo e($lead->employee->name ?? ''); ?>

                        </div>
                    <?php endif; ?>

                    <?php if($lead->lead_category_id): ?>
                        <div style="padding: 10px 20px;">
                            <strong>Lead Category :</strong>  <?php echo e($lead->lead_category->lead_cat_name ?? ''); ?>

                        </div>
                    <?php endif; ?>


                <?php if($lead->lead_status_id): ?>
                        <div style="padding: 10px 20px;">
                            <strong>Lead Status:</strong>  <?php echo e($lead->lead_status->status_name ?? ""); ?>

                        </div>
                    <?php endif; ?>


                    <?php if($lead->lead_source_id): ?>
                        <div style="padding: 10px 20px;">
                            <strong>Lead Source:</strong>  <?php echo e($lead->lead_source->source_name ?? ''); ?>

                        </div>
                    <?php endif; ?>


                    <?php if($lead->description): ?>
                        <div style="padding: 10px 20px;">
                            <strong>Description:</strong>  <?php echo $lead->description ?? ''; ?>

                        </div>
                    <?php endif; ?>

                </div>

                <div role="tabpanel" class="tab-pane fade" id="remainder">
                    <div class="table-responsive"><br>
                        <table class="table" id="example">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th style="width: 40%">Details</th>
                                <th> Lead Person</th>
                                <th> Notification Datetime</th>
                                <th>User</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $lims_remainder_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$remainder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr data-id="<?php echo e($remainder->id); ?>">
                                    <td><?php echo e(++$key); ?></td>
                                    <td style="width: 30%"><?php echo ($remainder->description ?? ''); ?></td>
                                    <td><?php echo e($remainder->lead->name ?? ''); ?> ( <?php echo e($remainder->lead->company ?? ''); ?> )</td>
                                    <td><?php echo e(\Carbon\Carbon::parse($remainder->noti_datetime ?? '')->format('Y-m-d')); ?></td>
                                    <td><?php echo e($remainder->employee->name ?? ''); ?></td>
                                    <?php if($remainder->stage == 0): ?>
                                        <td> <strong style="color: red">Incomplete</strong></td>
                                    <?php else: ?>
                                        <td> <strong style="color: green">Complete</strong></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="quotation">
                    <div class="table-responsive"><br>
                        <table class="table" id="example2">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th><?php echo e(trans('file.Date')); ?></th>
                                <th><?php echo e(trans('file.reference')); ?></th>
                                <th>Contact Person</th>
                                <th>User</th>
                                <th><?php echo e(trans('file.Quotation Status')); ?></th>
                                <th> Stage</th>
                                <th><?php echo e(trans('file.grand total')); ?></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $lims_quotation_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$quotation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                if($quotation->quotation_status == 1)
                                    $status = trans('file.Pending');
                                else
                                    $status = trans('file.Sent');
                                ?>
                                <tr class="quotation-link" data-quotation='["<?php echo e(date($general_setting->date_format, strtotime($quotation->created_at->toDateString()))); ?>", "<?php echo e($quotation->reference_no); ?>", "<?php echo e($status); ?>", "<?php echo e($quotation->user->name); ?>", "<?php echo e($quotation->user->email); ?>","<?php echo e($quotation->user->name); ?>", "<?php echo e($quotation->user->name); ?>", "<?php echo e($quotation->user->name); ?>", "<?php echo e($quotation->user->name); ?>", "<?php echo e($quotation->lead->name); ?>", "<?php echo e($quotation->lead->phone_number); ?>", "<?php echo e($quotation->lead->address); ?>", "<?php echo e($quotation->lead->company); ?>", "<?php echo e($quotation->id); ?>", "<?php echo e($quotation->total_tax); ?>", "<?php echo e($quotation->total_discount); ?>", "<?php echo e($quotation->total_price); ?>", "<?php echo e($quotation->order_tax); ?>", "<?php echo e($quotation->order_tax_rate); ?>", "<?php echo e($quotation->order_discount); ?>", "<?php echo e($quotation->shipping_cost); ?>", "<?php echo e($quotation->grand_total); ?>", "<?php echo e($quotation->note); ?>", "<?php echo e($quotation->user->name); ?>", "<?php echo e($quotation->user->email); ?>"]'>

                                    <td><?php echo e(++$key); ?></td>
                                    <td><?php echo e(date(($general_setting->date_format ?? ''), strtotime($quotation->created_at->toDateString())) . ' '. $quotation->created_at->toTimeString()); ?></td>
                                    <td><?php echo e($quotation->reference_no ?? ''); ?></td>
                                    <td><?php echo e($quotation->lead->name ?? ""); ?> ( <?php echo e($quotation->lead->company ?? ""); ?> )</td>
                                    <td><?php echo e($quotation->user->name ?? ''); ?></td>
                                    <?php if($quotation->quotation_status == 1): ?>
                                        <td><div class="badge badge-danger"><?php echo e($status); ?></div></td>
                                    <?php else: ?>
                                        <td><div class="badge badge-success"><?php echo e($status); ?></div></td>
                                    <?php endif; ?>
                                    <?php if($quotation->stage == 1): ?>
                                        <td><div class="badge badge-danger"> Unapproved</div></td>
                                    <?php elseif($quotation->stage == 2): ?>
                                        <td><div class="badge badge-success">Approved</div></td>
                                    <?php else: ?>
                                        <td><div class="badge badge-warning">Pending</div></td>
                                    <?php endif; ?>
                                    <td><?php echo e($quotation->grand_total ?? 0); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if(!empty($lims_sale_all)): ?>
                <div role="tabpanel" class="tab-pane fade" id="sales">
                    <div class="table-responsive"><br>
                        <table class="table" id="example1">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th><?php echo e(trans('file.date')); ?></th>
                                <th><?php echo e(trans('file.reference')); ?></th>
                                <th><?php echo e(trans('file.customer')); ?></th>
                                <th>Sale Status</th>
                                <th>Payment Status</th>
                                <th>Ground Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $lims_sale_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$key); ?></td>
                                    <td><?php echo e(date(($general_setting->date_format ?? ''), strtotime($sale->created_at->toDateString()))); ?></td>
                                    <td><?php echo e($sale->reference_no ?? ''); ?></td>
                                    <td><?php echo e($sale->customer->name ?? ''); ?></td>
                                    <?php if($sale->sale_status == 1): ?>
                                        <td><div class="badge badge-success">Completed</div></td>
                                    <?php else: ?>
                                        <td><div class="badge badge-danger">Pending</div></td>
                                    <?php endif; ?>

                                    <?php if($sale->payment_status == 1): ?>
                                        <td><div class="badge badge-danger">Pending</div></td>
                                    <?php elseif($sale->payment_status == 2): ?>
                                        <td><div class="badge badge-warning">Due</div></td>
                                    <?php elseif($sale->payment_status == 3): ?>
                                        <td><div class="badge badge-warning">Partial</div></td>
                                    <?php else: ?>
                                        <td><div class="badge badge-success">Paid</div></td>
                                    <?php endif; ?>
                                    <td><?php echo e($sale->grand_total ?? 0); ?> BDT</td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif; ?>
                <?php if(!empty($lims_project_all)): ?>
                <div role="tabpanel" class="tab-pane fade" id="projects">
                    <div class="table-responsive"><br>
                        <table class="table" id="example3">
                            <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Sale Reference</th>
                                <th>Customer</th>
                                <th>Company</th>
                                <th>Progress</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Grand Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $lims_project_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $sales = App\Sale::where('id',$project->sales_id)->first();
                                ?>
                                <tr>
                                    <td><?php echo e($project->project_name ?? ""); ?></td>
                                    <td><?php echo e($sales->reference_no ?? ""); ?></td>
                                    <td><?php echo e($project->customer->name ?? ""); ?></td>
                                    <td><?php echo e($project->customer->company_name ?? ""); ?></td>
                                    <td>
                                        <progress id="file"  value="<?php echo e($project->progress ?? ''); ?>" max="100"> <?php echo e($project->progress); ?>% </progress> <?php echo e($project->progress); ?>%
                                    </td>
                                    <td><?php echo e(date($general_setting->date_format, strtotime($project->start_date))); ?></td>
                                    <td><?php echo e(date($general_setting->date_format, strtotime($project->end_date))); ?></td>
                                    <td><?php echo e($sales->grand_total ?? 0); ?> BDT</td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif; ?>
                <?php if(!empty($lims_ticket_all)): ?>

                <div role="tabpanel" class="tab-pane fade" id="tickets">
                    <div class="table-responsive"><br>
                        <table class="table" id="example4">
                            <thead>
                            <tr>
                                <th><?php echo e(trans('file.date')); ?></th>
                                <th>Subject</th>
                                <th>Project Name</th>
                                <th>Customer Name</th>
                                <th> Employee</th>
                                <th> Priority</th>
                                <th> Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $lims_ticket_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(date($general_setting->date_format, strtotime($ticket->created_at->toDateString()))); ?></td>
                                    <td><a target="_blank" href="<?php echo e(route('ticket_replies.create_replies', ['id' => $ticket->id])); ?>"><?php echo e($ticket->subject); ?></a></td>
                                    <td><?php echo e($ticket->project->project_name ?? ""); ?></td>
                                    <td><?php echo e($ticket->customer->name ?? ""); ?></td>
                                    <td><?php echo e($ticket->employee->name ?? ""); ?></td>
                                    <?php if($ticket->priority == 1): ?>
                                        <td>High</td>
                                    <?php else: ?>
                                        <td>Low</td>
                                    <?php endif; ?>
                                    <td><?php echo Str::limit(($ticket->description ?? ""), 30, ' ...'); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example1').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example2').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example3').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example4').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example5').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>
<script type="text/javascript">
    $('#editor').html($('#editorCopy').val());

    $('#postSubmit').click(function () {
        $('#editorCopy').val($('#editor').html());
    });
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/acquqkkb/public_html/atechcrm/resources/views/lead/details.blade.php ENDPATH**/ ?>