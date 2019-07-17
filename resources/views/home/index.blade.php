@extends('master.layout')
@section('content')
<div class="jumbotron" style="background-image: url('{{asset('img/bgAuto.jpg')}}');background-repeat: no-repeat;background-position: center; background-size: cover; height:300px;">
</div>

<div id="navPrincipal" >
  <div class="row justify-content-center">
    <div class="col-md-8 mx-2 text-center">
        <div class="row activebg ">
            <div class="bg-noactive1 text-center mbcar col-md-4 col-sm-4 "><a href="{{url('/vehiculos/autos')}}"><img src="img/autoico.png">Autos</a> </div>
            <div class="bg-noactive2 text-center mbcar col-md-4 col-sm-4 "><a href="{{url('/inmuebles')}}"><img src="img/casaico.png">Casas</a> </div>
            <div class="bg-noactive1 text-center mbcar col-md-4 col-sm-4 "><a href="{{url('/moda')}}"><img src="img/poloico.png">Moda</a> </div>
        </div>
    </div>
  </div>
</div>

<main role="main" class="detalleAutos" >
  <div class="pt-3">
      <div class="row  justify-content-md-center justify-content-sm-center mb-1">
      <div class="tittledetail col-md-9 col-sm-9 col-xs-9">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <h3><img src="img/casa.png">Anuncios destacados en Ventas</h3>
          </div>
        </div>
      </div>
      <div class="productosDetail col-md-9 col-sm-9 col-xs-9 p-0">
        <div class=" ">
          <div class="row">
            <section id="totalSlides" class="regular slider  ">
                @foreach($bestsellers as $best)
                <div>
                    <div class="col-md-12 content ">
                      <div class="card mb-4 ">
                          <a href="{{url('/p/'.$best->short_name)}}">
                        <img class="card-img-top" src="http://placehold.it/747x456?text=1-350w" data-holder-rendered="true">
                        <div class="card-body">
                        <div class="d-inline-block  text-clearblue uppercase tittleh1">{{$best->short_name}}</div>
                            <div class=" text-descr">{{$best->short_name}}</div>
                            <p class="text-detail  mt-1 "><b> Desde US$ {{$best->price_list}}</b></p>
                        </div>
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="pt-1">
    <div class="row  justify-content-md-center justify-content-sm-center mb-2">
      <div class="tittledetail col-md-9 col-sm-9 col-xs-9">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <h3>
              <img src="{{asset('img/auto.png')}}">Anuncios destacados

            </h3>
          </div>
        </div>
      </div>
      <div class="productosDetail col-md-9 col-sm-9 col-xs-9 p-0">
        <div class=" ">
          <div class="row">
            <section id="totalSlides" class="regular slider  ">
                @foreach($mostSeen as $most)
                <div>
                    <div class="col-md-12 content ">
                      <div class="card mb-4 ">
                          <a href="{{url('/p/'.$best->short_name)}}">
                        <img class="card-img-top" src="http://placehold.it/747x456?text=1-350w" data-holder-rendered="true">
                        <div class="card-body">
                        <div class="d-inline-block  text-clearblue uppercase tittleh1">{{$most->short_name}}</div>
                            <div class=" text-descr">{{$most->short_name}}</div>
                            <p class="text-detail  mt-1 "><b> Desde US$ {{$most->price_list}}</b></p>
                        </div>
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="pt-0">
    <div class="row  justify-content-md-center justify-content-sm-center mb-5">
      <div class="tittledetail col-md-9 col-sm-9 col-xs-9">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <h3>
              <img src="img/polo.png">Anuncios de moda destacados

            </h3>
          </div>
        </div>
      </div>
      <div class="productosDetail col-md-9 col-sm-9 col-xs-9 p-0">
        <div class=" ">
          <div class="row">
            <section id="totalSlides" class="regular slider  ">
              <div>
                <div class="col-md-12 content ">
                  <div class="card mb-4 ">
                    <a href="{{url('/moda/c/nombre')}}">
                    <img class="card-img-top" src="http://placehold.it/747x456?text=1-350w" data-holder-rendered="true">
                    <div class="card-body">
                      <div class="d-inline-block  text-clearblue uppercase tittleh1">Falda Pantalón Crom </div>
                        <div class=" text-descr">MANGO</div>
                        <p class="text-detail  mt-1 "><b> S/ 59.60</b></p>
                    </div>
                    </a>
                  </div>
                </div>
              </div>
              <div>
                <div class="col-md-12 content ">
                  <div class="card mb-4 ">
                  <a href="{{url('/moda/c/nombre')}}">
                    <img class="card-img-top" src="http://placehold.it/747x456?text=1-350w" data-holder-rendered="true">
                    <div class="card-body">
                      <div class="d-inline-block  text-clearblue uppercase tittleh1">Blusa Planitap</div>
                        <div class=" text-descr">MANGO</div>
                        <p class="text-detail  mt-1 "><b> S/ 64.50</b></p>
                    </div>
                    </a>
                  </div>
                </div>
              </div>
              <div>
                <div class="col-md-12 content ">
                  <div class="card mb-4 ">
                  <a href="{{url('/moda/c/nombre')}}">
                    <img class="card-img-top" src="http://placehold.it/747x456?text=1-350w" data-holder-rendered="true">
                    <div class="card-body">
                      <div class="d-inline-block  text-clearblue uppercase tittleh1">Bolso G Crused</div>
                        <div class=" text-descr">RALPH LAUREN</div>
                        <p class="text-detail  mt-1 "><b> S/ 51.60</b></p>
                    </div>
                    </a>
                  </div>
                </div>
              </div>
              <div>
                <div class="col-md-12 content ">
                  <div class="card mb-4 ">
                  <a href="{{url('/moda/c/nombre')}}">
                    <img class="card-img-top" src="http://placehold.it/747x456?text=1-350w" data-holder-rendered="true">
                    <div class="card-body">
                      <div class="d-inline-block  text-clearblue uppercase tittleh1">Casaca Efecto Piel</div>
                        <div class=" text-descr">VIOLETA</div>
                        <p class="text-detail  mt-1 ">S/ 51.60</p>
                    </div>
                    </a>
                  </div>
                </div>
              </div>
              <div>
                <div class="col-md-12 content ">
                  <div class="card mb-4 ">
                  <a href="{{url('/moda/c/nombre')}}">
                    <img class="card-img-top" src="http://placehold.it/747x456?text=1-350w" data-holder-rendered="true">
                    <div class="card-body">
                      <div class="d-inline-block  text-clearblue uppercase tittleh1">Gafas de Hombre</div>
                        <div class=" text-descr">1995, Gasolina, Mecánica</div>
                        <p class="text-detail  mt-1 "><b> S/ 929 </b></p>
                    </div>
                    </a>
                  </div>
                </div>
              </div>
              <div>
                <div class="col-md-12 content ">
                  <div class="card mb-4 ">
                   <a href="{{url('/moda/c/nombre')}}">
                    <img class="card-img-top" src="http://placehold.it/747x456?text=1-350w" data-holder-rendered="true">
                    <div class="card-body">
                      <div class="d-inline-block  text-clearblue uppercase tittleh1">Blazer amarillo</div>
                        <div class=" text-descr">CORTEFIEL</div>
                        <p class="text-detail  mt-1 "><b> S/ 87</b></p>
                    </div>
                    </a>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>
@endsection
