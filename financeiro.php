<?php
    require_once 'config.php';

    $sql = "SELECT * FROM fornecedores ORDER BY id ASC";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    if (mysqli_stmt_errno($stmt)) {
        die("Erro ao executar a consulta: ". mysqli_stmt_error($stmt));
    }
    $resultFornecedores = mysqli_stmt_get_result($stmt);

    $sql = "SELECT * FROM recibo ORDER BY data DESC LIMIT 5";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    if (mysqli_stmt_errno($stmt)) {
        die("Erro ao executar a consulta: ". mysqli_stmt_error($stmt));
    }
    $resultRecibos = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Financeiro</title>
    <link rel="stylesheet" type="text/css" href="financeiro.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('graphic'));

        chart.draw(data, options);
      }
    </script>
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

<div class="container">
    <h1>Financeiro</h1>

    <div class="resumo">
      <h2>Resumo financeiro</h2>
      <p>Receita total: #</p>
      <p>Lucro dos pedidos: #</p>
      <p>Despesa dos fornecedores: #</p>
      <p>Valor do estoque completo: #</p>
    </div>

    </div>
    <div class="grafico">
    <div id="graphic" style="width: 55vw; height: 500px"></div>
    </div>

    <div class="recibos">
  <h2>Recibos recentes</h2>
  <table>
    <thead>
      <tr>
        <th>Emitente</th>
        <th>Cliente</th>
        <th>Pedido</th>
        <th>Itens</th>
        <th>Valor</th>
        <th>Data</th>
      </tr>
    </thead>

    <tbody>
      <?php
          while($row = mysqli_fetch_array($resultRecibos)){
            $data = date('d/m/Y', strtotime($row['data']));
            echo "<tr>";
            echo "<td>".$row['emitente']."</td>";
            echo "<td>".$row['pedido']."</td>";
            echo "<td>".$row['codigo']."</td>";
            echo "<td>".$row['nome']."</td>";
            echo "<td>".$row['valor']."</td>";
            echo "<td>".$data."</td>";
            } ?>;
      </tbody>
    </table>
  </div>

  <table class="fornecedores"> 
    <button class="add"> <a href="addFornecedor.php">Adicionar fornecedor </a></button>
      <thead>
        <tr>
          <th>Nome</th>
          <th>CPF/CNPJ</th>
          <th>Endereço</th>
          <th>Valor gasto</th>
          <th>Contato</th>
          <th>Ações</th>
        </tr>
      </thead>

      <tbody id="fornecedor-lista"> 
        <?php
          while($row = mysqli_fetch_array($resultFornecedores)){
            echo "<tr>";
            echo "<td>".$row['nome']."</td>";
            echo "<td>".$row['cpf-cnpj']."</td>";
            echo "<td>".$row['endereco']."</td>";
            echo "<td>".$row['preco']."</td>";
            echo "<td>".$row['contato']."</td>";
            echo "<td>
              <a class='btn btn-sm btn-danger' href='editFornecedor.php?nome=".$row['nome']."' title='Editar'>
                <img src='https://cdn-icons-png.flaticon.com/512/1828/1828911.png' width='18px' height='18px'>
              </a>
              </td>";
            } ?>;
        </tbody>
    </table>
</div>

<footer>
  <p>Site criado por <a href="#">InovaGest</a></p>
</footer>
</body>
</html>