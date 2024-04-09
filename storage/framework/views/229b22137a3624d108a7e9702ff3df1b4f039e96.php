<?php $__env->startSection('title'); ?>
    L'achat
<?php $__env->stopSection(); ?>
<?php if(env('APP_NAME') == 'GEN'): ?>
    <?php echo $__env->first(['prescription.custom.generalist_view', 'purchase.specialty.generalist.view'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(env('APP_NAME') == 'PED'): ?>
    <?php echo $__env->first(['purchase.custom.pediatre_edit', 'purchase.specialty.pediatre.view'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(env('APP_NAME') == 'OPH'): ?>
    <?php echo $__env->first(['purchase.custom.ophtamologie_edit', 'purchase.specialty.ophtamologie.view'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(env('APP_NAME') == 'DENT'): ?>
    <?php echo $__env->first(['purchase.custom.dentiste_edit', 'purchase.specialty.dentiste.view'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\doctor-myclinc.tayssir.cloud\resources\views/purchase/view.blade.php ENDPATH**/ ?>