<?php
    $host = 'myshared0783';
    $user = 'db_damadigital';
    $pass = 'nNnKJFMvhtE3V@';
    $db = 'db_damadigital';
    $link = new mysqli($host, $user, $pass, $db);


    if ($link->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
?>