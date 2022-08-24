<?php
    require_once "model/movimiento.php";
    require_once "model/producto.php";
    $movimiento = new Movimiento();
    $producto = new Producto();
    $productos = $producto->mostrarProducto($_REQUEST['id_producto']);
    foreach($productos as $value){
        $precio = $value['precio_entrada'];
        $cantidad_actual = $value['cantidad'];
    }
    $total = $precio * $_REQUEST['cantidad'];
    $consulta = $movimiento->agregarMovimiento($_REQUEST['id_producto'],$_REQUEST['cantidad'],$total,$_REQUEST['fecha'],$_REQUEST['movimiento']);
    if ($consulta == true) {
        $cantidad_nueva = $cantidad_actual + $_REQUEST['cantidad'];
        $actualizar = $producto->actualizarCantidad($_REQUEST['id_producto'],$cantidad_nueva);
        echo'<script type="text/javascript">    
        Swal.fire({
          title: "Entrada de Productos Insertada con Exito!",
          text: "",
          icon: "success",
          showCancelButton: false,
          confirmButtonColor: "#3085d6",          
          confirmButtonText: "Aceptar"
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href="http://localhost:8012/inventario/index.php?view=controller/entradas.php"  
          }
        })
   </script>';
    }
?>