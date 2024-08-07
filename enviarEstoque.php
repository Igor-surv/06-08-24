<?php
require_once 'config.php';

// Get the updated values from the form
$nome = $_POST['nome'];
$codigo = $_POST['codigo'];
$tipo = $_POST['tipo'];
$disponiveis = $_POST['disponiveis'];
$indisponiveis = $_POST['indisponiveis'];
$quantidade = $_POST['quantidade'];
$nome_original = $_POST['nome_original'];

// Query to update the item data
$sql = "UPDATE itens SET nome = '$nome', codigo = '$codigo', tipo = '$tipo', disponiveis = '$disponiveis', indisponiveis = '$indisponiveis', quantidade = '$quantidade' WHERE nome = '$nome_original'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erro ao executar a consulta: " . mysqli_error($conn));
}

// Close the connection
mysqli_close($conn);

// Redirect back to the stock page
header('Location: estoque.php');
exit;
?>