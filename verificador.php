<?php
include 'global/config.php';
include 'global/conexion.php';
include 'templates/cabecera.php';
include 'carrito.php';
?>
<?php 
 //obtenemos el id de venta y producto
 //print_r($_POST);
//$IDVENTA=$_POST['IDVENTA'];
//$IDPRODUCTO=$POST["IDPRODUCTO"];


    //print_r($_GET);//imprime en pantalla las variables que se pasan por $_GET de la pagina pagar.php
    
    $ClientID="AW-TxAd6-3EB4GLq2ENwC2dayZl_1sKQayFkhdt1iB1lQa7e8MY59iGXeYcmIvFIe_E9DS3dnAAp6080";
 //ojo que es el mio, porfavor utiliza tu id
    $Secret="EJlqxnRquYqHNBiXjRdB5INPk2ANbBwsIQ21h2npRsR32kPklDP1TVbKs_cocrH_VF97RV44thqdHeje";
 //! ojo que es mi clave, porfavor utiliza la tuya!

    //----obtener el token de acceso para consultar la informacion del pago 

    $Login= curl_init("https://api-m.sandbox.paypal.com/v1/oauth2/token");

            curl_setopt($Login,CURLOPT_RETURNTRANSFER,TRUE);

            curl_setopt($Login,CURLOPT_USERPWD,$ClientID.":".$Secret);

            curl_setopt($Login,CURLOPT_POSTFIELDS,"grant_type=client_credentials");

    $Respuesta=curl_exec($Login);    

    $objRespuesta=json_decode($Respuesta);

    $AccessToken=$objRespuesta->access_token;
 // en esta variable almacenamos el token de acceso que nos retorna la peticion que realizamos
    
    //print_r($AccessToken); //Se imprime el token de acceso obtenido de paypal

    //---- codigo para obtener el detalle del pago de la venta
    
    /* Sandbox: https://api-m.sandbox.paypal.com
        Live: https://api-m.paypal.com */

    $Venta=curl_init("https://api-m.sandbox.paypal.com/v2/checkout/orders/".$_GET['orderID']);
//probleams al geneerar el id de referencia     

            curl_setopt($Venta,CURLOPT_HTTPHEADER,array("Content-Type: application/json","Authorization: Bearer ".$AccessToken));

            curl_setopt($Venta,CURLOPT_RETURNTRANSFER, TRUE);

            curl_setopt($Venta,CURLOPT_POST, FALSE);          

            curl_setopt($Venta,CURLOPT_SSL_VERIFYPEER, FALSE);




   //--------------------------error no reconoce Id---------------------------------//        
    //$RespuestaVenta=curl_exec($Venta);

  // print_r($RespuestaVenta); //se imprime en pantalla el detalle de la transaccion realizada

    //$objDatosTransaccion=json_decode($RespuestaVenta);

   // print_r($objDatosTransaccion); // imprimimos los datos del objeto que recibe los detalles de la venta
 

    //print_r($objDatosTransaccion->purchase_units[0]->reference_id); //forma de imprimir el detalle de una variable que esta dentro de un array del objeto


    
    //------ como la estructura del json que devuelve paypal cambio, ahora se deben localizar los datos de la siguiente forma -----
    //$status=$objDatosTransaccion->status;
    //$email=$objDatosTransaccion->payer->email_address;
    //$total=$objDatosTransaccion->purchase_units[0]->amount->value;
    //$currency=$objDatosTransaccion->purchase_units[0]->amount->currency_code;
    //$reference_id=$objDatosTransaccion->purchase_units[0]->reference_id;


   //$SID=$clave[0];
   //$claveVenta=openssl_decrypt($clave[1],COD,KEY);

   //curl_close($venta);
   //cursl_close($Login);

   //echo $claveVenta;
//if($state=="approved"){
   //$mensajePaypal="<h3>PAGO APRPOBADO</h3>";
   //$sentencia=$pdo->prepare("UPDATE ventas
 //SET `PaypalDatos` = 'NO se pudo obtener la informacion por error en el id', `status` = 'Aprobado' 
// WHERE `ventas`.`ID` = :id");
// $sentencia->bindParam(":id",$claveVenta);
// $sentencia->execute();
//echo $mensajePaypal;
 
//}else{
      //$mensajePaypal="<h3>OCURRIO UN PROBLEMA CON TU PAGO</h3>";  
//}





   
///-----------esto solo es simulacion de pago  por el error que se tuvo y no se logro solucionar -------"
?>

<div class="jumbotron" style = "background-color:#292825">
<div class="text-white text-center rgba-stylish-strong">

     <h1 class="display-4">¡Listo Compra Finalizada!</h1>
     <hr class="my-4">
   
</div>     
<a href="Libros.php" class="boton">Volver a Comprar</a>
session_destroy();
</div>
<?php include 'templates/pie.php';?>