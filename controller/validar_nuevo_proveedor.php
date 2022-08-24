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
    
    $consulta = $proveedor->agregarProveedor($_REQUEST['nombre'],$_REQUEST['apellido'],$telefono,$_REQUEST['email'],$_REQUEST['documentoId']);
    if ($consulta == true) {
    	$consulta2 = $proveedor->obtenerUltimoId();
    	foreach ($consulta2 as $value) {
    		$id = $value[0];
    	}
    	foreach (array_filter($marcas) as $value) {
    		$consulta3 = $proveedor->agregarMarcaProveedor($id,$value);
    	}
        echo'<script type="text/javascript">    
        Swal.fire({
		  title: "Proveedor Ingresado Exitosamente!",
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