<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
$insertar = mysqli_connect("localhost","root","123456",'oniees');
//mysqli_select_db($database_insertar, $insertar);
//mysqli_select_db('oniees', $insertar);
$query_ins = "SELECT * FROM tb_establecimiento";
$ins = mysqli_query($insertar,$query_ins) or die(mysqli_error());
$row_ins = mysqli_fetch_assoc($ins);
$totalRows_ins = mysqli_num_rows($ins);
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shorcut icon" href="images/oniees.ico">
<head>
<link rel="stylesheet" type="text/css" href="css/estilo2.css">

<script  language='JavaScript'>
function calcularEstado(){
	//var modurl = "consultar_ruc.php?myRand="+myRand;
	var estruct_eess = document.getElementById('estruct_estab').value;
	var arq_eess = document.getElementById('arquitec_estab').value;
	var elect_eess = document.getElementById('instelect_estab').value;
	var sanit_eess = document.getElementById('instsanit_estab').value;
	//var valor = document.getElementById('subtotal_doc').value;
	if ( estruct_estab == "B" & arquitec_estab=="B" & instelect_estab=="B" & instsanit_estab=="B") {
		document.getElementById('estad_cons').value = "B";
	}
	if ( estruct_estab == "M" & arquitec_estab=="M" & instelect_estab=="M" & instsanit_estab=="M") {
		document.getElementById('estad_cons').value = "M";
	}
	if ( estruct_estab == "R" & arquitec_estab=="R" & instelect_estab=="R" & instsanit_estab=="R") {
		document.getElementById('estad_cons').value = "R";

	if ( estruct_estab == "B" & arquitec_estab=="R" & instelect_estab=="R" & instsanit_estab=="R") {
		document.getElementById('estad_cons').value = "R";
	}
	
	if ( estruct_estab == "M" & arquitec_estab=="R" & instelect_estab=="R" & instsanit_estab=="R") {
		document.getElementById('estad_cons').value = "R";
	}
	
	if ( estruct_estab == "B" & arquitec_estab=="B" & instelect_estab=="R" & instsanit_estab=="R") {
		document.getElementById('estad_cons').value = "B";
	}
	
	if ( estruct_estab == "B" & arquitec_estab=="M" & instelect_estab=="R" & instsanit_estab=="R") {
		document.getElementById('estad_cons').value = "R";
	}
	
	if ( estruct_estab == "B" & arquitec_estab=="M" & instelect_estab=="R" & instsanit_estab=="R") {
		document.getElementById('estad_cons').value = "R";
	}
	
	
}


</script

><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

<script src="jsImagen.js"></script>

</head>

<div class="row" style="margin: 16px; text-align: center;">
<h1><div class="o_horizontal_separator"> FICHA TÉCNICA DEL ESTABLECIMIENTO DE SALUD</div></h1>
</div>
<div>
<table width="1500" border="0" >
  <tr>
    <td colspan="10" bgcolor="#0033CC" bordercolor="#FFFFFF" style="color:rgba(255,255,255)">DATOS GENERALES</td>
  </tr>
  <tr>
    <td>Codigo</td>
    <td><input name="cod_renipres" type="text" /></td>
    <td colspan="2">Nombre Establecimiento</td>
    <td colspan="3"><input type=text name="nom_estab" maxlenght="20" size="50"/></td>
    <td colspan="">Categoría</td>
    <td><input type-text name="codcat_estab" maxlenght="20" /></td>
  </tr>
  <tr>
    <td>Direccion</td>
    <td colspan="3"><input type=text name="direcc_estab"  maxlenght="40"/></td>
    <td>Periodo</td>
    <td colspan="2"><input type=text name="periodo_estab" maxlength="20" /></td>
    <td colspan="2">Descripción Categoría</td>
    <td><input type=text name="nomcat_estab" maxlength="20"/></td>
  </tr>
</table>
</br>

<table width="200" border="0">
  <tr>
    <td bgcolor="#0033CC" style="color:rgba(255,255,255)">UBICACIÓN</td>
    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    
    <td bgcolor="#0033CC" style="color:rgba(255,255,255)">RED</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#0033CC" style="color:rgba(255,255,255)">INFORMACIÓN GENERAL DEL ESTABLECIMIENTO</td>
  </tr>
  

  <tr>
  <td>
    <table width="375" border=0>
    <tr>
            <td width="118">Región</td>
            <td width="243"><label>
       <select name="codregion_estab">
         <option value="1">&nbsp;</option>
         <option value="2">Costa</option>
         <option value="3">Sierra</option>
         <option value="4">Selva</option>
       </select>
     </label></td>
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
    	<td>Institución</td>
    	<td><input type=text name="instit_estab" maxlength="20"  /></td>
    </tr>

        <tr>
    	<td>Área Geográfica</td>
    	<td width="243"><label>
       <select name="codareageog_estab">
         <option value="1">&nbsp;</option>
         <option value="2">Rural</option>
         <option value="3">Urbana</option>
       </select>
     </label></td>
    </tr>
    </table></td>
    <td></td>
    <td>
    <table width="521" border=0>
        <tr>
            <td width="319">Año puesta en marcha</td>
            <td width="192"><input name="ano_estab" type="text" /></td>
        </tr>
   		<tr>
            <td>N° de camas (Internamiento/Hospitalización)</td>
            <td><input name="camas_estab" type="text" /></td>
        </tr>
        <tr>
    	<td>Población Beneficiaria</td>
    	<td><input name="pobbenef_estab" type="text" /></td>
	    </tr>

        <tr>
    	<td>Inversión en Infraestructura</td>
    	<td><input name="invinf_estab" type="text" /></td>
    </tr>

        <tr>
    	<td>Inversión en Equipamiento</td>
    	<td><input name="invequip_estab" type="text" /></td>
    </tr>
    
    </table></td>
     
  
 <table width="200" border="1">
</br>
  <tr>
    <td colspan="10" bgcolor="#0033CC" style="color:rgba(255,255,255)">FOTO PANORÁMICA DEL ESTABLECIMIENTO DE SALUD Y CROQUIS DE UBICACIÓN</td>
  </tr>
  

  <tr>
  <td>
    <table width="365" border=0 height="136">
    <tr>
            <td> <input name="file-input" id="file-input" type="file" />
   <br />
   <img id="imgSalida" width="50%" height="50%" src="" />
   </td>
            
    </tr>
    </table></td>
    <td></td>
     <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>
    <table width="365" border=0 height="136">
        <tr>
            <td></td>
        </tr>
   	</table></td>
    <td></td>
    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>
    <table width="365" border=0 height="136">
        <tr>
            <td></td>
        </tr>
    </table></td>
     <td></td>
  </tr>


  
</table>

<table width="200" border="0">
</br>
  <tr>
    <td colspan="10" bgcolor="#0033CC" style="color:rgba(255,255,255)">GEOLOCALIZACIÓN</td>
  </tr>
  
  <tr>
  <td>
    <table width="650" border=0>
    <tr>
            <td width="274">El terreno es propio</td>
            <td width="178"><label>
       <select name="terrpropgeo">
         <option value="1">&nbsp;</option>
         <option value="2">Si</option>
         <option value="3">No</option>
        </select>
     </label></td>
    </tr>
    
  	<tr>
            <td>El terreno cuenta con saneamiento físico legal</td>
            <td><label>
       <select name="terrsaneageo">
         <option value="1">&nbsp;</option>
         <option value="2">Si</option>
         <option value="3">No</option>
        </select>
     </label></td>
    </tr>
    
    <tr>
    	<td>Área del terreno (m2)</td>
    	<td><input name="" type="areaterrgeo" /></td>
	</tr>

    <tr>
    	<td>Área construída (m2)</td>
    	<td><input name="" type="areaconsgeo" /></td>
    </tr>

    <tr>
    	<td>Área libre (m2)</td>
    	<td><input name="arealibgeo" type="text" /></td>
    </tr>
    
    <tr>
    	<td>Superficie del terreno es:</td>
        <td>Plana &nbsp;&nbsp;<input name="superfterrenogeo" type="radio"/> </td>
        <td width="132">Inclinada &nbsp;&nbsp;<input name="superfterrenogeo" type="radio"/></td>
    </tr>
    
    <tr>
    	<td>Número de pisos del establecimiento</td>
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
    	<td>Población actual de la Región (en miles)</td>
    	<td><input name="pobreggeo" type="text" /></td>
    </tr>

        <tr>
    	<td>Población actual del Distrito (en cientos)</td>
    	<td><input name="pobactdisgeo" type="text" /></td>
    </tr>
    
    <tr>
    	<td>Área del Distrito (Km2)</td>
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

 <table width="600" border="0">
  </br>	
  <tr>
    <td colspan="2" bgcolor="#0033CC" style="color:rgba(255,255,255)">PERSONAL DE ESTABLECIMIENTO DE SALUD</td>
    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td colspan="8" bgcolor="#0033CC" style="color:rgba(255,255,255)">DISTANCIA Y TIEMPOS DE ACCESO</td>
    
  </tr>
  

  <tr>
  <td>
    <table width="400" border=1>
    <tr>
            <td align="center">Especialidades</td>
            <td align="center">Cantidad</td>
    </tr>
    
  	<tr>
            <td ><a href="esoecialidades.php" target="_blank" onclick="window.popup(this.href,this.target); return false">A&ntilde;adir Elemento</a></td>
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
    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    
    <td>
    <table width="950" border=0>
        <tr>
            <td>&nbsp;</td>
             <td>&nbsp;</td>
              <td>&nbsp;</td>
            <td align="center">Distancia (Km)</td>
             <td align="center">Tiempo (hora)</td>
              <td align="center">Nivel-Categoría de EESS mas cercano</td>
        </tr>
   		<tr>
            <td>EESS mas cercano de mayor categoría</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
            <td><input name="eess_dist" type="text" /></td>
            <td><input name="tiempoeess" type="text" /></td>
            <td><input name="eess_nivelcat" type="text" /></td>
        </tr>
        <tr>
    	<td>Hospital de referencia mas cercano</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    	<td><input name="hosp_distancia" type="text" /></td>
        <td><input name="hosp_tiempo" type="text" /></td>
        <td><input name="hosp_cat" type="text" /></td>
	    </tr>
        
        <tr>
    	<td>&nbsp;</td>
    	<td>&nbsp;</td>
    </tr>
    <tr></tr>
       
    </table></td>
    <td></td>
    <td>
    
    
    </table></td>
 
<table width="500" border="0">
  </br>	
  <tr>
    <td colspan="2" bgcolor="#0033CC" style="color:rgba(255,255,255)">UPSS</td>
    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td colspan="8" bgcolor="#0033CC" style="color:rgba(255,255,255)">UPS</td>
    
  </tr>
  

  <tr>
  <td>
    <table width="690" border=1>
    <tr>
            <td width="421" align="center">UPSS &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
            <td width="183" align="center"> TOTAL DE AMBIENTES</td>
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
    <table width="680" border=1>
        <tr>
            <td width="420" align="center">UPS &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
            <td width="184" align="center"> TOTAL DE AMBIENTES</td>
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
    <td>
    </tr> 	 
 
 <table width="50" border="0">
 </br>
  <tr>
    <td bgcolor="#0033CC" style="color:rgba(255,255,255)">ESTRUCTURA DEL TECHO</td>
    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#0033CC" style="color:rgba(255,255,255)">COBERTURA DEL TECHO</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#0033CC" style="color:rgba(255,255,255)">PAREDES - MUROS</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#0033CC" style="color:rgba(255,255,255)">PISO</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#0033CC" style="color:rgba(255,255,255)">FUENTE DE ENERGÍA ELÉCTRICA</td>
  </tr>
  

  <tr>
  <td>
    <table width="250" border=0>
    <tr>
            <td width="241">Losa de concreto</td>
            <td width="49"><input name="losa_concreto" type="checkbox" /></td>
    </tr>
    
  	<tr>
            <td>Losa aligerada</td>
            <td><input name="losa_alige" type="checkbox" /></td>
    </tr>
    
    <tr>
    	<td>Estructura de madera</td>
    	<td><input name="estruct_madera" type="checkbox" /></td>
	</tr>

    <tr>
    	<td>Estructura de fierro</td>
    	<td><input name="estruct_fierro" type="checkbox" /></td>
    </tr>

    <tr>
    	<td>Ladrillo</td>
    	<td><input name="ladrillo" type="checkbox" /></td>
    </tr>
    
    <tr>
    	<td>Otro</td>
    	<td><input name="otro_estruct" type="checkbox" /></td>
    </tr>
    </table></td>
    <td></td>
    
    <td>
    <table width="250" border=0>
        <tr>
            <td>Ladrillo pastelero</td>
            <td><input name="ladrillo_past" type="checkbox" /></td>
        </tr>
   		<tr>
            <td>Calamina</td>
            <td><input name="calamina" type="checkbox" /></td>
        </tr>
        <tr>
    	<td>Teja</td>
    	<td><input name="teja" type="checkbox" /></td>
	    </tr>

        <tr>
    	<td>Otro</td>
    	<td><input name="otro_cobert" type="checkbox" /></td>
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
    <td>

    <table width="250" border=0>
        <tr>
            <td width="239">Ladrillo - Cemento</td>
            <td width="51"><input name="ladrillo_cement" type="checkbox" /></td>
        </tr>
   		<tr>
            <td>Adobe o tapia</td>
            <td><input name="adobe" type="checkbox" /></td>
        </tr>
        <tr>
    	<td>Dry Wall Madera</td>
    	<td><input name="drywall" type="checkbox" /></td>
	    </tr>

        <tr>
    	<td>Otro</td>
    	<td><input name="otro_pared" type="checkbox" /></td>
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
	
    <td>
    
	<table width="250" border=0>
        <tr>
            <td width="240">Cemento</td>
            <td width="50"><input name="cemento" type="checkbox" /></td>
        </tr>
   		
        <tr>
            <td>Vinílico</td>
            <td><input name="vinilico" type="checkbox" /></td>
        </tr>
        
        <tr>
    	<td>Cerámico</td>
    	<td><input name="ceramico" type="checkbox" /></td>
	    </tr>

        <tr>
    	<td>Otro</td>
    	<td><input name="otro_piso" type="checkbox" /></td>
    </tr>

    <tr>
    	<td>Descripci&oacute;n</td>
    	<td><input name="descotro_piso" type="text" /></td>
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

    <td>
	<table width="300" border=0>
        <tr>
            <td>Red pública</td>
            <td><input name="red_publica" type="checkbox" /></td>
        </tr>
   		<tr>
            <td>Grupo Electrógeno</td>
            <td><input name="grupo_electro" type="checkbox" /></td>
        </tr>
        <tr>
    	<td>Paneles Solares</td>
    	<td><input name="panel_solar" type="checkbox" /></td>
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
    
    	 
<table width="350" border="0">
 </br>
  <tr>
    <td bgcolor="#0033CC" style="color:rgba(255,255,255)">CARAC. TÉC. ELÉCTRICAS</td>
    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#0033CC" style="color:rgba(255,255,255)">FUENTE DE AGUA</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#0033CC" style="color:rgba(255,255,255)">RED DE DESAGUE</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td colspan="4" bgcolor="#0033CC" style="color:rgba(255,255,255)">VULNERABILIDAD</td>
  </tr>
  
  <tr>
  <td>
    <table width="350" border=0>
    <tr>
            <td>Potencia instalada (Kw)</td>
            <td><input name="potenciainst" type="text" /></td>
    </tr>
    
  	<tr>
            <td>Máxima demanda (Kw)</td>
            <td><input name="maxdemanda" type="text" /></td>
    </tr>
    
    <tr>
    	<td>Potencia contratada (Kw)</td>
    	<td><input name="potenciacont" type="text" /></td>
	</tr>

    <tr>
    	<td>Tarifa Eléctrica (S/.)</td>
    	<td><input name="tarifa_elect" type="text" /></td>
    </tr>

    <tr>
    	<td>Costo Kw/h</td>
    	<td><input name="costokw" type="text" /></td>
    </tr>
    
    <tr>
    	<td>Cantidad de pozos puesta a tierra</td>
    	<td><input name="cant_pozos" type="text" /></td>
    </tr>
    
    <tr>
    	<td>Costo Kvar/h</td>
    	<td><input name="costokvar" type="text" /></td>
    </tr>
    
    </table></td>
    <td></td>
    
    <td>
    <table width="250" border=0>
        <tr>
            <td>Vulnerable a:</td>
            <td><input name="red_publica" type="text" /></td>
        </tr>
   		<tr>
            <td>N&U</td>
            <td><input name="pilones" type="checkbox" /></td>
        </tr>
        <tr>
    	<td>Pozo</td>
    	<td><input name="pozo" type="checkbox" /></td>
	    </tr>

        <tr>
    	<td>Camión Cisterna</td>
    	<td><input name="camion_cisterna" type="checkbox" /></td>
    </tr>

    <tr>
    	<td>Otro</td>
    	<td><input name="otro_fuenteagua" type="checkbox" /></td>
    </tr>
    
    <tr>
    	<td>Descripci&oacute;n</td>
    	<td><input name="descotro_agua" type="text" /></td>
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
    <td>

    <table width="250" border=0>
        <tr>
            <td>Red pública</td>
            <td><input name="reddesag" type="checkbox" /></td>
        </tr>
   		<tr>
            <td>Silo</td>
            <td><input name="silo" type="checkbox" /></td>
        </tr>
        <tr>
    	<td>Pozo</td>
    	<td><input name="pozodesag" type="checkbox" /></td>
	    </tr>

        <tr>
    	<td>Campo Abierto</td>
    	<td><input name="campoab" type="checkbox" /></td>
    </tr>

        <tr>
    	<td>Otro</td>
    	<td><input name="otrodesag" type="checkbox" /></td>
    </tr>
    
    <tr>
    	<td>Cuenta con drenaje de aguas pluviales</td>
    	<td><label>
       <select name="drenaje">
         <option value="1">&nbsp;</option>
         <option value="2">Si</option>
         <option value="3">No</option>
        </select>
     </label></td>
    </tr>
    
    <tr>
    	<td>&nbsp;</td>
    	<td>&nbsp;</td>
    </tr>
    </table></td>
    <td></td>
	
    <td>
    
	<table width="250" border=0>
        <tr>
            <td>Cerca a:</td>
            <td>Cause de río </td>
            <td><input name="caucerio" type="checkbox" /></td>
        </tr>
        
         <tr>
    	<td>&nbsp;</td>
    	<td>Huayco</td>
        <td><input name="huayco" type="checkbox" /></td>
    </tr>
        
   		<tr>
            <td>Calificación ISH</td>
            <td><label>
       <select name="clasifish">
         <option value="1">&nbsp;</option>
         <option value="2">Si</option>
         <option value="3">No</option>
        </select>
     </label></td>
        </tr>
        <tr>
    	<td>Con ITSE - Salud</td>
    	<td><label>
       <select name="itse">
         <option value="1">&nbsp;</option>
         <option value="2">Si</option>
         <option value="3">No</option>
        </select>
     </label></td>
	    </tr>

        <tr>
    	<td>Con estudios</td>
    	<td><label>
       <select name="estvulne">
         <option value="1">&nbsp;</option>
         <option value="2">Si</option>
         <option value="3">No</option>
        </select>
     </label></td>
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

    <td>
	<table width="250" border=0>
        <tr>
            <td>Inundable</td>
            <td><input name="inundable" type="checkbox" /></td>
            <td>Otro</td>
            <td><input name="otrovuln" type="checkbox" /></td>
        </tr>
   		<tr>
            <td>Ninguno</td>
            <td><input name="ningunovuln" type="checkbox" /></td>
        </tr>
        <tr>
    	<td>Número</td>
    	<td><input name="numeroish" type="text" /></td>
	    </tr>

        <tr>
    	<td>Año</td>
    	<td><input name="anoitse" type="text" /></td>
   		</tr>

    <tr>
    	<td>Año</td>
    	<td><input name="anoestu" type="text" /></td>
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
    
<table width="500" border="0">
</br>
  <tr>
    <td bgcolor="#0033CC" style="color:rgba(255,255,255)">RESIDUOS SOLIDOS</td>
    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#0033CC" style="color:rgba(255,255,255)">REDES DE COMUNICACIÓN</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#0033CC" style="color:rgba(255,255,255)">ESTADO DE CONSERVACIÓN</td>
  </tr>
  

  <tr>
  <td>
    <table width="600" border=0>

    
  	<tr>
            <td>Biocontaminados (Kg)</td>
            <td><input name="biocontam" type="text" /></td>
    </tr>
    
    <tr>
    	<td>Comunes (Kg)</td>
    	<td><input name="comunes" type="text" /></td>
	</tr>

    <tr>
    	<td>Especiales (Kg)</td>
    	<td><input name="especiales" type="text" /></td>
    </tr>

    <tr>
    	<td>Cuenta con equipo de tratamiento de residuos</td>
    	<td><label>
       <select name="equipotratres">
         <option value="1">&nbsp;</option>
         <option value="2">Si</option>
         <option value="3">No</option>
        </select>
     </label></td>
    </tr>
    
    <tr>
    	<td>Operatividad</td>
    	<td><input name="operatividad" type="text" /></td>
    </tr>
    
    <tr>
    	<td>Costo unitario de traslado de los residuos (S/Kg)</td>
    	<td><input name="costounittrasl" type="text" /></td>
    </tr>
    
    <tr>
    	<td>Costo mensual de traslado de los residuos al relleno sanitario</td>
    	<td><input name="costomenstrasl" type="text" /></td>
    </tr>
    
    <tr>
    	<td>Ubicación del relleno sanitario</td>
    	<td><input name="ubicacionrell" type="text" /></td>
    </tr>
    
    </table></td>
    <td></td>
    
    <td>
    <table width="250" border=0>
        <tr>
            <td>Teléfono</td>
            <td><label>
       <select name="telefono">
         <option value="1">&nbsp;</option>
         <option value="2">Si</option>
         <option value="3">No</option>
        </select>
     </label></td>
     
     <td><label>
       <select name="telfoper">
         <option value="1">&nbsp;</option>
         <option value="2">Movistar</option>
         <option value="3">Claro</option>
         <option value="4">Entel</option>
         <option value="5">Bitel</option>
       </select>
     </label></td>
     
        </tr>
   		<tr>
            <td>Internet</td>
            <td><label>
       <select name="internet">
         <option value="1">&nbsp;</option>
         <option value="2">Si</option>
         <option value="3">No</option>
        </select>
     </label></td>
     
     <td><label>
       <select name="interoper">
         <option value="1">&nbsp;</option>
         <option value="2">Movistar</option>
         <option value="3">Claro</option>
         <option value="4">Entel</option>
        </select>
     </label></td>
        </tr>
        <tr>
    	<td>Radio</td>
    	<td><label>
       <select name="radio">
         <option value="1">&nbsp;</option>
         <option value="2">Si</option>
         <option value="3">No</option>
        </select>
     </label></td>
	    </tr>

        <tr>
    	<td>Cable</td>
    	<td><label>
       <select name="cable">
         <option value="1">&nbsp;</option>
         <option value="2">Si</option>
         <option value="3">No</option>
        </select>
     </label></td>
     
     <td><label>
       <select name="cablaoper">
         <option value="1">&nbsp;</option>
         <option value="2">Movistar</option>
         <option value="3">Claro</option>
         <option value="4">Entel</option>
         <option value="5">Directv</option>
         <option value="6">Local</option>
        </select>
     </label></td>
    </tr>

        <tr>
    	<td>&nbsp;</td>
    	<td>&nbsp;</td>
    </tr>
    </table></td>
    <td></td>
    <td>
    
    <table width="450" border=0>
    
        <tr>
            <td>Arquitectura</td>
            <td><label>
       <select name="arq">
         <option value="1">&nbsp;</option>
         <option value="2">Bueno</option>
         <option value="3">Regular</option>
         <option value="4">Malo</option>
        </select>
     </label></td>
        </tr>
        
   		<tr>
            <td>Estructura</td>
            <td><label>
       <select name="estruct">
         <option value="1">&nbsp;</option>
         <option value="2">Bueno</option>
         <option value="3">Regular</option>
         <option value="4">Malo</option>
        </select>
     </label></td>
        </tr>
        
        <tr>
    	<td>Instalaciones Eléctricas</td>
    	<td><label>
       <select name="instelect">
         <option value="1">&nbsp;</option>
         <option value="2">Bueno</option>
         <option value="3">Regular</option>
         <option value="4">Malo</option>
        </select>
     </label></td>
	    </tr>

        <tr>
    	<td>Instalaciones Sanitarias</td>
    	<td><label>
       <select name="instsanit">
         <option value="1">&nbsp;</option>
         <option value="2">Bueno</option>
         <option value="3">Regular</option>
         <option value="4">Malo</option>
        </select>
     </label></td>
    </tr>

        <tr>
    	<td>&nbsp;</td>
    	<td>&nbsp;</td>
    </tr>
    
    
    
    </table></td>
<table width="650" border=0>
<tr>
     <td width="500" height="38" colspan="2"><Center><input type="submit" name="accion" value="Grabar"></Center></td>
     <td><label>
     <input type="submit" name="Submit" value="Retornar" onClick="javascript:window.history.back()">
     </label></td>
     </tr>
</table>

</body>



</html>



