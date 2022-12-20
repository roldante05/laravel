@extends('web.plantilla')
@section('contenido')
  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="web/images/about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Sobre nosotros!
              </h2>
            </div>
            <p>
             Somos un restaurante Familiar, conformado por 4 personas del equipo
             que nos apasiona lo que es la gastronomia y
             que trabajando en familia formamos un gran equipo.
             Como objetivo principal es sastifacer a nuestros clientes y que mejor manera
             que con una buena hamburguesa, pizza o papas fritas!

            </p>
            <!-- <a href="">
              Read More
            </a> -->
          </div>
        </div>
      </div>
    </div>
  </section>
  

  <!-- end about section -->

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="mt-4 heading_container heading_center psudo_white_primary mb_45">
        <h2>
          Que dicen nuestros clientes?
        </h2>
      </div>
      <div class="carousel-wrap row ">
        <div class="owl-carousel client_owl-carousel">
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                </p>
                <h6>
                  Rocio García
                </h6>
                <p>
                  magna aliqua
                </p>
              </div>
              <div class="img-box">
                <img src="web/images/client1.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                </p>
                <h6>
                  Sebastian Araujo
                </h6>
                <p>
                  magna aliqua
                </p>
              </div>
              <div class="img-box">
                <img src="web/images/client2.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  

  <!-- end client section -->

  <section class="book_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container text-center">
        <h2>
          ¡Trabaja con nosotros!
        </h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form_container">
            <form method="POST" action="" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
              <div>
                <input type="text" class="form-control" placeholder="Nombre y Apellido" name="txtNombre"/>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Numero de Whatsapp" name="txtTelefono" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Correo electronico" name="txtCorreo" />
              </div>
               <div>
                <label for="TxtFechaNac">Mensaje:</label>
                <textarea name="txtMensaje" id="txtMensaje" class="form-control"></textarea>
              </div>
              <div>
                <label for="archivo" class="d-block">Adjunta tu CV:</label>
                <input type="file" name="archivo" id="archivo">
              </div>
              <div class="btn_box text-center">
                <button type="submit">
                  Enviar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  

@endsection
 