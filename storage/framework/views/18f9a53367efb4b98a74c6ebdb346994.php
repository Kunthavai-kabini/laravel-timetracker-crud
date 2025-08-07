<form id="addTask" method="POST" class="formCls"> 
                                               <?php echo csrf_field(); ?>
                                               <input type="hidden" name="task_id" id="task_id" >
                       
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addTaskModalLabel">Add Task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="edit-user-id" name="id">
                                <div class="mb-3">
                                    <label for="edit-name" class="form-label">Task Added On</label>
                                    <input type="date" class="form-control date-picker" id="task_added_on" name="task_added_on" required>
                                    <span class="text-danger error" id="error-task_added_on"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="edit-name" class="form-label">Task Description</label>
                                    <textarea class="form-control" id="task_description" name="task_description" required></textarea>
                                    <span class="text-danger error" id="error-task_description"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="start_time" class="form-label">Hours</label>
                                    <input type="number" name="hours" min="0" max="10" class="form-control" required>
                                    <span class="text-danger error" id="error-hours"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="end_time" class="form-label">Minutes</label>
                                    <input type="number" name="minutes" min="0" max="59" class="form-control" required>
                                    
                                    <span class="text-danger error" id="error-minutes"></span>
                                </div>
                                
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Add Task</button>
                            </div>
                        </div>
                    </form>
                    

    
   <?php /**PATH D:\Xampp\htdocs\portal\resources\views/timelogs/task_add.blade.php ENDPATH**/ ?>