<?php
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nome = $_POST['nome'];
  $codigo = $_POST['codigo'];
  $tipo = $_POST['tipo'];
  $disponiveis = $_POST['disponiveis'];
  $indisponiveis = $_POST['indisponiveis'];
  $quantidade = $_POST['quantidade'];

  // Inserir o pedido no banco de dados
  $sqlInsert = "INSERT INTO itens (nome, codigo, tipo, disponiveis, indisponiveis, quantidade ) VALUES ('$nome', '$codigo', '$tipo', '$disponiveis', '$indisponiveis', '$quantidade')";
  $result = $conn->query($sqlInsert);

  if ($result) {
    echo "Item adicionado com sucesso!";
  } else {
    echo "Erro ao adicionar pedido: ". $conn->error;
  }
}

// Redirecionar para a página anterior
header('Location: estoque.php');
exit;
?>