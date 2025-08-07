<form id="editTaskForm" method="POST"> 
                                               <?php echo csrf_field(); ?>
                                               <input type="hidden" name="id" id="id" value="<?php echo e($task_data['id']); ?>">
                       
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editTaskModalLabel">Edit Task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="mb-3">
                                    <label for="edit-name" class="form-label">Task Added On</label>
                                    <?php
    $dateValue = null;
    if ($task_data->task_added_on) {
        try {
            $dateValue = \Carbon\Carbon::parse($task_data->task_added_on)->format('Y-m-d');
        } catch (\Exception $e) {
            $dateValue = null;
        }
    }
?>
                                    <input type="date" class="form-control " id="task_added_on" name="task_added_on" value="<?php echo e($dateValue); ?>" readonly required>
                                    <span class="text-danger error" id="error-task_added_on"></span>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="edit-name" class="form-label">Task Description</label>
                                    <textarea class="form-control" id="task_description" name="task_description" required><?php echo e($task_data['task_description']); ?></textarea>
                                    <span class="text-danger error" id="error-task_description"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="start_time" class="form-label">Hours</label>
                                    <input type="number" name="hours" class="form-control" value="<?php echo e($task_data['hours']); ?>" required>
                                    <span class="text-danger error" id="error-hours"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="end_time" class="form-label">Minutes</label>
                                    <input type="number" name="minutes" class="form-control" value="<?php echo e($task_data['minutes']); ?>" required>
                                    
                                    <span class="text-danger error" id="error-minutes"></span>
                                </div>
                               
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Edit Task</button>
                            </div>
                        </div>
                    </form>
                    

    
   <?php /**PATH D:\Xampp\htdocs\portal\resources\views/timelogs/task_edit.blade.php ENDPATH**/ ?>