@extends('layouts.main-frontend-layout')
@section('title')
    Accueil
@endsection

@section('autres_css')
    <style>
        .project-img {
            width: 100%;
            height: 250px;
            /* hauteur fixe, tu peux ajuster */
            object-fit: cover;
            /* recadre l’image sans la déformer */
            border-radius: 6px;
            /* optionnel pour arrondir un peu les coins */
        }
    </style>
@endsection


@section('content')



    <div class="banner-carousel banner-carousel-1 mb-0">
        @if ($carousels->count() > 0)
            @foreach ($carousels as $carousel)
                <div class="banner-carousel-item" style="background-image:url(images/slider-main/bg1.jpg)">
                    <div class="slider-content">
                        <div class="container h-100">
                            <div class="row align-items-center h-100">
                                <div class="col-md-12 text-center">
                                    <h2 class="slide-title" data-animation-in="slideInLeft">17 Years of excellence in</h2>
                                    <h3 class="slide-sub-title" data-animation-in="slideInRight">Construction Industry</h3>
                                    <p data-animation-in="slideInLeft" data-duration-in="1.2">
                                        <a href="services.html" class="slider btn btn-primary">Our Services</a>
                                        <a href="contact.html" class="slider btn btn-primary border">Contact Now</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="banner-carousel-item"
                style="background-image:url({{ asset('default_images/frontend/default_carousel.jpg') }})">
                <div class="slider-content">
                    <div class="container h-100">
                        <div class="row align-items-center h-100">
                            <div class="col-md-12 text-center">
                                <h2 class="slide-title" data-animation-in="slideInLeft"></h2>
                                <h3 class="slide-sub-title" data-animation-in="slideInRight">Diari</h3>
                                <p data-animation-in="slideInLeft" data-duration-in="1.2">
                                    {{-- <a href="services.html" class="slider btn btn-primary">Our Services</a> --}}
                                    <a href="#contact-nous" class="slider btn btn-primary border">Nous joindre</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- <div class="banner-carousel-item" style="background-image:url(images/slider-main/bg2.jpg)">
        <div class="slider-content text-left">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-12">
                        <h2 class="slide-title-box" data-animation-in="slideInDown">World Class Service</h2>
                        <h3 class="slide-title" data-animation-in="fadeIn">When Service Matters</h3>
                        <h3 class="slide-sub-title" data-animation-in="slideInLeft">Your Choice is Simple</h3>
                        <p data-animation-in="slideInRight">
                            <a href="services.html" class="slider btn btn-primary border">Our Services</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-carousel-item" style="background-image:url(images/slider-main/bg3.jpg)">
        <div class="slider-content text-right">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-12">
                        <h2 class="slide-title" data-animation-in="slideInDown">Meet Our Engineers</h2>
                        <h3 class="slide-sub-title" data-animation-in="fadeIn">We believe sustainability</h3>
                        <p class="slider-description lead" data-animation-in="slideInRight">We will deal with your
                            failure that determines how you achieve success.</p>
                        <div data-animation-in="slideInLeft">
                            <a href="contact.html" class="slider btn btn-primary" aria-label="contact-with-us">Get
                                Free Quote</a>
                            <a href="about.html" class="slider btn btn-primary border"
                                aria-label="learn-more-about-us">Learn more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    </div>

    <section class="call-to-action-box no-padding">
        <div class="container">
            <div class="action-style-box">
                <div class="row align-items-center">
                    <div class="col-md-8 text-center text-md-left">
                        <div class="call-to-action-text">
                            <h3 class="action-title">Slogan</h3>
                        </div>
                    </div><!-- Col end -->
                    <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                        <div class="call-to-action-btn">
                            <a class="btn btn-dark" href="#contact-nous">Nous joindre</a>
                        </div>
                    </div><!-- col end -->
                </div><!-- row end -->
            </div><!-- Action style box -->
        </div><!-- Container end -->
    </section><!-- Action end -->

    <section id="ts-features" class="ts-features">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mt-4 mt-lg-0 ">

                    @if (!empty($mayorMessage->image))
                        <div class="card border-0 shadow-sm text-center p-3" style="max-width: 350px; margin: auto;">
                            <div class="mb-3">
                                <img src="{{ asset('documents/' . $mayorMessage->image) }}" alt="Image du maire"
                                    class="rounded-circled shadow"
                                    style="width: 90%; height: auto; object-fit: cover; border: 4px solid #f8f9fa;">
                            </div>
                            <h5 class="fw-bold text-primary text-uppercase mb-0" style="letter-spacing: 1px;">
                                Nom et prénom du maire
                            </h5>
                            <small class="text-muted fst-italic">Maire de la préfecture</small>
                        </div>
                    @endif

                    {{-- <div class="accordion accordion-group" id="our-values-accordion">
                    <div class="card">
                        <div class="card-header p-0 bg-transparent" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Safety
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#our-values-accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3 wolf moon officia aute, non cupidata
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-0 bg-transparent" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    Customer Service
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#our-values-accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3 wolf moon officia aute, non cupidata
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-0 bg-transparent" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Integrity
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#our-values-accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3 wolf moon officia aute, non cupidata
                            </div>
                        </div>
                    </div>
                </div> --}}
                    <!--/ Accordion end -->

                </div><!-- Col end -->
                <div class="col-lg-8">
                    <div class="ts-intro">
                        <h2 class="into-title">Mot du maire</h2>
                        <h3 class="into-sub-title">Préfecture de Diari</h3>
                        <div class="text-justify">
                            {!! $mayorMessage->value !!}
                        </div>
                    </div><!-- Intro box end -->

                    <div class="gap-20"></div>

                    <div class="row">


                        <div class="col-md-6">
                            <div class="ts-service-box">
                                <span class="ts-service-icon">
                                    <i class="fas fa-sliders-h"></i>
                                </span>
                                <div class="ts-service-box-content">
                                    <h3 class="service-box-title">Meilleurs partenariats</h3>
                                </div>
                            </div><!-- Service 2 end -->
                        </div><!-- col end -->
                        <div class="col-md-6">
                            <div class="ts-service-box">
                                <span class="ts-service-icon">
                                    <i class="fas fa-users"></i>
                                </span>
                                <div class="ts-service-box-content">
                                    <h3 class="service-box-title">Meilleure équipe</h3>
                                </div>
                            </div><!-- Service 2 end -->
                        </div><!-- col end -->
                    </div><!-- Content row 1 end -->


                </div><!-- Col end -->



            </div><!-- Row end -->
        </div><!-- Container end -->
    </section><!-- Feature are end -->

    <section id="facts" class="facts-area dark-bg py-5">
        <div class="container">
            <div class="facts-wrapper">
                <div class="row text-center">

                    <!-- Projets -->
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card shadow-sm border-0 p-4 h-100">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary text-white"
                                    style="width: 70px; height: 70px; font-size: 28px;">
                                    <i class="fas fa-project-diagram"></i>
                                </div>
                            </div>
                            <h2 class="fw-bold text-primary mb-1">
                                <span class="counterUp" data-count="1789">0</span>
                            </h2>
                            <h6 class="text-uppercase text-muted">Projets</h6>
                        </div>
                    </div>

                    <!-- Membres -->
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card shadow-sm border-0 p-4 h-100">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-success text-white"
                                    style="width: 70px; height: 70px; font-size: 28px;">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <h2 class="fw-bold text-success mb-1">
                                <span class="counterUp" data-count="647">0</span>
                            </h2>
                            <h6 class="text-uppercase text-muted">Membres</h6>
                        </div>
                    </div>

                    <!-- Districts -->
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card shadow-sm border-0 p-4 h-100">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-warning text-white"
                                    style="width: 70px; height: 70px; font-size: 28px;">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                            </div>
                            <h2 class="fw-bold text-warning mb-1">
                                <span class="counterUp" data-count="4000">0</span>
                            </h2>
                            <h6 class="text-uppercase text-muted">Districts</h6>
                        </div>
                    </div>

                    <!-- Partenaires -->
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card shadow-sm border-0 p-4 h-100">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-danger text-white"
                                    style="width: 70px; height: 70px; font-size: 28px;">
                                    <i class="fas fa-handshake"></i>
                                </div>
                            </div>
                            <h2 class="fw-bold text-danger mb-1">
                                <span class="counterUp" data-count="44">0</span>
                            </h2>
                            <h6 class="text-uppercase text-muted">Partenaires</h6>
                        </div>
                    </div>

                </div> <!-- Row end -->
            </div>
        </div>
    </section>


    {{-- <section id="ts-service-area" class="ts-service-area pb-0">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h2 class="section-title">We Are Specialists In</h2>
                    <h3 class="section-sub-title">What We Do</h3>
                </div>
            </div>
            <!--/ Title row end -->

            <div class="row">
                <div class="col-lg-4">
                    <div class="ts-service-box d-flex">
                        <div class="ts-service-box-img">
                            <img loading="lazy" src="images/icon-image/service-icon1.png" alt="service-icon">
                        </div>
                        <div class="ts-service-box-info">
                            <h3 class="service-box-title"><a href="#">Home Construction</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
                        </div>
                    </div><!-- Service 1 end -->

                    <div class="ts-service-box d-flex">
                        <div class="ts-service-box-img">
                            <img loading="lazy" src="images/icon-image/service-icon2.png" alt="service-icon">
                        </div>
                        <div class="ts-service-box-info">
                            <h3 class="service-box-title"><a href="#">Building Remodels</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
                        </div>
                    </div><!-- Service 2 end -->

                    <div class="ts-service-box d-flex">
                        <div class="ts-service-box-img">
                            <img loading="lazy" src="images/icon-image/service-icon3.png" alt="service-icon">
                        </div>
                        <div class="ts-service-box-info">
                            <h3 class="service-box-title"><a href="#">Interior Design</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
                        </div>
                    </div><!-- Service 3 end -->

                </div><!-- Col end -->

                <div class="col-lg-4 text-center">
                    <img loading="lazy" class="img-fluid" src="images/services/service-center.jpg"
                        alt="service-avater-image">
                </div><!-- Col end -->

                <div class="col-lg-4 mt-5 mt-lg-0 mb-4 mb-lg-0">
                    <div class="ts-service-box d-flex">
                        <div class="ts-service-box-img">
                            <img loading="lazy" src="images/icon-image/service-icon4.png" alt="service-icon">
                        </div>
                        <div class="ts-service-box-info">
                            <h3 class="service-box-title"><a href="#">Exterior Design</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
                        </div>
                    </div><!-- Service 4 end -->

                    <div class="ts-service-box d-flex">
                        <div class="ts-service-box-img">
                            <img loading="lazy" src="images/icon-image/service-icon5.png" alt="service-icon">
                        </div>
                        <div class="ts-service-box-info">
                            <h3 class="service-box-title"><a href="#">Renovation</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
                        </div>
                    </div><!-- Service 5 end -->

                    <div class="ts-service-box d-flex">
                        <div class="ts-service-box-img">
                            <img loading="lazy" src="images/icon-image/service-icon6.png" alt="service-icon">
                        </div>
                        <div class="ts-service-box-info">
                            <h3 class="service-box-title"><a href="#">Safety Management</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
                        </div>
                    </div><!-- Service 6 end -->
                </div><!-- Col end -->
            </div><!-- Content row end -->

        </div>
        <!--/ Container end -->
    </section><!-- Service end --> --}}

    {{-- projets --}}
    <section id="project-area" class="project-area solid-bg">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h2 class="section-title">Diari</h2>
                    <h3 class="section-sub-title">Projets</h3>
                </div>
            </div>
            <!--/ Title row end -->

            <div class="row">
                <div class="col-12">
                    <!-- Filtres dynamiques -->
                    <div class="shuffle-btn-group">
                        <label class="active" for="all">
                            <input type="radio" name="shuffle-filter" id="all" value="all"
                                checked="checked">Tous
                        </label>
                        <label for="prevu">
                            <input type="radio" name="shuffle-filter" id="prevu" value="prévu">Prévu
                        </label>
                        <label for="encours">
                            <input type="radio" name="shuffle-filter" id="encours" value="en cours">En cours
                        </label>
                        <label for="realise">
                            <input type="radio" name="shuffle-filter" id="realise" value="realisé">Réalisé
                        </label>
                    </div><!-- project filter end -->

                    <div class="row shuffle-wrapper">
                        <div class="col-1 shuffle-sizer"></div>

                        @foreach ($projects as $project)
                            <div class="col-lg-4 col-md-6 shuffle-item" data-groups='["{{ $project->status }}"]'>
                                <div class="project-img-container">
                                    <a class="gallery-popup"
                                        
                                        href="{{ $project->image ? asset('documents/' . $project->image) : asset('default_images/frontend/project_default_image.jpg') }}"
                                        aria-label="project-img">

                                        <img class="img-fluid project-img"
                                            src="{{ $project->image ? asset('documents/' . $project->image) : asset('default_images/frontend/project_default_image.jpg') }}"
                                            alt="{{ $project->title }}">

                                        <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                                    </a>

                                    <div class="project-item-info">
                                        <div class="project-item-info-content">
                                            <h3 class="project-item-title">
                                                <a href="{{ route('project_show',$project->slug) }}">
                                                    {{ Str::limit($project->title, 40, '...') }}
                                                </a>
                                            </h3>
                                            <p class="project-cat text-capitalize">{{ $project->status }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- shuffle item end -->
                        @endforeach

                    </div><!-- shuffle end -->
                </div>

                <div class="col-12">
                    <div class="general-btn text-center">
                        {{-- <a class="btn btn-primary" href="{{ route('projects.index') }}">Voir tous les projets</a> --}}
                    </div>
                </div>
            </div><!-- Content row end -->

        </div>
        <!--/ Container end -->
    </section><!-- Project area end -->

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h3 class="column-title">Partenaires</h3>

                    <div id="testimonial-slide" class="testimonial-slide owl-carousel owl-theme">
                        @foreach ($partners as $partner)
                            <div class="item">
                                <div class="quote-item">

                                    <div class="quote-item-footer">
                                        <img loading="lazy" class="testimonial-thumb"
                                            src="{{ asset('documents/' . $partner->image) }}" alt="testimonial">
                                        <div class="quote-item-info">
                                            <h3 class="quote-author">{{ $partner->name }}</h3>
                                            <span class="quote-subtext">{{ $partner->acronym }}</span> <br>
                                            @if ($partner->link)
                                                <a href="{{ $partner->link }}" class="btn btn-info btn-sm">Découvrir <i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div><!-- Quote item end -->
                            </div>
                        @endforeach
                    </div>
                    <!--/ Testimonial carousel end-->
                </div><!-- Col end -->

                <div class="col-lg-4 mt-5 mt-lg-0 bg-primary text-white p-4 rounded shadow">
                    <h4 class="mb-3">Vous souhaitez devenir partenaire ?</h4>
                    <p>Rejoignez notre réseau de partenaires et contribuez au développement de nos projets.</p>
                    <a href="#" class="btn btn-light btn-sm mt-2">
                        <i class="fa fa-handshake"></i> Devenir partenaire
                    </a>
                </div>

            </div>
            <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </section><!-- Content end -->

    <section class="subscribe no-padding" id="contact-nous"> 
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="subscribe-call-to-acton">
                        <h3>Nous joindre</h3>
                        <h4>(+224) 000-000-000</h4>
                    </div>
                </div><!-- Col end -->

                <div class="col-lg-8">
                    <div class="ts-newsletter row align-items-center">
                        {{-- <div class="col-md-5 newsletter-introtext">
                            <h4 class="text-white mb-0">Newsletter Sign-up</h4>
                            <p class="text-white">Latest updates and news</p>
                        </div>

                        <div class="col-md-7 newsletter-form">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <label for="newsletter-email" class="content-hidden">Newsletter Email</label>
                                    <input type="email" name="email" id="newsletter-email"
                                        class="form-control form-control-lg" placeholder="Your your email and hit enter"
                                        autocomplete="off">
                                </div>
                            </form>
                        </div> --}}
                    </div><!-- Newsletter end -->
                </div><!-- Col end -->

            </div><!-- Content row end -->
        </div>
        <!--/ Container end -->
    </section>
    <!--/ subscribe end -->

    <section id="news" class="news">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h2 class="section-title">Actualités</h2>
                    <h3 class="section-sub-title">Communiqués</h3>
                </div>
            </div>
            <!--/ Title row end -->

            <div class="row">
                @foreach ($recent_posts as $recent_post)
                    
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="latest-post">
                        <div class="latest-post-media">
                            <a href="{{ route('post_show',$recent_post->slug) }}">
                            @if ($recent_post->image)
                                <img loading="lazy" class="img-fluid w-100" alt="img" src="{{ asset('documents/'.$recent_post->image) }}" style="height: 300px; object-fit: cover;">
                            @else
                                <img loading="lazy" class="img-fluid w-100" alt="image par défaut" src="{{ asset('default_images/frontend/post_default_image.jpg') }}" style="height: 300px; object-fit: cover;">
                            @endif
                        </a>
                        </div>
                        <div class="post-body">
                            <h4 class="post-title">
                                <a href="{{ route('post_show',$recent_post->slug) }}" class="d-inline-block">{{ Str::limit($recent_post->title,50,'...') }}</a>
                            </h4>
                            {{-- <div class="latest-post-meta">
                                <span class="post-item-date">
                                    <i class="fa fa-clock-o"></i> {{ $recent_post->created_at }}
                                </span>
                            </div> --}}
                        </div>
                    </div><!-- Latest post end -->
                </div><!-- 1st post col end -->
                @endforeach

            </div>
            <!--/ Content row end -->

            <div class="general-btn text-center mt-4">
                <a class="btn btn-primary" href="{{ route('posts') }}">Voir plus</a>
            </div>

        </div>
        <!--/ Container end -->
    </section>
    <!--/ News end -->



@endsection
