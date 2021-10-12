<?php

    require_once('../config/connection.php');

    $query = "SELECT *FROM Plazo";
    
    $result = mysqli_query($conn, $query);

    $json = array();

    while ($row = mysqli_fetch_array($result)) {

        $json[] = array(
            'id' => $row['Id'],
            'plazo' => $row['Plazo']
        );

    }

    $jsonString = json_encode($json);

    echo $jsonString;
