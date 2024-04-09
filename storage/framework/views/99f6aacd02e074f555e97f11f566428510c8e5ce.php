

<?php $__env->startSection('title'); ?>
    Ajouter un Déposes
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ajouter une Dépose</h6>
                </div>
                <div class="card-body">

                    <form action="<?php echo e(route('depense.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="" class="my__label">Label <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-0 w-100 shadow-none" name="label"
                                    id="label">
                            </div>


                        </div>

                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="" class="my__label">Monton <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-0 w-100 shadow-none" name="monton"
                                    id="monton">
                            </div>

                            <div class="form-group col-6">
                                <label for="" class="my__label">Type déposes <span
                                        class="text-danger"></span></label>
                                <select name="type_depenses" id="type_depenses"
                                    class='form-control rounded-0 w-100 shadow-none'>
                                    <?php $__currentLoopData = $type_depenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type_depense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($type_depense->name); ?>"><?php echo e($type_depense->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>


                        </div>

                        <div class="form-row">

                            <div class="form-group col-6">
                                <label for="" class="my__label">Tiers <span class="text-danger"></span></label>
                                <input type="text" class="form-control rounded-0 w-100 shadow-none" name="created_by"
                                    id="created_by">
                            </div>

                            <div class="form-group col-6">
                                <label for="" class="my__label"> Reference <span class="text-danger"></span></label>
                                <input type="text" class="form-control rounded-0 w-100 shadow-none" name="reference"
                                    id="reference">
                            </div>


                        </div>

                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="" class="my__label">Remarque <span class="text-danger"></span></label>
                                <textarea name="note" id="" class="form-control rounded-0 w-100 shadow-none"></textarea>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary rounded-0 shadow-none">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\MYCLINIC-PEDIATRE\resources\views/depense/create.blade.php ENDPATH**/ ?>