@extends('master.layout')

@section('content')

<main role="main ">
        <div class="py-5">
          <div class="row padg-down justify-content-md-center justify-content-sm-center">
            <div class="login col-md-6 col-sm-10 ">
              <ul>
                <li><a class="active" href="{{url('/login')}}">Iniciar Sesión</a></li>
                <li><a href="{{url('/register')}}">Crear Cuenta</a></li>
              </ul>
              <form class="brdr-box col-md-12" method="POST" action="{{ route('login') }}">
                    @csrf
                <div class="row mb-3">

                  <div class="col-md-6 ">
                    <label for="inputEmail" class="">{{ __('E-Mail Address') }}</label>
                    <!--<input type="email" id="inputEmail" class="form-control"    autofocus>-->
                    <input id="inputEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                  </div>

                  <div class="col-md-6 ">
                    <label for="inputPassword" class="">{{ __('Password') }}</label>
                    <!--<input type="password" id="inputPassword" class="form-control"  >-->
                    <input id="inputPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                </div>

                <a class="forgotLogin mt-3" href="#">Olvidé mi contraseña</a>
                <div class="col-md-12 text-center ">
                  <button class="btn btn-lg  btn-clearblue mb-3 mt-3" type="submit">{{ __('Login') }} <i class="icon-right fa fa-angle-right"></i></button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
                  <br>
                <div class="row mt-4">
                  <div class=" col-md-6 col-sm-12 ">
                    <button class="btn maxonmd btn-lg btn-redfuria mt-3 float-right" type="submit"><i class=" fa fa-google-plus"></i> Inicia con Google </button>
                  </div>

                  <div class="col-md-6 col-sm-12">
                    <button class="btn maxonmd btn-lg btn-bluedark btn-primary mt-3" type="submit"><i class=" fa fa-facebook"></i> Inicia con Facebook </button>
                  </div>
                </div>

              </form>

            </div>
          </div>
        </div>
      </main>

<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->

@endsection
