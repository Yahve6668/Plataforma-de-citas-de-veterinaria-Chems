<?php
 include "conexion.php";
 include "ComentarioDAO.php";
 include "claseUsuarioDAO.php";
 include "claseUsuario.php";
 include "TipoUsuarioDAO.php";
 include "claseTipoUsuario.php";
 
 session_start();
 $idis=[];
 $idDoc=$_POST['IdDocO'];
 $come=$_POST['comet'];
 $User=$_SESSION['usern'];
 $bus=new UsuarioDAO($conn);
 $idUser=$bus->buscaUsuario($User);
 array_push($idis,$idUser->getIdUsuario());
 array_push($idis,$idDoc);
 $inserC=new ComentariosDAO($conn);
 $inserC->insertComent($idis,$come);
 echo "registro Realizado";
?>