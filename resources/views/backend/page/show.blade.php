@extends('layouts.main-layout')
@section('title')
	Affichage d'une page
@endsection
@section('content')

<div class="row">
	<div class="col-md-11 mx-auto col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Information sur la page</h2>
				
				<div class="clearfix"></div>
			</div>
			<div class="x_content mx-auto">
				<br />
				<div class="row">
					<div class="col-md-10 mx-auto">
						
						<h3 class="text-center"> <b>{{ $page->title }}</b></h3>

						<h4 > <strong>Description</strong></h4>
						
						<div style="background-color: #f8f9fa; padding: 10px; border-radius: 5px;">
							{!!$page->content!!}
						</div>
						
						<hr>
						<div class="text-center">
							<a class="btn btn-sm" style="margin-right: 10%" href="{{ route('page.index') }}"> <i class="fa fa-arrow-left"></i> Liste des pages</a>
							@if (Auth::user()->role->id == 1 || Auth::user()->role->id == 2)
							<a class="btn btn-sm" href="{{ route('page.edit',$page->id) }}"> <i class="fa fa-edit"></i> Editer </a>
							@endif
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</div>
</div> 


@endsection