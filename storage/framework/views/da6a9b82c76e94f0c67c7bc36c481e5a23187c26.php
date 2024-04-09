

<?php $__env->startSection('title'); ?>
    <?php echo e(__('sentence.All Prescriptions')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-8">
                    <h6 class="m-0 font-weight-bold text-primary w-75 p-2"><?php echo e(__('sentence.All Prescriptions')); ?></h6>
                </div>
                <div class="col-4">
                    <a href="<?php echo e(route('prescription.create')); ?>" class="btn rounded-0  btn-primary btn-sm float-right"><i
                            class="fa fa-plus"></i> <?php echo e(__('sentence.New Prescription')); ?></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            
                            <th><?php echo e(__('sentence.Patient')); ?></th>
                            <th class="text-center sm__screen">Date consultation</th>
                            <th class="text-center ">Prescription</th>
                            <th class="text-center xxs__screen">Statut du paiement</th>
                            <th class="text-center"><?php echo e(__('sentence.Actions')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $prescriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prescription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                
                                <td>
                                    <a href="<?php echo e(url('patient/view/' . $prescription->user_id)); ?>">
                                        <?php echo e($prescription->User->name); ?> </a>
                                </td>
                                <td class="text-center sm__screen"><?php echo e($prescription->created_at->format('d-m-Y')); ?></td>
                                <td class="text-center">
                                    <label class="badge badge-primary-soft">
                                        <?php echo e(count($prescription->Drug)); ?> Médicaments
                                    </label>
                                    <label class="badge badge-primary-soft">
                                        <?php echo e(count($prescription->Test)); ?> Analyse
                                    </label>
                                </td>
                                <td class="text-center xxs__screen">
                                    <?php if($billingExists[$prescription->id]): ?>
                                        <?php if($paymentStatus[$prescription->id] == 'Unpaid'): ?>
                                            <label class="badge badge-danger-soft">
                                                <i class="fas fa-hourglass-start"></i> <?php echo e(__('sentence.Unpaid')); ?>

                                            </label>
                                        <?php elseif($paymentStatus[$prescription->id] == 'Paid'): ?>
                                            <label class="badge badge-success-soft">
                                                <i class="fas fa-check"></i> <?php echo e(__('sentence.Paid')); ?>

                                            </label>
                                        <?php elseif($paymentStatus[$prescription->id] == 'Partially Paid'): ?>
                                            <label class="badge badge-warning-soft">
                                                <i class="fas fa-hourglass-start"></i> <?php echo e(__('sentence.Partially Paid')); ?>

                                            </label>
                                        <?php else: ?>
                                        <?php endif; ?>
                                        <!-- Handle case where no billing entry exists -->
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo e(url('prescription/view/' . $prescription->id . '?user_id=' . $prescription->user_id)); ?>"
                                        class="btn   btn-outline-success btn-circle btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="<?php echo e(url('prescription/edit/' . $prescription->id . '?user_id=' . $prescription->user_id)); ?>"
                                        class="btn   btn-outline-warning btn-circle btn-sm"><i class="fas fa-pen"></i></a>
                                    <a class="btn   btn-outline-danger btn-circle btn-sm" data-toggle="modal"
                                        data-target="#DeleteModal"
                                        data-link="<?php echo e(url('prescription/delete/' . $prescription->id)); ?>"><i
                                            class="fas fa-trash"></i></a>
                                    <?php if($billingExists[$prescription->id]): ?>
                                        <!-- Display link for editing billing when billing exists -->
                                        <a href="<?php echo e(url('billing/edit', ['billing_id' => $billingIds[$prescription->id]])); ?>"
                                            class="btn   btn-outline-info btn-circle btn-sm">
                                            <i class="fas fa-dollar-sign"></i>
                                        </a>
                                    <?php else: ?>
                                        <!-- Display link for creating billing when billing doesn't exist -->
                                        <a href="<?php echo e(url('billing/create') . '?p=' . $prescription->id . '&u=' . $prescription->user_id); ?>"
                                            class="btn   btn-outline-secondary active btn-circle btn-sm">
                                            <i class="fas fa-dollar-sign"></i>
                                        </a>
                                    <?php endif; ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center"><img src="<?php echo e(asset('img/not-found.svg')); ?>"
                                        width="200" /> <br><br> <b class="text-muted">No
                                        prescriptions found</b></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <span class="float-right mt-3"><?php echo e($prescriptions->links()); ?></span>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kuuhaku\Desktop\laravel\doctor-generalist.tayssir.cloud\resources\views/prescription/all.blade.php ENDPATH**/ ?>