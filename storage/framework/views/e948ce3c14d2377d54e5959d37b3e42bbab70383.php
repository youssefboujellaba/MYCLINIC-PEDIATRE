<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('sentence.Edit Drug')); ?> "<?php echo e($drug->trade_name); ?>"
                    </h6>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('drug.store_edit')); ?>">
                        <div class="form-group">
                            <label for="trade_name" class="my__label">Nom <span class="text-danger">*</span></label>
                            <input type="hidden" name="drug_id" value="<?php echo e($drug->id); ?>">
                            <input type="text" class="form-control rounded-0 shadow-none" name="trade_name"
                                id="trade_name" aria-describedby="TradeName" value="<?php echo e($drug->trade_name); ?>">
                            <?php echo e(csrf_field()); ?>

                        </div>
                        
                        
                        
                        
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="my__label">Note</label>
                            <input type="text" class="form-control rounded-0 shadow-none" name="note" id="Note">
                        </div>
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit"
                                class="btn btn-primary rounded-0 shadow-none"><?php echo e(__('sentence.Save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\MAMP\htdocs\doctor-generalist.tayssir.cloud\resources\views/drug/specialty/pediatre/edit.blade.php ENDPATH**/ ?>