<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP-líbreria de estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Líbrerias DATATABLES Jquery -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Gestión</title>
</head>
<body>
    <?php 
     /* Archivos necesarios para consultas y elementos de la página */
     include "Page/NavBar.php" ;
     include '../Config/APP.php';
     include "../Controller/productosController.php";
     include "../Controller/bodegasController.php";
     /* Consultas SQL */
     $sql = $bd->query("SELECT * FROM bodegas;");
     $bodegas = $sql->fetchAll(PDO::FETCH_OBJ);


     $sql2 = $bd->query("SELECT * FROM productos;");
     $productos = $sql2->fetchAll(PDO::FETCH_OBJ);
    ?>
    <div class="row m-4">
        <div class="col-6">
        <div class="row">
            <div class="col">
            <h2>Bodegas</h2>
            </div>
            <div class="col">
                <input type="text" id="buscador1" class="form-control">  
            </div>
            
        </div>    
    <!-- Tabla bodegas -->        
    <table class="table border" >
        <thead>
            <tr>
            <th scope="col">COD</th>
            <th scope="col">Nombre</th>
            <th>ubicación</th>
            <th>Acción</th>
            </tr>
        </thead>
        <tbody   id="tablaBodegas">

        <?php
            foreach($bodegas as $dato) { ?>
                <tr>
                <td><?php echo $dato-> id_bodega ?></td>
                <td><?php echo $dato-> nombre_bodega ?></td>
                <td><?php echo $dato-> ubicacion_bodega ?></td>
                <td> <a href="../model/EditarBodega.php?id=<?php echo $dato-> id_bodega ?>"> <i class="bi bi-pencil-square"></i></a>
                <a href="Gestion.php?idb=<?php echo $dato-> id_bodega ?>"> <i class="bi bi-x-lg"></i></a>
            </td>
                </tr>
           <?php }?>
            
        </tbody>
    </table>
    </div>


    
    <div class="col-6">
        <div class="row">
            <div class="col">
                <h2>Productos</h2>
            </div>
            <div class="col">
                <input type="text" id="buscador2" class="form-control">  
            </div>
            
        </div>
    <!-- Tabla PRODUCTOS -->     
    <table class="table border">
        <thead>
            <tr>
            <th scope="col">COD</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            
            <th scope="col">id bodega</th>
            <th>Acción</th>
            </tr>
        </thead>
        <tbody id="tablaProductos">
        <?php
            foreach($productos as $dato) { ?>
            <tr>
            <th scope="row"><?php echo $dato->id_producto?></th>
            <td><?php echo $dato->nombre_producto?></td>
            <td><?php echo $dato->precio_producto?></td>
            
            <td><?php echo $dato->id_bodega_fk?></td>
            <td><a href="../model/EditarProducto.php?id=<?php echo $dato-> id_producto ?>"> <i class="bi bi-pencil-square"></i></a>
              <a href="Gestion.php?idE=<?php echo $dato-> id_producto ?>"><i class="bi bi-x-lg"></i></a>    
            
            </td>
            
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>

    </div>
<!-- Funciones DataTables Jquery -->    
<script>
$(document).ready(function(){
  $("#buscador1").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaBodegas tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
$(document).ready(function(){
  $("#buscador2").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaProductos tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


</body>
</html>