<?php
require_once 'model/conexion.php';

class Categoria
{	
	Private $id;
    Private $nombre_categoria;
	private $conexion;

	
	public function Categoria()
	{
		$this->conexion = Conexion::Conectar();
	}

	public function getnombre_categoria()
	{
		return $this->nombre_categoria;
	}

	public function setnombre_categoria($newVal)
	{
		$this->nombre_categoria = $newVal;
	}
	
	public function actualizarCategoria($id,$nombre_categoria)
	{
		$consulta = $this->conexion->prepare("UPDATE categorias SET  nombre_categoria = ? WHERE id_categoria = ?");
		$consulta->execute(array($nombre_categoria,$id));
		if ($consulta) {
			return true;
		}else{
			return false;		
		}
	}

	public function agregarCategoria($nombre_categoria)
	{	
		$consulta = $this->conexion->prepare("INSERT INTO categorias(nombre_categoria) VALUES (:nombre)");
		$consulta->execute(array(':nombre' => $nombre_categoria));
		if ($consulta) {
			return true;
		}else{
			return false;		
		}	
	}

	public function consultarCategorias()
	{
		$consulta=$this->conexion->prepare("SELECT * FROM categorias ");
		$consulta->execute();
		return $consulta;	
	}

	public function consultarCategoria($id)
	{
		$consulta=$this->conexion->prepare("SELECT * FROM categorias WHERE id_categoria = $id");
		$consulta->execute();
		return $consulta;	
	}

}
?>