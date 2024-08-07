<?php
// config.php

// Configurações do banco de dados
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'tcc';

// Conectar ao banco de dados
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Verificar se houve erro na conexão
if ($conn->connect_error) {
  die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}
?>