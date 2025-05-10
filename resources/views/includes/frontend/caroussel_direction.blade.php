<style>
    @media (max-width: 768px) {


        #block {
            display: block;
        }

        .content {
            display: none;
        }


    }
</style>


<div class="tp-banner-container">
    <div class="tp-bannerr">
        <ul>
            @foreach ($caroussels as $caroussel)
                <li data-transition="slidedown" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                    <img src="{{ asset('documents/' . $caroussel->image) }} " alt="slider-image">
                    <div class="tp-caption sft desc-slide center color-white color-full" id="block" data-x="160"
                        data-y="400" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">
                        <div class="title main-color-1" title="{{ $caroussel->titre }}">
                            {{ str_limit($caroussel->titre, 40) ?? 'Institut Supérieur de Formation A Distance' }} </div>
                        <div class="content">{{ str_limit($caroussel->description, 150) }}</div>
                        @if ($caroussel->lien)
                            <a href="{{ $caroussel->lien }}" class="btn btn-primary">Voir l'article</a>
                        @endif
                    </div>
                </li>
            @endforeach

        </ul>
    </div>
</div>

@section('autres_scripts')
    <script>
        $(document).ready(function() {
            $('.tp-bannerr').show().revolution({
                dottedOverlay: "none",
                delay: 2000,
                startwidth: 1170,
                startheight: 789,
                hideThumbs: 200,
                thumbWidth: 100,
                thumbHeight: 50,
                thumbAmount: 5,
                navigationType: "bullet",
                navigationHAlign: "center",
                navigationVAlign: "center",
                navigationVOffset: 20,
                navigationArrows: "solo",
                navigationStyle: "square",
                touchenabled: "on",
                onHoverStop: "on",
                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,
                parallax: "mouse",
                parallaxBgFreeze: "on",
                parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],
                keyboardNavigation: "off",
                navigationHAlign: "top",
                navigationVAlign: "center",
                navigationHOffset: 50,
                navigationVOffset: 20,
                soloArrowLeftHalign: "left",
                soloArrowLeftValign: "center",
                soloArrowLeftHOffset: 15,
                soloArrowLeftVOffset: -400,
                soloArrowRightHalign: "right",
                soloArrowRightValign: "center",
                soloArrowRightHOffset: 15,
                soloArrowRightVOffset: -400,
                shadow: 0,
                fullWidth: "on",
                fullScreen: "off",
                spinner: "spinner4",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                forceFullWidth: "off",
                hideThumbsOnMobile: "off",
                hideNavDelayOnMobile: 1500,
                hideBulletsOnMobile: "off",
                hideArrowsOnMobile: "off",
                hideThumbsUnderResolution: 0,
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                startWithSlide: 0,

                fullScreenOffsetContainer: ""
            });
        });
    </script>
@endsection
