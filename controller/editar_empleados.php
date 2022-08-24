<?php
    require_once "model/empleado.php";
    $empleado = new Empleado();
    $estado = new Empleado();
    $estados = $estado->mostrarEstado();
    $resultado = $empleado->consultarEmpleado($_GET["id"]);
    foreach ($resultado as $registro) {
?>    
<div>
	<div>
	    <h1 align="center">EDITAR EMPLEADO</h1>
	    <br>
	    <form  method="post"  action="index.php?view=controller/actualizar_empleados.php">
            <div>
                <b>Nombre</b>
                <div>
                <input type="text" required name="nombre" value="<?php echo $registro['nombre'];?>"   placeholder="Nombre">
                </div>
            </div>

            <div>
                <b>Apellido</b>
                <div>
                <input type="text" required name="apellido" value="<?php echo $registro['apellido'];?>" placeholder="Apellido">
                </div>
            </div>

            <div>
                <b>Telefono</b>
                <div>
                <input type="text" name="telefono" value="<?php echo $registro['telefono'];?>" placeholder="Telefono">
                </div>
            </div>
            
            <div>
                <b>Email</b>
                <div>
                <input type="email" name="email" required value="<?php echo $registro['email'];?>" placeholder="Email">
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
                    <input type="hidden" name="id_persona" value="<?php echo $registro['id_persona']; }?>">
                    <button type="submit" class="add-form">Actualizar Empleado</button>
                </div>
             </div>
        </form>
	</div>
</div>