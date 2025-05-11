@extends('layouts.main-layout')
@section('title') Modification de district @endsection
@section('autres_css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')

<div class="row">
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Modifier un district </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('district.update',$district->id) }}" >

                 @csrf
                 @method('PUT')

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nom du district</label>
                    <div class="col-md-8 col-sm-8 ">
                            <input type="text" name="name" id="first-name" required="required" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name')??$district->name }}" autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>

                <div class="item form-group">
                    <div class="col-md-6 col-sm-8 mx-auto mt-2">
                                <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm mx-auto" data-toggle="modal" data-target="#exampleModalCenter">
                         Supprimer les styles du texte
                        </button>
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Présentation </label>
                    <div class="col-md-8 col-sm-8 ">
                    <textarea name="presentation" required="required" class="form-control summernote {{ $errors->has('presentation') ? ' is-invalid' : '' }}" cols="30" rows="5" style="resize: none;" >{{ old('presentation')??$district->presentation }}</textarea>
                        @if ($errors->has('presentation'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('presentation') }}</strong>
                            </span>
                        @endif
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