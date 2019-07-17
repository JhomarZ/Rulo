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
                <a class="nav-link" href="{{url('/login')}}">
                <img src="{{asset('img/icon-user.png')}}"><span>Usuario</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                <img src="{{asset('img/icon-alert.png')}}"><span>Notificación</span></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
