@extends('layouts.main-layout')
@section('title')
section {{ $section->position }}
@endsection
@section('content')

<div class="row">
	<div class="col-md-8 mx-auto col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Détails de la section N° {{ $section->position }}</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content mx-auto">
					<div style="font-size: 18px;text-align: justify;">
						
						{!! $section->content !!}
						<hr>

						@if ($section->image)
						<img src="{{ asset('documents/'.$section->image) }}" class="" alt="image de l'section" width="100%" >
						@endif
					</div>
					<br>
					<h4 class="text-center">
						<a class="btn-sm" style="margin-right: 10%" href="{{route('section', $section->post->id) }}"> <i class="fa fa-arrow-left"></i> Liste des sections</a>
						@if (Auth::user()->id == $section->post->user_id || Auth::user()->role->id == 1 || Auth::user()->role->id == 2)

						<a href="{{ route('section.edit',$section->id) }}" class="btn-sm text-center"><i class="fa fa-edit"></i>Editer</a>
						@endif

					</h4>
					 <hr>
			</div>
		</div>
	</div>
</div> 


@endsection