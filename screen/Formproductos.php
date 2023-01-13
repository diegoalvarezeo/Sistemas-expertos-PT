<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP-líbreria de estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Formulario Productos</title>
</head>
<body>
    <?php 
    /* Archivos necesarios para consultas y elementos de la página */
    include "Page/NavBar.php" ;
    include "../Config/APP.php";
    include "../Controller/productosController.php";
   
    /* Consultas SQL */
    $sql = $bd->query("SELECT * FROM bodegas;");
    $bodegasS = $sql->fetchAll(PDO::FETCH_OBJ);
    
    ?>
    <!-- Formulario Productos -->
    <div class="row">
            <form method="POST" class="col-6" action="">
            
                <div class=" border m-4 p-4">
                    <div class="mb-3">
                        <label for="nombre_producto" class="form-label">Ingrese Nombre Producto</label>
                        <input type="test" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Nombre producto">
                    </div>
                    <div class="mb-3">
                        <label for="price_product" class="form-label">Ingrese Precio Producto</label>
                        <input type="text" class="form-control" id="precio_producto" name="precio_producto" placeholder="Precio producto">
                    </div>
                    <!-- <div class="mb-3">
                        <label for="stock_producto" class="form-label">Ingrese Stock Producto</label>
                        <input type="text" class="form-control" id="stock_producto" name="stock_producto"placeholder="Stock producto">
                    </div> -->
                    <select class="form-select " aria-label="Default select example"name="id_bodega_fk" id="id_bodega_fk">
                        <option disabled value="" selected>Seleccione Bodega de alojamiento</option>
                        <?php foreach($bodegasS as $dato){
                            echo "<option value=".$dato->id_bodega.">".$dato->nombre_bodega." Ubicación: ".$dato->ubicacion_bodega."</option>";
                        } ?>
                        
                    </select>
                    <button type="submit" name="btningresarp" class="btn btn-primary  mt-2" value="ok">Enviar</button>    
                </div>
                

        
            </form>
    </div>
</body>
</html>