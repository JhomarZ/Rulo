@extends('master.layout')
@section('content')
<div class="jumbotron" style="background-image: url('{{asset('img/bgPolo.jpg')}}');background-repeat: no-repeat;background-position: center; background-size: cover; height:300px;">

</div>

<div id="navegacionRulo" >
  <div class="row justify-content-md-center justify-content-sm-center">
    <div class="col-md-9">
        <div class="row">
            <div class="bg-activo col-md-4 col-sm-4 "><a >Moda</a> </div>
            <div class="bg-noactive col-md-4 col-sm-4 " style="display:none"><a href="{{url('/vehiculos/autos')}}"><img src="{{asset('img/arrowsearch.png')}}">Buscar vehículos</a> </div>
            <div class="bg-noactive col-md-4 col-sm-4 " style="display:none"><a href="{{url('/inmuebles')}}"><img src="{{asset('img/arrowsearch.png')}}">Buscar Casa</a> </div>
        </div>
    </div>
    <div class="col-md-9 bgnav ">
      <div class="row justify-content-md-center justify-content-sm-center">
            <div class="col-md-3 mb-1">
                    <select class="form-control" id="ddlGroup">
                      <option value="">Grupo</option>
                      @foreach($groups as $group)
                              <option value="/{{$group->group}}">{{$group->group}}</option>
                      @endforeach
                    </select>
                  </div>
        <div class="col-md-3 mb-1">
          <select class="form-control" id="ddlCategory">

          </select>
        </div>
        <div class="col-md-3 mb-1">
                <select onchange="changeOrderBy('{{ Request::fullUrlWithQuery(['brand[]' => 'XXX']) }}' )" id="ddlBrand" class="form-control" >
                      <option value="">Marca</option>
                      @foreach($brands as $brand)
                          <option value="{{$brand->brand}}">{{$brand->brand}}</option>
                      @endforeach
                  <!--<option>Marca</option>
                  <option>MANGO</option>
                  <option>RALPH LAUREN</option>
                  <option>VIOLETA</option>-->
                </select>
              </div>
        <div class="col-md-3 mb-1">
          <button  onclick="goToSearchPage();"
           class="svgright3 svgleft3 btn btn-lg btn-defaultbg" type="submit">
            <img src="{{asset('img/search.png')}}">
            Buscar
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="5.581px" height="14.608px" viewBox="0 0 5.581 14.608" enable-background="new 0 0 5.581 14.608" xml:space="preserve">
            <polygon fill="#fff" class="iconwhite" points="5.582,7.304 1.244,14.607 0,13.87 3.776,7.511 3.837,7.407 3.898,7.304 3.837,7.201 3.776,7.098
              0,0.738 1.244,0 "></polygon>
            </svg>
          </button>

        </div>
      </div>
    </div>
  </div>
</div>

<main role="main" class="detalleAutos" >
   <div class="pt-5">
    <div class="row  justify-content-md-center justify-content-sm-center mb-1">
      <div class="tittledetail col-md-9 col-sm-9 col-xs-9">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <h3>
              <img src="{{asset('img/polo.png')}}">Anuncios de moda destacados

            </h3>
          </div>
        </div>
      </div>
      <div class="productosDetail col-md-9 col-sm-9 col-xs-9 p-0">
        <div class=" ">
          <div class="row">
            <section id="totalSlides" class="regular slider  ">
                <!-- CARDS DE PRODUCTO -->
                @foreach($featured as $feat)
                    <div>
                        <div class="col-md-12 content ">
                        <div class="card mb-4 ">
                            <a href="{{url('/p/'.Str::replaceFirst('/','--',$feat->short_name))}}">
                                <img class="card-img-top" src="http://placehold.it/747x456?text=1-350w" data-holder-rendered="true">
                                <div class="card-body">
                                <div class="d-inline-block  text-clearblue uppercase tittleh1" style="width: 95%;">{{$feat->short_name}} </div>
                                <div class=" text-descr">{{$feat->info_brief}}</div>
                                <p class="text-detail  mt-1 "><b> S/ {{$feat->price_list}}</b></p>
                                </div>
                            </a>
                        </div>
                        </div>
                    </div>
                @endforeach
                <!-- FIN CARDS DE PRODUCTO -->
              </section>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="pt-1">
    <div class="row  justify-content-md-center justify-content-sm-center mb-1">
      <div class="tittledetail col-md-9 col-sm-9 col-xs-9">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <h3>
              <img src="{{asset('img/polo.png')}}">Anuncios de moda favoritos

            </h3>
          </div>
        </div>
      </div>
      <div class="productosDetail col-md-9 col-sm-9 col-xs-9 p-0">
        <div class=" ">
          <div class="row">
            <section id="totalSlides" class="regular slider  ">
              <!-- CARDS DE PRODUCTO -->
                @foreach($favorites as $fav)
                    <div>
                        <div class="col-md-12 content ">
                        <div class="card mb-4 ">
                            <a href="{{url('/p/'.Str::replaceFirst('/','--',$fav->short_name))}}">
                                <img class="card-img-top" src="http://placehold.it/747x456?text=1-350w" data-holder-rendered="true">
                                <div class="card-body">
                                <div class="d-inline-block  text-clearblue uppercase tittleh1" style="width: 95%;">{{$fav->short_name}} </div>
                                <div class=" text-descr" >{{$fav->info_brief}}</div>
                                <p class="text-detail  mt-1 "><b> S/ {{$fav->price_list}}</b></p>
                                </div>
                            </a>
                        </div>
                        </div>
                    </div>
                @endforeach
            <!-- FIN CARDS DE PRODUCTO -->
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<script>
    function goToSearchPage(){
        //alert("entro a la redireccion->"+'{{url('/moda-search')}}');
        var urlBase='{{url('/moda-search')}}';

        if($("#ddlGroup").val()!=""){
            urlBase=urlBase+$("#ddlGroup").val();
        }
        /*
        if($("#ddlCategory").val()!=""){
            urlBase='{{url('/moda-search')}}';
            urlBase=urlBase+$("#ddlCategory").val();
        }

        if($("#ddlCategory").val()!=""){
            urlBase='{{url('/moda-search')}}';
            urlBase=urlBase+$("#ddlCategory").val();
        }
        */

        if($("#ddlBrand").val()!=""){
            urlBase=urlBase+'?brand[]='+$("#ddlBrand").val();
        }
        location.href=urlBase;
    }



    function searchMarca(url){
                location.href=url.replace("XXX",$('#ddlSorted').val())
    }
</script>
@endsection
