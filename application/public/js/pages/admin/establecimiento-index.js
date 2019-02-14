$(function() {

    /* DataTables Plugin*/
    $('#tblEstablecimiento').DataTable({
        "scrollX": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
        "columnDefs": [{
            "targets": 0,
            "createdCell": function (nTd, sCol, aData, iRow, iCol) {
                console.log(arguments);
                $(nTd).html("<a href='"+App.baseUrl+"establecimientos/"+sCol+"'>" + sCol + "</a>");
            }
        }],
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excel',
            text: 'Guardar como Excel',
            exportOptions: { modifier: { page: 'current' } }
        }]
    });

    var colors = {'Malo':'danger', 'Regular':'warning', 'Bueno':'success'}
        , fncCell = function (nTd, sCol, aData, iRow, iCol) {
            console.log(arguments);
            $(nTd).html("<span class='text-" + colors[sCol] + "'>" + sCol + "</span>");
        }
    ;
    $('#tblEstados').DataTable({
        //"scrollX": true,
        "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
        "columnDefs": [
            { "targets": 2, "createdCell": fncCell },
            { "targets": 3, "createdCell": fncCell },
            { "targets": 4, "createdCell": fncCell },
            { "targets": 5, "createdCell": fncCell },
            { "targets": 6, "createdCell": fncCell }
        ],
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

    $(function(){
        var idTab = window.location.hash.substr(1);
        console.log('hash idTab:',idTab);
        if($.trim(idTab)){ $("#"+idTab).trigger('click'); }
    });
});
