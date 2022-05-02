<?php
include "conexion.php";
include "carrito.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Adict Game &mdash; Colorlib Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">


  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="style2.css">

</head>

<body>

  <div class="site-wrap">


    <div class="site-navbar py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="index.php"><img src="images/logo.png" class="js-logo-clone" style="float:left;width:160px;height:42px;"></a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="active"><a href="index.php">Inicio</a></li>
                <li><a href="registrate.php">Regístrate</a></li>
                <li><a href="login.php">Iniciar sesión</a></li>
                <li><a href="contactanos.php">Contáctanos</a></li>
              </ul>
            </nav>
          </div>

          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="mostrarcarrito.php" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number">(<?php
                                    echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']);
                                    ?>)</span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div>
          <div class="navbar-nav">
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Bienvenido  <?php echo $_SESSION['email']?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Cerrar sesión</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-blocks-cover" style="background-image: url('images/game.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
            <div class="site-block-cover-content text-center">
              <h2 class="sub-title">Contenido oficial y de la comunidad para todos los juegos y software.</h2>
              <h1>Bienvenidos a Adict Game</h1>
              <p>
                <a href="#" class="btn btn-primary px-5 py-3">Shop Now</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 style="font-family:Arial;font-size:400%;">JUEGOS POPULARES</h2>
          </div>
        </div>
        <br>
        <div class="row">
          <?php
          $consulta = "SELECT * FROM producto";
          $resultado = $conexion->query($consulta);
          while ($mostrar = $resultado->fetch_assoc()) {
          ?>


            <div class="col-sm-6 col-lg-4 text-center item mb-4">
              <span class="tag">Sale</span>
              <a href="juego.php?idProducto=<?php echo $mostrar['idProducto'] ?>">
                <img src="images/<?php echo $mostrar['idProducto'] ?>.jpg" alt="Image"></a>
              <br>
              <br>
              <h3 class="text-dark"><a href="juego.php"><?php echo $mostrar['Nombre'] ?></a></h3>
              <p class="price"><del>95.00</del> &mdash; <?php echo $mostrar['Precio'] ?></p>
            </div>


          <?php
          }
          ?>
        </div>
      </div>
    </div>

    <div class="site-blocks-cover" style="background-image: url('images/s3.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
            <div class="site-block-cover-content text-center">
              <h2 class="sub-title">La comunidad recomienda estos juegos de hoy</h2>
              <h1>Adict Game</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>
    <div class="footer-dark">
      <footer>
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-3 item">
              <h3>Quienes somos</h3>
              <p>Somos una empresa dedicada a la venta de juegos, fue lanzada en 2005.</p>
            </div>
            <div class="col-sm-6 col-md-3 item">
              <h3>Datos de contacto</h3>
              <ul class="list-unstyled">
                <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                <li class="phone"><a href="tel://23923929210">+51 984737456</a></li>
                <li class="email">sangamaadrian7@domain.com</li>
              </ul>
            </div>
            <div class="col-md-6 item text">
              <h3>Company Adict Game</h3>
              <p>© 2022 Adict Game Corporation. Todos los derechos reservados. Todas las marcas registradas pertenecen a sus respectivos dueños en EE. UU. y otros países.
                Todos los precios incluyen IVA (donde sea aplicable).</p>
            </div>
            <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
          </div>
          <p class="copyright">Company Adict Game © 2022</p>
        </div>
      </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>