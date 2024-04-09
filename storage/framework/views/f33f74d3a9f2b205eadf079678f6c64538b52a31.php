<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="post" action="<?php echo e(route('patient.store_edit')); ?>" enctype="multipart/form-data">
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <div class="row">
                        <div class="col-8">
                            <h6 class="m-0 font-weight-bold text-primary">Modifier fiche patient</h6>
                        </div>
                        <div class="col-4">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view patient')): ?>
                                <button type="submit" class="btn btn-primary btn-sm float-right rounded-0"
                                    style="margin-left: 15px;"><?php echo e(__('sentence.Save')); ?></button>
                                <a href="<?php echo e(route('patient.view', ['id' => $patient->id])); ?>"
                                    class="btn btn-success btn-sm float-right rounded-0">Afichier dossier patient</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="my__label"><?php echo e(__('sentence.Full Name')); ?><font
                                        color="red">*</font></label>
                                <input type="text" class="form-control  rounded-0 shadow-none" id="Name"
                                    name="name" value="<?php echo e($patient->name); ?>">
                                <input type="hidden" class="form-control rounded-0 shadow-none" name="user_id"
                                    value="<?php echo e($patient->id); ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputAddress"><?php echo e(__('sentence.Birthday')); ?><font color="red">*</font></label>
                                <input type="date" class="form-control  rounded-0 shadow-none" id="Birthday"
                                    name="birthday" autocomplete="off" value="<?php echo e($patient->Patient->birthday); ?>">
                            </div>


                            <div class="form-group col-md-4 mb-4">
                                <label for="inputCity"><?php echo e(__('sentence.Gender')); ?><font color="red">*</font></label>
                                <select class="form-control  rounded-0 shadow-none" name="gender" id="Gender">
                                    <option value="<?php echo e($patient->Patient->gender); ?>" selected="selected">
                                        <?php echo e($patient->Patient->gender); ?></option>
                                    <option value="Garçon">Garçon</option>
                                    <option value="Fille">Fille</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            
                            
                            
                            
                            
                            
                            
                            

                        </div>

                        <div class="mb-4">
                            <h3 class="display-6">Informations supplementaires</h3>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputZip"><?php echo e(__('sentence.Blood Group')); ?></label>
                                    <select class="form-control  rounded-0 shadow-none" name="blood" id="Blood">
                                        <option value="<?php echo e($patient->Patient->blood); ?>" selected="selected">
                                            <?php echo e($patient->Patient->blood); ?></option>
                                        <option value="Unknown"><?php echo e(__('sentence.Unknown')); ?></option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState"><?php echo e(__('sentence.Image')); ?></label>
                                    <br>
                                    <label for="file-upload" class="custom-file-upload">
                                        <i class="fa fa-cloud-upload"></i> Selectionner l'image de l'enfant...
                                    </label>
                                    <input type="file" class="form-control  rounded-0 shadow-none" id="file-upload"
                                        name="image">
                                </div>
                                <div class="form-group col-md-4">

                                </div>
                                <!-- <div class="form-group col-md-4">
                                    <label for="inputAddress2">Nom et prénom du représentant légal </label>
                                    <input type="text" class="form-control  rounded-0 shadow-none" id="nbenfant"
                                        name="nbenfant" value="<?php echo e($patient->Patient->nbenfant); ?>">
                                </div> -->
                                
                                <div class="form-group col-md-3">
                                    <label for="nomPere" class="my__label">Nom du pére
                                    </label>
                                    <input type="text" class="form-control shadow-none my__field__input rounded-0"
                                        id="nomPere" name="nomPere" value="<?php echo e($patient->Patient->nomPere); ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="professionPere" class="my__label">Prefession du pére
                                    </label>
                                    <input type="text" class="form-control shadow-none my__field__input rounded-0"
                                        id="professionPere" name="professionPere" value="<?php echo e($patient->Patient->professionPere); ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nomMere" class="my__label">Nom de la mére
                                    </label>
                                    <input type="text" class="form-control shadow-none my__field__input rounded-0"
                                        id="nomMere" name="nomMere" value="<?php echo e($patient->Patient->nomMere); ?>">
                                </div>
                                <div class="form-group col-md-3">
                                <label for="professionMere" class="my__label">Profession de la mére
                                    </label>
                                    <input type="text" class="form-control shadow-none my__field__input rounded-0"
                                        id="professionMere" name="professionMere" value="<?php echo e($patient->Patient->professionMere); ?>">
                                </div>
                                
                                
                                
                                
                                <div class="form-group col-md-4">
                                    <label for="inputAddress">CIN</label>
                                    <input type="text" class="form-control  rounded-0 shadow-none" id="cin"
                                        name="cin" autocomplete="off" value="<?php echo e($patient->Patient->cin); ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputZip">Assurance</label>
                                    <select class="form-control" name="assurance" id="assurance">
                                        <option value="<?php echo e($patient->Patient->assurance); ?>">
                                            <?php echo e($patient->Patient->assurance); ?></option>
                                        <?php $__currentLoopData = $assurances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assurance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($assurance->assurance_name); ?>">
                                                <?php echo e($assurance->assurance_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        

                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        



                        <div class="mb-4">
                            <h3 class="scheduler-border">Adresse et contact</h3>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2"><?php echo e(__('sentence.Address')); ?></label>
                                    <input type="text" class="form-control  rounded-0 shadow-none" id="Address"
                                        name="adress" value="<?php echo e($patient->Patient->adress); ?>">
                                </div>

                                
                                
                                
                                
                                
                                
                                
                                
                                <div class="form-group col-md-3">
                                    <label for="inputAddress2"><?php echo e(__('sentence.Ville')); ?></label>
                                    <input type="text" class="form-control  rounded-0 shadow-none" id="Ville"
                                        name="Ville" value="<?php echo e($patient->Patient->ville); ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputAddress2"><?php echo e(__('sentence.Pays')); ?></label>
                                    <input type="text" class="form-control  rounded-0 shadow-none" id="Pays"
                                        name="Pays" value="Maroc" value="<?php echo e($patient->Patient->pays); ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4"><?php echo e(__('sentence.Email Adress')); ?></label>
                                    <input type="email" class="form-control  rounded-0 shadow-none" id="Email"
                                        name="email" value="<?php echo e($patient->email); ?>">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputAddress2"><?php echo e(__('sentence.Phone')); ?></label>
                                    <input type="text" class="form-control  rounded-0 shadow-none" id="Phone"
                                        name="phone" value="<?php echo e($patient->Patient->phone); ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputAddress2"><?php echo e(__('sentence.fixe')); ?></label>
                                    <input type="text" class="form-control  rounded-0 shadow-none" id="fixe"
                                        name="fixe" value="<?php echo e($patient->Patient->fixe); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h3>Observation</h3>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputAddress2">Observation</label>
                                    <textarea class="form-control  rounded-0 shadow-none" id="historiquemaladie" name="historiquemaladie"> <?php echo e($patient->Patient->historiquemaladie); ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="d-flex justify-content-end col-12">
                                <button type="submit"
                                    class="btn btn-primary rounded-0"><?php echo e(__('sentence.Save')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <style type="text/css">
        input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }

        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #000;
        }

        legend.scheduler-border {
            width: inherit;
            /* Or auto */
            padding: 0 10px;
            /* To give a bit of padding on the left and right */
            border-bottom: none;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\wamp641\www\MYCLINIC-PEDIATRE\MYCLINIC-PEDIATRE\resources\views/patient/specialty/pediatre/edit.blade.php ENDPATH**/ ?>