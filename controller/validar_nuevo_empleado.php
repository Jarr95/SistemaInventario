<?php
    require_once "model/empleado.php";
    $empleado = new Empleado();
    $consulta = $empleado->agregarEmpleado($_REQUEST['nombre'],$_REQUEST['apellido'],$_REQUEST['telefono'],$_REQUEST['cargo'],$_REQUEST['email'],$_REQUEST['password'],$_REQUEST['documentoId']);
    if ($consulta == true) {
        echo'<script type="text/javascript">    
        Swal.fire({
		  title: "Empleado Ingresado Exitosamente!",
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