<?php
include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  $item = $_POST['item'];
  $quantidade = $_POST['quantidade'];
  $id_do_cliente = $_POST['id_do_cliente'];
  $nome_do_cliente = $_POST['nome_do_cliente'];
  $id_do_admin = $_POST['id_do_admin'];
  $detalhes = $_POST['detalhes'];
  $status = $_POST['status'];


  // Atualizar o produto no banco de dados
  $sqlInsert = "UPDATE pedidos 
  SET item='$item', quantidade='$quantidade', id_do_cliente='$id_do_cliente',
  nome_do_cliente='$nome_do_cliente', id_do_admin='$id_do_admin', detalhes='$detalhes',
  status='$status' WHERE id=$id ";
  $result = $conn->query($sqlInsert);
  print_r($result);
} else {
  echo "Erro";
}

// Redirecionar para a página anterior
header('Location: pedidos_pendentes.php');
exit;
?>