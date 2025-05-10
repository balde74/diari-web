
<section class="flat-row flat-ev-carousel">
    <div class="container">
        <div class="row ">

            <div class="container-fluid">
            <div class="new-bottom">
            <div class="row">
            <div class="news-letter">
            <h1 class="title text-uppercase">partenaires</h1>
            </div>

            </div>
            </div>
            </div>

            <div class="col-md-12 margin-small "   >
                <div class="flat-carousel v1 " >
                    <div class="post-wrap">
                        <div class="posts-carousel v1 v2">
                            <div class="flat-event">
                                <div class="flat-blog-carousel" data-item="4" data-nav="true" data-dots="false" data-auto="true">

                                @foreach ($partenaires as $partenaire)
                                    <div class="grid-item">
                                        <div class="grid-item-inner">
                                            <div class="event-item">
                                                <div class="event-thumbnail">
                                                 <img src="{{ asset('documents/'.$partenaire->image) }}" alt="image" style="max-height: 120px; min-height: 120px;">
                                                </div>
                                            {{-- <div class="date-block">
                                            <div class="month">Jun</div>
                                            <div class="day">22</div>
                                            </div> --}}
                                                <div class="event-overlay">
                                                    <div class="cs-post-header">
                                                        <div class="cs-category-links">
                                                            <span class="overlay-top" >
                                                                <a href="
                                                                    @if ($partenaire->lien)
                                                                        {{ $partenaire->lien }}
                                                                    @endif
                                                                " target="_blank" title="{{ $partenaire->nom }}"    >
                                                            <h4 class="">{{ $partenaire->acronyme }}</h4>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach 

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>