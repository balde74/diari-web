@extends('layouts.main-layout')
@section('title')
Modifier le mot du maire
@endsection
@section('autres_css')
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')

<div class="row">
<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2>Modification de mot du maire</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br />
            @if ($mayorImage)
            <div class="col-md-2">
               @if($mayorImage)
               <img src="{{ asset('documents/'.$mayorImage) }}" alt="image du maire" width="100%" class="shadow">
               @endif
           </div>
            @endif

			<p></p>
			<form data-parsley-validate class="form-horizontal form-label-left col-md-10" method="POST" action="{{ route('mayor_message.update') }}" enctype="multipart/form-data">

			@csrf
			@method('PUT')

				<div class="item form-group">
			   			 <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Image du maire</label>
		   			 	<div class="col-md-9 col-sm-9 ">
					        <div class="custom-file">
					            <input type="file" name="image" class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}" id="validatedCustomFile" value="{{old('image')}}" >
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
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Contenu</label>
					<div class="col-md-9 col-sm-9 ">
					<textarea name="value" required="required" class="form-control summernote {{ $errors->has('value') ? ' is-invalid' : '' }}" cols="30" rows="10">
							{{ old('value')??$mayorMessage }}
						</textarea>
					@if ($errors->has('value'))
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $errors->first('value') }}</strong>
	                    </span>
	                @endif
					</div>
				</div>
				
				<div class="ln_solid"></div>
				<div class="item form-group">
					<div class="col-md-9 col-sm-9 offset-md-3">
						<button type="submit" class=" btn-sm btn-block btn-success" 
						{{-- onclick="activation()" --}}
						>Enregistrer</button>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>
</div>


@endsection

@section('autres_scripts')
{{-- summernote --}}
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
 <script src="{{ asset('template/vendors/summernote/lang/summernote-fr-FR.js') }}"></script>
 <script src="{{ asset('template/vendors/summernote/initialisation.js') }}"></script>

{{-- activation du select --}}


@endsection
