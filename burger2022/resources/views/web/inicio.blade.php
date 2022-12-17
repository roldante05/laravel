@extends('web.plantilla')
@section('contenido')
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      Roldy
                    </h1>
                    <p>
                      Pruebe nuestras mejores comidas, tenemos de todo tipo, venga a <br> compartir en familia no se lo pierda no se va arrepentir!.
                     </p>
                      <div class="btn-box">
                      <a href="/takeaway" class="btn1">
                        Ordene ahora
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                    Menú de comida 
                    </h1>
                    <p>
                  Pruebe lo mejor de nuestro menú, si queres comer balanceado veni a probar nuestras hamburguesas,
                  pizzas y papas fritas en cada bocado.
                  </p>
                    <div class="btn-box">
                    <a href="/takeaway" class="btn1">
                        Ordene ahora
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                    Te esperamos!
                    </h1>
                    <p>
                    Te esperamos hoy para disfrutar de nuestro delicioso menú, tambien  
                    puedes ordenar ahora y retirar su pedido por nuestras sucursales!
                     </p>
                    <div class="btn-box">
                    <a href="/takeaway" class="btn1">
                        Ordene ahora
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
          </ol>
        </div>
      </div>
      </div>
    </section>
    <!-- end slider section -->


  <!-- offer section -->

  <section class="offer_section layout_padding-bottom">
    <div class="offer_container">
      <div class="container ">
        <div class="row">
          <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="web/images/o1.jpg" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Tasty Thursdays
                </h5>
                <h6>
                  <span>20%</span> Off
                </h6>
                <a href="">
                   Nuevo Pedido 
                  <i class="fa-solid fa-cart-shopping text-white"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="web/images/o2.jpg" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Pizza Days
                </h5>
                <h6>
                  <span>15%</span> Off
                </h6>
                <a href="">
                  Nuevo Pedido 
                  <i class="fa-solid fa-cart-shopping text-white"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end offer section -->

@endsection
 