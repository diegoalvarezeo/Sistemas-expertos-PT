<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP-líbreria de estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Productos</title>
</head>
<body>
<?php /* Archivos necesarios para vista y consultas SQL */
      include "Page/NavBar.php"; 
      include '../Config/APP.php';
      /* Consultas SQL */
      $sql = $bd->query("SELECT * FROM productos;");
      $productos = $sql->fetchAll(PDO::FETCH_OBJ);
      
      
      ?>

<h1 style="margin-left: 20%;">
Productos Registrados por unidad</h1>  
<!-- CARDS PRODUCTOS individuales -->
 <div class="container mt-3">
        <div class="row">

            <?php
            
            
            foreach($productos as $dato) { ?>
                <div class="col-lg-2 col-md-6 col-sm-12 m-2">
                    <div class="card ">
                        
                        <div class="card-body ">
                            <h5 class="card-title"><?php echo $dato->nombre_producto ?></h5>
                            Código:
                            <?php echo $dato->id_producto ?>
                            <p class="card-text">Precio:
                            <?php echo $dato->precio_producto ?>
                            </p>
                         
                            
                            
                            
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>        
   
</body>
</html>