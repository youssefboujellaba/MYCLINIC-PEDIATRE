

<?php $__env->startSection('title'); ?>
    Tout les Rapport
<?php $__env->stopSection(); ?>

<?php if(env('APP_NAME') == 'GEN'): ?>
    <?php echo $__env->first(['rapport.custom.generalist_create', 'rapport.specialty.generalist.all'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(env('APP_NAME') == 'PED'): ?>
    <?php echo $__env->first(['rapport.custom.pediatre_create', 'rapport.specialty.pediatre.all'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\doctor-generalist.tayssir.cloud\resources\views/rapport/all.blade.php ENDPATH**/ ?>