@extends('layouts.main-frontend-layout')
@section('title')
    réalisations
@endsection
@section('content')
    @include('includes.frontend.banner')
    <section id="main-container" class="main-container pb-2">
        <div class="container mt-2">
        <div class="row">

            {{-- @include('includes.frontend.left_sidebar') --}}
            @foreach ($projects as $project)
                <div class="col-lg-4 col-md-6 mb-5">
                <div class="ts-service-box">
                    <div class="ts-service-image-wrapper">
                        @if ($project->image)
                            <img loading="lazy" class="w-100" src="{{ asset('documents/'.$project->image) }}" alt="service-image" style="height: 300px; object-fit: cover;"> 
                        @else
                            <img loading="lazy" class="w-100" src="{{ asset('default_images/frontend/project_default_image.jpg') }}" alt="project-image" style="height: 300px; object-fit: cover;"> 
                        @endif
                    </div>
                    <div class="d-flex">
                        {{-- <div class="ts-service-box-img">
                            <img loading="lazy" src="images/icon-image/service-icon1.png" alt="service-icon">
                        </div> --}}
                        <div >
                            <h3 class="service-box-title"><a href="service-single.html">{{ Str::limit($project->title,50,'...') }}</a></h3>
                            {{-- <p> {!! Str::limit($project->description, 500, ' ...') !!} </p> --}}
                            <p>
                                <span class="badge 
                                  @if($project->status == 'prévu') badge-secondary
                                  @elseif($project->status == 'en cours') badge-warning
                                  @elseif($project->status == 'réalisé' || $project->status == 'realisé' ) badge-success
                                  @endif
                                ">
                                  {{ ucfirst($project->status) }}
                                </span>
                              </p>
                            <a class="learn-more d-inline-block" href="service-single.html" aria-label="service-details"><i class="fa fa-caret-right"></i> Voir plus</a>
                        </div>
                    </div>
                </div><!-- Service1 end -->
                </div><!-- Col 1 end -->
                
            @endforeach
          
               
        </div>
        <div class="d-flex justify-content-center my-4">
            {{ $projects->links() }}
        </div>


        @include('includes.frontend.team')
    </div><!-- Container end -->
    </section><!-- Main container end -->
@endsection
