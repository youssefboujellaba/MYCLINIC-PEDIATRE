
<?php $__env->startSection('content'); ?>


<div class="card shadow mb-4">
   <div class="card-header py-3">
      <div class="row">
         <div class="col-6">
            <h6 class="m-0 font-weight-bold text-primary w-75 p-2">Tout les service</h6>
         </div>
         <div class="col-4">
             <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="<?php echo e(route('payment.search')); ?>" method="post">
                 <div class="input-group">
                     <input type="text" name="term" class="form-control bg-light border-0 small" placeholder="Rechercher..." aria-label="Search" aria-describedby="basic-addon2">
                     <?php echo csrf_field(); ?>
                     <div class="input-group-append">
                         <button class="btn btn-primary" type="submit">
                             <i class="fas fa-search fa-sm"></i>
                         </button>
                     </div>
                 </div>
             </form>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create diagnostic analyse')): ?>
            <a href="<?php echo e(route('payment.create')); ?>" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Tout les services</a>
            <?php endif; ?>
         </div>
          <div class="col-2">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create drug')): ?>
                  <a href="<?php echo e(route('payment.create')); ?>" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Ajoute service</a>
              <?php endif; ?>
          </div>
      </div>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>Nome du service</th>
                  <th>Prix</th>
                  <th class="text-center"><?php echo e(__('sentence.Actions')); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <tr>
                  <td><?php echo e($payment->name); ?></td>
                   <td><?php echo e($payment->price); ?></td>
                   <td class="text-center">
                       <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit diagnostic test')): ?>
                           <a href="<?php echo e(url('payment/edit/'.$payment->id)); ?>" class="btn btn-outline-warning btn-circle btn-sm"><i class="fa fa-pen"></i></a>
                       <?php endif; ?>
                       <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete diagnostic test')): ?>
                           <a class="btn btn-outline-danger btn-circle btn-sm" data-toggle="modal" data-target="#DeleteModal" data-link="<?php echo e(url('payment/delete/'.$payment->id)); ?>"><i class="fa fa-trash"></i></a>
                       <?php endif; ?>
                   </td>
               </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\MAMP\htdocs\MYCLINIC-PEDIATRE\resources\views/payment/specialty/pediatre/all.blade.php ENDPATH**/ ?>