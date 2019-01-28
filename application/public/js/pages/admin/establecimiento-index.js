$(function() {

    /* DataTables Plugin*/
    $('#tblEstablecimiento').DataTable({
        "scrollX": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excel',
            text: 'Guardar como Excel',
            exportOptions: { modifier: { page: 'current' } }
        }]
    });

    $('#tblEstados').DataTable({
        //"scrollX": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
        dom: 'Bfrtip',
        buttons: [/*'copy',*/ 'csv', 'excel']
    });

    // Pie Grafico
    var aData = [
            $('td.status-Malo').length,
            $('td.status-Regular').length,
            $('td.status-Bueno').length
        ]
        , oColors = {
            red: 'rgb(255, 99, 132)', //orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)', //purple: 'rgb(153, 102, 255)',
        	green: 'rgb(75, 192, 192)'//, blue: 'rgb(54, 162, 235)', grey: 'rgb(201, 203, 207)'
        }
        , config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: aData,
                    backgroundColor: [oColors.red, oColors.yellow, oColors.green],
                    label: 'Dataset 1'
                }],
                labels: [ 'Malo', 'Regular', 'Bueno' ]
            },
            options: { responsive: true }
        }
    ;

    //window.onload = function() {
    var ctx = document.getElementById('chart-area').getContext('2d');
    window.myPie = new Chart(ctx, config);
    //};

});
