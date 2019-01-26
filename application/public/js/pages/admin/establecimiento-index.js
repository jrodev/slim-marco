$(document).ready(function() {

    /* DataTables Plugin*/
    $('#tblEstablecimiento').DataTable({
        "scrollX": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    $('#tblEstados').DataTable({
        //"scrollX": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    // Pie Grafico
    window.chartColors = {
    	red: 'rgb(255, 99, 132)', //orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)', //purple: 'rgb(153, 102, 255)',
    	green: 'rgb(75, 192, 192)'//, blue: 'rgb(54, 162, 235)', grey: 'rgb(201, 203, 207)'
    };
    var aData = [
        $('td.status-Malo').length,
        $('td.status-Regular').length,
        $('td.status-Bueno').length
    ];
    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: aData,
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.yellow,
                    window.chartColors.green
                ],
                label: 'Dataset 1'
            }],
            labels: [ 'Malo', 'Regular', 'Bueno' ]
        },
        options: {
            responsive: true
        }
    };

    window.onload = function() {
        var ctx = document.getElementById('chart-area').getContext('2d');
        window.myPie = new Chart(ctx, config);
    };

});
