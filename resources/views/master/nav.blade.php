<nav class="navRulo navbar navbar-expand-lg fixed-top navbar-dark bg-dark ">
        <div class="alignnav container d-flex justify-content-between">
          <a class=" logo navbar-brand mr-auto mr-lg-0" href="{{url('/')}}">
          <img class="" src="{{asset('img/logoRulo.png')}}"></a>
          <button id="toggleRulo" class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="optionsRulo navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-md-auto ">
              <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">
                <img src="{{asset('img/icon-tienda.png')}}">
                <span> Tienda </span>
                </a>
              </li>
              <li class="nav-item">
                <img src="{{asset('img/icon-user.png')}}"><span>
                    @auth
                        <a class="nav-link" href="{{url('/perfil/'.Auth::user()->id)}}">{{Auth::user()->name}}</span></a>
                    @else
                        <a class="nav-link" href="{{url('/login')}}">Usuario</span></a>
                    @endauth
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                <img src="{{asset('img/icon-alert.png')}}"><span>Notificación</span></a>
              </li>
              @auth
                    <li class="nav-item">
                        <img src="{{asset('img/logout.png')}}"><span>
                        <a class="nav-link" href="{{url('/logout')}}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Salir</span></a>
                    </li>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endauth

            </ul>
          </div>
        </div>
      </nav>
