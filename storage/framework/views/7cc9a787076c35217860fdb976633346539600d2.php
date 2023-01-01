<?php $__currentLoopData = $lims_lead_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
// dd($lead);
$remainder = \App\Remainder::where('lead_id',$lead->id)->first();
//dd($remainder);
?>
<tr data-id="<?php echo e($lead->id); ?>">
    <td><?php echo e(++$i); ?></td>
    <td>
        <div class="btn-group" >
            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(trans('file.action')); ?>

                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <style>
                .drop_down_class {
                
                  width: 200px;
                  height: 55px;
                  overflow-x: hidden;
                  overflow-y: scroll;
                }
                </style>
            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default drop_down_class" user="menu" >
                <li>
                    
                    <a href="<?php echo e(route('lead.details', $lead->id)); ?>" class="btn btn-link"><i class="fa fa-bars"></i> Details</a>
                </li>

             
                    <li>
                        <a href="<?php echo e(route('lead.edit',$lead->id)); ?>" class="edit-btn btn btn-link"><i class="fa fa-edit"></i>Edit data</a>
                          
                    </li>
           
           
                <li>
                    <a href="<?php echo e(route('addremainderLeadId',$lead->id)); ?>" class="btn btn-link"><i class="fa fa-plus"></i>Add Remainder data</a>
                </li>
            

           
                    <li>
                        <a  href="<?php echo e(route('lead.destroy', $lead->id)); ?>" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> <?php echo e(trans('file.delete')); ?></a>
                    </li>
              
            </ul>
         

        </div>
    </td>
    <?php if($lead->stage == 1 ): ?>
    <td>
        <a href="#" class="btn btn-danger btn-xs"><strong> Unapproved</strong></a>
    </td>
    <?php elseif($lead->stage == 2): ?>
    <td>
        <a href="#" class="btn btn-success btn-xs"> <strong>Approved</strong></a>
    </td>
    <?php else: ?>
    <td>
        <a href="#" class="btn btn-warning btn-xs"> <strong>Pending</strong></a>
    </td>
    <?php endif; ?>
    <td><?php echo e(\Carbon\Carbon::parse($lead->created_at)->format('Y-m-d')); ?></td>
    <td><?php echo e($lead->company); ?></td>
    <td><?php echo e($lead->phone_number); ?></td>
    <td><?php echo e($lead->name); ?></td>
    <td><?php echo e($lead->email); ?></td>
    
    <td><?php echo e($lead->address); ?></td>
     <?php if($lead->lead_status_id == null): ?>
         <td></td>
    <?php else: ?>
        <td><?php echo e($lead->lead_status->status_name); ?></td>
    <?php endif; ?>
    <?php if($lead->lead_category_id == null): ?>
      <td></td>
     <?php else: ?>
    <td><?php echo e($lead->lead_category->lead_cat_name); ?></td>
    <?php endif; ?>
    
    

    <?php if($lead->employee_id == null): ?>
        <td></td>
    <?php else: ?>
        <td><?php echo e($lead->employee->name); ?></td>
    <?php endif; ?>

    <?php if($remainder == null): ?>
    <td></td>
    <?php else: ?>
    <td><?php echo e(\Carbon\Carbon::parse($remainder->noti_datetime)->format('Y-m-d')); ?></td>
    <?php endif; ?>
    
</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\laragon\www\crm\resources\views/lead/get_leade_by_ajax.blade.php ENDPATH**/ ?>