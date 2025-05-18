@extends('layouts.main-layout')
@section('title')
    Liste des personnels
@endsection
@section('autres_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Liste des personnels</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">


                    <a href="{{ route('staff.create') }}" class="btn btn-sm btn-outline-info"><span class="fa fa-plus"></span>
                        Nouveau personnel</a>
                    <br />
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered display text-center">
                            <thead>
                                <tr>
                                    {{-- <th>Image</th> --}}
                                    <th>Nom</th>
                                    <th>Poste Occupé</th>
                                    <th>Département</th>
                                    <th>Depuis</th>
                                    <th>Email</th>
                                    <th>District</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($staff as $staff)
                                    <tr>
					
                                        {{-- <td>
                                            <img src="{{ asset('documents/' . $staff->image) }}" alt="image"
                                                style="width:100px;">
                                        </td> --}}
                                        <td> <strong>{{ $staff->name }}</strong></td>
                                        <td> {{ $staff->position }} </td>
                                        <td> {{ $staff->department }} </td>
                                        <td> {{ $staff->start_date }} </td>
                                        <td> {{ $staff->email }} </td>
                                        <td>
                                            @if ($staff->district)
                                                {{ $staff->district->name }}
                                            @else
                                                Général
                                            @endif
                                        </td>

                                        <td class="parent">
											<a href="{{ route('staff.show',$staff->id) }} " class="btn btn-sm btn-info "> <span class="fa fa-eye"></span> Information </a>
											<a href="{{ route('staff.edit', $staff->id) }} " class="btn btn-sm btn-warning "> <span class="fa fa-edit"></span> Editer
                                            </a>
                                            <a href="# " class="btn btn-sm btn-danger  supprimer"> <span class="fa fa-trash"></span> Supprimer </a>
                                          
                                            <form action="{{ route('staff.destroy', $staff->id) }}" method="post"
                                                class="form_suppression">
                                                @csrf
                                                @method('DELETE')

                                                {{-- <input type="submit" value="Supprimer" class="btn btn-sm btn-danger"> --}}
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
