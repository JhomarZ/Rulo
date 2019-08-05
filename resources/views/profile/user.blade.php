@extends('master.layout')
@section('content')
<main role="main" class="profile">
  <div class="py-4">
    <div class="row padg-down justify-content-md-center justify-content-sm-center">
      <div class="ruta col-md-8 col-sm-9 col-xs-9">
        <h3><i class="lnr lnr-user"></i>Perfil de usuario</h3>
        <ul>
          <li>
            <button onclick="window.location.href='{{url('/perfil/'.Auth::user()->id)}}'" class="btn active btn-lg float-right" type="submit"><span class=" lnr lnr-user"></span> Perfil </button>
          </li>
          <li style="display:none">
            <button onclick="window.location.href='{{url('/chat')}}'"  class="btn  btn-lg float-right" type="submit"><span class=" lnr lnr-envelope"></span> Mensajes <span class="badge">5</span></button>
          </li>
          <li>
            <button class="btn  btn-lg float-right" onclick="window.location.href='{{url('/perfil/favoritos/'.Auth::user()->id)}}'" type="submit"><span class="lnr lnr-star"></span> Favoritos </button>
          </li>
          <li>
            <button class="btn  btn-lg float-right" type="submit"><span class="lnr lnr-flag"></span> Pedidos </button>
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
                    @if($user->image!="")
                    <img class="profile-pic " src="{{$user->image}}">
                    @else
                     <img class="profile-pic " src="{{url('/img/defaul-avatar.png')}}">
                    @endif
                    </div>
                   <div class="p-image">
                     <i class="lnr lnr-camera upload-button"></i>
                      <input class="file-upload" id="file" type="file" accept="image/*"/>
                   </div>
                  </div>
                </div>
              </div>
          </div>

          <div class="col-sm-9">
          <form class=" pt-5 col-md-12" method="POST" action="{{url('/perfil/'.Auth::user()->id)}}" >
            @csrf
            <input type="hidden" id="image" name="image" value="" />
              <h3>Datos de tu cuenta</h3>
              <div class="row mb-3">
                <div class="col-md-6 mt-4">
                  <label for="name" class="">Nombres*:</label>
                  <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name',$user->name)}}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mt-4">
                  <label for="last_name" class="">Apellidos*:</label>
                  <input id="last_name" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"  value="{{ old('last_name',$user->last_name)}}" required autocomplete="last_name" autofocus>
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mt-4">
                  <label for="nationality" class="">Nacionalidad*</label>
                  <input id="nationality" name="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror"  value="{{ old('nationality',$user->nationality)}}" required autocomplete="nationality" autofocus>
                    @error('nationality')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12 mt-4">
                    <input type="hidden" value="M" name="gender"  >
                  <label for="gender" class="">Género*:</label><br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="F"
                    {{ old('gender',$user->gender)=='F' ? 'checked':'' }}
                    >
                    <label class="form-check-label">
                    Femenino
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="M"
                    {{ old('gender',$user->gender)=='M' ? 'checked':'' }}
                    {{ old('gender',$user->gender)=='' ? 'checked':'' }}
                    >
                    <label class="form-check-label" >
                    Masculino
                    </label>
                  </div>
                  @if ($errors->has('gender'))
                  <span class="help-block">
                  <strong>{{ $errors->first('gender') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="col-md-6 mt-4">
                  <label for="inputEmail" class="">Tipo de documento*:</label>
                  <select class="form-control">
                    <option>DNI</option>
                    <option>Pasaporte</option>
                  </select>
                </div>
                <div class="col-md-6 mt-4">
                  <label for="document_number" class="">N° documento*:</label>
                  <input id="document_number" name="document_number" type="text" class="form-control @error('document_number') is-invalid @enderror"  value="{{ old('document_number',$user->document_number)}}"  autocomplete="document_number" autofocus>
                    @error('document_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mt-4">
                  <label for="phone_movil" class="">Teléfono*:</label>
                  <input id="phone_movil" name="phone_movil" type="tel" class="form-control @error('phone_movil') is-invalid @enderror"  value="{{ old('phone_movil',$user->phone_movil)}}"  autocomplete="phone_movil" autofocus>
                    @error('phone_movil')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mt-4">
                  <label for="phone_fix" class="">Fijo:</label>
                  <input id="phone_fix" name="phone_fix" type="tel" class="form-control @error('phone_fix') is-invalid @enderror"  value="{{ old('phone_fix',$user->phone_fix)}}"  autocomplete="phone_fix" autofocus>
                    @error('phone_fix')
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

<script>

    // Galería
function readFile() {
  if (this.files && this.files[0]) {
    var FR= new FileReader();
    FR.addEventListener("load", function(e) {
        console.log("base 64");
        console.log(e.target.result);
         document.getElementById("image").value = e.target.result;
    });
    FR.readAsDataURL( this.files[0] );
  }
}


document.getElementById("file").addEventListener("change", readFile);



</script>
@endsection
