<?php
  extract ($_REQUEST);
  if (!isset($_SESSION['user'])){
	  header("location:index.php");
  }
  if (!isset($_REQUEST['view'])){
	  $view="controller/bienvenida.php";
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Inventario</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <script src="libs/swal/sweetalert2.all.min.js"></script>
    <script src="https://kit.fontawesome.com/bd0ea44deb.js" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js" integrity="sha256-Ap4KLoCf1rXb52q+i3p0k2vjBsmownyBTE1EqlRiMwA=" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href=" css/estilos.css">
    <script>$(document).ready(function(){
            $(".nav").toggle();
            $('.submenu-toggle').click(function () {
              $(this).parent().children('ul.submenu').toggle(200);
            });
          });
          function salir(){
            Swal.fire({
            title: '¿Desea cerrar sesion?',
            showCancelButton: true,
            confirmButtonText: 'Aceptar',
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href="controller/salir.php"
            }
          })
          }

          var etiquetas = [];
          function marca(){
            var nodo = document.createElement('div');
            var cerrar = document.createElement('span');
            var select = document.getElementById('selectCargo');
            var marcas = document.getElementById('marcas');
            var valores = document.getElementById('marcas_hidden');
            var seleccion = document.createElement('span');
            var seleccionado = select.options[select.selectedIndex].text;
            var nodoId = select.value;

            nodo.innerHTML = select.value;
            nodo.setAttribute('class','hidden');
            cerrar.innerHTML = 'x';
            cerrar.setAttribute('class','cerrar');
            seleccion.innerHTML = seleccionado
            seleccion.setAttribute('class','marca');
            
            if ((nodo.innerHTML != '') && (!etiquetas.includes(nodoId)) ){
              marcas.appendChild(seleccion);
              seleccion.appendChild(nodo);
              seleccion.appendChild(cerrar);
              valores.append(nodoId,',');
              valores.value += nodoId + ",";
              etiquetas.push(nodoId);
            }
            
          }

          $(document).on("click", ".cerrar", e => {
            e.preventDefault();
            var existe = e.currentTarget.parentElement.firstChild.nextElementSibling.innerText;
            // existe = existe.replace('x','');
            var indice = etiquetas.indexOf(existe);
            if (indice > -1) {
              etiquetas.splice(indice, 1);
              var valores = document.getElementById('marcas_hidden');
              valores.value = etiquetas;
            }
            $(e.currentTarget.parentElement).remove();
          });


          function tomarMarcas(){
            var valores = document.getElementById('marcas_hidden');
            valores.value = etiquetas;
          }
          
    </script>
</head>
<body>
    <div id="divContenedor">
      <div id="divEncabezado"><?php include_once "view/encabezado.php";?></div>
      <div id="divMenu">       
        <a href="index.php?view=controller/bienvenida.php"><i class="fas fa-home"></i>&nbsp;Inicio</a>
        <a href="index.php?view=controller/empleados.php"><i class="fas fa-users"></i>&nbsp;Empleados</a>
        <a href="index.php?view=controller/productos.php"><i class="fas fa-shopping-basket"></i>&nbsp;Productos</a>
        <a href="index.php?view=controller/marcas.php"><i class="fas fa-tags"></i>&nbsp;Marcas</a>
        <a href="index.php?view=controller/categorias.php"><i class="fas fa-boxes"></i>&nbsp;Categorias</a>
        <a href="#" class="submenu-toggle">
          <span><i class="fas fa-cash-register"></i>&nbsp;Movimientos</span>
        </a>
        <ul class="nav submenu">
          <li><a href="index.php?view=controller/entradas.php"><i class="fas fa-cart-plus"></i>&nbsp;Entradas</a> </li>
          <li><a href="index.php?view=controller/salidas.php"><i class="fas fa-cart-arrow-down"></i>&nbsp;Salidas</a> </li>
        </ul>
        <a href="index.php?view=controller/proveedores.php"><i class="fas fa-truck"></i>&nbsp;Proveedores</a>
      </div>
      <div id="divContenido">
        <?php include_once $view; ?>
      </div>
    </div>
    <div id="divPiePagina"><?php include "view/piePagina.php";?></div>
</div>
</body>
</html>