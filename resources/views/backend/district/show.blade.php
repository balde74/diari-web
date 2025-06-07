@extends('layouts.main-layout')
@section('title')
Affichage
@endsection
@section('content')

<div class="row">
	<div class="col-md-10 mx-auto col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Information du district</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
			 	<div class="row">
          <div class="col-md-10 mx-auto ">
                <h3 class="text-center">{{$district->name}}</h3>
                  
                    <br>
					{!! $district->presentation!!}
                    <hr>
                    <div class="text-center">
						<a class="btn btn-sm" style="margin-right: 10%" href="{{ route('district.index') }}"> <i class="fa fa-arrow-left"></i> Liste des districts</a>
                      	<a class="btn btn-sm" href="{{ route('district.edit',$district->id) }}"> <i class="fa fa-edit"></i> Editer </a>
                      {{-- <a href="{{ route('district.destroy',$district->id) }}"> <i class="fa fa-trash"></i>supprimer</a> --}}
                    </div>
                    
          </div>
      	</div>
			</div>
		</div>
	</div>
</div> 


@endsection