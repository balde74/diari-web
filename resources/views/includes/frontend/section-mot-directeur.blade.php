<section class="flat-row no-padding">
	<div class="flat-fluid padding-95">
		<div class="container">
			<div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="content-pad">
                        <div class="item-thumbnail">
                           
                            <img src="{{ asset('documents/'.$mot_directeurs->first()->image) }}" alt="image" >
                            {{-- <span class="thumbnail-overlay">idjk</span> --}}
                            
                        </div>
                    </div>
                </div>
				<div class="col-md-8">
					<div class="post">
					<h1 class="title">Mot de la Directrice</h1>
					<p style="text-align: justify;">{!! $mot_directeurs->first()->contenu !!}</p>
					
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
