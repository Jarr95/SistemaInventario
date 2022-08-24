<?php
require_once 'model/conexion.php';

class Producto
{	
	Private $id;
    Private $nombre;
    Private $descripcion;
    Private $id_marca;
	Private $precio_entrada;
	Private $fechaVencimiento;
	
	public function Producto()
	{
		$this->conexion = Conexion::Conectar();
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function getDescripcion()
	{
		return $this->descripcion;
	}

	public function getid_marca()
	{
		return $this->id_marca;
	}

	public function getprecio_entrada()
	{
		return $this->precio_entrada;
	}

	public function getFechaVencimiento()
	{
		return $this->fechaVencimiento;
	}

	public function setNombre($newVal)
	{
		$this->nombre = $newVal;
	}
	
	public function setDescripcion($newVal)
	{
		$this->descripcion = $newVal;
	}
	
	public function setid_marca($newVal)
	{
		$this->id_marca = $newVal;
	}

	public function setprecio_entrada($newVal)
	{
		$this->precio_entrada = $newVal;
	}

	public function setFechaVencimiento($newVal)
	{
		$this->fechaVencimiento = $newVal;
	}
	
	public function actualizarProducto($id,$nombre,$descripcion,$precio_entrada,$precio_salida,$id_categoria,$id_marca,$id_estado)
	{
		$consulta = $this->conexion->prepare("UPDATE productos SET nombre = ?,descripcion = ?,precio_entrada = ?,precio_salida = ?,id_categoria = ?,id_marca = ?,id_estado = ? WHERE id_producto = ?");
		$consulta->execute(array($nombre,$descripcion,$precio_entrada,$precio_salida,$id_categoria,$id_marca,$id_estado,$id));
		if ($consulta) {
			return true;
		}else{
			return false;		
		}
	}

	public function actualizarCantidad($id,$cantidad)
	{
		$consulta = $this->conexion->prepare("UPDATE productos SET cantidad = ? WHERE id_producto = ?");
		$consulta->execute(array($cantidad,$id));
		if ($consulta) {
			return true;
		}else{
			return false;		
		}
	}

	public function agregarProducto($id,$nombre,$descripcion,$precio_entrada,$precio_salida,$id_categoria,$id_marca)
	{	
		$fecha_registro = date('Y-m-d');
		$consulta = $this->conexion->prepare("INSERT INTO productos(id_producto,nombre,descripcion,precio_entrada,precio_salida,id_categoria,id_marca,fecha_registro) VALUES (?,?,?,?,?,?,?,?)");
		$consulta->execute(array($id,$nombre,$descripcion,$precio_entrada,$precio_salida,$id_categoria,$id_marca,$fecha_registro));
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
		while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
			$Marcas[]=$filas;
		}
		return $Marcas;	
	}

	public function mostrarEstado()
	{
		$consulta=$this->conexion->prepare("SELECT * FROM estado");
		$consulta->execute();
		return $consulta;	
	}

	public function mostrarProductosDisponibles()
	{
		$consulta=$this->conexion->prepare("SELECT * FROM productos WHERE id_estado = 1");
		$consulta->execute();
		return $consulta;	
	}

	public function mostrarProductosStock()
	{
		$consulta=$this->conexion->prepare("SELECT * FROM productos WHERE id_estado = 1 AND cantidad > 0");
		$consulta->execute();
		return $consulta;	
	}

	public function mostrarProducto($id)
	{
		$consulta=$this->conexion->prepare("SELECT * FROM productos WHERE id_producto = $id");
		$consulta->execute();
		return $consulta;	
	}

	public function consultarCategorias()
	{
		$consulta=$this->conexion->prepare("SELECT * FROM categorias ");
		$consulta->execute();
		while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
			$categorias[]=$filas;
		}
		return $categorias;	
	}
	
	public function consultarProductos()
	{
		$consulta=$this->conexion->prepare("SELECT p.id_producto, p.nombre, p.descripcion,p.cantidad, p.precio_entrada,p.precio_salida, p.fecha_registro, m.nombre_marca, c.nombre_categoria,e.nombre_estado FROM productos AS p JOIN marcas AS m ON p.id_marca = m.id_marca JOIN categorias AS c ON p.id_categoria = c.id_categoria JOIN estado AS e ON p.id_estado = e.id_estado ORDER BY p.id_producto ASC");
		$consulta->execute();
		return $consulta;	
	}

	public function consultarProducto($id)
	{
		$consulta=$this->conexion->prepare("SELECT p.id_producto, p.nombre, p.descripcion, p.precio_entrada,p.precio_salida, p.id_marca, m.nombre_marca,p.id_categoria, p.id_estado, c.nombre_categoria,e.nombre_estado FROM productos AS p JOIN marcas AS m ON p.id_marca = m.id_marca JOIN categorias AS c ON p.id_categoria = c.id_categoria JOIN estado AS e ON p.id_estado = e.id_estado WHERE p.id_producto = $id");
		$consulta->execute();
		return $consulta;	
	}

}
?>