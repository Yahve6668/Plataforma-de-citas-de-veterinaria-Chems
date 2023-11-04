<?php
 class UsuarioDAO{
   public $conexion;
   function __construct($con){
     $this->conexion=$con;
   }
   function regis(Usuario $u){
    $sql="SELECT * FROM veterinaria.usuario where usuario.Nombre='lalo' and contraseña='123' ;";
   }
   function buscaUsuario($nom):Usuario{
     $slq="SELECT * FROM veterinaria.usuario where usuario.Nombre='$nom'";
     $consul=$this->conexion->query($slq);
     $row= $consul->fetch_assoc();
     $idT=$row['tipousuario_idTipoUsuario'];
     $slq="SELECT * FROM tipousuario where idTipoUsuario='$idT'";   
     $r=$this->conexion->query($slq);
     $re=$r->fetch_assoc();
     $t=new TipoUsuario($re['idTipoUsuario'],$re['Descripcion']);    
     $u=new Usuario($row['idUsuario'],$nom,$row['correo'],$row['contraseña'],$t);
     return $u;
   }
   function login(Usuario $u){
      $n=$u->getNombre();
      $c=$u->getContraseña();
      $sql="SELECT * FROM veterinaria.usuario where usuario.Nombre='$n' and contraseña='$c' ;";
      $stm=$this->conexion->query($sql);
      if(mysqli_num_rows($stm)){
         $row= $stm->fetch_assoc();
         return $row['tipousuario_idTipoUsuario'];
      }else{
        return 0;
      }
   }

   function regisval(Usuario $u){
     $nom=$u->getNombre();
     $cor=$u->getCorreo();
     $cont=$u->getContraseña();
     $ti=$u->getTipoUsuario()->getIdTipoUsuario();
     $slqv="SELECT * FROM veterinaria.usuario where Nombre='$nom' ";
     $slqv2="SELECT * FROM veterinaria.usuario where correo='$cor' ";
     $r=$this->conexion->query($slqv);
     $r2=$this->conexion->query($slqv2);
     $t=mysqli_num_rows($r)+mysqli_num_rows($r2);
     if($t==0){
       $stm=$this->conexion->prepare("insert into usuario(Nombre, correo, contraseña, tipousuario_idTipoUsuario) values(?,?,?,?)");
        $stm->bind_param("sssi",$nom,$cor,$cont,$ti);
        $stm->execute();
        $stm->close();
        return true;
     }else{
       return false;
     }
   }
 }
 ?>
