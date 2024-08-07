<?php
require_once 'config.php';

// Get the item name from the URL parameter
$id = $_GET['id'];

// Query to retrieve the item data
$sql = "SELECT * FROM clientes WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erro ao executar a consulta: " . mysqli_error($conn));
}

// Fetch the item data
$item = mysqli_fetch_array($result);

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="editeEstoque.css">
    <title>Editar Estoque</title>
</head>
<body>
    <div class="container">
        <h2>Editar item</h2>
        <form action="enviar_ediCli.php" method="post">

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $item['nome']; ?>">
            <br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $item['email']; ?>">
            <br><br>

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" pattern="[0-9]+" value="<?php echo $item['telefone']; ?>">
            <br><br>

            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" value="<?php echo $item['endereco']; ?>">
            <br><br>

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" pattern="[0-9]+" value="<?php echo $item['cpf']; ?>">
            <br><br>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" id="submit" value="Salvar Alterações">
        </form>
    </div>
</body>
</html>