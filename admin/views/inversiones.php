<?php

require_once('../models/conexion.php');
$conn = new Conexion();
if (isset($_SESSION["Id"])) {

?>


    <?php include './header.php' ?>

    <?php include './sidebar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div id="resultado"></div>
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Inversionistas</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="panel-body table-responsive">
                    <table id="tabla-inversiones" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Dni</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Inversion</th>
                                <th>Correo</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <?php include './footer.php' ?>

<?php
} else {
    header("Location:" . $conn->ruta() . "index.php");
    exit();
}
?>