<?php $__env->startSection('content'); ?>

    <style>
        .point {
            width: 10px;
            height: 10px;
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

        #myTextarea {
            pointer-events: none;
            /* Disable user interaction */
            background-color: #f5f5f5;
            /* Set a custom background color */
            opacity: 0.7;
            /* Optionally reduce opacity to visually indicate disabled state */
            /* Add any other styling you want for the disabled state */
        }

        /* To style the enabled state differently */
        #myTextarea:not([disabled]) {
            background-color: white;
            /* Set a different background color for enabled state */
            opacity: 1;
            /* Reset opacity */
            /* Add any other styling you want for the enabled state */
        }
    </style>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card shadow mb-4">
                <?php
                use Carbon\Carbon;

                function calculateAgeWithMonths($birthday)
                {
                    $today = Carbon::now();
                    $birthDate = Carbon::parse($birthday);

                    $age = $today->diff($birthDate);
                    $ageYears = $age->y;
                    $ageMonths = $age->m;

                    return "$ageYears ans et $ageMonths mois";
                }
                ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <?php if(empty(!$patient->image)): ?>
                                <center><img src="<?php echo e(asset('uploads/'.$patient->image)); ?>" class="img-profile rounded-circle img-fluid" width="256" height="256"></center>
                            <?php else: ?>
                                <?php if($patient->Patient->gender == 'Homme' || $patient->Patient->gender == ''): ?>
                                    <center><img src="<?php echo e(asset('img/homme.png')); ?>" class="img-profile rounded-circle img-fluid" width="256" height="256"></center>
                                <?php endif; ?>
                                <?php if($patient->Patient->gender == 'Femme'): ?>
                                    <center><img src="<?php echo e(asset('img/femme.png')); ?>" class="img-profile rounded-circle img-fluid" width="256" height="256"></center>
                                <?php endif; ?>
                                <?php if($patient->Patient->gender == 'Enfant' || $patient->Patient->gender == 'Garçon'): ?>
                                    <center><img src="<?php echo e(asset('img/garson.png')); ?>" class="img-profile rounded-circle img-fluid" width="256" height="256"></center>
                                <?php endif; ?>
                                <?php if($patient->Patient->gender == 'Fille' || $patient->Patient->gender == 'Fille'): ?>
                                    <center><img src="<?php echo e(asset('img/fille.png')); ?>" class="img-profile rounded-circle img-fluid" width="256" height="256"></center>
                                <?php endif; ?>
                            <?php endif; ?>
                            <h4 class="text-center mt-3"><b><?php echo e($patient->name); ?></b> <label
                                    class="badge badge-primary-soft"> <a href="<?php echo e(url('patient/edit/' . $patient->id)); ?>"><i
                                            class="fa fa-pen"></i></a></label></h4>
                            <hr>
                            <?php if(isset($patient->Patient->birthday)): ?>
                                <p><b><?php echo e(__('sentence.Birthday')); ?> :</b> <?php echo e($patient->Patient->birthday); ?>

                                    (<?php echo e(calculateAgeWithMonths($patient->Patient->birthday)); ?>)</p>
                            <?php endif; ?>

                            <?php if(isset($patient->Patient->gender)): ?>
                                <p><b><?php echo e(__('sentence.Gender')); ?> :</b> <?php echo e(__($patient->Patient->gender)); ?></p>
                            <?php endif; ?>

                            <?php if(isset($patient->Patient->phone)): ?>
                                <p><b><?php echo e(__('sentence.Phone')); ?> :</b> <?php echo e($patient->Patient->phone); ?></p>
                            <?php endif; ?>

                            <?php if(isset($patient->Patient->adress)): ?>
                                <p><b><?php echo e(__('sentence.Address')); ?> :</b> <?php echo e($patient->Patient->adress); ?></p>
                            <?php endif; ?>
                            <?php if(isset($patient->Patient->weight)): ?>
                                <p><b><?php echo e(__('sentence.Weight')); ?> :</b> <?php echo e($patient->Patient->weight); ?> Kg</p>
                            <?php endif; ?>

                            <?php if(isset($patient->Patient->height)): ?>
                                <p><b><?php echo e(__('sentence.Height')); ?> :</b> <?php echo e($patient->Patient->height); ?> cm</p>
                            <?php endif; ?>

                            <?php if(isset($patient->Patient->assurance)): ?>
                                <p><b><?php echo e(__('sentence.assurance')); ?> :</b> <?php echo e($patient->Patient->assurance); ?></p>
                            <?php endif; ?>

                            <?php if(isset($patient->Patient->cin)): ?>
                                <p><b>CIN : </b> <?php echo e($patient->Patient->cin); ?></p>
                            <?php endif; ?>

                        </div>
                        <div class="col-md-8 col-sm-6">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile"
                                        role="tab" aria-controls="Profile"
                                        aria-selected="true"><?php echo e(__('sentence.Health History')); ?></a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="documents-tab" data-toggle="tab" href="#documents"
                                        role="tab" aria-controls="documents" aria-selected="false">Dossiers Médicaux</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="appointements-tab" data-toggle="tab" href="#appointements"
                                        role="tab" aria-controls="appointements"
                                        aria-selected="false"><?php echo e(__('sentence.Appointments')); ?></a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="prescriptions-tab" data-toggle="tab" href="#prescriptions"
                                        role="tab" aria-controls="prescriptions"
                                        aria-selected="false"><?php echo e(__('sentence.Prescriptions')); ?></a>
                                </li>


                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="Billing-tab" data-toggle="tab" href="#Billing" role="tab"
                                        aria-controls="Billing"
                                        aria-selected="false"><?php echo e(__('sentence.Payment History')); ?></a>
                                </li>
                                
                                
                                
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                    aria-labelledby="profile-tab">

                                    <div class="row">
                                        <div class="col">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create health history')): ?>
                                                <button type="button" class="btn btn-primary btn-sm my-4 float-right"
                                                    data-toggle="modal" data-target="#MedicalHistoryModel"><i
                                                        class="fa fa-plus"></i> Ajoute</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php $__empty_1 = true; $__currentLoopData = $historys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="alert alert-danger">
                                            <p class="text-danger font-size-12">
                                                <?php echo clean($history->title); ?> - <?php echo e($history->created_at); ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete health history')): ?>
                                                    <span class="float-right"><i class="fa fa-trash" data-toggle="modal"
                                                            data-target="#DeleteModal"
                                                            data-link="<?php echo e(url('history/delete/' . $history->id)); ?>"></i></span>
                                                <?php endif; ?>
                                            </p>
                                            <ul>
                                                <?php if(isset($history->typeanti)): ?>
                                                    <li>
                                                        Type : <?php echo e($history->typeanti); ?>

                                                    </li>
                                                <?php endif; ?>
                                                <?php if(isset($history->traitement)): ?>
                                                    <li>
                                                        Traitement : <?php echo e($history->traitement); ?>

                                                    </li>
                                                <?php endif; ?>
                                                <?php if(isset($history->periode)): ?>
                                                    <li>
                                                        La durée du traitement : <?php echo e($history->periode); ?>

                                                    </li>
                                                <?php endif; ?>
                                                <?php if(isset($history->note)): ?>
                                                    <li>
                                                        Antécédent : <?php echo clean($history->note); ?>

                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <center><img src="<?php echo e(asset('img/not-found.svg')); ?>" width="200" /> <br><br> <b
                                                class="text-muted">Aucun antécédent médical n'a été trouvé</b></center>
                                    <?php endif; ?>




                                </div>
                                <div class="tab-pane fade" id="appointements" role="tabpanel"
                                    aria-labelledby="appointements-tab">
                                    <div class="row">
                                        <div class="col">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create appointment')): ?>
                                                <a type="button" class="btn btn-primary btn-sm my-4 float-right"
                                                    href="<?php echo e(route('appointment.create')); ?>"><i class="fa fa-plus"></i>
                                                    <?php echo e(__('sentence.New Appointment')); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <table class="table">
                                            <tr>
                                                <td align="center">Num</td>
                                                <td align="center"><?php echo e(__('sentence.Date')); ?></td>
                                                <td align="center"><?php echo e(__('sentence.Time Slot')); ?></td>
                                                <td align="center"><?php echo e(__('sentence.Status')); ?></td>
                                                <td align="center"><?php echo e(__('sentence.Actions')); ?></td>
                                            </tr>
                                            <?php $__empty_1 = true; $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td align="center"><?php echo e($appointment->id); ?> </td>
                                                    <td align="center"><label class="badge badge-primary-soft"><i
                                                                class="fas fa-calendar"></i>
                                                            <?php echo e($appointment->date->format('d M Y')); ?> </label></td>
                                                    <td align="center"><label class="badge badge-primary-soft"><i
                                                                class="fa fa-clock"></i> <?php echo e($appointment->time_start); ?> -
                                                            <?php echo e($appointment->time_end); ?> </label></td>
                                                    <td class="text-center">
                                                        <?php if($appointment->visited == 0): ?>
                                                            <label class="badge badge-warning-soft">
                                                                <i class="fas fa-hourglass-start"></i>
                                                                <?php echo e(__('sentence.Not Yet Visited')); ?>

                                                            </label>
                                                        <?php elseif($appointment->visited == 1): ?>
                                                            <label class="badge badge-success-soft">
                                                                <i class="fas fa-check"></i> <?php echo e(__('sentence.Visited')); ?>

                                                            </label>
                                                        <?php else: ?>
                                                            <label class="badge badge-danger-soft">
                                                                <i class="fas fa-user-times"></i>
                                                                <?php echo e(__('sentence.Cancelled')); ?>

                                                            </label>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit appointment')): ?>
                                                            <a data-rdv_id="<?php echo e($appointment->id); ?>"
                                                                data-rdv_date="<?php echo e($appointment->date->format('d M Y')); ?>"
                                                                data-rdv_time_start="<?php echo e($appointment->time_start); ?>"
                                                                data-rdv_time_end="<?php echo e($appointment->time_end); ?>"
                                                                data-patient_name="<?php echo e($appointment->User->name); ?>"
                                                                class="btn btn-outline-success btn-circle btn-sm"
                                                                data-toggle="modal" data-target="#EDITRDVModal"><i
                                                                    class="fas fa-check"></i></a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete appointment')): ?>
                                                            <a href="<?php echo e(url('appointment/delete/' . $appointment->id)); ?>"
                                                                class="btn btn-outline-danger btn-circle btn-sm"><i
                                                                    class="fas fa-trash"></i></a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="5" align="center"><img
                                                            src="<?php echo e(asset('img/not-found.svg')); ?>" width="200" /> <br><br>
                                                        <b
                                                            class="text-muted"><?php echo e(__('sentence.No appointment available')); ?></b>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </table>
                                    </div>

                                    <div class="tab-pane fade" id="prescriptions" role="tabpanel"
                                        aria-labelledby="prescriptions-tab">
                                        <div class="row">
                                            <div class="col">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create prescription')): ?>
                                                    <a class="btn btn-primary btn-sm my-4 float-right"
                                                        href="<?php echo e(route('prescription.create')); ?>"><i class="fa fa-pen"></i>
                                                        <?php echo e(__('sentence.Write New Prescription')); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <table class="table">
                                            <tr>
                                                <td align="center"><?php echo e(__('sentence.Reference')); ?></td>
                                                <td class="text-center"><?php echo e(__('sentence.Content')); ?></td>
                                                <td align="center">Créé à</td>
                                                <td align="center"><?php echo e(__('sentence.Actions')); ?></td>
                                            </tr>
                                            <?php $__empty_1 = true; $__currentLoopData = $prescriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prescription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td align="center"><?php echo e($prescription->reference); ?> </td>
                                                    <td class="text-center">
                                                        <label class="badge badge-primary-soft">
                                                            <?php echo e(count($prescription->Drug)); ?> Médicaments
                                                        </label>
                                                        <label class="badge badge-primary-soft">
                                                            <?php echo e(count($prescription->Test)); ?> Analyse
                                                        </label>
                                                    </td>
                                                    <td align="center"><label
                                                            class="badge badge-primary-soft"><?php echo e($prescription->created_at); ?></label>
                                                    </td>
                                                    <td align="center">
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view prescription')): ?>
                                                            <a href="<?php echo e(url('prescription/view/' . $prescription->id)); ?>"
                                                                class="btn btn-outline-success btn-circle btn-sm"><i
                                                                    class="fa fa-eye"></i></a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit prescription')): ?>
                                                            <a href="<?php echo e(url('prescription/edit/' . $prescription->id)); ?>"
                                                                class="btn btn-outline-warning btn-circle btn-sm"><i
                                                                    class="fas fa-pen"></i></a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete prescription')): ?>
                                                            <a href="<?php echo e(url('prescription/delete/' . $prescription->id)); ?>"
                                                                class="btn btn-outline-danger btn-circle btn-sm"><i
                                                                    class="fas fa-trash"></i></a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="4" align="center"> <img
                                                            src="<?php echo e(asset('img/not-found.svg')); ?>" width="200" /> <br><br>
                                                        <b class="text-muted">
                                                            <?php echo e(__('sentence.No prescription available')); ?></b></td>
                                                </tr>
                                            <?php endif; ?>
                                        </table>
                                    </div>

                                    <div class="tab-pane fade" id="documents" role="tabpanel"
                                        aria-labelledby="documents-tab">
                                        <div class="row">
                                            <div class="col">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit patient')): ?>
                                                    <button type="button" class="btn btn-primary btn-sm my-4 float-right"
                                                        data-toggle="modal" data-target="#NewDocumentModel"><i
                                                            class="fa fa-plus"></i> Ajouter nouveau</button>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Document</th>
                                                    <th>Title</th>
                                                    <th>Note</th>
                                                    <th>Créé à</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr>
                                                        <td>
                                                            <?php if($document->document_type == 'pdf'): ?>
                                                                <img src="<?php echo e(asset('img/pdf.jpg')); ?>" class="card-img-top"
                                                                    width="50" height="50">
                                                            <?php elseif($document->document_type == 'docx'): ?>
                                                                <img src="<?php echo e(asset('img/docx.png')); ?>" class="card-img-top"
                                                                    width="50" height="50">
                                                            <?php else: ?>
                                                                <a class="example-image-link"
                                                                    href="<?php echo e(url('/uploads/' . $document->file)); ?>"
                                                                    data-lightbox="example-1">
                                                                    <img src="<?php echo e(url('/uploads/' . $document->file)); ?>"
                                                                        class="card-img-top" width="50" height="50">
                                                                </a>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($document->title); ?></td>
                                                        <td><?php echo e($document->note); ?></td>
                                                        <td><?php echo e($document->created_at); ?></td>
                                                        <td>
                                                            <a href="<?php echo e(url('/uploads/' . $document->file)); ?>"
                                                                class="btn btn-primary btn-sm" download>
                                                                <i class="fa fa-cloud-download-alt"></i> Télécharger
                                                            </a>
                                                            <button class="btn btn-success btn-sm"
                                                                onclick="viewPDF('<?php echo e(asset('/uploads/' . $document->file)); ?>')">
                                                                <i class="fa fa-eye"></i> Afficher
                                                            </button>
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit patient')): ?>
                                                                <a class="btn btn-danger btn-sm" data-toggle="modal"
                                                                    data-target="#DeleteModal"
                                                                    data-link="<?php echo e(url('document/delete/' . $document->id)); ?>">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            <img src="<?php echo e(asset('img/not-found.svg')); ?>"
                                                                width="200" /><br><br>
                                                            <b
                                                                class="text-muted"><?php echo e(__('sentence.No document available')); ?></b>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>



                                    <div class="tab-pane fade" id="Billing" role="tabpanel" aria-labelledby="Billing-tab">









































                                        <table class="table">
                                            <tr>
                                                <th><?php echo e(__('sentence.Invoice')); ?></th>
                                                <th class="text-center"><?php echo e(__('sentence.Date')); ?></th>
                                                <th class="text-center"><?php echo e(__('sentence.Amount')); ?></th>
                                                <th class="text-center"><?php echo e(__('sentence.Status')); ?></th>
                                                <th class="text-center"><?php echo e(__('sentence.Actions')); ?></th>
                                            </tr>
                                            <?php $__empty_1 = true; $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td><a href="<?php echo e(url('billing/view/'.$invoice->id)); ?>"><?php echo e($invoice->reference); ?></a></td>
                                                    <td class="text-center"><label class="badge badge-primary-soft"><?php echo e($invoice->created_at->format('d M Y')); ?></label></td>
                                                    <?php
                                                        $paymentRecord = $sumPayments->where('billing_id', $invoice->id)->first();
                                                        $remainingPayment = optional($paymentRecord)->total_payment ?? 0;
                                                    ?>
                                                    <td class="text-center">
                                                        <a href="#" data-toggle="modal" data-id="<?php echo e($invoice->id); ?>" data-target="#paymentDetailsModal">
                                                            <?php echo e($remainingPayment); ?> / <?php echo e($invoice->due_amount); ?>

                                                            <?php echo e(App\Setting::get_option('currency')); ?>


                                                            <span class="badge badge-danger-soft">
                                        <?php echo e($invoice->due_amount - $remainingPayment); ?>

                                                                <?php echo e(App\Setting::get_option('currency')); ?>

                                                    </span>
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php if($remainingPayment == 0): ?>
                                                            <label class="badge badge-danger-soft">
                                                                <i class="fas fa-hourglass-start"></i> <?php echo e(__('sentence.Unpaid')); ?>

                                                            </label>
                                                        <?php elseif($remainingPayment == $invoice->due_amount): ?>
                                                            <label class="badge badge-success-soft">
                                                                <i class="fas fa-check"></i> <?php echo e(__('sentence.Paid')); ?>

                                                            </label>
                                                        <?php else: ?>
                                                            <label class="badge badge-warning-soft">
                                                                <i class="fas fa-hourglass-start"></i> <?php echo e(__('sentence.Partially Paid')); ?>

                                                            </label>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view invoice')): ?>
                                                            <a href="<?php echo e(url('billing/view/'.$invoice->id)); ?>" class="btn btn-outline-success btn-circle btn-sm"><i class="fa fa-eye"></i></a>
                                                        <?php endif; ?>
                                                        <?php if($remainingPayment == 0): ?>
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit invoice')): ?>
                                                                <a href="<?php echo e(url('billing/edit/' . $invoice->id)); ?>" class="btn btn-outline-warning btn-circle btn-sm"><i class="fas fa-pen"></i></a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete invoice')): ?>
                                                            <a href="<?php echo e(url('billing/delete/'.$invoice->id)); ?>" class="btn btn-outline-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit invoice')): ?>
                                                            <a href="<?php echo e(url('billing/reglement/' . $invoice->id)); ?>"
                                                               class="btn btn-outline-info btn-circle btn-sm"><i class="fas fa-balance-scale"
                                                                                                                 title="Règlement"></i></a>
                                                        <?php endif; ?>

                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                </tr>
                                                <td colspan="6" align="center"><img src="<?php echo e(asset('img/not-found.svg')); ?>" width="200" /> <br><br> <b class="text-muted"><?php echo e(__('sentence.No Invoices Available')); ?></b></td>
                                            <?php endif; ?>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="observation" role="tabpanel"
                                        aria-labelledby="observation-tab">
                                        <div class="chart-container">
                                            
                                            
                                            
                                            
                                            <img src="<?php echo e(asset('img/graph/taille-couchee-age-garcons-0-2-ans.png')); ?>"
                                                id="chart-image"
                                                style="max-width: 1000px; border: 1px solid #ddd; padding: 10px; border-radius: 5px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);" />

                                        </div>
                                    </div>

                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Appointment Modal-->
        <div class="modal fade" id="EDITRDVModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <?php echo e(__('sentence.You are about to modify an appointment')); ?></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><b><?php echo e(__('sentence.Patient')); ?> :</b> <span id="patient_name"></span></p>
                        <p><b><?php echo e(__('sentence.Date')); ?> :</b> <label class="badge badge-primary-soft"
                                id="rdv_date"></label></p>
                        <p><b><?php echo e(__('sentence.Time Slot')); ?> :</b> <label class="badge badge-primary-soft"
                                id="rdv_time"></span></label>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button"
                            data-dismiss="modal"><?php echo e(__('sentence.Close')); ?></button>
                        <a class="btn btn-primary text-white"
                            onclick="event.preventDefault(); document.getElementById('rdv-form-confirm').submit();"><?php echo e(__('sentence.Confirm Appointment')); ?></a>
                        <form id="rdv-form-confirm" action="<?php echo e(route('appointment.store_edit')); ?>" method="POST"
                            class="d-none">
                            <input type="hidden" name="rdv_id" id="rdv_id">
                            <input type="hidden" name="rdv_status" value="1">
                            <?php echo csrf_field(); ?>
                        </form>
                        <a class="btn btn-danger text-white"
                            onclick="event.preventDefault(); document.getElementById('rdv-form-cancel').submit();"><?php echo e(__('sentence.Cancel Appointment')); ?></a>
                        <form id="rdv-form-cancel" action="<?php echo e(route('appointment.store_edit')); ?>" method="POST"
                            class="d-none">
                            <input type="hidden" name="rdv_id" id="rdv_id2">
                            <input type="hidden" name="rdv_status" value="2">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--Document Modal -->
        <div id="NewDocumentModel" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add File / Note</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="post" action="<?php echo e(route('document.store')); ?>" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" name="title" placeholder="Title" required>
                                    <input type="hidden" name="patient_id" value="<?php echo e($patient->id); ?>">
                                    <?php echo e(csrf_field()); ?>

                                </div>
                                <div class="col">
                                    <input type="file" class="form-control-file" name="file"
                                        id="exampleFormControlFile1" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <textarea class="form-control" name="note" placeholder="Note"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button"
                                data-dismiss="modal"><?php echo e(__('sentence.Close')); ?></button>
                            <button class="btn btn-primary text-white" type="submit"><?php echo e(__('sentence.Save')); ?></button>
                    </form>
                </div>
            </div>
        </div>
        </div>

        <!--Document Modal -->
        <div id="MedicalHistoryModel" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouté antécédent </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="post" action="<?php echo e(route('history.store')); ?>" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" name="title"
                                        placeholder="Antécédent/Maladie">
                                    <input type="hidden" name="patient_id" value="<?php echo e($patient->id); ?>">
                                    <?php echo e(csrf_field()); ?>

                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col">
                                    <select class="form-control" name="typeanti">
                                        <option value="">Type antécédent</option>
                                        <option value="Médical">Médical</option>
                                        <option value="Chirurgical">Chirurgical</option>
                                        <option value="Familial">Familial</option>
                                        <option value="Gynéco-Obstétrique">Gynéco-Obstétrique</option>
                                        <option value="Toxique">Toxique</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <textarea class="form-control" name="traitement" placeholder="Traitment"></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <input type="text" class="form-control" name="periode"
                                        placeholder="La durée du traitement">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <textarea class="form-control" name="note" placeholder="Détails antécédent"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button"
                                data-dismiss="modal"><?php echo e(__('sentence.Close')); ?></button>
                            <button class="btn btn-primary text-white" type="submit"><?php echo e(__('sentence.Save')); ?></button>
                    </form>
                </div>
            </div>
        </div>
        </div>

    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('header'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lightbox.css')); ?>" />
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('footer'); ?>
        <script type="text/javascript" src="<?php echo e(asset('dashboard/js/lightbox.js')); ?>"></script>
        <script>
            function viewPDF(pdfUrl) {
                var width = 800; // Set the desired width of the popup window
                var height = 600; // Set the desired height of the popup window
                var left = (screen.width - width) / 2;
                var top = (screen.height - height) / 2;

                window.open(
                    pdfUrl,
                    'PDF Viewer',
                    'width=' + width + ', height=' + height + ', top=' + top + ', left=' + left
                );
            }
        </script>
    <?php $__env->stopSection(); ?>
<?php /**PATH C:\MAMP\htdocs\doctor-myclinc.tayssir.cloud\resources\views/patient/custom/generalist/view.blade.php ENDPATH**/ ?>