<?php
if (!empty($_GET['id'])) {
    include_once('config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM clientes WHERE id = '$id'";
    $result = mysqli_query($conn, $sqlSelect);

    if (mysqli_num_rows($result) > 0) {
        $sqlDelete = "DELETE FROM clientes WHERE id = '$id'";
        mysqli_query($conn, $sqlDelete);
    }
}

header('Location: clientes.php');
exit;
?>