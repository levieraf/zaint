<?
	require_once 'lib/config.php';
	require_once 'lib/common.php';
	include('header.php');

/*
	$Conn=conexion_conf();
	$var_sql = "SELECT * FROM parametros";
	$rs = query($var_sql, $Conn);
	$row_rs = fetch_array($rs);
	$var_encabezado1 = $row_rs['encabezado1'];
	$var_encabezado2 = $row_rs['encabezado2'];
	$var_encabezado3 = $row_rs['encabezado3'];
	$var_encabezado4 = $row_rs['encabezado4'];
	$var_imagen_izq = $row_rs['imagen_izq'];
	$var_imagen_der = $row_rs['imagen_der'];
	cerrar_conexion($Conn);
*/

	$lineas = 25;
	
	$codtip = $_GET['tipo'];
	
	$conexion = conexion();

	$consultat = "SELECT DESCRIP FROM activosfijos_tipos WHERE CODIGOTA='".$codtip."' ";
	$resultadot = query($consultat, $conexion);				
	$fetcht = fetch_array($resultadot);
	$tipo = $fetcht['DESCRIP'];
	
	$consulta = "SELECT * FROM activosfijos WHERE TIPO='".$codtip."' order by CODCCOS, CODACT ";
	$resultado = query($consulta, $conexion);
	$resultado66 = query($consulta, $conexion);
	if(!$resultado66)
	{	
		?>
		<script type="text/javascript">
		alert("Ud. no tiene activos fijos registrados!!!")
		</script>
		<?
	}
	$paginas = 1;
?>



	<br />

	<div align="right"><INPUT type="button" name="imprimir" value="Imprimir" onclick="javascript:imprimir('impresion')"></div>
	<div id="impresion">
	<BR>
<table width="100%" border="0" align="center">
  <tbody>
    <tr>
      <td rowspan="4" valign="middle"><img src="../../SiSalud.bmp" width="255" height="104"></td>
      <td><p align="center"><strong><? echo $var_encabezado1?></strong></p></td>
      </tr>
    <tr>
    <tr>
      <td><p align="center"><strong><? echo $var_encabezado2?></strong></p></td>
    </tr>
    <tr>
      <td><p align="center"><strong><? echo $var_encabezado3?></strong></p></td>
    </tr>
    <tr>
      <td><p align="center"><strong><? echo $var_encabezado4?></strong></p></td>
    </tr>
  </tbody>
