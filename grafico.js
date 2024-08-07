google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Disponibilidade', 'Quantidade'],
          ['Disponiveis',     100],
          ['Indisponiveis',     100]
        ]);

        var options = {
          title: 'Produtos disponiveis'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }