<?php
    require_once "model/marca.php";
    require_once "model/producto.php";
    $producto = new Producto();
    $marca = new Producto();
    $categoria = new Producto();
    $estado = new Producto();
    $estados = $estado->mostrarEstado();
    $marcas = $marca->consultarMarcas();
    $categorias = $categoria->consultarCategorias();
    $resultado = $producto->consultarProducto($_GET["id"]);
    foreach ($resultado as $registro) {
?>    
<div>
	<div>
	    <h1 align="center">EDITAR PRODUCTO</h1>
	    <br>
	    <form  method="post"  action="index.php?view=controller/actualizar_productos.php">

            <!-- <div>
                <b>C&oacute;digo</b>
                <div>
                    <input type="text" name="idProd" value=<?php echo $registro['idProd'];?>   placeholder="Nombre">
                </div>
            </div> -->

            <div>
                <b>Nombre</b>
                <div>
                <input type="text" name="nombre" required value="<?php echo $registro['nombre'];?>"   placeholder="Nombre">
                </div>
            </div>

            <div>
                <b>Descripci&oacute;n</b>
                <div>
                <input type="text" name="descripcion" value="<?php echo $registro['descripcion'];?>" placeholder="descripcion">
                </div>
            </div>
           
            <div>
                <b>Precio Entrada</b>
                <div>
                <input type="text" name="precio_entrada" required min="50" value="<?php echo $registro['precio_entrada'];?>" placeholder="precio de entrada">
                </div>
            </div>

            <div>
                <b>Precio Salida</b>
                <div>
                <input type="text" name="precio_salida" required min="50" value="<?php echo $registro['precio_salida'];?>" placeholder="precio de salida">
                </div>
            </div>

            <div>
              <b>Categoria</b>
              <div >
                  <select name="id_categoria" id="selectCargo">
                  <option value=<?php echo $registro['id_categoria']; ?>><?php echo $registro['nombre_categoria']; ?></option>
                        <?php foreach($categorias as $value){ ?>
                          <option value=<?php echo $value['id_categoria']; ?>><?php echo $value['nombre_categoria']; ?></option>
                        <?php } ?>
                  </select>
              </div>
            </div>

            <div>
              <b>Marca</b>
              <div >
                  <select name="id_marca" id="selectCargo">
                  <option value=<?php echo $registro['id_marca']; ?>><?php echo $registro['nombre_marca']; ?></option>
                        <?php foreach($marcas as $value){ ?>
                          <option value=<?php echo $value['id_marca']; ?>><?php echo $value['nombre_marca']; ?></option>
                        <?php } ?>
                  </select>
              </div>
            </div>

            <div>
              <b>Estado</b>
              <div >
                  <select name="id_estado" id="selectCargo">
                  <option value=<?php echo $registro['id_estado']; ?>><?php echo $registro['nombre_estado']; ?></option>
                        <?php foreach($estados as $value){ ?>
                          <option value=<?php echo $value['id_estado']; ?>><?php echo $value['nombre_estado']; ?></option>
                        <?php } ?>
                  </select>
              </div>
            </div>
            &nbsp;
            <div>
                <div>
                    <input type="hidden" name="id_producto" value="<?php echo $registro['id_producto']; }?>">
                    <button type="submit" class="add-form">Actualizar producto</button>
                </div>
             </div>
        </form>
	</div>
</div>