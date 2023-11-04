<?php
	class Doctor{
		private $idDoctor;
		private $nombre;
		
		
		function __construct($idDoctor, $nombre){
			$this->idDoctor=$idDoctor;
			$this->nombre=$nombre;
		}
		
		
		function __destruct(){}
		
		function setIdDoctor($idDoctor){
			$this->idDoctor=$idDoctor;
		}
		
		function setNombre($nombre){
			$this->nombre=$nombre;
		}
	
		function getIdDoctor():int{
			return $this->idDoctor;
			
		}
		function getNombre():string{
			return $this->nombre;
			
		}

			//Arreglo asociativo para ocnvertir a JSON
			function toJSON():array{
				return [
							"idDoctor"=>$this->idDoctor,
							"nombreDoctor"=>$this->nombre
						];
				}
				
		
		function toString():string{
			return "IdDoctor:".$this->getIdDoctor()." , nombre:".$this->getnombre().". ";
		}
		
}

?>