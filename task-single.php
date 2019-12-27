<?php

include('database.php');

$id = $_POST['id'];
$query = "SELECT * FROM tareas WHERE id = $id";
$result = mysqli_query($conection, $query);

if (!$result) {
    die('query failed');
} else {
    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'nombre' => $row['nombre'],
            'descripcion' => $row['descripcion'],
            'id' => $row['id']
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}
