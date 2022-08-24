<?php
    require_once "model/marca.php";
    $marca = new marca();
    $consulta = $marca->actualizarMarca($_REQUEST['id_marca'],$_REQUEST['nombre_marca'],$_REQUEST['pais_marca']);
    if ($consulta == true) {
        echo'<script type="text/javascript">    
        Swal.fire({
		  title: "Marca Actualizada Exitosamente!",
		  text: "",
		  icon: "success",
		  showCancelButton: false,
		  confirmButtonColor: "#3085d6",		  
		  confirmButtonText: "Aceptar"
		}).then((result) => {
		  if (result.isConfirmed) {
		    window.location.href="http://localhost:8012/inventario/index.php?view=controller/marcas.php"
		  }
		})
   </script>';
    }
?>