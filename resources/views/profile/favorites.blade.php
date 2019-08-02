@extends('master.layout')
@section('content')
<main role="main" class="profile">
        <div class="py-4">
          <div class="row padg-down justify-content-md-center justify-content-sm-center">
            <div class="ruta col-md-8 col-sm-9 col-xs-9">
              <h3><i class="lnr lnr-user"></i>Perfil de usuario</h3>
              <ul>
                <li>
                  <button onclick="window.location.href='{{url('/perfil/'.Auth::user()->id)}}'" class="btn  btn-lg float-right" type="submit"><span class=" lnr lnr-user"></span> Perfil </button>
                </li>
                <li style="display:none">
                  <button onclick="window.location.href=&#39;chat.html&#39;" class="btn  btn-lg float-right" type="submit"><span class=" lnr lnr-envelope"></span> Mensajes <span class="badge">5</span></button>
                </li>
                <li>
                  <button class="btn active btn-lg float-right"
                  onclick="window.location.href='{{url('/perfil/favoritos/'.Auth::user()->id)}}'" type="submit"><span class="lnr lnr-star"></span> Favoritos </button>
                </li>
                <li>
                  <button class="btn  btn-lg float-right" type="submit"><span class="lnr lnr-flag"></span> Pedidos </button>
                </li>
                <li>
                  <button class="btn  btn-lg float-right" type="submit"><span class="lnr lnr-file-empty"></span> Suscripciones </button>
                </li>
              </ul>
            </div>
            <div class="col-md-8 col-sm-9 col-xs-9">
              <div class="mb-1">
                <div class="tittledetail col-md-9 col-sm-9 col-xs-9">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <h3>Moda</h3>
                    </div>
                  </div>
                </div>
                <div class="productosDetail col-md-12 col-sm-12 col-xs-9 p-0">
                  <div class=" ">
                    <div class="row">
                        @if($favorites->count()==0)
                        <div class="col-md-3 col-md-4 col-xs-6 content ">
                            No tienes productos favoritos
                            <div>
                        @endif
                        @foreach($favorites as $fav)
                          <div class="col-md-3 col-md-4 col-xs-6 content ">
                            <div class="card mb-4 ">
                              <img class="card-img-top" src="http://placehold.it/747x456?text=1-350w" data-holder-rendered="true">
                              <div class="card-body">
                                  <a  href="{{url('/p/'.$fav->product->short_name )}}">
                                    <div class="d-inline-block  text-clearblue uppercase tittleh1" style="width: 95%;" >
                                        {{$fav->product->short_name}}
                                        </div>
                                  </a>
                                  <div class=" text-descr">{{$fav->product->info_brief}}</div>
                                  <p class="text-detail float-left  mt-1 "><b> US$ {{$fav->product->price_list}} - {{$fav->product->price_sale}}</b></p>
                                    <div class="starfav float-right">
                                            <a href="javascript:
                                            document.getElementById('product-fav-form-{{$fav->id}}').submit();" style="text-decoration: none;" onclick="">
                                                <i class="fa fa-star" style="color:#ffff10;"></i>
                                            </a>

                                    </div>

                                    <!-- formulario para agregar a favoritos -->
                                    <form id="product-fav-form-{{$fav->id}}" class="hidden"
                                            action="{{ route('product.fav.delete',$fav->id) }}" method="POST">
                                            {{ csrf_field() }}
                                    </form>
                                    <!--  FIN -->
                              </div>
                            </div>
                          </div>
                        @endforeach

                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
</main>
@endsection
