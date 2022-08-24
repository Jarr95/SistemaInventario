<?php
    require_once "model/producto.php";

    $producto = new Producto();
    $productos = $producto->mostrarProductosDisponibles();
?>   

<div>
	<div>
	  <h1 align="center">AGREGAR ENTRADA</h1>
	  <br>
	  <form method="post" action="index.php?view=controller/validar_nueva_entrada.php">

      <div>
        <b>Producto*</b>
        <div>
          <select name="id_producto" id="selectCargo">
            <?php foreach($productos as $value){ ?>
              <option value=<?php echo $value['id_producto']; ?>><?php echo $value['nombre']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>

      <div>
        <b>Cantidad*</b>
        <div>
          <input type="text" name="cantidad" placeholder="cantidad" required>
        </div>
      </div>

      <div>
        <b>Fecha de Ingreso*</b>
        <div>
          <input type="date" name="fecha" placeholder="2021/01/31" required>
        </div>
      </div>
      <input type="hidden" name="movimiento" value='entrada'>

      <p>* Campos obligatorios</p>

      <div>
        <div>
          <button type="submit" class="add-form">Agregar Entrada</button>
        </div>
      </div>
    </form>
	</div>
</div>