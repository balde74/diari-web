<section id="ts-team" class="ts-team">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h2 class="section-title">L'exellence</h2>
                <h3 class="section-sub-title">Notre équipe</h3>
            </div>
        </div><!--/ Title row end -->

        <div class="row">
            <div class="col-lg-12">
                <div id="team-slide" class="team-slide">
                    @foreach ($staffs as $staff)
                        <div class="item">
                            <div class="ts-team-wrapper">
                                <div class="team-img-wrapper">
                                @if ($staff->image)
                                    <img loading="lazy" alt="img" src="{{ asset('documents/'.$staff->image) }}" class="w-100">
                                @else
                                    <img loading="lazy" alt="image par défaut" src="{{ asset('default_images/frontend/staff_default_image.jpg') }}" class="w-100">
                                @endif
                                    {{-- <img loading="lazy" class="w-100" src="images/team/team1.jpg" alt="team-img"> --}}
                                </div>
                                <div class="ts-team-content">
                                    <h3 class="ts-name">{{ $staff->name }}</h3>
                                    <p class="ts-description">{{$staff->position}}</p>
                                    <p class="ts-designation">{{ $staff->department }}</p>
                                    <p class="ts-description">{{ $staff->email }}</p>
                                    {{-- <div class="team-social-icons">
                                        <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="#"><i class="fab fa-google-plus"></i></a>
                                        <a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>
                                    </div><!--/ social-icons--> --}}
                                </div>
                            </div><!--/ Team wrapper end -->
                        </div><!-- Team 1 end -->
                    @endforeach



                </div><!-- Team slide end -->
            </div>
        </div><!--/ Content row end -->
    </div><!--/ Container end -->
</section><!--/ Team end -->
