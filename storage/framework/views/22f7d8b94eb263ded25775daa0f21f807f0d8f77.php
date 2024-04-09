<?php $__env->startSection('content'); ?>
    <form method="post" action="<?php echo e(route('prescription.store')); ?>">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-10">
                                <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('sentence.Patient informations')); ?>

                                </h6>
                            </div>
                            <div class="col-2">
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="PatientID"><?php echo e(__('sentence.Patient')); ?> :</label>
                            <select class="form-control  rounded-0" name="patient_id" id="PatientID" required>
                                <option><?php echo e(__('sentence.Select Patient')); ?></option>
                                <?php
                                    $lastPatientId = Session::get('lastpatient'); // Retrieve the value of 'lastpatient' from the session
                                ?>

                                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($patient->id); ?>"
                                        data-birthday="<?php echo e($patient->Patient->birthday ?? ''); ?>"
                                        data-gender="<?php echo e($patient->Patient->gender ?? ''); ?>"
                                        data-phone="<?php echo e($patient->Patient->phone ?? ''); ?>"
                                        data-address="<?php echo e($patient->Patient->address ?? ''); ?>"
                                        data-weight="<?php echo e($patient->Patient->weight ?? ''); ?>"
                                        data-height="<?php echo e($patient->Patient->height ?? ''); ?>"
                                        data-blood="<?php echo e($patient->Patient->blood ?? ''); ?>"
                                        data-cin="<?php echo e($patient->Patient->cin ?? ''); ?>"
                                        data-assurance="<?php echo e($patient->Patient->assurance ?? ''); ?>"
                                        <?php if($lastPatientId == $patient->id): ?> selected <?php endif; ?>>
                                        <!-- Check if current patient ID matches the lastpatient ID -->
                                        <?php echo e($patient->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php echo e(csrf_field()); ?>

                        </div>
                        <div id="selected-patient-info">

                        </div>

                        <div class="form-group">
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-10">
                                <h6 class="m-0 font-weight-bold text-primary">Motif de la consultation</h6>
                            </div>
                            <div class="col-2">
                                <button type="submit"
                                    class="btn btn-primary btn-sm float-right  rounded-0 shadow-none">Enregistrer tout
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="age">Age</label>
                                <input type="text" class="form-control rounded-0 shadow-none" id="age"
                                    name="age" placeholder="">
                            </div>
                            <div class="form-group col-md-9">
                                <label for="motife">Motif de la consultation</label>
                                <textarea class="form-control rounded-0 shadow-none" id="motife" name="motife" placeholder=""></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Examen clinique</h6>
                    </div>
                    <div class="card-body">
                        <fieldset class="certificate">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="inputPoid">Poids</label>
                                        <input type="text" class="form-control" id="inputPoid" name="poid"
                                               placeholder="" style="width: 11rem;">
                                        <small id="poidHelp" class="form-text text-muted">Poids en kilogrammes</small>

                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputTaille">Taille</label>
                                        <input type="text" class="form-control" id="inputTaille" name="taille"
                                               placeholder="" style="width: 11rem;">
                                        <small id="tailleHelp" class="form-text text-muted">Hauteur en
                                            centimètres</small>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputPC">Périmètre crânien</label>
                                        <input type="text" class="form-control" id="inputPC" name="pc" placeholder=""
                                               style="width: 11rem;">
                                        <small id="padHelp" class="form-text text-muted">Périmètre crânien en
                                            cm </small>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputsa">Saturation en oxygène</label>
                                        <input type="text" class="form-control" id="inputsa" name="sa" placeholder=""
                                               style="width: 11rem;">
                                        <small id="tempHelp" class="form-text text-muted">Saturation en oxygène</small>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="form-group col-md-3">
                                        <label for="inputPAD">TA</label>
                                        <input type="text" class="form-control" id="inputPAD" name="pad" placeholder=""
                                               style="width: 11rem;">
                                        <small id="padHelp" class="form-text text-muted">Pression artérielle diastolique
                                            en mmHg</small>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputPouls">Fréquence cardiaque</label>
                                        <input type="text" class="form-control" id="inputPouls" name="pouls"
                                               placeholder="" style="width: 11rem;">
                                        <small id="poulsHelp" class="form-text text-muted">Fréquence cardiaque en
                                            battements par minute</small>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputfr">Fréquence respiratoire</label>
                                        <input type="text" class="form-control" id="inputfr" name="fr" placeholder=""
                                               style="width: 11rem;">
                                        <small id="poulsHelp" class="form-text text-muted">Fréquence
                                            respiratoire</small>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputTemp">Température</label>
                                        <input type="text" class="form-control" id="inputTemp" name="temp"
                                               placeholder="" style="width: 11rem;">
                                        <small id="tempHelp" class="form-text text-muted">Température en °C</small>
                                    </div>

                                    <label for="rapport">Rapport d'examen</label>
                                    <textarea class="form-control" id="rapport" name="rapport" rows="15"
                                              placeholder=""></textarea>

                            </form>
                        </fieldset>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Ordonnance</h6>
                    </div>
                    <div class="card-body">
                        <fieldset class="drugs_labels">
                            <div class="repeatable"></div>
                            <div class="form-group">
                                <a type="button" class="btn rounded-0  btn-sm btn-primary add text-white"
                                   align="center"><i class='fa fa-plus'></i> <?php echo e(__('sentence.Add Drug')); ?></a>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Analyses médicals</h6>
                    </div>
                    <div class="card-body">
                        <fieldset class="test_labels">
                            <div class="repeatable"></div>
                            <div class="form-group">
                                <a type="button" class="btn rounded-0  btn-sm btn-primary add text-white"
                                   align="center"><i class='fa fa-plus'></i> <?php echo e(__('sentence.Add Test')); ?></a>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Radios</h6>
                    </div>
                    <div class="card-body">
                        <fieldset class="fai_labels">
                            <div class="repeatable"></div>
                            <div class="form-group">
                                <a type="button" class="btn rounded-0  btn-sm btn-primary add text-white"
                                   align="center"><i class='fa fa-plus'></i>Ajouter un radio </a>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Remarque générale</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="bilan">Remarque</label>
                            <textarea class="form-control  rounded-0 shadow-none" id="bilan" name="bilan" placeholder=""></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm  rounded-0 shadow-none float-right">Enregistrer
                    tout</button>


            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('#PatientID').select2({
                selectionCssClass: 'my__input__class'

            });
        });
        $(".test_labels .repeatable").repeatable({
            addTrigger: ".test_labels .add",
            deleteTrigger: ".test_labels .delete",
            template: "#test_labels",
            startWith: 1,
            max: 5,
            afterAdd: function() {
                $('.analyse').select2({
                    selectionCssClass: 'my__input__class'
                });
            }
        });
    </script>


    <script type="text/template" id="drugs_labels">
        <section class="field-group">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-12">
                    <select class="form-control multiselect-drug" name="trade_name[]" id="drug_1" tabindex="-1"
                            aria-hidden="true" required>
                        <option value=""><?php echo e(__('sentence.Select Drug')); ?>...</option>
                        <?php $__currentLoopData = $drugs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($drug->id); ?>"><?php echo e($drug->trade_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group-custom">
                        <input type="text" id="drug_advice" name="drug_advice[]" class="form-control"
                               placeholder="Remarque">
                    </div>
                </div>
                <div class="col-md-3">
                    <a type="button" class="btn btn-danger  rounded-0 shadow-none btn-sm text-white span-2 delete"><i
                            class="fa fa-times-circle"></i> <?php echo e(__('sentence.Remove')); ?></a>
                </div>
                <div class="col-12">
                    <hr color="#a1f1d4">
                </div>
            </div>
        </section>

    </script>
    <script>
        $(".fai_labels .repeatable").repeatable({
            addTrigger: ".fai_labels .add",
            deleteTrigger: ".fai_labels .delete",
            template: "#fai_labels",
            startWith: 1,
            max: 5,
            afterAdd: function() {
                $('.fai').select2({
                    selectionCssClass: 'my__input__class'
                });}
        });
    </script>
    <script type="text/template" id="test_labels">
        <div class="field-group row">

            <div class="form-group col-md-12">
                <label for="analyse_id">Analyse:</label>
                <select name="analyse_id[]" id="analyse" class="form-control analyse">
                    <option value="">Sélectionner une analyse</option>
                    <?php $__currentLoopData = $analyses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $analyse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($analyse->id); ?>"><?php echo e($analyse->analyse_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-9">
                <div class="form-group-custom">
                    <input type="text" name="description[]" class="form-control  rounded-0 shadow-none"
                           placeholder="<?php echo e(__('sentence.Description')); ?>">
                </div>
            </div>
            <br>
            <div class="col-md-3">
                <a type="button" class="btn btn-danger rounded-0 shadow-none delete text-white btn-sm" align="center">
                    <i class="fa fa-plus"></i> <?php echo e(__('sentence.Remove')); ?>

                </a>
            </div>
            <div class="col-12">
                <hr color="#a1f1d4">
            </div>
        </div>
    </script>

    <script type="text/template" id="fai_labels">
        <div class="field-group row">
            <div class="form-group col-md-12">
                <label>Radios </label>

                <select type="text" name="radio_id[]" id="fai"
                        class="form-control rounded-0 shoadow-none shadow-none rounded-0 fai">
                    <option value="">Sélectionner un Radio</option>
                    <?php $__currentLoopData = $radios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $radio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($radio->id); ?>"><?php echo e($radio->radio_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-9">
                <div class="form-group-custom">
                    <textarea type="text" name="justif[]" class="form-control rounded-0 shadow-none " rows="3"
                              placeholder="Justificatif"></textarea>
                </div>
            </div>
            <br>
            <br>
            <div class="col-md-3">
                <a type="button" class="btn rounded-0  btn-danger delete text-white btn-sm" align="center">
                    <i class="fa fa-plus"></i> <?php echo e(__('sentence.Remove')); ?>

                </a>
            </div>
            <div class="col-12">
                <hr color="#a1f1d4">
            </div>
        </div>
    </script>
    <script>
        $(document).ready(function () {
            // Define the event handler
            $('#PatientID').on('change', function () {
                var selectedOption = $(this).find(':selected');
                var birthday = selectedOption.data('birthday');
                var phone = selectedOption.data('phone');
                var address = selectedOption.data('address');
                var assurance = selectedOption.data('assurance');
                var height = selectedOption.data('height');
                var blood = selectedOption.data('blood');
                var cin = selectedOption.data('cin');

                var patientInfo = '';
                if (birthday) {
                    var age = calculateAgeWithMonths(birthday);
                    patientInfo += '<p><b><?php echo e(__('sentence.Birthday')); ?> :</b> ' + birthday + ' (' + age.years + ' A, ' + age.months + ' M, ' + age.days + ' J)</p>';

                    // Update the age input field with the calculated age
                    $('#age').val(age.years + ' A, ' + age.months + ' M, ' + age.days + ' J');
                }
                if (phone) {
                    patientInfo += '<p><b><?php echo e(__('sentence.Phone')); ?> :</b> ' + phone + '</p>';
                }
                if (address) {
                    patientInfo += '<p><b><?php echo e(__('sentence.Address')); ?> :</b> ' + address + '</p>';
                }
                if (assurance) {
                    patientInfo += '<p><b><?php echo e(__('sentence.assurance')); ?> :</b> ' + assurance + ' </p>';
                }
                if (height) {
                    patientInfo += '<p><b><?php echo e(__('sentence.Height')); ?> :</b> ' + height + ' cm</p>';
                }
                if (blood) {
                    patientInfo += '<p><b><?php echo e(__('sentence.Blood Group')); ?> :</b> ' + blood + '</p>';
                }
                if (cin) {
                    patientInfo += '<p><b>CIN : </b> ' + cin + '</p>';
                }
                $('#selected-patient-info').html(patientInfo);
            });

            // Trigger the change event when the page loads
            $('#PatientID').trigger('change');

            function calculateAgeWithMonths(birthday) {
                var today = new Date();
                var birthDate = new Date(birthday);

                var ageYears = today.getFullYear() - birthDate.getFullYear();
                var monthDifference = today.getMonth() - birthDate.getMonth();
                var dayDifference = today.getDate() - birthDate.getDate();

                if (dayDifference < 0) {
                    monthDifference--;
                    // Calculate the number of days in the previous month
                    var lastMonth = new Date(today.getFullYear(), today.getMonth() - 1, 0);
                    dayDifference += lastMonth.getDate();
                }

                if (monthDifference < 0) {
                    ageYears--;
                    monthDifference = 12 + monthDifference;
                }

                return {
                    years: ageYears,
                    months: monthDifference,
                    days: dayDifference
                };
            }
        });
    </script>
    <script>
        // Function to refresh the input value
        function refreshInputValue(namePatient) {
            document.getElementById("patientNameInput").value = namePatient;
        }

        $(document).ready(function() {
            $('#PatientID').change(function() {
                var selectedPatientId = $(this).val();

                // Make an AJAX request to update the session variables
                $.ajax({
                    url: '/get-patient-data/' + selectedPatientId,
                    method: 'GET',
                    success: function(data) {
                        // Update the variables and page content
                        var namePatient = data.namePatient;
                        var lastPatientId = data.lastPatientId;
                        var imagePatient = data.imagePatient;
                        location.reload();

                        // Update your page elements with the new data
                        $('#namePatientElement').text(namePatient);
                        // Update other elements as needed

                        // Call the refreshInputValue function to update the input
                        refreshInputValue(namePatient);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                }) // Refresh the page
            });
        });
    </script>


    <script>
        function calculateDates() {
            const daysInput = document.getElementById('inputCertificat');
            const startDateInput = document.getElementById('dated');
            const endDateInput = document.getElementById('datef');

            const days = parseInt(daysInput.value, 10);
            const startDate = new Date(startDateInput.value);

            if (!isNaN(days) && startDate instanceof Date && !isNaN(startDate)) {
                const endDate = new Date(startDate);
                endDate.setDate(startDate.getDate() + days - 1); // Subtract 1 day
                endDateInput.value = endDate.toISOString().split('T')[0];
            } else {
                endDateInput.value = '';
            }
        }
    </script>

    <script>
        < script src = "https://code.jquery.com/jquery-3.6.0.min.js" >
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php /**PATH C:\MAMP\htdocs\MYCLINIC-PEDIATRE\resources\views/prescription/specialty/pediatre/create.blade.php ENDPATH**/ ?>