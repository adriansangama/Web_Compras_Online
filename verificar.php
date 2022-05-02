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
          <div class="col-md-12 mb-0">
            <a href="index.php">Inicio</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Pagar</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <div class="bg-light rounded p-3">
              <p class="mb-0">Soy cliente? <a href="registrate.php" class="d-inline-block">Click aquí</a> Registrate</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <form action="pagar.php" method="post">
              <h2 class="h3 mb-3 text-black">DETALLES DE FACTURACIÓN</h2>
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Nombres <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                  </div>
                  <div class="col-md-6">
                    <label for="c_lname" class="text-black">Apellidos <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_address" class="text-black">Dirección <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_address" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_address" class="text-black">Número <span class="text-danger">*</span></label>
                    <input type="numero" class="form-control" id="numero" name="numero" maxlength="9" required>
                  </div>
                </div>
              </div>
          </div>
          <div class="col-md-6">

            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">SU PEDIDO</h2>
                <div class="p-3 p-lg-5 border">
                  <?php if (!empty($_SESSION['CARRITO'])) { ?>
                    <table class="table site-block-order-table mb-5">
                      <thead>
                        <th>Product</th>
                        <th>Total</th>
                      </thead>
                      <?php $total = 0 ?>
                      <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
                        <tbody>
                          <tr>
                            <td><?php echo $producto['NOMBRE'] ?><strong class="mx-2">x</strong><?php echo $producto['CANTIDAD'] ?></td>
                            <td><?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'], 2) ?></td>
                          </tr>
                          <?php $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']) ?>
                        <?php } ?>
                        <tr>
                          <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                          <td class="text-black font-weight-bold"><strong><?php echo number_format($total, 2) ?></strong></td>
                        </tr>
                        </tbody>
                    </table>
                  <?php
                  }
                  ?>
                  <div class="form-group">
                    <a href="pagar.php"><button class="btn btn-primary btn-lg btn-block" type="submit" value="btnAccion" name="proceder">
                        PAGAR ORDEN</button></a>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary btn-lg btn-block" onclick="window.location='reporte.php'">
                      GENERAR REPORTE</button>
                  </div>


                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- </form> -->
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