<?php
include_once 'config.php';

// Consulta para recuperar o produto
$id = $_GET['id'];
$query = "SELECT * FROM pedidos WHERE id = $id";
$result = $conn->query($query);

// Verificar se houve erro na consulta
if (!$result) {
  die("Erro ao recuperar o registro: ". $conn->error);
}

// Recuperar o produto
$resultado = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="edit.css">
  <title>Editar</title>
</head>
<body>
  
  <!-- Criar o formulário de edição -->
   <div class="container">
  <form action="editPedido.php" class="block" method="post">
    <input type="hidden" name="id" value="<?php echo $resultado['id']; ?>">

    <label for="item">Item:</label><br>
    <input type="text" id="item" name="item" value="<?php echo $resultado['item']; ?>"><br><br>

    <label for="quantidade">Quantidade:</label><br>
    <input type="number" id="quantidade" name="quantidade" value="<?php echo $resultado['quantidade']; ?>"><br><br>

    <label for="id_do_cliente">Id do cliente:</label><br>
    <input type="number" id="id_do_cliente" name="id_do_cliente" value="<?php echo $resultado['id_do_cliente']; ?>"><br><br>

    <label for="nome_do_cliente">Nome do Cliente:</label><br>
    <input type="text" id="nome_do_cliente" name="nome_do_cliente" value="<?php echo $resultado['nome_do_cliente']; ?>"><br><br>

    <label for="id_do_admin">Id do Admin:</label><br>
    <input type="number" id="id_do_admin" name="id_do_admin" value="<?php echo $resultado['id_do_admin']; ?>"><br><br>

    <label for="detalhes">Detalhes:</label><br>
    <input type="text" id="detalhes" name="detalhes" value="<?php echo $resultado['detalhes']; ?>"><br><br>

    <label for="status">Status:</label><br>
    Pendente
    <input type="radio" id="status" name="status" value="Pendente" <?php if($resultado['status'] == 'Pendente') echo 'checked'; ?>> 
    Concluído
    <input type="radio" id="status" name="status" value="Concluido" <?php if($resultado['status'] == 'Concluido') echo 'checked'; ?>> 
    <br><br>

    <input type="submit" name="update" id="submit">
  </form>
</div>

</body>
</html>