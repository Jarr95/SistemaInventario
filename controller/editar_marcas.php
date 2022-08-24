<?php
    require_once "model/marca.php";
    $marca = new Marca();
    $resultado = $marca->consultarmarca($_GET["id"]);
    // $resultado = $marca->consultarmarcas();
    foreach ($resultado as $registro) {
?>    
<div>
	<div>
	    <h1 align="center">EDITAR MARCA</h1>
	    <br>
	    <form method="post" action="index.php?view=controller/actualizar_marcas.php">
            <div>
                <b>Nombre</b>
                <div class="col-md-6">
                <input type="text" name="nombre_marca" required value="<?php echo $registro['nombre_marca'];?>" class="form-control" placeholder="Nombre">
                </div>
            </div>

            <div>
                <b>Pa&iacute;s</b>
                <div>
                <input type="text" name="pais_marca" value="<?php echo $registro['pais_marca'];?>" class="form-control" placeholder="Pais">
                </div>
            </div>
        
            &nbsp;
            <div>
                <div>
                    <input type="hidden" name="id_marca" value="<?php echo $registro['id_marca']; }?>">
                    <button type="submit" class="add-form">Actualizar Marca</button>
                </div>
             </div>
        </form>
	</div>
</div>