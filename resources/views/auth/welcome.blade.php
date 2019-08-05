@extends('master.layout')

@section('content')

<main role="main ">
        <div class="py-5">
          <div class="row padg-down justify-content-md-center justify-content-sm-center">
            <div class="login col-md-6 col-sm-10 ">

                <div class="col-md-12 col-sm-12 " style="margin-top:1.5rem">

                    <h4>Bienvenido a Comercio Planeta</h4>
                    Hola, <b>{{ session('username') }}</b>. <br>
                    Te damos la bienvenida, ya eres uno de nuestros usuarios y te invitamos a visitar nuestra web. 
                </div>

              <div class="row mt-4">
                <div class="col-md-2 col-sm-0"></div>
                <div class="col-md-8 col-sm-12 text-center">
                        <a  href="/" style="color:#5ab4e8; font-size:3rem" ><i class="fa fa-check-circle"></i></a>
                  <!--<button class="btn maxonmd btn-lg btn-bluedark btn-primary mt-3" type="submit">
                      <i class=" fa fa-check-circle"></i> Inicia con Facebook
                  </button> -->
                </div>
                <div class="col-md-2 col-sm-0"></div>
              </div>

            </div>
          </div>
        </div>
      </main>

@endsection
