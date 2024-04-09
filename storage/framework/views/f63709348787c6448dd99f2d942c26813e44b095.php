<?php $__env->startSection('title'); ?>
    <?php echo e(__('sentence.All documents')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <iframe
            src="<?php echo e(asset('/uploads/'.$document->file)); ?>"
            width="100%"
            height="800"
        ></iframe>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\doctor-generalist.tayssir.cloud\resources\views/document/view.blade.php ENDPATH**/ ?>