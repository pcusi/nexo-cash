<?php

require_once '../models/inversiones.php';
require_once '../models/conexion.php';

$inversion = new Inversion();

switch ($_GET["op"]) {
    case "listar":
        $datos = $inversion->getInversiones();

        //Vamos a declarar un array
        $data = array();

        foreach ($datos as $row) {
            $sub_array = array();

            $saleFormat = number_format($row['Inversion'], 2, '.', ',');

            $sub_array[] = $row["Dni"];
            $sub_array[] = $row["Nombres"];
            $sub_array[] = $row["Apellidos"];
            $sub_array[] = "S/. $saleFormat";
            $sub_array[] = $row["Correo"];

            $data[] = $sub_array;
        }

        $results = array(
            "sEcho" => 1, //Información para el datatables
            "iTotalRecords" => count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);


        break;
}
