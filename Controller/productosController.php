<?php 
include '../Config/APP.php';



/* INSERTAR DATOS A PRODUCTOS */
if(!empty($_POST["btningresarp"]))
{
    
    if(!empty($_POST["nombre_producto"]) and !empty($_POST["precio_producto"])and !empty($_POST["id_bodega_fk"])){
       
       $nombre_producto = $_POST["nombre_producto"];
       $precio_producto = $_POST["precio_producto"];
       $id_bodega_fk = $_POST["id_bodega_fk"];

       $sql = $bd->query("INSERT into productos(nombre_producto, precio_producto, id_bodega_fk) values('$nombre_producto','$precio_producto', '$id_bodega_fk') ");
       if($sql==true){
         
        echo '<div class="alert alert-success" role="alert">
          Producto registrado con exito!
        </div>';
         
       }else{
        echo '<div class="alert alert-danger" role="alert">
        Error al registrar el producto!
      </div>';
       }
    }else{
        echo '<div class="alert alert-warning" role="alert">
        Algunos de los campos esta vacio, porfavor completelos!
      </div>';
    }
}
/* INGRESAR MULTIPLE DATA, Para efectos de simplicidad se agregarán los registros  con mismos nombres,
precio y locación, en vez de realizar el input para cada uno de ellos con los campos antes mencionados*/
if(!empty($_POST["btningresarMp"])){
    for($i=0; $i<$_POST["numero"]; $i++){
    if(!empty($_POST["nombre_producto"]) and !empty($_POST["precio_producto"])and !empty($_POST["id_bodega_fk"])){
       
        $nombre_producto = $_POST["nombre_producto"];
        $precio_producto = $_POST["precio_producto"];
      
        $id_bodega_fk = $_POST["id_bodega_fk"];
 
        $sql = $bd->query("INSERT into productos(nombre_producto, precio_producto, id_bodega_fk) values('$nombre_producto','$precio_producto', '$id_bodega_fk') ");
        
     }else{
         echo '<div class="alert alert-warning" role="alert">
         Algunos de los campos esta vacio, porfavor completelos!
       </div>';
     }
     if($sql==true){
          
        echo '<div class="alert alert-success" role="alert">
          Producto registrado con exito!
        </div>';
         
       }else{
        echo '<div class="alert alert-danger" role="alert">
        Error al registrar el producto!
      </div>';
       }
    }
}


/* Editar producto */
if(!empty($_POST["btningresarpA"]))
{
    if(!empty($_POST["nombre_producto"]) and !empty($_POST["precio_producto"])and !empty($_POST["id_bodega_fk"])){
       $id = $_POST["id"];
       $nombre_producto = $_POST["nombre_producto"];
       $precio_producto = $_POST["precio_producto"];
       
       $id_bodega_fk = $_POST["id_bodega_fk"];

       $sql = $bd->query("UPDATE productos set nombre_producto='$nombre_producto', precio_producto='$precio_producto', id_bodega_fk='$id_bodega_fk' WHERE id_producto = $id");
       if($sql==true){
        header("location:/Prueba_sistemas_expertos/screen/Gestion.php");
        echo '<div class="alert alert-success" role="alert">
          Producto registrado con exito!
        </div>';
         
       }else{
        echo '<div class="alert alert-danger" role="alert">
        Error al registrar el producto!
      </div>';
       }
    }else{
        echo '<div class="alert alert-warning" role="alert">
        Algunos de los campos esta vacio, porfavor completelos!
      </div>';
    }
}
if(!empty($_GET["idE"])){
    $id= $_GET["idE"];
    $sql = $bd->query("DELETE from productos WHERE id_producto=$id");
    if($sql==true){
        header("location:/Prueba_sistemas_expertos/screen/Gestion.php");
        echo '<div class="alert alert-success" role="alert">
          Producto eliminado con exito!
        </div>';
         
       }else{
        echo '<div class="alert alert-danger" role="alert">
        Error al eliminar el producto!
      </div>';
       }
}


?>