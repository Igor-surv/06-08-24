<?php
include_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="addPedido.css">
  <title>Adicionar Pedido</title>
</head>
<body>
  
  <!-- Criar o formulário de adição de pedido -->
  <form action="add_pedido.php" class="container" method="post">
  <h1>Adicionar Pedido</h1>

  <label for="item">Item:</label>
  <input type="text" id="item" name="item"><br><br>

  <label for="quantidade">Quantidade:</label>
  <input type="number" id="quantidade" name="quantidade"><br><br>

  <label for="id_do_cliente">Id do cliente:</label>
  <input type="number" id="id_do_cliente" name="id_do_cliente"><br><br>

  <label for="nome_do_cliente">Nome do Cliente:</label>
  <input type="text" id="nome_do_cliente" name="nome_do_cliente"><br><br>

  <label for="id_do_admin">Id do Admin:</label>
  <input type="number" id="id_do_admin" name="id_do_admin"><br><br>

  <label for="detalhes">Detalhes:</label>
  <input type="text" id="detalhes" name="detalhes"><br><br>

  <input type="submit" name="add" id="submit" value="Adicionar Pedido">
</form>

</body>
</html>