@extends('layouts.main-layout')
@section('title')
Modifier un personnel
@endsection

@section('autres_css')
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="row">
<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2>Modifier un personnel</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br />

			 <div class="col-md-2">
                @if($staff->image)
                <img src="{{ asset('documents/'.$staff->image) }}" alt="image de presentation" width="100%">
				@else
				<span class="text-warning">Aucune image</span>
                @endif
            </div>

			<form data-parsley-validate class="form-horizontal form-label-left col-md-10" method="POST" action="{{ route('staff.update',$staff->id) }}" enctype="multipart/form-data">

			@csrf
			@method('PUT')

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Nom et Prénoms</label>
					<div class="col-md-9 col-sm-8 ">
					<input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name')??$staff->name }}"  autocomplete="off">
					@if ($errors->has('name'))
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $errors->first('name') }}</strong>
	                    </span>
	                @endif
					</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email</label>
					<div class="col-md-9 col-sm-8 ">
					<input type="text" name="email" id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email')??$staff->email }}">
					@if ($errors->has('email'))
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $errors->first('email') }}</strong>
	                    </span>
	                @endif
					</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="position">Poste Occupé</label>
					<div class="col-md-9 col-sm-8 ">
					<input type="text" name="position" id="position" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" value="{{ old('position')??$staff->position }}" autocomplete="on">
					@if ($errors->has('position'))
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $errors->first('position') }}</strong>
	                    </span>
	                @endif
					</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="department">Département</label>
					<div class="col-md-9 col-sm-8 ">
					<input type="text" name="department" id="department" class="form-control {{ $errors->has('department') ? ' is-invalid' : '' }}" value="{{ old('department')??$staff->department }}" autocomplete="on">
					@if ($errors->has('department'))
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $errors->first('department') }}</strong>
	                    </span>
	                @endif
					</div>
				</div>

				<div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="date">Date de début</label>
                    <div class="col-md-9 col-sm-8 ">
                            <input type="month" name="start_date" id="start_date" required="required" class="form-control {{ $errors->has('start_date') ? ' is-invalid' : '' }}" value="{{ old('start_date')?? \Carbon\Carbon::parse($staff->start_date)->format('Y-m') }}">
                            @if ($errors->has('start_date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('start_date') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                
                @if (Auth::user()->role->id == 1)
				<div class="form-group item" >
                    <label class="control-label col-md-3 col-sm-3 label-align ">sélectionner le district </label>
                    <div class="col-md-9 col-sm-8 ">
                        <select id="" class="select2_single form-control  {{ $errors->has('district_id') ? ' is-invalid' : '' }}" tabindex="-1" name="district_id" >
                            <option value="" >Général</option>
                            @foreach ($districts as $district)
                            <option value="{{ $district->id }}" @if ($district->id == $staff->district_id)
                                selected @endif
                                >{{ $district->name }}</option>
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


                {{-- <div class="item form-group">
                    <div class="col-md-6 col-sm-8 mx-auto mt-2">
                                <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm mx-auto" data-toggle="modal" data-target="#exampleModalCenter">
                         Supprimer les styles du texte
                        </button>
                    </div>
                </div> --}}

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Bibliographie</label>
					<div class="col-md-9 col-sm-8 ">
					<textarea name="bio" required="required" class="form-control {{ $errors->has('bio') ? ' is-invalid' : '' }}" cols="30" rows="5"  
						>{{ old('bio')??$staff->bio }}</textarea>
					@if ($errors->has('bio'))
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $errors->first('bio') }}</strong>
	                    </span>
	                @endif
					</div>
				</div>


				<div class="item form-group">
			   			 <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Image</label>
		   			 	<div class="col-md-9 col-sm-8 ">
					        <div class="custom-file">
					            <input type="file" name="image"  class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}" id="validatedCustomFile" value="{{old('image')}}" >
					            <label class="custom-file-label" for="validatedCustomFile">Choisissez une image representatrice...</label>
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
					<div class="col-md-9 col-sm-8 offset-md-3">
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