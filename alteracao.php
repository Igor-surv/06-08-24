<?php
    // Inclui o arquivo de conexão com o banco de dados
    require_once 'database.php';

    // Executa a consulta para realizar a alteração
    $sql = "INSERT INTO alterations (tabela, alteracao) VALUES ('$tabela', '$alteracao')";
    $result = mysqli_query($conn, $sql);

    // Verifica se a consulta foi bem-sucedida
    if ($result) {
        $id = mysqli_insert_id($conn);
        echo "Alteração realizada com sucesso! ID: $id";
    } else {
        echo "Erro ao realizar alteração: " . mysqli_error($conn);
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
?>