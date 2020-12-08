<?php
include 'global/config.php';
include 'global/conexion.php';
include 'templates/cabecera.php';
include 'carrito.php';

?>

<?php
 //print_r($_POST);
  $nombrelibro=$_POST['nombre'];
  $editorial=$_POST['editorial'];
  $precio=$_POST['precio'];
  $existencias=$_POST['existencias'];
  $portada=$_POST['portada'];

$sentencia=$pdo->prepare("INSERT INTO libros(libro_id,libro_nombre, libro_editorial, libro_precio, libro_existencias,imagen)
   VALUES (:Nombre,:Editorial,:Precio,:Existencias,:Portada);");

$sentencia->bindParam(":Nombre",$nombrelibro);
$sentencia->bindParam(":Editorial",$editorial);
$sentencia->bindParam(":Precio",$precio);
$sentencia->bindParam(":Existencias",$existencias);
$sentencia->bindParam(":Portada",$portada);
$sentencia->execute();


  
 
//$sentencia=$pdo->prepare("INSERT INTO libros (`libro_id`, `libro_nombre`, `libro_editorial`, `libro_precio`, `libro_existencias`, `imagen`) 
//VALUES (NULL, 'Il Piccolo Pianista, 'Ricordi', '180', '15', 'https://www.elargonauta.com/static/img/portadas/38086.jpg');");

  ?>

  <div class = "container">
     <br>   

        <div class="contenido">

          <?php

          if (!$sentencia)
          { 
            echo "<h1>error</h1>";
          }
          else
          {
             echo "<h1>Libro guardado en el Catálogo</h1>";
             echo "<br>";
             echo "<a href='Libros.php' class = 'boton'> Regresar </a>";
          }

          ?>
        </div>               
                    
    </div>

<br>
<br>

?>
<?php include 'templates/pie.php';?>