<?php
session_start();

$mensaje="";

if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){

        case 'Agregar':

                if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){//validamos el id usando desencriptacion
                    $ID = openssl_decrypt($_POST['id'],COD,KEY);
                    $mensaje.="ID Correcto".$ID."<br/>";

                }else {
                    $mensaje.="UpSS... ID Incorrecto".$ID."<br/>";}

                if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){//validamos el nombre
                    $NOMBRE = openssl_decrypt($_POST['nombre'],COD,KEY);
                    $mensaje.="NOMBRE Correcto".$NOMBRE."<br/>";
                }else {
                    $mensaje.="UpSS... Algo pasa con el Nombre"."<br/>";break;}
                

                if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){//validamos el precio
                    $PRECIO = openssl_decrypt($_POST['precio'],COD,KEY);
                    $mensaje.="PRECIO Correcto".$PRECIO."<br/>";
                }else {
                    $mensaje.="UpSS... Algo pasa con el Precio"."<br/>";break;}
                
                if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){//validamos la cantudad de productos
                    $CANTIDAD= openssl_decrypt($_POST['cantidad'],COD,KEY);
                    $mensaje.="CANTIDAD Correcta".$CANTIDAD."<br/>";
                }else {
                    $mensaje.="UpSS... Algo pasa con la Cantidad"."<br/>";break;}

            if(!isset($_SESSION['CARRITO'])){//
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'PRECIO'=>$PRECIO,
                    'CANTIDAD'=>$CANTIDAD,
                );
                $_SESSION['CARRITO'][0]=$producto;//CREA ESPACIO PARA METER LA INFORMACION DE LA VARIABLE PRODUCTO
                $mensaje="Producto agregado al carrito";
            }else{//SIRVE PARA AGREGAR MAS PRODUCTO EN EL CARRITO

                $idProductos=array_column($_SESSION['CARRITO'],"ID");

                if(in_array($ID,$idProductos)){
                    echo "<script>alert('El producto ya ha sido seleccionado....');</script>";
                }else{
                    
                $NumeroProductos=count($_SESSION['CARRITO']);//FUNCION PARA CONTABILIZAR EL NUMERO DE PRODUCTOS
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'PRECIO'=>$PRECIO,
                    'CANTIDAD'=>$CANTIDAD,
                );
                $_SESSION['CARRITO'][$NumeroProductos]=$producto;//COLOCAMOS EL NUMERO DE PRODUCTOS
                $mensaje="Producto agregado al carrito";
                 }
            }    
            //$mensaje=print_r($_SESSION,true);
            //$mensaje="Producto agregado al carrito";

        break;
        case "Eliminar":
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){//validamos el id usando desencriptacion
                $ID = openssl_decrypt($_POST['id'],COD,KEY);
               foreach($_SESSION['CARRITO'] as $indice=>$producto){
                    if($producto['ID']==$ID){
                        unset($_SESSION['CARRITO'][$indice]);
                        echo "<script> alert('Elemento borrado....');</script>";
                    }
               }

            }else {
                $mensaje.="UpSS... ID Incorrecto".$ID."<br/>";} 
        break;    


    }


}
?>