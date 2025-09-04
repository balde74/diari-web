<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('/') }}" class="site_title"><span>{{ config('app.name') }}</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="/default_images/default_image_staff.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Bienvenue,</span>
                <h2>{{ auth::user()->getFullname() }}</h2>
            </div>
        </div> -
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>


                <ul class="nav side-menu">
                    <li><a><i class="fa fa-cog"></i> Préfecture <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('mayor_message.edit') }}">Mot du maire</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-home"></i> Districts <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('district.index') }}">Liste des districts</a></li>
                            {{-- <li><a href="{{ route('district.create') }}">Nouveau district</a></li> --}}
                        </ul>
                    </li>

                    <li><a><i class="fa fa-book"></i> Pages <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('page.index') }}">Liste des pages</a></li>
                            <li><a href="{{ route('page.create') }}">Nouvelle page</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-calendar"></i> Evènements <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('event.index') }}">Liste des évènements</a></li>
                            <li><a href="{{ route('event.create') }}">Nouvel évènement</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-user-md  "></i> Personnels <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('staff.index') }}">Liste du personnel</a></li>
                            <li><a href="{{ route('staff.create') }}">Nouveau personnel</a></li>

                        </ul>
                    </li>

                    <li><a><i class="fa fa-coffee  "></i> Partenaires <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('partner.index') }}">Liste des partenaires</a></li>
                            <li><a href="{{ route('partner.create') }}">Nouveau partenaire</a></li>

                        </ul>
                    </li>

                    <li><a><i class="fa fa-book"></i> Documentations <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('documentation.index') }}">Liste des documents</a></li>
                            <li><a href="{{ route('documentation.create') }}">Nouveau document</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-image"></i> Caroussels <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('carousel.index') }}">Liste des images</a></li>
                            <li><a href="{{ route('carousel.create') }}">Nouvelle image</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-newspaper-o"></i> Articles <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('post.index') }}">Liste des articles</a></li>
                            <li><a href="{{ route('post.create') }}">Nouvel article</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-rocket"></i> Projets <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('project.index') }}">Liste des projet</a></li>
                            <li><a href="{{ route('project.create') }}">Nouveau projet</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-users"></i> Utilisateurs <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('user.index') }}">Liste des utilisateurs</a></li>
                            <li><a href="{{ route('user.create') }}">Nouvel utilisateur</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    {{-- <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Déconnexion" href="">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div> --}}
    <!-- /menu footer buttons -->
</div>
</div>
