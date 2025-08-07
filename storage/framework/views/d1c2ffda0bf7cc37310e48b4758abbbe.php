<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo e(url('css/bootstrap.min.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">



    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" /> -->
    <link rel="stylesheet" href="<?php echo e(url('css/style_sufee.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(url('css/style.css')); ?>">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <!-- <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/common.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    
</head>
<body >

    <?php echo $__env->make('layouts/includes/header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>    
    <?php echo $__env->yieldContent('content'); ?>
   
    <?php echo $__env->make('layouts/includes/footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  
    

    
</body>
</html><?php /**PATH D:\Xampp\htdocs\portal\resources\views/layouts/master.blade.php ENDPATH**/ ?>