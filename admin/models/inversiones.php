<?php

declare(strict_types=1);
require_once("conexion.php");

class Inversion extends Conexion
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getInversiones()
    {
        $conn = parent::conexion();
        $sql = "SELECT *FROM Inversion";
        $sql = $conn->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}
