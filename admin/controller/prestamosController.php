<?php

require_once '../models/prestamos.php';
require_once '../models/conexion.php';

$prestamos = new Prestamos();

switch ($_GET["op"]) {
    case "listar":
        $datos = $prestamos->getPrestamos();

        //Vamos a declarar un array
        $data = array();

        $motivo = '';
        $tipoMonto = '';
        $tipoPropiedad = '';
        $ubicacionPropiedad = '';

        foreach ($datos as $row) {
            $sub_array = array();

            $enumMotivo = $row['Motivo'];
            $enumMonto = $row['TipoMonto'];
            $enumTipoPropiedad = $row['TipoPropiedad'];
            $enumUbicacion = $row['UbicacionPropiedad'];

            if ($enumMotivo == 1) {
                $motivo = 'Empresario';
            } else if ($enumMotivo == 2) {
                $motivo = 'Emprendimiento';
            } else if ($enumMotivo == 3) {
                $motivo = 'Deudas';
            } else if($enumMotivo == 4) {
                $motivo = 'Remodelación o compra';
            } else {
                $motivo = 'Otro';
            }

            if ($enumMonto == 1) {
                $tipoMonto = 'Cuotas fijas';
            } else {
                $tipoMonto = 'Plazos';
            }

            if ($enumTipoPropiedad == 1) {
                $tipoPropiedad = 'Sin construir';
            } else if ($enumTipoPropiedad == 2) {
                $tipoPropiedad = 'Construido';
            } else {
                $tipoPropiedad = 'Local Comercial';
            }

            if ($enumUbicacion == 1) {
                $ubicacionPropiedad = 'Departamento';
            } else if ($enumUbicacion == 2) {
                $ubicacionPropiedad = 'Provincia';
            } else {
                $ubicacionPropiedad = 'Distrito';
            }

            $amountFormat = number_format($row['Monto'], 2, '.', ',');
            $homeFormat = number_format($row['ValorPropiedad'], 2, '.', ',');
            $saleFormat = number_format($row['Ingreso'], 2, '.', ',');

            $sub_array[] = $row["Dni"];
            $sub_array[] = "S/. $saleFormat";
            $sub_array[] = "S/. $amountFormat";
            $sub_array[] = $motivo;
            $sub_array[] = $row["Telefono"];
            $sub_array[] = $row["Correo"];
            $sub_array[] = $tipoMonto;
            $sub_array[] = $tipoPropiedad;
            $sub_array[] = $ubicacionPropiedad;
            $sub_array[] = "S/. $homeFormat";

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
