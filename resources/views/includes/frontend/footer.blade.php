<footer class="footer full-color" >

<section id="bottom" style="padding-top: 0px;">
<div class="section-inner">
<div class="container">
<div class="row normal-sidebar">

<div class="page-title parallax parallax5  " style="background-color: #212327; padding: 0px; " >
	<div class="container">
		<div class="row ">
			<div class="icon-post full-color" >
				@foreach ($slogans as $slogan)
					{{-- expr --}}
					<div class="iconbox center">
					<div class="box-header">
					<i class="fa {{ $slogan->image }} text-primary "></i>
					</div>
					<div class="icon-post" style="padding-bottom: 0px;">
					<div class="box-title">
						{{-- <p></p> --}}
						{!! $slogan->texte !!}
					</div>
					</div>
					</div>
				@endforeach
			</div>

		</div>
	</div>

</div>
<div class=" widget divider-widget" >
<div class=" widget-inner">
<div class="un-heading un-separator">
<div class="un-heading-wrap">
<span class="un-heading-line un-heading-before">
<span></span>
</span>
<button class="flat-button style1">ISFAD</button>
<span class="un-heading-line un-heading-after">
<span></span>
</span>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>

<div class=" col-md-3  widget widget-text">
<div class=" widget-inner">
<h2 class="widget-title maincolor1">ISFAD</h2>
<div class="textwidget text-justify">Créé en 2004 sous le N°2004/497/MESRS/ CAB, l'ISFAD est une institution publique à vocation d'enseignement et de recherche à distance de niveau supérieur. Il est placé sous la tutelle du 	<a href="https://www.mesrs.gov.gn/" target="_blank">Ministère de l'Enseignement Supérieur et de la Recherche Scientifique</a> de la République de Guinée
</div>
</div>
</div>
<div class=" col-md-3  widget widget-recent-entries">
<div class=" widget-inner">
<h2 class="widget-title maincolor1">PROGRAMMES DE FORMATION</h2>
	<ul>
		@foreach ($programmes as $programme)
			<li>
			<a href="{{ route('programme_show',$programme->id) }}">{{ $programme->nom }}</a>
			</li>
		@endforeach
		
	</ul>
</div>
</div>

<div class=" col-md-3  widget widget-nav-menu">
<div class=" widget-inner">
<h2 class="widget-title maincolor1">DIRECTIONS REGIONALES</h2>
	<div class="menu-others-container">
		<ul id="menu-others" class="menu">
			@foreach ($directions as $direction)
				<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306">
				<a href="{{ route('direction_show',$direction->id) }}">{{ $direction->nom }}</a>
				</li>
			@endforeach
		
		</ul>
	</div>
</div>
</div>

<div class=" col-md-3  widget widget-nav-menu" id="nous-contacter">
<div class=" widget-inner">
<h2 class="widget-title maincolor1">CONTACT</h2>
<div class="menu-others-container">
	@if ($contacts->count()> 0)
		{!! $contacts[0]->contact !!}
	@endif

	<br/>
<div class="cartographie" id="map"></div>


</div>
</div>
</div>

</div>
</div>
</div>
</section>

</footer>