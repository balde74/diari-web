@extends('layouts.main-layout')
@section('title')
    Liste des articles
@endsection
@section('autres_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Liste des articles</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <a href="{{ route('post.create') }}" class="btn btn-sm btn-info"><span class="fa fa-plus"></span> Nouvel article</a>
                    <br />
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Titre</th>
                                    <th>District</th>
                                    <th>Status</th>
                                    <th>Lien à copier</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @php
                                                $date = date_create($post->created_at);
                                                echo date_format($date, 'd/m/Y');
                                            @endphp
                                        </td>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                            @if ($post->district_id)
                                                {{ $post->district->name }}
                                            @else
                                                Général
                                            @endif
                                        </td>

                                        <td>
                                            @if ($post->publish == 0)
                                            <span class="badge badge-secondary " > Non publié </span>
                                            @elseif($post->publish == 1)
                                            <span class="badge badge-success"> Publié </span>
                                            @endif
                                        </td>
										<td>
											{{-- {{ route('post_show',$post->id) }} --}}
										</td>

                                        <td class="parent">
                                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-sm btn-info "><span class="fa fa-eye"></span> Information</a>
                                            @if (Auth::user()->id == $post->user_id || Auth::user()->role->id == 1 || Auth::user()->role->id == 2)
                                              
                                                     @if ($post->publish == 0)
                                                        <a href="{{ route('publish_post', $post->id) }} "
                                                            class="btn btn-sm btn-success"> <span class="fa fa-share"></span> Publier</a>
                                                    @elseif($post->publish == 1)
                                                        <a href="{{ route('publish_post', $post->id) }} " class="btn btn-sm btn-warning "> <span class="fa fa-eye-slash"></span> Masquer</a>
                                                    @endif

                                                   
                                         
                                                 <a href="{{ route('section', $post->id) }}"
                                                    class="btn btn-sm btn-secondary"><span class="fa fa-align-justify"></span> Section ({{ $post->sections->count() }}) </a>
                                                {{-- <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-warning "><span class="fa fa-pencil"></span> Editer</a> --}}
                                                <a href="#" class="btn btn-sm btn-danger supprimer"> <span class="fa fa-trash"></span> Supprimer</a>
                                                <form action="{{ route('post.destroy', $post->id) }}" method="post"
                                                    class="form_suppression ">
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
    @include('includes/data_table_simple')
@endsection
