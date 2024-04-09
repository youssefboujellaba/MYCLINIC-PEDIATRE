

<?php $__env->startSection('title'); ?>
    <?php echo e(__('sentence.Add Drug')); ?>

<?php $__env->stopSection(); ?>


<?php if(env('APP_NAME') == 'GEN'): ?>
    <?php echo $__env->first(['drug.custom.generalist_create', 'drug.specialty.generalist.create'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(env('APP_NAME') == 'PED'): ?>
    <?php echo $__env->first(['drug.custom.pediatre_create', 'drug.specialty.pediatre.create'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(env('APP_NAME') == 'OPH'): ?>
    <?php echo $__env->first(['drug.custom.ophtamologie_create', 'drug.specialty.ophtamologie.create'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\doctor-generalist.tayssir.cloud\resources\views/drug/create.blade.php ENDPATH**/ ?>