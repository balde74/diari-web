@extends('layouts.main-frontend-layout')
@section('title')
{{ $page->slug }}
@endsection
@section('content')

@include('includes.frontend.banner')

        <div class="container mt-2">
            <div class="row">

                 @include('includes.frontend.left_sidebar')

                <div class="col-lg-9 mb-5 mb-lg-0 order-0 order-lg-1" >
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
                                <p>
                                    {!! $page->content !!}
                                </p>
                            </div>

                          

                        </div><!-- post-body end -->
                    </div><!-- 1st post end -->



                </div><!-- Content Col end -->

                

            </div><!-- Main row end -->


        @include('includes.frontend.team')
        </div><!-- Container end -->
    </section><!-- Main container end -->
@endsection
