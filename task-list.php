<?php

include('database.php');

$query = 'SELECT * from tareas';
$result = mysqli_query($conection, $query);

if (!$result) {
    die('query failed' . mysqli_error($conection));
} else {
    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'nombre' => $row['nombre'],
            'descripcion' => $row['descripcion'],
            'id' => $row['id']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
