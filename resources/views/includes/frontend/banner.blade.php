
<div id="banner-area" class="banner-area" style="background-image:url({{ asset('default_images/frontend/banner.jpg') }});">
    <div class="overlay"></div>
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">{{ $page->title }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center ">
                                <li class="breadcrumb-item"><a href="#"> Accueil</a></li>
                                <li class="breadcrumb-item"><a href="#"> {{ $page->parent_zone }}</a></li>
                                <li class="breadcrumb-item"><a href="#">{{ $page->title }}</a></li>
                            </ol>
                        </nav>
                    </div>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Banner text end -->
</div><!-- Banner area end -->