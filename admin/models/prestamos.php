<?php

declare(strict_types=1);
require_once("conexion.php");

class Prestamos extends Conexion
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getPrestamos()
    {
        $conn = parent::conexion();
        $sql = "SELECT Dni, Ingreso, Monto, Motivo, Telefono, Correo, TipoMonto, TipoPropiedad, UbicacionPropiedad, ValorPropiedad FROM Prestamo";
        $sql = $conn->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
