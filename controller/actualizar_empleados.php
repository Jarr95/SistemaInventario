<?php
    require_once "model/empleado.php";
    $empleado = new Empleado();
    if ($_REQUEST['telefono'] == ''){
        $telefono = 0;
    }else{
        $telefono = $_REQUEST['telefono'];
    }
    $consulta = $empleado->actualizarEmpleado($_REQUEST['id_persona'],$_REQUEST['nombre'],$_REQUEST['apellido'],$telefono,$_REQUEST['email'],$_REQUEST['id_estado']);
    if ($consulta == true) {
        echo'<script type="text/javascript">    
        Swal.fire({
		  title: "Empleado Actualizado Exitosamente!",
		  text: "",
		  icon: "success",
		  showCancelButton: false,
		  confirmButtonColor: "#3085d6",		  
		  confirmButtonText: "Aceptar"
		}).then((result) => {
		  if (result.isConfirmed) {
		    window.location.href="http://localhost:8012/inventario/index.php?view=controller/empleados.php"  
		  }
		})
   </script>';
    }
?>