@extends('master.layout')
@section('content')
<main role="main" class="detalleAutos">
    <input type="hidden" id="hddUrl" value="{{Request::url().'?'}}"/>
        <div class="pt-4">
          <div class="row justify-content-md-center justify-content-sm-center">
            <div class="tittledetail col-md-9 col-sm-9 col-xs-9">
              <div class="row ">
                <div id="first" class="col-md-12 col-sm-12  ">
                  <div class="dataAnunciante p-3">
                    <div class="row  ">
                        <div class="col-md-2 col-sm-3  ">
                          <img class="responsive" src="{{asset('img/logoEmpresa.png')}}">
                        </div>
                        <div class=" col-md-7 col-sm-6">
                            <h2>{{$seller->commercial_name}}</h2>
                          <p>{{$seller->business_desc}}</p>
                          <h6><a href="{{url('/seller/'.$seller->id)}}">www.latienda.com</a> <br>
                          <a href="">Síguenos en Facebook </a><i class="fa fa-facebook-square"> </i></h6>
                        </div>
                        <div class=" col-md-3 col-sm-3">
                          <h5>Central y sucursales</h5>
                          <h6>Calle Aldabas 559 of. 803  <br>Santiado de Surco <br>Lima
                        </h6></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row  justify-content-md-center justify-content-sm-center mb-5">
            <div class="tittledetail col-md-9 col-sm-9 col-xs-9">
              <div class="row">
                <div class="col-md-5 col-sm-12">
                  <h3><img src="{{asset('img/catalogo.png')}}">Catálogo de productos</h3>
                </div>
                <div class="col-md-7 col-sm-12 filters">
                  Ver por:
                  <a href="https://sofiavillazon.github.io/ruloTemplate/perfilVendedor.html#"><i class="fa fa-map"></i></a>
                  <a href="https://sofiavillazon.github.io/ruloTemplate/perfilVendedor.html#"><i class="fa fa-list"></i></a>
                  <a href="https://sofiavillazon.github.io/ruloTemplate/perfilVendedor.html#"><i class="fa fa-th-large"></i></a>
                  <span class="last">
                    <select  onchange="changeOrderBy('{{ Request::fullUrlWithQuery(['sorted' => 'XXX']) }}' )" class="form-control" id="ddlSorted">
                        <option value="" selected="">Relevancia</option>
                        @if(request("sorted")=="DESC")
                            <option value="DESC" selected="selected">De mayor a menor</option>
                        @else
                            <option value="DESC" >De mayor a menor</option>
                        @endif
                        @if(request("sorted")=="ASC")
                            <option value="ASC" selected="">De menor a mayor</option>
                        @else
                            <option value="ASC" >De menor a mayor</option>
                        @endif
                    </select>
                  </span>

                </div>
              </div>
            </div>
            <div class="tittledetail row col-md-9 col-sm-9 col-xs-9">
              <div class="input-group mb-3 col-md-4">
              <input type="text" class="form-control" value="{{$filtro}}" id="txtSearch" placeholder="Ingresa título del producto" aria-label="Recipient&#39;s username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" onclick="search()" type="button"><i class="fa fa-search"></i></button>
                </div>
              </div>
              <div class="input-group justify-content-end mb-3 col-md-8">
                    {!! $products->appends(request()->query())->links('pagination::default') !!}
              </div>

            </div>
            <div class="productosDetail col-md-9 col-sm-9 col-xs-9 p-0">
              <div class="container " id="jar">
                <div class="row">

                    @foreach($products as $product)

                        <div class="col-md-3 content " style="display: block;">
                            <a href="{{url('/p/'.$product->short_name)}}">
                            <div class="card mb-4 ">
                              <img class="card-img-top" src="http://placehold.it/747x456?text=1-350w" data-holder-rendered="true">
                              <div class="card-body">
                              <div class="d-inline-block  text-clearblue uppercase tittleh1">{{$product->short_name}}</div>
                                  <div class=" text-descr">{{$product->info_brief}}</div>
                                  <p class="text-detail  mt-1 ">US$ {{$product->price_list}} - {{$product->price_sale}}</p>
                              </div>
                            </div>
                            </a>
                        </div>
                    @endforeach


                </div>

              </div>
            </div>
            <!-- <div class="tittledetail row col-md-9 col-sm-9 col-xs-9">
              <div class="input-group justify-content-end mb-3 col-md-8">
                <ul class="pagination  pagination-sm">
                </ul>
              </div>
            </div> -->

          </div>
        </div>
      </main>
      <script>



        function search(){
            location.href=$("#hddUrl").val()+"q="+$("#txtSearch").val();
        }

        function changeOrderBy(url){
                location.href=url.replace("XXX",$('#ddlSorted').val())
        }

      </script>
@endsection
