<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="web/images/favicon.png" type="">

  <title> Feane </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <!-- <link href="web/css/font-awesome.min.css" rel="stylesheet" /> -->
  <link href="web/fontawesome/css/all.min.css" rel="stylesheet" />
  <link href="web/fontawesome/css/fontawesome.min.css" rel="stylesheet" />


  <!-- Custom styles for this template -->
  <link href="web/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="web/css/responsive.css" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">
    @if(isset($pg) &&  $pg == 'home')
    <div class="bg-box">
      <img src="web/images/hero-bg.jpg" alt="">
    </div>
    @endif
    <!-- header section strats -->
    <header class="header_section" style="background: rgb(6,6,6);
background: linear-gradient(90deg, rgba(6,6,6,1) 50%, rgba(94,89,89,1) 100%);" >
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="/">
            <span>
              Feane
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item ">
                <a class="nav-link" href="/">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/takeaway">Takeaway</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/nosotros">Nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/contacto">Contacto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/mi-cuenta">Mi cuenta</a>
              </li>
            </ul>
            <div class="user_option">
             
              <a class="cart_link" href="#">
              <i class="fa-solid fa-cart-shopping text-white"></i>
              </a>
              <a href="/ingresar" class="order_online">
              Ingresar
              <i class="fa fa-user" aria-hidden="true"></i> 
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    @yield('contenido')
    

  
  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
      @if(isset($fg) &&  $fg =='all')
        @foreach($aSucursales as $sucursal )
        <div class="col-md-3 footer-col">
          <div class="footer_contact">
            <h4>
              {{ $sucursal->nombre }}
            </h4>
            <div class="contact_link_box">
              <a target="blank" href="{{$sucursal->linkmapa}}">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Dirección: {{ $sucursal->direccion }}
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Telefono: {{ $sucursal->telefono }}
                </span>
              </a>
            </div>
          </div>
        </div>
        @endforeach
      @endif
        @if(isset($pg) &&  $pg == 'nosotros')
        <div class="col-md-12 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
              Feane
            </a>
            <p>
              Seguinos en nuestras redes sociales!
             </p>
            <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        @endif
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://www.linkedin.com/in/danteroldan/">Dante Roldan</a><br><br>
          &copy; <span id="displayYear"></span> Distributed By
          <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="web/js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="web/js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="web/js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>