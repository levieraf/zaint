{literal}
<script language="JavaScript">
    $(document).ready(function(){
        $("#descripcion").focus();
        $("#formulario").submit(function(){
                if($("#descripcion").val()==""){
                    alert("Debe Ingresar la descripción!.");
                    $("#descripcion").focus();
                    return false;
                }

        });
    });
</script>
{/literal}


<form name="formulario" id="formulario" method="POST" action="">
<input type="hidden" name="codigo_empresa" value="{$DatosEmpresa[0].codigo}">
<input type="hidden" name="opt_menu" value="{$smarty.get.opt_menu}">
<input type="hidden" name="opt_seccion" value="{$smarty.get.opt_seccion}">
<input type="hidden" name="opt_subseccion" value="{$smarty.get.opt_subseccion}">

  <table width="100%">
        <tr class="row-br">
            <td>
                <table class="tb-tit" cellspacing="0" cellpadding="1" border="0" width="100%">
                    <tbody>
                        <tr>
                        <td width="900"><span style="float:left"><img src="{$subseccion[0].img_ruta}" width="22" height="22" class="icon" />{$subseccion[0].descripcion}</span></td>
                        <td width="75">
                            <table style="cursor: pointer;" class="btn_bg" onClick="javascript:window.location='?opt_menu={$smarty.get.opt_menu}&opt_seccion={$smarty.get.opt_seccion}'" name="buscar" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 0px;" align="right"><img src="../../libs/imagenes/bt_left.gif" alt="" width="4" height="21" style="border-width: 0px;" /></td>
                                    <td class="btn_bg"><img src="../../libs/imagenes/back.gif" width="16" height="16" /></td>
                                    <td class="btn_bg" nowrap style="padding: 0px 1px;">Regresar</td>
                                    <td  style="padding: 0px;" align="left"><img  src="../../libs/imagenes/bt_right.gif" alt="" width="4" height="21" style="border-width: 0px;" /></td>
                                </tr>
                            </table>
                        </td>

                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>

<table   width="100%" border="0" >
<tr>
        <td colspan="4" class="tb-head" align="center">
          &nbsp;
      </td>
</tr>
<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
       Codigo
    </td>
    <td >
        <input type="text" readonly name="id_tipo_movimiento_almacen" value="{$datos_almacen[0].id_tipo_movimiento_almacen}" id="id_tipo_movimiento_almacen" >
    </td>
</tr>
<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
       Descripción
    </td>
    <td >
        <input type="text" name="descripcion" value="{$datos_almacen[0].descripcion}" size="60" id="descripcion" >
    </td>
</tr>
<tr>
    <td class="tb-head" colspan="3">
        Operacion
    </td>
    <td>
        <select name="operacion" id="operacion">
    <option  {if $datos_almacen[0].operacion eq "+" }selected {/if} value="+">Entrada</option>
            <option  {if $datos_almacen[0].operacion eq "-" }selected {/if}value="-">Salida</option>
			</select>
    </td>
</tr>
</table>




<table width="100%" border="0">
    <tbody>
    <tr class="tb-tit" align="right">
    <td>
        <input type="submit" name="aceptar" id="aceptar" value="Guardar Cambios">
    </td>
    </tr>
    </tbody>
</table>

</form>

