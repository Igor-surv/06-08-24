<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tcc";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
  die("Erro de conexão: ". $conn->connect_error);
}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Consultar o banco de dados para verificar se os dados existem
  $sql = "SELECT * FROM admin WHERE email = '$email' AND senha = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Se os dados existem, permitir o login
    echo "Login realizado com sucesso!";
    // Redirecionar para uma página de destino, por exemplo
    header("Location: home.php");
    exit;
  } else {
    // Se os dados não existem, exibir mensagem de erro
    echo "Erro: Usuário ou senha inválidos.";
  }
}

$conn->close();
?>