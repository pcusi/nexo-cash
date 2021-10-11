<?php

require_once("../models/conexion.php");

$conn = new Conexion();

if (isset($_SESSION["Id"])) {


?>


  <?php include('./header.php'); ?>


  <?php include('./sidebar.php') ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div id="resultado"></div>
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Préstamos</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="panel-body table-responsive">
          <table id="tabla-prestamo" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Dni</th>
                <th>Ingreso</th>
                <th>Monto</th>
                <th>Motivo</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Tipo de Monto</th>
                <th>Tipo de Propiedad</th>
                <th>Ubicación</th>
                <th>Valor</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
  
  <?php include('./footer.php') ?>


<?php

} else {

  header("Location:" . $conn->ruta() . "index");
  exit();
}

?>