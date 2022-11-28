<?php $__empty_1 = true; $__currentLoopData = $lims_remainder_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$remainder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        
<tr data-id="<?php echo e($remainder->id); ?>">
    <td><?php echo e(++$i); ?></td>
    <td>
        <div class="btn-group" >
            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(trans('file.action')); ?>

                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu" style="height: 150px;over-flow:hidden">
                   <?php if(Auth()->user()->id == 1 || $remainder->noti_datetime == date('Y-m-d')): ?>
                    <li>
                        <a  class="edit_btn btn btn-link" href="<?php echo e(route('remainder.edit',$remainder->id)); ?>" ><i class="dripicons-document-edit"></i> <?php echo e(trans('file.edit')); ?></a>
                    </li>
                    <?php endif; ?>

                  
                    <li>
                        <a href="<?php echo e(route('addremainderLeadId',$remainder->lead_id)); ?>" class="btn btn-link" target="_blank"><i class="fa fa-plus"></i>Add Remainder data</a>
                    </li>

                    <?php if(Auth()->user()->id == 1 || $remainder->noti_datetime == date('Y-m-d')): ?>
                    <li>
                        <a href="<?php echo e(route('remainder.changestatus', $remainder->id)); ?>" class="btn btn-link"> <i class="fa fa-edit"></i>Change Status</a>
                    </li>
                    <?php endif; ?>
             
                    <li>
                        <a href="<?php echo e(route('remainder.destroy', $remainder->id)); ?>" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> <?php echo e(trans('file.delete')); ?></a>
                    </li>
            
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<tr class="">
    <th class="text-danger text-center" colspan="8">
        <h4 class="">Table Data is Not Available</h4>
    </th>
</tr>
<?php endif; ?><?php /**PATH /home/acquqkkb/public_html/atechcrm/resources/views/remainder/get_remainder_by_ajax.blade.php ENDPATH**/ ?>