

<?php $__env->startSection('content'); ?>
    <!-- page-wrapper start -->
    <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme"  data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <?php echo $__env->make($activeTemplate . 'partials.sidenav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make($activeTemplate . 'partials.topnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        <?php echo $__env->yieldContent('panel'); ?>
    </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make($activeTemplate . 'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vb\core\resources\views/templates/basic/layouts/app.blade.php ENDPATH**/ ?>