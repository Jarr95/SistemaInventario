<?php
    require_once "model/proveedor.php";
    require_once "model/producto.php";
    $proveedor = new Proveedor();
    $estado = new Proveedor();
    $marca = new producto();
    $estados = $estado->mostrarEstado();
    $resultado = $proveedor->consultarProveedor($_GET["id"]);
    $marcas = $proveedor->consultarMarcas($_GET["id"]);
    $marcasActuales = $proveedor->consultarMarcas($_GET["id"]);
    $marcaProveedor = $marca->consultarMarcas();
    $total = [];
    foreach ($resultado as $registro) {
?>    
<script type="text/javascript">
    function agregarMarcas(){

        Swal.fire({
            title: '<strong>Agregar Marcas</strong>',
            html:'<select onchange="marca_modal();" name="id_marca" id="selectMarca">'+
                 '<option></option>'+
                 '<?php foreach($marcaProveedor  as $value){ ?>'+
                 '<option value=<?php echo $value["id_marca"]; ?>><?php echo $value["nombre_marca"]; ?></option>'+
                 '<?php } ?>'+
                 '</select>'+
                 '<div id="marcas_modal"></div>',
            showCloseButton: false,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:
              'Aceptar',
            cancelButtonText:
              'Cancelar'
            }).then((result) =>{
                if (result.isConfirmed) {
                    validarMarcas();
                    
                }else{
                    vaciarMarcas();
                }
            });
    }

    function eliminarMarcas(){
        Swal.fire({
            title: '<strong>Eliminar Marcas</strong>',
            html:'<div id="marcas_actuales">'+
                 '<?php foreach($marcasActuales as $value){ ?>'+
                 '<span class="marca">'+
                 '<?php echo $value["nombre_marca"] ?>'+
                 '<div class="hidden">'+
                 '<?php echo $value["id_marca"] ?>'+
                 '</div><span class="cerrarN">x</span></span>'+
                 '<?php  } ?>'+
                 '</div>',
            showCloseButton: false,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:
              'Aceptar',
            cancelButtonText:
              'Cancelar'
            }).then((result) =>{
                if (result.isConfirmed) {
                    validarEliminarMarcas();
                    
                }else{
                    vaciarEliminarMarcas();
                }
            });
    }

    var marcas_proveedor = [];
    var marcas_nombre = [];
    var array_marcas = [];

    var array_eliminar = [];
    var array_eliminar_nombre = [];
    var marcas_eliminar = [];

    function marca_modal(){
            var nodo = document.createElement('div');
            var cerrar = document.createElement('span');
            var select = document.getElementById('selectMarca');
            var marcas = document.getElementById('marcas_modal');
            var valores = document.getElementById('marcas_hidden');
            var seleccion = document.createElement('span');
            var val = document.getElementById('actual');
            var seleccionado = select.options[select.selectedIndex].text;
            var nodoId = select.value;
            var test = val.value;
            var array = test.split(' ');
            var test2 = valores.value;
            var array2 = test2.split(' ');

            nodo.innerHTML = select.value;
            nodo.setAttribute('class','hidden');
            cerrar.innerHTML = 'x';
            cerrar.setAttribute('class','cerrar');
            seleccion.innerHTML = seleccionado
            seleccion.setAttribute('class','marca');
            if ((nodo.innerHTML != '') && (!marcas_proveedor.includes(nodoId) && (!array.includes(nodoId)) && (!array2.includes(nodoId))) ){

              marcas.appendChild(seleccion);
              seleccion.appendChild(nodo);
              seleccion.appendChild(cerrar);
              valores.append(nodoId,',');
              valores.value += nodoId + ",";
              marcas_proveedor.push(nodoId);
              marcas_nombre.push(seleccionado);
              // console.log("In: "+marcas_proveedor,marcas_nombre)
            }
          }

          function validarMarcas(){
            // var valores = document.getElementById('marcas_hidden');
            var val = document.getElementById('actual');
            var marcas = document.getElementById('marcas2');
            var test = val.value;
            // var test2 = valores.value;
            var array = test.split(' ');
            // var array2 = test2.split(',');

            // array2 = array2.filter((a) => a);
            for (var i = 0; i < marcas_proveedor.length; i++) {
                    
                    
                if (!array.includes(marcas_proveedor[i]) && !array_marcas.includes(marcas_proveedor[i])) {
                        
                    array_marcas.push(marcas_proveedor[i]);
                    var seleccion = document.createElement('span');
                    var nodo = document.createElement('div');
                    var cerrar = document.createElement('span');
                    nodo.setAttribute('class','hidden');
                    nodo.innerHTML = marcas_proveedor[i];
                    cerrar.innerHTML = 'x';
                    cerrar.setAttribute('class','cerrar');
                    seleccion.setAttribute('class','marcaN');   
                    seleccion.innerHTML = marcas_nombre[i];
                    marcas.appendChild(seleccion);
                    seleccion.appendChild(nodo);
                    seleccion.appendChild(cerrar);
                }
            }
          }

          function validarEliminarMarcas(){


            var val = document.getElementById('actual');
            var test = val.value;
            var array = test.split(' ');

            for (var i = 0; i < array_eliminar.length; i++) {
                if (array.includes(array_eliminar[i]) && !marcas_eliminar.includes(array_eliminar[i])) {

                    marcas_eliminar.push(array_eliminar[i])
                    var marca = document.getElementById('marca'+array_eliminar[i]);
                    var nodo = document.createElement('div');
                    var cerrar = document.createElement('span');

                    nodo.setAttribute('class','hidden');
                    nodo.innerHTML = array_eliminar[i];
                    cerrar.innerHTML = 'x';
                    cerrar.setAttribute('class','cerrarF');
                    marca.appendChild(nodo);
                    marca.appendChild(cerrar);
                    marca.style.background = "#d3727f";
                    // console.log('marca eliminada', marca.innerText);
                    // console.log(marcas_eliminar);
                }
            }
          }

          function vaciarMarcas(){
            var valores = document.getElementById('marcas_hidden');
            valores.value = '';
          }

          function vaciarEliminarMarcas(){
             array_eliminar = [];
             array_eliminar_nombre = [];
             // console.log(array_eliminar,array_eliminar_nombre);
          }

    $(document).on("click", ".cerrar", e => {
      e.preventDefault();
      var existe = e.currentTarget.parentElement.firstChild.nextElementSibling.innerText;
      var existe2 = e.currentTarget.parentElement.innerText;
      var aaa = e.currentTarget.parentElement.firstChild;
      var bbb = e.currentTarget.parentElement.innerText;
      existe2 = existe2.replace(existe+'x','');
      
      var indice = marcas_proveedor.indexOf(existe);
      var indice2 = marcas_nombre.indexOf(existe2);
      var indice3 = array_marcas.indexOf(existe);

      if (indice > -1) {
        marcas_proveedor.splice(indice, 1);
        var valores = document.getElementById('marcas_hidden');
            valores.value = marcas_proveedor;
      }
      if (indice2 > -1) {
        marcas_nombre.splice(indice2, 1);
      }
      if (indice3 > -1) {
        array_marcas.splice(indice3, 1);
      }
      $(e.currentTarget.parentElement).remove();
      // console.log("Out: "+marcas_proveedor,marcas_nombre);
    });

    $(document).on("click", ".cerrarN", e => {
      e.preventDefault();
      var existe = e.currentTarget.parentElement.firstChild.nextElementSibling.innerText;
      var existe2 = e.currentTarget.parentElement.innerText;
      existe2 = existe2.replace('\nx','');

      var indice = array_eliminar.indexOf(existe);
      var indice2 = array_eliminar_nombre.indexOf(existe2);
      // console.log("Id "+existe+" Marca "+existe2);

      if ((indice == -1) && (indice2 == -1)) {

        array_eliminar.push(existe);
        array_eliminar_nombre.push(existe2);    
        $(e.currentTarget.parentElement).remove();
      }
      // console.log(array_eliminar, array_eliminar_nombre);
    });

    $(document).on("click", ".cerrarF", e => {
      e.preventDefault();
      var existe = e.currentTarget.parentElement.firstChild.nextElementSibling.innerText;
      var existe2 = e.currentTarget.parentElement.innerText;
      var cerrar = e.currentTarget.parentElement.firstChild.nextElementSibling.nextElementSibling;
      var id = e.currentTarget.parentElement.firstChild.nextElementSibling;
      var div = e.currentTarget.parentElement;
      existe2 = existe2.replace('\nx','');

      var indice = array_eliminar.indexOf(existe);
      var indice2 = array_eliminar_nombre.indexOf(existe2);
      if ((indice > -1) && (indice2 > -1)) {
        array_eliminar.splice(indice, 1);
        array_eliminar_nombre.splice(indice2, 1);
        marcas_eliminar.splice(indice, 1);
      }
      // console.log(marcas_eliminar);
      // console.log(id);
      id.remove();
      cerrar.remove();
      div.style.background = "#e8ebf1";
    });

    function tomarMarcas(){
        var valores = document.getElementById('marcas_hidden');
        var valores_ocultos = document.getElementById('marcas_hidden_eliminar');
        valores.value = array_marcas;
        valores_ocultos.value = array_eliminar;
    }

</script>
<div>
	<div>
	    <h1 align="center">EDITAR PROVEEDOR</h1>
	    <br>
	    <form  method="post"  action="index.php?view=controller/actualizar_proveedores.php">
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
            &nbsp;
            <div>   
                <b>Marcas</b>         
                &nbsp;
                <div id="marcas">
                    <?php foreach($marcas as $valor){ 
                        
                         echo '<span class="marca" id="marca'.$valor['id_marca'].'">'. $valor['nombre_marca'].'</span>'; 
                         array_push($total, $valor['id_marca']);?>
                        <?php }
                        if (empty($valor)) {
                            echo "El proveedor no tiene marcas asignadas";
                        }
                         ?>
                    <div>
                        <div id="marcas2"></div>
                        <button id="btn-add" type="button" onclick="agregarMarcas();">Agregar</button><button id="btn-rmv" type="button" onclick="eliminarMarcas();">Eliminar</button>
                    </div>
                    <input id="marcas_hidden" type="hidden" name="marcas[]">
                    <input id="marcas_hidden_eliminar" type="hidden" name="marcasEliminar[]">
                    <input id="actual" type="hidden" value="<?php echo implode(' ', $total) ?>">
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
                    <input type="hidden" name="id_proveedor" value="<?php echo $registro['id_proveedor']; }?>">
                    <button onclick="tomarMarcas();" type="submit" class="add-form">Actualizar Proveedor</button>
                </div>
             </div>
        </form>
	</div>
</div>