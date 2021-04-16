google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Meses', '2021', '2020'],          
          ['Jan', 50, 35],
          ['Fev', 70, 30],
          ['Mar', 10, 40],
          ['Abr', 100, 80],
          ['Mai', 20, 50],
          ['Jun', 15, 30]
        ]);

        var options = {
          chart: {
            title: 'Consultas',
            subtitle: 'Comparativo 1º Semestre',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }