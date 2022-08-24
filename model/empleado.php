<?php
require_once 'model/conexion.php';

class Empleado
{	
	Private $id;
    Private $nombre;
    Private $apellido;
    Private $telefono;
	Private $cargo;
	Private $email;
    Private $password;
	Private $identificacion;	
	private $conexion;

	
	public function Empleado()
	{
		$this->conexion = Conexion::Conectar();
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function getApellido()
	{
		return $this->apellido;
	}

	public function getTelefono()
	{
		return $this->telefono;
	}

	public function getCargo()
	{
		return $this->cargo;
	}

	public function getEmail()
	{
		return $this->email;
	}


	public function getIdentificacion()
	{
		return $this->identificacion;
	}

	public function setNombre($newVal)
	{
		$this->nombre = $newVal;
	}

	public function setApellido($newVal)
	{
		$this->apellido = $newVal;
	}
	
	public function setTelefono($newVal)
	{
		$this->telefono = $newVal;
	}

	public function setCargo($newVal)
	{
		$this->cargo = $newVal;
	}

	public function setEmail($newVal)
	{
		$this->email = $newVal;
	}

	public function setIdentificacion($newVal)
	{
		$this->identificacion = $newVal;
	}
	
	public function actualizarEmpleado($id,$nombre,$apellido,$telefono,$email,$estado)
	{
		$consulta = $this->conexion->prepare("UPDATE personas SET nombre = ?,apellido = ?,telefono = ?,email = ?, id_estado = ? WHERE id_persona = ?");
		$consulta->execute(array($nombre,$apellido,$telefono,$email,$estado,$id));
		if ($consulta) {
			return true;
		}else{
			return false;		
		}
	}

	public function mostrarCargos()
	{
		$consulta=$this->conexion->prepare("SELECT * FROM rol");
		$consulta->execute();
		return $consulta;	
	}

	public function mostrarEstado()
	{
		$consulta=$this->conexion->prepare("SELECT * FROM estado");
		$consulta->execute();
		return $consulta;	
	}


	public function agregarEmpleado($nombre,$apellido,$telefono,$cargo,$email,$password,$identificacion)
	{
	    //$telefono =! '' ? $telefono == $telefono : $telefono == 0;
		$md5password = md5($password);
		$consulta = $this->conexion->prepare("INSERT INTO personas(nombre,apellido,telefono,id_rol,email,password,documentoId) VALUES (?,?,?,?,?,?,?)");
		$consulta->execute(array($nombre,$apellido,$telefono,$cargo,$email,$md5password,$identificacion));
		if ($consulta) {
			return true;
		}else{
			return false;		
		}	
	}

	public function consultarEmpleados()
	{
		$consulta=$this->conexion->prepare("SELECT p.id_persona, p.nombre, p.apellido, p.telefono, p.email, p.documentoId, p.id_estado, r.nombre_rol, e.nombre_estado FROM personas AS p JOIN rol AS r ON p.id_rol = r.id_rol JOIN estado AS e ON p.id_estado = e.id_estado");
		$consulta->execute();
		return $consulta;	
	}


	public function consultarEmpleado($id)
	{
		$consulta=$this->conexion->prepare("SELECT p.id_persona, p.nombre, p.apellido, p.telefono, p.email, p.documentoId, p.id_estado, r.nombre_rol, e.nombre_estado FROM personas AS p JOIN rol AS r ON p.id_rol = r.id_rol JOIN estado AS e ON p.id_estado = e.id_estado WHERE id_persona=$id");
		$consulta->execute();
		return $consulta;	
	}

}
?>