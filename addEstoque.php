<?php 
  include_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="addEstoque.css">
  <title>Adicionar Pedido</title>
</head>
<body>

<form action="add_estoque.php" class="container" method="post">

  <h1>Adicionar Item ao Estoque</h1>

  <label for="nome">Nome do Item:</label>
  <input type="text" name="nome" maxlength="100" required>
    <br><br>

  <label for="codigo">Codigo do Item:</label>
  <input type="number" name="codigo" maxlength="15" required>
    <br><br>

  <label for="tipo">Tipo do Item:</label>
  <input type="text" name="tipo" maxlength="50" required>
    <br><br>  

  <label for="disponiveis">Disponiveis:</label>
  <input type="number" id="disponiveis" name="disponiveis" maxlength="50" required>
  <br><br>

  <label for="indisponiveis">Indisponiveis:</label>
  <input type="number" id="indisponiveis" name="indisponiveis" maxlength="50">
  <br><br>

  <label for="quantidade">Quantidade:</label>
  <input type="number" id="quantidade" name="quantidade" maxlength="100" required>
  <br><br>
  
  <input type="submit" name="add" id="submit" value="Adicionar Pedido">

</form>

</body>
</html>