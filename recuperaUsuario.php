<?php
	include "conexion.php";
	include "TipoUsuario.php";
	include "Usuario.php";
	include "TipoUsuarioDAO.php";
	include "UsuarioDAO.php";
	require_once 'C:\xampp\htdocs\consultaCita\TipoUsuario.php';
	$udao= new UsuarioDAO($conn);

	
	$Usuarios=$udao->buscaUsuarios();
	echo json_encode($Usuarios, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
	
?> 