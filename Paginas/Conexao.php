<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "jpautocenter";

// Criar conexão
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Definir charset (IMPORTANTE para acentos)
$conn->set_charset("utf8");
?>