@extends('master.layout')
@section('content')
<main role="main" id="filterView">
  <div class="pt-4">
    <div class="row justify-content-md-center justify-content-sm-center">
      <div class="ruta col-md-9 ">

        <ul class="nav">
          @if (!empty($group))
            <li class="nav-item">
                <a class="nav-link active" href="{{url('/moda-search/'.$group)}}">{{$group}}</a>
            </li>
          @endif
          @if (!empty($category))
            <li class="arrow"> > </li>
            <li class="nav-item">
            <a class="nav-link" href="{{url('/moda-search/'.$group.'/'.$category)}}">{{$category}}</a>
            </li>
          @endif
          @if (!empty($category))
            <li class="arrow"> > </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="#">{{$subcategory}}</a>
            </li>
          @endif
          <!--<li class="arrow"> > </li>
          <li class="nav-item">
            <a class="nav-link" href="#">{{$category}}</a>
          </li>
          <li class="arrow"> > </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">{{$subcategory}}</a>
          </li>-->
        </ul>
        <div class="row">
          <button class="navbar-toggler hidden " id="btn25" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-filter"></span>Ocultar Filtros
          </button>
        </div>
        <div class="row justify-content-center cd-main-content">
          <div class=" p-4 mt-1 col-lg-4 col-md-12 col-sm-12 cd-tab-filter-wrapper collapse show" id="navbarToggleExternalContent">
            <div class="tittlePress">
              <a class="" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="true" aria-controls="collapse1">Grupos
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="5.581px" height="14.608px" viewBox="0 0 5.581 14.608" enable-background="new 0 0 5.581 14.608" xml:space="preserve">
                 <polygon fill="#fff" class="iconwhite" points="5.582,7.304 1.244,14.607 0,13.87 3.776,7.511 3.837,7.407 3.898,7.304 3.837,7.201 3.776,7.098 0,0.738 1.244,0 "></a>
            </div>
            <div class="row">
              <div class="col">
                <div class="collapse show" id="collapse1">
                  <div class="card card-body">
                        @foreach($groups as $gr)
                                <a href="{{url('/moda-search/'.$gr->group ).'?'}}">
                                    @if (!empty($group) && $gr->group==$group)
                                        <b>{{$gr->group}}<span class="tittledark">({{$gr->total_products}})</span></b>
                                    @else
                                        {{$gr->group}}<span class="tittledark">({{$gr->total_products}})</span>
                                    @endif
                                </a>
                        @endforeach
                  </div>
                </div>
              </div>
            </div>
            <!-- -- -->

            <div class="tittlePress ">
              <a class="" data-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapse2">Categorias
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="5.581px" height="14.608px" viewBox="0 0 5.581 14.608" enable-background="new 0 0 5.581 14.608" xml:space="preserve">
                 <polygon fill="#fff" class="iconwhite" points="5.582,7.304 1.244,14.607 0,13.87 3.776,7.511 3.837,7.407 3.898,7.304 3.837,7.201 3.776,7.098 0,0.738 1.244,0 "></a>
            </div>
            <div class="row">
              <div class="col">
                <div class="collapse show" id="collapse2">
                  <div class="card card-body">
                    @foreach($categories as $cat)
                        <a href="{{url('/moda-search/'.$cat->group->group.'/'.$cat->category ).'?'}}">
                            @if (!empty($category) && $cat->category==$category)
                                <b>{{$cat->category}} <span class="tittledark">({{$cat->total_products}})</span></b>
                            @else
                                {{$cat->category}} <span class="tittledark">({{$cat->total_products}})</span>
                            @endif
                        </a>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <!-- -- -->


            <div class="tittlePress">
              <a class="" data-toggle="collapse" href="#collapse3" role="button" aria-expanded="false" aria-controls="collapse3">Precios
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="5.581px" height="14.608px" viewBox="0 0 5.581 14.608" enable-background="new 0 0 5.581 14.608" xml:space="preserve">
                 <polygon fill="#fff" class="iconwhite" points="5.582,7.304 1.244,14.607 0,13.87 3.776,7.511 3.837,7.407 3.898,7.304 3.837,7.201 3.776,7.098 0,0.738 1.244,0 "></a>
            </div>
            <div class="row">
              <div class="col">
                <div class="collapse show" id="collapse3">
                  <div class="card card-body">
                    <div class="forgotLogin checkbox  text-muted" >
                      <label class="container ">
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>Soles
                      </label>
                      <label class="container ">
                        <input type="checkbox">
                        <span class="checkmark"> </span>Dólares
                      </label>
                  </div>
                  <ul class="listFprm mb-2">

                    <li>
                        @if($priceFilter!="")
                            <input type="number" id="txtMinimo" value="{{$slice = Str::before($priceFilter, '-')}}" class="form-control" required="" placeholder="US$ MIN" >
                        @else
                            <input type="number" value="0" id="txtMinimo" class="form-control" required="" placeholder="US$ MIN" >
                        @endif

                    </li>

                    <li>
                            @if($priceFilter!="")
                            <input type="number" id="txtMaximo" class="form-control" value="{{$slice = Str::after($priceFilter, '-')}}" required="" placeholder="US$ MAX" >
                            @else
                                <input type="number" id="txtMaximo" class="form-control" value="6200" required="" placeholder="US$ MIN" >
                            @endif

                    </li>
                    <li>
                        <button class="  btn  btn-clearblue" onclick="addFilter('price',$('#hddPriceFilter').val(),$('#txtMinimo').val()+'-'+$('#txtMaximo').val())" type="submit">
                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="5.581px" height="14.608px" viewBox="0 0 5.581 14.608" enable-background="new 0 0 5.581 14.608" xml:space="preserve">
                          <polygon fill="#fff" class="iconwhite" points="5.582,7.304 1.244,14.607 0,13.87 3.776,7.511 3.837,7.407 3.898,7.304 3.837,7.201 3.776,7.098
                            0,0.738 1.244,0 "></svg>
                          </svg>
                        </button>
                      </li>
                  </ul>
                  <a href="#">A consultar <span class="tittledark">(441)</span></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- -- -->
            <div class="tittlePress">
              <a class="" data-toggle="collapse" href="#collapse4" role="button" aria-expanded="false" aria-controls="collapse4">Marcas
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="5.581px" height="14.608px" viewBox="0 0 5.581 14.608" enable-background="new 0 0 5.581 14.608" xml:space="preserve">
                 <polygon fill="#fff" class="iconwhite" points="5.582,7.304 1.244,14.607 0,13.87 3.776,7.511 3.837,7.407 3.898,7.304 3.837,7.201 3.776,7.098 0,0.738 1.244,0 "></a>
            </div>
            <div class="row">
              <div class="col">
                <div class="collapse show" id="collapse4">
                  <div class="card card-body">

                    @foreach($brands as $brand)
                        @if(in_array($brand->brand, $filtroBrands))
                            <a href="#" ><b>{{$brand->brand}} <span class="tittledark">({{$brand->total_products}})</span></b></a>
                        @else

                        <a href="javascript:addFilter('brand[]','','{{$brand->brand}}')" >{{$brand->brand}} <span class="tittledark">({{$brand->total_products}})</span></a>
                            <!-- <a href="{{Request::getRequestUri().'&brand[]='.$brand->brand}}" >{{$brand->brand}} <span class="tittledark">({{$brand->total_products}})</span></a>-->
                        @endif
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <!-- -- -->


            <!-- -- -->


          </div>
          <div class=" col-lg-8 col-md-12 col-sm-12 " id="filtros">
            <div class="colorBlue tittledetail col-md-12">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <h3 class="float-left">Filtros
                    <a href="{{Request::url().'?'}}"><i class="fa fa-trash"></i></a>
                    <a href="#"><i class="fa fa-save"></i></a>
                  </h3>
                  <div class="float-right mt-3">
                    Ver por:
                    <a href="#"><i class="fa fa-map"></i></a>
                    <a class="listFilter" href="#"><i class="fa fa-list"></i></a>
                    <a class="blockFilter" href="#"><i class="fa fa-th-large"></i></a>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <ul class="filterActive ">
                                @foreach($filtroBrands as $br)
                                <li>{{$br}} <a href="{{Str::replaceFirst("brand[]=".Str::replaceFirst(" ","%20",$br),"",Request::getRequestUri())}}">x</a></li>
                                <!-- <li>{{$br}} <a href="javascript:deleteFilter('brand','{{$br}}')">x</a></li>-->
                                @endforeach

                                @if($priceFilter!="")
                                 <!-- <li>{{$priceFilter}} <a href="{{Str::replaceFirst($priceFilter,"",Request::getRequestUri())}}">x</a></li>-->
                                 <input type="hidden" id="hddPriceFilter" value="{{$priceFilter}}" />
                                 <li>{{$priceFilter}} <a href="javascript:deleteFilter('price',$('#hddPriceFilter').val())">x</a></li>
                                @endif
                    </ul>
                </div>

                <div class=" colorBlue col-md-12 col-sm-12 mt-2">
                  <div class="float-left mt-1">
                     Entontrados: <span class="tittledark">25 Inmuebles </span>
                  </div>
                  <div class="float-right">
                     Ordenar por:
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>Relevancia</option>
                      <option>De mayor a menor</option>
                      <option>De menor a mayor</option>
                    </select>
                  </div>
                </div>
                @foreach($products as $prod)
                    <div class="col-md-12 col-sm-12 mt-4 statelist ">
                    <div class="card p-3 mb-3">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 imageheight pl-3  ">
                        <div class="updetail">Ocasión</div>
                        <div class="dataSlide2">
                            <div class="dataSlideinfo2">
                            <span>6</span><i class="lnr lnr-camera"></i>
                            </div>
                        </div>
                        <!--<div class="imgResponsive" style="background-image: url('https://via.placeholder.com/307x187');"></div>-->
                        <section class="lazy slider" data-sizes="">
                            <div>
                            <img data-lazy="https://via.placeholder.com/307x187" data-srcset="https://via.placeholder.com/307x187, https://via.placeholder.com/307x187" >
                            </div>
                            <div>
                            <img data-lazy="https://via.placeholder.com/307x187" data-srcset="https://via.placeholder.com/307x187, https://via.placeholder.com/307x187" >
                            </div>
                            <div>
                            <img data-lazy="https://via.placeholder.com/307x187"  data-srcset="https://via.placeholder.com/307x187, https://via.placeholder.com/307x187" >
                            </div>
                            <div>
                            <img data-lazy="https://via.placeholder.com/307x187"  data-srcset="https://via.placeholder.com/307x187, https://via.placeholder.com/307x1870w" >
                            </div>
                            <div>
                            <img data-lazy="https://via.placeholder.com/307x187"  data-srcset="https://via.placeholder.com/307x187, https://via.placeholder.com/307x187" >
                            </div>
                            <div>
                            <!-- this slide should inherit the sizes attr from the parent slider -->
                            <img data-lazy="https://via.placeholder.com/307x187"  data-srcset="https://via.placeholder.com/307x187, https://via.placeholder.com/307x187">
                            </div>
                        </section>
                        </div>

                        <div class="col-md-6 col-sm-12 containerHeight pl-3">
                        <a href="{{url('/p/'.$prod->short_name)}}">
                            <strong class="d-inline-block text-clearblue elipsis"><h4>{{$prod->short_name}}</h4></strong>
                        </a>
                        <div class="text-muted" style="    overflow: hidden;
                        text-overflow: ellipsis;
                        display: -webkit-box;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;">{{$prod->info_brief}}</div>
                        <!--<div class="text-muted">Miraflores.</div>
                        <p class="text-detail mt-1 ">{{$prod->short_name}}</p>-->
                        <p class="text-detail mt-1 "></p>
                        <a href="{{url('/seller/'.$prod->seller->id)}}">
                            <p class="text-detail  ">
                                    Vendido por: {{$prod->seller->commercial_name}}
                                </p>
                        </a>

                        <div class="detailPrice">
                            <h5 class="ltrulo float-left">US$ <span style="text-decoration: line-through;">{{$prod->price_list}}</span> &nbsp; {{$prod->price_sale}} </h5>
                            <button class="svgright2 float-right btn  btn-clearblue" type="submit" style="display:none">Enviar Mensaje
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
                @endforeach

                <div class="col-md-12 col-sm-12 mt-4 statelist ">
                  <div class="card p-3 mb-3">
                  <div class="row">
                    <div class="col-md-6 col-sm-12 imageheight pl-3  ">
                     <div class="updetail">Ocasión</div>
                      <div class="dataSlide2">
                        <div class="dataSlideinfo2">
                          <span>6</span><i class="lnr lnr-camera"></i>
                        </div>
                      </div>
                      <!--<div class="imgResponsive" style="background-image: url('https://via.placeholder.com/307x187');"></div>-->
                       <section class="lazy slider" data-sizes="">
                        <div>
                          <img data-lazy="https://via.placeholder.com/307x187" data-srcset="https://via.placeholder.com/307x187, https://via.placeholder.com/307x187" >
                        </div>
                        <div>
                          <img data-lazy="https://via.placeholder.com/307x187" data-srcset="https://via.placeholder.com/307x187, https://via.placeholder.com/307x187" >
                        </div>
                        <div>
                          <img data-lazy="https://via.placeholder.com/307x187"  data-srcset="https://via.placeholder.com/307x187, https://via.placeholder.com/307x187" >
                        </div>
                        <div>
                          <img data-lazy="https://via.placeholder.com/307x187"  data-srcset="https://via.placeholder.com/307x187, https://via.placeholder.com/307x1870w" >
                        </div>
                        <div>
                          <img data-lazy="https://via.placeholder.com/307x187"  data-srcset="https://via.placeholder.com/307x187, https://via.placeholder.com/307x187" >
                        </div>
                        <div>
                          <!-- this slide should inherit the sizes attr from the parent slider -->
                          <img data-lazy="https://via.placeholder.com/307x187"  data-srcset="https://via.placeholder.com/307x187, https://via.placeholder.com/307x187">
                        </div>
                      </section>
                    </div>

                    <div class="col-md-6 col-sm-12 containerHeight pl-3">
                      <strong class="d-inline-block text-clearblue elipsis"><h4>Casa</h4></strong>
                      <div class="text-muted">Av. Petit Touars 234</div>
                      <div class="text-muted">Miraflores.</div>
                      <p class="text-detail mt-1 ">Excelente ubicación.</p>
                      <p class="text-detail  ">312 m2 / 5+ Dorm / 5+ baños.</p>
                      <div class="detailPrice">
                        <h5 class="ltrulo float-left">US$ 200,000</h5>
                        <button class="svgright2 float-right btn  btn-clearblue" type="submit">Enviar Mensaje
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

                <div class="col-md-12 col-sm-12 mt-4 statelist ">
                  <div class="card p-3 mb-3">
                  <div class="row">
                    <div class="col-md-6 col-sm-12 imageheight pl-3  ">
                     <div class="updetail">Ocasión</div>
                      <div class="dataSlide2">
                        <div class="dataSlideinfo2">
                          <span>6</span><i class="lnr lnr-camera"></i>
                        </div>
                      </div>
                      <!--<div class="imgResponsive" style="background-image: url('https://via.placeholder.com/307x187');"></div>-->
                       <section class="lazy slider" data-sizes="">
                        <div>
                          <img data-lazy="https://via.placeholder.com/307x187" data-srcset="https://via.placeholder.com/307x187, https://via.placeholder.com/307x187" >
                        </div>
                        <div>
                          <img data-lazy="https://via.placeholder.com/307x187" data-srcset="https://via.placeholder.com/307x187, https://via.placeholder.com/307x187" >
                        </div>
                        <div>
                          <img data-lazy="https://via.placeholder.com/307x187"  data-srcset="https://via.placeholder.com/307x187, https://via.placeholder.com/307x187" >
                        </div>
                        <div>
                          <img data-lazy="https://via.placeholder.com/307x187"  data-srcset="https://via.placeholder.com/307x187, https://via.placeholder.com/307x1870w" >
                        </div>
                        <div>
                          <img data-lazy="https://via.placeholder.com/307x187"  data-srcset="https://via.placeholder.com/307x187, https://via.placeholder.com/307x187" >
                        </div>
                        <div>
                          <!-- this slide should inherit the sizes attr from the parent slider -->
                          <img data-lazy="https://via.placeholder.com/307x187"  data-srcset="https://via.placeholder.com/307x187, https://via.placeholder.com/307x187">
                        </div>
                      </section>
                    </div>

                    <div class="col-md-6 col-sm-12 containerHeight pl-3">
                      <strong class="d-inline-block text-clearblue elipsis"><h4>Casa</h4></strong>
                      <div class="text-muted">Av. Petit Touars 234</div>
                      <div class="text-muted">Miraflores.</div>
                      <p class="text-detail mt-1 ">Excelente ubicación.</p>
                      <p class="text-detail  ">312 m2 / 5+ Dorm / 5+ baños.</p>
                      <div class="detailPrice">
                        <h5 class="ltrulo float-left">US$ 200,000</h5>
                        <button class="svgright2 float-right btn  btn-clearblue" type="submit">Enviar Mensaje
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

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<script>
        function filterBrand(brand){
            alert(brand);
            //var urlBase=location.href;
            location.href=location.href+brand;
        }
        function addFilter(item,filtroActual,newvalue){

            var url=location.href;
            if(url.indexOf("?")==-1){
                url=url+"?";
            }
            if(newvalue.length < 3) return;
            if(filtroActual!=""){
                url=url.replace("&"+item+"="+filtroActual,"");
                url=url.replace(""+item+"="+filtroActual,"");
            }

            //if(item=="brand")
             //   url=url+"&"+item+'[]='+newvalue;
            //else
                url=url+"&"+item+"="+newvalue;
            //alert(url);
            //return;
            location.href=url;
        }
        function deleteFilter(item,filtroActual){
            var url=location.href;
            url=url.replace("&"+item+"="+filtroActual,"");
            location.href=url;
        }
    </script>
@endsection
