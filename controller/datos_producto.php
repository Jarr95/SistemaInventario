<?php

include('../model/conexion.php');

$conexion = Conexion::Conectar();
$column = array("id_producto", "nombre","descripcion", "cantidad","precio_entrada","precio_salida","nombre_categoria","nombre_marca","fecha_registro","nombre_estado");

$query = "SELECT p.id_producto, p.nombre, p.descripcion,p.cantidad, p.precio_entrada,p.precio_salida, p.fecha_registro, m.nombre_marca, c.nombre_categoria,e.nombre_estado FROM productos AS p JOIN marcas AS m ON p.id_marca = m.id_marca JOIN categorias AS c ON p.id_categoria = c.id_categoria JOIN estado AS e ON p.id_estado = e.id_estado";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE id_producto LIKE "%'.$_POST["search"]["value"].'%" 
 OR nombre LIKE "%'.$_POST["search"]["value"].'%"
 OR descripcion LIKE "%'.$_POST["search"]["value"].'%"
 OR cantidad LIKE "%'.$_POST["search"]["value"].'%"
 OR precio_entrada LIKE "%'.$_POST["search"]["value"].'%"
 OR precio_salida LIKE "%'.$_POST["search"]["value"].'%"
 OR nombre_categoria LIKE "%'.$_POST["search"]["value"].'%"
 OR nombre_marca LIKE "%'.$_POST["search"]["value"].'%"
 OR fecha_registro LIKE "%'.$_POST["search"]["value"].'%"
 OR nombre_estado LIKE "%'.$_POST["search"]["value"].'%"';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id_producto asc ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $conexion->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $conexion->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['id_producto'];
 $sub_array[] = $row['nombre'];
 $sub_array[] = $row['descripcion'];
 $sub_array[] = $row['cantidad'];
 $sub_array[] = $row['precio_entrada'];
 $sub_array[] = $row['precio_salida'];
 $sub_array[] = $row['nombre_categoria'];
 $sub_array[] = $row['nombre_marca'];
 $sub_array[] = $row['fecha_registro'];
 $sub_array[] = $row['nombre_estado'];
 $sub_array[] = '<a href="index.php?view=controller/editar_productos.php&id= '.$row["id_producto"].'"class="edit-btn">Editar</a>';
 $data[] = $sub_array;
}

function count_all_data($conexion)
{
 $query = "SELECT * FROM productos";
 $statement = $conexion->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($conexion),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);

?>
