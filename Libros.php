<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>

   <div class = "container">
     <br>   
     <h1>Libros de Musica</h1>

     <a href="nuevolibro.php" class="boton">Insertar nuevo libro</a>

     <?php if($mensaje!="") {?>
        <div class="alert alert-warning">
            <?php echo $mensaje;?>
            <a href="mostrarCarrito.php" class="badge-warning">Ver carrito</a>
           
        </div>
     <?php } ?>   
        <div class = "row">
            <?php
                $sentencia=$pdo->prepare("SELECT * FROM `libros`");
                $sentencia->execute();
                $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                //print_r($listaProductos);
            ?>
            <?php foreach($listaProductos as $producto){?>
                <div class = "col-3">
                <div class ="card">
                    <img
                    title="<?php echo $producto['libro_nombre'];?>"
                    alt="<?php echo $producto['libro_nombre'];?>"
                    class ="card-img-top" 
                    src="<?php echo $producto['imagen'];?>"
                    height="317px"
                    >
                    <div class="card-body">
                            <span><?php echo $producto['libro_nombre'];?></span>
                            <h5 class="card-text">Editorial:<?php echo $producto['libro_editorial'];?></h5>
                            <h5 class="card-title">$<?php echo $producto['libro_precio'];?></h5>
                            
                            <form action=""method="post">

                            <input type="hidden"name="id" id="id" value="<?php echo openssl_encrypt($producto['libro_id'],COD,KEY);?>">
                            <input type="hidden"name="nombre"id="nombre" value="<?php echo openssl_encrypt($producto['libro_nombre'],COD,KEY);?>">
                            <input type="hidden"name="precio"id="precio" value="<?php echo openssl_encrypt($producto['libro_precio'],COD,KEY);?>">
                            <input type="hidden"name="cantidad"id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">
                            
                            <button class = "btn btn-primary" 
                            name ="btnAccion" 
                            value ="Agregar" 
                            type ="submit">
                            Agregar al carrito   
                            </button>
                            </form>
                            
                    </div>
                </div>    
                        
            </div>
            <?php } ?>

            
           
        </div>
                
                    
    </div>

<br>
<br>
<?php include 'templates/pie.php';?>
