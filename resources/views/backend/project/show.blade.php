@extends('layouts.main-layout')
@section('title')
    Détail d'un projet
@endsection
@section('content')
    <div class="row">
        <div class="col-md-9 mx-auto col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Détails du projet</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content mx-auto">

					<div class="row mb-4">
						<div class="col-md-8">
							<p><strong>Titre :</strong> {{ $project->title }}</p>
							<p><strong>Slug :</strong> {{ $project->slug }}</p>
							<p><strong>Description :</strong></p>
							<div style="background-color: #f8f9fa; padding: 10px; border-radius: 5px;">
								{!! $project->description	 !!}
							</div>
						</div>
						<div class="col-md-4 text-center">
							@if ($project->image)
								<img src="{{ asset('documents/' . $project->image) }}" alt="Image du projet" style="max-width:100%; border-radius: 10px;">
							@else
								<img src="{{ asset('default_project.png') }}" alt="Image par défaut" style="max-width:100%; border-radius: 10px;">
							@endif
						</div>
					</div>
				
					<div class="row mb-3">
						<div class="col-md-4">
							<p><strong>Date de début :</strong><br>
							{{ $project->start_date ? \Carbon\Carbon::parse($project->start_date)->translatedFormat('F Y') : '-' }}</p>
						</div>
						<div class="col-md-4">
							<p><strong>Date de fin :</strong><br>
							{{ $project->end_date ? \Carbon\Carbon::parse($project->end_date)->translatedFormat('F Y') : '-' }}</p>
						</div>
						<div class="col-md-4">
							<p><strong>Budget :</strong><br>
							{{ $project->budget ? number_format($project->budget, 2, ',', ' ') . ' GNF' : '-' }}</p>
						</div>
					</div>
				
					<div class="row mb-3">
						<div class="col-md-4">
							<p><strong>État :</strong><br>
							@if($project->status == 'prévu')
								<span class="badge bg-secondary text-white">Prévu</span>
							@elseif($project->status == 'en cours')
								<span class="badge bg-warning text-dark text-white">En cours</span>
							@elseif($project->status == 'terminé')
								<span class="badge bg-success text-white">Terminé</span>
							@endif
							</p>
						</div>
						<div class="col-md-4">
							<p><strong>Auteur :</strong><br>
							{{ $project->user->name ?? '-' }}</p>
						</div>
						<div class="col-md-4">
							<p><strong>Créé le :</strong><br>
							{{ $project->created_at->format('d/m/Y ') }}</p>
						</div>
					</div>
				
					<div class="text-center mt-4">
						<a href="{{ route('project.index') }}" class="btn btn-sm ">
							<i class="fa fa-arrow-left"></i> Liste des projets
						</a>

						@if (Auth::user()->role->id == 1 || Auth::user()->role->id == 2)
							<a class="btn btn-sm" style="margin-right: 10%" href="{{ route('project.edit',$project->id) }}"> <i class="fa fa-edit"></i> Editer </a>
						@endif
					</div>
				
				</div>

                </div>
            </div>
		</div>
	</div>
@endsection
