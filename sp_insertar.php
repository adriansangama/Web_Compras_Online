<?php
$conexion=mysqli_connect("127.0.0.1","root","","tienda");

$email=$_POST['email'];
$clave=$_POST['clave'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$telefono=$_POST['telefono'];

$consulta="INSERT INTO usuario(email,clave,nombre,apellido,telefono) VALUES('$email','$clave','$nombre','$apellido','$telefono')";
$resultado=$conexion->query($consulta);
if($resultado){
   header ("location:index.php");
}
else{
   echo "No se inserto";
}
?>