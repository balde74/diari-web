@extends('layouts.main-layout')
@section('title')
    Liste des pages
@endsection
@section('autres_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Liste des pages</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <a href="{{ route('page.create') }}" class="btn btn-sm btn-info"><span class="fa fa-plus"></span> Nouvelle
                        page</a>
                    <br />
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Titre</th>
                                    <th>Zone d'affichage</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($pages as $page)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                      
                                        <td>{{ $page->title }}</td>
                                        <td>{{ $page->parent_zone }}</td>
                                        <td>
                                            @if ($page->publish == 0)
                                                <span class="badge badge-secondary " > Non affiché  </span>
                                            @elseif($page->publish == 1)
                                                <span class="badge badge-success " > Affiché </span> 
                                            @endif
                                        </td>
                                        <td class="parent ">

                                            <a href="{{ route('page.show', $page->id) }} "
                                                class="btn btn-sm btn-info "><span class="fa fa-eye"></span> Information</a>
                                                @if (Auth::user()->id == $page->user_id || Auth::user()->role->id == 1 || Auth::user()->role->id == 2)
                                                    @if ($page->publish == false)
                                                        <a href="{{ route('publish_page', $page->id) }} "
                                                            class="btn btn-sm btn-success "> <span class="fa fa-share"></span>
                                                            Publier</a>
                                                    @elseif($page->publish == true)
                                                        <a href="{{ route('publish_page', $page->id) }} "
                                                            class="btn btn-sm btn-warning "> <span
                                                                class="fa fa-eye-slash"></span> Masquer</a>
                                                    @endif

                                                {{-- <a href="{{ route('page.edit',$page->id) }} " class="btn btn-sm btn-warning"> <span class="fa fa-edit"></span> Editer</a> --}}
                                                <a href="# " class="btn btn-sm btn-danger  supprimer"> <span
                                                        class="fa fa-trash"></span> Supprimer</a>
                                                <form action="{{ route('page.destroy', $page->id) }}" method="post" 
                                                    class="form_suppression d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            @endif
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
