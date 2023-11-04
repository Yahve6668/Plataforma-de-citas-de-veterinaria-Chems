<?php
 include "conexion.php";
 include "claseUsuario.php";
 include "claseTipoUsuario.php";
 include "claseUsuarioDAO.php";
session_start();

 $nom=$_POST['NombreUs'];
 $cor=$_POST['cor'];
 $cont=$_POST['con'];
 $tp=new TipoUsuario(2,"usuario normal");
 $u=new Usuario(1,$nom,$cor,$cont,$tp);
 $uDAO= new UsuarioDAO($conn);
 if($uDAO->regisval($u)){
       $_SESSION['usern']=$nom;
       
       echo "indexhome_user.html";	 
 }else{
 	  echo 'registrase.html';
  }
?>