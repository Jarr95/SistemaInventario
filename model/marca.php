<?php
require_once 'model/conexion.php';

class Marca
{	
	Private $id;
    Private $nombre_marca;
    Private $pais_marca;	
	private $conexion;

	
	public function Marca()
	{
		$this->conexion = Conexion::Conectar();
	}

	public function getnombre_marca()
	{
		return $this->nombre_marca;
	}

	public function getpais_marca()
	{
		return $this->pais_marca;
	}

	public function setnombre_marca($newVal)
	{
		$this->nombre_marca = $newVal;
	}

	public function setpais_marca($newVal)
	{
		$this->pais_marca = $newVal;
	}
	
	public function actualizarMarca($id,$nombre_marca,$pais_marca)
	{
		$consulta = $this->conexion->prepare("UPDATE marcas SET nombre_marca = ?, pais_marca = ? WHERE id_marca = ?");
		$consulta->execute(array($nombre_marca,$pais_marca,$id));
		if ($consulta) {
			return true;
		}else{
			return false;		
		}
	}

	public function agregarMarca($id,$nombre_marca,$pais_marca)
	{	
		$consulta = $this->conexion->prepare("INSERT INTO marcas(id_marca,nombre_marca,pais_marca) VALUES (?,?,?)");
		$consulta->execute(array($id,$nombre_marca,$pais_marca));
		if ($consulta) {
			return true;
		}else{
			return false;		
		}	
	}

	public function consultarMarcas()
	{
		$consulta=$this->conexion->prepare("SELECT * FROM marcas ");
		$consulta->execute();
		return $consulta;	
	}

	public function consultarMarca($id)
	{
		$consulta=$this->conexion->prepare("SELECT * FROM marcas WHERE id_marca = $id");
		$consulta->execute();
		return $consulta;	
	}
}
?>