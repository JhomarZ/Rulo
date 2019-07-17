@extends('master.layout')
@section('content')
<main role="main" class="profile">
  <div class="py-4">
    <div class="row padg-down justify-content-md-center justify-content-sm-center">
      <div class="ruta col-md-8 col-sm-9 col-xs-9">
        <h3><i class="lnr lnr-user"></i>Perfil de usuario</h3>
        <ul>
          <li>
            <button onclick="window.location.href='{{url('/perfil')}}'" class="btn active btn-lg float-right" type="submit"><span class=" lnr lnr-user"></span> Perfil </button>
          </li>
          <li style="display:none">
            <button onclick="window.location.href='{{url('/chat')}}'"  class="btn  btn-lg float-right" type="submit"><span class=" lnr lnr-envelope"></span> Mensajes <span class="badge">5</span></button>
          </li>
          <li>
            <button class="btn  btn-lg float-right" onclick="window.location.href='{{url('/perfil/favoritos/'.Auth::user()->id)}}'" type="submit"><span class="lnr lnr-star"></span> Favoritos </button>
          </li>
          <li>
            <button class="btn  btn-lg float-right" type="submit"><span class="lnr lnr-flag"></span> Anuncios </button>
          </li>
          <li>
            <button class="btn  btn-lg float-right" type="submit"><span class="lnr lnr-file-empty"></span> Suscripciones </button>
          </li>
        </ul>
      </div>
      <div class="bg-solight col-md-8 col-sm-10 ">
        <div class="row ">
          <div class="col-sm-3 pt-5 m-0">
              <div class="row justify-content-md-center justifycenter ext-center ">
                <div class=" d-flex align-items-center">
                  <div class="col-sm-3 m-0">
                   <div class="square">
                     <img class="profile-pic " src="{{url('/img/defaul-avatar.png')}}">
                   </div>
                   <div class="p-image">
                     <i class="lnr lnr-camera upload-button"></i>
                      <input class="file-upload" type="file" accept="image/*"/>
                   </div>
                  </div>
                </div>
              </div>
          </div>

          <div class="col-sm-9">
          <form class=" pt-5 col-md-12" method="POST" action="{{url('/perfil/'.Auth::user()->id)}}" >
            @csrf
              <h3>Datos de tu cuenta</h3>
              <div class="row mb-3">
                <div class="col-md-6 mt-4">
                  <label for="name" class="">Nombres(*):</label>
                  <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name',$user->name)}}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mt-4">
                  <label for="last_name" class="">Apellidos(*):</label>
                  <input id="last_name" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"  value="{{ old('last_name',$user->last_name)}}" required autocomplete="last_name" autofocus>
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mt-4">
                  <label for="nationality" class="">Nacionalidad(*)</label>
                  <input id="nationality" name="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror"  value="{{ old('nationality',$user->nationality)}}" required autocomplete="nationality" autofocus>
                    @error('nationality')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12 mt-4">
                  <label for="inputGenero" class="">Género(*):</label><br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                    Femenino
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                    Masculino
                    </label>
                  </div>
                </div>
                <div class="col-md-6 mt-4">
                  <label for="inputEmail" class="">Tipo de documento(*):</label>
                  <select class="form-control">
                    <option>DNI</option>
                    <option>Pasaporte</option>
                  </select>
                </div>
                <div class="col-md-6 mt-4">
                  <label for="document_nro" class="">N° documento(*):</label>
                  <input id="document_nro" name="document_nro" type="text" class="form-control @error('document_nro') is-invalid @enderror"  value="{{ old('document_nro',$user->document_nro)}}"  autocomplete="document_nro" autofocus>
                    @error('document_nro')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mt-4">
                  <label for="cellphone" class="">Teléfono(*):</label>
                  <input id="cellphone" name="cellphone" type="tel" class="form-control @error('cellphone') is-invalid @enderror"  value="{{ old('cellphone',$user->cellphone)}}"  autocomplete="cellphone" autofocus>
                    @error('cellphone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mt-4">
                  <label for="phone" class="">Fijo(*):</label>
                  <input id="phone" name="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"  value="{{ old('phone',$user->phone)}}"  autocomplete="phone" autofocus>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  <!-- <button type="submit">Submit</button> -->
                </div>
                <div class="col-md-12 mt-4">
                  <button class="svgright2 float-right btn btn-lg btn-clearblue" type="submit">Grabar
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="5.581px" height="14.608px" viewBox="0 0 5.581 14.608" enable-background="new 0 0 5.581 14.608" xml:space="preserve">
                    <polygon fill="#fff" class="iconwhite" points="5.582,7.304 1.244,14.607 0,13.87 3.776,7.511 3.837,7.407 3.898,7.304 3.837,7.201 3.776,7.098
                      0,0.738 1.244,0 "></polygon>
                    </svg>
                  </button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
