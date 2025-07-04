@extends('layouts.main-layout')
@section('title')
    Ajouter une page web
@endsection
@section('autres_css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Ajouter une page </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form data-parsley-validate class="form-horizontal form-label-left" method="POST"
                        action="{{ route('page.store') }}">

                        @csrf

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Titre de la
                                page</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" name="title" id="title" required="required"
                                    class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                    value="{{ old('title') }}" autofocus>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Zone parente --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="place">Zone d'affichage</label>
                            
                            <div class="col-md-8 col-sm-8 ">
                                <select id="" class="select2_single form-control  {{ $errors->has('parent_zone') ? ' is-invalid' : '' }}" tabindex="-1" name="parent_zone" >  
                                    <option value="présentation">Présentation</option>
                                    <option value="services">Services</option>
                              </select>
                                @if ($errors->has('parent_zone'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('parent_zone') }}</strong>
                                  </span>
                                @endif
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

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                for="description">Contenu</label>
                            <div class="col-md-8 col-sm-8 ">
                                <textarea name="content" required="required"
                                    class="form-control summernote {{ $errors->has('content') ? ' is-invalid' : '' }}" cols="30" rows="5"
                                    style="resize: none;">{{ old('content') }}</textarea>
                                @if ($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
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
