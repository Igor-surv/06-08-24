<?php
require_once 'config.php';

// Get the item name from the URL parameter
$nome = $_GET['nome'];

// Query to retrieve the item data
$sql = "SELECT * FROM itens WHERE nome = '$nome'";
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
    <form action="enviarEstoque.php" method="post">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $item['nome']; ?>">
            <br><br>

        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" value="<?php echo $item['codigo']; ?>">
            <br><br>

        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" value="<?php echo $item['tipo']; ?>">
        <br><br>

        <label for="disponiveis">Disponiveis:</label>
        <input type="number" id="disponiveis" name="disponiveis" value="<?php echo $item['disponiveis']; ?>">
        <br><br>

        <label for="indisponiveis">Indisponiveis:</label>
        <input type="number" id="indisponiveis" name="indisponiveis" value="<?php echo $item['indisponiveis']; ?>">
        <br><br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" value="<?php echo $item['quantidade']; ?>">
        <br><br>
        <input type="hidden" name="nome_original" value="<?php echo $nome; ?>">
        <input type="submit" id="submit" value="Salvar Alterações">
    </form>
</div>
</body>
</html>