<?php
session_start();
ob_start();

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
  <?php
  include "conexion.php";
  include "carrito.php";
  $consulta = "SELECT * FROM producto";
  $resultado = $conexion->query($consulta);
  while ($mostrar = $resultado->fetch_all()) {
  ?>
    <h1 style="font-family:Calibri;" align="center">REPORTE DE COMPRA</h1>
    <br>
    <div class="site-section">
      <div class="container">
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
                  </tr>
                </thead>
                <?php $total = 0 ?>
                <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
                  <tbody>
                    <tr>
                      <td class="product-thumbnail">
                        <img src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/web-adrian/images/img/<?php echo $producto['ID'] ?>.jpg" alt="Image" class="img-fluid">
                      </td>
                      <td class="product-name">
                        <h2 class="h5 text-black"><?php echo $producto['NOMBRE'] ?></h2>
                      </td>
                      <td><?php echo $producto['CANTIDAD'] ?></td>
                      <td><?php echo $producto['PRECIO'] ?></td>
                      <td><?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'], 2) ?></td>
                    </tr>
                    <?php $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']) ?>
                  <?php } ?>
                  </tbody>
              </table>

            </div>
          </form>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
</body>

</html>
<?php
$html = ob_get_clean();
//echo $html;
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
//$dompdf->setPaper('A4','landscape');

$dompdf->render();

$dompdf->stream("archivo_.pdf", array("Attachment" => false))
?>