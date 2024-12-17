<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'delegado';

    try {
        $conn = mysqli_connect($host, $user, $pass, $db);
    } catch (PDOException $e) {
        die("Error en la conexión a $db" . $e->getMessage());
    }

?>