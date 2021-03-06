<?php 
require_once '../lib/common.php';
include ("../header.php");

$conexion_conf=conexion_conf();
$consulta_conf="select tipo_presupuesto,tipo_compromiso from parametros";
$resultado_conf=query($consulta_conf,$conexion_conf);
$fila_conf=fetch_array($resultado_conf);
//$tipo_compromiso=$fila_conf['tipo_compromiso'];
$tipo_presupuesto = $fila_conf['tipo_presupuesto'];
$tipo_compromiso = $fila_conf['tipo_compromiso'];
cerrar_conexion($conexion_conf);


$conexion=conexion();
//echo $conexion;
$url="centros_list";
$modulo="Centros de Costos";
$tabla="centros";
$titulos=array("Centro de Costo","Unidad","Descripción");
$indices=array("0","1","2");

$cod_unidad=@$_GET['codigo'];
//echo $cod_unidad;
$tipob=@$_GET['tipo'];
$des=@$_GET['des'];
$pagina=@$_GET['pagina'];
if(isset($_POST['buscar']) || $tipob!=NULL){
	if(!$tipob){
		$tipob=$_POST['palabra'];
		$des=$_POST['buscar'];
		$cod_unidad=$_POST['codigo'];
	}
	switch($tipob){
		case "exacta": 
			$consulta=buscar_exacta($tabla,$des,"descripcion");
			break;
		case "todas":
			$consulta=buscar_todas($tabla,$des,"descripcion");
			break;
		case "cualquiera":
			$consulta=buscar_cualquiera($tabla,$des,"descripcion");
			break;
	}
	$consulta=$consulta." AND cod_unidad='".$cod_unidad."' order by cod_centro";
}else{
$consulta="select * from ".$tabla." where cod_unidad='".$cod_unidad."' order by cod_centro";
//echo $consulta;
}
//echo $consulta." este es el valor quemuestra ";
$num_paginas=obtener_num_paginas($consulta);
$pagina=obtener_pagina_actual($pagina, $num_paginas);
$resultado=paginacion($pagina, $consulta);

include ("../header.php");
?>
<FORM name="<?echo $url?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">
<?

	if ($tipo_presupuesto=='Programa')
	{
		titulo($modulo,"centros_add2.php?codigo=".$cod_unidad,"unidades_list.php","12");
	}
	elseif ($tipo_presupuesto=='Proyecto')
	{
		titulo($modulo,"centros_add3.php?codigo=".$cod_unidad,"unidades_list.php","12");
	}

?>
<table class="tb-head" width="100%">
  <tr>
	<td><input type="text" name="buscar" size="20"></td>
	<td><? btn('search',$url,1); ?></td>
	<td><? btn('show_all',$url.".php?pagina=".$pagina."&codigo=".$cod_unidad); ?></td>
	<td width="120"><input onclick="javascript:actualizar(this);" checked="true" type="radio" name="palabra" value="exacta">Palabra exacta</td>
	<td width="140"><input onclick="javascript:actualizar(this);" type="radio" name="palabra" value="todas">Todas las palabras</td>
	<td width="150"><input onclick="javascript:actualizar(this);" type="radio" name="palabra" value="cualquiera">Cualquier palabra</td>
	<td colspan="3" width="386"></td>
	<td><INPUT type="hidden" name="codigo" value="<?echo $cod_unidad?>"></td>
	
  </tr>
</table>
<BR>
<table width="100%" cellspacing="0" border="0" cellpadding="1" align="center">
  <tbody>
    <tr class="tb-head" >
<?
foreach($titulos as $nombre){
	echo "<td><STRONG>$nombre</STRONG></td>";
}
?>
      <td></td>
      <td></td>
      <td></td>

    </tr>
<? 
	if($num_paginas!=0){
	$i=0; 
	while($fila=mysql_fetch_array($resultado)){
   	$i++;
	if($i%2==0){
?>
    		<tr class="tb-fila">
<?
	}else{
		echo"<tr>";
	}
	foreach($indices as $campo){
		$nom_tabla=mysql_field_name($resultado,$campo);
		
		$var=$fila[$nom_tabla];
		echo"<td>$var</td>";
	}
	$codigo=$fila["cod_unidad"];
	$cod_centro=$fila["cod_centro"];

	if ($tipo_presupuesto=='Programa')
	{
		icono("centros_edit2.php?codigo=".$codigo."&cod_centro=".$cod_centro, "Editar", "edit.gif");
	}
	elseif ($tipo_presupuesto=='Proyecto')
	{
		icono("centros_edit3.php?codigo=".$codigo."&cod_centro=".$cod_centro, "Editar", "edit.gif");
	}
	

	icono("centros_delete.php?codigo=".$codigo."&cod_centro=".$cod_centro, "Eliminar", "delete.gif");
	//icono("centros_asociar_presupuesto.php?codigo=".$codigo."&cod_centro=".$cod_centro, "Municipios", "view.gif");

    echo"</tr>";
	}
}else{
	echo"<tr><td>No existen registro con la busqueda especificada</td></tr>";
}
cerrar_conexion($conexion);
?>
  </tbody>
</table>
<?
pie_pagina($url,$pagina,"&tipo=".$tipob."&des=".$des."&codigo=".$cod_centro,$num_paginas);
?>
</FORM>
</BODY>
</html>