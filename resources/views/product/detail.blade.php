@extends('master.layout')
@section('content')
<main role="main" class="detalleAutos" >
  <div class="pt-4">
    <div class="row justify-content-md-center justify-content-sm-center">
      <div class="ruta col-md-9 col-sm-9 col-xs-9">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link active" href="{{url('/moda-search/'.$product->group->group)}}">{{$product->group->group}}</a>
        </li>
        <li class="arrow"> > </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/moda-search/'.$product->group->group.'/'.$product->category->category)}}">{{$product->category->category}}</a>
        </li>
        <!--
        <li class="arrow"> > </li>
        <li class="nav-item">
          <a class="nav-link" href="#">{{$product->subCategory->subcategory}}</a>
        </li>
        -->
        <li class="arrow"> > </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="{{url('/moda-search/'.$product->group->group.'/'.$product->category->category.'/'.$product->subCategory->subcategory)}}">{{$product->subCategory->subcategory}}</a>
        </li>
      </ul>
      </div>
    </div>
    <div class="row  justify-content-md-center justify-content-sm-center">
      <div class="tittledetail col-md-9 col-sm-9 ">
      <h3><img src="{{asset('img/polo.png')}}">{{$product->short_name}}</h3>
      </div>
    </div>
    <div class="row padg-down justify-content-md-center justify-content-sm-center">
      <div  class="tittledetail col-md-9 col-sm-9 col-xs-9">
        <div class="row ">
          <div id="second" class="col-md-8 col-sm-12 flex-md-row flex-md-row-reverse  ">
             <div class="SliderPrincipal">
              <section class="slider-for " data-sizes="50vw">
                @foreach($product->files as $file)
                    <div>
                        <a id="firstlink" class="venobox" data-gall="myGallery"
                        href="{{$file->image_list}}">
                          <img style="max-height: 400px;" data-lazy="{{$file->image_list}}" data-sizes="100vw">
                        </a>
                      </div>
                @endforeach
                <!--
                <div>
                  <a class="venobox" data-gall="myGallery" href="http://placehold.it/747x456?text=2-350w">
                    <img data-lazy="http://placehold.it/747x456?text=2-350w" data-sizes="100vw">
                  </a>
                </div>
                <div>
                  <a class="venobox" data-gall="myGallery" href="http://placehold.it/747x456?text=3-350w">
                    <img data-lazy="http://placehold.it/747x456?text=3-350w" data-sizes="100vw">
                  </a>
                </div>
                <div>
                  <a class="venobox" data-gall="myGallery" href="http://placehold.it/747x456?text=4-350w">
                    <img data-lazy="http://placehold.it/747x456?text=4-350w" data-sizes="100vw">
                  </a>
                </div>
                <div>
                  <a class="venobox" data-gall="myGallery" href="http://placehold.it/747x456?text=5-350w">
                    <img data-lazy="http://placehold.it/747x456?text=5-350w" data-sizes="100vw">
                  </a>
                </div>
                <div>
                  <a class="venobox" data-gall="myGallery" href="http://placehold.it/747x456?text=6-350w">
                    <img data-lazy="http://placehold.it/747x456?text=6-350w"  data-sizes="100vw">
                  </a>
                </div>
                -->
              </section>
              <div class="dataSlide">
                <div class="dataSlideinfo">
                  <span></span><i class="lnr lnr-camera"></i>
                  <a id="loadGallery" ><i  class=" lnr lnr-move" data-gall="gall1" data-title="inline content" data-vbtype="inline" href="#inline-content"></i></a></div>
              </div>
              <section id="totalSlides" class="slider-nav">
                @foreach($product->files as $file)
                    <div>
                        <img style="max-heigth:55px" src="{{$file->image_list}}">
                    </div>
                @endforeach
                <!-- <div>
                  <img src="http://placehold.it/747x456?text=1">
                </div>
                <div>
                  <img src="http://placehold.it/747x456?text=2">
                </div>
                <div>
                  <img src="http://placehold.it/747x456?text=3">
                </div>
                <div>
                  <img src="http://placehold.it/747x456?text=4">
                </div>
                <div>
                  <img src="http://placehold.it/747x456?text=5">
                </div>
                <div>
                  <img src="http://placehold.it/747x456?text=6">
                </div>-->
              </section>
              </div>

            <h3>DESCRIPCIÓN </h3>
            <p>{{$product->description}}</p>

            <h3>CARACTERÍSTICAS DEL PRODUCTO </h3>
            <table class="table ">
              <tbody>
                <tr class="spacebtwn">
                    <th>Grupo</th>
                    <td>{{$product->group->group}}</td>
                </tr>
                <tr class="spacebtwn">
                        <th>Categoria</th>
                        <td>{{$product->category->category}}</td>
                </tr>
                <tr class="spacebtwn">
                        <th>Sub Categoria</th>
                        <td>{{$product->subcategory->subcategory}}</td>
                </tr>
                <tr class="spacebtwn">
                  <th>Marca</th>
                <td>{{$product->brand->brand}}</td>
                </tr>
                <tr class="spacebtwn">
                        <th>Genéro</th>
                        <td>
                            @if ($product->gender === 'M')
                                Hombre
                            @else
                                Mujer
                            @endif
                        </td>
                      </tr>
              </tbody>
            </table>
            @if($product->attributes->count()>0)
            <div class="mt-2 boxotherdetail">
                    <h3>CARACTERISTICAS ADICIONALES</h3>
                    <ul>
                        @foreach($product->attributes as $att)
                            <li><b>{{$att->attribute->attribute}} :</b> {{$att->value}} </li>
                        @endforeach
                    </ul>
            </div>
            @endif

            <!--
            <h3>Mapa
              <button class="svgright2 float-right btn btn-lg btn-clearblue mb-2" type="submit">Solicitar información de Ubicación
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="5.581px" height="14.608px" viewBox="0 0 5.581 14.608" enable-background="new 0 0 5.581 14.608" xml:space="preserve">
              <polygon fill="#fff" class="iconwhite" points="5.582,7.304 1.244,14.607 0,13.87 3.776,7.511 3.837,7.407 3.898,7.304 3.837,7.201 3.776,7.098
                0,0.738 1.244,0 "></polygon>
              </svg>
            </button>
            </h3>

            <div class="col-md-12 map-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d386950.6511603643!2d-73.70231446529533!3d40.738882125234106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNueva+York!5e0!3m2!1ses-419!2sus!4v1445032011908" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            -->
          </div>
          <div id="first" class="col-md-4 col-sm-12 mb-4 pl-0 pr-0 ">
            <div class="infoAnunciante">
                <div class="row ">
                  <div class="encabezado col-sm-12">Información del anunciante</div>
                  <div class="col-sm-12 p-0">
                    <div class="row justify-content-center ">
                      <div class=" d-flex align-items-center">
                        <div class="col-md-5 col-sm-5  ">
                          <img class="responsive" src="{{asset('img/logoEmpresa.png')}}">
                        </div>
                        <div class="rightEnca col-md-7 col-sm-8">
                                <a target="_blank" href="{{url('/seller/'.$product->seller->id)}}">
                            <h2>{{$product->seller->commercial_name}}</h2>
                        </a>
                          <h6><i class="fa fa-phone-square">
                                {{$product->seller->contact_phone}}</i> <br>
                          <!--<a href="#">Ver Perfil</a></h6>-->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 p-0">
                    <div class="row stats justify-content-center ">
                      <div class="d-flex align-items-md-center align-items-lg-center">
                        <div class="div1 col-md-6 col-sm-6 ">
                          <h1>{{$product->total_saw}}</h1>
                          <p>Vistos</p>
                        </div>
                        <div class="div2 col-md-6 col-sm-6 " style="border-right:0px">
                          <h1> {{$product->total_sales}}</h1>
                          <p>Vendidos</p>
                        </div>
                        <!--<div class="div3 col-md-4 col-sm-6 ">
                          <h1> 718</h1>
                          <p>Ventas concretas</p>
                        </div>-->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 p-0">
                      <div class="row justify-content-center">
                        <button style="display:none" class="svgright2 btn btn-lg btn-clearblue mb-4 mt-4" type="submit">Enviar mensaje
                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="5.581px" height="14.608px" viewBox="0 0 5.581 14.608" enable-background="new 0 0 5.581 14.608" xml:space="preserve">
                          <polygon fill="#fff" class="iconwhite" points="5.582,7.304 1.244,14.607 0,13.87 3.776,7.511 3.837,7.407 3.898,7.304 3.837,7.201 3.776,7.098
                            0,0.738 1.244,0 "></polygon>
                          </svg>
                        </button>
                      </div>
                  </div>
                </div>
            </div>
            <div class="contactUs hiddenxs ">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="contact-us ">Compartir anuncio:</h2>
                  <a class="envelop btn-fticon" href="#"><i class="lnr lnr-envelope"></i></a>
                  <a class="whatsapp btn-fticon" href="#"><i class="fa fa-whatsapp"></i></a>
                  <a class="facebook btn-fticon" href="#"><i class="fa fa-facebook"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
