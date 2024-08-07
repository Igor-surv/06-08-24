<?php
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $item = $_POST['item'];
  $quantidade = $_POST['quantidade'];
  $id_do_cliente = $_POST['id_do_cliente'];
  $nome_do_cliente = $_POST['nome_do_cliente'];
  $id_do_admin = $_POST['id_do_admin'];
  $detalhes = $_POST['detalhes'];

  // Inserir o pedido no banco de dados
  $sqlInsert = "INSERT INTO pedidos (item, quantidade, id_do_cliente, nome_do_cliente, id_do_admin, detalhes) 
  VALUES ('$item', '$quantidade', '$id_do_cliente', '$nome_do_cliente', '$id_do_admin', '$detalhes')";
  $result = $conn->query($sqlInsert);

  if ($result) {
    echo "Pedido adicionado com sucesso!";
  } else {
    echo "Erro ao adicionar pedido: ". $conn->error;
  }
}

// Redirecionar para a página anterior
header('Location: pedidos_pendentes.php');
exit;
?>