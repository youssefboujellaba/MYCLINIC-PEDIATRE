<?php $__env->startSection('title'); ?>
<?php echo e(__('sentence.All analyses')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="card shadow mb-4">
   <div class="card-header py-3">
      <div class="row">
         <div class="col-8">
            <h6 class="m-0 font-weight-bold text-primary w-75 p-2"><?php echo e(__('sentence.All analyses')); ?></h6>
         </div>
         <div class="col-4">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create diagnostic analyse')) : ?>
               <a href="<?php echo e(route('analyse.create')); ?>" class="btn rounded-0  btn-primary btn-sm float-right"><i class="fa fa-plus"></i> <?php echo e(__('sentence.Add analyse')); ?></a>
            <?php endif; ?>
         </div>
      </div>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>

                  <th><?php echo e(__('sentence.analyse Name')); ?></th>

                  <th class="text-center"><?php echo e(__('sentence.Actions')); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php $__currentLoopData = $analyses;
               $__env->addLoop($__currentLoopData);
               foreach ($__currentLoopData as $analyse) : $__env->incrementLoopIndices();
                  $loop = $__env->getLastLoop(); ?>
                  <tr>

                     <td><?php echo e($analyse->analyse_name); ?></td>



                     <td class="text-center">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit diagnostic test')) : ?>
                           <a href="<?php echo e(url('analyse/edit/' . $analyse->id)); ?>" class="btn rounded-0  btn-outline-warning btn-circle btn-sm"><i class="fa fa-pen"></i></a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete diagnostic test')) : ?>
                           <a class="btn rounded-0  btn-outline-danger btn-circle btn-sm" data-toggle="modal" data-target="#DeleteModal" data-link="<?php echo e(url('analyse/delete/' . $analyse->id)); ?>"><i class="fa fa-trash"></i></a>
                        <?php endif; ?>
                     </td>
                  </tr>
               <?php endforeach;
               $__env->popLoop();
               $loop = $__env->getLastLoop(); ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Documents\GitHub\doctor\resources\views/analyse/all.blade.php ENDPATH**/ ?>