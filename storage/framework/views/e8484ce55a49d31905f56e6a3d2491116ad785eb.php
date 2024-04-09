<?php $__env->startSection('title'); ?>
<?php echo e(__('sentence.New Prescription')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapport</title>
</head>

<body>
    <form method="post" action="<?php echo e(route('rapport.update')); ?>">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('sentence.Patient informations')); ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="PatientID"><?php echo e(__('sentence.Patient')); ?> :</label>
                            <select class="form-control rounded-0 shoadow-none multiselect-doctorino" name="user_id" id="PatientID">
                                <option value="<?php echo e($patient->id); ?>"><?php echo e($patient->name); ?>

                                </option>
                            </select>
                            <?php echo e(csrf_field()); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <input type="submit" value="Enregistrer" class="btn rounded-0  btn-primary" style="position: relative; left: 900px; margin-bottom: 20px;" align="center">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Rapport</h6>
                    </div>
                    <br>
                    <div id="print_ropos">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h3 style="text-align: center; position: absolute; top: 35%; left: 50%; transform: translate(-50%, -50%);">Rapport (Ropos)</h3>
                                                <br>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center" style="margin-top: 100px;">
                                            <div class="col">
                                                <?php $__currentLoopData = $settings;
                                                $__env->addLoop($__currentLoopData);
                                                foreach ($__currentLoopData as $setting) : $__env->incrementLoopIndices();
                                                    $loop = $__env->getLastLoop(); ?>
                                                    Je soussigne <strong><?php echo e($setting->option_value); ?></strong> <br><br>
                                                <?php endforeach;
                                                $__env->popLoop();
                                                $loop = $__env->getLastLoop(); ?>
                                                <?php $__currentLoopData = $rapports;
                                                $__env->addLoop($__currentLoopData);
                                                foreach ($__currentLoopData as $rapport) : $__env->incrementLoopIndices();
                                                    $loop = $__env->getLastLoop(); ?>
                                                    <input type="hidden" name="id" value="<?php echo e($rapport->id); ?>">
                                                    Que l'état de santé de l'enfant <strong><input type="text" class="form-line" id="child_health2" name="child" value="<?php echo e($rapport->child); ?>"></strong> <br> <br>
                                                    Nécessite un repos de <b><input type="number" class="form-line" id="rest_days" name="nb_jour" value="<?php echo e($rapport->nb_jour); ?>"></b> jours
                                                    à partir du <b><input type="date" class="form-line" id="start_date" name="date_debut" value="<?php echo e($rapport->date_debut); ?>"></b>
                                                <?php endforeach;
                                                $__env->popLoop();
                                                $loop = $__env->getLastLoop(); ?>
                                                <strong><u> </u></strong><br><br>
                                                <br>
                                                <br>
                                                <br>
                                                <div style="margin-bottom: 40px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="print_presence_tutours">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h3 style="text-align: center; position: absolute; top: 35%; left: 50%; transform: translate(-50%, -50%);">Rapport (tuteur)</h3>
                                                <br>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center" style="margin-top: 100px;">
                                            <div class="col">
                                                <?php $__currentLoopData = $settings;
                                                $__env->addLoop($__currentLoopData);
                                                foreach ($__currentLoopData as $setting) : $__env->incrementLoopIndices();
                                                    $loop = $__env->getLastLoop(); ?>
                                                    Je soussigne <strong><?php echo e($setting->option_value); ?></strong> <br><br>
                                                <?php endforeach;
                                                $__env->popLoop();
                                                $loop = $__env->getLastLoop(); ?>
                                                <?php $__currentLoopData = $rapports;
                                                $__env->addLoop($__currentLoopData);
                                                foreach ($__currentLoopData as $rapport) : $__env->incrementLoopIndices();
                                                    $loop = $__env->getLastLoop(); ?>
                                                    Que l'état de santé de l'enfant <strong><input type="text" class="form-line" id="child_health2" name="child" value="<?php echo e($rapport->child); ?>"></strong><br> <br>
                                                    Nécessite la presance de <b><input type="text" class="form-line" id="parent" name="tuteur" style="width: 400px;" value="<?php echo e($rapport->tuteur); ?>"></b> <br> <br> Aupres de lui pendant <b><input type="number" class="form-line" name="nb_jour1" id="nb_jour1" style="width: 80px;" value="<?php echo e($rapport->nb_jour1); ?>"> </b> jours
                                                    à partir du <b><input type="date" class="form-line" id="start_date" name="date_debut" value="<?php echo e($rapport->date_debut); ?>"></b>
                                                <?php endforeach;
                                                $__env->popLoop();
                                                $loop = $__env->getLastLoop(); ?>
                                                <div style="margin-bottom: 40px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="print_ecole">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h3 style="text-align: center; position: absolute; top: 35%; left: 50%; transform: translate(-50%, -50%);">Rapport (ecole)</h3>
                                                <br>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center" style="margin-top: 100px;">
                                            <div class="col">
                                                <?php $__currentLoopData = $settings;
                                                $__env->addLoop($__currentLoopData);
                                                foreach ($__currentLoopData as $setting) : $__env->incrementLoopIndices();
                                                    $loop = $__env->getLastLoop(); ?>
                                                    Je soussigne <strong><?php echo e($setting->option_value); ?></strong> <br><br>
                                                <?php endforeach;
                                                $__env->popLoop();
                                                $loop = $__env->getLastLoop(); ?>
                                                <?php $__currentLoopData = $rapports;
                                                $__env->addLoop($__currentLoopData);
                                                foreach ($__currentLoopData as $rapport) : $__env->incrementLoopIndices();
                                                    $loop = $__env->getLastLoop(); ?>
                                                    Que <strong><input type="text" class="form-line" id="child_health2" name="child" value="<?php echo e($rapport->child); ?>"></strong> est en bonne santé
                                                    et peut intègrer la crèche sans aucun soucis
                                                <?php endforeach;
                                                $__env->popLoop();
                                                $loop = $__env->getLastLoop(); ?>
                                                <br><br>
                                                <br>
                                                <br>
                                                <br>
                                                <div style="margin-bottom: 40px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="print_libre">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h3 style="text-align: center; position: absolute; top: 35%; left: 50%; transform: translate(-50%, -50%);">Rapport (libre)</h3>
                                                <br>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center" style="margin-top: 20px;">
                                            <div class="col">
                                                <?php $__currentLoopData = $rapports;
                                                $__env->addLoop($__currentLoopData);
                                                foreach ($__currentLoopData as $rapport) : $__env->incrementLoopIndices();
                                                    $loop = $__env->getLastLoop(); ?>
                                                    <textarea class="form-control" name="libre" id="area" rows="20"><?php echo nl2br(e($rapport->libre)); ?></textarea>
                                                <?php endforeach;
                                                $__env->popLoop();
                                                $loop = $__env->getLastLoop(); ?>

                                                <div style="margin-bottom: 10px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="print_ordanance_libre" style="display: none;">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <div class="card-body">
                                    <!-- ROW: Doctor informations -->
                                    <div class="row">
                                        <div class="col text-center"><br><br><br><br><br><br>
                                            <br><br><br><br><br><br>
                                        </div>
                                    </div><br><br><br><br>
                                    <div class="row mt-100" style="font-size: x-large">
                                        <div class="col">
                                            <?php $__currentLoopData = $rapports;
                                            $__env->addLoop($__currentLoopData);
                                            foreach ($__currentLoopData as $rapport) : $__env->incrementLoopIndices();
                                                $loop = $__env->getLastLoop(); ?>
                                                <b style="font-size: xx-large"> <?php echo nl2br(e($rapport->libre)); ?></b>
                                            <?php endforeach;
                                            $__env->popLoop();
                                            $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="print_ordanance_ecole" style="display: none;">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <div class="card-body">
                                    <!-- ROW: Doctor informations -->
                                    <div class="row">
                                        <div class="col text-center"><br><br><br><br><br><br>
                                            <br><br><br><br><br><br>
                                        </div>
                                    </div><br><br><br><br><br><br><br><br>
                                    <div class="row mt-100" style="font-size: x-large">
                                        <div class="col" style="font-size: xx-large">
                                            <?php $__currentLoopData = $settings;
                                            $__env->addLoop($__currentLoopData);
                                            foreach ($__currentLoopData as $setting) : $__env->incrementLoopIndices();
                                                $loop = $__env->getLastLoop(); ?>
                                                <p> Je soussigne <strong><?php echo e($setting->option_value); ?></strong> </p>
                                            <?php endforeach;
                                            $__env->popLoop();
                                            $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $rapports;
                                            $__env->addLoop($__currentLoopData);
                                            foreach ($__currentLoopData as $rapport) : $__env->incrementLoopIndices();
                                                $loop = $__env->getLastLoop(); ?>
                                                <p> Que <strong><?php echo e($rapport->child); ?></strong> est en bonne santé
                                                    et peut intègrer la crèche sans aucun soucis </p>
                                            <?php endforeach;
                                            $__env->popLoop();
                                            $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="print_ordanance_tuteur" style="display: none;">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <div class="card-body">
                                    <!-- ROW: Doctor informations -->
                                    <div class="row">
                                        <div class="col text-center"><br><br><br><br><br><br>
                                            <br><br><br><br><br><br>
                                        </div>
                                    </div><br><br><br><br>
                                    <div class="row mt-100" style="font-size: x-large">
                                        <div class="col" style="font-size: xx-large">
                                            <?php $__currentLoopData = $settings;
                                            $__env->addLoop($__currentLoopData);
                                            foreach ($__currentLoopData as $setting) : $__env->incrementLoopIndices();
                                                $loop = $__env->getLastLoop(); ?>
                                                Je soussigne <strong><?php echo e($setting->option_value); ?></strong> <br><br>
                                            <?php endforeach;
                                            $__env->popLoop();
                                            $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $rapports;
                                            $__env->addLoop($__currentLoopData);
                                            foreach ($__currentLoopData as $rapport) : $__env->incrementLoopIndices();
                                                $loop = $__env->getLastLoop(); ?>
                                                <p>Que l'état de santé de l'enfant <strong><?php echo e($rapport->child); ?></strong> </p>
                                                <p> Nécessite la presance de sa <b><?php echo e($rapport->tuteur); ?></b> </p> Aupres de lui pendant <b> <?php echo e($rapport->nb_jour); ?></b> jours
                                                à partir du <b><?php echo e($rapport->date_debut); ?></b>
                                            <?php endforeach;
                                            $__env->popLoop();
                                            $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="print_ordanance_ropos" style="display: none;">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <div class="card-body">
                                    <!-- ROW: Doctor informations -->
                                    <div class="row">
                                        <div class="col text-center"><br><br><br><br><br><br>
                                            <br><br><br><br><br><br>
                                        </div>
                                    </div><br><br><br><br><br><br><br><br>
                                    <div class="row mt-100" style="font-size: x-large">
                                        <div class="col" style="font-size: xx-large">
                                            <?php $__currentLoopData = $settings;
                                            $__env->addLoop($__currentLoopData);
                                            foreach ($__currentLoopData as $setting) : $__env->incrementLoopIndices();
                                                $loop = $__env->getLastLoop(); ?>
                                                Je soussigne <strong><?php echo e($setting->option_value); ?></strong> <br><br>
                                            <?php endforeach;
                                            $__env->popLoop();
                                            $loop = $__env->getLastLoop(); ?>
                                            Que l'état de santé de l'enfant <strong><?php echo e($rapport->child); ?></strong> <br> <br>
                                            Nécessite un repos de <b><?php echo e($rapport->nb_jour); ?></b> jours
                                            à partir du <b><?php echo e($rapport->date_debut); ?></b>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var labelValue = "<?php echo e($label); ?>";

    function showDivForLabel() {
        var divRopos = document.getElementById('print_ropos');
        var divPresenceTutours = document.getElementById('print_presence_tutours');
        var divEcole = document.getElementById('print_ecole');
        var divLibre = document.getElementById('print_libre');

        divRopos.style.display = 'none';
        divPresenceTutours.style.display = 'none';
        divEcole.style.display = 'none';
        divLibre.style.display = 'none';

        if (labelValue === 'Repos') {
            divRopos.style.display = 'block';
        } else if (labelValue === 'Présence tuteur') {
            divPresenceTutours.style.display = 'block';
        } else if (labelValue === 'Ecole') {
            divEcole.style.display = 'block';
        } else if (labelValue === 'Libre') {
            divLibre.style.display = 'block';
        }
    }
    window.onload = showDivForLabel;
</script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Documents\medecin.tayssir.cloud\resources\views/rapport/edit.blade.php ENDPATH**/ ?>