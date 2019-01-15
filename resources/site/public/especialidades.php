<?PHP
setlocale(LC_TIME, "pe_PE");
date_default_timezone_set('America/Lima');
$fecha=UCfirst(strftime("%A, %d %B %Y")); 
$insertar = mysql_connect("localhost","root","admin812");
mysql_select_db('oniees', $insertar);
$region = $_REQUEST["region"];



?>

<html>

<head>
<link rel="shorcut icon" href="images/oniees.ico">
<script language='JavaScript'>
function uno(src,metodo,color_salida,color_entrada,color_click)
{
	if (metodo=='over')src.bgColor=color_salida;
	else if (metodo=='out')src.bgColor=color_entrada;
	else src.bgColor=color_click;
}
</script>
<title>Observatorio Nacional</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div class="row" style="margin: 16px; text-align: center;">
<h1><div class="o_horizontal_separator">PERSONAL DE SALUD</div></h1>
</div>


<table height="75" border="1" cellpadding="2" align="center">
  		<tr>
        	<td>Profesionales de Salud</td>
        	<td>Cantidad</td>
        <tr>
        <td ><label>
       	<select name="prof_salud">
         	<option value="1">&nbsp;</option>
         	<option value="2">M&eacute;dicos</option>
         	<option value="3">Obstetrices</option>
         	<option value="4">Odont&oacute;logos</option>
         	<option value="5">Enfermeras</option>
         	<option value="6">Qu&iacute;micos Farmac&eacute;uticos</option>
         	<option value="7">Nutricionistas</option>
         	<option value="8">Auxiliares</option>
         	<option value="9">Administrativos</option>
         	<option value="10">Choferes</option>
         	<option value="11">Serumistas M&eacute;dicos</option>
         	<option value="12">Serumistas Enfermeros</option>
         	<option value="13">Serumistas Obstetrices</option>
         	<option value="14">Psic&oacute;logos</option>
         	<option value="15">Trabajadores Sociales</option>
         	<option value="16">T&eacute;cnico de Medicina F&iacute;sica y Rehabilitaci&oacute;n</option>
         	<option value="17">T&eacute;cnicos de Farmacia</option>
         	<option value="18">T&eacute;cnicos de Laboratorio</option>
         	<option value="19">T&eacute;cnicos Radi&oacute;logos</option>
         	<option value="20">T&eacute;cnicos en Enfermer&iacute;a</option>
         	<option value="21">Varios Profesionales en Salud</option>
      	</select>
     </label>
          </td>
          <td colspan="1" align="right"><input type=text name="direcc_estab"  maxlenght="5"/></td>
        <tr>
        	<td font face="tahoma"><a href="reporte3.php?cod=">Agregar otro profesional</a></td>
        </tr>
        <tr>&nbsp;</tr>
        <tr>&nbsp;</tr>
        <tr>&nbsp;</tr>
        
	</tr>
    
	
</body>

</html>