<?php
    include_once "model/marca.php";
    $marca = new marca();

    //falta validar si marca ya existe
    $consulta = $marca->agregarMarca($_REQUEST['id_marca'],$_REQUEST['nombre_marca'],$_REQUEST['pais_marca']);

    if ($consulta == true) {
        echo'<script type="text/javascript">    
        Swal.fire({
		  title: "Marca Ingresada Exitosamente!",
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
    }elseif ($consulta == false) {
    	echo '<script type="text/javascript">   
    	 window.location.href="http://localhost:8012/inventario/index.php?view=controller/marcas.php"; 
        Swal.fire({
		  title: "Error!",
		  text: "la marca no pudo ser ingresada",
		  icon: "error",
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