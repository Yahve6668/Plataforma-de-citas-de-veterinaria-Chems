<?php
 include "conexion.php";
 include "DoctorDAO.php";
 $ar=[];
 $r=new DoctorDAO($conn);
 $ar=$r->recu();
 echo $ar;

?>