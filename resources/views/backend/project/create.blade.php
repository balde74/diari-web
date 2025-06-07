@extends('layouts.main-layout')
@section('title')
    Ajouter un projet
@endsection
@section('autres_css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Ajouter un projet</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form data-parsley-validate class="form-horizontal form-label-left" method="POST"
                        action="{{ route('project.store') }}" enctype="multipart/form-data">

                        @csrf

                        {{-- Titre --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Titre</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" name="title" id="title" required
                                    class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Date de début --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="start_date">Date de
                                début</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="date" name="start_date" id="start_date"
                                    class="form-control {{ $errors->has('start_date') ? ' is-invalid' : '' }}"
                                    value="{{ old('start_date') }}" required>
                                @error('start_date')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Date de fin --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="end_date">Date de fin</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="date" name="end_date" id="end_date"
                                    class="form-control {{ $errors->has('end_date') ? ' is-invalid' : '' }}"
                                    value="{{ old('end_date') }}" required>
                                @error('end_date')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Statut --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="status">Statut</label>
                            <div class="col-md-8 col-sm-8">
                                <select name="status" id="status"
                                    class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" required>
                                    <option value="prévu" {{ old('status') == 'prévu' ? 'selected' : '' }}>Prévu</option>
                                    <option value="en cours" {{ old('status') == 'en cours' ? 'selected' : '' }}>En cours
                                    </option>
                                    <option value="terminé" {{ old('status') == 'terminé' ? 'selected' : '' }}>Terminé
                                    </option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Budget --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="budget">Budget (GNF)</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="number" step="0.01" name="budget" id="budget"
                                    class="form-control {{ $errors->has('budget') ? ' is-invalid' : '' }}"
                                    value="{{ old('budget') }}">
                                @error('budget')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>



                        <div class="item form-group mb-sm-2">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Image du
                                projet</label>
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

                        <div class="item form-group">
                            <div class="col-md-6 col-sm-8 mx-auto mt-2">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm mx-auto" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                    Supprimer les styles du texte
                                </button>
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                for="description">Description</label>
                            <div class="col-md-8 col-sm-8">
                                <textarea name="description" id="description"
                                    class="form-control summernote {{ $errors->has('description') ? ' is-invalid' : '' }}" cols="30"
                                    rows="10" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
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

@section('autres_scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="{{ asset('template/vendors/summernote/lang/summernote-fr-FR.js') }}"></script>
    <script src="{{ asset('template/vendors/summernote/initialisation.js') }}"></script>
@endsection
