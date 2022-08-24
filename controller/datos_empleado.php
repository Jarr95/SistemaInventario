<?php

include('../model/conexion.php');

$conexion = Conexion::Conectar();
$column = array("nombre","apellido","telefono","email","documentoId","nombre_rol");


$query ="SELECT p.id_persona, p.nombre, p.apellido, p.telefono, p.email, p.documentoId, p.id_estado, r.nombre_rol, e.nombre_estado FROM personas AS p JOIN rol AS r ON p.id_rol = r.id_rol JOIN estado AS e ON p.id_estado = e.id_estado";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE nombre LIKE "%'.$_POST["search"]["value"].'%" 
 OR apellido LIKE "%'.$_POST["search"]["value"].'%"
 OR telefono LIKE "%'.$_POST["search"]["value"].'%"
 OR email LIKE "%'.$_POST["search"]["value"].'%"
 OR documentoId LIKE "%'.$_POST["search"]["value"].'%"
 OR nombre_rol LIKE "%'.$_POST["search"]["value"].'%"
 OR nombre_estado LIKE "%'.$_POST["search"]["value"].'%"';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id_persona asc ';
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
 $sub_array[] = $row['nombre'];
 $sub_array[] = $row['apellido'];
 $sub_array[] = $row['telefono'];
 $sub_array[] = $row['email'];
 $sub_array[] = $row['documentoId'];
 $sub_array[] = $row['nombre_rol'];
 $sub_array[] = $row['nombre_estado'];
 $sub_array[] = '<a href="index.php?view=controller/editar_empleados.php&id= '.$row["id_persona"].'"class="edit-btn">Editar</a>';
 $data[] = $sub_array;
}

function count_all_data($conexion)
{
 $query = "SELECT * FROM personas";
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
