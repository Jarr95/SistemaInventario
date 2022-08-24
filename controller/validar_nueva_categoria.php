<?php
    require_once "model/categoria.php";
    $categoria = new Categoria();
    $consulta = $categoria->agregarCategoria($_REQUEST['nombre_categoria']);
    if ($consulta == true) {
        echo'<script type="text/javascript">    
        Swal.fire({
		  title: "Categoria Ingresada Exitosamente!",
		  text: "",
		  icon: "success",
		  showCancelButton: false,
		  confirmButtonColor: "#3085d6",		  
		  confirmButtonText: "Aceptar"
		}).then((result) => {
		  if (result.isConfirmed) {
		    window.location.href="http://localhost:8012/inventario/index.php?view=controller/categorias.php"  
		  }
		})
   </script>';
    }
?>