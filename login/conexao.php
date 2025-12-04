<?php
    session_start();

    $hostname = '';
    $username = '';
    $password = '';
    $database = 'login';

    $connect = new mysqli($hostname, $username, $password, $database);

    if ($connect->connect_error) {
        die("Falha na conexão: " . $connect->connect_error);
    }
?>