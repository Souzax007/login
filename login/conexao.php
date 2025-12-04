<?php
    session_start();

    $hostname = '10.1.7.11';
    $username = 'marcos.souza';
    $password = 'M4rcos12007.';
    $database = 'login';

    $connect = new mysqli($hostname, $username, $password, $database);

    if ($connect->connect_error) {
        die("Falha na conexão: " . $connect->connect_error);
    }
?>