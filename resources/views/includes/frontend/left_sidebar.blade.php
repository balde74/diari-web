<div class="col-lg-3 order-1 order-lg-0 " >

    <div class="sidebar sidebar-left">
        <div class="widget recent-posts">
            <h3 class="widget-title">Articles récents</h3>
            <ul class="list-unstyled">
                @foreach ($recent_posts->sortByDesc('created_at') as $recent_post)
                    
                <li class="d-flex align-items-center">
                    <div class="posts-thumb">
                        <a href="{{ route('post_show',$recent_post->slug) }}">
                            @if ($recent_post->image)
                                <img loading="lazy" alt="img" src="{{ asset('documents/'.$recent_post->image) }}">
                            @else
                                <img loading="lazy" alt="image par défaut" src="{{ asset('default_images/frontend/post_default_image.jpg') }}">
                            @endif
                        </a>
                    </div>
                    <div class="post-info">
                        <h4 class="entry-title">
                            <a href="{{ route('post_show',$recent_post->slug) }}">{{ $recent_post->title }}</a>
                        </h4>
                    </div>
                </li><!-- 1st post end-->
                @endforeach
            </ul>

        </div><!-- Recent post end -->

        <div class="widget recent-posts">
            <h3 class="widget-title">évènements Récents</h3>
            <ul class="list-unstyled">
                @foreach ($recent_events->sortByDesc('created_at') as $recent_event)
                    
                <li class="d-flex align-items-center">
                    <div class="posts-thumb">
                        <a href="{{ route('event_show',$recent_event->id) }}">
                            @if ($recent_event->image)
                                <img loading="lazy" alt="img" src="{{ asset('documents/'.$recent_event->image) }}">
                            @else
                                <img loading="lazy" alt="image par défaut" src="{{ asset('default_images/frontend/event_default_image.jpg') }}">
                            @endif
                        </a>
                    </div>
                    <div class="post-info">
                        <h4 class="entry-title">
                            <a href="{{ route('event_show',$recent_event->id) }}">{{$recent_event->title}}</a>
                        </h4>
                    </div>
                </li><!-- 1st post end-->
                @endforeach

            </ul>

        </div><!-- Recent post end -->

      

        <div class="widget">
            <h3 class="widget-title">Réalisations Récentes </h3>
            <ul class="arrow nav nav-tabs">
                @foreach ($recent_projects as $recent_project)
                    <li><a href="{{ route('project_show',$recent_project->slug) }}">{{ $recent_project->title }}</a></li>
                @endforeach
            </ul>
        </div><!-- Archives end -->

        {{-- <div class="widget widget-tags">
            <h3 class="widget-title">Tags </h3>

            <ul class="list-unstyled">
                <li><a href="#">Construction</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Project</a></li>
                <li><a href="#">Building</a></li>
                <li><a href="#">Finance</a></li>
                <li><a href="#">Safety</a></li>
                <li><a href="#">Contracting</a></li>
                <li><a href="#">Planning</a></li>
            </ul>
        </div><!-- Tags end --> --}}


    </div><!-- Sidebar end -->
</div><!-- Sidebar Col end -->