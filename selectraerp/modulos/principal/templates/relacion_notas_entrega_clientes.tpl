<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="autor" content="Charli Vivenes" />
        {include file="snippets/header_form.tpl"}
    </head>
    <body>
        <form id="form-{$name_form}" name="form-{$name_form}">
            <div id="datosGral" class="x-hide-display">
                {include file = "snippets/regresar_boton.tpl"}
                {include file = "snippets/tb_head.tpl"}
                <br/>
                <table class="seleccionLista">
                    <tbody>
                        <tr class="tb-head" >
                            {foreach from=$cabecera key=i item=campo}
                                <td>{$campo}</td>
                            {/foreach}
                            <td colspan="2" style="text-align:center;">Opciones</td>
                        </tr>
                        {if $cantidadFilas eq 0}
                            <tr><td colspan="9">{$mensaje}</td></tr>
                        {else}
                            {foreach from = $registros key=i item=campo}
                                {if $campo.cod_estatus eq 1}
                                    {assign var=status value="Pendiente"}
                                    {assign var=color value="#f3ed8b"}<!--amarillo-->
                                {elseif $campo.cod_estatus eq 2}
                                    {assign var=status value="Facturado"}
                                    {assign var=color value="#a3fba3"}<!--verde-->
                                {else}
                                    {assign var=status value="Anulado"}
                                    {assign var=color value="#f99696"}<!--rojo-->
                                {/if}
                                <tr bgcolor="{$color}">
                                    <td style="text-align: right; width: 50px; padding-right: 10px;">{$campo.id_nota_entrega}</td>
                                    <td style="text-align: center; width: 150px;">{$campo.cod_nota_entrega}</td>
                                    <td style="padding-left: 10px;">{$campo.nombre}</td>
                                    <td style="text-align: center">{$campo.rif}</td>
                                    <td style="text-align: center">{$campo.fechaNotaEntrega}</td>
                                    <td style="text-align: right; padding-right: 10px;">{$campo.totalizar_total_general}</td>
                                    <td style="text-align: center">{$status}</td>
                                    <td style="text-align: center; cursor: pointer; width: 30px;"><img class="impresion" onclick="javascript:window.open('../../reportes/rpt_nota_entrega.php?codigo={$campo.cod_nota_entrega}', '')" title="Imprimir Nota de Entrega {$campo.cod_nota_entrega}" src="../../../includes/imagenes/ico_print.gif"/></td>
                                    <td style="text-align: center; cursor: pointer; width: 30px;">
                                        {if $campo.cod_estatus eq 1}
                                            <img class="anular" onclick="javascript:window.location.href = '?opt_menu={$smarty.get.opt_menu}&amp;opt_seccion={$smarty.get.opt_seccion}&amp;opt_subseccion=delete&amp;codigo={$campo.cod_nota_entrega}'" title="Anular Nota de Entrega {$campo.cod_nota_entrega}" src="../../../includes/imagenes/cancel.gif"/>
                                        {elseif $campo.cod_estatus eq 2}
                                            <img title="No puede ser anulado porque ha sido facturado" src="../../../includes/imagenes/ico_note.gif"/>
                                        {else}
                                            <img title="Esta Nota de Entrega fue anulada" src="../../../includes/imagenes/delete.png"/>
                                        {/if}
                                    </td>
                                </tr>
                                {assign var=ultimo_cod_valor value=$campo.id_nota_entrega}
                            {/foreach}
                        {/if}
                    </tbody>
                </table>
                {include file = "snippets/navegacion_paginas.tpl"}
            </div>
        </form>
    </body>
</html>