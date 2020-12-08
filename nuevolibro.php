<?php
include 'global/config.php';
include 'global/conexion.php';
include 'templates/cabecera.php';
?>

   <div class = "container">
     <br>   
     <h1>Datos de nuevo libro</h1>

        <div class="contenido">

          <form class="" action="libroguardado.php" method="post">

            <div class="informacion">

                  <div class="campo">
                      <label for="nombre">Título del Libro
                          <input type="text" name="nombre" id="nombre">
                      </label>
                  </div>

                  <div class="campo">
                      <label for="editorial">Editorial del Libro
                          <input type="text" name="editorial" id="editorial">
                      </label>
                  </div>

                  <div class="campo">
                      <label for="precio">Precio del Libro
                            <input value="" type="number" step="any" name="precio" id="precio">
                      </label>
                  </div>

                  <div class="campo">
                      <label for="existencias">Existencias del Libro (Ejemplares en Inventario)
                            <input value="" type="number" step="any" name="existencias" id="existencias">
                      </label>
                  </div>

                  <div class="campo">
                      <label for="portada">URL de la Portada o Cubierta del Libro
                            <input type="text" name="portada" id="portada">
                      </label>
                  </div>

          	</div> <!--.informacion-->

  			<input type="submit" id="btn" name="btn" value="Guardar Libro">

          </form>


        </div>               
                    
    </div>

<br>
<br>
<?php include 'templates/pie.php';?>