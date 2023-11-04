<?php
	class TipoCitaDAO{
		public $conexion;
		
		
		public function __construct($conexion){
		$this->conexion=$conexion;
		}
		
		public function __destruct(){}
		public function recu(){			
			  $t=$this->conexion->query("SELECT * FROM tipocita");
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
		public function insertaTipoCita($tipoCita){
			$stm=$this->conexion->prepare("
				insert into tipocita(Descripcion) values(?)");
			$stm->bind_param("s",$tipoCita->getDescripcion());
			$stm->execute();
			$stm->close();
			$this->conexion->close();
		}
		
		public function buscaTipoCita($cit):TipoCita{
			$sql="SELECT * from tipocita where idTipoCita=".$cit.";";
			$result=$this->conexion->query($sql);
			if($row=$result->fetch_assoc()){
				$d= new TipoCita($row['idTipoCita'],$row['Descripcion']);
			}
			//$this->conexion->close();
			return $d;
		}
		
		public function buscaIdTipoCita($cit):int{
			$sql="SELECT * from tipocita where Descripcion=".$cit.";";
			$result=$this->conexion->query($sql);
			if($row=$result->fetch_assoc()){
				$id=$row['idTipoCita'];
			}
			return $id;
		}
		
		
		
		public function buscaTipoCitas():array{
			$TipoCitas= array();
			$sql="SELECT * from tipocita;";
			$result=$this->conexion->query($sql);
			while($row=$result->fetch_assoc()){
				$d= new TipoCita($row['idTipoCita'],$row['Descripcion']);
				array_push($TipoCitas,$d);
			}
			$this->conexion->close();
			return $TipoCitas;
		}
		
	}
?> 