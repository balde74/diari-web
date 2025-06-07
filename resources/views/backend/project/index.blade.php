@extends('layouts.main-layout')
@section('title')
    Liste des projets
@endsection
@section('autres_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Liste des projets</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <a href="{{ route('project.create') }}" class="btn btn-sm btn-info"><span class="fa fa-plus"></span> Nouveau projet</a>
                    <br />
                    <div class="table-responsive">


                        <table id="example" class="table table-striped table-bordered text-center">
                            <thead >
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Titre</th>
                                    <th>Statut</th>
                                    <th>Budget</th>
                                    <th>Date de début</th>
                                    <th>Date de fin</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects as $project)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($project->image)
                                                <img src="{{ asset('documents/' . $project->image) }}" alt="Image projet" width="60" height="60">
                                            @else
                                               Aucune image
                                            @endif
                                        </td>
                                        <td>{{ $project->title }}</td>
                                        <td>
                                            @switch($project->status)
                                                @case('prévu') <span class="badge badge-secondary">Prévu</span> @break
                                                @case('en cours') <span class="badge badge-warning">En cours</span> @break
                                                @case('terminé') <span class="badge badge-success">Terminé</span> @break
                                            @endswitch
                                        </td>
                                        <td>{{ number_format($project->budget, 0, ',', ' ') }} GNF</td>
                                        <td class="text-capitalize">{{ $project->start_date ? \Carbon\Carbon::parse($project->start_date)->translatedFormat('F Y') : '-' }}</td>
                                        <td class="text-capitalize">{{ $project->end_date ? \Carbon\Carbon::parse($project->end_date)->translatedFormat('F Y') : '-' }}</td>
                                        <td class="parent">
                                            <a href="{{ route('project.show', $project->id) }}" class="btn btn-info btn-sm"><span class="fa fa-eye"></span> Information</a>
                                            <a href="{{ route('project.edit', $project->id) }}" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span> Editer </a>
                                            <a href="#" class="btn btn-sm btn-danger supprimer"> <span class="fa fa-trash"></span> Supprimer</a>
                                            <form action="{{ route('project.destroy', $project->id) }}" method="POST" class="form_suppression ">
                                                @csrf
                                                @method('DELETE')

                                            </form> 
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Aucun projet trouvé.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('autres_scripts')
    @include('includes/data_table_simple')
@endsection
