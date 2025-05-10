<div class="col-md-3">
        <div class="sidebar">
            <div class="widget">
                   <h4 class="widget-title">Cartographie</h4>
                   {{-- <div class="cartographie" id="map"></div>       --}}
           </div>

   
           @if ($articles_recents)
               
                <div class="widget widget-courses">
                    <h2 class="widget-title">Articles recents</h2>
                    <ul class="recent-posts clearfix">
                        @foreach ($articles_recents as $article)
                            <li>
                            <div class="thumb item-thumbnail">
                            <a href="{{ route('article_show',$article->id) }}">
                            <img src="{{ asset('documents/'.$article->image) }}" alt="image" style="width:80px">
                            <div class="thumbnail-hoverlay main-color-1-bg"></div>
                            <div class="thumbnail-hoverlay-cross"></div>
                            </a>
                            </div>
                            <div class="text">
                            <a href="{{ route('article_show',$article->id) }}" title="{{ $article->titre }}"> <b >{{ str_limit($article->titre,'22','...') }}</b></a>
                            <p>Publié le {{ $article->created_at->format('d-m-Y') }}</p>
                            </div>
                            </li>
                        @endforeach
                    
                    </ul>
                </div>
           @endif

           @if ($evenements_recents)
               {{-- expr --}}

                <div class="widget widget-posts">
                    <h2 class="widget-title">Evenements</h2>
                    <ul class="recent-posts clearfix">
                       @foreach ($evenements_recents as $evenement)
                            <li>
                            <div class="thumb item-thumbnail">
                            <a href="{{ route('evenement_show',$evenement->id) }}">
                            <img src="{{ asset('documents/'.$evenement->image) }}" alt="image" style="width:80px">
                            <div class="thumbnail-hoverlay main-color-1-bg"></div>
                            <div class="thumbnail-hoverlay-cross"></div>
                            </a>
                            </div>
                            <div class="text"><a href="{{ route('evenement_show',$evenement->id) }}"><b>{{ str_limit( $evenement->titre,'22','...') }}</b></a>
                                @php
                                    $date = date_create($evenement->date)
                                @endphp
                            <p> <span class="fa fa-calendar"></span> {{ date_format($date,'d/m/Y') }}</p>
                            <p> <span class="fa fa-map-marker"></span> {{ $evenement->lieu }}</p>
                            </div>
                            </li>
                        @endforeach
                    
                    </ul>
                </div>
           @endif

                
        </div>
        </div>

