

<?php $__env->startSection('title'); ?>
    <?php echo e($patient->name); ?>

<?php $__env->stopSection(); ?>
<?php if(env('APP_NAME') == 'GEN'): ?>
    <?php echo $__env->first(['patient.custom.generalist_create', 'patient.specialty.generalist.view'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(env('APP_NAME') == 'PED'): ?>
    <?php echo $__env->first(['patient.custom.pediatre_create', 'patient.specialty.pediatre.view'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(env('APP_NAME') == 'OPH'): ?>
    <?php echo $__env->first(['patient.custom.ophtamologie_create', 'patient.specialty.ophtamologie.view'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>s
<?php endif; ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\doctor-generalist.tayssir.cloud\resources\views/patient/view.blade.php ENDPATH**/ ?>