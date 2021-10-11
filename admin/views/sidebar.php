<?php


require_once("../models/conexion.php");

$conn = new Conexion();

if (isset($_SESSION["Id"])) {

?>



    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <div class="user-avatar">
                    </div>
                </div>
                <div class="info">
                    <a class="d-block"><?php echo $_SESSION["Usuario"] ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li>
                        <a href="prestamos" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Préstamos
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="inversiones" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Inversionistas
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

<?php

} else {

    header("Location:" . $conn->ruta() . "index.php");
    exit();
    exit();
}
?>