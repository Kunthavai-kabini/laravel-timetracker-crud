<form id="addLeave" method="POST" class="formCls"> 
                                               @csrf
                                               <input type="hidden" name="leave_id" id="leave_id" >
                       
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addTaskModalLabel">Add Leave</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="edit-user-id" name="id">
                                <div class="mb-3">
                                    <label for="edit-name" class="form-label">Start Date</label>
                                    <input type="date" class="form-control date-picker" id="start_date" name="start_date" required>
                                    <span class="text-danger error" id="error-start_date"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="edit-name" class="form-label">End Date</label>
                                    <input type="date" class="form-control date-picker" id="end_date" name="end_date" required>
                                    <span class="text-danger error" id="error-end_date"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="edit-name" class="form-label">Comments</label>
                                    <textarea class="form-control" id="comments" name="comments" required></textarea>
                                    <span class="text-danger error" id="error-comments"></span>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Add Leave</button>
                            </div>
                        </div>
                    </form>
                    

    
   