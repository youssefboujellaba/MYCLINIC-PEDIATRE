@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="post" action="{{ route('patient.store_edit') }}" enctype="multipart/form-data">
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <div class="row">
                        <div class="col-8">
                            <h6 class="m-0 font-weight-bold text-primary">Modifier fiche patient</h6>
                        </div>
                        <div class="col-4">
                            @can('view patient')
                                <button type="submit" class="btn btn-primary btn-sm float-right rounded-0"
                                    style="margin-left: 15px;">{{ __('sentence.Save') }}</button>
                                <a href="{{ route('patient.view', ['id' => $patient->id]) }}"
                                    class="btn btn-success btn-sm float-right rounded-0">Afichier dossier patient</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="my__label">{{ __('sentence.Full Name') }}<font
                                        color="red">*</font></label>
                                <input type="text" class="form-control  rounded-0 shadow-none" id="Name"
                                    name="name" value="{{ $patient->name }}">
                                <input type="hidden" class="form-control rounded-0 shadow-none" name="user_id"
                                    value="{{ $patient->id }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputAddress">{{ __('sentence.Birthday') }}<font color="red">*</font></label>
                                <input type="date" class="form-control  rounded-0 shadow-none" id="Birthday"
                                    name="birthday" autocomplete="off" value="{{ $patient->Patient->birthday }}">
                            </div>


                            <div class="form-group col-md-4 mb-4">
                                <label for="inputCity">{{ __('sentence.Gender') }}<font color="red">*</font></label>
                                <select class="form-control  rounded-0 shadow-none" name="gender" id="Gender">
                                    <option value="{{ $patient->Patient->gender }}" selected="selected">
                                        {{ $patient->Patient->gender }}</option>
                                    <option value="Garçon">Garçon</option>
                                    <option value="Fille">Fille</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            {{--                    <div class="form-group col-md-6"> --}}
                            {{--                        <label for="inputAddress2">{{ __('sentence.Patient Weight') }}</label> --}}
                            {{--                        <input type="text" class="form-control" id="Weight" name="weight" value="{{ $patient->Patient->weight }}"> --}}
                            {{--                    </div> --}}
                            {{--                    <div class="form-group col-md-6"> --}}
                            {{--                        <label for="inputAddress">{{ __('sentence.Patient Height') }}<font color="red">*</font></label> --}}
                            {{--                        <input type="text" class="form-control" id="height" name="height" value="{{ $patient->Patient->height }}"> --}}
                            {{--                    </div> --}}

                        </div>

                        <div class="mb-4">
                            <h3 class="display-6">Informations supplementaires</h3>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputZip">{{ __('sentence.Blood Group') }}</label>
                                    <select class="form-control  rounded-0 shadow-none" name="blood" id="Blood">
                                        <option value="{{ $patient->Patient->blood }}" selected="selected">
                                            {{ $patient->Patient->blood }}</option>
                                        <option value="Unknown">{{ __('sentence.Unknown') }}</option>
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
                                    <label for="inputState">{{ __('sentence.Image') }}</label>
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
                                        name="nbenfant" value="{{ $patient->Patient->nbenfant }}">
                                </div> -->
                                
                                <div class="form-group col-md-3">
                                    <label for="nomPere" class="my__label">Nom du pére
                                    </label>
                                    <input type="text" class="form-control shadow-none my__field__input rounded-0"
                                        id="nomPere" name="nomPere" value="{{ $patient->Patient->nomPere }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="professionPere" class="my__label">Prefession du pére
                                    </label>
                                    <input type="text" class="form-control shadow-none my__field__input rounded-0"
                                        id="professionPere" name="professionPere" value="{{ $patient->Patient->professionPere }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nomMere" class="my__label">Nom de la mére
                                    </label>
                                    <input type="text" class="form-control shadow-none my__field__input rounded-0"
                                        id="nomMere" name="nomMere" value="{{ $patient->Patient->nomMere }}">
                                </div>
                                <div class="form-group col-md-3">
                                <label for="professionMere" class="my__label">Profession de la mére
                                    </label>
                                    <input type="text" class="form-control shadow-none my__field__input rounded-0"
                                        id="professionMere" name="professionMere" value="{{ $patient->Patient->professionMere }}">
                                </div>
                                {{--                        <div class="form-group col-md-3"> --}}
                                {{--                            <label for="inputAddress">{{ __('sentence.Profession') }}</label> --}}
                                {{--                            <input type="text" class="form-control" id="profession" name="profession" value="{{ $patient->Patient->profession }}"> --}}
                                {{--                        </div> --}}
                                <div class="form-group col-md-4">
                                    <label for="inputAddress">CIN</label>
                                    <input type="text" class="form-control  rounded-0 shadow-none" id="cin"
                                        name="cin" autocomplete="off" value="{{ $patient->Patient->cin }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputZip">Assurance</label>
                                    <select class="form-control" name="assurance" id="assurance">
                                        <option value="{{ $patient->Patient->assurance }}">
                                            {{ $patient->Patient->assurance }}</option>
                                        @foreach ($assurances as $assurance)
                                            <option value="{{ $assurance->assurance_name }}">
                                                {{ $assurance->assurance_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{--                    <div><label>Situation familiale</label></div> --}}

                        {{--                    <div class="form-check form-check-inline"> --}}
                        {{--                        <input class="form-check-input" type="radio" name="Situation" id="Situation1" value="Celibataire"> --}}
                        {{--                        <label class="form-check-label" for="inlineRadio1">Célibataire</label> --}}
                        {{--                    </div> --}}
                        {{--                    <div class="form-check form-check-inline"> --}}
                        {{--                        <input class="form-check-input" type="radio" name="Situation" id="Situation2" value="Marie"> --}}
                        {{--                        <label class="form-check-label" for="inlineRadio2">Marié(e)</label> --}}
                        {{--                    </div> --}}
                        {{--                    <div class="form-check form-check-inline"> --}}
                        {{--                        <input class="form-check-input" type="radio" name="Situation" id="Situation3" value="Divorce" > --}}
                        {{--                        <label class="form-check-label" for="inlineRadio3">Divorcé(e)</label> --}}
                        {{--                    </div> --}}
                        {{--                    <div class="form-check form-check-inline"> --}}
                        {{--                        <input class="form-check-input" type="radio" name="Situation" id="Situation4" value="veuve" > --}}
                        {{--                        <label class="form-check-label" for="inlineRadio3">veuve/veuf</label> --}}
                        {{--                    </div> --}}



                        <div class="mb-4">
                            <h3 class="scheduler-border">Adresse et contact</h3>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">{{ __('sentence.Address') }}</label>
                                    <input type="text" class="form-control  rounded-0 shadow-none" id="Address"
                                        name="adress" value="{{ $patient->Patient->adress }}">
                                </div>

                                {{--                        <div class="form-group col-md-3"> --}}
                                {{--                            <label for="inputAddress2">{{ __('sentence.Province') }}</label> --}}
                                {{--                            <input type="text" class="form-control" id="Province" name="Province" value="{{ $patient->Patient->province }}"> --}}
                                {{--                        </div> --}}
                                {{--                        <div class="form-group col-md-3"> --}}
                                {{--                            <label for="inputAddress2">{{ __('sentence.Code postal') }}</label> --}}
                                {{--                            <input type="text" class="form-control" id="postal" name="postal" value="{{ $patient->Patient->postal }}"> --}}
                                {{--                        </div> --}}
                                <div class="form-group col-md-3">
                                    <label for="inputAddress2">{{ __('sentence.Ville') }}</label>
                                    <input type="text" class="form-control  rounded-0 shadow-none" id="Ville"
                                        name="Ville" value="{{ $patient->Patient->ville }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputAddress2">{{ __('sentence.Pays') }}</label>
                                    <input type="text" class="form-control  rounded-0 shadow-none" id="Pays"
                                        name="Pays" value="Maroc" value="{{ $patient->Patient->pays }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">{{ __('sentence.Email Adress') }}</label>
                                    <input type="email" class="form-control  rounded-0 shadow-none" id="Email"
                                        name="email" value="{{ $patient->email }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputAddress2">{{ __('sentence.Phone') }}</label>
                                    <input type="text" class="form-control  rounded-0 shadow-none" id="Phone"
                                        name="phone" value="{{ $patient->Patient->phone }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputAddress2">{{ __('sentence.fixe') }}</label>
                                    <input type="text" class="form-control  rounded-0 shadow-none" id="fixe"
                                        name="fixe" value="{{ $patient->Patient->fixe }}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h3>Observation</h3>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputAddress2">Observation</label>
                                    <textarea class="form-control  rounded-0 shadow-none" id="historiquemaladie" name="historiquemaladie"> {{ $patient->Patient->historiquemaladie }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="d-flex justify-content-end col-12">
                                <button type="submit"
                                    class="btn btn-primary rounded-0">{{ __('sentence.Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('header')
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
@endsection
@section('footer')
@endsection
