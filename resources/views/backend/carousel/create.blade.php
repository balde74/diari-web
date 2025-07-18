@extends('layouts.main-layout')
@section('title')
    Ajouter une image
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Ajouter une image</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form data-parsley-validate class="form-horizontal form-label-left" method="POST"
                        action="{{ route('carousel.store') }}" enctype="multipart/form-data">

                        @csrf


                        {{-- <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Titre de l'article</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" name="titre" id="first-name"
                                    class="form-control {{ $errors->has('titre') ? ' is-invalid' : '' }}"
                                    value="{{ old('titre') }}" autofocus autocomplete="off" >
                                @if ($errors->has('titre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('titre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" name="description" id="description"
                                    class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                    value="{{ old('description') }}"  autocomplete="off" required>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="link">Lien </label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="url" name="link" id="link"
                                    class="form-control {{ $errors->has('link') ? ' is-invalid' : '' }}"
                                    value="{{ old('link') }}"  autocomplete="off" >
                                <small class="text-info">Ajouter un lien si l'image peut être associée à un article existant</small>
                                @if ($errors->has('link'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if (Auth::user()->role->id == 1 || Auth::user()->role->id == 2)
                            <div class="form-group item">
                                <label class="control-label col-md-3 col-sm-3 label-align ">Sélectionner le district
                                </label>
                                <div class="col-md-8 col-sm-8 ">
                                    <select id=""
                                        class="select2_single form-control  {{ $errors->has('district_id') ? ' is-invalid' : '' }}"
                                        tabindex="-1" name="district_id">
                                        <option value="">General</option>
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
                        @else
                            <input type="text" value="{{ Auth::user()->district_id }}" name="district_id"
                                class="d-none">
                        @endif



                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Image</label>
                            <div class="col-md-8 col-sm-8 ">
                                <div class="custom-file">
                                    <input type="file" name="image" required
                                        class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}"
                                        id="validatedCustomFile" value="{{ old('image') }}">
                                    <label class="custom-file-label" for="validatedCustomFile">Choisissez une image
                                        representatrice...</label>
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-8 col-sm-8 offset-md-3">
                                <button type="submit" class=" btn-sm btn-block btn-success">Enregistrer</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

