<?php
setlocale(LC_TIME, "pe_PE");
date_default_timezone_set('America/Lima');
$fecha=UCfirst(strftime("%A, %d %B %Y"));
$insertar = mysqli_connect("localhost","root","123456",'oniees');
//mysqli_select_db('oniees', $insertar);
?>

<html>

<head>

<?php

$result1=mysqli_query($insertar,"SELECT COUNT(*) as Bueno FROM tb_estadocons WHERE estad_cons = 'B'");
$data1=mysqli_fetch_assoc($result1);
$result2=mysqli_query($insertar,"SELECT COUNT(*) as Regular FROM tb_estadocons WHERE estad_cons = 'R'");
$data2=mysqli_fetch_assoc($result2);
$result3=mysqli_query($insertar,"SELECT COUNT(*) as Malo FROM tb_estadocons WHERE estad_cons = 'M'");
$data3=mysqli_fetch_assoc($result3);



?>
<link rel="shorcut icon" href="../images/oniees.ico">
<script language='JavaScript'>
function uno(src,metodo,color_salida,color_entrada,color_click)
{
	if (metodo=='over')src.bgColor=color_salida;
	else if (metodo=='out')src.bgColor=color_entrada;
	else src.bgColor=color_click;
}

function dos(color_salida1,color_salida2,color_salida3)
{
	var tipo = document.getElementById('estruct_cons').value;
	var tipo1 = document.getElementById('arquitec_cons').value;
	var tipo2 = document.getElementById('instelect_cons').value;
	var tipo3 = document.getElementById('instsanit_cons').value;
	var tipo4 = document.getElementById('estad_cons').value;

	if (tipo=='B')src.bgColor=color_salida1;
	if (tipo=='R')src.bgColor=color_salida2;
	else if (tipo=='M')src.bgColor=color_salida3;

	if (tipo1=='B')src.bgColor=color_salida1;
	if (tipo1=='R')src.bgColor=color_salida2;
	else if (tipo1=='M')src.bgColor=color_salida3;

	if (tipo2=='B')src.bgColor=color_salida1;
	if (tipo2=='R')src.bgColor=color_salida2;
	else if (tipo2=='M')src.bgColor=color_salida3;

	if (tipo3=='B')src.bgColor=color_salida1;
	if (tipo3=='R')src.bgColor=color_salida2;
	else if (tipo3=='M')src.bgColor=color_salida3;

	if (tipo4=='B')src.bgColor=color_salida1;
	if (tipo4=='R')src.bgColor=color_salida2;
	else if (tipo4=='M')src.bgColor=color_salida3;

}

</script>
<title>Observatorio Nacional</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
body {
	background-color: #FFFFFF;
}
</style></head>

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="../js/Chart.bundle.js"></script>
<script src="../js/utils.js"></script>


<body>
<table width="1187" border="0" bordercolor="#FFFFFF">
  <tr>
    <td width="807" rowspan="2"><img src="../images/Logo.png" width="335" height="100"></td>
    </tr>
  <tr>
    <td height="37"><strong>Fecha:</strong></td>
    <td><strong><font face=tahoma><b><?php echo $fecha ?></b></font></strong></td>
  </tr>
</table>
<p>&nbsp;</p>
<tr>
<p>
<center>
  <H1>Estado de Conservaci&oacute;n</H1>

  <table height="75" border="0" cellpadding="5">
  <tr>
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

				//	while($fila = mysqli_fetch_array($rs_red)){
					 //echo $fila["valor"]."," ;

						<?php echo $data1['Bueno'];?>,
						<?php echo $data2['Regular'];?>,
						<?php echo $data3['Malo'];?>,

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
					'Bueno <?php echo $data1['Bueno'];?>,',
					'Regular <?php echo $data2['Regular'];?>',
					'Malo <?php echo $data3['Malo'];?>',
					'Otros',

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
    </tr>
	<tr bgcolor="#3498DB">
        <th width="113" >Red Asistencial</th>
        <th width="150">Establecimiento de Salud</th>
        <th width="80">Arquitectura</th>
		<th width="80">Estructura</th>
		<th width="173">Instalaciones El&eacute;ctricas</th>
        <th width="173">Instalaciones Sanitarias</th>
        <th width="173">Estado General</th>

	</tr>


<!--	<tr bgcolor="#E5E5E5" onMouseOver="uno(this,'over','#CCFFCC','','');" onMouseOut="uno(this,'out','','#E5E5E5','');" onMouseDown="uno(this,'down','','','#E8BD8E');">
			<td ><h4></h4></td>
			<td >&nbsp;</td>
		<td align="center" >&nbsp;</td>
			<td align="right" >&nbsp;</td>
	</tr>-->



</center>
<?php
$sql_infraes = "SELECT tb_establecimiento.cod_renipres ,nom_estab, red_estab, estruct_estab, arquitec_estab, instelect_estab, instsanit_estab, estad_cons FROM tb_establecimiento inner join tb_estadocons where tb_establecimiento.cod_renipres = tb_estadocons.cod_renipres";


$rs_red = mysqli_query($insertar, $sql_infraes);
$nf_infraes = mysqli_num_fields($rs_red);
for ($i_red = 0; $i_red < $nf_infraes; $i_red++ ) {
?>
<?php
while($fila = mysqli_fetch_array($rs_red)){
?>


<tr bgcolor="#E5E5E5" onMouseOver="uno(this,'over','#CCFFCC','','');" onMouseOut="uno(this,'out','','#E5E5E5','');" onMouseDown="uno(this,'down','','','#E8BD8E');">
			<td ><?php echo $fila["red_estab"];?></td>
            <td ><?php echo $fila["nom_estab"];?></td>
            <td align="center"><?php echo $fila["estruct_estab"];?></td>
            <td align="center"><?php echo $fila["arquitec_estab"];?></td>
            <td align="center"><?php echo $fila["instelect_estab"];?></td>
            <td align="center"><?php echo $fila["instsanit_estab"];?></td>
            <td align="center"><?php echo $fila["estad_cons"];?></td>

<?php
	}
	}

?>

</table>




</center>
</body>

</html>
