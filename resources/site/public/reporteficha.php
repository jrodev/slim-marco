<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
$insertar = mysql_connect("localhost","root","admin812");
//mysql_select_db($database_insertar, $insertar);
mysql_select_db('oniees', $insertar);
$cod = $_REQUEST["cod"];
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shorcut icon" href="../images/oniees.ico">
<head>
<link rel="stylesheet" type="text/css" href="../css/estilo2.css">


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

<script src="../jsImagen.js"></script>


</head>

<div class="row" style="margin: 7px; text-align: center;">
<h1><div class="o_horizontal_separator"> FICHA T&Eacute;CNICA DEL ESTABLECIMIENTO DE SALUD</div></h1>
</div>

<?
$query_ins = "SELECT * FROM tb_establecimiento where cod_renipres=".$cod ;

$rs_red = mysql_query($query_ins, $insertar);

$nf_infraes = mysql_num_fields($rs_red);

for ($i_red = 0; $i_red < $nf_infraes; $i_red++ ) {
?>

<?php

//while($fila = mysql_fetch_array($rs_red)){

while($fila = mysql_fetch_array($rs_red)){

?>


<table width="365" border=0 height="136">
 <tr>
  	<td>Foto del Establecimiento
  	  <form id="form1" name="form1" method="post" action="">
  	    <input type="image" name="imageField" id="imageField" src="../images/comision.jpg" />
    </form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 </tr>
</table>

<table width="1450" border="0" >
  <tr>
    <td colspan="10" bgcolor="#0033CC" bordercolor="#FFFFFF" style="color:rgba(255,255,255)">DATOS GENERALES</td>
  </tr>

  <tr>
    <td>Codigo</td>
    <td><input name="cod_renipres" id="cod_renipres" type="text" /><?php echo $fila["cod_renipres"];?></td>
    <td colspan="2">Nombre Establecimiento</td>
    <td colspan="3"><input type=text name="nom_estab" id="nom_estab" maxlenght="20" size="50"/><?php echo $fila["nom_estab"];?></td>
    <td colspan="">Categor&iacute;a</td>
    <td><input type-text name="codcat_estab" id="codcat_estab" maxlenght="20" /><?php echo $fila["codcat_estab"];?></td>
  </tr>

  <tr>
    <td>Direcci&oacute;n</td>
    <td colspan="3"><input type=text name="direcc_estab" id="direcc_estab"  maxlenght="40"/><?php echo $fila["direcc_estab"];?></td>
    <td>Per&iacute;odo</td>
    <td colspan="2"><input type=text name="periodo_estab" maxlength="20" /><?php echo $fila["periodo_estab"];?></td>
    <td colspan="2">Descripci&oacute;n Categoría</td>
    <td><input type=text name="nomcat_estab" maxlength="20"/><?php echo $fila["nomcat_estab"];?></td>
  </tr>

</table>

</br>

<table width="150" border="0">

  <tr>
    <td bgcolor="#0033CC" style="color:rgba(255,255,255)">UBICACI&Oacute;N</td>
    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

    <td bgcolor="#0033CC" style="color:rgba(255,255,255)">RED</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#0033CC" style="color:rgba(255,255,255)">INFORMACI&Oacute;N GENERAL DEL ESTABLECIMIENTO</td>
  </tr>

  <tr>
  	<td>
   	<table width="375" border=0>
    <tr>
            <td width="118">Regi&oacute;n</td>
            <td width="243"><input type=text name="codregion_estab" maxlength="20" /></td>
    </tr>

    <tr>
            <td>Departamento</td>
            <td><input type=text name="nomdepar_estab" maxlength="20"/></td>
    </tr>

    <tr>
    	<td>Provincia</td>
    	<td><input type=text name="nomprov_estab" maxlength="20" /></td>
	</tr>

    <tr>
    	<td>Distrito</td>
    	<td><input type=text name="nomdist_estab" maxlength="20"  /></td>
    </tr>
	</table></td>
<td></td>

    <td>

    <table width="374" border=0>
        <tr>
            <td width="118">Diris / Diresa</td>
            <td width="246"><input type=text name="nomdiresa_estab" maxlength="20"/></td>
        </tr>

        <tr>
            <td>Red</td>
            <td><input type=text name="red_estab" maxlength="20"  /></td>
        </tr>

        <tr>
    		<td>Microred</td>
    		<td><input type=text name="micro_estab" maxlength="20" /></td>
	    </tr>

        <tr>
    		<td>Instituci&oacute;n</td>
    		<td><input type=text name="instit_estab" maxlength="20"  /></td>
    	</tr>

        <tr>
    		<td>&Aacute;rea Geogr&aacute;fica</td>
    		<td width="243"><input type=text name="codareageog_estab" maxlength="20" /></td>
    	</tr>
	</table></td>
	<td></td>

	<td>
	<table width="475" border=0>
        <tr>
            <td width="319">A&ntilde;o puesta en marcha</td>
            <td width="192"><input name="ano_estab" type="text" /></td>
        </tr>

        <tr>
            <td>N° de camas (Internamiento/Hospitalización)</td>
            <td><input name="camas_estab" type="text" /></td>
        </tr>

        <tr>
    		<td>Poblaci&oacute;n Beneficiaria</td>
    		<td><input name="pobbenef_estab" type="text" /></td>
	    </tr>

        <tr>
    		<td>Inversi&oacute;n en Infraestructura</td>
    		<td><input name="invinf_estab" type="text" /></td>
    	</tr>

        <tr>
    		<td>Inversi&oacute;n en Equipamiento</td>
    		<td><input name="invequip_estab" type="text" /></td>
    	</tr>

	</table></td>
	<td></td>
</tr>
</table>

<table width="150" border="0">
	</br>
  	<tr>
    	<td colspan="10" bgcolor="#0033CC" style="color:rgba(255,255,255)">GEOLOCALIZACI&Oacute;N</td>
  	</tr>

  	<tr>
  		<td>
    	<table width="600" border=0>
    	<tr>
            <td width="274">El terreno es propio</td>
            <td width="178"><input type=text name="terrpropio_geog" maxlength="20" /></td>
    	</tr>

  		<tr>
            <td>El terreno cuenta con saneamiento físico legal</td>
            <td><input type=text name="terrsaneageo" maxlength="20" /></td>
    	</tr>

    	<tr>
    		<td>&Aacute;rea del terreno (m2)</td>
    		<td><input name="" type="areaterrgeo" /></td>
		</tr>

    	<tr>
    		<td>&Aacute;rea construída (m2)</td>
    		<td><input name="" type="areaconsgeo" /></td>
    	</tr>

    	<tr>
    		<td>&Aacute;rea libre (m2)</td>
    		<td><input name="arealibgeo" type="text" /></td>
    	</tr>

    	<tr>
    		<td>Superficie del terreno es:</td>
        	<td><input type=text name="superfterrenogeo" maxlength="20" /></td>
    	</tr>

    	<tr>
    		<td>N&uacute;mero de pisos del establecimiento</td>
    		<td><input name="numpisgeo" type="text" /></td>
    	</tr>

</table></td>
<td></td>
<td>

<table width="200" border=0>

</table></td>
<td></td>
<td>

<table width="630" border=0>

        <tr>
            <td>Latitud (Grados Sexagesimales)</td>
            <td><input type=text name="latitudgeo" maxlength="20"/></td>
        </tr>

        <tr>
            <td>Longitud (Grados Sexagesimales)</td>
            <td><input type=text name="longitudgeo" maxlength="20"/></td>
        </tr>

        <tr>
    		<td>Altura (m.s.n.m.)</td>
    		<td><input type=text name="alturageo" maxlength="20"/></td>
	    </tr>

    	<tr>
    		<td>Poblaci&oacute;n actual de la Regi&oacute;n (en miles)</td>
    		<td><input name="pobreggeo" type="text" /></td>
    	</tr>

    	<tr>
    		<td>Poblaci&oacute;n actual del Distrito (en cientos)</td>
    		<td><input name="pobactdisgeo" type="text" /></td>
    	</tr>

   		<tr>
    		<td>&Aacute;rea del Distrito (Km2)</td>
    		<td><input name="areadistgeo" type="text" /></td>
    	</tr>

    	<tr>
    		<td>Densidad poblacional (Hab/Km2)</td>
    		<td><input name="densopoblacgeo" type="text" /></td>
    	</tr>

    	<tr>
    		<td>Accesibilidad</td>
    		<td><input name="accessgeo" type="text" /></td>
    	</tr>

    	<tr>
    		<td>Tipo de camino</td>
    		<td><input name="tipo_cam" type="text" /></td>
    	</tr>

</table></td>

 <table width="1450" border="0">
  </br>
  <tr>
    <td colspan="1" bgcolor="#0033CC" style="color:rgba(255,255,255)">PERSONAL DE ESTABLECIMIENTO DE SALUD</td>
    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td></td>
    <td colspan="3" bgcolor="#0033CC" style="color:rgba(255,255,255)">DISTANCIA Y TIEMPOS DE ACCESO</td>
  </tr>

  <tr>
  <td>
	<table width="600" border=1>
    	<tr>
           	<td align="center">Especialidades</td>
           	<td align="center">Cantidad</td>
    	</tr>

  		<tr>
           	<td  align="center"><input type=text name="periodo_estab" maxlength="20" /></td>
           	<td align="center"><input type=text name="periodo_estab" maxlength="20" / align="right"></td>
    	</tr>

        <tr>
           	<td  align="center"><input type=text name="periodo_estab" maxlength="20" /></td>
           	<td align="center"><input type=text name="periodo_estab" maxlength="20" / align="right"></td>
    	</tr>

    	<tr>
    		<td  align="center"><input type=text name="periodo_estab" maxlength="20" /></td>
           	<td align="center"><input type=text name="periodo_estab" maxlength="20" / align="right"></td>
		</tr>

    	<tr>
    		<td align="center" ><input type=text name="periodo_estab" maxlength="20" /></td>
           	<td align="center"><input type=text name="periodo_estab" maxlength="20" / align="right"></td>
    	</tr>

    	<tr>
    		<td  align="center"><input type=text name="periodo_estab" maxlength="20" /></td>
           	<td align="center"><input type=text name="periodo_estab" maxlength="20" / align="right"></td>
    	</tr>
   	</table></td>
	<td></td>
    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

    <td>
    <table width="600" border=0>
        <tr>
        	 	<td>Distancia (Km) al EESS cercano de mayor categor&iacute;a</td>
           	<td><input name="eess_dist" type="text" /></td>
        </tr>

        <tr>
           <td align>Tiempo (hora) al EESS cercano de mayor categor&iacute;a</td>
           <td><input name="tiempoeess" type="text" /></td>
        </tr>

        <tr>
           <td align>Categoría de EESS mas cercano</td>
           <td><input name="eess_nivelcat" type="text" /></td>
        </tr>

        <tr>
           <td>Distancia al Hospital mas cercano</td>
           <td><input name="hosp_distancia" type="text" /></td>
        </tr>

        <tr>
           <td>Tiempo al Hospital mas cercano</td>
           <td><input name="hosp_tiempo" type="text" /></td>
        </tr>

        <tr>
           <td>Categor&iacute;a del Hospital mas cercano</td>
           <td><input name="hosp_cat" type="text" /></td>
        </tr>

        <tr>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
    	</tr>
        <tr></tr>
      </table>
   	  <td></td>
      <td>
</table></td>
<td></td>
<td>


<table width="1450" border="0">
  </br>
  <tr>
    <td colspan="1" bgcolor="#0033CC" style="color:rgba(255,255,255)">UPSS</td>
    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td></td>
    <td colspan="3" bgcolor="#0033CC" style="color:rgba(255,255,255)">UPS</td>
  </tr>

  <tr>
  <td>
    <table width="600" border=1>
    <tr>
            <td align="center">UPSS &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
            <td align="center"> TOTAL DE AMBIENTES</td>
    </tr>

  	<tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
    </tr>

    <tr>
    	<td>&nbsp;</td>
    	<td>&nbsp;</td>
	</tr>

    <tr>
    	<td>&nbsp;</td>
    	<td>&nbsp;</td>
    </tr>

    <tr>
    	<td>&nbsp;</td>
    	<td>&nbsp;</td>
    </tr>
    </table></td>
    <td></td>

    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

    <td>
    <table width="600" border=1>
        <tr>
            <td align="center">UPS &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
            <td align="center"> TOTAL DE AMBIENTES</td>
        </tr>
   		<tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
    	<td>&nbsp;</td>
    	<td>&nbsp;</td>
	    </tr>

    <tr>
    	<td>&nbsp;</td>
    	<td>&nbsp;</td>
    </tr>

    <tr>
    	<td>&nbsp;</td>
    	<td>&nbsp;</td>
    </tr>

    </table></td>
    <td></td>
    <td><td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>



<table width="1450" border="0">
</br>
  <tr>
    <td colspan="1" bgcolor="#0033CC" style="color:rgba(255,255,255)">ESTRUCTURA DEL ESTABLECIMIENTO</td>
    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td></td>
    <td colspan="3" bgcolor="#0033CC" style="color:rgba(255,255,255)">CARACT. T&Eacute;C. EL&Eacute;CT.</td>
   </tr>

  <tr>
  	<td>
  	<table width="600" border=0>
    <tr>
            <td>Estructura del techo</td>
            <td><input type=text name="codregion_estab" maxlength="20" /></td>
    </tr>

    <tr>
            <td>Cobertura del techo</td>
            <td><input type=text name="nomdepar_estab" maxlength="20"/></td>
    </tr>

    <tr>
    	<td>Estructura de la pared</td>
    	<td><input type=text name="nomprov_estab" maxlength="20" /></td>
	</tr>

    <tr>
    	<td>Estructura del piso</td>
    	<td><input type=text name="nomdist_estab" maxlength="20"  /></td>
    </tr>

    <tr>
    	<td>Fuente de Energ&iacute;a El&eacute;ctrica</td>
    	<td><input type=text name="nomdist_estab" maxlength="20"  /></td>
    </tr>

    <tr>
    	<td>Fuente de Agua</td>
    	<td><input type=text name="nomdist_estab" maxlength="20"  /></td>
    </tr>

    <tr>
    	<td>Red de Desag&ucirc;e</td>
    	<td><input type=text name="nomdist_estab" maxlength="20"  /></td>
    </tr>
    </table></td>
<td></td>
    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

    <td>
    <table width="600" border=0>
        <tr>
            <td >Potencia instalada (Kw)</td>
            <td ><input type=text name="potenciainst" maxlength="20"/></td>
        </tr>

        <tr>
            <td>M&aacute;xima demanda (Kw)</td>
            <td><input type=text name="maxdemanda" maxlength="20"  /></td>
        </tr>

        <tr>
    		<td>Potencia contratada (Kw)</td>
    		<td><input type=text name="potenciacont" maxlength="20" /></td>
	    </tr>

        <tr>
    		<td>Tarifa El&eacute;ctrica (S/.)</td>
    		<td><input type=text name="tarifa_elect" maxlength="20"  /></td>
    	</tr>

        <tr>
    		<td>Costo Kw</td>
    		<td width="243"><input type=text name="costokw" maxlength="20" /></td>
    	</tr>

        <tr>
    		<td>Cantidad de pozos a tierra</td>
    		<td width="243"><input type=text name="cant_pozos" maxlength="20" /></td>
    	</tr>

        <tr>
    		<td>Costo Kvar/h</td>
    		<td width="243"><input type=text name="costokvar" maxlength="20" /></td>
    	</tr>
       </table></td>
	<td></td>
    </tr>
</table>

<table width="1450" border="0">
<td>&nbsp;</td>
    <tr>
    	<td colspan="1" bgcolor="#0033CC" style="color:rgba(255,255,255)">VULNERABILIDAD</td>
    	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    	<td colspan="3" bgcolor="#0033CC" style="color:rgba(255,255,255)">RESIDUOS S&Oacute;LIDOS</td>
     </tr>
        <tr>
        <td>
        <table width="600" border=0>
        	<tr>
            	<td width="319">Cerca a</td>
            	<td width="192"><input name="ano_estab" type="text" /></td>
        	</tr>

        	<tr>
            	<td>N° de calificaci&oacute;n ISH</td>
            	<td><input name="camas_estab" type="text" /></td>
        	</tr>

        	<tr>
    			<td>A&ntilde;o de calificaci&oacute;n ITSE - Salud</td>
    			<td><input name="pobbenef_estab" type="text" /></td>
	    	</tr>

        	<tr>
    			<td>A&ntilde;o de Estudios de Vulnerabilidad</td>
    			<td><input name="invinf_estab" type="text" /></td>
    		</tr>

            <tr>
    			<td>&nbsp;</td>
    			<td></td>
    		</tr>

            <tr>
    			<td>&nbsp;</td>
    			<td></td>
    		</tr>

            <tr>
    			<td>&nbsp;</td>
    			<td></td>
    		</tr>

            <tr>
    			<td>&nbsp;</td>
    			<td></td>
    		</tr>
          </table></td>
		<td></td>
    <td>
    <table width="600" border=0>
    <tr>
            <td >Biocontaminados (Kg.)</td>
            <td ><input type=text name="codregion_estab" maxlength="20" /></td>
    </tr>

    <tr>
            <td>Comunes (Kg.)</td>
            <td><input type=text name="nomdepar_estab" maxlength="20"/></td>
    </tr>

    <tr>
    	<td>Especiales (Kg.)</td>
    	<td><input type=text name="nomprov_estab" maxlength="20" /></td>
	</tr>

    <tr>
    	<td>Tipo de tratamiento de residuos</td>
    	<td><input type=text name="nomdist_estab" maxlength="20"  /></td>
    </tr>

    <tr>
    	<td>Operatividad</td>
    	<td><input type=text name="nomdist_estab" maxlength="20"  /></td>
    </tr>

    <tr>
    	<td>Costo unitario de residuos (S /Kg.)</td>
    	<td><input type=text name="nomdist_estab" maxlength="20"  /></td>
    </tr>

    <tr>
    	<td>Costo mensual de traslados de los residuos</td>
    	<td><input type=text name="nomdist_estab" maxlength="20"  /></td>
    </tr>

    <tr>
    	<td>Ubicaci&oacute;n del relleno sanitario</td>
    	<td><input type=text name="nomdist_estab" maxlength="20"  /></td>
    </tr>
</table></td>

<table width="1450" border="0">
</br>
  <tr>
 	<td colspan="1" bgcolor="#0033CC" style="color:rgba(255,255,255)">REDES DE COMUNICACI&Oacute;N</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td colspan="3" bgcolor="#0033CC" style="color:rgba(255,255,255)">ESTADO DE CONSERVACI&Oacute;N</td>
  </tr>

  <tr>
  <td>
  <table width="600" border=0>
        <tr>
            <td >Nombre del operador telef&oacute;nico</td>
            <td ><input type=text name="potenciainst" maxlength="20"/></td>
        </tr>

        <tr>
            <td>Nombre del operador de Internet</td>
            <td><input type=text name="maxdemanda" maxlength="20"  /></td>
        </tr>

        <tr>
    		<td>Cuenta con radio</td>
    		<td><input type=text name="potenciacont" maxlength="20" /></td>
	    </tr>

        <tr>
    		<td>Nombre del operador de cable</td>
    		<td><input type=text name="tarifa_elect" maxlength="20"  /></td>
    	</tr>
     </table></td>
	<td></td>


	<td>
    <table width="600" border=0>

        <tr>
            <td>Estado de Arquitectura</td>
            <td><input name="arq" type="text" /></td>
            </tr>
    	<tr>
            <td>Estado de la Estructura</td>
            <td><input name="estruct" type="text" /></td>
        </tr>

        <tr>
    		<td>Estado de las Instalaciones El&eacute;ctricas</td>
    		<td><input name="instelect" type="text" /></td>
	    </tr>

        <tr>
    		<td>Estado de Instalaciones Sanitarias</td>
    		<td><input name="instsanit" type="text" /></td>
        </tr>
    </table>
<td></td>
      <td>
</table></td>
<td></td>

<table width="650" border=0>
<tr>
     <td width="500" height="38" colspan="2"><Center><input type="submit" name="accion" value="Grabar"></Center></td>
     <td><label>
     <input type="submit" name="Submit" value="Retornar" onClick="javascript:window.history.back()">
     </label></td>
     </tr>
</table>

<?
}
}
?>
</body>



</html>
