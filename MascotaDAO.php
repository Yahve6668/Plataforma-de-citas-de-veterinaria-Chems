<?php
	class MascotaDAO{
		public $conexion;
		
		
		public function __construct($conexion){
		$this->conexion=$conexion;
		}
		
		public function __destruct(){}
		
		public function insertaMascota(Mascota $p){
			//$tipomasDAO= new TipoMascotaDAO($this->conexion);
			$id=$p->getTipoMascota()->getIdTipoMascota();
			$des=$p->getDescripcion();
			$stm=$this->conexion->prepare("insert into mascota(Descripcion,TipoMascota_idTipoMascota) values(?,?)");
			$stm->bind_param("si",$des,$id);
			/*$tipomasDAO->buscaIdTipoMascota($p->getTipoMascota()->getDescripcion())*/
			$stm->execute();
			$stm->close();
			///$this->conexion->close();
		}

		
		
		
		public function buscaMascota($Descripcion):Mascota{
			$sql="SELECT m.idMascota,m.Descripcion as DescripcionMascota,
		t.idTipoMascota, t.Descripcion as DescripcionTipoMascota
		from mascota m inner join tipomascota t
		on m.TipoMascota_idTipoMascota= t.idTipoMascota
					where m.Descripcion=".$Descripcion.";";
			$result=$this->conexion->query($sql);
			if($row=$result->fetch_assoc()){
				$d=new TipoMascota($row['idTipoMascota'],$row['DescripcionTipoMascota']);
				$p= new Mascota($row['idMascota'],$row['DescripcionMascota'],$d);
			}
			$this->conexion->close();
			return $p;
		}

		public function buscaIdMascota($mas):int{
			$sql="SELECT * from mascota where Descripcion='$mas';";
			$result=$this->conexion->query($sql);
			$row=$result->fetch_assoc();
				$id=$row['idMascota'];
			
			return $id;
		}
		
		public function buscaMascotas():array{
			$Mascotas=array();
			$sql="SELECT m.idMascota,m.Descripcion as DescripcionMascota,
		t.idTipoMascota, t.Descripcion as DescripcionTipoMascota 
		from mascota m inner join tipomascota t 
		on m.TipoMascota_idTipoMascota= t.idTipoMascota;";
			$result=$this->conexion->query($sql);
			while($row=$result->fetch_assoc()){
				
				$d=new TipoMascota($row['idTipoMascota'],$row['DescripcionTipoMascota']);
				$p= new Mascota($row['idMascota'],$row['DescripcionMascota'],$d);
				//echo $p->toString();
				array_push($Mascotas,$p->toJSON());
			}
			$this->conexion->close();
			return $Mascotas;
		}
		
	}
	
?> 