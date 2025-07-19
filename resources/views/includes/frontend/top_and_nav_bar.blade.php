<div id="top-bar" class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <ul class="top-info text-center text-md-left">
                    <li><i class="fas fa-map-marker-alt"></i>
                        <p class="info-text">9051 Constra Incorporate, USA</p>
                    </li>
                </ul>
            </div>
            <!--/ Top info end -->

            <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                <ul class="list-unstyled">
                    <li>
                        <a title="Facebook" href="https://facebbok.com/themefisher.com">
                            <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                        </a>
                        <a title="Twitter" href="https://twitter.com/themefisher.com">
                            <span class="social-icon"><i class="fab fa-twitter"></i></span>
                        </a>
                        <a title="Instagram" href="https://instagram.com/themefisher.com">
                            <span class="social-icon"><i class="fab fa-instagram"></i></span>
                        </a>
                        <a title="Linkdin" href="https://github.com/themefisher.com">
                            <span class="social-icon"><i class="fab fa-github"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
            <!--/ Top social end -->
        </div>
        <!--/ Content row end -->
    </div>
    <!--/ Container end -->
</div>
<!--/ Topbar end -->
<!-- Header start -->
<header id="header" class="header-one">
    {{-- <div class="bg-white">
        <div class="container">
            <div class="logo-area">
                <div class="row align-items-center">
                    <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                        <a class="d-block" href="index.html">
                            <img loading="lazy" src="images/logo.png" alt="Constra">
                        </a>
                    </div><!-- logo end -->

                    <div class="col-lg-9 header-right">
                        <ul class="top-info-box">
                            <li>
                                <div class="info-box">
                                    <div class="info-box-content">
                                        <p class="info-box-title">Call Us</p>
                                        <p class="info-box-subtitle">(+9) 847-291-4353</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="info-box">
                                    <div class="info-box-content">
                                        <p class="info-box-title">Email Us</p>
                                        <p class="info-box-subtitle">office@Constra.com</p>
                                    </div>
                                </div>
                            </li>
                            <li class="last">
                                <div class="info-box last">
                                    <div class="info-box-content">
                                        <p class="info-box-title">Global Certificate</p>
                                        <p class="info-box-subtitle">ISO 9001:2017</p>
                                    </div>
                                </div>
                            </li>
                            <li class="header-get-a-quote">
                                <a class="btn btn-primary" href="contact.html">Get A Quote</a>
                            </li>
                        </ul><!-- Ul end -->
                    </div><!-- header right end -->
                </div><!-- logo area end -->

            </div><!-- Row end -->
        </div><!-- Container end -->
    </div> --}}

    <div class="site-navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-dark p-0">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div id="navbar-collapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav mr-auto">
                                <li class="nav-item dropdown {{ request()->is('/') ? 'active' : ''}}">
                                    <a href="/" class="nav-link dropdown-toggle">ACCUEIL </a>
                                    {{-- <ul class="dropdown-menu" role="menu">
                                        <li class="active"><a href="index.html">Home One</a></li>
                                        <li><a href="index-2.html">Home Two</a></li>
                                    </ul> --}}
                                </li>

                                <li class="nav-item dropdown {{ isset($page) && $page->parent_zone == 'présentation' ? 'active' : '' }}">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">présentation <i
                                            class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        @foreach ($pages->where('parent_zone', 'présentation') as $presentationPage)
                                            <li><a href="{{ route('page_show',$presentationPage->slug) }}">{{ $presentationPage->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>

                                <li class="nav-item dropdown {{ isset($page) && $page->parent_zone == 'services' ? 'active' : '' }} ">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Services
                                        <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        @foreach ($pages->where('parent_zone', 'services') as $servicePage)
                                            <li><a href="{{ route('page_show',$servicePage->slug) }}">{{ $servicePage->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>


                                <li class="nav-item dropdown {{ request()->is('projects/*') ? 'active' : '' }}">
                                    <a href="#" class="nav-link dropdown-toggle"
                                        data-toggle="dropdown">Projets <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu " role="menu">
                                        <li><a href="{{ route('projects_by_status','en-cours') }}">En cours</a></li>
                                        <li><a href="{{ route('projects_by_status','realisations') }}">Réalisations</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown {{ request()->is('communiqués','évènements') ? 'active' : '' }}">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Actualités <i
                                            class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('posts') }}">Communiqués</a></li>
                                        <li><a href="{{ route('events') }}">évènements à venir</a></li>
                                    </ul>
                                </li>

                                
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle"
                                        data-toggle="dropdown">Districts <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        @foreach ($districts as $district)
                                            <li><a href="#">{{ $district->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>

                                <li class="nav-item"><a class="nav-link" href="{{ route('documentation') }}">Documentation</a></li>
                                <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!--/ Col end -->
            </div>
            <!--/ Row end -->

            <div class="nav-search">
                <span id="search"><i class="fa fa-search"></i></span>
            </div><!-- Search end -->

            <div class="search-block" style="display: none;">
                <label for="search-field" class="w-100 mb-0">
                    <input type="text" class="form-control" id="search-field"
                        placeholder="Type what you want and enter">
                </label>
                <span class="search-close">&times;</span>
            </div><!-- Site search end -->
        </div>
        <!--/ Container end -->

    </div>
    <!--/ Navigation end -->
</header>
<!--/ Header end -->