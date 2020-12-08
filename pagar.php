<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>
<div class="container">
<?php
if($_POST){

    $total=0;
    $SID=session_id();
    $Correo=$_POST['email'];

    foreach($_SESSION['CARRITO'] as $indice=>$producto){
        $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
   }
        $sentencia=$pdo->prepare("INSERT INTO ventas
         (ID,ClaveTransaccion,PaypalDatos,Fecha,Correo,Total,status) 
        VALUES (NULL,:ClaveTransaccion, '', NOW(),:Correo ,:Total, 'pendiente');");

        $sentencia->bindParam(":ClaveTransaccion",$SID);
        $sentencia->bindParam(":Correo",$Correo);
        $sentencia->bindParam(":Total",$total);
        $sentencia->execute();
        $idVenta=$pdo->lastInsertId();

     foreach($_SESSION['CARRITO'] as $indice=>$producto){  //INSERTAMOS INFORMACION EN LA TABLA 

       $sentencia=$pdo->prepare("INSERT INTO
        detalleventa
         (ID, ID_VENTA,ID_PRODUCTO,PRECIO_UNITARIO,CANTIDAD,DESCARGADO)
        VALUES (NULL,:ID_VENTA,:ID_PRODUCTO,:PRECIO_UNITARIO,:CANTIDAD, '0');"); 

        $sentencia->bindParam(":ID_VENTA",$idVenta);
        $sentencia->bindParam(":ID_PRODUCTO",$producto['ID']);
        $sentencia->bindParam(":PRECIO_UNITARIO",$producto['PRECIO']);
        $sentencia->bindParam(":CANTIDAD",$producto['CANTIDAD']);
        $sentencia->execute();
      

     }     
  // echo "<h3>".$total."</h3>";
}


?>

<script src="https://www.paypal.com/sdk/js?client-id=AbOGjNXVyFMzVF4vVoDcG9qT0zjp97Tplvm5CFiQWmQim5DDYdvub_QdUHWzVkHd3cRk1iBFrRxzPMOb&currency=MXN"></script>

 <script src="https://www.paypalobjects.com/api/checkout.js"></script> 

 <style>
    /* Media query for mobile viewport */
    @media screen and (max-width: 400px) {
        #paypal-button-container {
            width: 100%;
        }
    }
    
    /* Media query for desktop viewport */
    @media screen and (min-width: 400px) {
        #paypal-button-container {
            width: 250px;
            display: inline-block;
        }
    }
    
</style>

 <div class="jumbotron" style = "background-color:#292825">
     <div class="text-white text-center rgba-stylish-strong">

          <h1 class="display-4">¡Paso Final!</h1>
          <hr class="my-4">
          <p class="lead"> Estas a punto de proceder a pagar  la cantidad de  :
               <h2>$<?php echo  number_format($total,2); ?></h2>
               <div id="paypal-button-container"></div> 
          </p>
          
          <p>Podras descargar los libros una vez procesado el Pago <br> 
          (Para aclaraciones puedes ponerte en contacto con nosotros a traves de nuesto correo o telefono)
          </p>
     </div>     
</div>

<script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({
           

            style: {
                size: 'responsive',
                shape: 'pill',
                label: 'pay'

            },

            
        client: {
            sandbox:   'AW-TxAd6-3EB4GLq2ENwC2dayZl_1sKQayFkhdt1iB1lQa7e8MY59iGXeYcmIvFIe_E9DS3dnAAp6080',
            production: 'insert production client id'
        },
            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            
                            value: '<?php echo $total;?>',                            
                        },
                        description: 'Compra de productos a la tienda por un valor de $ <?php echo number_format($total); ?> COP ',
                        reference_id: "<?php echo $SID; ?>#<?php echo openssl_encrypt($idVenta,COD,KEY);?>"
  //paypal en su documentacion nueva no utiliza custom pot que ahora utiliza reference_id, por eso se debe utilizar este capo
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
 // yo deje esta alerta para una mejor verificacion del codigo
                    console.log(data);
 //con este codigo se muestran las variables de data depaypal  en el consola del explorador
                    window.location="verificador.php?facilitatorAccessToken="+data.facilitatorAccessToken+"&orderID="+data.orderID+"&payerID="+data.payerID
                    
                });
            }


        }).render('#paypal-button-container');
    </script>

<form action="verificador.php" method ="post">
    <input type="hidden" name ="IDVENTA" id ="" value ="<?php echo $idVenta;?>">
    <input type="hidden" name ="IDPODUCTO" id ="" value ="<?php echo $producto["ID"];?>">
    </form> 
<?

$sentencia=$pdo->prepare("UPDATE ventas
SET `PaypalDatos` = 'NO se pudo obtener la informacion por error en el id', `status` = 'Aprobado' 
WHERE `ventas`.`ID` = :id");
$sentencia->bindParam(":id",$idVenta);
$sentencia->execute();
?>
</div>
<?php include 'templates/pie.php';?>