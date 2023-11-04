<?php
include 'conexion.php';
include "claseUsuario.php";
include 'claseUsuarioDAO.php';
include "claseTipoUsuario.php";
session_start();
$user=$_POST['USUARIO'];
$con=$_POST['Contra'];
$t=new TipoUsuario(1,"basura");
$u=new Usuario(1,$user,"a",$con,$t);
$c=new UsuarioDAO($conn);
$tipo=$c->login($u);
if($tipo>0){
      $arr=["indexhome_vet.html","indexhome_user.html","indexhome_admin.html"];
      $_SESSION['usern']=$user;
      $tipo-=1;
      header("Location: $arr[$tipo]");
  }else{
    echo'<script type="text/javascript">
    alert("Datos erroneos");
    window.location.href="login.html";
    </script>';
  }
?>
