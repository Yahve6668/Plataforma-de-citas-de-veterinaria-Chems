<?php
    $server = "localhost";
    $user= "root";
    $password= "1234";
    $db= "veterinaria";
    $conn= new mysqli($server,$user,$password,$db);
    if($conn->connect_error){
        die("Conexion Fallida".$conn->connect_error);
    }

?>