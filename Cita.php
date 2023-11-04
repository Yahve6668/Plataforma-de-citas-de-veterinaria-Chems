<?php
//error_reporting(E_ERROR| E_PARSE);
	class Cita{
		private $idCita;
		private $fechaCita; //fechaCita en el que vive el Cita
		private $fechaActual; //fechaActual del Cita
		private $tipoCita; // Un dato tipo profesor que representa al tipoCita
		//private $profesores=array(); //Coleccion de datos tipo profesor
		private $doctor; //Coleccion de datos tipo profesor
		private $mascota; //Coleccion de datos tipo profesor
		private $usuario;
	//	private $departamento;
		
		
		function __construct($idCita,$fechaCita,$fechaActual,$tipoCita,$doctor,$mascota,$usuario/*, $departamento,$profesores*/){
			$this->idCita=$idCita;
			$this->doctor= new Doctor($doctor->getIdDoctor(),$doctor->getNombre());
			$this->tipoCita= new TipoCita($tipoCita->getIdTipoCita(),$tipoCita->getDescripcion());
			$this->fechaActual=$fechaActual;
			$this->fechaCita=$fechaCita;
			$this->mascota=new Mascota($mascota->getIdMascota(),$mascota->getDescripcion(),$mascota->getTipoMascota());
			$this->usuario=new Usuario($usuario->getIdUsuario(),$usuario->getNombre(),$usuario->getCorreo(),$usuario->getContraseña(),$usuario->getTipoUsuario());
		}
			
		function __destruct(){
		}
		
		function setIdCita($idCita){
			$this->idCita=$idCita;
		}

		function setfechaCita($fechaCita){
			$this->fechaCita=$fechaCita;
		}

		function setfechaActual($fechaActual){
			$this->fechaActual=$fechaActual;
		}
		
		
		function getIdCita():int{
			return $this->idCita;
		}
		function getfechaCita():string{
			return $this->fechaCita;
		}
		function getfechaActual():string{
			return $this->fechaActual;
		}
		
		function getTipoCita():TipoCita{
			return $this->tipoCita;
		}
		
		function getDoctor():Doctor{
			return $this->doctor;
		}

		function getMascota():Mascota{
			return $this->mascota;
		}
		function getUsuario():Usuario{
			return $this->usuario;
		}
		
		//Arreglo asociativo para ocnvertir a JSON
		function toJSON():array{
			return [
				"idCita"=>$this->idCita,
				"fechaCita"=>$this->fechaCita,
				"fechaActual"=>$this->fechaActual,
				"tipoCita"=>$this->tipoCita->toJSON(),
				"doctor"=>$this->doctor->toJSON(),
				"mascota"=>$this->mascota->toJSON(),
				"usuario"=>$this->usuario->toJSON()
				//,"departamento"=>$this->departamento->toJSON()
				];
			}
		
		function toString():string{
			return "IdCita: ".$this->getIdCita().",
			doctor:".$this->getDoctor()->toString().",
			fechaActual:".$this->getfechaActual().",
			mascota:".$this->getMascota()->toString().",
			tipoCita:".$this->getTipoCita()->toString().",
			fechaCita:".$this->getfechaCita().",uSER".$this->getUsuario()->toString();
		}
	}
?> 