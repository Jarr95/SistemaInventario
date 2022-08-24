<?php
    require_once "model/movimiento.php";
    require_once "model/producto.php";
    $movimiento = new Movimiento();
    $producto = new Producto();
    $productos = $producto->mostrarProducto($_REQUEST['id_producto']);
    foreach($productos as $value){
        $precio = $value['precio_salida'];
        $cantidad_actual = $value['cantidad'];
    }
    $total = $precio * $_REQUEST['cantidad'];
    if ($_REQUEST['cantidad'] <= $cantidad_actual){
        $consulta = $movimiento->agregarMovimiento($_REQUEST['id_producto'],$_REQUEST['cantidad'],$total,$_REQUEST['fecha'],$_REQUEST['movimiento']);
        if ($consulta == true) {
            $cantidad_nueva = $cantidad_actual - $_REQUEST['cantidad'];
            $actualizar = $producto->actualizarCantidad($_REQUEST['id_producto'],$cantidad_nueva);
            echo'<script type="text/javascript">    
        Swal.fire({
          title: "Salida de Productos Insertada con Exito!",
          text: "",
          icon: "success",
          showCancelButton: false,
          confirmButtonColor: "#3085d6",          
          confirmButtonText: "Aceptar"
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href="http://localhost:8012/inventario/index.php?view=controller/salidas.php"  
          }
        })
   </script>';
        }
    }else{
        echo'<script type="text/javascript">    
        Swal.fire({
          title: "Error!",
          text: "la cantidad actual del producto es menor a la cantidad que intenta vender",
          icon: "error",
          showCancelButton: false,
          confirmButtonColor: "#3085d6",          
          confirmButtonText: "Aceptar"
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href="http://localhost:8012/inventario/index.php?view=controller/salidas.php"  
          }
        })
   </script>';
    }
?>