<?php
include "conexion.php";
include "carrito.php";
session_start();
if(isset($_SESSION['email'])){
  $email=$_SESSION['email'];
}else{
  header ("location:login.php");
}
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
            <strong class="text-black">Carrito</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <?php if (!empty($_SESSION['CARRITO'])) { ?>
          <div class="row mb-5">
            <form class="col-md-12" method="post">
              <div class="site-blocks-table">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="product-thumbnail">Juego</th>
                      <th class="product-name">Descripcion</th>
                      <th class="product-price">Cantidad</th>
                      <th class="product-quantity">Precio</th>
                      <th class="product-total">SubTotal</th>
                      <th class="product-remove">Remove</th>
                    </tr>
                  </thead>
                  <?php $total = 0 ?>
                  <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
                    <tbody>
                      <tr>
                        <td class="product-thumbnail">
                          <img src="images/<?php echo $producto['ID'] ?>.jpg" alt="Image" class="img-fluid">
                        </td>
                        <td class="product-name">
                          <h2 class="h5 text-black"><?php echo $producto['NOMBRE'] ?></h2>
                        </td>
                        <td><?php echo $producto['CANTIDAD'] ?></td>
                        <td><?php echo $producto['PRECIO'] ?></td>
                        <td><?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'], 2) ?></td>
                        <td>

                          <form action="" method="post">
                            <input type="hidden" name="idProducto" id="idProducto" value="<?php echo $producto['ID'] ?>">

                            <button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
                          </form>
                        </td>
                      </tr>
                      <?php $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']) ?>
                    <?php } ?>
                    </tbody>
                </table>

              </div>
            </form>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                  <a href="mostrarcarrito.php"><button class="btn btn-primary btn-md btn-block">Actualizar Carrito</button></a>
                </div>
                <div class="col-md-6">
                  <a href="index.php"><button class="btn btn-outline-primary btn-md btn-block">Seguir Comprando</button></a>
                </div>
              </div>

            </div>
            <div class="col-md-6 pl-5">
              <div class="row justify-content-end">
                <div class="col-md-7">
                  <div class="row">
                    <div class="col-md-12 text-right border-bottom mb-5">
                      <h3 class="text-black h4 text-uppercase">Carrito Total</h3>
                    </div>
                  </div>
                  <div class="row mb-5">
                    <div class="col-md-6">
                      <span class="text-black">Total</span>
                    </div>

                    <div class="col-md-6 text-right">
                      <strong class="text-black"><?php echo number_format($total, 2) ?></strong>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <a href="verificar.php"><button class="btn btn-primary btn-lg btn-block" onclick="window.location='checkout.html'">PROCEDER PAGO</button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <?php } else { ?>
          <div class="alert alert-success">
            No hay productos en carrito
          </div>
        <?php } ?>
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