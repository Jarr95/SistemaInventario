<?php

include('../model/conexion.php');

$conexion = Conexion::Conectar();
$column = array("id_categoria", "nombre_categoria");

$query = "SELECT * FROM categorias ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE nombre_categoria LIKE "%'.$_POST["search"]["value"].'%"';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id_categoria asc ';
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
 $sub_array[] = $row['id_categoria'];
 $sub_array[] = $row['nombre_categoria'];
 $sub_array[] = '<a href="index.php?view=controller/editar_categorias.php&id= '.$row["id_categoria"].'"class="edit-btn">Editar</a>';
 $data[] = $sub_array;
}

function count_all_data($conexion)
{
 $query = "SELECT * FROM categorias";
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
