@extends('layouts.main-layout')
@section('title') Modification d'évènement @endsection
@section('autres_css')
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')

<div class="row">
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Modification d'un évènement</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />

            <div class="col-md-2">
                @if($event->image)
                <img src="{{ asset('documents/'.$event->image) }}" alt="image de presentation" width="100%">
                @endif
            </div>
            <form data-parsley-validate class="form-horizontal form-label-left col-md-10" method="POST" action="{{ route('event.update',$event->id) }}" enctype="multipart/form-data">

                 @csrf
                 @method('PUT')

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Titre de l'évènement</label>
                    <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="title" id="title" required="required" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title')??$event->title }}" autofocus>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="place">Lieu</label>
                    <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="place" id="palce" required="required" class="form-control {{ $errors->has('place') ? ' is-invalid' : '' }}" value="{{ old('place')??$event->place }}" >
                            @if ($errors->has('place'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('place') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Date</label>
                    <div class="col-md-9 col-sm-9 ">
                            <input type="date" name="date" id="first-date" required="required" class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" value="{{ old('date')??$event->date }}" autofocus>
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
                    <div class="col-md-9 col-sm-9 ">
                        <select id="" class="select2_single form-control  {{ $errors->has('district_id') ? ' is-invalid' : '' }}" tabindex="-1" name="district_id" >
                            <option value="" >Général</option>
                            @foreach ($districts as $district)
                            <option value="{{ $district->id }}" @if ($district->id == $event->district_id)
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

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Image</label>
	   			 	<div class="col-md-9 col-sm-9 ">
				        <div class="custom-file">
				            <input type="file" name="image" class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}" id="validatedCustomFile" value="{{old('image')??$event->image}}" >
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
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Description</label>
                    <div class="col-md-9 col-sm-9 ">
                    <textarea name="description" required="required" class="summernote form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" style="resize: none;">{{ old('description')??$event->description }}</textarea>
                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-9 col-sm-9 offset-md-3">
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
