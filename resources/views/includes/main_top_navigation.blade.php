<div class="top_nav">
  <div class="nav_menu">
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <nav class="nav navbar-nav">
      <ul class=" navbar-right">
        <li class="nav-item dropdown open" style="padding-left: 15px;">
          <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user"></i> {{ Auth::user()->getFullName() }}
          </a>
          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <!-- <a class="dropdown-item"  href="javascript:;"> Profile</a>
              <a class="dropdown-item"  href="javascript:;">
                <span class="badge bg-red pull-right">50%</span>
                <span>Settings</span>
              </a>
          <a class="dropdown-item"  href="javascript:;">Help</a> -->

           

            {{-- <a class="dropdown-item"  href="{{ route('user.edit',Auth::user()->id) }}"> <span class="fa fa-user"></span> Mon profil</a> --}}
            {{-- <a class="dropdown-item"  href="{{ route('form_changement_mot_de_passe') }}"> <span class="fa fa-edit"></span> Changement de mot de passe</a> --}}
            <a class="dropdown-item"  href=""
                onclick="event.preventDefault(); 
                  document.getElementById('logout-form').submit(); "><i class="fa fa-sign-out pull-left"></i> Déconnexion</a>

                  <form action="{{ route('logout') }}" id="logout-form" method="post">
                    @csrf
                  </form>
          </div>
        </li>
      

      </ul>
    </nav>
  </div>
</div>