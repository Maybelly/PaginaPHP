<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Hamelin</title>
    <link href="https://fonts.googleleapis.com/css?family=Lato:300,400,700,900" 
    
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    
</head>

<body style="background-color:rgb(0, 0, 0);">
    <header class="site-header inicio">
        <div class="contenedor contenido-header">
            <div class="barra">
               <a href="/">           
                 <img src="img/encuentra.jpg" alt="Logotipo ">  
               </a>
   
                  <nav class="navegacion">
                    <a href="index.html">inicio</a>
                    <a href="Nosotros.html">Quienes Somos</a>
                    <a href="Cursos.html">Cursos</a>
                    <a href="Contacto.html">Contacto</a>
                    <a href="Libros.php">Libros</a>
                    <a href="mostrarCarrito.php">Carrito(<?php 
                    echo(empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
                    ?>)</a>
                  </nav>
            </div>
            
         </div>
         
    </header> 
  <br/> 
  <br/> 
<div>