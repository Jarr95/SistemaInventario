<?php
    require_once "model/proveedor.php";
    $proveedor = new Proveedor();
    $id = $_REQUEST['id_proveedor'];
    if ($_REQUEST['telefono'] == ''){
        $telefono = 0;
    }else{
        $telefono = $_REQUEST['telefono'];
    }
    $marcas = explode(",", $_REQUEST['marcas'][0]);
    $marcas_eliminar = explode(",", $_REQUEST['marcasEliminar'][0]);

    $consulta = $proveedor->actualizarProveedor($_REQUEST['id_proveedor'],$_REQUEST['nombre'],$_REQUEST['apellido'],$telefono,$_REQUEST['email'],$_REQUEST['id_estado']);
    if ($consulta == true) {
        foreach (array_filter($marcas) as $value) {
            $consulta2 = $proveedor->agregarMarcaProveedor($id,$value);
        }
        foreach (array_filter($marcas_eliminar) as $value2) {
            $consulta3 = $proveedor->eliminarMarcaProveedor($id,$value2);
        }
        echo'<script type="text/javascript">    
        Swal.fire({
		  title: "Proveedor Actualizado Exitosamente!",
		  text: "",
		  icon: "success",
		  showCancelButton: false,
		  confirmButtonColor: "#3085d6",		  
		  confirmButtonText: "Aceptar"
		}).then((result) => {
		  if (result.isConfirmed) {
		    window.location.href="http://localhost:8012/inventario/index.php?view=controller/proveedores.php"  
		  }
		})
   </script>';
    }
?>