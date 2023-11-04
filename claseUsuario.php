<?php
  class Usuario{
    private $idUsuario;
    private $nombre;
    private $correo;
    private $contraseña;
    private $tipoUsuario;
    
    function __construct($idUsuario,$nombre,$correo,$contraseña, $tipoUsuario){
      $this->idUsuario=$idUsuario;
      $this->nombre=$nombre;
      $this->correo=$correo;
      $this->contraseña=$contraseña;
      $this->tipoUsuario= new TipoUsuario($tipoUsuario->getIdTipoUsuario(),$tipoUsuario->getDescripcion());
    }
    
    
    function __destruct(){}
    
    function setIdUsuario($idUsuario){
      $this->idUsuario=$idUsuario;
    }
    
    function setNombre($nombre){
      $this->nombre=$nombre;
    }

    function setCorreo($correo){
      $this->correo=$correo;
    }
    function setContraseña($contraseña){
      $this->contraseña=$contraseña;
    }
  
    function getIdUsuario():int{
      return $this->idUsuario;
      
    }
    function getNombre():string{
      return $this->nombre;
      
    }
    function getCorreo():string{
      return $this->correo;
      
    }
    function getContraseña():string{
      return $this->contraseña;
      
    }
    function getTipoUsuario():TipoUsuario{
      return $this->tipoUsuario;
      
    }
    
    function toJSON():array{
    return [
          "idUsuario"=>$this->idUsuario,
          "nombreUsuario"=>$this->nombre,
          "correoUsuario"=>$this->correo,
          "contraseñaUsuario"=>$this->contraseña,
          "tipoUsuario"=>$this->tipoUsuario->toJSON()
        ];
    }
    
  
    
    function toString():string{
      return "Id: ".$this->getIdUsuario().",nombre: ".$this->getTipoUsuario()->getDescripcion()."nombre ".$this->getNombre(); 
    }
}

?>


