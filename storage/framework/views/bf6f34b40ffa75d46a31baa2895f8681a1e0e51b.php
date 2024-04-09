<?php $__env->startSection('content'); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rapport</title>
    </head>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function initialize() {
            console.log('test');
            var selectElement = document.getElementById("PatientID");
            var inputElement = document.getElementById("child_health");
            var inputElement1 = document.getElementById("child_health1");
            var inputElement2 = document.getElementById("child_health2");

            // Get the selected option when the page loads
            var selectedOption = selectElement.options[selectElement.selectedIndex];

            // Check if the session variable 'lastpatient' is set
            var lastPatientId = "<?php echo e(Session::get('namePatient')); ?>";

            // Get the trimmed textContent from the selected option
            var selectedText = selectedOption.textContent.trim();

            // Check if 'lastPatientId' is not empty and is equal to the currently selected patient
            if (lastPatientId !== "" && lastPatientId === selectedOption.value) {
                // Do nothing because 'lastpatient' is set, and we don't want to override the input
            } else {
                // Update the input fields with the trimmed selected patient's name
                inputElement.value = selectedText;
                inputElement1.value = selectedText;
                inputElement2.value = selectedText;
            }

            // Add an event listener to the select element to update the input
            selectElement.addEventListener("change", function() {
                var selectedOption = selectElement.options[selectElement.selectedIndex];
                // Get the trimmed textContent from the selected option
                var selectedText = selectedOption.textContent.trim();
                inputElement.value = selectedText;
                inputElement1.value = selectedText;
                inputElement2.value = selectedText;
            });
        }

        window.onload = initialize;
    </script>


    <script>
        $(document).ready(function() {
            $("fieldset").hide();

            $("#type").change(function() {
                var selectedValue = $(this).val();

                $("fieldset").hide();

                if (selectedValue === "1") {
                    $("#fieldset1").show();
                } else if (selectedValue === "2") {
                    $("#fieldset2").show();
                } else if (selectedValue === "3") {
                    $("#fieldset3").show();
                } else if (selectedValue === "4") {
                    $("#fieldset4").show();
                } else if (selectedValue === "5") {
                    $("#fieldset5").show();
                }
            });
        });
    </script>


    <body>
        <form method="post" action="<?php echo e(route('rapport.store')); ?>">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('sentence.Patient informations')); ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="PatientID"><?php echo e(__('sentence.Patient')); ?> :</label>
                                <select class="form-control multiselect-doctorino" name="user_id" id="PatientID" required
                                    oninvalid="this.setCustomValidity('Selectionner le patient SVP!')">
                                    <option value=""><?php echo e(__('sentence.Select Patient')); ?></option>
                                    <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $lastPatientId = Session::get('lastpatient'); // Retrieve the value of 'lastpatient' from the session
                                            $croissance = $patient->croissance; // Assuming there is a one-to-one relationship between Patient and Croissance models
                                        ?>
                                        <option value="<?php echo e($patient->id); ?>"
                                            data-birthday="<?php echo e($patient->Patient->birthday ?? ''); ?>"
                                            data-gender="<?php echo e($patient->Patient->gender ?? ''); ?>"
                                            data-phone="<?php echo e($patient->Patient->phone ?? ''); ?>"
                                            data-address="<?php echo e($patient->Patient->adress ?? ''); ?>"
                                            data-cin="<?php echo e($patient->Patient->cin ?? ''); ?>"
                                            data-x="<?php echo e($croissance ? $croissance->x : ''); ?>"
                                            data-y="<?php echo e($croissance ? $croissance->y : ''); ?>"
                                            <?php if($lastPatientId == $patient->id): ?> selected <?php endif; ?>>
                                            <?php echo e($patient->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php echo e(csrf_field()); ?>

                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="patient_title"> </label>
                                    <select class="form-control" id="patient_title" name="patient_title">
                                        <option value="Mr">Mr</option>
                                        <option value="Mlle">Mlle</option>
                                        <option value="Mme">Mme</option>
                                        <option value="L'enfant">L'enfant</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <label for="type">Select a Type:</label>
                            <select class="form-control" id="type" name="rapport_type_id">
                                <option value="">Select a type</option>
                                    <option value="1">Biométrie</option>
                                    <option value="2">A fair svp</option>
                                    <option value="4">Libre</option>
                            </select>



                            <div id="selected-patient-info">
                                <!-- Placeholder for displaying the selected patient's information -->
                            </div>
                            <div class="form-group">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Rapports</h6>
                            <input type="submit" value="Sauvegarde" class="btn btn-success" align="right"
                                style=";position: absolute; right: 30px; top: 8px;">
                        </div>
                        <div class="card-body">
                            <fieldset class="drugs_labels" style="border: 1px solid #333; padding: 10px;" id="fieldset1">
                                <div class="chart-container">
                                    <div class="form-group" id="print_area">
                                        <div class="form-group">
                                            <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="text-center">
                                                    <input type="text" class="form-line text-center" id="child_health"
                                                        name="child"
                                                        style="width: 300px; border: none; font-weight: bold;">
                                                </div>
                                                <br><br>
                                                <div class="text-center">
                                                    <input type="text" name="ophtalinput1" value="Echo"> +
                                                    <input type="text" name="ophtalinput2" value="Biometrie">
                                                </div>
                                                <br>
                                                <div style=" position: relative; left: 60%;">
                                                    <input type="number" class="form-line" name="nb_jour" id="nb_jour"
                                                        style="width: 120px;" value="300">DH
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            <fieldset style="border: 1px solid #333; padding: 10px; border-radius: 10px; margin: 10px 0;"
                                id="fieldset2">
                                <div style="text-align: center; padding: 10px;">
                                    <input type="text" class="form-line text-center" id="child_health1" name="child"
                                        style="width: 300px; border: none; font-weight: bold;"><br><br>
                                    <strong>Faire SVP :</strong>
                                    <ul style="list-style-type: none; padding: 0;">
                                        <li>
                                            <input type="checkbox" name="ophtalinput3" value="Bilan orthoptique"
                                                id="ophtalinput3">
                                            <label for="ophtalinput3">Bilan orthoptique</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="ophtalinput4" value="OCT maculaire papillaire"
                                                id="ophtalinput4">
                                            <label for="ophtalinput4">OCT maculaire papillaire</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="ophtalinput5"
                                                value="Angiographie à la fluorescéine" id="ophtalinput5">
                                            <label for="ophtalinput5">Angiographie à la fluorescéine</label>
                                        </li>
                                    </ul>
                                </div>
                            </fieldset>

                            <br>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <fieldset id="fieldset4">
                                <textarea id="editor" name="libre"></textarea>
                                <script src="<?php echo e(asset('dashboard/js/http_cdn.tiny.cloud_1_no-api-key_tinymce_6_tinymce.js')); ?>" type="text/javascript">
                                </script>
                                <script>
                                    tinymce.init({
                                        selector: "#editor"
                                    });
                                </script>
                            </fieldset>

                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </form>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#PatientID').on('change', function() {
                    var selectedOption = $(this).find(':selected');
                    var birthday = selectedOption.data('birthday');
                    var phone = selectedOption.data('phone');
                    var address = selectedOption.data('address');
                    var weight = selectedOption.data('weight');
                    var height = selectedOption.data('height');
                    var blood = selectedOption.data('blood');
                    var gender = selectedOption.data('gender');
                    var cin = selectedOption.data('cin');
                    var patientInfo = '';
                    if (birthday) {
                        var age = calculateAgeWithMonths(birthday);
                        patientInfo += '<p><b><?php echo e(__('sentence.Birthday')); ?> :</b> ' + birthday + ' (' + age
                            .years + ' ans et ' + age.months + ' mois)</p>';
                    }
                    if (phone) {
                        patientInfo += '<p><b><?php echo e(__('sentence.Phone')); ?> :</b> ' + phone + '</p>';
                    }
                    if (address) {
                        patientInfo += '<p><b><?php echo e(__('sentence.Address')); ?> :</b> ' + address + '</p>';
                    }
                    if (blood) {
                        patientInfo += '<p><b><?php echo e(__('sentence.Blood Group')); ?> :</b> ' + blood + '</p>';
                    }
                    if (gender) {
                        patientInfo += '<p><b><?php echo e(__('sentence.gender')); ?> :</b> ' + gender + '</p>';
                    }
                    if (cin) {
                        patientInfo += '<p><b>CIN : </b> ' + cin + '</p>';
                    }
                    $('#selected-patient-info').html(patientInfo);
                    $('#child_health').val(selectedOption.text().trim());
                    $('#child_health1').val(selectedOption.text().trim());
                    $('#child_health2').val(selectedOption.text().trim());
                    $('input[name="patient_cin"]').val(cin);

                });

                function calculateAgeWithMonths(birthday) {
                    var today = new Date();
                    var birthDate = new Date(birthday);
                    var ageYears = today.getFullYear() - birthDate.getFullYear();
                    var monthDifference = today.getMonth() - birthDate.getMonth();
                    var dayDifference = today.getDate() - birthDate.getDate();

                    if (dayDifference < 0) {
                        monthDifference--;
                    }

                    if (monthDifference < 0) {
                        ageYears--;
                        monthDifference = 12 + monthDifference;
                    }

                    return {
                        years: ageYears,
                        months: monthDifference
                    };
                }

            });
        </script>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        


    </body>

    </html>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.multiselect-doctorino').select2();
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php /**PATH C:\MAMP\htdocs\MYCLINIC-PEDIATRE\resources\views/rapport/specialty/ophtamologie/create.blade.php ENDPATH**/ ?>