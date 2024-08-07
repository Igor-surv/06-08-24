<?php
require_once 'config.php';

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$emitente = $_POST['emitente'];
$pedido = $_POST['pedido'];
$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$valor = $_POST['valor'];

$sqlInsert = "INSERT INTO recibo (emitente, pedido, codigo, nome, valor) 
  VALUES ('$emitente', '$pedido', '$codigo', '$nome', '$valor')";
$result = $conn->query($sqlInsert);

if ($result) {
    echo "Recibo emitido com sucesso";
} else {
    echo "Erro ao adicionar pedido: ". $conn->error;
}

// Redirecionar para a página anterior
header('Location: relatorio.php');
exit;
?>