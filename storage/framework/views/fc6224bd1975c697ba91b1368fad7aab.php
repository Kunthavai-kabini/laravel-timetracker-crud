<header class="p-3 bg-dark text-white">
        <div class="row">
            <div class="col">
                <h3><?php echo e($title); ?></h3>
            </div>
            <div class="col">
                
            <?php if(Auth::check()): ?>
    <span>Welcome, <?php echo e(Auth::user()->name); ?></span>
<?php endif; ?>
          
            </div>
            <div class="col">
                <div class="d-flex justify-content-center gap-3">
                    
                    <a class="text-light text-decoration-none" href="<?php echo e(route('taskList')); ?>">Task List</a>
                </div>
            </div>
            <div class="col">
                <div class="d-flex justify-content-center gap-3">
                    
                    <a class="text-light text-decoration-none" href="<?php echo e(route('logout')); ?>">Logout</a>
                </div>
            </div>
        </div>
    </header>
    
    <?php /**PATH D:\Xampp\htdocs\portal\resources\views/layouts/includes/header.blade.php ENDPATH**/ ?>