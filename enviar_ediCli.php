<?php
require_once 'config.php';

// Get the updated values from the form
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$cpf = $_POST['cpf'];

// Query to update the item data
$sql = "UPDATE itens SET nome = '$nome', email = '$email', telefone = '$telefone', endereco = '$endereco', cpf = '$cpf' WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erro ao executar a consulta: " . mysqli_error($conn));
}

// Close the connection
mysqli_close($conn);

// Redirect back to the stock page
header('Location: clientes.php');
exit;
?>