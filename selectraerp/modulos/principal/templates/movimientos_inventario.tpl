<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="autor" content="Charli Vivenes" />
        <title></title>
        {include file="snippets/inclusiones_reportes.tpl"}
    </head>
    <body>
        <form name="formulario" id="formulario" method="post">
            <div id="datosGral" class="x-hide-display">
                <input type="hidden" name="codigo_empresa" value="{$DatosEmpresa[0].codigo}"/>
                <input type="hidden" name="opt_menu" value="{$smarty.get.opt_menu}"/>
                <input type="hidden" name="opt_seccion" value="{$smarty.get.opt_seccion}"/>
                <table style="width:100%">
                    <tbody>
                        <tr>
                            <td class="tb-tit">
                                <!--img src="../../libs/imagenes/118.png" width="20" align="absmiddle" height="20"><b>Datos Del reporte</b-->
                                <input name="imagen" id="imagen" type="hidden" value="{$campo_seccion[0].img_ruta}"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table style="width:100%; height:100px;">
                    <tr>
                        <td colspan="6" class="tb-head" style="text-align:center">
                            LOS CAMPOS MARCADOS CON&nbsp;** SON OBLIGATORIOS
                        </td>
                    </tr>
                    <tr>
                        <td style="width:170px">Fecha **</td>
                        <td colspan="5">
                            <input type="text" name="fecha" id="fecha" size="20" value="{$smarty.now|date_format:"%Y-%m-%d"}" class="form-text" readonly />
                            {literal}
                                <script type="text/javascript">//<![CDATA[
                                    /*var cal = Calendar.setup({
                                        onSelect: function(cal) { cal.hide() }
                                    });
                                    cal.manageFields("fecha", "fecha", "%Y-%m-%d");*/
                                    $("#fecha").datepicker({
                                        changeMonth: true,
                                        changeYear: true,
                                        showOtherMonths:true,
                                        selectOtherMonths: true,
                                        numberOfMonths: 1,
                                        //yearRange: "-100:+100",
                                        dateFormat: "yy-mm-dd",
                                        showOn: "both"//button
                                    });
                                //]]>
                                </script>
                            {/literal}
                        </td>
                    </tr>
                    <tr class="tb-tit" style="text-align:right">
                        <td colspan="3" style="text-align:left">
                            <input type="radio" name="radio" value="0" /> Hoja de C&aacute;lculo
                            <input type="radio" name="radio" value="1" checked /> Formato PDF
                        </td>
                        <td colspan="3">
                            <input type="submit" id="aceptar" name="aceptar" value="Enviar" onclick="javascript:valida_envia('rpt_movimientos_inventario.php','');" class="form-text"/>
                            <input type="button" name="cancelar" onclick="javascript:document.location.href='?opt_menu=3';" value="Cancelar" class="form-text"/>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>