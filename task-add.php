<?php

include('database.php');

if (isset($_POST['nombre'])) {

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $query = "INSERT into tareas(nombre, descripcion) VALUES ('$nombre','$descripcion')";
    $result = mysqli_query($conection, $query);
    if (!$result) {
        die('query failed');
    } else {
        echo 'task added success';
    }
}
