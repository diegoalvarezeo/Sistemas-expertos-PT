<?php
/*CONEXIÓON PDO con base de datos mysql*/
    $host = 'localhost';
    $dbname = 'sistemas_expertos';
    $username = 'root';
    $password = '';
    try{
        $bd = new PDO('mysql:host=localhost; dbname=' .$dbname,$username,$password);
    }catch(PDOException $e){
        echo "Fallido";
    }
    
?>
