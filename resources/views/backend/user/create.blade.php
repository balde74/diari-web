@extends('layouts.main-layout')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Ajouter un utilisateur</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form data-parsley-validate class="form-horizontal form-label-left" method="POST"
                        action="{{ route('user.store') }}">

                        @csrf

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nom</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="last_name" id="first-name" required="required"
                                    class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                    value="{{ old('last_name') }}">
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Prénom</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="first_name" id="first-name" required="required"
                                    class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                    value="{{ old('first_name') }}">
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">email</label>

                            <div class="col-md-6 col-sm-6 ">
                                <input type="email" name="email" id="first-name" required="required"
                                    class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group item" id="role-group">
                            <label class="control-label col-md-3 col-sm-3 label-align ">Selectionner le rôle </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select id="role_id"
                                    class="select2_single form-control  {{ $errors->has('role_id') ? ' is-invalid' : '' }}"
                                    tabindex="-1" name="role_id" required>
                                    <option value=""></option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-mukted text-info">
                                    * Un administrateur et un directeur de communication ne sont pas affectés à un
                                    district.<br>
                                </small>
                                @if ($errors->has('role_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group item" id="district-group">
                            <label class="control-label col-md-3 col-sm-3 label-align ">Selectionner le district </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select id="district_id"
                                    class="select2_single form-control  {{ $errors->has('district_id') ? ' is-invalid' : '' }}"
                                    tabindex="-1" name="district_id">
                                    <option value=""></option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('district_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('district_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Mot de
                                passe</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="password" name="password" required="required"
                                    class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Confirmer le mot
                                de passe</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control" type="password" name="password_confirmation"
                                    required>
                            </div>

                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class=" btn-sm btn-block btn-success">Enregistrer</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('autres_scripts')
    <script>
        $(document).ready(function() {
            function toggleDistrict() {
                let role = parseInt($('#role_id').val());

                if (role === 1 || role === 2) {
                    $('#district-group').hide();
                    $('#district_id').removeAttr('required');
                } else {
                    $('#district-group').show();
                    $('#district_id').attr('required', 'required');
                }
            }

            $('#role_id').on('change', toggleDistrict);

            // Lancer au chargement si un rôle est déjà sélectionné
            toggleDistrict();
        });
    </script>
@endsection
