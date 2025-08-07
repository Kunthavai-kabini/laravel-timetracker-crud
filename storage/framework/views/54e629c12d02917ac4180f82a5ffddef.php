   
   <?php $__env->startSection('content'); ?>
   <?php if(session('succMsg') || request('succMsg')): ?>
                <div class="alert alert-success">
                    <?php if(session('succMsg')): ?>
                  <?php echo e(session('succMsg')); ?>

                  <?php else: ?>
                  <?php echo e(request('succMsg')); ?>

                  <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php if(request('success')): ?>
    <div class="alert alert-success">
        Employee updated successfully!
    </div>
<?php endif; ?>
   <br>
   <button type="button" class="btn btn-secondary mb-1 addCls" id="addTask" style="margin-left: 16px">Add Task</button>&nbsp;&nbsp;
   <button type="button" class="btn btn-secondary mb-1 addCls" id="addLeave" style="margin-left: 16px">Add Leave</button>&nbsp;&nbsp;
   
   <br><br>
   <style>
   .fa-2x task{
    font-size: 1em !important;   

}
</style>

<div class="content mt-3">
    <div class="animated fadeIn">
   <div class="row">
   <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Task List</strong>
        </div>
        <div class="card-body">
        <?php if($task_lists->isNotEmpty()): ?>
        <?php $__currentLoopData = $task_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $logs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h3><?php echo e(\Carbon\Carbon::parse($date)->toFormattedDateString()); ?></h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Hours</th>
                    <th>Minutes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($log->task_description); ?></td>
                        <td><?php echo e($log->hours); ?></td>
                        <td><?php echo e($log->minutes); ?></td>
                        <td> <a class="loadTask" href="javascript:void(0)" data-id="<?php echo e($log->id); ?>" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>&nbsp;&nbsp;
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    

                <?php else: ?>
                No Data
                <?php endif; ?>
               

        </div>
    </div>
    </div>
</div> 
</div>
</div>


    <div class="modal fade" id="taskModal" tabindex="-1">
  <div class="modal-dialog" id="taskModalContent">
  </div>
  </div>
 
    <script>
    const taskEditUrl = "<?php echo e(route('ajax.editTask')); ?>";
    
</script>
 <?php $__env->stopSection(); ?>
   
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xampp\htdocs\portal\resources\views/timelogs/list.blade.php ENDPATH**/ ?>