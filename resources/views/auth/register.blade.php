@extends('master.layout')
@section('content')
<main role="main ">
  <div class="py-5">
    <div class="row padg-down justify-content-md-center justify-content-sm-center">

      <div class="login col-md-6 col-sm-10 ">
        <ul>
          <li><a  href="{{url('/login')}}">Iniciar Sesión</a></li>
          <li><a class="active" href="{{url('/register')}}">Crear Cuenta</a></li>
        </ul>
        <form class="brdr-box col-md-12" method="POST" action="{{ route('register') }}">
                @csrf
          <div class="row mb-3">
            <div class="col-md-6 mt-4">
              <label for="name" class="">Nombres</label>
              <!--<input type="name" id="inputName" class="form-control"  required autofocus>-->

              <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="col-md-6 mt-4">
              <label for="last_name" class="">Apellidos</label>
              <input id="last_name" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"  value="{{ old('last_name') }}"  autocomplete="last_name" autofocus>
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-6 mt-4">
              <label for="email" class="">Email</label>
              <!--<input type="email" id="inputEmail" class="form-control"  required autofocus>-->
              <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="col-md-6 mt-4">
              <label for="password" class="">Contraseña</label>
             <!-- <input type="password" id="inputPassword" class="form-control" required>-->
              <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror"  required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mt-4">
              <label for="document_nro" class="">DNI(opcional)</label>
              <input type="text" id="document_nro" name="document_nro" class="form-control"  autofocus>
            </div>
          </div>
          <div class="forgotLogin checkbox mb-3 text-muted">
              <label class="container mt-4">
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>Me gustaría recibir comunicaiones promocionales (Recibirás un email de confirmación)
              </label>

              <label class="container mt-4">
                <input type="checkbox">
                <span class="checkmark"> </span>Acepto los <a class="redlink"href="">términos y condiciones y la politica de Privacidad y Tratamientos de Datos Personales</a>
              </label>
          </div>
          <div class="col-md-12 text-center ">
            <button type="submit" class="btn btn-lg  btn-clearblue mb-3 mt-3">
                    Completar Registro <i class="icon-right fa fa-angle-right"></i>
                </button>
          </div>


        </form>
      </div>
    </div>
  </div>
</main>
@endsection



<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">


                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



-->
