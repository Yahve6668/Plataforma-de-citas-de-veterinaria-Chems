<?php
 include "conexion.php";
 include "TipoCitaDAO.php";
 $ar=[];
 $r=new TipoCitaDAO($conn);
 $ar=$r->recu();
 echo $ar;

?>