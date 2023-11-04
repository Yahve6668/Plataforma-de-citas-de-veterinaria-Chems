<?php
 class ComentariosDAO{ 
  public $conexion;
   function __construct($con){
     $this->conexion=$con;
   }
    public function insertComent($arr,$coment){
     $stm=$this->conexion->prepare("insert into comentarios  (comentario, Usuario_idUsuario, Doctor_idDoctor) values(?,?,?)");
     $stm->bind_param("sii",$coment,$arr[0],$arr[1]);
     $stm->execute();
     $stm->close();
   }
      public function recucoment(){			
        $t=$this->conexion->query(" SELECT p.comentario, p.username, d.Nombre AS Doctor FROM (
  SELECT c.comentario, u.Nombre AS username, c.Doctor_idDoctor
  FROM veterinaria.comentarios c
  INNER JOIN usuario u ON c.Usuario_idUsuario = u.idUsuario
) p
INNER JOIN doctor d ON p.Doctor_idDoctor = d.idDoctor;");

        $ar="[";
        while($a=mysqli_fetch_array($t)){  
          $ar .='"';
          $ar .= $a['username'];
          $ar .='"';
          $ar .=',';
          
          $ar .='"';
          $ar .= $a['comentario'];
          $ar .='"';
          $ar .=',';
          
          $ar .='"';
          $ar .=$a['Doctor'];
          $ar .='"';
          $ar .=',';
        } 
        $ar=substr($ar,0,-1);
        $ar.= "]";
        return $ar;
    }
 }
?>