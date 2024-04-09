@extends('layouts.master')

@section('title')
    {{ __('sentence.Edit role') }}
@endsection

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('sentence.Edit role') }}</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('role.store_edit_role') }}">
                        <div class="form-group row">
                            <label for="Name" class="col-sm-3 col-form-label">{{ __('sentence.Name') }}<font
                                    color="red">*</font></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control rounded-0 shadow-none " id="Name"
                                    name="name" value="{{ $role->name }}">
                                <input type="hidden" class="form-control rounded-0 shadow-none " name="role_id"
                                    value="{{ $role->id }}">
                                {{ csrf_field() }}
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="Email" class="col-sm-3 col-form-label">{{ __('sentence.Permissions') }}<font
                                    color="red">*</font></label>
                            <div class="col-sm-9">
                                <select id="example-multiple-selected" multiple="multiple" name="permissions[]">
                                    @forelse($permissions as $permission)
                                        <option value="{{ $permission->name }}"
                                            @if ($role->hasPermissionTo($permission->id)) selected="selected" @endif>
                                            {{ $permission->name }}</option>
                                    @empty
                                    @endforelse

                                </select>
                                <hr>
                                @forelse($role->permissions->pluck('name') as $permission)
                                    <label class="badge badge-success-soft">{{ ucfirst($permission) }}</label>
                                @empty
                                    <label class="badge badge-warning-soft">No permissions for {{ $role->name }}</label>
                                @endforelse
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-9">
                                <button type="submit"
                                    class="btn rounded-0  btn-primary">{{ __('sentence.Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('header')
    <link rel="stylesheet" type="text/css"
        href="https://davidstutz.github.io/bootstrap-multiselect/dist/css/bootstrap-multiselect.css">
@endsection

@section('footer')
    <script type="text/javascript"
        src="https://davidstutz.github.io/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>
    <!-- Initialize the plugin: -->
    <script type="text/javascript">
        $('#example-multiple-selected').multiselect();
    </script>
@endsection
