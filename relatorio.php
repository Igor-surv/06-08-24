<?php
// Conexão com o banco de dados
include_once 'config.php';

// Quantidade de produtos cadastrados
$stmt = $conn->prepare("SELECT SUM(quantidade) AS total FROM itens");
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$quantidade_produtos = isset($row['total']) ? $row['total'] : 0;

// Itens que sairam
$stmt = $conn->prepare("SELECT SUM(quantidade) AS total FROM itens WHERE disponiveis = ?");
$stmt->bind_param("i", $disponiveis); // "i" stands for integer
$disponiveis = 0;
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$itens_fora = isset($row['total']) ? $row['total'] : 0;

// Clientes totais
$stmt = $conn->prepare("SELECT COUNT(nome) AS total FROM clientes");
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$clientes_totais = isset($row['total']) ? $row['total'] : 0;

// Pedidos totais
$stmt = $conn->prepare("SELECT COUNT(status) AS total FROM pedidos");
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$pedidos_totais = isset($row['total']) ? $row['total'] : 0;

// Pedidos em andamento
$stmt = $conn->prepare("SELECT COUNT(status) AS total FROM pedidos WHERE status = ?");
$stmt->bind_param("s", $status); // "s" stands for string
$status = 'Pendente';
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$quantidade_pedidosPendentes = isset($row['total']) ? $row['total'] : 0;

// Recibos
$stmt = $conn->prepare("SELECT COUNT(emitente) AS total FROM recibo");
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$recibos_totais = isset($row['total']) ? $row['total'] : 0;

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tela de relatorios</title>
  <link rel="stylesheet" href="relatorio.css">
</head>
<body>

    <div class="menu">
          <ul>
            <li><a href="home.php">Inicio</a></li>
            <li><a href="pedidos_pendentes.php">Pedidos</a></li>
            <li><a href="estoque.php">Estoque</a></li>
            <li><a href="financeiro.php">Financeiro</a></li>
            <li><a href="relatorio.php">Relatorios</a></li>
            <li><a href="clientes.php">Clientes</a></li>
            <li><a href="admin.php">Administradores</a></li>
          </ul>
    </div>

<h1>Tela de Relatórios</h1>

<button class="gerarRecibo"><a href="recibo.html">Gerar recibo</a></button>

  <div class="container">
    
    <div class="produtos">
      <h2>Produtos</h2> <!--Produtos totais no estoque-->
      <p><?php echo $quantidade_produtos; ?></p>
    </div>

    <div class="itens">
      <h2>Itens que sairam</h2> <!--Produtos que sairam-->
      <p><?php echo $itens_fora; ?></p>
    </div>

    <div class="clientes">
      <h2>Clientes totais</h2> <!--Quantidade de clientes totais-->
      <p><?php echo $clientes_totais; ?></p>
    </div>

    <div class="vendas">
      <h2>Pedidos totais</h2> <!--Quantidade de pedidos totais-->
      <p><?php echo $pedidos_totais; ?></p>
    </div>

    <div class="andamento">
      <h2>Pedidos pendentes</h2> <!--Quantidade de pedidos em andamento-->
      <p><?php echo $quantidade_pedidosPendentes; ?></p>
    </div>

    <div class="recibo">
      <h2>Recibos omitidos</h2> <!--Quantidade de recibos omitidos-->
      <p><?php echo $recibos_totais; ?></p>
    </div>
  </div>

</body>
</html>