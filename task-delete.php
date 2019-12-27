<?php
include('database.php');
if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $query = "DELETE FROM tareas WHERE id = $id";
    $result = mysqli_query($conection, $query);
    if (!$result) {
        die('query failed');
    } else {
        echo "eliminado satisfactoriamente";
    }
}
