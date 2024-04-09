<?php $__env->startSection('title'); ?>
Modifier radio
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row justify-content-center">
   <div class="col-md-8">
      <div class="card shadow mb-4">
         <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Modifier radio</h6>
         </div>
         <div class="card-body">
            <form method="post" action="<?php echo e(route('radio.store_edit')); ?>">
               <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Nom radio<font color="red">*</font></label>
                  <div class="col-sm-9">
                     <input type="hidden" name="radio_id" value="<?php echo e($radio->id); ?>">
                     <input type="text" class="form-control" id="radio_name" name="radio_name" value="<?php echo e($radio->radio_name); ?>">
                     <?php echo e(csrf_field()); ?>

                  </div>
               </div>
               <div class="form-group row">
                  <div class="col-sm-9">
                     <button type="submit" class="btn rounded-0  btn-primary"><?php echo e(__('sentence.Save')); ?></button>
                  </div>
                  <label for="inputEmail3" class="col-sm-3 col-form-label" style="display: none"><?php echo e(__('sentence.Tests')); ?><font color="red">*</font></label>


               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Documents\doctor\generalist\generalist.tayssir.cloud\resources\views/radio/edit.blade.php ENDPATH**/ ?>