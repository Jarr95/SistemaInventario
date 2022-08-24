<div class="row">
	<div class="col-md-12">
	  <h1 align="center">AGREGAR MARCA</h1>
	  <br>
	  <form class="form-horizontal" method="post" action="index.php?view=controller/validar_nueva_marca.php" role="form">

      <div>
        <b>C&oacute;digo*</b>
        <div>
          <input type="text" name="id_marca" required placeholder="Codigo">
        </div>
      </div>

      <div>
        <b>Nombre Marca*</b>
        <div>
          <input type="text" name="nombre_marca" required placeholder="Nombre">
        </div>
      </div>

      <div>
        <b>Pa&iacute;s Marca</b>
        <div>
          <input type="text" name="pais_marca" placeholder="Pais">
        </div>
      </div>

      <p>* Campos obligatorios</p>

      <div>
        <div>
          <button type="submit" class="add-form">Agregar marca</button>
        </div>
      </div>
    </form>
	</div>
</div>