<?php
    require_once "model/categoria.php";
    $categoria = new Categoria();
    $resultado = $categoria->consultarCategoria($_GET["id"]);
    // $resultado = $categoria->consultarcategorias();
    foreach ($resultado as $registro) {
?>    
<div>
	<div>
	    <h1 align="center">EDITAR CATEGORIA</h1>
	    <br>
	    <form method="post" action="index.php?view=controller/actualizar_categorias.php">

            <div>
                <b>Nombre</b>
                <div>
                <input type="text" name="nombre_categoria" required value="<?php echo $registro['nombre_categoria'];?>" placeholder="Nombre de la categoria">
                </div>
            </div>

            &nbsp;
            <div>
                <div>
                    <input type="hidden" name="id_categoria" value="<?php echo $registro['id_categoria']; }?>">
                    <button type="submit" class="add-form">Actualizar Categoria</button>
                </div>
             </div>
        </form>
	</div>
</div>