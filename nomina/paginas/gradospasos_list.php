<?php 
session_start();
ob_start();
?>
<?php 
$url="gradospasos_list";
$modulo="Grados y Pasos";
$tabla="nomgradospasos";
$titulos=array("Grado","P1","P2","P3","P4","P5","P6","P7","P8","P9","P10","P11","P12","P13","P14","P15");
$indices=array("grado","p1","p2","p3","p4","p5","p6","p7","p8","p9","p10","p11","p12","p13","p14","p15");

//DECLARACION DE LIBRERIAS
require_once '../lib/common.php';

$conexion=conexion();

$tipob=@$_GET['tipo'];
$des=@$_GET['des'];
$pagina=@$_GET['pagina'];
?>
<script type="text/javascript">
function confirmar2(valor)
{
	if (confirm("seguro desea eliminar este registro") == true) 
		window.location.href="gradospasos_list.php?cod_eliminar="+valor
}

</script>
<link href="../estilos.css" rel="stylesheet" type="text/css" />
<?

if(isset($_GET['cod_eliminar']))
{
	$consulta="DELETE FROM nomgradospasos WHERE grado=$_GET[cod_eliminar]";
	$resultado=query($consulta,$conexion);
}

if(isset($_POST['buscar']) || $tipob!=NULL)
{
	if(!$tipob)
	{
		$tipob=$_POST['palabra'];
		$des=$_POST['buscar'];
	}
	switch($tipob){
		case "exacta": 
			$consulta=buscar_exacta($tabla,$des,"tipo_registro");
			break;
		case "todas":
			$consulta=buscar_todas($tabla,$des,"tipo_registro");
			break;
		case "cualquiera":
			$consulta=buscar_cualquiera($tabla,$des,"tipo_registro");
			break;
	}
}
else
{
	$consulta="select * from ".$tabla." order by grado";
}
//echo $consulta." este es el valor quemuestra ";
$num_paginas=obtener_num_paginas($consulta);
$pagina=obtener_pagina_actual($pagina, $num_paginas);
$resultado=paginacion($pagina, $consulta);

include ("../header.php");
?>
<FORM name="<?echo $url?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">
<?
titulo($modulo,"gradospasos_agregar.php?cedula=$cedula","menu_configuracion.php","21");
?>
<table class="tb-head" width="100%">
<tr>
<td><input type="text" name="buscar" size="20"></td>
<td><? btn('search',$url,1); ?></td>
<td><? btn('show_all',$url.".php?cedula=".$cedula,0); ?></td>
<td width="120"><input onclick="javascript:actualizar(this);"  type="radio" name="palabra" value="exacta">Palabra exacta</td>
<td width="140"><input onclick="javascript:actualizar(this);" type="radio" name="palabra" value="todas">Todas las palabras</td>
<td width="150"><input onclick="javascript:actualizar(this);" checked="true" type="radio" name="palabra" value="cualquiera">Cualquier palabra</td>
<td colspan="3" width="386"></td>
</tr>
</table>
<BR>
<table width="100%" cellspacing="0" border="0" cellpadding="1" align="center">
<tbody>
<tr class="tb-head" >
<?
foreach($titulos as $nombre)
{
	echo "<td><STRONG>$nombre</STRONG></td>";
}
?>
<td></td>
<td></td>
</tr>
<? 
if($num_paginas!=0)
{
	$i=0; 
	while($fila=fetch_array($resultado))
	{
		$i++;
		if($i%2==0)
		{
			?>
			<tr class="tb-fila">
			<?
		}
		else
		{
			echo"<tr>";
		}
		foreach($indices as $campo)
		{
			$var=$fila[$campo];
			echo"<td>$var</td>";
		}
		$codigo=$fila['grado'];
		icono("gradospasos_agregar.php?grado=".$codigo, "Editar", "edit.gif");
		icono("javascript:confirmar2('$codigo')", "Eliminar", "delete.gif");
	
		echo "</tr>";
	}
}
else
{
	echo "<tr><td>No existen registro con la busqueda especificada</td></tr>";
}
cerrar_conexion($conexion);
?>
</tbody>
</table>
<?
pie_pagina($url,$pagina,"&tipo=".$tipob."&des=".$des,$num_paginas);
?>
</FORM>
</BODY>
</html>