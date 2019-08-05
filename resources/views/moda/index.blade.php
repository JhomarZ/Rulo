@extends('master.layout')
@section('content')

    <!-- ETIQUETA DE FACEBOOK -->
         <!-- Load Facebook SDK for JavaScript -->
            <div id="fb-root"></div>
            <script>
            window.fbAsyncInit = function() {
                FB.init({
                xfbml            : true,
                version          : 'v4.0'
                });
            };

            (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

            <!-- Your customer chat code -->
            <div class="fb-customerchat"
            attribution=setup_tool
            page_id="112063850138503"
            theme_color="#44bec7">
            </div>

    <!-- FIN  ETIQUETA DE FACEBOOK -->


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
            <div class="col-md-4 mb-1">
                    <select class="form-control" id="ddlGroup">
                      <!--<option value="">Grupo</option>-->
                      @foreach($groups as $group)
                              <option value="/{{$group->group}}">{{$group->group}}</option>
                      @endforeach
                    </select>
                  </div>
        <div class="col-md-4 mb-1">
                <input type="text" class="form-control" value="" id="txtSearch" placeholder="Ingresa título del producto" aria-label="Recipient&#39;s username" aria-describedby="basic-addon2">
                <!--<div class="input-group-append">
                  <button class="btn btn-outline-secondary" onclick="search()" type="button"><i class="fa fa-search"></i></button>
                </div> -->
          <!--
            <select class="form-control" id="ddlCategory">
          </select>-->
        </div>
        <div class="col-md-1 mb-1">
                <!--
                <select onchange="changeOrderBy('{{ Request::fullUrlWithQuery(['brand[]' => 'XXX']) }}' )" id="ddlBrand" class="form-control" >
                      <option value="">Marca</option>
                      @foreach($brands as $brand)
                          <option value="{{$brand->brand}}">{{$brand->brand}}</option>
                      @endforeach
                </select>-->
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
              <img src="{{asset('img/polo.png')}}">Productos más vistos

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
                                @if($feat->files->count()>0)
                                    <img style="max-height: 200px;" class="card-img-top" src="{{$feat->files[0]->image_list}}" data-holder-rendered="true">
                                @else
                                    <img style="max-height: 200px;" class="card-img-top" src="http://www.comercioplanetatest.com/css/sin-imagen.jpg" data-holder-rendered="true">
                                @endif

                                <div class="card-body">
                                <div class="d-inline-block  text-clearblue uppercase tittleh1" style="width: 95%;">{{$feat->short_name}} </div>
                                <div class=" text-descr">{{$feat->info_brief}}</div>
                                <p class="text-detail  mt-1 ">
                                    <b>S/ <span style="text-decoration: line-through;">{{$feat->price_list}}</span> &nbsp; {{$feat->price_sale}}</b>
                                </p>
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
              <img src="{{asset('img/polo.png')}}">Productos más vendidos

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
                                @if($fav->files->count()>0)
                                    <img style="max-height: 200px;" class="card-img-top" src="{{$fav->files[0]->image_list}}" data-holder-rendered="true">
                                @else
                                    <img style="max-height: 200px;" class="card-img-top" src="http://www.comercioplanetatest.com/css/sin-imagen.jpg" data-holder-rendered="true">
                                @endif



                                <div class="card-body">
                                <div class="d-inline-block  text-clearblue uppercase tittleh1" style="width: 95%;">{{$fav->short_name}} </div>
                                <div class=" text-descr" >{{$fav->info_brief}}</div>
                                <p class="text-detail  mt-1 ">
                                        <b>S/ <span style="text-decoration: line-through;">{{$feat->price_list}}</span> &nbsp; {{$feat->price_sale}}</b>
                                </p>
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
        if($("#txtSearch").val()!=""){
            urlBase=urlBase+'?p='+$("#txtSearch").val();
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


        if($("#ddlBrand").val()!=""){
            urlBase=urlBase+'?brand[]='+$("#ddlBrand").val();
        }
        */
        location.href=urlBase;
    }

    function search(){
            location.href=$("#hddUrl").val()+"q="+$("#txtSearch").val();
    }

    function searchMarca(url){
                location.href=url.replace("XXX",$('#ddlSorted').val())
    }
</script>

@endsection
