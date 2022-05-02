<?php
$email=$_POST['email'];
$clave=$_POST['clave'];
session_start();
$_SESSION['email']=$email;

$conexion=mysqli_connect("127.0.0.1","root","","tienda");

$consulta="SELECT * FROM usuario WHERE email='$email' and clave='$clave'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
   header ("location:index.php");
}else{
   echo'<script type="text/javascript">
   alert("USUARIO NO REGISTRADO");
   window.location.href="registrate.php";
   </script>';
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>