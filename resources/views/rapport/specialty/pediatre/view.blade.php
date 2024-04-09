@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rapport</title>
    </head>

    <body>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('sentence.Patient informations') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="PatientID">{{ __('sentence.Patient') }} :</label>
                            <select class="form-control multiselect-doctorino" name="user_id" id="PatientID" disabled>
                                @foreach ($rapports as $rapport)
                                    <option value="">
                                        {{ $rapport->child }}
                                    </option>
                            </select>
                            {{ csrf_field() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
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
                                        <button href=""
                                            class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm print_ordanance_ropos"><i
                                                class="fas fa-print fa-sm text-white-50"></i> Imprimer</button>
                                        <div class="row">
                                            <div class="col">
                                                <h3
                                                    style="text-align: center; position: absolute; top: 35%; left: 50%; transform: translate(-50%, -50%);">
                                                    Certificat (Ropos)</h3>
                                                <br>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="col"
                                            style="font-size: large; margin-left: 25px; margin-right: 25px;">
                                            <p style="float: right;">{{ App\Setting::get_option('ville') }}
                                                ,{{ __('sentence.On') }} :{{ $rapport->created_at->format('d-m-Y') }}</p>
                                        </div>
                                        <div class="row justify-content-center" style="margin-top: 100px;">
                                            <div class="col">
                                                @foreach ($settings as $setting)
                                                    Je soussigne <strong>{{ $setting->option_value }}</strong> <br><br>
                                                @endforeach
                                                Que l'état de santé de l'enfant <strong>{{ $rapport->child }}</strong> <br>
                                                <br>
                                                Nécessite un repos de <b>{{ $rapport->nb_jour }}</b> jours
                                                à partir du <b>{{ $rapport->date_debut }}</b>
                                                @endforeach
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
                                        <button href=""
                                            class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm print_ordanance_tuteur"><i
                                                class="fas fa-print fa-sm text-white-50"></i> Imprimer</button>
                                        <div class="row">
                                            <div class="col">
                                                <h3
                                                    style="text-align: center; position: absolute; top: 35%; left: 50%; transform: translate(-50%, -50%);">
                                                    Certificat (tuteur)</h3>
                                                <br>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="col"
                                            style="font-size: large; margin-left: 25px; margin-right: 25px;">
                                            <p style="float: right;">{{ App\Setting::get_option('ville') }}
                                                ,{{ __('sentence.On') }} :{{ $rapport->created_at->format('d-m-Y') }}</p>
                                        </div>
                                        <div class="row justify-content-center" style="margin-top: 100px;">
                                            <div class="col">
                                                @foreach ($settings as $setting)
                                                    Je soussigne <strong>{{ $setting->option_value }}</strong> <br><br>
                                                @endforeach
                                                @foreach ($rapports as $rapport)
                                                    Que l'état de santé de l'enfant <strong>{{ $rapport->child }}</strong>
                                                    <br> <br>
                                                    Nécessite la présence de <b>{{ $rapport->tuteur }}</b> Auprès de lui
                                                    pendant <b> {{ $rapport->nb_jour1 }}</b> jours
                                                    à partir du <b>{{ $rapport->date_debut }}</b>
                                                @endforeach
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


                    <div id="print_ecole">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <button href=""
                                            class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm print_ordanance_ecole"><i
                                                class="fas fa-print fa-sm text-white-50"></i> Imprimer</button>
                                        <div class="row">
                                            <div class="col">
                                                <h3
                                                    style="text-align: center; position: absolute; top: 35%; left: 50%; transform: translate(-50%, -50%);">
                                                    Certificat (ecole)</h3>
                                                <br>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="col"
                                            style="font-size: large; margin-left: 25px; margin-right: 25px;">
                                            <p style="float: right;">{{ App\Setting::get_option('ville') }}
                                                ,{{ __('sentence.On') }} :{{ $rapport->created_at->format('d-m-Y') }}</p>
                                        </div>
                                        <div class="row justify-content-center" style="margin-top: 100px;">
                                            <div class="col">
                                                @foreach ($settings as $setting)
                                                    Je soussigne <strong>{{ $setting->option_value }}</strong> <br><br>
                                                @endforeach
                                                @foreach ($rapports as $rapport)
                                                    Que <strong> {{ $rapport->child }} </strong>est en bonne santé
                                                    et peut intègrer la crèche sans aucun soucis
                                                @endforeach
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
                                        <button href=""
                                            class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm print_ordanance_libre"><i
                                                class="fas fa-print fa-sm text-white-50"></i> Imprimer</button>
                                        <div class="row">
                                            <div class="col">
                                                <h3
                                                    style="text-align: center; position: absolute; top: 35%; left: 50%; transform: translate(-50%, -50%);">
                                                    Certificat (libre)</h3>
                                                <br>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center" style="margin-top: 100px;">
                                            <div class="col">
                                                @foreach ($rapports as $rapport)
                                                    {!! $rapport->libre !!}
                                                @endforeach
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
                    <div id="print_ordanance_libre" style="display: none;">
                        <div class="row justify-content">
                            <div class="col-12">
                                <div class="card-body">
                                    <!-- ROW: Doctor informations -->
                                    <div class="row">
                                        <div class="col text">
                                            <br><br><br>
                                            <br><br><br>
                                            <br><br><br>
                                            @foreach ($rapports as $rapport)
                                                <div class="row">
                                                    <div class="col"
                                                        style="font-size: xx-large; margin-left: 25px; margin-right: 25px;">
                                                        <p>
                                                            <b style="float: right;">{{ App\Setting::get_option('ville') }}
                                                                ,{{ __('sentence.On') }} :
                                                                {{ $rapport->created_at->format('d-m-Y') }}</b>
                                                        </p>
                                                        <br>
                                                    </div>
                                                </div>

                                        </div>
                                    </div><br><br><br>
                                    <div class="row mt-100" style="font-size: xx-large">
                                        <div class="col">
                                            <p style="font-size: xxx-large">{!! $rapport->libre !!}</p>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="print_ordanance_ecole" style="display: none;">
                        <div class="row justify-content">
                            <div class="col-12">
                                <div class="card-body">
                                    <!-- ROW: Doctor informations -->
                                    <div class="row">
                                        <div class="col text">
                                            <br><br><br>
                                            <br><br><br>
                                            <br><br><br>
                                            <div class="row">
                                                <div class="col"
                                                    style="font-size: xx-large; margin-left: 25px; margin-right: 25px;">
                                                    <p>
                                                        <b style="float: right;">{{ App\Setting::get_option('ville') }}
                                                            ,{{ __('sentence.On') }}
                                                            :{{ $rapport->created_at->format('d-m-Y') }}</b>
                                                    </p>
                                                </div>
                                            </div>
                                            <br><br><br>
                                            <div class="d-flex justify-content-center" style="font-size: 72px;">Certificat
                                            </div>
                                        </div>
                                    </div>
                                    <br><br><br>
                                    <div class="row mt-100" style="font-size: x-large">
                                        <div class="col" style="font-size: xx-large">
                                            @foreach ($settings as $setting)
                                                <p> Je soussigne <strong>{{ $setting->option_value }}</strong> </p> <br>
                                            @endforeach
                                            @foreach ($rapports as $rapport)
                                                <p> Que l'enfant <strong>{{ $rapport->child }}</strong></p> <br> est en
                                                bonne santé
                                                et peut intègrer la crèche sans aucun soucis
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="print_ordanance_tuteur" style="display: none;">
                        <div class="row justify-content">
                            <div class="col-12">
                                <div class="card-body">
                                    <!-- ROW: Doctor informations -->
                                    <div class="row">
                                        <div class="col text">
                                            <br><br><br>
                                            <br><br><br>
                                            <br><br><br>
                                            <div class="row">
                                                <div class="col"
                                                    style="font-size: xx-large; margin-left: 25px; margin-right: 25px;">
                                                    <p>
                                                        <b style="float: right;">{{ App\Setting::get_option('ville') }}
                                                            ,{{ __('sentence.On') }}
                                                            :{{ $rapport->created_at->format('d-m-Y') }}</b>
                                                    </p>
                                                </div>
                                            </div>
                                            <br><br><br>
                                            <div class="d-flex justify-content-center" style="font-size: 72px;">Certificat
                                            </div>

                                        </div>
                                    </div><br><br><br>
                                    <div class="row mt-100" style="font-size: x-large">
                                        <div class="col" style="font-size: xx-large">
                                            @foreach ($settings as $setting)
                                                <p>Je soussigne <strong>{{ $setting->option_value }}</strong></p><br>
                                            @endforeach
                                            @foreach ($rapports as $rapport)
                                                <p>Que l'état de santé de l'enfant <strong>{{ $rapport->child }}</strong>
                                                </p> <br>
                                                <p> Nécessite la présence de <b>{{ $rapport->tuteur }}</b> </p> <br> Auprès
                                                de lui pendant <b> {{ $rapport->nb_jour1 }}</b> jours
                                                à partir du <b>{{ $rapport->date_debut }}</b>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="print_ordanance_ropos" style="display: none;">
                        <div class="row justify-content">
                            <div class="col-12">
                                <div class="card-body">
                                    <!-- ROW: Doctor informations -->
                                    <div class="row">
                                        <div class="col text">
                                            <br><br><br>
                                            <br><br><br>
                                            <br><br><br>
                                            <div class="row">
                                                <div class="col"
                                                    style="font-size: xx-large; margin-left: 25px; margin-right: 25px;">
                                                    <p>
                                                        <b style="float: right;">{{ App\Setting::get_option('ville') }}
                                                            ,{{ __('sentence.On') }}
                                                            :{{ $rapport->created_at->format('d-m-Y') }}</b>
                                                    </p>
                                                </div>
                                            </div>
                                            <br><br><br>
                                            <div class="d-flex justify-content-center" style="font-size: 72px;">Certificat
                                            </div>
                                        </div>
                                    </div><br><br><br>
                                    <div class="col" style="font-size: xx-large">
                                        @foreach ($settings as $setting)
                                            Je soussigne <strong> {{ $setting->option_value }}</strong><br><br>
                                        @endforeach
                                        Que l'état de santé de l'enfant <strong>{{ $rapport->child }}</strong> <br> <br>
                                        Nécessite un repos de <b>{{ $rapport->nb_jour }}</b> jours
                                        à partir du <b>{{ $rapport->date_debut }}</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </body>

    </html>
@endsection

@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var labelValue = "{{ $label }}";

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

    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
        $(function() {
            $(document).on('click', '.print_ordanance_libre', function() {
                printDiv('print_ordanance_libre');
            })
        })
        $(function() {
            $(document).on("click", '.print_ordanance_ropos', function() {
                printDiv('print_ordanance_ropos');
            });
            $(function() {
                $(document).on("click", '.print_ordanance_tuteur', function() {
                    printDiv('print_ordanance_tuteur')
                })
            })
            $(function() {
                $(document).on("click", '.print_ordanance_ecole', function() {
                    printDiv('print_ordanance_ecole')
                })
            })
        });
    </script>
@endsection

@section('header')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
