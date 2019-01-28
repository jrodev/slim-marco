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
<link rel="shorcut icon" href="../images/oniees.ico">
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
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
?>

</style></head>
<body>
<table width="1187" border="0" bordercolor="#FFFFFF">
  <tr>
    <td width="807" rowspan="2"><img src="../images/Logo.png" width="335" height="90"></td>
    </tr>
  <tr>
  	<td height="37" align="right" ><strong>Fecha:</strong></td>
    <td align="right"><strong><font face=tahoma><b><?php echo $fecha ?></b></font></strong></td>
  </tr>
</table>
<tr>
<p>
<center>
  <H1>Estado de la Infraestructura</H1>
  <table height="75" border="0" cellpadding="5">
  	<tr>
  		<td width="100" colspan="2">Buscar Establecimiento por C&oacute;digo </td>
        <td width="100"><input name="cod_renipres" type="text" /></td>
     </tr>
	<tr bgcolor="#3498DB" >
        <th width="200">Establecimiento de Salud</th>
        <th width="113">C&oacute;digo</th>
		<th width="173">Categor&iacute;a</th>
		<th width="130">Departamento</th>
        <th width="130">Provincia</th>
        <th width="130">Distrito</th>
        <th width="80">Estado</th>
        <th width="100">Opci&oacute;n</th>
	</tr>


<?php

$sql_infraes = "SELECT tb_establecimiento.cod_renipres ,nom_estab, red_estab, ano_estab, camas_estab, codcat_estab, instit_estab, codigo, areaconsgeo, areaterrgeo, invtot_estab, direcc_estab, nomprov_estab, nomdist_estab FROM tb_establecimiento inner join tb_geolocaliza where tb_establecimiento.cod_renipres = tb_geolocaliza.cod_renipres and codigo=".$region;



$rs_red = mysql_query( $sql_infraes, $insertar);

//$rs_red = mysql_query( 'select * from tb_establecimiento WHERE codregion_estab='.$region);



$nf_infraes = mysql_num_fields($rs_red);
for ($i_red = 0; $i_red < $nf_infraes; $i_red++ ) {
?>

<?
$n=0;
$total+0;
//while($fila = mysql_fetch_array($rs)){

while($fila = mysql_fetch_array($rs_red)){
// 	if($n%2==0){
		?>

    <tr bgcolor="#E5E5E5" onMouseOver="uno(this,'over','#CCFFCC','','');" onMouseOut="uno(this,'out','','#E5E5E5','');" onMouseDown="uno(this,'down','','','#E8BD8E');">
			<td class="texto_migaja" font face="tahoma"><?php echo $fila["nom_estab"];?></td>
           <td font face="tahoma" align="center"><?php echo $fila["cod_renipres"];?></td>
			<td font face="tahoma"><?php echo $fila["codcat_estab"];?></td>
            <td align="center" font face="tahoma"><?php echo $fila["nomdepar_estab"];?></td>
            <td align="center" font face="tahoma"><?php echo $fila["nomprov_estab"];?></td>
            <td align="center" font face="tahoma"><?php echo $fila["nomdist_estab"];?></td>
            <td font face="tahoma"><?php echo $fila["estado"];?></td>
            <td align="center" font face="tahoma"><a href="frmIngresoFicha.php?cod="><form name="form2" method="post" action="">
              <input type="submit" name="button2" id="button2" value="Ver Ficha"></form></a></td>
            <?
$total=$total + 1;
?>
            </td>
	</tr>

        <?
	}
	}
?>
<tr bgcolor="#E5E5E5" onMouseOver="uno(this,'over','#CCFFCC','','');" onMouseOut="uno(this,'out','','#E5E5E5','');" onMouseDown="uno(this,'down','','','#E8BD8E');">

		   </td>
	</tr>
	<tr>
		<td >&nbsp;</td>
        <td >&nbsp;</td>
		<td >&nbsp;</td>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
        <td colspan="2"><form name="form1" method="post" action="">
          <input type="submit" name="exporta" id="button" value="Exportar a Excel">
        </form></td>

</tr>

</table>


 <? if(isset($_POST["exporta"])){
	 if(!empty($cod_renipres)){
		 $filename = "establecimientos.xls";
		 header("Content-Type: application/vnd.ms-excel");
		 header("Content-Disposition: attachment; filename=".$filename);
		 $mostrar_columnas = false;

		 foreach($cod as $cod_renipres){
			 if(!$mostrar_columnas){
				 echo implode("\t", array_keys($cod)). "\n";
				 $mostrar_columnas = true;
			 }
			 echo implode("\t", array_values($cod)). "\n";
		 }

	 }else{
		 echo 'No hay datos a exportar';
	 }
	 exit;
 }

 ?>




</center>
</body>

</html>
