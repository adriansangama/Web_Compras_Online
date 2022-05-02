<?php 
error_reporting(0);
session_start();
$mensaje="";

if(isset($_POST['btnAccion'])){
        
    switch($_POST['btnAccion']){

        case 'Agregar': 

            if(is_numeric($_POST['idProducto'])){
                $ID=($_POST['idProducto']);
                $mensaje.="OK ID correcto".$ID."<br/>";

            }else{
                $mensaje.="Ups ID incorrecto".$ID."<br/>";
            }
            if(is_string($_POST['Nombre'])){
                $NOMBRE=($_POST['Nombre']);
                $mensaje.="OK NOMBRE correcto".$NOMBRE."<br/>";
                }else{  $mensaje.="Ups Nombre incorrecto"."<br/>"; break;}

                if(is_string($_POST['Descripcion'])){
                    $DESCRIPCION=($_POST['Descripcion']);
                    $mensaje.="OK DESCRIPCION correcto".$DESCRIPCION."<br/>";
                }else{  $mensaje.="Ups Descripcion incorrecto"."<br/>"; break;}

                if(is_numeric($_POST['Precio'])){
                        $PRECIO=($_POST['Precio']);
                        $mensaje.="OK PRECIO correcto".$PRECIO."<br/>";
                }else{  $mensaje.="Ups Precio incorrecto"."<br/>"; break;}
                if(is_numeric($_POST['Stock'])){
                        $CANTIDAD=($_POST['Stock']);
                        $mensaje.="OK CANTIDAD correcto".$CANTIDAD."<br/>";
                }else{  $mensaje.="Ups Cantidad incorrecto"."<br/>"; break;}

                //AGREGAR PRODUCTOS A LA TABLA

            if(!isset($_SESSION['CARRITO'])) { //'CARRITO' ES EL ARRAY QUE ALMACENA LOS PRODUCTOS
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'DESCRIPCION'=>$DESCRIPCION,
                    'PRECIO'=>$PRECIO,
                    'CANTIDAD'=>$CANTIDAD
                    );
                    $_SESSION['CARRITO'][0]=$producto;
                    //array_push($_SESSION['CARRITO'],$producto);
            }else{
                $producto_removed=false;
                $indice=0;
                foreach($_SESSION['CARRITO'] as $indice=>$producto){
                    //compruebo si existe algun producto en el array para eliminar ese producto del array luego se agrega con la nueva cantidad
                if($producto['ID']==$_SESSION['CARRITO']){
                    $new_producto=$producto['CANTIDAD']+$CANTIDAD;
                    unset($_SESSION['CARRITO'][$indice]);

                    $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'DESCRIPCION'=>$DESCRIPCION,
                    'PRECIO'=>$PRECIO,
                    'CANTIDAD'=>$CANTIDAD
                    );
                    array_push($_SESSION['CARRITO'],$producto);

                    $producto_removed=true;
                }
                $indice++;
                }
                // si el producto no estaba en el array entonces se agrega con la cantidad que el cliente eligió
                if(!$producto_removed){
                    $producto=array(
                        'ID'=>$ID,
                        'NOMBRE'=>$NOMBRE,
                        'DESCRIPCION'=>$DESCRIPCION,
                        'PRECIO'=>$PRECIO,
                        'CANTIDAD'=>$CANTIDAD
                        );
                        array_push($_SESSION['CARRITO'],$producto);
                        $mensaje="Producto agregado al carrito";
                }   
            }
            //$mensaje=print_r($_SESSION,true);
        break;
        case 'Eliminar':
            $ID=($_POST['idProducto']);
            $indice=0;
            foreach($_SESSION['CARRITO'] as $indice=>$producto){
                if($producto['ID']==$ID){
                    unset($_SESSION['CARRITO'][$indice]);
                }
                $indice++;
            /*if(is_numeric($_POST['idProducto'])){
                $ID=($_POST['idProducto']);

                foreach($_SESSION['CARRITO'] as $indice=>$producto){
                    if($producto['ID']==$ID){
                        unset($_SESSION['CARRITO'][$indice]);
                        echo "";

                    }
                }

            }else{
                $mensaje.="Ups ID incorrecto".$ID."<br/>";*/
            }
        break;
    }
}
?>