</table>
	
	<TABLE width="100%" align="center" border="0">
		<TR>
			<TD align="left" colspan=""><strong></strong></TD><TD align="right" colspan="3"><strong>Fecha:</strong> <? echo date('d/m/Y');?></TD>
		</TR>
		<TR>
			<TD align="left" colspan=""><strong></strong></TD><TD align="right" colspan=""><strong></TD>
		</TR>
		<TR>
			<TD align="right" colspan="3"><strong>P&aacute;gina: 1</strong> </TD>
		</TR>
		<TR>
			<TD colspan="3" align="center"><strong>ACTIVOS FIJOS </strong></TD>
		</TR>
		<TR>
			<TD colspan="3" align="center"><strong>(<? echo $tipo;?>)</strong></TD>
		</TR>
		

	</TABLE>
	<BR>
    
     
	<TABLE width="100%" border="0" style="border-style:solid; border-color:#333333;">
    	<TR>
			<TD align=center style="font-size:11px;"><strong>C&oacute;digo</strong></TD>
			<!--<TD align=center style="font-size:11px;"><strong>Tipo</strong></TD>-->
			<TD align=left style="font-size:11px;"><strong>Descripci&oacute;n</strong></TD>
			<TD align=center style="font-size:11px;"><strong>Costo Compra</strong></TD>	
			<TD align=center style="font-size:11px;"><strong>CCO</strong></TD>
			<TD align=center style="font-size:11px;"><strong>Dpr.</strong></TD>
			<TD align=right style="font-size:11px;"><strong>Dpr. mes</strong></TD>
			<TD align=center style="font-size:11px;"><strong>Estado</strong></TD>			
            <!--<TD align=right style="font-size:11px;"><strong>%</strong></TD>-->            
            <!--<TD align=right style="font-size:11px;"><strong>%</strong></TD>-->            
            <!--<TD align=right style="font-size:11px;"><strong>%</strong></TD>-->
         </TR>
			<?
				
				$cont = 1;
				$totalcost = $totaldpr = $i=0;
				while ($fila = fetch_array($resultado))
				{	
						$consultat = "SELECT DESCRIP FROM activosfijos_tipos WHERE CODIGOTA='".$fila['TIPO']."' ";
						$resultadot = query($consultat, $conexion);				
						$fetcht = fetch_array($resultadot);
						$consultac = "SELECT Descrip FROM cwconcco WHERE Codccos='".$fila['CODCCOS']."'";
						$resultadoc = query($consultac,$conexion);
						$fetchc = fetch_array($resultadoc);
						
						echo '<tr>						
						
						<td align=center style="font-size:10px;"><strong>'.$fila['CODACT'].'</strong></td>
						
						<td align=left style="font-size:10px;"><strong>'.$fila['DECRIPAF'].'</strong></td>
						<td align=right style="font-size:10px;"><strong>'.number_format($fila['COSTOCOMPRA'],2,',','.').'</strong></td>
						<td align=center style="font-size:10px;"><strong>'.$fetchc['Descrip'].'</strong></td>
						<td align=center style="font-size:10px;"><strong>'.$fila['SEDEPRECIA'].'</strong></td>
						<td align=right style="font-size:10px;"><strong>'.number_format($fila['DPRMENSUAL'],2,',','.').'</strong></td>
						<td align=center style="font-size:10px;"><strong>'.$fila['ESTADOAF'].'</strong></td>
						</tr>';
						$i=$i+1;
						$totalcost=$totalcost+$fila['COSTOCOMPRA'];
						$totaldpr=$totaldpr+$fila['DPRMENSUAL'];
				//	<td align=center style="font-size:10px;"><strong>'.$fetcht['DESCRIP'].'</strong></td>
					if ($cont>=$lineas) 
					{						
						echo "</table> ";
						echo "<br class=\"saltopagina\">";
						++$paginas;
?>
<table width="100%" border="0" align="center">
  <tbody>
    <tr>
      <td rowspan="4" valign="middle"><img src="<?echo $var_imagen_izq?>" width="75" height="80"></td>
      <td><p align="center"><strong><? echo $var_encabezado1?></strong></p></td>
      <td rowspan="4" valign="middle" align="right"><img src="<? echo $var_imagen_der?>" width="100" height="70"></td>
    </tr>
    <tr>
      <td><p align="center"><strong><? echo $var_encabezado2;?></strong></p></td>
    </tr>
    <tr>
      <td><p align="center"><strong><? echo $var_encabezado3;?></strong></p></td>
    </tr>
    <tr>
      <td><p align="center"><strong><? echo $var_encabezado4;?></strong></p></td>
    </tr>
  </tbody>
</table>
	
	<TABLE width="100%" align="center" border="0">
		<TR>
			<TD align="left" colspan=""><strong></strong></TD><TD align="right" colspan="3"><strong>Fecha:</strong> <? echo date('d/m/Y');?></TD>
		</TR>
		<TR>
			<TD align="left" colspan=""><strong></strong></TD><TD align="right" colspan=""><strong></TD>
		</TR>
		<TR>
			<TD align="right" colspan="3"><strong>P&aacute;gina: <? echo ++$paginas;?></strong> </TD>
		</TR>
		<TR>
			<TD colspan="3" align="center"><strong>ACTIVOS FIJOS </strong></TD>
		</TR>
		<TR>
			<TD colspan="3" align="center"><strong>(<? echo $tipo;?>)</strong></TD>
		</TR>
		

	</TABLE>
	<BR>
	<TABLE width="100%" border="0" style="border-style:solid; border-color:#333333;"> 
		<TR>
			<TD align=center style="font-size:11px;"><strong>C&oacute;digo</strong></TD>
			<!--<TD align=center style="font-size:11px;"><strong>Tipo</strong></TD>-->
			<TD align=left style="font-size:11px;"><strong>Descripci&oacute;n</strong></TD>
			<TD align=center style="font-size:11px;"><strong>Costo Compra</strong></TD>	
			<TD align=center style="font-size:11px;"><strong>CCO</strong></TD>
			<TD align=center style="font-size:11px;"><strong>Dpr.</strong></TD>
			<TD align=right style="font-size:11px;"><strong>Dpr. mes</strong></TD>
			<TD align=center style="font-size:11px;"><strong>Estado</strong></TD>					
            <!--<TD align=right style="font-size:11px;"><strong>%</strong></TD>-->            
            <!--<TD align=right style="font-size:11px;"><strong>%</strong></TD>-->            
            <!--<TD align=right style="font-size:11px;"><strong>%</strong></TD>-->
	</TR>		
			<?
				
					$cont = 1;	
					}
				$cont=$cont + 1;
				}
				
		//}else{
			//	echo "<tr><td colspan=8>No existen registro con la busqueda especificada</td></tr>";
		//}
			 ?>
		</TR>
	</TABLE>
	</TABLE>
	<TABLE width="100%" border="0" style="border-style:solid; border-color:#333333;">
	<TR>
	<TD colspan="3" align=center style="font-size:11px;"> Cantidad= <?php echo $i;?></TD>
	<td colspan="2" align=center style="font-size:11px;"> Total compra= <?php echo number_format($totalcost,2,',','.')?></td>
	<td colspan="3" align=center style="font-size:11px;"> Total Dpr= <?php echo number_format($totaldpr,2,',','.')?></td>
	</TR>
	</TABLE>
    <?
   // echo $pie = pie_irem();
	?>
</BODY>
</HTML>