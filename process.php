<?php
// Database connection
require_once 'config.php';


// Get form data
$id = $_POST['id_do_pedido'];
$item = $_POST['item'];
$quantidade = $_POST['quantidade'];
$id_do_cliente = $_POST['id_do_cliente'];
$nome_do_cliente = $_POST['nome_do_cliente'];
$id_do_admin = $_POST['id_do_admin'];
$detalhes = $_POST['detalhes'];


// Update query
$sql = "UPDATE client SET name='$name', address='$address' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>