<?php
	class TipoCita{
		private $idTipoCita;
		private $descripcion;
		
		
		function __construct($idTipoCita, $descripcion){
			$this->idTipoCita=$idTipoCita;
			$this->descripcion=$descripcion;
		}
		
		
		function __destruct(){}
		
		function setIdTipoCita($idTipoCita){
			$this->idTipoCita=$idTipoCita;
		}
		
		function setDescripcion($descripcion){
			$this->descripcion=$descripcion;
		}
	
		function getIdTipoCita():int{
			return $this->idTipoCita;
			
		}

		function getDescripcion():string{
			return $this->descripcion;
			
		}

			//Arreglo asociativo para ocnvertir a JSON
			function toJSON():array{
				return [
							"idTipoCita"=>$this->idTipoCita,
							"descripcionTipoCita"=>$this->descripcion
						];
				}
				
		
		function toString():string{
			return "IdTipoCita:".$this->getIdTipoCita()." , descripcion:".$this->getdescripcion().". ";
		}
		
}

?>