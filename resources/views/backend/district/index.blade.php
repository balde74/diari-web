@extends('layouts.main-layout')
@section('title') tous les districts @endsection
@section('autres_css')
  <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="row">
<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <h2>Liste des districts</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
    	<a href="{{ route('district.create') }}" class="btn btn-sm btn-outline-info"><span class="fa fa-plus"></span> Nouvelle district</a>
      <br />
     	<div class="table-responsive">
             	<table id="example" class="table table-striped table-bordered display text-center">
	              <thead>
		               <tr>
							<th>District</th>
							{{-- <th>Présentation</th> --}}
							<th>Action</th>
						</tr>
			        </thead>

		        	<tbody>
		        		@foreach ($districts as $district)
							<tr>
								<td>{{ $district->name }}</td>
								{{-- <td>{!! $district->presentation !!}</td> --}}
								<td class="d-flex justify-content-center parent">
									{{-- @if (Auth::user()->district_id == $district->id || Auth::user()->role_id == 1) --}}
									<a href="{{ route('district.show',$district->id) }} " class="btn btn-sm btn-info "> <span class="fa fa-eye"></span> Information </a>
									<a href="{{ route('district.edit',$district->id) }} " class="btn btn-sm btn-warning "> <span class="fa fa-edit"></span> Editer </a>
									{{-- <a href="# " class="btn btn-sm btn-danger  supprimer"> <span class="fa fa-trash"></span> Supprimer </a> --}}
										<form action="{{ route('district.destroy',$district->id) }}" method="post" class="form_suppression">
											@csrf
											@method('DELETE')
										</form>
										
									{{-- @endif --}}
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