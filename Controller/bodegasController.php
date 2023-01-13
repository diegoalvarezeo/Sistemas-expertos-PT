<?php 
include '../Config/APP.php';



/* INSERTAR DATOS A BODEGAS */
if(!empty($_POST["btningresarb"]))
{
    if(!empty($_POST["nombre_bodega"]) and !empty($_POST["ubicacion_bodega"])){
       echo "Campos completados"; 
       $nombre_bodega = $_POST["nombre_bodega"];
       $ubicacion_bodega = $_POST["ubicacion_bodega"];
       $sql = $bd->query("INSERT into bodegas(nombre_bodega,ubicacion_bodega) values('$nombre_bodega','$ubicacion_bodega') ");
       if($sql==true){
         
        echo '<div class="alert alert-success" role="alert">
          Bodega registrada con exito!
        </div>';
         
       }else{
        echo '<div class="alert alert-danger" role="alert">
        Error al registrar la bodega!
      </div>';
       }
    }else{
        echo '<div class="alert alert-warning" role="alert">
        Algunos de los campos esta vacio, porfavor completelos!
      </div>';
    }
}

/* EDITAR DATOS DE BODEGAS */
if(!empty($_POST["btningresarbA"]))
{
    if(!empty($_POST["nombre_bodega"]) and !empty($_POST["ubicacion_bodega"])){
       $id= $_POST["id"];
       $nombre_bodega = $_POST["nombre_bodega"];
       $ubicacion_bodega = $_POST["ubicacion_bodega"];
       $sql = $bd->query("UPDATE bodegas set nombre_bodega='$nombre_bodega', ubicacion_bodega='$ubicacion_bodega' WHERE id_bodega = $id");
       if($sql==true){
         header("location:/Prueba_sistemas_expertos/screen/Gestion.php");
        echo '<div class="alert alert-success" role="alert">
          Bodega registrada con exito!
        </div>';
         
       }else{
        echo '<div class="alert alert-danger" role="alert">
        Error al registrar la bodega!
      </div>';
       }
    }else{
        echo '<div class="alert alert-warning" role="alert">
        Algunos de los campos esta vacio, porfavor completelos!
      </div>';
    }
}


/* ELIMINAR BODEGA */
if(!empty($_GET["idb"])){
    $id= $_GET["idb"];
    $sql = $bd->query("DELETE from bodegas WHERE id_bodega=$id");
    if($sql==true){
        header("location:/Prueba_sistemas_expertos/screen/Gestion.php");
        echo '<div class="alert alert-success" role="alert">
          Bodega eliminado con exito!
        </div>';
         
       }else{
        echo '<div class="alert alert-danger" role="alert">
        Error al eliminar la bodega!
      </div>';
       }
}

?>