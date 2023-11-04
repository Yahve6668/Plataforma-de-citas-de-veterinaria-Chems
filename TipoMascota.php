<?php
	class TipoMascota{
		private $idTipoMascota;
		private $descripcion;
		
		
		function __construct($idTipoMascota, $descripcion){
			$this->idTipoMascota=$idTipoMascota;
			$this->descripcion=$descripcion;
		}
		
		
		function __destruct(){}
		
		function setIdTipoMascota($idTipoMascota){
			$this->idTipoMascota=$idTipoMascota;
		}
		
		function setDescripcion($descripcion){
			$this->descripcion=$descripcion;
		}
	
		function getIdTipoMascota():int{
			return $this->idTipoMascota;
			
		}

		function getDescripcion():string{
			return $this->descripcion;
			
		}

			//Arreglo asociativo para ocnvertir a JSON
			function toJSON():array{
				return [
							"idTipoMascota"=>$this->idTipoMascota,
							"descripcion"=>$this->descripcion
						];
				}
				
		
		function toString():string{
			return "IdTipoMascota:".$this->getIdTipoMascota()." , descripcion:".$this->getdescripcion().". ";
		}
		
}

?>