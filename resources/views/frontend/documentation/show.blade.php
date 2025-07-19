@extends('layouts.main-frontend-layout')
@section('title')
    {{ $page->title }}
@endsection
@section('content')
    @include('includes.frontend.banner')
    <section id="main-container" class="main-container pb-2">

        <div class="container ">
            <div class="row">

                @include('includes.frontend.left_sidebar')

                <div class="col-lg-9 mb-5 mb-lg-0 order-0 order-lg-1">
                    <div class="post">
                        <div class="post-body">
                            {{-- <div class="entry-header">
                                <div class="post-meta">
                                    <span class="post-author">
                                        <i class="far fa-user"></i><a href="#"> Admin</a>
                                    </span>
                                    <span class="post-cat">
                                        <i class="far fa-folder-open"></i><a href="#"> News</a>
                                    </span>
                                    <span class="post-meta-date"><i class="far fa-calendar"></i> June 14, 2016</span>
                                    <span class="post-comment"><i class="far fa-comment"></i> 03<a href="#"
                                            class="comments-link">Comments</a></span>
                                </div>
                                <h2 class="entry-title">
                                    <a href="news-single.html">We Just Completes $17.6 million Medical Clinic in
                                        Mid-Missouri</a>
                                </h2>
                            </div><!-- header end --> --}}

                            <div class="entry-content text-justify">
                                <div class="accordion accordion-group accordion-classic" id="construction-accordion">
                                        @foreach ($documentations as $documentation)
                                        <div class="card">
                                            <div class="card-header p-0 bg-transparent" id="heading{{ $documentation->id }}">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-block text-left" type="button"
                                                        data-toggle="collapse" data-target="#collapse{{ $documentation->id }}"
                                                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $documentation->id }}">
                                                        {{ $loop->iteration }} . {{ $documentation->title }}
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="collapse{{ $documentation->id }}" class="collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ $documentation->id }}"
                                                data-parent="#construction-accordion">
                                                <div class="card-body">
                                                    <p class="text-justify"> {!! Str::limit($documentation->description, 200, '...') !!} </p>
                                                    @if ($documentation->file)
                                                        <a href="{{ asset('documents/' . $documentation->file) }}" target="_blank" class="btn btn-sm btn-success">Voir le document</a>
                                                    @endif
                                                    

                                                </div>
                                            </div>

                                        </div>
                                        @endforeach
                                    </div>
                                    


                            </div><!-- post-body end -->
                        </div><!-- 1st post end -->



                    </div><!-- Content Col end -->



                </div><!-- Main row end -->


            </div>
                @include('includes.frontend.team')
            </div><!-- Container end -->
    </section><!-- Main container end -->
@endsection
