<?php
require_once 'model/conexion.php';

class Proveedor
{	
	Private $id;
    Private $nombre;
    Private $apellido;
    Private $telefono;
	Private $email;
	Private $identificacion;	
	private $conexion;

	
	public function Proveedor()
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

	public function setEmail($newVal)
	{
		$this->email = $newVal;
	}

	public function setIdentificacion($newVal)
	{
		$this->identificacion = $newVal;
	}

	public function mostrarEstado()
	{
		$consulta=$this->conexion->prepare("SELECT * FROM estado");
		$consulta->execute();
		return $consulta;	
	}
	
	public function actualizarProveedor($id,$nombre,$apellido,$telefono,$email,$estado)
	{
		$consulta = $this->conexion->prepare("UPDATE proveedores SET nombre = ?,apellido = ?,telefono = ?,email = ?, id_estado = ? WHERE id_proveedor = ?");
		$consulta->execute(array($nombre,$apellido,$telefono,$email,$estado,$id));
		if ($consulta) {
			return true;
		}else{
			return false;		
		}
	}

	public function agregarProveedor($nombre,$apellido,$telefono,$email,$identificacion)
	{	
	    //$telefono =! '' ? $telefono == $telefono : $telefono == 0;
		$consulta = $this->conexion->prepare("INSERT INTO proveedores(nombre,apellido,telefono,email,documentoId) VALUES (?,?,?,?,?)");
		$consulta->execute(array($nombre,$apellido,$telefono,$email,$identificacion));
		if ($consulta) {
			return true;
		}else{
			return false;		
		}	
	}

	
	public function consultarProveedores()
	{
		$consulta=$this->conexion->prepare("SELECT * FROM proveedores ");
		$consulta->execute();
		return $consulta;	
	}

	// public function consultarProveedor($id)
	// {
	// 	$consulta=$this->conexion->prepare("SELECT * FROM proveedores WHERE id_proveedor=$id");
	// 	$consulta->execute();
	// 	return $consulta;	
	// }

	public function consultarProveedor($id)
	{
		$consulta=$this->conexion->prepare("SELECT p.id_proveedor, p.nombre, p.apellido, p.telefono, p.email, p.documentoId, p.id_estado, e.nombre_estado FROM proveedores AS p JOIN estado AS e ON p.id_estado = e.id_estado WHERE id_proveedor=$id");
		$consulta->execute();
		return $consulta;	
	}


	public function agregarMarcaProveedor($id,$id_marca){
		$consulta = $this->conexion->prepare("INSERT INTO marca_proveedor(id_proveedor,id_marca) VALUES (?,?)");
		$consulta->execute(array($id,$id_marca));
		return $consulta;
	}

	public function eliminarMarcaProveedor($id,$id_marca){
		$consulta = $this->conexion->prepare("DELETE FROM marca_proveedor WHERE id_proveedor = $id AND id_marca = $id_marca");
		$consulta->execute();
		return $consulta;
	}

	public function obtenerUltimoId(){
		$consulta=$this->conexion->prepare("SELECT MAX(id_proveedor) FROM proveedores ");
		$consulta->execute();
		return $consulta;	
	}

	public function consultarMarcas($id){
		// $consulta=$this->conexion->prepare("SELECT id_proveedor, GROUP_CONCAT(nombre_marca ORDER BY mp.id_marca ASC SEPARATOR ', ') AS marcas FROM marca_proveedor AS mp JOIN marcas AS m ON mp.id_marca = m.id_marca WHERE id_proveedor=$id GROUP BY id_proveedor");
		$consulta=$this->conexion->prepare("SELECT id_proveedor, nombre_marca, m.id_marca FROM marca_proveedor AS mp JOIN marcas AS m ON mp.id_marca = m.id_marca WHERE id_proveedor=$id");
		$consulta->execute();
		return $consulta;	
	}
	// public function agregarMarcas()
	// {
	// 	$consulta=$this->conexion->prepare("INSERT INTO marca_proveedor ( ) VALUES ()");
	// 	$consulta->execute();
	// }

}
?>