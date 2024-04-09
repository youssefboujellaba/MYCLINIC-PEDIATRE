

<?php $__env->startSection('title'); ?>
    Tous les achats
<?php $__env->stopSection(); ?>


<?php if(env('APP_NAME') == 'PED'): ?>
    <?php echo $__env->first(['purchase.custom.pediatre_edit', 'purchase.specialty.pediatre.all'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\doctor-generalist.tayssir.cloud\resources\views/purchase/all.blade.php ENDPATH**/ ?>