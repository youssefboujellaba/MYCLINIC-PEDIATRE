

<?php $__env->startSection('title'); ?>
    <?php echo e(__('sentence.Add analyse')); ?>

<?php $__env->stopSection(); ?>

<?php if(env('APP_NAME') == 'GEN'): ?>
    <?php echo $__env->first(['analyse.custom.generalist_create', 'analyse.specialty.generalist.create'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(env('APP_NAME') == 'PED'): ?>
    <?php echo $__env->first(['analyse.custom.pediatre_create', 'analyse.specialty.pediatre.create'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\doctor-generalist.tayssir.cloud\resources\views/analyse/create.blade.php ENDPATH**/ ?>