@extends('layouts.main-layout')
@section('title')
	Affichage d'un évènement
@endsection
@section('content')

<div class="row">
	<div class="col-md-11 mx-auto col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>{{ $event->title }}</h2>
				
				<div class="clearfix"></div>
			</div>
			<div class="x_content mx-auto">
				<br />
				<div class="row">
					<div class="col-md-7">
						
						<h3 class="text-center"> <b>{{ $event->title }}</b></h3>

						<div class="row">
							<div class="col"><h4> <span class="fa fa-calendar fa-2x"> </span> {{ $event->date }}</h4></div>
							<div class="col"><h4><span class="fa fa-map-marker text-danger fa-2x" aria-hidden="true"> </span> {{ $event->place }}</h4></div>
						</div>
						
						
						<h4 > <strong>Description</strong></h4>
						
						<div style="background-color: #f8f9fa; padding: 10px; border-radius: 5px;">
							{!!$event->description!!}
						</div>
						
						@if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
							<p><strong>Enregistré par : </strong> {{ $event->user->getFullName() }}</p>
							<p><strong>District de : </strong> {{ $event->district?$event->district->name:'Général' }}</p>
						@endif

						<hr>
						<div class="text-center">
							<a class="btn btn-sm" style="margin-right: 10%" href="{{ route('event.index') }}"> <i class="fa fa-arrow-left"></i> Liste des évènements</a>
							@if (Auth::user()->id == $event->user_id || Auth::user()->role->id == 1 || Auth::user()->role->id == 2)
							<a class="btn btn-sm" href="{{ route('event.edit',$event->id) }}"> <i class="fa fa-edit"></i> Editer </a>
							@endif
						</div>
					</div>
					<div class="col">
						@if ($event->image)
						<img src="{{ asset('documents/'.$event->image) }}" class="" alt="image de l'event" width="180px" height="180px">
						@else
						<span class="text-warning">Aucune image</span>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 


@endsection