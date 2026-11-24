<?php

date_default_timezone_set('America/Sao_Paulo');


function conectar(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "SistemaBiblioteca";

    try {
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }
        return $conn;
    } catch (Exception $e) {
        return null;
    }
}



