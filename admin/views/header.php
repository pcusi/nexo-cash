<?php


require_once("../models/conexion.php");

$conn = new Conexion();

if (isset($_SESSION["Id"])) {

?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Nexo Cash - Panel de Administrador</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="../plugins/datatables/jquery.dataTables.min.css">
        <link rel="stylesheet" href="../dist/css/style.css">
        <link href="../plugins/datatables/buttons.dataTables.min.css" rel="stylesheet" />
        <link href="../plugins/datatables/responsive.dataTables.min.css" rel="stylesheet" />
        <!-- Ionicons -->
        <link rel="icon" type="image/png" sizes="96x96" href="../../public/assets/img/nexo_cash_favicon.jpeg">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
        <!-- icono -->
        <link rel="icon" type="image/png" href="../favicon.png">
        <!-- Theme style -->
        <link rel="stylesheet" href="../dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav px-2">
                    <li class="nav-item">
                        <a>Nexo Cash</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" id="logout" role="button">
                            <i class="fas fa-power-off"></i>
                        </a>
                    </li>
                </ul>
            </nav>

        <?php

    } else {

        header("Location:" . $conn->ruta() . "index.php");
        exit();
    }
        ?>