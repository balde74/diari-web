@extends('layouts.main-layout')
@section('title')
    Liste des documents
@endsection

@section('autres_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Liste des documents</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <a href="{{ route('documentation.create') }}" class="btn btn-sm btn-outline-info"><span
                        class="fa fa-plus"></span> Nouveau document</a>

                <br />
                <div class="table-responsive">
                    <table id="example" class="table table-hover table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titre</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($docs as $doc)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $doc->title }}</td>
                                    <td class="parent">
                                        @if ($doc->file)
                                            <a href="{{ asset('documents/' . $doc->file) }}" target="_blank" class="btn btn-sm btn-outline-info ">Voir le PDF</a>
                                        @endif

                                        <a href="{{ route('documentation.edit', $doc->id) }}" class="btn btn-sm btn-warning "><span class="fa fa-pencil"></span> Editer</a>
                                        <a href="#" class="btn btn-sm btn-danger supprimer"> <span class="fa fa-trash"></span> Supprimer</a>

                                        <form action="{{ route('documentation.destroy', $doc->id) }}" method="post"
                                            class="form_suppression ">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    @include('includes.data_table_simple')


    {{-- 
	//confirmation de suppression
	 function ConfirmDelete()
      {
            if (confirm("Etes vous sure"))
	            	$('.form_suppression').submit()
      }
  </script> --}}
@endsection
