<?php

function connectToDatabase(){
    $host = "localhost";
    $user = "root";
    $pass = "123456";
    $bd = "bd_loguin"; // Corregido el nombre de la base de datos

    $connect = mysqli_connect($host, $user, $pass,$bd);

    if (!$connect) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    if (!mysqli_select_db($connect, $bd)) {
        die("Error al seleccionar la base de datos: " . mysqli_error($connect));
    }

    return $connect;
}

?>