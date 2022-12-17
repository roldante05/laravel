
@extends('web.plantilla')
@section('contenido')
  <!-- food section -->

  <section class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Take away
        </h2>
      </div>
      @if(isset($msg))
              <div class="alert alert-{{ $msg['estado'] }}" role="alert">
                {{$msg["mensaje"]}}
              </div>
              @endif
      <ul class="filters_menu">
        <li class="active" data-filter="*">All</li>
        @foreach($aCategorias as $item)
            <li data-filter=".{{ $item->nombre}}"> {{ $item->nombre}} </li>
        @endforeach
      </ul>

      <div class="filters-content">
        <div class="row grid">
          @foreach($aProductos as $producto)
          @foreach($aCategorias as $itemCategoria)
            @if($producto->fk_idcategoria == $itemCategoria->idcategoria)
              <div class="col-sm-6 col-lg-4 all {{$itemCategoria->nombre}}">
            @endif
          @endforeach
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="/files/{{$producto->imagen}}" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    {{$producto->nombre}}
                  </h5>
                  <p>
                  {{$producto->descripcion}}
                </p>
                  <div class="options">
                    
                    <h6>
                    {{"$ ".number_format($producto->precio, 0, ",", ".") ;}}
                    </h6>

                    <form action="" method="POST">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                      <div class="d-flex align-items-center">

                        <div class="btn selecCant" style="background: #f1f2f3; border-radius: 30px;margin-top: 2px;padding-bottom: 4px;padding-top: 4px;">
                          <input type="hidden" name="txtIdProducto" value="{{$producto->idproducto}}">
                          <input type="number" name="txtCantidadProducto" id="" class="text-center" style="border: 0;outline: none; background-color:  #f1f2f3; cursor: pointer; " min="1" value="1" max="10">
                        </div>
                        <button style="background-color: #ffbe33; border: none; border-radius: 17px; padding: 4px 10px;  margin-left: 15px;" type="submit"><i class="fa-solid fa-cart-plus text-white"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          View More
        </a>
      </div>
    </div>
  </section>

  <!-- end food section -->

  @endsection