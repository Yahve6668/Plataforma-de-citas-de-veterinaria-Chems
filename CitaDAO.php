<?php
	class CitaDAO{
		//require 'C:\xampp\htdocs\consultaCita\TipoUsuario.php';
		public $conexion;
		
		
		public function __construct($conexion){
		$this->conexion=$conexion;
		}
		
		public function __destruct(){}


		public function insertaCita(Cita $p){
			
			$stm=$this->conexion->prepare("
				insert into cita(FechaCita,FechaActual,TipoCita_idTipoCita,Doctor_idDoctor,Mascota_idMascota,Usuario_idUsuario) values(?,?,?,?,?,?)");
            $fechaC=$p->getfechaCita();
            $fechaA=$p->getfechaActual();
            $TipoC=$p->getTipoCita()->getIdTipoCita();
            $IdDoc=$p->getDoctor()->getIdDoctor();
            $IdMas=$p->getMascota()->getIdMascota();
            $Usu=$p->getUsuario()->getIdUsuario();
		   $stm->bind_param("ssiiii",$fechaC,$fechaA,$TipoC,$IdDoc,$IdMas,$Usu);
			$stm->execute();
			$stm->close();
			//$this->conexion->close();
		}

		
		
		
		public function buscaCita($fecha):Cita{
			$sql="SELECT c.idCita,c.FechaCita,
		c.FechaActual,tc.idTipoCita,tc.Descripcion as DescripcionCita,d.idDoctor,d.Nombre as NombreDoctor,
		m.idMascota,m.Descripcion as NombreMascota, m.TipoMascota_idTipoMascota,
		u.idUsuario,u.Nombre as NombreUsuario,u.correo as correousuario, u.contraseña as contraseñausuario, u.tipousuario_idTipoUsuario,
		tu.idTipoUsuario, tu.Descripcion as DescripcionTipoUsuario,
		t.idTipoMascota, t.Descripcion as DescripcionTipoMascota
		from cita c inner join tipocita tc on c.TipoCita_idTipoCita= tc.idTipoCita 
		inner join doctor d on c.Doctor_idDoctor= d.idDoctor
		inner join usuario u on c.Usuario_idUsuario= u.idUsuario
		inner join tipousuario tu on u.tipousuario_idTipoUsuario= tu.idTipoUsuario
		inner join mascota m on c.Mascota_idMascota= m.idMascota
		inner join tipomascota t on m.TipoMascota_idTipoMascota= t.idTipoMascota
					where c.FechaCita=".$fecha.";";
			$result=$this->conexion->query($sql);
			if($row=$result->fetch_assoc()){

				$t=new TipoMascota($row['idTipoMascota'],$row['DescripcionTipoMascota']);
                $m= new Mascota($row['idMascota'],$row['NombreMascota'],$t);
				$tu= new TipoUsuario($row['idTipoUsuario'],$row['DescripcionTipoUsuario']);
				$u= new Usuario($row['idUsuario'],$row['NombreUsuario'],$row['correousuario'],$row['contraseñausuario'],$tu);
                $d = new Doctor($row['idDoctor'],$row['NombreDoctor']);
				$tc = new TipoCita($row['idTipoCita'],$row['DescripcionCita']);
				$c= new Cita($row['idCita'],$row['FechaCita'],$row['FechaActual'],$tc,$d,$m,$u);
			}
			$this->conexion->close();
			return $c;
		}
		
		public function buscaCitas($nombre):array{
			$Citas=[];
			$sql="SELECT c.idCita,c.FechaCita,
			c.FechaActual,tc.idTipoCita,tc.Descripcion as DescripcionCita,d.idDoctor,d.Nombre as NombreDoctor,
			m.idMascota,m.Descripcion as NombreMascota, m.TipoMascota_idTipoMascota,
			u.idUsuario,u.Nombre as NombreUsuario,u.correo as correousuario, u.contraseña as contraseñausuario, u.tipousuario_idTipoUsuario,
			tu.idTipoUsuario, tu.Descripcion as DescripcionTipoUsuario,
			t.idTipoMascota, t.Descripcion as DescripcionTipoMascota
			from cita c inner join tipocita tc on c.TipoCita_idTipoCita= tc.idTipoCita 
			inner join doctor d on c.Doctor_idDoctor= d.idDoctor
			inner join usuario u on c.Usuario_idUsuario= u.idUsuario
			inner join tipousuario tu on u.tipousuario_idTipoUsuario= tu.idTipoUsuario
			inner join mascota m on c.Mascota_idMascota= m.idMascota
			inner join tipomascota t on m.TipoMascota_idTipoMascota= t.idTipoMascota where d.Nombre='$nombre';";


			$result=$this->conexion->query($sql);
			while($row=$result->fetch_assoc()){
				$t=new TipoMascota($row['idTipoMascota'],$row['DescripcionTipoMascota']);
                $m= new Mascota($row['idMascota'],$row['NombreMascota'],$t);
				$tu= new TipoUsuario($row['idTipoUsuario'],$row['DescripcionTipoUsuario']);
				$u= new Usuario($row['idUsuario'],$row['NombreUsuario'],$row['correousuario'],$row['contraseñausuario'],$tu);
                $d= new Doctor($row['idDoctor'],$row['NombreDoctor']);
				$tc= new TipoCita($row['idTipoCita'],$row['DescripcionCita']);
				$c= new Cita($row['idCita'],$row['FechaCita'],$row['FechaActual'],$tc,$d,$m,$u);
				array_push($Citas,$c->toJSON());
			}
			$this->conexion->close();
			return $Citas;
		}
		
	}
	
?> 