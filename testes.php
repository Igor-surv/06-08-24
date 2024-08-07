<?php 

require_once ("config.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="listar.php" method="get" accept-charset="utf-8">
    <input type="text" name="nome" placeholder="Nome do administrador"><br>
    <input type="number" name="cpf" placeholder="CPF"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <input type="phone" name="telefone" placeholder="Telefone"><br>
    <input type="password" name="senha" placeholder="Senha"><br>
    <input type="submit" value="Cadastrar">
</body>
</html>

