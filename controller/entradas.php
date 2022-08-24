<?php
require_once "model/movimiento.php";
if (!isset($_SESSION['user'])){
	header("location:index.php?");
}
	
extract ($_REQUEST);
if (!isset($_REQUEST['x'])) {
  $_REQUEST['x']=0; 
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){

 var dataTable = $('#entradas').DataTable({
  "language": {
  "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
  },
  "processing" : true,
  "serverSide" : true,
  "order" : [],
  "ajax" : {
   url:"controller/datos_entrada.php",
   type:"POST"
  },dom: 'lBfrtip',
        buttons: [
            'copy', 'excel', 'csv', 'print'
        ],
        "lengthMenu": [[10, 25, 50, 100], [10, 50, 100, "Todos"]]
 });  
});
  </script>

<p class="titulos"> LISTAR ENTRADAS</p>
<a href="index.php?view=controller/agregar_entradas.php" class="add-btn"> Nueva Entrada</a>
<br>
<div class="container">
   <br />
   <div class="panel panel-primary">
    <div class="panel-body">
     <div class="table-responsive">
      <table id="entradas" class="table table-bordered table-striped">
       <thead>
        <tr>
         <th>C&oacute;digo</th>
         <th>Producto</th>
         <th>Cantidad</th>
         <th>Total</th>
         <th>Fecha</th>
        </tr>
       </thead>
       <tbody>
       </tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
  <br />
  <br />