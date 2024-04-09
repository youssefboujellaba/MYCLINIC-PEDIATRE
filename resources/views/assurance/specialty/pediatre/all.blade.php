@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-8">
                    <h6 class="m-0 font-weight-bold text-primary w-75 p-2">{{ __('sentence.All assurance') }}</h6>
                </div>
                <div class="col-4">
                    @can('create assurance')
                        <a href="{{ route('assurance.create') }}" class="btn btn-primary btn-sm float-right"><i
                                class="fa fa-plus"></i> {{ __('sentence.Add assurance') }}</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{ __('sentence.assurance_name') }}</th>
                            {{--                  <th>{{ __('sentence.Generic Name') }}</th> --}}
                            {{--                  <th class="text-center">{{ __('sentence.Total Use') }}</th> --}}
                            <th class="text-center">{{ __('sentence.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assurance as $assurance)
                            <tr>
                                <td>{{ $assurance->id }}</td>
                                <td>{{ $assurance->assurance_name }}</td>
                                {{--                  <td>{{ $assurance->generic_name }}</td> --}}
                                {{--                  <td align="center">{{ __('sentence.In Prescription') }} : {{ $assurance->Prescription->count() }} {{ __('sentence.time use') }}</td> --}}
                                <td class="text-center">
                                    @can('edit drug')
                                        <a href="{{ url('assurance/edit/' . $assurance->id) }}"
                                            class="btn btn-outline-warning btn-circle btn-sm"><i class="fa fa-pen"></i></a>
                                    @endcan
                                    @can('delete drug')
                                        <a class="btn btn-outline-danger btn-circle btn-sm" data-toggle="modal"
                                            data-target="#DeleteModal"
                                            data-link="{{ url('assurance/delete/' . $assurance->id) }}"><i
                                                class="fas fa-trash"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
