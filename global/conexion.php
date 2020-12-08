<?php
$servidor="mysql:dbname=".BD.";host=".SERVIDOR;//cadena de conexion obtenida de config.php

try {
    //code...
    $pdo = new PDO($servidor,USUARIO,PASSWORD,
                array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")//cambia los valores de codificacion por default
            );
    //echo "<script>alert('conectado...')</script>";//muestra que la app se conecto a la BD

} catch (PDOException $e){
    //echo "<script>alert('Error...')</script>";
            
}
?>