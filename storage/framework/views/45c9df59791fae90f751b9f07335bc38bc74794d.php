<?php $__env->startSection('title'); ?>
    Rapport paiement
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row mb-3">
                <div class="col-6">
                    <h6 class="m-0 font-weight-bold text-primary w-75 p-2">Rapport paiement</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12 w-100">
                    <form class="form-inline navbar-search" action="<?php echo e(route('record.paiement')); ?>" method="post">
                        <div class="input-group w-100 ">
                            <!-- Start Date Input -->
                            <label><b>Date début : </b></label>
                            <input type="date" name="start_date" class="form-control rounded-0 bg-light border-2 small"
                                   placeholder="Date début"  aria-label="Date début" aria-describedby="basic-addon2"  required>

                            <!-- End Date Input -->
                            <label style="margin-left: 40px;"><b>Date fin :</b></label>
                            <input type="date" name="end_date" class="form-control rounded-0 bg-light border-2 small"
                                   placeholder="Date fin" value="<?php echo e(date('Y-m-d')); ?>" aria-label="Date fin" aria-describedby="basic-addon2" style="margin-left: 10px;" required>

                            <?php echo csrf_field(); ?>
                            <div class="input-group-append" style="margin-left: 10px;">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="text-center">Nome et prénom</th>
                        <th class="text-center sm__screen">Mode de paiement</th>
                        <th class="text-center xxs__screen">Statut de paiement</th>
                        <th class="text-center sm__screen">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <tr>
                        <td colspan="9" align="center"> <br><br> <b
                                class="text-muted">Aucun paiement trouvé !</b>
                        </td>
                    </tr>
                    

                    </tbody>
                </table>

                <div id="container"></div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\doctor-myclinc.tayssir.cloud\resources\views/record/allP.blade.php ENDPATH**/ ?>