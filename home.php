<?php
include 'config.php';

$sql = "SELECT COUNT(*) AS indisponiveis FROM itens";
$result = mysqli_query($conn, $sql);
$indisponiveis = mysqli_fetch_assoc($result)['indisponiveis'];

$sql = "SELECT COUNT(*) AS disponiveis FROM itens";
$result = mysqli_query($conn, $sql);
$disponiveis = mysqli_fetch_assoc($result)['disponiveis'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="home.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Produtos em geral', ''],

          ['Disponiveis', <?php echo $disponiveis ?>],
          ['Indisponiveis', <?php echo $indisponiveis?>],
        ]);

        var options = {
          title: 'Produtos em estoque',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['', 'Lucro', 'Despesas'],
          ['2013',  1000,      400]
        ]);

        var options = {
          title: 'Company Performance',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
      </script>

    <title>Home</title>

</head>
<body>
    <aside>
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
    </aside>
    
    <div class="bloco">
        <h1>Inicio</h1>
    </div>

    <div class="container">
        <div class="destaque">
            <h2>Produtos com estoque baixo</h2>
            <h3></h3>
            <h2>Notas</h2>
        </div>
        </div>

    <div class="container">
    <div class="grafico1">
      <div id="piechart_3d" style="width: 650px; height: 400px;"></div>
    </div>

    <div class="grafico2">
      <div id="chart_div" style="width: 650px; height: 400px;"></div>
    </div>
    </div>

</body>
</html>