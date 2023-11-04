<?php
	class TipoUsuarioDAO{
		public $conexion;
		
		
		public function __construct($conexion){
		$this->conexion=$conexion;
		}
		
		public function __destruct(){}
		
		public function insertaTipoUsuario($tipoUsuario){
			$stm=$this->conexion->prepare("
				insert into tipousuario(Descripcion) values(?)");
			$stm->bind_param("s",$tipoUsuario->getDescripcion());
			$stm->execute();
			$stm->close();
			$this->conexion->close();
		}
		
		public function buscaTipoUsuario($cit):TipoUsuario{
			$sql="SELECT * from tipousuario where Descripcion=".$cit.";";
			$result=$this->conexion->query($sql);
			if($row=$result->fetch_assoc()){
				$d= new TipoUsuario($row['idTipoUsuario'],$row['Descripcion']);
			}
			$this->conexion->close();
			return $d;
		}
		
		public function buscaIdTipoUsuario($cit):int{
			$sql="SELECT * from tipousuario where Descripcion=".$cit.";";
			$result=$this->conexion->query($sql);
			if($row=$result->fetch_assoc()){
				$id=$row['idTipoUsuario'];
			}
			return $id;
		}
		
		
		public function buscaTipoUsuarios():array{
			$TipoUsuarios= array();
			$sql="SELECT * from tipousuario;";
			$result=$this->conexion->query($sql);
			while($row=$result->fetch_assoc()){
				$d= new TipoUsuario($row['idTipoUsuario'],$row['Descripcion']);
				array_push($TipoUsuarios,$d);
			}
			$this->conexion->close();
			return $TipoUsuarios;
		}
		
	}
?> 