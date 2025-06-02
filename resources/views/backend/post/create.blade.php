@extends('layouts.main-layout')
@section('title')
Publier un article
@endsection
@section('autres_css')
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')

<div class="row">
<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2>Publier un article</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br />
			<form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">

			@csrf

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Titre</label>
					<div class="col-md-8 col-sm-8 ">
					<input type="text" name="title" id="title" required="required" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}" autofocus>
					@if ($errors->has('title'))
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $errors->first('title') }}</strong>
	                    </span>
	                @endif
					</div>
				</div>

				 {{-- <div class="item form-group">
                    <div class="col-md-6 col-sm-8 mx-auto mt-2">
                                <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm mx-auto" data-toggle="modal" data-target="#exampleModalCenter">
                         Supprimer les styles du texte
                        </button>
                    </div>
                </div> --}}
                
				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" >Introduction</label>
					<div class="col-md-8 col-sm-8 ">
					<textarea name="introduction" required="required" class="form-control summernote {{ $errors->has('introduction') ? ' is-invalid' : '' }}" cols="30" rows="5"  
						>{{ old('introduction') }}</textarea>
						<small class="text-info">Donnez une petite introduction à l'article </small>
					@if ($errors->has('introduction'))
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $errors->first('introduction') }}</strong>
	                    </span>
	                @endif
					</div>
				</div>
				
				<div class="item form-group">
			   			 <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Image de l'article</label>
		   			 	<div class="col-md-8 col-sm-8 ">
					        <div class="custom-file">
					            <input type="file" name="image" required class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}" id="validatedCustomFile" value="{{old('image')}}" >
					            <label class="custom-file-label" for="validatedCustomFile">Choisissez une image representatrice...</label>
					            @if ($errors->has('image'))
					                <span class="invalid-feedback" role="alert">
					                    <strong>{{ $errors->first('image') }}</strong>
					                </span>
					            @endif
				          	</div>
			          	</div>
				</div>
				@if (Auth::user()->role->id == 1 || Auth::user()->role->id == 2)
					<div class="form-group item" >
		            <label class="control-label col-md-3 col-sm-3 label-align ">Sélectionner le district </label>
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