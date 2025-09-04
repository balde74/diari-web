@extends('layouts.main-frontend-layout')
@section('title')
     @if($project->status == 'realisé')
        réalisation
    @else
        projet en cours
    @endif
@endsection
@section('content')
    @include('includes.frontend.banner')
    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">

                <div class="col-lg-9 mb-5 mb-lg-0">

                    <div class="post-content post-single">
                        <div class="post-media post-image">
                            @if ($project->image)
                                <img loading="lazy" class="w-100 img-fluid" src="{{ asset('documents/' . $project->image) }}"
                                    alt="service-image" style="height: 300px; object-fit: cover;">
                            @else
                                <img loading="lazy" class="w-100 img-fluid"
                                    src="{{ asset('default_images/frontend/project_default_image.jpg') }}" alt="post-image"
                                    style="height: 300px; object-fit: cover;">
                            @endif
                        </div>

                        <div class="post-body">
                            <div class="entry-header">
                                <div class="post-meta">
                                    <span class="post-author ">
                                        <i class="far fa-calendar text-primary"></i><a href="#"> Du {{ $project->start_date }}</a>
                                    </span>
                                    <span class="post-cat">
                                        <i class="far fa-folder-open"></i><a href="#"> Projet</a>
                                    </span>
                                    <span class="post-author ">
                                        <i class="far fa-calendar-check text-danger"></i><a href="#"> Au {{ $project->end_date }}</a>
                                    </span>
                                    {{-- <span class="post-meta-date"><i class="far fa-calendar"></i> {{ $project->end_date }}</span> --}}
                                    {{-- <span class="post-comment"><i class="far fa-comment"></i> 03<a href="#"
                                            class="comments-link">Comments</a></span> --}}
                                </div>
                                <h2 class="entry-title">
                                    {{ $project->title }}
                                </h2>
                            </div><!-- header end -->

                            <div class="entry-content">
                                <div class="text-justify">
                                    {!! $project->description !!}
                                </div>

                             
                            </div>

                            <div class="tags-area d-flex align-items-center justify-content-between">
                                <div class="post-tags">
                                    @if ($project->budget)
                                        <a href="#">{{ $project->budget ? number_format($project->budget, 2, ',', ' ') . ' GNF' : '-' }}</a>
                                    @endif
                                    
                                    <a href="#">{{ ucfirst($project->status) }}</a>
                                    {{-- <a href="#">Planning</a> --}}
                                </div>
                                <div class="share-items right">
                                    <ul class="post-social-icons list-unstyled">
                                        <li class="social-icons-head">Share:</li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div><!-- post-body end -->
                    </div><!-- post content end -->

                                     <p>commentaire</p>

                
                    <p>Ajout commentaire</p>
                </div><!-- Content Col end -->

                             @include('includes/frontend/left_sidebar')

            </div><!-- Main row end -->

        </div><!-- Conatiner end -->
    </section><!-- Main container end -->
@endsection
