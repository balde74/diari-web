<header id="header" class="header">
    <div class="header-wrap">
        <div class="container">
            <div class="header-wrap clearfix">
                <div id="logo" class="logo">
                    <a href="/" rel="home">
                    <img src="{{ asset('frontend/images/logo.png') }} " alt="image" width="196px" height="80px">
                    </a>
                </div>

                <div class="nav-wrap">
                    <nav id="mainnav" class="mainnav">
                        <ul class="menu">
                            <li class="home ">
                            <a href="{{ route('home') }}">Accueil</a>

                            </li>
                            
                            <li class="home ">
                            <a href="#">Présentation </a>
                                <ul class="submenu">
                                    @foreach ($instituts as $institut)
                                        @if ($institut->zone == 1)
                                          <li><a href="{{ route('institut_show',$institut->id) }}">{{ $institut->titre }}</a></li>
                                        @endif
                                    @endforeach
                                   
                                </ul>
                            </li>


                            <li class="home">
                            <a href="#">Formations {{-- <span class="menu-description">Tous les programmes</span> --}}</a>
                                <ul class="submenu">
                                    @foreach ($instituts as $institut)
                                        @if ($institut->zone == 2)
                                          <li><a href="{{ route('institut_show',$institut->id) }}">{{ $institut->titre }}</a></li>
                                        @endif
                                    @endforeach
                                   <b>Programmes de formation</b>
                                    @foreach ($programmes as $programme)
                                        <li><a href="{{ route('programme_show',$programme->id) }}">{{$programme->nom}}</a></li>
                                    @endforeach
                                   
                                </ul>
                            </li>
                        
                       
                            <li class="home">
                            <a href="#">Recherche </a>
                                <ul class="submenu">

                                    @foreach ($instituts as $institut)
                                        @if ($institut->zone == 3)
                                          <li><a href="{{ route('institut_show',$institut->id) }}">{{ $institut->titre }}</a></li>
                                        @endif
                                    @endforeach
                                    <li><a href="{{ route('projet_recherche') }}">Projets de recherche</a></li>
                                    <li><a href="{{ route('resultat_recherche') }}">Résultats de recherche</a></li>
                                   
                                </ul>
                            </li>

                            <li class="home">
                                <a href="{{ route('documentation_show') }}">Documentation</a>
                                <ul class="submenu">
                                    @foreach ($instituts as $institut)
                                        @if ($institut->zone == 4)
                                          <li><a href="{{ route('institut_show',$institut->id) }}">{{ $institut->titre }}</a></li>
                                        @endif
                                    @endforeach
                                    
                                   
                                </ul>
                            </li>

                            <li class="home">
                            <a href="#">Centres régionaux     </a>
                                <ul class="submenu">
                                    @foreach ($directions as $direction)
                                        <li><a href="{{ route('direction_show',$direction->id) }}">{{ $direction->nom }}</a></li>
                                    @endforeach
                                   
                                </ul>
                            </li>

                            

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>