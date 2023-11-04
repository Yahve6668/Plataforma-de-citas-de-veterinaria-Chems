<?php
	class Mascota{
		private $idMascota;
		private $descripcion;
		private $tipoMascota;
		
		function __construct($idMascota, $descripcion, $tipoMascota){//int,string,tipoMascota
			$this->idMascota=$idMascota;
			$this->descripcion=$descripcion;
			$this->tipoMascota= new TipoMascota($tipoMascota->getIdTipoMascota(),$tipoMascota->getDescripcion());
		}
		
		
		function __destruct(){}
		
		function setIdMascota($idMascota){
			$this->idMascota=$idMascota;
		}
		
		function setDescripcion($descripcion){
			$this->descripcion=$descripcion;
		}
	
		function getIdMascota():int{
			return $this->idMascota;
			
		}

		function getDescripcion():string{
			return $this->descripcion;
			
		}
		function getTipoMascota():TipoMascota{
			return $this->tipoMascota;
			
		}
		
		//Arreglo asociativo para ocnvertir a JSON
		function toJSON():array{
		return [
					"idMascota"=>$this->idMascota,
					"descripcionMascota"=>$this->descripcion,
					"tipoMascota"=>$this->tipoMascota->toJSON()
				];
		}
		
	
		
		function toString():string{
			return "Id: ".$this->getIdMascota().",descripcion: ".$this->getdescripcion().", tipoMascota: ".$this->gettipoMascota()->toString()."";
			
		}
}

?>