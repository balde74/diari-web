@extends('layouts.main-layout')

@section('autres_css')
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Liste des utilisateurs</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered display">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>E-mail</th>
                                    <th>District</th>
                                    <th>rôle</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->getFullName() }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->district)
                                                {{ $user->district->name }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $user->role->name }}
                                        </td>
                                        <td class="parent">
                                            @if (Auth::user()->id != $user->id && Auth::user()->role_id == 1)
                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class="btn btn-sm btn-warning "><span
                                                    class="fa fa-edit"></span> Editer</a>
                                            <a href="#"
                                                class="btn btn-sm btn-danger  supprimer"><span
                                                    class="fa fa-trash"></span> Supprimer</a>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="post"
                                                class="form_suppression">
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
    {{-- {{-- @include('layouts/partials/_data_table_simple') --}}
@endsection
