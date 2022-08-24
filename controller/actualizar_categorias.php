<?php
    require_once "model/categoria.php";
    $categoria = new Categoria();
    $consulta = $categoria->actualizarCategoria($_REQUEST['id_categoria'],$_REQUEST['nombre_categoria']);
    if ($consulta == true) {
        echo'<script type="text/javascript">    
        Swal.fire({
		  title: "Categoria Actualizada Exitosamente!",
		  text: "",
		  icon: "success",
		  showCancelButton: false,
		  confirmButtonColor: "#3085d6",		  
		  confirmButtonText: "Aceptar"
		}).then((result) => {
		  if (result.isConfirmed) {
		    window.location.href="https://surkafalandia.000webhostapp.com/index.php?view=controller/categorias.php"  
		  }
		})
   </script>';
    }
?>