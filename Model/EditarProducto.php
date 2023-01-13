<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
<?php 
/* Archivos necesarios para vista y consulta SQL */
      include "../screen/Page/NavBar.php";
      include "../Controller/productosController.php";
      include '../Config/APP.php';
/* Consultas SQL */
$id = $_GET["id"];
$sql = $bd->query("SELECT * FROM productos WHERE id_producto=$id;");
$producto = $sql->fetchAll(PDO::FETCH_OBJ);
foreach($producto as $dato) {
    $dato->id_bodega_fk;
}
$sql2 =  $bd->query("SELECT * FROM bodegas");
$bodegas = $sql2->fetchAll(PDO::FETCH_OBJ);



foreach($producto as $dato) { ?>
<!-- FORMULARIO EDITAR PRODUCTO -->
<form method="POST" class="col-6" action="">
        <input type="hidden" name="id" value="<?php echo $_GET["id"]?>"> 
            <div class=" border m-4 p-4">
                <div class="mb-3">
                    <label for="nombre_producto" class="form-label">Editar Nombre Producto</label>
                    <input type="test" value="<?php echo $dato->nombre_producto?>" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Nombre producto">
                </div>
                <div class="mb-3">
                    <label for="price_product" class="form-label">Editar Precio Producto</label>
                    <input type="text" value="<?php echo $dato->precio_producto?>"  class="form-control" id="precio_producto" name="precio_producto" placeholder="Precio producto">
                </div>
                
                
                <select class="form-select " aria-label="Default select example"name="id_bodega_fk" id="id_bodega_fk">
                        <option disabled value="" selected>Seleccione Bodega de alojamiento</option>
                        <?php foreach($bodegas as $dato2){
                            $selected = "";
                            if($dato2->id_bodega==$dato->id_bodega_fk){
                                 $selected =$dato2->nombre_bodega;
                            }
                            
                            echo "<option value=".$dato2->id_bodega." >".$dato2->nombre_bodega." Ubicación: ".$dato2->ubicacion_bodega."</option>";
                        } ?>
                        
                    </select>
                    
                <button type="submit" name="btningresarpA" class="btn btn-primary mt-2" value="ok">Actualizar</button>    
            </div>
            

    
        </form>
        <?php }?>
</body>
</html>

