<?php
  require_once 'config.php';

  // Get form data
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $endereco = $_POST['endereco'];
  $cpf = $_POST['cpf'];

  // Insert data into database
  $sql = "INSERT INTO clientes (nome, email, telefone, endereco, cpf) VALUES ('$nome', '$email', '$telefone', '$endereco', '$cpf')";
  if (mysqli_query($conn, $sql)) {
    if ($result) {
      echo "Item adicionado com sucesso!";
    } else {
      echo "Erro ao adicionar pedido: ". $conn->error;
    }
  }
  
  // Redirecionar para a página anterior
  header('Location: clientes.php');
  exit;
  ?>