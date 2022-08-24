<?php

include('../model/conexion.php');

$conexion = Conexion::Conectar();
$column = array("id_movimiento", "nombre","cantidad", "total","fecha");


$query ="SELECT m.id_movimiento, p.nombre, m.cantidad, m.total ,m.fecha , m.movimiento FROM movimientos AS m JOIN productos AS p ON m.id_producto = p.id_producto";



if(isset($_POST["search"]["value"]))
{
 $query .= '
 
 WHERE id_movimiento LIKE "%'.$_POST["search"]["value"].'%" 
 OR nombre LIKE "%'.$_POST["search"]["value"].'%"
 OR m.cantidad LIKE "%'.$_POST["search"]["value"].'%"
 OR total LIKE "%'.$_POST["search"]["value"].'%"
 OR fecha LIKE "%'.$_POST["search"]["value"].'%"';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id_movimiento asc ';
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
	if ($row['movimiento'] == 'entrada') {
		$sub_array = array();	
		$sub_array[] = $row['id_movimiento'];
 		$sub_array[] = $row['nombre'];
 		$sub_array[] = $row['cantidad'];
 		$sub_array[] = $row['total'];
 		$sub_array[] = $row['fecha'];	
 		$data[] = $sub_array;		
	}
}

function count_all_data($conexion)
{
 $query = "SELECT * FROM movimientos WHERE movimiento = 'entrada'";
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
