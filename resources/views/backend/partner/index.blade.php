@extends('layouts.main-layout')
@section('title')
    Liste des partenaires
@endsection
@section('autres_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Liste des partenaires</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">


                    <a href="{{ route('partner.create') }}" class="btn btn-sm btn-outline-info"><span
                            class="fa fa-plus"></span> Nouveau partenaire</a>
                    <br />
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered display text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Nom</th>
                                    <th>acronyme</th>
                                    <th>Lien</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($partners as $partner)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> <img src="{{ asset('documents/' . $partner->image) }}" alt="image" width="60" height="60"> </td>
                                        <td> {{ $partner->name }} </td>

                                        <td>  {{ $partner->acronym }} </td>

                                        <td>  <a href="{{ $partner->link }}" target="_blank">{{ $partner->link }}</a>  </td>
										
                                        <td class="parent">
                                            <a href="{{ route('partner.edit', $partner->id) }} " class="btn btn-sm btn-warning "> <span class="fa fa-edit"></span> Editer </a>
                                            <a href="# " class="btn btn-sm btn-danger  supprimer"> <span class="fa fa-trash"></span> Supprimer </a>

                                            <form action="{{ route('partner.destroy', $partner->id) }}" method="post"
                                                class="form_suppression">
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
@section('autres_scripts')
    @include('includes.data_table_simple')
@endsection
