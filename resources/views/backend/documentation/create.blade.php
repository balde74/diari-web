@extends('layouts.main-layout')

@section('title') Ajout d'un document @endsection
@section('autres_css')
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')

<div class="row">
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Ajouter un document</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('documentation.store') }}" enctype="multipart/form-data">

                 @csrf

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Titre du document</label>
                    <div class="col-md-8 col-sm-8 ">
                            <input type="text" name="title" id="title" required="required" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}" autofocus>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description</label>
                    <div class="col-md-8 col-sm-8 ">
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"></textarea>
                        <small class="text-info">Donnez une description du document en quelques mots...</small>
                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="item form-group">
                         <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Fichier </label>
                        <div class="col-md-8 col-sm-8 ">
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input {{ $errors->has('file') ? ' is-invalid' : '' }}" id="validatedCustomFile" value="{{old('file')}}" accept=".pdf" >
                                <label class="custom-file-label" for="validatedCustomFile">Choisissez un file PDF</label>
                                @if ($errors->has('file'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('file') }}</strong>
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

@section('autres_scripts')
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
 <script src="{{ asset('backend/vendors/summernote/lang/summernote-fr-FR.js') }}"></script>
 <script src="{{ asset('backend/vendors/summernote/initialisation.js') }}"></script>
@endsection

