

<?php $__env->startSection('title'); ?>
    Ajouter un achat
<?php $__env->stopSection(); ?>

<?php if(env('APP_NAME') == 'PED'): ?>
    <?php echo $__env->first(['purchase.custom.pediatre_edit', 'purchase.specialty.pediatre.create'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(env('APP_NAME') == 'OPH'): ?>
    <?php echo $__env->first(['purchase.custom.ophtamologie_edit', 'purchase.specialty.ophtamologie.create'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\doctor-generalist.tayssir.cloud\resources\views/purchase/create.blade.php ENDPATH**/ ?>