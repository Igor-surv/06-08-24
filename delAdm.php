<?php
if (!empty($_GET['nome'])) {
    include_once 'config.php';
    $nome = $_GET['nome'];

    $sqlSelect = "SELECT * FROM admin WHERE nome = '$nome'";
    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM admin WHERE nome = '$nome'";
        $resultDelete = $conn->query($sqlDelete);
    }
}

header('Location: admin.php');
exit;
?>