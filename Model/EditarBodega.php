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
/* Archivos necesarios para vista y consultas */
      include "../screen/Page/NavBar.php";
      include "../Controller/bodegasController.php";
      include '../Config/APP.php';

/* Consultas SQL  */      
$id = $_GET["id"];
$sql = $bd->query("SELECT * FROM bodegas WHERE id_bodega=$id;");
$bodega = $sql->fetchAll(PDO::FETCH_OBJ);
foreach($bodega as $dato) { ?>

<!-- Formulario editar Bodega -->
<form class="col-6" method="POST" action="">
<input type="hidden" name="id" value="<?php echo $_GET["id"]?>">     
                <div class="border m-4 p-3">
                    <div class="mb-3">
                        <label for="nombre_bodega" class="form-label">Editar Nombre Bodega</label>
                        <input type="test" value="<?php echo $dato->nombre_bodega?> "class="form-control" id="nombre_bodega" name="nombre_bodega" placeholder="Nombre bodega">
                    </div>
                    <div class="mb-3">
                        <label for="ubicacion_bodega" class="form-label">Editar Ubicación Bodega</label>
                        <input type="text" class="form-control" value="<?php echo $dato->ubicacion_bodega?> " id="ubicacion_bodega" name="ubicacion_bodega" placeholder="Ubicación">
                    </div>
                    <button type="submit" name="btningresarbA" class="btn btn-primary" value="ok">Actualizar</button>
                </div>
                

</form>
    <?php }?>
</body>
</html>

