<?php $__env->startSection('title'); ?>
    <?php echo e(__('sentence.Edit Patient')); ?>

<?php $__env->stopSection(); ?>

<?php if(env('APP_NAME') == 'GEN'): ?>
    <?php echo $__env->first(['patient.custom.generalist_create', 'patient.specialty.generalist.edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(env('APP_NAME') == 'PED'): ?>
    <?php echo $__env->first(['patient.custom.pediatre_create', 'patient.specialty.pediatre.edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(env('APP_NAME') == 'OPH'): ?>
    <?php echo $__env->first(['patient.custom.ophtamologie_create', 'patient.specialty.ophtamologie.edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(env('APP_NAME') == 'DENT'): ?>
    <?php echo $__env->first(['patient.custom.dentiste_create', 'patient.specialty.dentiste.edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp641\www\MYCLINIC-PEDIATRE\MYCLINIC-PEDIATRE\resources\views/patient/edit.blade.php ENDPATH**/ ?>