@extends('layouts.main-layout')
@section('title')
Liste des carousels
@endsection
@section('autres_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="row">
<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2>Liste des carousels</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">


        <a href="{{ route('carousel.create') }}" class="btn btn-sm btn-outline-info"><span class="fa fa-plus"></span> Nouvelle image</a>
			<br />
			<div class="table-responsive">
				<table id="example" class="table table-striped table-bordered display text-center">
				<thead>
					<tr>
					<th>Image</th>
					<th>Introduction</th>
					<th>Lien</th>
					@if (Auth::user()->role->id == 1 || Auth::user()->role->id == 2)
						<th>District</th>
					@endif
					<th>Action</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($carousels as $carousel)
					<tr>
						<td >
							<img src="{{ asset('documents/'.$carousel->image) }}" alt="image" style="width:100px;">
						</td>
						
					<td>{{ $carousel->description }}</td>
					<td>{{ $carousel->link }}</td>

					@if (Auth::user()->role->id == 1 || Auth::user()->role->id == 2)
						<td>
							@if ($carousel->district_id)
								{{ $carousel->district->name }}
							@else
								Général
							@endif
						</td>
					@endif
						
						<td class="parent">
						<a href="{{ route('carousel.edit',$carousel->id) }}" class="btn btn-sm btn-warning">Modifier</a>
						<a href="#" class="btn btn-sm btn-danger supprimer">Supprimer</a>
							<form action="{{ route('carousel.destroy',$carousel->id) }}" method="post" class="form_suppression">
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