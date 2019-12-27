<?php
include('database.php');
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$id = $_POST['id'];

$query = "UPDATE tareas SET nombre = '$nombre', descripcion = '$descripcion' WHERE id = '$id'";

$result = mysqli_query($conection, $query);

if (!$result) {
    die('query failed');
} else {
    echo "actualizacion satisfactoria";
}
