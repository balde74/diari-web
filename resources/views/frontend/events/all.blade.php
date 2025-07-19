@extends('layouts.main-frontend-layout')
@section('title')
    Actualités
@endsection
@section('content')
    @include('includes.frontend.banner')
    <section id="main-container" class="main-container pb-2">
        <div class="container mt-2">
        <div class="row">

            {{-- @include('includes.frontend.left_sidebar') --}}
            @foreach ($events as $event)
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="ts-service-box">
                        <div class="ts-service-image-wrapper">
                            @if ($event->image)
                                <img loading="lazy" class="w-100" src="{{ asset('documents/'.$event->image) }}" alt="service-image" style="height: 300px; object-fit: cover;"> 
                            @else
                                <img loading="lazy" class="w-100" src="{{ asset('default_images/frontend/event_default_image.jpg') }}" alt="event-image" style="height: 300px; object-fit: cover;"> 
                            @endif
                        </div>
                        <div >
                            {{-- <div class="ts-service-box-img">
                                <img loading="lazy" src="images/icon-image/service-icon1.png" alt="service-icon">
                            </div> --}}
                            <div >
                                <h3 class="service-box-title"><a href="service-single.html">{{ Str::limit($event->title,50,'...') }}</a></h3>
                                
                            <div class="d-flex flex-column flex-md-row justify-content-between">
                                <p class="mb-1 mb-md-0">
                                    <i class="fas fa-map-marker-alt mr-2 text-danger"></i>{{ $event->place }}
                                </p>
                                <p class="mb-0">
                                    <i class="far fa-calendar-alt mr-2"></i>{{ $event->date }}
                                </p>
                            </div>
                            <a class="learn-more d-inline-block" href="service-single.html" aria-label="service-details"><i class="fa fa-caret-right"></i> Voir plus</a>
                            </div>
                        </div>
                    </div><!-- Service1 end -->
                </div><!-- Col 1 end -->
                
            @endforeach
                
                
        </div>
        <div class="d-flex justify-content-center my-4">
            {{ $events->links() }}
        </div>


        @include('includes.frontend.team')
    </div><!-- Container end -->
    </section><!-- Main container end -->
@endsection
