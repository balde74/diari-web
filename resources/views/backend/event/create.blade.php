@extends('layouts.main-layout')
@section('title') Création d'évenement @endsection
@section('autres_css')
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')

<div class="row">
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Ajouter un évènement</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">

                 @csrf

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Titre de l'évènement</label>
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
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="place">Lieu</label>
                    <div class="col-md-8 col-sm-8 ">
                            <input type="text" name="place" id="place" required="required" class="form-control {{ $errors->has('place') ? ' is-invalid' : '' }}" value="{{ old('place') }}" >
                            @if ($errors->has('place'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('place') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="date">Date</label>
                    <div class="col-md-8 col-sm-8 ">
                            <input type="date" name="date" id="date" required="required" class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" value="{{ old('date') }}" autofocus>
                            @if ($errors->has('date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('date') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                
                @if (Auth::user()->role->id == 1 || Auth::user()->role->id == 2)
                    <div class="form-group item" >
                    <label class="control-label col-md-3 col-sm-3 label-align ">sélectionner le district </label>
                    <div class="col-md-8 col-sm-8 ">
                      <select id="" class="select2_single form-control  {{ $errors->has('district_id') ? ' is-invalid' : '' }}" tabindex="-1" name="district_id" >
                        <option value="" >Général</option>
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
                    <input type="text" value="{{ Auth::user()->district_id }}" name="district_id" class="d-none">
                @endif


                <div class="item form-group">
		   			 <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Image</label>
	   			 	<div class="col-md-8 col-sm-8 ">
				        <div class="custom-file">
				            <input type="file" name="image" class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}" id="validatedCustomFile" value="{{old('image')}}" required>
				            <label class="custom-file-label" for="validatedCustomFile">Choisissez une image representatrice...</label>
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
                        <button type="button" class="btn btn-primary btn-sm mx-auto" data-toggle="modal" data-target="#exampleModalCenter">
                         Supprimer les styles du texte
                        </button>
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description</label>
                    <div class="col-md-8 col-sm-8 ">
                    <textarea name="description" required="required" class="form-control summernote {{ $errors->has('description') ? ' is-invalid' : '' }}" cols="30" rows="5" style="resize: none;" >{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
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