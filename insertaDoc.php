<?php
  include "conexion.php";
  include "claseUsuario.php";
  include "claseTipoUsuario.php";
  include "DoctorDAO.php";
  include "Doctor.php";
  include "claseUsuarioDAO.php";
  $nom=$_POST['Nom'];
  $doc= new Doctor(1,$nom);
  $ti=new TipoUsuario(1,"veterinario");
  $cor=$nom."@gmail.com";
  $con=substr($nom, 0, -1);
  $user=new Usuario(1,$nom,$cor,$con,$ti);
  $uDAO= new UsuarioDAO($conn);
  if($uDAO->regisval($user)){
  	$docD= new DoctorDAO($conn);
  	$docD->insertaDoctor($doc);
  	echo "registro Exitoso";
  }else{
  	echo "Parece que ya exite un doctor con ese nombre";
  }
?>