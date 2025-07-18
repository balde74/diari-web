@extends('layouts.main-layout')
@section('title')
Détail d'un article
@endsection
@section('content')

<div class="row">
	<div class="col-md-9 mx-auto col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Détails de l'article</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content mx-auto">
				<h4><b>{{ $post->title }}</b></h4>
					<div style="font-size: 18px;text-align: justify;">
						
							@if ($post->image)
							<img src="{{ asset('documents/'.$post->image) }}" class="" alt="image de l'post" width="100%" >
							@endif
							<br/>
							<div style="background-color: #f8f9fa; padding: 10px; border-radius: 5px;">
								{{ $post->introduction }}
							</div>

						@foreach ($post->sections->sortBy('position') as $section)
							
							@if ($section->image)
								<img src="{{ asset('documents/'.$section->image) }}" class="img-fluid no-border" alt="image de la section" width="100%" >
								<br/><br/>
							@endif
							<div style="background-color: #f8f9fa; padding: 10px; border-radius: 5px;">
								{!! $section->content !!}

							</div>
							<br/><br/>
						@endforeach

					</div>


					@if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
						<p><strong>Enregistré par : </strong> {{ $post->user->getFullName() }}</p>
						<p><strong>District de : </strong> {{ $post->district?$post->district->name:'Général' }}</p>
					@endif
					 <hr/>
	                <h4 class="text-center">
	                  {{-- <i class="fa fa-comments"></i> Commentaires ({{$post->commentaires->count()}}) &nbsp;&nbsp; --}}
	                  	{{-- <a href="{{ route('post.edit',$post->id) }}"><i class="fa fa-pencil-square"></i> Modifier &nbsp;&nbsp;</a> --}}
					  	<a class=" btn btn-sm" style="margin-right: 10%" href="{{ route('post.index') }}"> <i class="fa fa-arrow-left"></i> Liste des articles</a>
						@if (Auth::user()->id == $post->user_id || Auth::user()->role->id == 1 || Auth::user()->role->id == 2)
						<a class=" btn btn-sm" style="margin-right: 10%" href="{{ route('post.edit',$post->id) }}"> <i class="fa fa-edit"></i> Editer </a>
						<a href="{{ route('section', $post->id) }}" class=" btn btn-sm "><span class="fa fa-align-justify"></span> Section </a>
						@endif
	                </h4>

				<!--  commentes -->
                {{-- <ul class="messages">
                  @foreach($post->commentaires as $commentaire)
                  <li>
                    {{-- <img src="{{ asset('frontend/image_par_defaut/auteur_commentaire.png') }}" class="avatar" alt="Avatar"> --}

                    <div class="message_wrapper parent">
                      <h4 class="heading">{{$commentaire->nom}} ({{ $commentaire->email }})</h4>
                      <blockquote class="message" style="font-size: 16px;">
                        <?php echo nl2br($commentaire->commentaire); ?>
                      </blockquote>
                      <br />
                      <a href="#" class=" btn btn-sm btn-danger supprimer">supprimer</a>
                      <p class="url">
                        <form action="{{ route('commentaire.destroy',$commentaire->id) }}" method="post" class="form_suppression">
													@csrf
													@method('DELETE')
													{{-- <input type="submit" value="supprimer" class="btn btn-sm btn-danger "> --}
												</form>
                      </p>
                    </div>
                  </li>
                  @endforeach

                  {{-- {{ $post->commentaires()->links() }} --}
                </ul> --}}
                <!-- end comments -->





			</div>
		</div>
	</div>
</div> 


@endsection