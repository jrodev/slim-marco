<?php
setlocale(LC_TIME, "pe_PE");
date_default_timezone_set('America/Lima');
$fecha=UCfirst(strftime("%A, %d %B %Y"));
$insertar = mysql_connect("localhost","root","admin812");
mysql_select_db('oniees', $insertar);

$cod = $_REQUEST["cod"];
echo $cod ;


if(isset($_REQUEST["foto1"])){
	var_dump($_REQUEST["foto1"]);
	}


?>

<form action="../reporte3.php" enctype="multipart/form-data">

Foto
<input type="file" name="foto1"><br />
<input type="submit">
</form>
