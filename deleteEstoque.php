<?php
if (!empty($_GET['nome'])) {
    include_once('config.php');
    $nome = $_GET['nome'];
    $sqlSelect = "SELECT * FROM itens WHERE nome='$nome'"; // added quotes around $nome

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM itens WHERE nome='$nome'"; // added quotes around $nome
        $resultDelete = $conn->query($sqlDelete);
    }
}
header('Location: estoque.php');
?>