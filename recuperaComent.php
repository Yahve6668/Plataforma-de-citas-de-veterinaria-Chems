<?php
 include "ComentarioDAO.php";
 include "conexion.php";
 
 $comen=new ComentariosDAO($conn);
 $a=$comen->recucoment();
 echo $a;

?>