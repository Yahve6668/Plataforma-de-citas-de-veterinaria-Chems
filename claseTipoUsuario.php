<?php
	class TipoUsuario{
		private $idTipoUsuario;
		private $descripcion;
		
		
		function __construct($idTipoUsuario, $descripcion){
			$this->idTipoUsuario=$idTipoUsuario;
			$this->descripcion=$descripcion;
		}
		
		
		function __destruct(){}
		
		function setIdTipoUsuario($idTipoUsuario){
			$this->idTipoUsuario=$idTipoUsuario;
		}
		
		function setDescripcion($descripcion){
			$this->descripcion=$descripcion;
		}
	
		function getIdTipoUsuario():int{
			return $this->idTipoUsuario;
			
		}

		function getDescripcion():string{
			return $this->descripcion;
			
		}

			//Arreglo asociativo para ocnvertir a JSON
			function toJSON():array{
				return [
							"idTipoUsuario"=>$this->idTipoUsuario,
							"descripcionTipoCita"=>$this->descripcion
						];
				}
				
		
		function toString():string{
			return "IdTipoUsuario:".$this->getIdTipoUsuario()." , descripcion:".$this->getdescripcion().". ";
		}
		
}

?>