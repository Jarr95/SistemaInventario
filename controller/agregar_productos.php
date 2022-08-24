<?php
    require_once "model/marca.php";
    require_once "model/producto.php";
    require_once "model/categoria.php";

    $marca = new Producto();
    $marcas = $marca->consultarMarcas();

    $categoria = new Categoria();
    $categorias = $categoria->consultarCategorias();
?>   

<div>
	<div>
	  <h1 align="center">AGREGAR PRODUCTO</h1>
	  <br>
	  <form method="post" action="index.php?view=controller/validar_nuevo_producto.php">
      <div>
        <b>C&oacute;digo*</b>
        <div>
            <input type="text" name="id_producto" required placeholder="Codigo de Producto">
        </div>
      </div>

      <div>
        <b>Nombre*</b>
        <div >
          <input type="text" name="nombre" required placeholder="Nombre">
        </div>
      </div>

      <div>
        <b>Descripcion</b>
        <div >
          <input type="text" name="descripcion" placeholder="descripcion">
        </div>
      </div>

      <div>
        <b>Precio Entrada*</b>
        <div >
          <input type="number" name="precio_entrada" min="50" required placeholder="Precio de entrada">
        </div>
      </div>

      <div>
        <b>Precio Salida*</b>
        <div >
          <input type="number" name="precio_salida" min="50" required placeholder="Precio de salida">
        </div>
      </div>

      <div>
        <b>Categoria*</b>
        <div>
          <select name="id_categoria" id="selectCargo">
            <?php foreach($categorias as $value){ ?>
              <option value=<?php echo $value['id_categoria']; ?>><?php echo $value['nombre_categoria']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>

      <div>
        <b>Marca*</b>
        <div>
          <select name="id_marca" id="selectCargo">
            <?php foreach($marcas as $value){ ?>
              <option value=<?php echo $value['id_marca']; ?>><?php echo $value['nombre_marca']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>

      <p>* Campos obligatorios</p>

      <div>
        <div>
          <button type="submit" class="add-form">Agregar producto</button>
        </div>
      </div>
    </form>
	</div>
</div>