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

  <title> Roldy-Bur </title>

  <!-- bootstrap core css -->
  <!-- <link rel="stylesheet" type="text/css" href="web/css/bootstrap.css" /> -->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <!-- <link href="web/css/font-awesome.min.css" rel="stylesheet" /> -->
  <link href="web/fontawesome/css/all.min.css" rel="stylesheet" />
  <link href="web/fontawesome/css/fontawesome.min.css" rel="stylesheet" />

  <!-- <link href="web/css/estilos.css " rel="stylesheet" /> -->

  <!-- responsive style -->
  <link href="web/css/responsive.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="web/css/style.css" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">
    @if(isset($pg) && $pg == 'home')
    <div class="bg-box">
      <img src="web/images/hero-bg.jpg" alt="">
    </div>
    @endif
    <!-- header section strats -->
    <header class="header_section" style="background: rgb(6,6,6);
background: linear-gradient(90deg, rgba(6,6,6,1) 50%, rgba(94,89,89,1) 100%);">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="/">
            <span>
              Roldy-Bur
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item <?php echo isset($pg) && $pg == "home" ? "active" : "" ?> ">
                <a class="nav-link" href="/">Inicio</a>
              </li>
              <li class="nav-item <?php echo isset($pg) && $pg == "takeaway" ? "active" : "" ?> ">
                <a class="nav-link" href="/takeaway">Menú</a>
              </li>
              <li class="nav-item <?php echo isset($pg) && $pg == "nosotros" ? "active" : "" ?> ">
                <a class="nav-link" href="/nosotros">Nosotros</a>
              </li>
              <li class="nav-item <?php echo isset($pg) && $pg == "contacto" ? "active" : "" ?> ">
                <a class="nav-link" href="/contacto">Contacto</a>
              </li>
            @if(Session::get("idcliente") > 0)
            <li class="nav-item">
              <div>
                <a class="cart_link nav-link me-4" href="/carrito">
                  <i class="fa-solid fa-cart-shopping text-white"></i>
                </a>
              </div>
            </li>
            @endif
            <div class="user_option">
              @if(Session::get("idcliente") > 0)
              <li class="nav-item">
              <div class="dropdown">
                <a class="order_online dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Cuenta
                   <i class="fa fa-user" aria-hidden="true"></i> 
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="/mi-cuenta">Ir a mi cuenta</a></li>
                  <li><a class="dropdown-item" href="/salir">Salir</a></li>
                </ul>
              </div>
              </li>
              @else
              <li class="nav-item">
              <div class="dropdown">
                <a class="order_online dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Ingresar
                   <i class="fa fa-user" aria-hidden="true"></i> 
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="/ingresar">Inicia sesión</a></li>
                  <li><a class="dropdown-item" href="/nuevo-registro">Registrate</a></li>
                </ul>
              </div>
              </li>
              @endif
            </div>
            </ul>
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
          @if(isset($fg) && $fg =='all')
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
          @if(isset($pg) && $pg == 'nosotros')
          <div class="col-md-12 footer-col">
            <div class="footer_detail">
              <a href="" class="footer-logo">
                Roldy Bur
              </a>
              <p>
                Seguinos en nuestras redes sociales!
              </p>
              <div class="footer_social">
                <a href="">
                  <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="">
                  <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="">
                  <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="">
                  <i class="fa-brands fa-github"></i>
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
            <a href="https://themewagon.com/" target="_blank">Roldy Burger</a>
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
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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