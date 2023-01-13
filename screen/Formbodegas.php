<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP-líbreria de estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Formulario bodegas</title>
</head>
<body>
    <?php 
    /* Archivos necesarios para consultas y elementos de la página */
    include "Page/NavBar.php" ;
    include "../Config/APP.php";
    include "../Controller/bodegasController.php";
    
    ?>
    <div class="row">
            <form class="col-6" method="POST" action="">
            
                <div class="border m-4 p-3">
                    <div class="mb-3">
                        <label for="nombre_bodega" class="form-label">Ingrese Nombre Bodega</label>
                        <input type="test" class="form-control" id="nombre_bodega" name="nombre_bodega" placeholder="Nombre bodega">
                    </div>
                    <div class="mb-3">
                        <label for="ubicacion_bodega" class="form-label">Ingrese Ubicación Bodega</label>
                        <input type="text" class="form-control" id="ubicacion_bodega" name="ubicacion_bodega" placeholder="Ubicación">
                    </div>
                    <button type="submit" name="btningresarb" class="btn btn-primary" value="ok">Enviar</button>
                </div>
                

            </form>

<!-- <ul class="list-group col-6 p-4">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A fourth item</li>
                        <li class="list-group-item">And a fifth one</li>
            </ul> -->
</div>
</body>
</html>