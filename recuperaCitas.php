<?php
	include "conexion.php";
	include "TipoCita.php";
	include "Doctor.php";
	include "Mascota.php";
    include "TipoMascota.php";
	include "claseUsuario.php";
	include "claseTipoUsuario.php";
	include "Cita.php";
	include "TipoCitaDAO.php";
	include "DoctorDAO.php";
	include "MascotaDAO.php";
    include "TipoMascotaDAO.php";
	include "claseUsuarioDAO.php";
	include "TipoUsuarioDAO.php";
	include "CitaDAO.php";
    session_start();
    $id=$_SESSION['usern'];
	$cdao= new CitaDAO($conn);
	$citas=$cdao->buscaCitas($id);
	//echo "hola $id";
    echo json_encode($citas, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
	
?> 