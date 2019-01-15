<?php
setlocale(LC_TIME, "pe_PE");
//date_default_timezone_set('pe_PE');
date_default_timezone_set('America/Lima');
$fecha=UCfirst(strftime("%A, %d %B %Y")); 
$insertar = mysql_connect("localhost","root","admin812");
mysql_select_db('oniees', $insertar);

$region = $_REQUEST["region"];



$sql_infraes = "SELECT * FROM tb_establecimiento WHERE codregion_estab=".$region;
$rs_red = mysql_query( $sql_infraes, $insertar);


?>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="js/Chart.bundle.js"></script>
<script src="js/utils.js"></script>


<body>
	<div id="canvas-holder" style="width:40%">
		<canvas id="chart-area"></canvas>
	</div>

	<script>
		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
					<?php 
				//	while($fila = mysql_fetch_array($rs_red)){ 
					 //echo $fila["valor"]."," ;
					?>
						20,
						30,
						50,
						20,
					<?php 
						//}
					?>
					],
					backgroundColor: [
						window.chartColors.green,
						window.chartColors.orange,
						window.chartColors.red,
						window.chartColors.blue,
						
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Bueno',
					'Regular',
					'Malo',
					'Ninguno',
					
				]
			},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
</body>


