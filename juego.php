<?php
include "conexion.php";
include "carrito.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pharma &mdash; Colorlib Template</title>
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
                <li><a href="index.php">Inicio</a></li>
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

        </div>
      </div>
    </div>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a><span class="mx-2 mb-0">/</span> <strong class="text-black">Video Game</strong></div>
        </div>
      </div>
    </div>
    <div class="container">
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <?php
          include("conexion.php");
          $producto = $_GET['idProducto'];
          $consulta = "SELECT * FROM producto where idProducto=$producto";
          $resultado = $conexion->query($consulta);
          while ($mostrar = $resultado->fetch_assoc()) {
          ?>
            <div class="col-md-5 mr-auto">
              <div class="border text-center">
                <img src="images/img/<?php echo $mostrar['idProducto'] ?>.jpg" alt="Image" class="img-fluid p-5">
              </div>
            </div>
            <div class="col-md-6">
              <h2 class="text-black"><?php echo $mostrar['Nombre'] ?></h2>
              <p><?php echo $mostrar['Descripcion'] ?></p>
              <p><del>$95.00</del> <strong class="text-primary h4"><?php echo $mostrar['Precio'] ?></strong></p>

              <form action="" method="post">

                <input type="hidden" name="idProducto" id="idProducto" value="<?php echo $mostrar['idProducto'] ?>">
                <input type="hidden" name="Nombre" id="Nombre" value="<?php echo $mostrar['Nombre'] ?>">
                <input type="hidden" name="Descripcion" id="Descripcion" value="<?php echo $mostrar['Descripcion'] ?>">
                <input type="text" name="Stock" id="Stock" value="<?php echo $mostrar['Stock'] ?>"><br>
                <br>
                <input type="hidden" name="Precio" id="Precio" value="<?php echo $mostrar['Precio'] ?>">
                <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">
                  Agregar al carrito
                </button>
              </form>

              <div class="mt-5">
                <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Información</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Especificiones</a>
                  </li>

                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <table class="table custom-table">
                      <thead>
                        <th>Material</th>
                        <th>Descripcion</th>
                        <th>Embalaje</th>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">SO:</th>
                          <td>Windows 7 o posterior</td>
                          <td>1 TB</td>
                        </tr>
                        <tr>
                          <th scope="row">Procesador:</th>
                          <td>Intel o AMD de doble núcleo a 2,8 GHz</td>
                          <td>AMD</td>
                        </tr>
                        <tr>
                          <th scope="row">Memoria:</th>
                          <td>4 GB de RAM</td>
                          <td>1 GB</td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                    <table class="table custom-table">

                      <tbody>
                        <tr>
                          <td>Red:</td>
                          <td class="bg-light">Conexión de banda ancha a Internet</td>
                        </tr>
                        <tr>
                          <td>Almacenamiento:</td>
                          <td class="bg-light">15 GB de espacio disponible</td>
                        </tr>
                        <tr>
                          <td>Tarjeta de sonido:</td>
                          <td class="bg-light">Tarjeta de sonido compatible con OpenAL</td>
                        </tr>
                        <tr>
                          <td>DirectX:</td>
                          <td class="bg-light">Versión 9.0c</td>
                        </tr>
                      </tbody>
                    </table>

                  </div>

                </div>
              </div>


            </div>
          <?php
          }
          ?>
        </div>

      </div>
    </div>
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