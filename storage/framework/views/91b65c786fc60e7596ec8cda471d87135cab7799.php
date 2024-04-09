<?php $__env->startSection('title'); ?>
<?php echo e(__('sentence.New Prescription')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphe</title>
</head>
<body>
<form method="post" action="<?php echo e(route('graph.store')); ?>">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('sentence.Patient informations')); ?></h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="PatientID" class="my__label"><?php echo e(__('sentence.Patient')); ?> :</label>
                        <select class="form-control rounded-0 shadow-none" name="user_id" id="PatientID" required
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
                    <div class="form-group">
                        <label for="type" class="my__label">Select a Type:</label>
                        <select class="form-control rounded-0 shadow-none" id="type" name="type">
                            <option value="">Type de graphe</option>
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type); ?>"><?php echo e($type); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="label" class="my__label">Tranche d'âge</label>
                        <select class="form-control rounded-0 shadow-none" id="label" name="graph_id">
                            <option>Select a label</option>
                        </select>
                    </div>


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
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('sentence.graph')); ?></h6>
                    <input type="submit" value="Créer le Graph" class="btn btn-primary" align="right"
                           style=";position: absolute; right: 30px; top: 8px;">
                </div>
                <div class="card-body">
                    <fieldset class="drugs_labels">
                        <div class="chart-container">
                            <img src="" id="chart-image"
                                 style="max-width: 100%; border: 1px solid #ddd; padding: 10px; border-radius: 5px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);"/>
                        </div>
                        <?php $__currentLoopData = $croissances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $croissance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </fieldset>
                </div>
                <input type="hidden" name="x" id="x">
                <input type="hidden" name="y" id="y">
            </div>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    $(document).ready(function () {
        $('#type').change(function () {
            var selectedType = $(this).val();
            if (selectedType) {
                $.get('<?php echo e(route('get-labels')); ?>', {type: selectedType}, function (data) {
                    $('#label').empty();
                    $('#label').append($('<option>', {
                        value: '',
                        text: 'Select a label'
                    }));
                    $.each(data, function (index, item) {
                        console.log(item.id, item.label);
                        $('#label').append($('<option>', {
                                value: item.id,
                                text: item.label,
                            }
                        ));
                    });
                });
            } else {
                $('#label').empty();
            }
            $('#chart-image').attr('src', '');
        });

        $('#label').change(function () {
            var selectedLabelId = $(this).val();
            var selectedLabel = $(this).find('option:selected').text(); // Get the selected label text
            if (selectedLabelId) {
                var imageURL = '<?php echo e(asset('img/graph')); ?>' + '/' + selectedLabel + '.png'; // Use selectedLabel for the image URL
                $('#chart-image').attr('src', imageURL);
            } else {
                $('#chart-image').attr('src', '');
            }
        });
    });
</script>

</body>
</html>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initialize Select2
            $('#PatientID').select2({
                // Add any additional options or configurations here
            });
            $('#type').select2({
                // Add any additional options or configurations here
            });
            $('#label').select2({
                // Add any additional options or configurations here
            });
        });
    </script>

    
    <style>
        .point-marker {
            width: 5px;
            height: 5px;
            background-color: red;
            border-radius: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
        }

        .chart-container {
            position: relative;
            max-width: 1000px;
            max-height: 1000px;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('#chart-image').click(function (event) {
                var x = event.pageX - $(this).offset().left;
                var y = event.pageY - $(this).offset().top;


                var pointElement = $('<div class="point-marker"></div>');

                pointElement.css({
                    left: x + 'px',
                    top: y + 'px',
                })
                $('.chart-container').append(pointElement);

                $('#x').val(x);
                $('#y').val(y);
            });

        });
        $(document).on('click', '.point-marker', function () {
            $(this).remove();
            $('#x').val('');
            $('#y').val('');
        });
    </script>
    <script>
        // Function to refresh the input value
        function refreshInputValue(namePatient) {
            document.getElementById("patientNameInput").value = namePatient;
        }

        $(document).ready(function () {
            $('#PatientID').change(function () {
                var selectedPatientId = $(this).val();

                // Make an AJAX request to update the session variables
                $.ajax({
                    url: '/get-patient-data/' + selectedPatientId,
                    method: 'GET',
                    success: function (data) {
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
                    error: function (error) {
                        console.log(error);
                    }
                })// Refresh the page
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp641\www\MYCLINIC-PEDIATRE\MYCLINIC-PEDIATRE\resources\views/graph/create.blade.php ENDPATH**/ ?>