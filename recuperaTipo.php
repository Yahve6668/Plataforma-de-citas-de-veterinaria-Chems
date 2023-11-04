<?php
 include "TipoMascotaDAO.php";
 include "conexion.php";
 $ar=[];
 $r=new TipoMascotaDAO($conn);
 $ar=$r->recu();
 echo $ar;
        
?>