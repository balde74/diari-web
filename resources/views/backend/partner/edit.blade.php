@extends('layouts.main-layout')
@section('title')
Modifier un partenaire
@endsection

@section('content')

<div class="row">
<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2>Modifier un partenaire</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br />

			 <div class="col-md-2">
                @if($partner->image)
                <img src="{{ asset('documents/'.$partner->image) }}" alt="image de presentation" width="100%">
                @endif
            </div>

			<form data-parsley-validate class="form-horizontal form-label-left col-md-10" method="POST" action="{{ route('partner.update',$partner->id) }}" enctype="multipart/form-data">

			@csrf
			@method('PUT')

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Nom</label>
					<div class="col-md-8 col-sm-8 ">
					<input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name')??$partner->name }}" autofocus autocomplete="off">
					@if ($errors->has('name'))
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $errors->first('name') }}</strong>
	                    </span>
	                @endif
					</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="acronym">Acronyme</label>
					<div class="col-md-8 col-sm-8 ">
					<input type="text" name="acronym" id="acronym" class="form-control {{ $errors->has('acronym') ? ' is-invalid' : '' }}" value="{{ old('acronym')??$partner->acronym }}" autocomplete="off">
					@if ($errors->has('acronym'))
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $errors->first('acronym') }}</strong>
	                    </span>
	                @endif
					</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="link">Lien</label>
					<div class="col-md-8 col-sm-8 ">
					<input type="url" name="link" id="link" class="form-control {{ $errors->has('link') ? ' is-invalid' : '' }}" value="{{ old('link')??$partner->link }}" autocomplete="off">
					@if ($errors->has('link'))
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $errors->first('link') }}</strong>
	                    </span>
	                @endif
					</div>
				</div>



				<div class="item form-group">
			   			 <label class="col-form-label col-md-3 col-sm-3 label-align" >Image / logo</label>
		   			 	<div class="col-md-8 col-sm-8 ">
					        <div class="custom-file">
					            <input type="file" name="image" class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}" id="validatedCustomFile" value="{{old('image')}}" >
					            <label class="custom-file-label" for="validatedCustomFile">Choisissez une image representatrice / logo...</label>
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

@section('autres_scripts')
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
 <script src="{{ asset('backend/vendors/summernote/lang/summernote-fr-FR.js') }}"></script>
 <script src="{{ asset('backend/vendors/summernote/initialisation.js') }}"></script>
@endsection