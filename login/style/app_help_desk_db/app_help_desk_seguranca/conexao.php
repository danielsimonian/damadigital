<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'db_helpdesk';
    
    $link = new mysqli($host, $user, $pass, $db);

    if ($link->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
?>