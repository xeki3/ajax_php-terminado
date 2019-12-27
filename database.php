<?php

$conection = mysqli_connect(
    'localhost',
    'root',
    '',
    'task-app'
);

//$conection = pg_connect("host='localhost dbname= 'public' port=5432 user=postgree password=837640") or die("error de conexion " . pg_last_error());

if ($conection) {
    echo "conectado correctamente";
}
