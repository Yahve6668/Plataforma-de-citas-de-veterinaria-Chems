<?php
	class DoctorDAO{
		public $conexion;
		
		
		public function __construct($conexion){
		$this->conexion=$conexion;
		}
		
		public function __destruct(){}
		public function recu(){			
			  $t=$this->conexion->query("SELECT * FROM doctor");
			  $ar="[";
			  while($a=mysqli_fetch_array($t)){
			    
			     $ar .='"';
			     $ar .= $a['Nombre'];
			     $ar .='"';
			     $ar .=',';
			  } 
			  $e="";
			  $ar=substr($ar,0,-1);
			  $ar.= "]";
			  return $ar;
		}
		public function insertaDoctor(Doctor $doctor){
			$stm=$this->conexion->prepare("
				insert into doctor(Nombre) values(?)");
			$nom=$doctor->getNombre();
			$stm->bind_param("s",$nom);
			$stm->execute();
			$stm->close();
			$this->conexion->close();
		}
		
		public function buscaDoctor($doc):Doctor{
			$sql="SELECT * from doctor where idDoctor=".$doc.";";
			$result=$this->conexion->query($sql);
			if($row=$result->fetch_assoc()){
				$d= new Doctor($row['idDoctor'],$row['Nombre']);
			}
			//$this->conexion->close();
			return $d;
		}
		
		public function buscaIdDoctor($doc):int{
			$sql="SELECT * from doctor where Nombre=".$doc.";";
			$result=$this->conexion->query($sql);
			if($row=$result->fetch_assoc()){
				$id=$row['idDoctor'];
			}
			return $id;
		}
		
		
		public function buscaDoctores():array{
			$doctores= array();
			$sql="SELECT * from doctor;";
			$result=$this->conexion->query($sql);
			while($row=$result->fetch_assoc()){
				$d= new Doctor($row['idDoctor'],$row['Nombre']);
				array_push($doctores,$d);
			}
			$this->conexion->close();
			return $doctores;
		}
		
	}
?> 