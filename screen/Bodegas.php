<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP-líbreria de estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Bodegas</title>
</head>
<body>
    <?php 
    /* Archivos necesarios para consultas y elementos de la página */
    include "Page/NavBar.php";
    include '../Config/APP.php';
    /* Consultas SQL */
    $sql = $bd->query("SELECT * FROM bodegas;");
    $bodegas = $sql->fetchAll(PDO::FETCH_OBJ);
    
    

    
    ?>
    <div  class="p-5" style="margin-left: 15%;">
       <h1>Bodegas y productos por bodega</h1>
    </div>
    <div class="container mt-3">
        <div class="row">

            <?php
            foreach($bodegas as $dato) { ?>
                <!-- CARDS BODEGAS con los productos asociados a el -->
                <div class="col-lg-3 col-md-6 col-sm-12 m-2">
                    <div class="card ">
                        
                        <div class="card-body ">
                            <h3 class="card-title"><?php echo $dato->nombre_bodega ?></h3>
                            <p class="card-text">
                            <?php echo $dato->ubicacion_bodega ?>
                            

                            </p>
                            Productos almacenados:
                            <ol>
                            <?php 
                            $sql2 = $bd->query("SELECT * FROM productos Where id_bodega_fk = $dato->id_bodega;");
                            $productosBodega = $sql2->fetchAll(PDO::FETCH_OBJ);
                            /* STOCK */
                            
                            $count=0;
                            /* Producto de cada bodega */
                            foreach($productosBodega as $dato2) { $count = $count + 1?>
                                
                                <li><?php  echo "COD:".$dato2->id_producto." ".$dato2->nombre_producto ?> </li>

                            <?php }?>
                            </ol>
                            Stock en bodega: <?php echo $count?>
                            
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