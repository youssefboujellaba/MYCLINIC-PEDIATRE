
<?php $__env->startSection('header'); ?>
    <link href="<?php echo e(asset('css/print.css')); ?>" rel="stylesheet" media="all">

    <style type="text/css">
        p,
        u,
        li {
            color: #444444 !important;
        }

        .line {
            width: 100%;
            border-bottom: 1px solid #444444 !important;
        }

        .my__text__thead {
            font-size: 15px;
            font-weight: 600;
            color: #fff;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-sm-5">
                            <h5 class="m-0 font-weight-bold text-primary mb-3">L'achat N° <?php echo e($purchase->id); ?></h5>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 ">
                            <h5>De</h5>
                            <h6 class="my__sm__text"><?php echo e($settings['system_name']->option_value); ?></h6>
                            <h6 class="text-sm"><?php echo e($settings['system_title']->option_value); ?></h6>

                            <h6 class="text-sm"><?php echo e($settings['system_phone']->option_value); ?></h6>
                            <h6 class="text-sm"><?php echo e($settings['system_email']->option_value); ?></h6>
                            <h6 class="text-sm"><?php echo e($settings['system_address']->option_value); ?></h6>

                            <h6 class="text-sm"><?php echo e($settings['system_ville']->option_value); ?></h6>
                        </div>

                        <div class="col-lg-4">
                            <h5>Détails du fournisseur</h5>
                            <h6 class="text-sm"><?php echo e($fournisseur->name); ?></h6>
                            <h6 class="text-sm"><?php echo e($fournisseur->address); ?></h6>
                            <h6 class="text-sm"><?php echo e($fournisseur->phone); ?></h6>
                            <h6 class="text-sm"><?php echo e($fournisseur->email); ?></h6>
                            <h6 class="text-sm"><?php echo e($fournisseur->ville); ?></h6>

                        </div>
                        <div class="col-4">
                            <h5>Détails d'achat</h5>
                            <h6 class="text-sm">Numéro de facture: <?php echo e($purchase->id); ?></h6>
                            <h6 class="text-sm">Date d'achat: <?php echo e($purchase->purchase_date); ?></h6>


                            <h6 class="text-sm">Statut d'achat:
                                <span class="ml-3">

                                    <?php if($purchase->purchase_status == 0): ?>
                                        <span class="badge badge-danger ">En cours
                                        </span>
                                    <?php elseif($purchase->purchase_status == 1): ?>
                                        <span class="badge badge-success">Envoyé</span>
                                    <?php elseif($purchase->purchase_status == 2): ?>
                                        <span class="badge badge-info">Payé</span>
                                    <?php elseif($purchase->purchase_status == 3): ?>
                                        <span class="badge badge-primary"> Non payé</span>
                                    <?php elseif($purchase->purchase_status == 4): ?>
                                        <span class="badge badge-secondary">Livré</span>
                                    <?php endif; ?>
                                </span>
                            </h6>



                        </div>
                    </div>

                    <div class="table-responsive mt-3">
                        <table class="table table-striped">
                            <thead class="bg-gradient-primary text-light" class="text-center">
                                <tr>
                                    <th class="text-center my__text__thead">Produit</th>
                                    <th class="text-center my__text__thead">Quantité</th>
                                    <th class="text-center my__text__thead">Prix</th>
                                    <th class="text-center my__text__thead">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $purchase->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($item->name); ?></td>
                                        <td class="text-center"><?php echo e($item->pivot->quantity); ?></td> 
                                        <td class="text-center"><?php echo e($item->sale_price); ?></td> 
                                        <td class="total text-center"><?php echo e($item->sale_price * $item->pivot->quantity); ?></td>
                                        
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4">No items found!</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <table width="100%">
                                <tr>
                                    <td class="py-2" width="30%">
                                        <h6 class="text-sm">TVA</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-sm" class="py-3"><?php echo e($purchase->TVA); ?> %</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">
                                        <h6 class="text-sm">Mode de paiement</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-sm" class="py-3"><?php echo e($purchase->type_pay); ?></h6>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="py-2">
                                        <h6 class="text-sm">Remarque</h6>
                                    </td>
                                    <td>
                                        <div class="border w-100 py-3" style="height: 70px">
                                            <h6 class="text-sm">
                                                <?php echo e($purchase->note); ?>

                                            </h6>
                                        </div>
                                </tr>

                            </table>



                        </div>
                        <div class="col-lg-6 col-md-12 mt-5">
                            <table width="100%">
                                <tr>
                                    <td class="text-right pr-4">
                                        <h6 class="text-sm">Total</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-sm">:</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-sm"><span id="total">0.00</span> DH</h6>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-right pr-4">
                                        <h6 class="text-sm">TVA</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-sm">:</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-sm">
                                            <?php echo e(($purchase->total_price * $purchase->TVA) / 100); ?> DH</h6>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-right pr-4">
                                        <h6 class="text-sm">Somme finall</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-sm">:</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-sm">
                                            <?php echo e($purchase->total_price + ($purchase->total_price * $purchase->TVA) / 100); ?>

                                            DH
                                        </h6>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <table class="table mt-3">

                                <tbody>
                                <?php if(empty(!$purchase->recu)): ?>
                                    <tr>
                                        <td>
                                            <h6 class="text-sm">Reçu</h6>
                                        </td>
                                        <td>
                                            <h6 class="text-sm">:</h6>
                                        </td>
                                        <td>
                                            <h6 class="text-sm">
                                                <?php if(pathinfo($purchase->recu, PATHINFO_EXTENSION) == 'pdf'): ?>
                                                    <img src="<?php echo e(asset('img/pdf.jpg')); ?>" class="card-img-top my__img__pdf"
                                                        width="50" height="50">
                                                <?php elseif(pathinfo($purchase->facture, PATHINFO_EXTENSION) == 'docx'): ?>
                                                    <img src="<?php echo e(asset('img/docx.png')); ?>"
                                                        class="card-img-top my__img__pdf" width="50" height="50">
                                                <?php else: ?>
                                                    <a class="example-image-link"
                                                        href="<?php echo e(url('/uploads/recu/' . $purchase->recu)); ?>"
                                                        data-lightbox="example-1">
                                                        <img src="<?php echo e(url('/uploads/recu/' . $purchase->recu)); ?>"
                                                            class="card-img-top my__img__pdf" width="50"
                                                            height="50">
                                                    </a>
                                                <?php endif; ?>
                                            </h6>
                                        </td>

                                        <td>
                                            <a href="<?php echo e(url('/uploads/recu/' . $purchase->recu)); ?>"
                                                class="btn btn-primary btn-sm rounded-0" download>
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endif; ?>

                            <?php if(empty(!$purchase->facture)): ?>
                                <tr>
                                    <td>
                                        <h6 class="text-sm">Facture</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-sm">:</h6>
                                    </td>
                                    <td>

                                        <?php if(pathinfo($purchase->facture, PATHINFO_EXTENSION) == 'pdf'): ?>
                                            <img src="<?php echo e(asset('img/pdf.jpg')); ?>" class="card-img-top my__img__pdf"
                                                width="50" height="50">
                                        <?php elseif(pathinfo($purchase->facture, PATHINFO_EXTENSION) == 'docx'): ?>
                                            <img src="<?php echo e(asset('img/docx.png')); ?>" class="card-img-top my__img__pdf"
                                                width="50" height="50">
                                        <?php else: ?>
                                            <a class="example-image-link"
                                                href="<?php echo e(url('/uploads/factures/' . $purchase->facture)); ?>"
                                                data-lightbox="example-1">
                                                <img src="<?php echo e(url('/uploads/factures/' . $purchase->facture)); ?>"
                                                    class="card-img-top my__img__pdf" width="50" height="50">
                                            </a>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <a href="<?php echo e(url('/uploads/factures/' . $purchase->facture)); ?>"
                                            class="btn btn-primary btn-sm rounded-0" download>
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endif; ?>


                        <?php if(empty(!$purchase->bon_livraison)): ?>
                            <tr>
                                <td>
                                    <h6 class="text-sm ">Bon livraison</h6>
                                </td>
                                <td>
                                    <h6 class="text-sm">:</h6>
                                </td>
                                <td>
                                    <h6 class="text-sm">


                                        <?php if(pathinfo($purchase->bon_livraison, PATHINFO_EXTENSION) == 'pdf'): ?>
                                            <img src="<?php echo e(asset('img/pdf.jpg')); ?>"
                                                class="card-img-top my__img__pdf" width="50" height="50">
                                        <?php elseif(pathinfo($purchase->bon_livraison, PATHINFO_EXTENSION) == 'docx'): ?>
                                            <img src="<?php echo e(asset('img/docx.png')); ?>"
                                                class="card-img-top my__img__pdf" width="50" height="50">
                                        <?php else: ?>
                                            <a class="example-image-link"
                                                href="<?php echo e(url('/uploads/bon_livraison/' . $purchase->bon_livraison)); ?>"
                                                data-lightbox="example-1">
                                                <img src="<?php echo e(url('/uploads/bon_livraison/' . $purchase->bon_livraison)); ?>"
                                                    class="card-img-top my__img__pdf" width="50"
                                                    height="50">
                                            </a>
                                        <?php endif; ?>
                                    </h6>
                                </td>

                                <td>
                                    <a href="<?php echo e(url('/uploads/bon_livraison/' . $purchase->bon_livraison)); ?>"
                                        class="btn btn-primary btn-sm rounded-0" download>
                                        <i class="fa fa-download"></i>
                                    </a>
                                </td>


                            </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>


        <div id="print_area" style="display: none;">

            <h6 class="text-right"> Bon de commande N° BL<?php echo e($purchase->id); ?></h6>

            <br><br><br><br><br><br><br><br><br>
            <br><br>

            <table width='100%'>
                <tr>
                    <td>
                        <div>
                            <h5 class="text-sm"><b>
                                    DE :</b></h5>
                            <h6 class="my__sm__text"><?php echo e($settings['system_name']->option_value); ?></h6>
                            <h6 class="text-sm"><?php echo e($settings['system_address']->option_value); ?></h6>
                            <h6 class="text-sm"><?php echo e($settings['system_phone']->option_value); ?></h6>
                            <h6 class="text-sm"><?php echo e($settings['system_email']->option_value); ?></h6>
                            <h6 class="text-sm"><?php echo e($settings['system_title']->option_value); ?></h6>
                            <h6 class="text-sm"><?php echo e($settings['system_ville']->option_value); ?></h6>
                        </div>
                    </td>
                    <td class="
                        d-flex justify-content-start align-items-start">

                        <div>
                            <h5 class="text-sm"><b>
                                    DÉTAILS DU FOURNISSEUR :</b></h5>
                            <h6 class="text-sm"><?php echo e($fournisseur->name); ?></h6>
                            <h6 class="text-sm"><?php echo e($fournisseur->address); ?></h6>
                            <h6 class="text-sm"><?php echo e($fournisseur->phone); ?></h6>
                            <h6 class="text-sm"><?php echo e($fournisseur->email); ?></h6>
                            <h6 class="text-sm"><?php echo e($fournisseur->ville); ?></h6>
                        </div>
                    </td>
                    <td>
                        <div style="margin-bottom: 90px">
                            <h5 class="text-sm"><b>
                                    DÉTAILS D'ACHAT :</b></h5>
                            <h6 class="text-sm">Numéro de facture: <?php echo e($purchase->id); ?></h6>
                            <h6 class="text-sm">Date d'achat: <?php echo e($purchase->purchase_date); ?></h6>
                            <h6 class="text-sm">Statut d'achat
                                <span class="ml-3">

                                    <?php if($purchase->purchase_status == 0): ?>
                                        <span>En cours
                                        </span>
                                    <?php elseif($purchase->purchase_status == 1): ?>
                                        <span>Envoyé</span>
                                    <?php elseif($purchase->purchase_status == 2): ?>
                                        <span>Payé</span>
                                    <?php elseif($purchase->purchase_status == 3): ?>
                                        <span> Non payé</span>
                                    <?php elseif($purchase->purchase_status == 4): ?>
                                        <span>Livré</span>
                                    <?php endif; ?>
                                </span>
                            </h6>
                        </div>
                    </td>


                </tr>
            </table>

            <h4 class="text-center my-5 text-danger">

                <u>
                    DETAILS DE
                    BON DE COMMANDE</u>
            </h4>

            <div class="table-responsive mt-3">
                <table class="table table-striped ">
                    <thead class="bg-gradient-primary text-light">


                        <tr>
                            <th class="bg-primary border-right w-75">Produit</th>
                            <th class="text-right">Quantité</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $purchase->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="border-right"><?php echo e($item->name); ?></td>
                                <td class="text-right"><?php echo e($item->pivot->quantity); ?></td> 

                                
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4">No items found!</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="absolute b-0 mt-5">
                <table class="table" width='100%'>
                    <tr>
                        <th class="border-right" width='50%'>
                            <h5 class="text-center">
                                <u>Signature de client</u>
                            </h5>
                        </th>
                        <th class="pl-5" width='50%'>
                            <h5 class="text-center">
                                <u>
                                    Signature de fournisseur
                                </u>

                            </h5>

                        </th>
                    </tr>
                    <tr>
                        <td class="border-right h-5">

                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>



        </div>






        <div class="row col-12 d-flex justify-content-end mt-3s">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('print invoice')): ?>
                <button href=""
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm print_prescription"><i
                        class="fas fa-print fa-sm text-white-50"></i> Imprimer</button>
            <?php endif; ?>
            <button class="btn btn-danger btn-sm rounded-0 ml-3 ">
                <a href="<?php echo e(route('purchase.all')); ?>" class="text-light">
                    <i class="fa fa-arrow-left"></i>
                    Retour
                </a>
            </button>
        </div>
    </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script class="text/javascripte">
    function calculateTotal() {
        // Select all elements with class 'total' within the table body
        const totalElements = document.querySelectorAll('.table tbody .total');

        // Use Array.from to convert the NodeList to an array and then use reduce to calculate the sum
        const total = Array.from(totalElements).reduce((acc, element) => {
            // Parse the text content of the element to a float and add it to the accumulator
            return acc + parseFloat(element.textContent || 0);
        }, 0);

        // Update the total span with the calculated total
        document.getElementById('total').textContent = total.toFixed(2);
    }

    // Call the calculateTotal function when the page loads
    document.addEventListener('DOMContentLoaded', calculateTotal);

    function PrintPreview(divName) {

        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
    $(function() {
        $(document).on("click", '.print_prescription', function() {

            PrintPreview('print_area');
            /*
            $('#print_area').printThis({
             importCSS: true,
                    importStyle: true,//thrown in for extra measure
             loadCSS: "<?php echo e(asset('dashboard/css/sb-admin-2.min.css')); ?>",
             pageTitle: "xxx",
             copyTagClasses: true,
              base: true,
              printContainer: true,
              removeInline: false,
            });
            */

        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\MAMP\htdocs\doctor-myclinc.tayssir.cloud\resources\views/purchase/specialty/generalist/view.blade.php ENDPATH**/ ?>