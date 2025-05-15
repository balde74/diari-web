<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('/') }}" class="site_title"><span>{{ config('app.name') }}</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
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
                    <li><a><i class="fa fa-home"></i> Districts <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('district.index') }}">Liste des districts</a></li>
                            {{-- <li><a href="{{ route('district.create') }}">Nouveau district</a></li> --}}
                        </ul>
                    </li>

                    <li><a><i class="fa fa-home"></i> Evènements <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('event.index') }}">Liste des évènements</a></li>
                            <li><a href="{{ route('event.create') }}">Nouvel évènement</a></li>
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
            {{-- <ul class="nav side-menu">

                    @if (Auth::user()->role_id == 2)
                        <li><a href="{{ route('direction.show', Auth::user()->direction_id) }}"><i
                                    class="fa fa-home"></i> Ma direction </a>
                            {{-- <ul class="nav child_menu">
                    <li><a href="{{ route('institut.index') }}">Liste des éléments</a></li>
                    <li><a href="{{ route('institut.create') }}">Nouvel éléments</a></li>
                    </ul> --}
                        </li>
                    @endif

                    @if (Auth::user()->role->id == 1)


                        <li><a><i class="fa fa-home"></i> Institut <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('institut.index') }}">Liste des éléments</a></li>
                                <li><a href="{{ route('institut.create') }}">Nouvel éléments</a></li>
                            </ul>
                        </li>

                        <li><a><i class="fa fa-info-circle"></i> Infos complementaires <span
                                    class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                @if ($mot_directeurs)
                                    <li><a href="{{ route('mot_directeur.edit', $mot_directeurs[0]) }}">Mot du
                                            directeur</a></li>
                                    <li><a href="{{ route('nbre_visite') }}">Nombre de visite</a></li>
                                @endif
                            </ul>
                        </li>

                        <li><a><i class="fa fa-align-justify"></i> Programmes <span
                                    class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('programme.index') }}">Liste des programmes</a></li>
                                <li><a href="{{ route('programme.create') }}">Nouveau programme</a></li>
                            </ul>
                        </li>

                        <li><a><i class="fa fa-search"></i> Projets de recherche <span
                                    class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('recherche.index') }}">Liste des projets</a></li>
                                <li><a href="{{ route('recherche.create') }}">Nouveau projet</a></li>
                            </ul>
                        </li>

                        <li><a><i class="fa fa-pie-chart"></i> Résultats de recherche <span
                                    class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('resultat.index') }}">Liste des résultats</a></li>
                                <li><a href="{{ route('resultat.create') }}">Nouveau résultat</a></li>
                            </ul>
                        </li>

                        <li><a><i class="fa fa-book"></i> Documentation <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('documentation.index') }}">Liste des documents</a></li>
                                <li><a href="{{ route('documentation.create') }}">Nouveau document</a></li>
                            </ul>
                        </li>

                    @endif


                    <li><a><i class="fa fa-newspaper-o"></i> Articles <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('article.index') }}">Liste des articles</a></li>
                            <li><a href="{{ route('article.create') }}">Nouvel article</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-calendar"></i> Évènement <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('evenement.index') }}">Liste des évènements</a></li>
                            <li><a href="{{ route('evenement.create') }}">Nouvel évènement</a></li>
                        </ul>
                    </li>


                    <li><a><i class="fa fa-image"></i> Caroussels <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('caroussel.index') }}">Liste images</a></li>
                            <li><a href="{{ route('caroussel.create') }}">Nouvelle image</a></li>

                        </ul>
                    </li>

                    @if (Auth::user()->role->id == 1)
                        <li><a><i class="fa fa-suitcase"></i> Centres régionaux <span
                                    class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('direction.index') }}">Liste des centre</a></li>
                                <li><a href="{{ route('direction.create') }}">Nouveau centre</a></li>

                            </ul>
                        </li>

                        <li><a><i class="fa fa-users"></i> Utilisateurs <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('user.index') }}">Liste des utilisateurs</a></li>
                                <li><a href="{{ route('user.create') }}">Nouvel utilisateur</a></li>

                            </ul>
                        </li>

                        <li><a><i class="fa fa-coffee  "></i> Partenaires <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('partenaire.index') }}">Liste des partenaires</a></li>
                                <li><a href="{{ route('partenaire.create') }}">Nouveau partenaire</a></li>

                            </ul>
                        </li>
                    @endif


                    @if (Auth::user()->role->id == 1)
                        <li><a><i class="fa fa-user-md  "></i> Personnel <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('personnel.index') }}">Liste du personnel</a></li>
                                <li><a href="{{ route('personnel.create') }}">Nouveau personnel</a></li>

                            </ul>
                        </li>

                        <li><a><i class="fa fa-bar-chart"></i> Slogans <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('slogan.index') }}">Liste des slogans</a></li>
                                <li><a href="{{ route('slogan.create') }}">Nouveau slogan</a></li>

                            </ul>
                        </li>
                    @endif


                    <li><a><i class="fa fa-map-marker"></i> Contacts <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('contact.index') }}">Liste des contacts</a></li>
                            <li><a href="{{ route('contact.create') }}">Nouveau contact</a></li>

                        </ul>
                    </li>

                    <li><a><i class="fa fa-video-camera"></i> Vidéos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('video.index') }}">Liste des vidéos</a></li>
                            <li><a href="{{ route('video.create') }}">Nouvelle vidéo</a></li>

                        </ul>
                    </li>

                </ul> --}}
        </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
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
    </div>
    <!-- /menu footer buttons -->
</div>
</div>
