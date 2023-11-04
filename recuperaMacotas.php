<?php
	include "conexion.php";
	include "TipoMascota.php";
	include "Mascota.php";
	include "TipoMascotaDAO.php";
	include "MascotaDAO.php";
	
	$mdao= new MascotaDAO($conn);
	
	$mascotas=$mdao->buscaMascotas();
	echo json_encode($mascotas, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
	
?> 