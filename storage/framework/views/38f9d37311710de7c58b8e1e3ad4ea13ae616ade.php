<?php $__env->startSection('content'); ?>
    <?php if(!empty($prescription)): ?>
        <div class=" col-11 d-flex justify-content-end">
            <a href="<?php echo e(url('prescription/edit/' . $prescription->id)); ?>" class="btn rounded-0 btn-success"
                style="margin-right:20px;" title="Modifier"><i class="fa fa-edit"></i><span
                    class="d-none d-md-inline-block my__label ml-1">
                    Modifier</span></a>
            <a href="<?php echo e(route('prescription.create')); ?>" class="btn rounded-0 btn-primary" style="margin-right:20px;"
                title=" <?php echo e(__('sentence.New Prescription')); ?>"><i class="fa fa-plus"></i><span
                    class="d-none d-md-inline-block my__label ml-1">
                    <?php echo e(__('sentence.New Prescription')); ?></span></a>
            <a href="<?php echo e(route('prescription.all')); ?>" class="btn rounded-0 btn-warning" style="margin-right:20px;"
                title="<?php echo e(__('sentence.All Prescriptions')); ?>"><i class="fa fa-calendar"></i><span
                    class="d-none d-md-inline-block my__label ml-1">
                    <?php echo e(__('sentence.All Prescriptions')); ?></span></a>
            <?php if(!empty($billingEntry)): ?>
                <a href="<?php echo e(url('billing/edit/' . $billingEntry->id)); ?>" class="btn rounded-0 btn-outline-info"
                    style="margin-right:20px;" title=" Modifier facture"> <i class="fa fa-Modifier"></i><span
                        class="d-none d-md-inline-block my__label ml-1">
                        Modifier
                        facture</span></a>
                <a href="<?php echo e(url('billing/view/' . $billingEntry->id)); ?>" class="btn rounded-0 btn-outline-secondary"
                    style="margin-right:20px;" title="Imprimer facture"> <span
                        class="d-none d-md-inline-block my__label ml-1"> Imprimer
                        facture</span></a>
            <?php else: ?>
                <a href="<?php echo e(url('billing/create') . '?p=' . $prescription->id . '&u=' . $prescription->user_id); ?>"
                    class="btn rounded-0 btn-dark" title="Nouvelle facture"> <i class="fa fa-plus"></i>
                    <span class="d-none d-md-inline-block my__label ml-1">Nouvelle
                        facture</span></a>
            <?php endif; ?>
        </div>
        <br>

        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <h5><strong><u>Ordonnance </u></strong></h5>
                        <button href=""
                            class=" d-sm-inline-block btn btn-sm rounded-0 my-btn   rounded-0 btn-info shadow-sm print_prescription"><i
                                class="fas fa-print fa-sm text-white-50"></i>
                            <span class="d-none d-sm-inline-block">Imprimer</span>
                        </button>
                    </div>
                    <div class="card-body">

                        <!-- ROW: Doctor informations -->
                        <div class="row">
                            <div class="col">
                                
                                
                                
                                <p><?php echo clean(App\Setting::get_option('header_left')); ?></p>
                            </div>
                            <div class="col-md-3">
                                <p><b><?php echo e(__('sentence.Date')); ?> :</b> <?php echo e($prescription->created_at->format('d-m-Y')); ?>

                                </p>
                                <p><b><?php echo e(__('sentence.Reference')); ?> :</b> <?php echo e($prescription->reference); ?></p>
                            </div>
                        </div>
                        <!-- END ROW: Doctor informations -->
                        <!-- ROW: Patient informations -->
                        <div class="row">
                            <div class="col">
                                <p>
                                    <b><?php echo e(__('sentence.Patient Name')); ?> :</b> <?php echo e($prescription->User->name); ?>

                                </p>
                                <hr>
                            </div>
                        </div>
                        <!-- END ROW: Patient informations -->
                        <?php if(count($prescription_drugs) > 0): ?>
                            <!-- ROW: Drugs List -->
                            <div class="row justify-content-center">
                                <div class="col">
                                    <strong><u><?php echo e(__('sentence.medicament')); ?> </u></strong><br><br>
                                    <?php $__currentLoopData = $prescription_drugs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($drug->Drug->trade_name); ?> <?php echo e($drug->strength); ?><br>
                                            <?php echo e($drug->drug_advice); ?></li>
                                        <?php if($loop->last): ?>
                                            <div style="margin-bottom: 40px;"></div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>

                </div>

                

                <!-- END ROW: Tests List -->
                
                <?php if(!empty(App\Setting::get_option('footer_left')) && !empty(App\Setting::get_option('footer_right'))): ?>
                    <!-- ROW: Footer informations -->
                    <div class="row">
                        <div class="col">
                            <p class="font-size-12"><?php echo clean(App\Setting::get_option('footer_left')); ?></p>
                        </div>
                        <div class="col">
                            <p class="float-right font-size-12"><?php echo clean(App\Setting::get_option('footer_right')); ?></p>
                        </div>
                    </div>
                    <!-- END ROW: Footer informations -->
                <?php elseif(empty(App\Setting::get_option('footer_left'))): ?>
                    <!-- ROW: Footer informations -->
                    <div class="row">
                        <div class="col">
                            <p class="font-size-12"><?php echo clean(App\Setting::get_option('footer_right')); ?></p>
                        </div>
                    </div>
                    <!-- END ROW: Footer informations -->
                <?php elseif(empty(App\Setting::get_option('footer_right'))): ?>
                    <!-- ROW: Footer informations -->
                    <div class="row">
                        <div class="col">
                            <p class="font-size-12"><?php echo clean(App\Setting::get_option('footer_left')); ?></p>
                        </div>
                    </div>
                    <!-- END ROW: Footer informations -->
                <?php else: ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
    </div>
    <div id="print_analysee">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <h5><strong> <u>Analyses médicales </u></strong></h5>
                        <button href=""
                            class=" d-sm-inline-block btn  rounded-0 btn-sm btn-info shadow-sm print_analyse"><i
                                class="fas fa-print fa-sm text-white-50"></i>
                            <span class="d-none d-sm-inline-block">Imprimer</span>
                        </button>
                    </div>
                    <div class="card-body">


                        <!-- ROW: Doctor informations -->
                        <div class="row">
                            <div class="col">
                                
                                
                                
                                <p><?php echo clean(App\Setting::get_option('header_left')); ?></p>
                            </div>
                            <div class="col-md-3">
                                <p><b><?php echo e(__('sentence.Date')); ?> :</b> <?php echo e($prescription->created_at->format('d-m-Y')); ?>

                                </p>
                                <p><b><?php echo e(__('sentence.Reference')); ?> :</b> <?php echo e($prescription->reference); ?></p>
                            </div>
                        </div>
                        <!-- END ROW: Doctor informations -->
                        <!-- ROW: Patient informations -->
                        <div class="row">
                            <div class="col">
                                <hr>
                                <p>
                                    <b><?php echo e(__('sentence.Patient Name')); ?> :</b> <?php echo e($prescription->User->name); ?>

                                </p>
                                <hr>
                            </div>
                        </div>

                        <?php if(count($prescription_tests) > 0): ?>
                            <!-- ROW: Tests List -->
                            <div class="row justify-content-center">
                                <div class="col">
                                    <strong><u><?php echo e(__('sentence.Test to do')); ?> </u></strong><br><br>
                                    <?php $__currentLoopData = $prescription_tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <?php if(empty(!$test->analyse_name)): ?>
                                                <?php echo e($test->analyse_name); ?>

                                            <?php endif; ?>
                                        </li>
                                        <?php if(empty(!$test->description)): ?>
                                            <p> <?php echo e($test->description); ?> </p>
                                        <?php endif; ?>
                                        <br>
                                        <?php if($loop->last): ?>
                                            <br>
                                            <br>
                                            <div style="margin-bottom: 40px;">
                                                
                                                
                                                
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                            </div>

                            

                            <!-- END ROW: Tests List -->
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="print_ophtalmologie">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <h5><strong><u>Examen clinique </u></strong></h5>
                        <button href=""
                            class=" d-sm-inline-block btn  rounded-0 btn-sm btn-info shadow-sm print_ophtal"><i
                                class="fas fa-print fa-sm text-white-50"></i>
                            <span class="d-none d-sm-inline-block">Imprimer</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <!-- ROW: Doctor informations -->
                        <div class="row">
                            <div class="col">
                            </div>
                            <div class="col-md-3">
                                <p><b><?php echo e(__('sentence.Date')); ?> :</b> <?php echo e($prescription->created_at->format('d-m-Y')); ?>

                                </p>
                                <p><b><?php echo e(__('sentence.Reference')); ?> :</b> <?php echo e($prescription->reference); ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <hr>
                                <p>
                                    <b><?php echo e(__('sentence.Patient Name')); ?> :</b> <?php echo e($prescription->User->name); ?>

                                </p>
                                <hr>
                            </div>
                        </div>
                        <!-- ROW: Tests List -->
                        <p><b>AV(vision de loin)</b></p>
                        <ul>
                            <li>Sans correction :
                                <ul>
                                    <li> OD: <?php echo e($prescription->av_vl_od_s); ?>/10</li>
                                    <li> OG: <?php echo e($prescription->av_vl_og_s); ?>/10</li>
                                </ul>
                            </li>
                            <li>Avec correction :
                                <ul>
                                    <li>OD: <?php echo e($prescription->av_vl_od_a); ?>/10</li>
                                    <li> OG: <?php echo e($prescription->av_vl_og_a); ?>/10</li>
                                </ul>
                            </li>
                        </ul>
                        <p><b>AV(vision de près)</b></p>
                        <ul>
                            <li>OD: <?php echo e($prescription->av_vp_od); ?> </li>
                            <li> OG: <?php echo e($prescription->av_vp_og); ?></li>
                        </ul>

                        <p><b>SA(segment antérieur)</b></p>
                        <ul>
                            <li>OD: <?php echo e($prescription->sa_od); ?> </li>
                            <li> OG: <?php echo e($prescription->sa_og); ?></li>
                        </ul>

                        <p><b>TO(tonus oculaire)</b></p>
                        <ul>
                            <li>OD: <?php echo e($prescription->to_od); ?> </li>
                            <li> OG: <?php echo e($prescription->to_og); ?></li>
                        </ul>

                        <p><b>FO(fond d'oeil)</b></p>
                        <ul>
                            <li>OD: <?php echo e($prescription->fo_od); ?> </li>
                            <li> OG: <?php echo e($prescription->fo_og); ?></li>
                        </ul>

                        <p><b>Réfraction</b></p>
                        <ul>
                            <li>OD: <?php echo e($prescription->ref_od); ?> </li>
                            <li> OG: <?php echo e($prescription->ref_og); ?></li>
                        </ul>



                        <p><b>Annexes</b></p>
                        <ul>
                            <li>OD: <?php echo e($prescription->annex_od); ?></li>
                            <li> OG: <?php echo e($prescription->annex_og); ?></li>
                        </ul>
                        <br>
                        <ul><b> Verres + monture</b></ul>
                        <?php if(isset($prescription->verre_ar)): ?>
                            <li><?php echo e($prescription->verre_ar); ?></li>
                        <?php endif; ?>
                        <?php if(isset($prescription->verre_lb)): ?>
                            <li><?php echo e($prescription->verre_lb); ?></li>
                        <?php endif; ?>
                        <?php if(isset($prescription->verre_uv)): ?>
                            <li><?php echo e($prescription->verre_uv); ?></li>
                        <?php endif; ?>
                        <?php if(isset($prescription->verre_pro)): ?>
                            <li><?php echo e($prescription->verre_pro); ?></li>
                        <?php endif; ?>
                        <?php if(isset($prescription->verre_phog)): ?>
                            <li><?php echo e($prescription->verre_phog); ?></li>
                        <?php endif; ?>
                        <br>
                        <br>
                        <p><b>Commentaire</b></p>
                        <textarea class="form-control" id="rapport" name="rapport" rows="5" placeholder=""
                            value="<?php echo e($prescription->rapport); ?>" readonly><?php echo e($prescription->rapport); ?></textarea>

                        

                        <!-- END ROW: Tests List -->
                    </div>
                </div>
            </div>
        </div>
    </div>










    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
    </div>
    <div id="print_radioo">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <h5><strong><u>Radio </u></strong></h5>

                        <button href=""
                            class=" d-sm-inline-block btn btn-sm rounded-0 btn-info shadow-sm print_radio"><i
                                class="fas fa-print fa-sm text-white-50"></i>
                            <span class="d-none d-sm-inline-block">Imprimer</span>
                        </button>
                    </div>
                    <div class="card-body">


                        <!-- ROW: Doctor informations -->
                        <div class="row">
                            <div class="col">
                                
                                
                                
                                <p><?php echo clean(App\Setting::get_option('header_left')); ?></p>
                            </div>
                            <div class="col-md-3">
                                <p><b><?php echo e(__('sentence.Date')); ?> :</b> <?php echo e($prescription->created_at->format('d-m-Y')); ?>

                                </p>
                                <p><b><?php echo e(__('sentence.Reference')); ?> :</b> <?php echo e($prescription->reference); ?></p>
                            </div>
                        </div>
                        <!-- END ROW: Doctor informations -->
                        <!-- ROW: Patient informations -->
                        <div class="row">
                            <div class="col">
                                <hr>
                                <p>
                                    <b><?php echo e(__('sentence.Patient Name')); ?> :</b> <?php echo e($prescription->User->name); ?>

                                </p>
                                <hr>
                            </div>
                        </div>

                        <?php if(count($prescription_radios) > 0): ?>
                            <!-- ROW: Tests List -->
                            <div class="row justify-content-center">
                                <div class="col">
                                    <strong><u>Faire SVP </u></strong><br><br>
                                    <?php $__currentLoopData = $prescription_radios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $radio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <?php if(empty(!$radio->radio_name)): ?>
                                                <?php echo e($radio->radio_name); ?>

                                            <?php endif; ?>
                                        </li>
                                        <?php if(empty(!$radio->justif)): ?>
                                            <p> <?php echo nl2br(e($radio->justif)); ?> </p>
                                        <?php endif; ?>
                                        <br>
                                        <?php if($loop->last): ?>
                                            <br>
                                            <br>
                                            <div style="margin-bottom: 40px;">
                                                
                                                
                                                
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                            </div>

                            

                            <!-- END ROW: Tests List -->
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(empty(!$prescription->certificat)): ?>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
        </div>
        <div id="print_certii">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-end">


                            <button href=""
                                class=" d-sm-inline-block btn btn-sm rounded-0 btn-info shadow-sm print_certi"><i
                                    class="fas fa-print fa-sm text-white-50"></i> <span
                                    class="d-none d-sm-inline-block">Imprimer</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <br><br>


                            <!-- ROW: Doctor informations -->
                            <div class="row">
                                <div class="col text-center"><br><br>
                                    <h2 class="mt-400">CERTIFICAT MEDICAL</h2>
                                </div>
                            </div>
                            <br><br><br><br>
                            <div class="row mt-400">
                                <div class="col">
                                    <p class="text-left">Je soussigne
                                        <strong><?php echo e(App\Setting::get_option('title')); ?> </strong>
                                    </p> <br>
                                    <p class="text-left">Avoir examiné ce jour le(a) patient(e) :
                                        <strong> <?php echo e($prescription->User->name); ?></strong>
                                    </p> <br>
                                    <?php if(isset($prescription->User->Patient->cin)): ?>
                                        <p class="text-left">Mr,Mme : <strong> <?php echo e($prescription->User->name); ?></strong>
                                            porteur cin <strong><?php echo e($prescription->User->Patient->cin); ?></strong></p><br>
                                    <?php endif; ?>
                                    <p class="text-left">Et que son état de santé nécessite un repos de
                                        <strong><?php echo e($prescription->certificat); ?> </strong>jour(s).
                                    </p> <br>
                                    <?php if($prescription->certificat == 1): ?>
                                        <p class="text-left">Le :
                                            <strong><?php echo e(\Carbon\Carbon::parse($prescription->dated)->format('d-m-Y')); ?>

                                            </strong>
                                            sauf complication(s)
                                        </p>
                                    <?php endif; ?>
                                    <?php if($prescription->certificat != 1): ?>
                                        <p class="text-left">A partir du :
                                            <strong><?php echo e(\Carbon\Carbon::parse($prescription->dated)->format('d-m-Y')); ?>

                                            </strong>
                                            au
                                            <strong>
                                                <?php echo e(\Carbon\Carbon::parse($prescription->datef)->format('d-m-Y')); ?></strong>
                                            sauf complication(s)
                                        </p>
                                    <?php endif; ?>
                                    <br>
                                    Certificat médical remis a l'intéressé pour faire servir et valoir ce que de droit
                                    <br><br><br>
                                    <p class="text-right" style="margin-right: 200px">Fait à
                                        <strong><?php echo e(App\Setting::get_option('ville')); ?> </strong>
                                        Le <?php echo e($prescription->created_at->format('d-m-Y')); ?>

                                    </p> <br><br>
                                    <p class="text-right" style="margin-right: 100px"> Signature et cachet: </p>
                                    <br><br><br><br><br><br>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div id="print_radio" style="display: none;">
        <!-- ROW: Doctor informations -->
        <div class="row">
            <div class="col-9">
                <?php if(!empty(App\Setting::get_option('logo'))): ?>
                    
                <?php endif; ?>
                <p><?php echo clean(App\Setting::get_option('header_left')); ?></p>
            </div>

        </div>
        <!-- END ROW: Doctor informations -->
        <!-- ROW: Patient informations -->
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br><br><br><br><br>


        <div class="row">
            <div class="col" style="font-size: xx-large; margin-left: 25px; margin-right: 25px; text-align: center;">
                <br>
                <p>
                    <b style="float: right;">
                        <?php echo e($prescription->created_at->format('d-m-Y')); ?></b>
                </p>
                <br> <br>
                <b style="display: block;"><?php echo e($prescription->patient_title); ?> <?php echo e($prescription->User->name); ?> </b>
            </div>
        </div>
        <br>

        <!-- END ROW: Patient informations -->
        <?php if(count($prescription_radios) > 0): ?>
            <!-- ROW: Tests List -->
            <div class="row justify-content-center" style="font-size: xx-large">
                <div class="col">
                    <strong style="margin-left: 100px;"><u>Faire SVP : </u></strong><br><br>
                    <?php $__currentLoopData = $prescription_radios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $radio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <b>
                            <li style="margin-left: 120px;">
                                <?php if(empty(!$radio->radio_name)): ?>
                                    <?php echo e($radio->radio_name); ?>

                                <?php endif; ?>
                            </li>
                        </b>
                        <?php if(empty(!$radio->justif)): ?>
                            <p style="margin-left: 170px;"> <?php echo nl2br(e($radio->justif)); ?> </p>
                        <?php endif; ?>
                        <br>
                        <?php if($loop->last): ?>
                            <br>
                            <div style="margin-bottom: 40px;">
                                
                                
                                
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>

            

            <!-- END ROW: Tests List -->
        <?php endif; ?>


        <?php if(!empty(App\Setting::get_option('footer_left')) && !empty(App\Setting::get_option('footer_right'))): ?>
            <!-- ROW: Footer informations -->
            <div class="row">
                <div class="col">
                    <p class="font-size-12"><?php echo clean(App\Setting::get_option('footer_left')); ?></p>
                </div>
                <div class="col">
                    <p class="float-right font-size-12"><?php echo clean(App\Setting::get_option('footer_right')); ?></p>
                </div>
            </div>
            <!-- END ROW: Footer informations -->
        <?php elseif(empty(App\Setting::get_option('footer_left'))): ?>
            <!-- ROW: Footer informations -->
            <div class="row">
                <div class="col">
                    <p class="font-size-12"><?php echo clean(App\Setting::get_option('footer_right')); ?></p>
                </div>
            </div>
            <!-- END ROW: Footer informations -->
        <?php elseif(empty(App\Setting::get_option('footer_right'))): ?>
            <!-- ROW: Footer informations -->
            <div class="row">
                <div class="col">
                    <p class="font-size-12"><?php echo clean(App\Setting::get_option('footer_left')); ?></p>
                </div>
            </div>
            <!-- END ROW: Footer informations -->
        <?php else: ?>
        <?php endif; ?>
    </div>

    </div>
    </div>

    </div>
    </div>



    <div id="print_ophtal" style="display: none;">
        <!-- ROW: Doctor informations -->
        <div class="row">
            <div class="col-9">
                <?php if(!empty(App\Setting::get_option('logo'))): ?>
                    
                <?php endif; ?>
                <p><?php echo clean(App\Setting::get_option('header_left')); ?></p>
            </div>

        </div>
        <!-- END ROW: Doctor informations -->
        <!-- ROW: Patient informations -->
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br><br><br><br><br>


        <div class="row">
            <div class="col" style="font-size: xx-large; margin-left: 25px; margin-right: 25px; text-align: center;">
                <br>
                <p>
                    <b style="float: right;">
                        <?php echo e($prescription->created_at->format('d-m-Y')); ?></b>
                </p>
                <br> <br>
                <b style="display: block;"><?php echo e($prescription->patient_title); ?> <?php echo e($prescription->User->name); ?> </b>
            </div>
        </div>
        <br>

        <!-- END ROW: Patient informations -->
        <!-- ROW: Tests List -->
        <div class="row justify-content-center" style="font-size: xx-large">
            <div class="col" style="margin-left: 100px;">
                <br><br>
                <b> Verres + monture :</b>
                <?php if(isset($prescription->verre_ar)): ?>
                    <?php echo e($prescription->verre_ar); ?>

                <?php endif; ?>
                <?php if(isset($prescription->verre_lb)): ?>
                    -<?php echo e($prescription->verre_lb); ?>-
                <?php endif; ?>
                <?php if(isset($prescription->verre_uv)): ?>
                    <?php echo e($prescription->verre_uv); ?>-
                <?php endif; ?>
                <?php if(isset($prescription->verre_pro)): ?>
                    <?php echo e($prescription->verre_pro); ?>-
                <?php endif; ?>
                <?php if(isset($prescription->verre_phog)): ?>
                    <?php echo e($prescription->verre_phog); ?>

                <?php endif; ?>
                <br><br>
                <?php if(isset($prescription->ref_od)): ?>
                    <strong>VL : </strong>
                    <ul>
                        <li>OD: <?php echo e($prescription->ref_od); ?> </li>
                        <li> OG: <?php echo e($prescription->ref_og); ?></li>
                    </ul>
                <?php endif; ?>
                <br>
                <?php if(isset($prescription->addition)): ?>
                    <b>VP : Addition </b> <?php echo e($prescription->addition); ?>

                <?php endif; ?>
            </div>

        </div>

        <?php if(!empty(App\Setting::get_option('footer_left')) && !empty(App\Setting::get_option('footer_right'))): ?>
            <!-- ROW: Footer informations -->
            <div class="row">
                <div class="col">
                    <p class="font-size-12"><?php echo clean(App\Setting::get_option('footer_left')); ?></p>
                </div>
                <div class="col">
                    <p class="float-right font-size-12"><?php echo clean(App\Setting::get_option('footer_right')); ?></p>
                </div>
            </div>
            <!-- END ROW: Footer informations -->
        <?php elseif(empty(App\Setting::get_option('footer_left'))): ?>
            <!-- ROW: Footer informations -->
            <div class="row">
                <div class="col">
                    <p class="font-size-12"><?php echo clean(App\Setting::get_option('footer_right')); ?></p>
                </div>
            </div>
            <!-- END ROW: Footer informations -->
        <?php elseif(empty(App\Setting::get_option('footer_right'))): ?>
            <!-- ROW: Footer informations -->
            <div class="row">
                <div class="col">
                    <p class="font-size-12"><?php echo clean(App\Setting::get_option('footer_left')); ?></p>
                </div>
            </div>
            <!-- END ROW: Footer informations -->
        <?php else: ?>
        <?php endif; ?>
    </div>

    </div>
    </div>

    </div>
    </div>


    <!-- Hidden prescription -->
    <div id="print_area" style="display: none;">
        <!-- ROW: Doctor informations -->
        <div class="row">
            <div class="col-9">
                <?php if(!empty(App\Setting::get_option('logo'))): ?>
                    
                <?php endif; ?>
                <p><?php echo clean(App\Setting::get_option('header_left')); ?></p>
            </div>

        </div>
        <!-- END ROW: Doctor informations -->
        <!-- ROW: Patient informations -->
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br><br><br><br><br>
        <div class="row">
            <div class="col" style="font-size: xx-large; margin-left: 25px; margin-right: 25px; text-align: center;">
                <br>
                <p>
                    <b style="float: right;">
                        <?php echo e($prescription->created_at->format('d-m-Y')); ?></b>
                </p>
                <br> <br>
                <b style="display: block;"><?php echo e($prescription->patient_title); ?> <?php echo e($prescription->User->name); ?> </b>
            </div>
        </div>
        <br>
        <!-- END ROW: Patient informations -->
        <?php if(count($prescription_drugs) > 0): ?>
            <!-- ROW: Drugs List -->
            <br>
            <br>
            <div class="row" style="font-size: xx-large ; margin-left: 25px; margin-right: 25px;">
                <div class="col">
                    <?php $__currentLoopData = $prescription_drugs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($drug->Drug->trade_name); ?> <?php echo e($drug->strength); ?><br>
                            <?php if(isset($drug->drug_advice)): ?>
                                <strong>
                                    <p style="font-size: xx-large; margin-left: 120px; margin-right: 25px;">
                                        <?php echo e($drug->drug_advice); ?></p>
                                </strong>
                            </li>
                        <?php endif; ?>
                        <?php if($loop->last): ?>
                            <div style="margin-bottom: 30px;"></div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <!-- ROW: Footer informations -->
        <footer style="position: absolute; bottom: 0;">
            <?php if(!empty(App\Setting::get_option('footer_left')) && !empty(App\Setting::get_option('footer_right'))): ?>
                <!-- ROW: Footer informations -->
                <div class="row">
                    <div class="col">
                        <p class="font-size-12"><?php echo clean(App\Setting::get_option('footer_left')); ?></p>
                    </div>
                    <div class="col">
                        <p class="float-right font-size-12"><?php echo clean(App\Setting::get_option('footer_right')); ?></p>
                    </div>
                </div>
                <!-- END ROW: Footer informations -->
            <?php elseif(empty(App\Setting::get_option('footer_left'))): ?>
                <!-- ROW: Footer informations -->
                <div class="row">
                    <div class="col">
                        <p class="font-size-12"><?php echo clean(App\Setting::get_option('footer_right')); ?></p>
                    </div>
                </div>
                <!-- END ROW: Footer informations -->
            <?php elseif(empty(App\Setting::get_option('footer_right'))): ?>
                <!-- ROW: Footer informations -->
                <div class="row">
                    <div class="col">
                        <p class="font-size-12"><?php echo clean(App\Setting::get_option('footer_left')); ?></p>
                    </div>
                </div>
                <!-- END ROW: Footer informations -->
            <?php else: ?>
            <?php endif; ?>
        </footer>
        <!-- END ROW: Footer informations -->
    </div>

    <div>
        <!-- Hidden prescription -->
        <div id="print_analyse" style="display: none;">
            <!-- ROW: Doctor informations -->
            <div class="row">
                <div class="col-9">
                    <?php if(!empty(App\Setting::get_option('logo'))): ?>
                        
                    <?php endif; ?>
                    <p><?php echo clean(App\Setting::get_option('header_left')); ?></p>
                </div>

            </div>
            <!-- END ROW: Doctor informations -->
            <!-- ROW: Patient informations -->
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br><br><br><br><br>

            <div class="row">
                <div class="col"
                    style="font-size: xx-large; margin-left: 25px; margin-right: 25px; text-align: center;">
                    <br>
                    <p>
                        <b style="float: right;">
                            <?php echo e($prescription->created_at->format('d-m-Y')); ?></b>
                    </p>
                    <br> <br>
                    <b style="display: block;"><?php echo e($prescription->patient_title); ?> <?php echo e($prescription->User->name); ?> </b>
                </div>
            </div>
            <br>
            <!-- END ROW: Patient informations -->
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <br>
            <br>
            <?php if(count($prescription_tests) > 0): ?>
                <!-- ROW: Tests List -->
                <div class="row justify-content-center">
                    <div class="col">
                        <strong><u style="font-size: xx-large; margin-left: 25px; margin-right: 25px;">Faire SVP
                                :</u></strong><br><br>
                        <?php $__currentLoopData = $prescription_tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li style="font-size: xx-large; margin-left: 50px;">
                                <?php if(empty(!$test->analyse_name)): ?>
                                    <?php echo e($test->analyse_name); ?>

                                <?php endif; ?>
                            </li>
                            <?php if(empty(!$test->description)): ?>
                                <p style="font-size: xx-large; margin-left: 180px; margin-right: 25px;">
                                    <?php echo e($test->description); ?>

                                </p>
                            <?php endif; ?>
                            <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <!-- END ROW: Tests List -->
            <?php endif; ?>
            <!-- ROW: Footer informations -->
            <footer style="position: absolute; bottom: 0;">
                <?php if(!empty(App\Setting::get_option('footer_left')) && !empty(App\Setting::get_option('footer_right'))): ?>
                    <!-- ROW: Footer informations -->
                    <div class="row">
                        <div class="col">
                            <p class="font-size-12"><?php echo clean(App\Setting::get_option('footer_left')); ?></p>
                        </div>
                        <div class="col">
                            <p class="float-right font-size-12"><?php echo clean(App\Setting::get_option('footer_right')); ?></p>
                        </div>
                    </div>
                    <!-- END ROW: Footer informations -->
                <?php elseif(empty(App\Setting::get_option('footer_left'))): ?>
                    <!-- ROW: Footer informations -->
                    <div class="row">
                        <div class="col">
                            <p class="font-size-12"><?php echo clean(App\Setting::get_option('footer_right')); ?></p>
                        </div>
                    </div>
                    <!-- END ROW: Footer informations -->
                <?php elseif(empty(App\Setting::get_option('footer_right'))): ?>
                    <!-- ROW: Footer informations -->
                    <div class="row">
                        <div class="col">
                            <p class="font-size-12"><?php echo clean(App\Setting::get_option('footer_left')); ?></p>
                        </div>
                    </div>
                    <!-- END ROW: Footer informations -->
                <?php else: ?>
                <?php endif; ?>
            </footer>
            <!-- END ROW: Footer informations -->
        </div>
    </div>
    <div id="print_certi" style="display: none;">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card-body">
                    <!-- ROW: Doctor informations -->
                    <div class="row">
                        <div class="col text-center"><br><br><br><br><br><br>
                            <br><br><br><br><br>
                            <div class="col"
                                style="font-size: xx-large; margin-left: 25px; margin-right: 25px; text-align: center;">
                                <br>
                                <p>
                                    <b style="float: right;">
                                        <?php echo e($prescription->created_at->format('d-m-Y')); ?></b>
                                </p>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br><br><br>
                            <h1 class="mt-400">CERTIFICAT MEDICAL</h1>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="row mt-100" style="font-size: x-large">
                        <div class="col">
                            <p class="text-left">Je soussigne <strong><?php echo e(App\Setting::get_option('title')); ?> </strong>
                            </p> <br>
                            <p class="text-left">Avoir examiné ce jour le(a) patient(e) :
                                <strong><?php echo e($prescription->patient_title); ?> <?php echo e($prescription->User->name); ?></strong>
                            </p> <br>
                            <?php if(isset($prescription->User->Patient->cin)): ?>
                                <p class="text-left">Mr,Mme : <strong> <?php echo e($prescription->User->name); ?></strong> porteur
                                    cin <strong><?php echo e($prescription->User->Patient->cin); ?></strong></p><br>
                            <?php endif; ?>
                            <p class="text-left">Et que son état de santé nécessite un repos de
                                <strong><?php echo e($prescription->certificat); ?> </strong>jour(s).
                            </p> <br>
                            <?php if($prescription->certificat == 1): ?>
                                <p class="text-left">Le :
                                    <strong><?php echo e(\Carbon\Carbon::parse($prescription->dated)->format('d-m-Y')); ?> </strong>
                                    sauf complication(s)
                                </p>
                            <?php endif; ?>
                            <?php if($prescription->certificat != 1): ?>
                                <p class="text-left">A partir du :
                                    <strong><?php echo e(\Carbon\Carbon::parse($prescription->dated)->format('d-m-Y')); ?> </strong>
                                    au
                                    <strong> <?php echo e(\Carbon\Carbon::parse($prescription->datef)->format('d-m-Y')); ?></strong>
                                    sauf complication(s)
                                </p>
                            <?php endif; ?>
                            <br>
                            Certificat médical remis a l'intéressé pour faire servir et valoir ce que de droit
                            <br><br><br><br>
                            <p class="text-right" style="margin-right: 200px">Fait à
                                <strong><?php echo e(App\Setting::get_option('ville')); ?></strong>
                                Le <?php echo e($prescription->created_at->format('d-m-Y')); ?>

                            </p> <br><br>
                            <p class="text-right" style="margin-right: 60px"> Signature et cachet: </p>
                            <br><br><br><br><br><br>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <style type="text/css">
        p,
        u,
        li {
            color: #444444 !important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

        $(function() {
            $(document).on('click', '.print_analyse', function() {
                printDiv('print_analyse');
            })
        })
        $(function() {
            $(document).on("click", '.print_prescription', function() {
                printDiv('print_area');
            });
            $(function() {
                $(document).on("click", '.print_certi', function() {
                    printDiv('print_certi')
                })
            })
            $(function() {
                $(document).on("click", '.print_radio', function() {
                    printDiv('print_radio')
                })
            })

            $(function() {
                $(document).on("click", '.print_ophtal', function() {
                    printDiv('print_ophtal')
                })
            })
        });
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\MAMP\htdocs\doctor-generalist.tayssir.cloud\resources\views/prescription/specialty/ophtamologie/view.blade.php ENDPATH**/ ?>