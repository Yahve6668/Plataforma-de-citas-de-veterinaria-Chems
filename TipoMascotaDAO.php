<?php
	class TipoMascotaDAO{
		public $conexion;
		
		
		public function __construct($conexion){
		$this->conexion=$conexion;
		}
		
		public function __destruct(){}
		
		public function insertaTipoMascota($tipoMascota){
			$stm=$this->conexion->prepare("
				insert into tipomascota(Descripcion) values(?)");
			$stm->bind_param("s",$tipoMascota->getDescripcion());
			$stm->execute();
			$stm->close();
			$this->conexion->close();
		}
		public function recu(){			
			  $t=$this->conexion->query("SELECT * FROM tipomascota");
			  $ar="[";
			  while($a=mysqli_fetch_array($t)){
			    
			     $ar .='"';
			     $ar .= $a['Descripcion'];
			     $ar .='"';
			     $ar .=',';
			  } 
			  $e="";
			  $ar=substr($ar,0,-1);
			  $ar.= "]";
			  return $ar;
		}
		
		public function buscaTipoMascota($mas):TipoMascota{
			$sql="SELECT * from tipomascota where idTipoMascota=".$mas.";";
			$result=$this->conexion->query($sql);
			if($row=$result->fetch_assoc()){
				$d= new TipoMascota($row['idTipoMascota'],$row['Descripcion']);
			}
			//$this->conexion->close();
			return $d;
		}
		
		public function buscaIdTipoMascota($mas):int{
			$sql="SELECT * from tipomascota where Descripcion=".$mas.";";
			$result=$this->conexion->query($sql);
			if($row=$result->fetch_assoc()){
				$id=$row['idTipoMascota'];
			}
			return $id;
		}
		
		
		public function buscaTipoMascotas():array{
			$TipoMascotas= array();
			$sql="SELECT t.idTipoMascota, t.Descripcion from tipomascota t;";
			$result=$this->conexion->query($sql);
			while($row=$result->fetch_assoc()){
				$d= new TipoMascota($row['idTipoMascota'],$row['Descripcion']);
				//echo $d->toString();
				array_push($TipoMascotas,$d);
			}
			$this->conexion->close();
			return $TipoMascotas;
		}
		
	}
?> 