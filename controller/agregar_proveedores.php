<?php
    require_once "model/producto.php";

    $marca = new Producto();
    $marcas = $marca->consultarMarcas();
?>

<div>
	<div>
	  <h1 align="center">AGREGAR PROVEEDOR</h1>
	  <br>
	  <form method="post" action="index.php?view=controller/validar_nuevo_proveedor.php">

      <div>
        <b>Nombre*</b>
        <div >
          <input type="text" name="nombre" required placeholder="Nombre">
        </div>
      </div>

      <div>
        <b>Apellido*</b>
        <div >
          <input type="text" name="apellido" required placeholder="Apellido">
        </div>
      </div>

      <div>
        <b>Telefono</b>
        <div>
          <input type="text" name="telefono" placeholder="Telefono">
        </div>
      </div>

      <div>
        <b>Email*</b>
        <div >
          <input type="email" name="email" required placeholder="Email">
        </div>
      </div>

      <div>
        <b>Documento de Identidad*</b>
        <div >
          <input type="text" name="documentoId" required placeholder="Documento de Identidad">
        </div>
      </div>

      <div>
        <b>Marca</b>
        <div>
          <select onchange="marca();" name="id_marca" id="selectCargo">
            <option></option>
            <?php foreach($marcas as $value){ ?>
              <option value=<?php echo $value['id_marca']; ?>><?php echo $value['nombre_marca']; ?></option>
            <?php } ?>
          </select>
          <input id="marcas_hidden" type="hidden" name="marcas[]">
        </div>
      </div>
      <div id="marcas"></div>
      <p>* Campos obligatorios</p>

      <div>
        <div>
          <button onsubmit="tomarMarcas();" type="submit" class="add-form">Agregar proveedor</button>
        </div>
      </div>
    </form>
	</div>
</div>