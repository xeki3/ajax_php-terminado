<?php
include('database.php');

$search = $_POST['search'];

if (!empty($search)) {
    $query = "SELECT * FROM tareas WHERE nombre LIKE '$search%'";
    $result = mysqli_query($conection, $query);
    if (!$result) {
        die('query error ' . mysqli_error($conection));
    }

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
