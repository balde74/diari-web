@extends('layouts.main-layout')
@section('title')
  Liste des évènements
@endsection
@section('autres_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Liste des évènements</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <a href="{{ route('event.create') }}" class="btn btn-sm btn-info"><span class="fa fa-plus"></span> Nouvel
                        évènement</a>
                    <br />
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Titre</th>
                                    <th>Lieu</th>
                                    <th>District</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @php
                                                $date = date_create($event->date);
                                                echo date_format($date, 'd/m/Y');
                                            @endphp
                                        </td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->place }}</td>
                                        <td>
                                            @if ($event->district)
                                                {{ $event->district->name }}
                                            @else
                                                Général
                                            @endif
                                        </td>
                                        <td>
                                            @if ($event->publish == 0)
                                                <span class="badge badge-secondary " > Non publié  </span>
                                            @elseif($event->publish == 1)
                                                <span class="badge badge-success " > Publié </span> 
                                            @endif
                                        </td>
                                        <td class="parent ">

                                            <a href="{{ route('event.show', $event->id) }} "
                                                class="btn btn-sm btn-info "><span class="fa fa-eye"></span> Information</a>
                                                @if (Auth::user()->id == $event->user_id || Auth::user()->role->id == 1 || Auth::user()->role->id == 2)
                                                    @if ($event->publish == false)
                                                        <a href="{{ route('publish_event', $event->id) }} "
                                                            class="btn btn-sm btn-success "> <span class="fa fa-share"></span>
                                                            Publier</a>
                                                    @elseif($event->publish == true)
                                                        <a href="{{ route('publish_event', $event->id) }} "
                                                            class="btn btn-sm btn-warning "> <span
                                                                class="fa fa-eye-slash"></span> Masquer</a>
                                                    @endif

                                                {{-- <a href="{{ route('event.edit',$event->id) }} " class="btn btn-sm btn-info">Editer</a> --}}
                                                <a href="# " class="btn btn-sm btn-danger  supprimer"> <span
                                                        class="fa fa-trash"></span> Supprimer</a>
                                                <form action="{{ route('event.destroy', $event->id) }}" method="post" 
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
