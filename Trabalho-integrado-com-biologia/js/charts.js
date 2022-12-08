function Grafico(result) {
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawMaterial);
    
    function drawMaterial() {
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Data');
          data.addColumn('number', 'Quantidade');
            result.forEach(element => {
                if (element['dt'] != null && element['total'] != 0) {
                    data.addRows([[
                        element["dt"],    
                        parseFloat(element["total"])
                    ]]);
                }
            });
    
          var options = {
            title: 'Monitoramentos',
          };
    
          var materialChart = new google.charts.Bar(document.getElementById('grafico'));
          materialChart.draw(data, options);
        }
    }