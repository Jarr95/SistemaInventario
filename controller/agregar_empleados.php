<?php
    require_once "model/empleado.php";
    $empleado = new Empleado();
    $cargo = $empleado->mostrarCargos();
?>   

<div>
	<div>
	<h1 align="center">AGREGAR EMPLEADO</h1>
	<br>
	<form method="post" action="index.php?view=controller/validar_nuevo_empleado.php">

  <div>
    <b>Nombre*</b>
    <div >
      <input type="text" name="nombre" required placeholder="Nombre">
    </div>
  </div>

  <div>
    <b>Apellido*</b>
    <div >
      <input type="text" name="apellido" required required placeholder="Apellido">
    </div>
  </div>

  <div>
    <b>Telefono</b>
    <div>
      <input type="text" name="telefono" placeholder="Telefono">
    </div>
  </div>

  <div>
    <b>Cargo*</b>
    <div >
        <select name="cargo" id="selectCargo">
            <!-- <option value="">Elige un valor</option> -->
              <?php foreach($cargo as $registro){ ?>
                <option value="<?php echo $registro['id_rol']; ?>"><?php echo $registro['nombre_rol']; ?></option>
              <?php } ?>
        </select>
    </div>
  </div>

  <div>
    <b>Email*</b>
    <div >
      <input type="email" name="email"  required placeholder="Email">
    </div>
  </div>

  <div>
    <b>Contrase&ntilde;a*</b>
    <div >
      <input type="password" name="password"  required placeholder="Contrase&ntilde;a">
    </div>
  </div>

  <div>
    <b>Documento de Identidad*</b>
    <div >
      <input type="text" name="documentoId"  required placeholder="Documento de Identidad">
    </div>
  </div>

  <p>* Campos obligatorios</p>

  <div>
    <div>
      <button type="submit" class="add-form">Agregar Empleado</button>
    </div>
  </div>
</form>
	</div>
</div>