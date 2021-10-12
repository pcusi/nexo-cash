<?php

    function getMontos() {
        include('../config/connection.php');

        $query = "SELECT *FROM Monto";
    
        $result = mysqli_query($conn, $query);
    
        $json = array();
        
        while ($row = mysqli_fetch_array($result)) {
            $amountFormat = number_format($row['Monto'], 2, '.', ',');
    
            $json[] = array(
                'id' => $row['Id'],
                'monto' => $amountFormat
            );
        }
    
        $jsonString = json_encode($json);
    
        echo $jsonString;
    }

    function getTotal($idmonto, $idplazo) {

        include('../config/connection.php');

        $query = "SELECT i.Interes as Interes, p.Id as IdPlazo, m.Id as IdMonto, 
                  m.Monto as Monto, p.Meses as Meses
                  FROM Interes i INNER JOIN Total t on i.Id = t.IdInteres 
                  INNER JOIN Plazo p on p.Id = t.IdPlazo 
                  INNER JOIN Monto m on m.Id = t.IdMonto 
                  WHERE t.IdMonto = $idmonto and t.IdPlazo = $idplazo";

        $result = mysqli_query($conn, $query);

        $json = array();

        while ($row = mysqli_fetch_array($result)) {

            $A1 = (($row['Monto'] * ($row['Interes'] / 100)));
            $B1 = (($row['Monto'] / $row['Meses']));
            $calc = ($A1 + $B1);
            $total = number_format((float)$calc, 2, '.', '');

            $json[] = array(
                'idmonto' => $row['IdMonto'],
                'idplazo' => $row['IdPlazo'],
                'total' => $total,
                'interes' => $row['Interes']
            );
        }

        $jsonString = json_encode($json);

        echo $jsonString;
    }

    if (isset($_POST['idmonto']) && isset($_POST['idplazo'])) {
        $idmonto = $_POST['idmonto'];
        $idplazo = $_POST['idplazo'];
        getTotal($idmonto, $idplazo);
    } else {
        getMontos();
    }