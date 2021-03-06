<?php /* Smarty version 2.6.21, created on 2013-07-31 19:18:49
         compiled from factura_nueva.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'factura_nueva.tpl', 118, false),array('modifier', 'date_format', 'factura_nueva.tpl', 259, false),)), $this); ?>
<link type="text/css" media="screen" rel="stylesheet" href="../../libs/css/nueva_factura.css" />
<script type="text/javascript" src="../../libs/js/nueva_factura_totalizarfactura.js"></script>
<script type="text/javascript" src="../../libs/js/buscar_productos_servicios.js"></script>
<script type="text/javascript" src="../../libs/js/nueva_factura_scripts.js"></script>
<script type="text/javascript" src="../../libs/js/factura.js"></script>
<form name="formulario" id="formulario" method="post">
    <input type="hidden" name="transaccion" id="transaccion" value="factura"/>
    <input type="hidden" name="DatosCliente" value=""/>
    <input type="hidden" name="codigo_empresa" value="<?php echo $this->_tpl_vars['DatosEmpresa'][0]['codigo']; ?>
"/>
    <input type="hidden" name="opt_menu" value="<?php echo $_GET['opt_menu']; ?>
"/>
    <input type="hidden" name="opt_seccion" value="<?php echo $_GET['opt_seccion']; ?>
"/>
    <input type="hidden" name="opt_subseccion" value="<?php echo $_GET['opt_subseccion']; ?>
"/>
    <input type="hidden" name="moneda" id="moneda" value="<?php echo $this->_tpl_vars['DatosGenerales'][0]['moneda']; ?>
"/>
    <table style="width:100%">
        <tr class="row-br">
            <td>
                <table class="tb-tit" style="width:100%">
                    <tbody>
                        <tr>
                            <td style="width:900px;">
                                <span style="float:left">
                                    <img src="<?php echo $this->_tpl_vars['subseccion'][0]['img_ruta']; ?>
" width="22" height="22" class="icon" />
                                    <?php echo $this->_tpl_vars['subseccion'][0]['descripcion']; ?>

                                </span>
                            </td>
                            <td style="width:75px;">
                                <table style="cursor: pointer;" class="btn_bg" onclick="javascript:window.location = '?opt_menu=<?php echo $_GET['opt_menu']; ?>
&amp;opt_seccion=<?php echo $_GET['opt_seccion']; ?>
';">
                                    <tr>
                                        <td style="padding: 0px; text-align: right;"><img src="../../../includes/imagenes/bt_left.gif" alt="" width="4" height="21" style="border-width: 0px;" /></td>
                                        <td class="btn_bg"><img src="../../../includes/imagenes/back.gif" width="16" height="16" /></td>
                                        <td class="btn_bg" style="padding: 0px 1px; white-space: nowrap;">Regresar</td>
                                        <td style="padding: 0px; text-align: left;"><img src="../../../includes/imagenes/bt_right.gif" alt="" width="4" height="21" style="border-width: 0px;" /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
    <?php echo '
        <script type="text/javascript">//<![CDATA[
        $(document).ready(function() {

            $("#lista_pedidos").hide();
            $("#lista_notas_entrega").hide();
            $("#lista_cotizaciones").hide();
            var click_pedido = click_nota = click_presupuesto = false;

            $("#pedidos").click(function() {
                $("#lista_notas_entrega").hide(150);
                $("#lista_cotizaciones").hide(150);
                if(!click_pedido){
                    click_pedido = true;
                    click_nota = click_presupuesto = false;
                    $("#pedidos").css("background-color", "buttonface");
                    $("#notas_entrega").css("background-color", "");
                    $("#cotizaciones").css("background-color", "");
                    $("#lista_pedidos").show(150);
                }
                else{
                    click_pedido = false;
                    $("#lista_pedidos").hide(150);
                    $("#pedidos").css("background-color", "");
                }
            });
            $("#notas_entrega").click(function() {
                $("#lista_cotizaciones").hide(150);
                $("#lista_pedidos").hide(150);
                if(!click_nota){
                    $("#lista_notas_entrega").show(150);
                    click_nota = true;
                    click_pedido = click_presupuesto = false;
                    $("#notas_entrega").css("background-color", "buttonface");
                    $("#pedidos").css("background-color", "");
                    $("#cotizaciones").css("background-color", "");
                }
                else{
                    click_nota = false;
                    $("#lista_notas_entrega").hide(150);
                    $("#notas_entrega").css("background-color", "");
                }
            });
            $("#cotizaciones").click(function() {
                $("#lista_notas_entrega").hide(150);
                $("#lista_pedidos").hide(150);
                if(!click_presupuesto){
                    $("#lista_cotizaciones").show(150);
                    click_presupuesto = true;
                    click_notas = click_pedido = false;
                    $("#cotizaciones").css("background-color", "buttonface");
                    $("#pedidos").css("background-color", "");
                    $("#notas_entrega").css("background-color", "");
                }
                else{
                    click_presupuesto = false;
                    $("#lista_cotizaciones").hide(150);
                    $("#cotizaciones").css("background-color", "");
                }
            });
        });
        //]]>
        </script>
    '; ?>

    <!--<Datos del cliente y vendedor>-->
    <div class="contenedor_factura" style="width:99%; float:left;">
        <div class="contenedor_factura" style="width:50%; height:15%; float:left;">
            <img src="../../../includes/imagenes/ico_user.gif" style="vertical-align: middle;"/>
            <span style="font-family:'Verdana';"><b>Cliente:&nbsp;</b><?php echo $this->_tpl_vars['datacliente'][0]['nombre']; ?>
</span>
            <input type="hidden" name="id_cliente" value="<?php echo $this->_tpl_vars['datacliente'][0]['id_cliente']; ?>
"/>
            <input type="hidden" name="id_fiscal" value="<?php echo $this->_tpl_vars['datacliente'][0]['rif']; ?>
"/>
            <input type="hidden" name="numero_control_factura" value="<?php echo $this->_tpl_vars['nro_factura']; ?>
"/>
            <br/>
            <img src="../../../includes/imagenes/ico_user.gif" style="vertical-align: middle;"/>
            <span style="font-family:'Verdana';"><b>Vendedor:</b></span>
            <select name="cod_vendedor" id="cod_vendedor">
                <?php echo smarty_function_html_options(array('output' => $this->_tpl_vars['option_output_vendedor'],'values' => $this->_tpl_vars['option_values_vendedor'],'selected' => $this->_tpl_vars['option_selected_vendedor']), $this);?>

            </select>
            <br/>
            <img src="../../../includes/imagenes/ico_user.gif" style="vertical-align: middle;"/>
            <span style="font-family:'Verdana';"><b>Estado de Entrega de Materiales</b></span>
            <select name="estado_entrega" id="estado_entrega">
                <option value="Entregado">Entregado</option>
                <option value="Pendiente">Pendiente</option>
            </select>
        </div>
        <div class="contenedor_factura" style="width:45%; height:15%; float:right;">
            <div class="subcontenedor_factura" id="cotizaciones">
                <img src="../../../includes/imagenes/4.png" title="Facturar Cotizaciones"/>
                <br/>
                <span style="font-family:'Verdana';"><b>Cotizaciones</b></span>
            </div>
            <div class="subcontenedor_factura" id="notas_entrega">
                <img src="../../../includes/imagenes/9.png" title="Facturar Notas de Entrega"/>
                <br/>
                <span style="font-family:'Verdana';"><b>Notas de Entrega</b></span>
            </div>
            <div class="subcontenedor_factura" id="pedidos">
                <img src="../../../includes/imagenes/02.png" title="Facturar Pedido"/>
                <br/>
                <span style="font-family:'Verdana';"><b>Pedidos</b></span>
            </div>
            <?php if ($this->_tpl_vars['espera'] == 1): ?>
                <div class="subcontenedor_factura" id="factura_espera">
                    <img src="../../../includes/imagenes/65.png" title="Facturas en espera"/><!--save_f2.png-->
                    <br/>
                    <span style="font-family:'Verdana';"><b>Facturas en espera</b></span>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div id="lista_pedidos" style="clear:left; background-color: buttonface;" class="contenedor_factura">
        <?php if ($this->_tpl_vars['pedidos']): ?>
            <table style="width:100%">
                <thead>
                    <tr>
                        <th class="tb-tit" style="text-align:center;">C&oacute;d. Pedido</th>
                        <th class="tb-tit" style="text-align:center;">Fecha de Emisi&oacute;n</th>
                        <th class="tb-tit" style="text-align:right;">Monto (<?php echo $this->_tpl_vars['DatosGenerales'][0]['moneda']; ?>
)</th>
                        <th class="tb-tit" style="text-align:right;">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $_from = $this->_tpl_vars['pedidos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['a'] => $this->_tpl_vars['pedido']):
?>
                        <tr>
                            <td style="text-align: center;"><?php echo $this->_tpl_vars['pedido']['cod_pedido']; ?>
</td>
                            <td style="text-align: center;"><?php echo $this->_tpl_vars['pedido']['fechaPedido']; ?>
</td>
                            <td style="text-align: right;"><?php echo $this->_tpl_vars['pedido']['totalizar_total_general']; ?>
</td>
                            <td style="text-align: right;">
                                <div id="seleccionarPedido">
                                    <input type="hidden" id="<?php echo $this->_tpl_vars['pedido']['id_pedido']; ?>
" name="<?php echo $this->_tpl_vars['pedido']['id_pedido']; ?>
" value="<?php echo $this->_tpl_vars['pedido']['id_pedido']; ?>
"/>
                                    <img title="Seleccionar Pedido Nro. <?php echo $this->_tpl_vars['pedido']['cod_pedido']; ?>
" src="../../../includes/imagenes/add.gif" style="cursor: pointer;"/>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </tbody>
            </table>
            <input type="hidden" id="pedido_seleccionado" name="pedido_seleccionado" value=""/>
        <?php else: ?>
            <div style="background-color: #f9c0c0; border: solid red; border-width: 1px; border-radius: 5px; font-style: italic; text-align: center;">
                Sin Registros Asociados
            </div>
        <?php endif; ?>
    </div>
    <div id="lista_notas_entrega" style="clear:left; background-color: buttonface;" class="contenedor_factura">
        <?php if ($this->_tpl_vars['notas_entrega']): ?>
            <table style="width:100%">
                <thead>
                    <tr>
                        <th class="tb-tit" style="text-align:center;">C&oacute;d. Nota Entrega</th>
                        <th class="tb-tit" style="text-align:center;">Fecha de Emisi&oacute;n</th>
                        <th class="tb-tit" style="text-align:right;">Monto (<?php echo $this->_tpl_vars['DatosGenerales'][0]['moneda']; ?>
)</th>
                        <th class="tb-tit" style="text-align:right;">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $_from = $this->_tpl_vars['notas_entrega']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['a'] => $this->_tpl_vars['nota_entrega']):
?>
                        <tr>
                            <td style="text-align:center;"><?php echo $this->_tpl_vars['nota_entrega']['cod_nota_entrega']; ?>
</td>
                            <td style="text-align:center;"><?php echo $this->_tpl_vars['nota_entrega']['fechaNotaEntrega']; ?>
</td>
                            <td style="text-align:right;"><?php echo $this->_tpl_vars['nota_entrega']['totalizar_total_general']; ?>
</td>
                            <td style="text-align:right;">
                                <div id="seleccionarNotaEntrega">
                                    <input type="hidden" id="<?php echo $this->_tpl_vars['nota_entrega']['id_nota_entrega']; ?>
" name="<?php echo $this->_tpl_vars['nota_entrega']['id_nota_entrega']; ?>
" value="<?php echo $this->_tpl_vars['nota_entrega']['id_nota_entrega']; ?>
"/>
                                    <img title="Seleccionar Nota Entrega Nro. <?php echo $this->_tpl_vars['nota_entrega']['cod_nota_entrega']; ?>
" src="../../../includes/imagenes/add.gif" style="cursor: pointer;"/>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </tbody>
            </table>
            <input type="hidden" id="nota_entrega_seleccionada" name="nota_entrega_seleccionada" value=""/>
        <?php else: ?>
            <div style="background-color: #f9c0c0; border: solid red; border-width: 1px; border-radius: 5px; font-style: italic; text-align: center;">
                Sin Registros Asociados
            </div>
        <?php endif; ?>
    </div>
    <div id="lista_cotizaciones" style="clear:left; background-color: buttonface;" class="contenedor_factura">
        <?php if ($this->_tpl_vars['cotizaciones']): ?>
            <table style="width:100%">
                <thead>
                    <tr>
                        <th class="tb-tit" style="text-align:center;">C&oacute;d. Cotizaci&oacute;n</th>
                        <th class="tb-tit" style="text-align:center;">Fecha de Emisi&oacute;n</th>
                        <th class="tb-tit" style="text-align:right;">Monto (<?php echo $this->_tpl_vars['DatosGenerales'][0]['moneda']; ?>
)</th>
                        <th class="tb-tit" style="text-align:right;">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $_from = $this->_tpl_vars['cotizaciones']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['a'] => $this->_tpl_vars['cotizacion']):
?>
                        <tr>
                            <td style="text-align:center;"><?php echo $this->_tpl_vars['cotizacion']['cod_cotizacion']; ?>
</td>
                            <td style="text-align:center;"><?php echo $this->_tpl_vars['cotizacion']['fecha_cotizacion']; ?>
</td>
                            <td style="text-align:right;"><?php echo $this->_tpl_vars['cotizacion']['totalizar_total_general']; ?>
</td>
                            <td style="text-align:right;">
                                <div id="seleccionarCotizacion">
                                    <input type="hidden" id="<?php echo $this->_tpl_vars['cotizacion']['id_cotizacion']; ?>
" name="<?php echo $this->_tpl_vars['cotizacion']['id_cotizacion']; ?>
" value="<?php echo $this->_tpl_vars['cotizacion']['id_cotizacion']; ?>
"/>
                                    <img title="Seleccionar Cotizaci&oacute;n Nro. <?php echo $this->_tpl_vars['cotizacion']['cod_cotizacion']; ?>
" src="../../../includes/imagenes/add.gif" style="cursor: pointer;"/>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </tbody>
            </table>
            <input type="hidden" id="cotizacion_seleccionada" name="cotizacion_seleccionada" value=""/>
        <?php else: ?>
            <div style="background-color: #f9c0c0; border: solid red; border-width: 1px; border-radius: 5px; font-style: italic; text-align: center;">
                Sin Registros Asociados
            </div>
        <?php endif; ?>
    </div>
    <!--<Datos de la factura>-->
    <div style="clear:left;" class="contenedor_factura">
        <div style="float: left; margin-right: 20px;">
            <!--Fecha: -->
            <input type="hidden" name="input_fechaFactura" id="input_fechaFactura" value='<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
'/>
            <!--div style="color:#4e6a48" id="fechaFactura"><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%Y") : smarty_modifier_date_format($_tmp, "%d-%m-%Y")); ?>
</div-->
        </div>
        <!--div style=" margin-right: 20px;">
            Factura Numero<div style="font-size:15px;color:red;" id="numFactura"><?php echo $this->_tpl_vars['nro_factura']; ?>
</div>
        </div-->
        <?php echo '
            <script type="text/javascript">//<![CDATA[
                $(document).ready(function() {
                    $("#detalle_factura_").show();
                    sw = 1;
                    $.setValoresInput = function(nombreObjetoDestino, nombreObjetoActual) {
                        $(nombreObjetoDestino).attr("value", $(nombreObjetoActual).val());
                    };
                    $("#lick_detalle").click(function() {
                        if (sw === 0) {
                            $("#detalle_factura_").show(150);
                            $(this).html("<div><img style=\\"vertical-align: middle\\" src=\\"../../../includes/imagenes/drop-add2.gif\\"> Ocultar detalles</div>");
                            sw = 1;
                        } else {
                            if (sw === 1) {
                                $("#detalle_factura_").hide(150);
                                $(this).html("<div><img style=\\"vertical-align: middle\\" src=\\"../../../includes/imagenes/drop-add.gif\\"> Ver detalles</div>");
                                sw = 0;
                            }
                        }
                    });
                });//]]>
            </script>
        '; ?>

        <div id="lick_detalle" style="cursor:pointer; width:150px;"><img style="vertical-align: middle;" src="../../../includes/imagenes/drop-add2.gif"/> Ocultar detalles</div>
        <div id="detalle_factura_">
            <br/>
            <div class="resumen">
                Sub-Total
                <div style="font-size:20px; color:#2e931a;" id="subTotal">0.00 <?php echo $this->_tpl_vars['DatosGenerales'][0]['moneda']; ?>
</div>
                <input type="hidden" name="input_subtotal" id="input_subtotal" value=""/>
            </div>
            <div class="resumen">
                Descuento
                <input type="hidden" name="input_descuentosItemFactura" id="input_descuentosItemFactura" value=""/>
                <div style="font-size:20px; color:red; text-decoration:line-through;" id="descuentosItemFactura">0.00 <?php echo $this->_tpl_vars['DatosGenerales'][0]['moneda']; ?>
</div>
            </div>
            <div class="resumen">
                Monto Items
                <input type="hidden" name="input_montoItemsFactura" id="input_montoItemsFactura" value=""/>
                <div style="font-size:20px; color:#2e931a;" id="montoItemsFactura">0.00 <?php echo $this->_tpl_vars['DatosGenerales'][0]['moneda']; ?>
</div>
            </div>
            <div class="resumen">
                <?php echo $this->_tpl_vars['DatosGenerales'][0]['nombre_impuesto_principal']; ?>

                <input type="hidden" name="input_ivaTotalFactura" id="input_ivaTotalFactura" value=""/>
                <div style="font-size:20px; color:#2e931a;" id="ivaTotalFactura">0.00 <?php echo $this->_tpl_vars['DatosGenerales'][0]['moneda']; ?>
</div>
            </div>
            <div class="resumen">
                Total
                <input type="hidden" name="input_TotalTotalFactura" id="input_TotalTotalFactura" value=""/>
                <div style="font-size:20px; color:#00005e;" id="TotalTotalFactura">0.00 <?php echo $this->_tpl_vars['DatosGenerales'][0]['moneda']; ?>
</div>
            </div>
            <br/><br/><br/>
            <input type="hidden" name="input_cantidad_items" id="input_cantidad_items" value=""/>
            <div class="span_cantidad_items">
                <span style="font-size: 15px; font-style: italic;">Cantidad de Items: 0</span>
            </div>
        </div>
    </div>
    <!--Tab de pasos de factura-->
    <?php echo '
        <script type="text/javascript">//<![CDATA[
            $(document).ready(function() {
                $("#contenedorTAB_factura_paso2").hide();
                $("#tab1_pasos").click(function() {
                    $("#contenedorTAB_factura_paso1").show();
                    $("#contenedorTAB_factura_paso2").hide();
                    $("#tab1_pasos").removeClass("click_paso_OFF").addClass("click_paso_ON").find("img").attr("src", "../../../includes/imagenes/113.png");
                    $("#tab2_pasos").removeClass("click_paso_OFF").addClass("click_paso_OFF").find("img").attr("src", "../../../includes/imagenes/6_off.png");
                });
                $("#tab2_pasos").click(function() {
                    cant_filas = $(".grid table.lista tbody").find("tr").length;
                    if (cant_filas === 0) {
                        Ext.MessageBox.show({
                            title: \'Notificacion\',
                            msg: "Debe agregar un Item para esta operacion",
                            buttons: Ext.MessageBox.OK,
                            animEl: \'tab2_pasos\',
                            icon: \'ext-mb-warning\'
                        });
                        return false;
                    }
                    $(".ctotalizar_").each(function() {
                        if ($(this).val() === "") {
                            $(this).val("");
                        }
                    });
                    $.totalizarFactura();

                    $.setValoresInput("#input_totalizar_sub_total", "#totalizar_sub_total");
                    $.setValoresInput("#input_totalizar_descuento_parcial", "#totalizar_descuento_parcial");
                    $.setValoresInput("#input_totalizar_total_operacion", "#totalizar_total_operacion");

                    $.setValoresInput("#input_totalizar_pdescuento_global", "#totalizar_pdescuento_global");
                    $.setValoresInput("#input_totalizar_descuento_global", "#totalizar_descuento_global");
                    $.setValoresInput("#input_totalizar_monto_iva", "#totalizar_monto_iva");
                    $.setValoresInput("#input_totalizar_total_retencion", "#totalizar_total_retencion");
                    $.setValoresInput("#input_totalizar_total_general", "#totalizar_total_general");

                    //#FORMA PAGO
                    $.setValoresInput("#input_totalizar_monto_cancelar", "#totalizar_monto_cancelar");
                    $.setValoresInput("#input_totalizar_saldo_pendiente", "#totalizar_saldo_pendiente");
                    $.setValoresInput("#input_totalizar_cambio", "#totalizar_cambio");

                    //#INSTRUMENTO DE PAGO
                    $.setValoresInput("#input_totalizar_monto_efectivo", "#totalizar_monto_efectivo");
                    $.setValoresInput("#input_totalizar_monto_cheque", "#totalizar_monto_cheque");
                    $.setValoresInput("#input_totalizar_nro_cheque", "#totalizar_nro_cheque");
                    $.setValoresInput("#input_totalizar_nombre_banco", "#totalizar_nombre_banco");
                    $.setValoresInput("#input_totalizar_monto_tarjeta", "#totalizar_monto_tarjeta");
                    $.setValoresInput("#input_totalizar_nro_tarjeta", "#totalizar_nro_tarjeta");
                    $.setValoresInput("#input_totalizar_tipo_tarjeta", "#totalizar_tipo_tarjeta");
                    $.setValoresInput("#input_totalizar_monto_deposito", "#totalizar_monto_deposito");
                    $.setValoresInput("#input_totalizar_nro_deposito", "#totalizar_nro_deposito");
                    $.setValoresInput("#input_totalizar_banco_deposito", "#totalizar_banco_deposito");

                    $("#contenedorTAB_factura_paso2").show();
                    $("#contenedorTAB_factura_paso1").hide();

                    $("#tab2_pasos").removeClass("click_paso_OFF").addClass("click_paso_ON").find("img").attr("src", "../../../includes/imagenes/6.png");
                    $("#tab1_pasos").removeClass("click_paso_OFF").addClass("click_paso_OFF").find("img").attr("src", "../../../includes/imagenes/113_OFF.png");
                });
            });//]]>
        </script>
    '; ?>

    <div id="tabs_pasos">
        <div id="tab1_pasos" class="click_paso_ON">
            <img src="../../../includes/imagenes/113.png" width="20" height="20" style="vertical-align: middle;"/><b>PASO 1</b>
        </div>
        <div id="tab2_pasos" class="click_paso_OFF">
            <img src="../../../includes/imagenes/6_off.png" width="20" height="20" style="vertical-align: middle;"/><b>PASO 2</b>
        </div>
    </div>
    <br/><br/><br/>
    <div id="contenedorTAB_factura_paso1">
        <table style="width:100%">
            <tr>
                <td colspan="2">
                    <table style="cursor: pointer;" class="MostrarTabla" id="MostrarTabla">
                        <tr>
                            <td style="padding: 0px; float: right;"><img src="../../../includes/imagenes/bt_left.gif" alt="" width="4" height="21" style="border-width: 0px;"/></td>
                            <td class="btn_bg"><img id="ImgMensaje" src="../../../includes/imagenes/drop-add.gif" width="16" height="16"/></td>
                            <td class="btn_bg" style="padding: 0px 1px; width:120px; white-space: nowrap;"><div id="LabelMensaje">Agregar Nuevo Item</div></td>
                            <td style="padding: 0px; float: left;"><img src="../../../includes/imagenes/bt_right.gif" alt="" width="4" height="21" style="border-width: 0px;"/></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr style="vertical-align:top;" id="PanelFactura">
                <td colspan="2" style="vertical-align: central;">
                    <div id="contenedorTAB">
                        <table>
                            <tr>
                                <td style="vertical-align:top;">
                                    <!-- Inicio Item -->
                                    <div id="div_tab1">
                                        <table style="width:100%">
                                            <!--tr style="border:1px solid #f3f3f3;">
                                                <td colspan="2" style="padding:10px; background-color:white; vertical-align:top;">
                                                    <a href="#" style="color: #00005e; text-decoration: underline;" id="seleccionItem">
                                                        <img style="vertical-align: middle;" src="../../../includes/imagenes/ico_search_1.gif"/>
                                                        <b>Buscar Producto/Servicio</b>
                                                    </a>
                                                </td>
                                            </tr-->
                                            <tr style="border:1px solid #f3f3f3;">
                                                <td style="background-color:#5084a9; color:white; padding-left:20px; padding-top:5px; vertical-align:top; width:100px;">
                                                    <div id="descripcion_tipo_forma">
                                                        <span style="font-family:'Verdana'; font-weight: bold;">Item</span>
                                                    </div>
                                                </td>
                                                <td style="background-color:white; padding:5px; vertical-align: top;">
                                                    <input type="hidden" name="cod_item_forma"/>
                                                    <input type="hidden" name="id_item"/>
                                                    <input type="text" name="descripcion_input_item" id="descripcion_item" size="50" style="font-family:'Verdana'; font-weight: bold;" />
                                                    <!--Originalmente el input (arriba) era de tipo hidden sin id.-->
                                                    <!--Para agregar la funcionalidad de ediciÃ³n de la descripciÃ³n del item se habilitÃ³-->
                                                    <!--AsÃ­mismo se deshabilitÃ³ el div (abajo)-->
                                                    <!--div id="descripcion_item"></div-->
                                                </td>
                                                <!--td style="background-color:white; vertical-align:top;">
                                                    <select name="cod_item">
                                                    </select>
                                                </td-->
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <table style="width:100%;">
                                                        <tr style="border:1px solid #f3f3f3;">
                                                            <td style="background-color:#5084a9; color:white; padding-left:20px; padding-top:5px; vertical-align:top; width:100px;">
                                                                <span style="font-family:'Verdana';"><b>Almac&eacute;n</b></span>
                                                            </td>
                                                            <td style="background-color:white; vertical-align:top;">
                                                                <select name="cod_almacen" id="cod_almacen">
                                                                </select>
                                                            </td>
                                                            <td style="background-color:#5084a9; color:white; padding-left:20px; padding-top:5px; vertical-align:top; width:100px;">
                                                                <span style="font-family:'Verdana';"><b>Tipo Precio</b></span>
                                                            </td>
                                                            <td style="background-color:white; vertical-align:top;">
                                                                <select name="cod_tipo_precio" id="cod_tipo_precio">
                                                                    <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_tipo_precio'],'output' => $this->_tpl_vars['option_output_tipo_precio'],'selected' => $this->_tpl_vars['option_selected_tipo_precio']), $this);?>

                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <!--tr style="border:1px solid #f3f3f3;">
                                                            <td style="background-color:white; vertical-align:top;" colspan="4">
                                                                <div id="LabelCantidadExistente"></div>
                                                            </td>
                                                        </tr-->
                                                        <tr style="border:1px solid #f3f3f3;">
                                                            <td style="background-color:#5084a9; color:white; padding-left:20px; padding-top:5px; vertical-align:top; width:100px;">
                                                                <span style="font-family:'Verdana';"><b>Existencia</b></span>
                                                            </td>
                                                            <td style="background-color:white; vertical-align:top;" colspan="3">
                                                                <!--input type="text" size="10" name="cantidadExistente" value="" id="cantidadExistente"/-->
                                                                <div id="LabelCantidadExistente"></div>
                                                            </td>
                                                        </tr>
                                                        <tr style="border:1px solid #f3f3f3;">
                                                            <td style="background-color:#5084a9; color:white; padding-left:20px; padding-top:5px; vertical-align:top; width:100px;">
                                                                <span style="font-family:'Verdana';"><b>Cantidad</b></span>
                                                            </td>
                                                            <td style="background-color:white; vertical-align:top;">
                                                                <input type="text" size="10" name="cantidadPedido" value="0" id="cantidadPedido">
                                                            </td>
                                                            <td style="background-color:#5084a9; color:white; padding-left:20px; padding-top:5px; vertical-align:top; width:100px;">
                                                                <span style="font-family:'Verdana';"><b>Precio sin <?php echo $this->_tpl_vars['DatosGenerales'][0]['nombre_impuesto_principal']; ?>
</b></span>
                                                            </td>
                                                            <td style="background-color:white; vertical-align:top;">
                                                                <input type="text" size="10"  name="precioProductoPedido" value="0" readonly id="precioProductoPedido"/>
                                                            </td>
                                                        </tr>
                                                        <tr style="border:1px solid #f3f3f3;">
                                                            <td style="background-color:#5084a9; color:white; padding-left:20px; padding-top:5px; vertical-align:top; width:100px;">
                                                                <span style="font-family:'Verdana';"><b>Descuento</b></span>
                                                            </td>
                                                            <td style="background-color:white; vertical-align:top;">
                                                                <input type="text" name="descuentoPedido" value="0" title="Descuento maximo del cliente: <?php echo $this->_tpl_vars['datacliente'][0]['porc_parcial']; ?>
 %" size="10"  id="descuentoPedido"/>     %
                                                            </td>
                                                            <td style="background-color:#5084a9; color:white; padding-left:20px; padding-top:5px; vertical-align:top; width:100px;">
                                                                <span style="font-family:'Verdana';"><b>Monto Descto.</b></span>
                                                            </td>
                                                            <td style="background-color:white; vertical-align:top;">
                                                                <input type="text" name="montodescuentoPedido"  value="0"  size="10"  readonly id="montodescuentoPedido"/>
                                                            </td>
                                                        </tr>
                                                        <tr style="border:1px solid #f3f3f3;">
                                                            <td style="background-color:white; vertical-align:top;">
                                                            </td>
                                                            <td style="background-color:white; vertical-align:top;">
                                                            </td>
                                                            <td style="background-color:white;" valign="center">
                                                                Total
                                                            </td>
                                                            <td colspan="2" style="background-color:white; vertical-align:top;">
                                                                <input type="text" value="0" size="10" name="totalPedido" readonly id="totalPedido"/>
                                                            </td>
                                                        </tr>
                                                        <tr style="border:1px solid #f3f3f3;">
                                                            <td style="background-color:white; vertical-align:top;">
                                                            </td>
                                                            <td style="background-color:white; vertical-align:top;">
                                                            </td>
                                                            <td style="background-color:white; vertical-align: central;">
                                                            </td>
                                                            <td colspan="2" style="background-color:white; vertical-align:top;">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><span style="float:left"></span></td>
                                                                            <td style="width:75px;">
                                                                                <table style="cursor: pointer;" class="btn_bg" id="addTabla">
                                                                                    <tr>
                                                                                        <td style="padding: 0px; text-align: right;"><img src="../../../includes/imagenes/bt_left.gif" alt="" width="4" height="21" style="border-width: 0px;" /></td>
                                                                                        <td class="btn_bg"><img src="../../../includes/imagenes/drop-add.gif" width="16" height="16" /></td>
                                                                                        <td class="btn_bg" style="padding: 0px 1px; white-space: nowrap;">Incluir</td>
                                                                                        <td style="padding: 0px; text-align: left;"><img src="../../../includes/imagenes/bt_right.gif" alt="" width="4" height="21" style="border-width: 0px;" /></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td width="75">
                                                                                <table style="cursor: pointer;" class="btn_bg" id="cancelaradd">
                                                                                    <tr>
                                                                                        <td style="padding: 0px; text-align: right;"><img src="../../../includes/imagenes/bt_left.gif" alt="" width="4" height="21" style="border-width: 0px;" /></td>
                                                                                        <td class="btn_bg"><img src="../../../includes/imagenes/drop-no.gif" width="16" height="16" /></td>
                                                                                        <td class="btn_bg" style="padding: 0px 1px; white-space: nowrap;">Cancelar</td>
                                                                                        <td style="padding: 0px; text-align: left;"><img src="../../../includes/imagenes/bt_right.gif" alt="" width="4" height="21" style="border-width: 0px;" /></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- /Fin Inicio Item -->
                                </td>
                                <td style="vertical-align:top;">
                                    <!-- Inicio Detalle Item -->
                                    <div>
                                        <table style="border: 1px solid #949494;">
                                            <tr>
                                                <td style="background-color:white; vertical-align: top;">
                                                    <table id="tabla_total" style="background-color: white;">
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align: center; font-size: 20px; color: #00005e; font-style: italic;">Precio</th>
                                                                <th style="text-align: center; font-size: 20px; color: #00005e; font-style: italic;">Con <?php echo $this->_tpl_vars['DatosGenerales'][0]['nombre_impuesto_principal']; ?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input readonly class="campo_decimal" id="fila_precio1" name="precio1" value="<?php echo $this->_tpl_vars['campos_item'][0]['precio1']; ?>
" type="text" size="10" style="font-size: 20px; text-align: right; padding-right: 20px;"/></td>
                                                                <td><input readonly class="campo_decimal" id="fila_precio1_iva" value="<?php echo $this->_tpl_vars['campos_item'][0]['coniva1']; ?>
" name="coniva1" type="text" size="10" style="font-size: 20px; text-align: right; padding-right: 20px;"/></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input readonly class="campo_decimal" id="fila_precio2" name="precio2" value="<?php echo $this->_tpl_vars['campos_item'][0]['precio2']; ?>
" type="text" size="10" style="font-size: 20px; text-align: right; padding-right: 20px;"/></td>
                                                                <td><input readonly class="campo_decimal" id="fila_precio2_iva" value="<?php echo $this->_tpl_vars['campos_item'][0]['coniva2']; ?>
" name="coniva2" type="text" size="10" style="font-size: 20px; text-align: right; padding-right: 20px;"/></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input readonly class="campo_decimal" id="fila_precio3" name="precio3" value="<?php echo $this->_tpl_vars['campos_item'][0]['precio3']; ?>
" type="text" size="10" style="font-size: 20px; text-align: right; padding-right: 20px;"/></td>
                                                                <td><input readonly class="campo_decimal" id="fila_precio3_iva" value="<?php echo $this->_tpl_vars['campos_item'][0]['coniva3']; ?>
" name="coniva3" type="text" size="10" style="font-size: 20px; text-align: right; padding-right: 20px;"/></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div id="LabelDetalleItem"></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- /Fin Detalle Item -->
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
        <div id="contenedorTAB">
            <div id="div_tab1">
                <div class="grid">
                    <table style="width:100%;" class="lista">
                        <thead>
                            <tr>
                                <th style="text-align: center" class="tb-tit">C&oacute;digo</th>
                                <th style="text-align: center" class="tb-tit">Descripci&oacute;n</th>
                                <th style="text-align: center" class="tb-tit">Cantidad</th>
                                <th style="text-align: center" title="Precio sin <?php echo $this->_tpl_vars['DatosGenerales'][0]['nombre_impuesto_principal']; ?>
" class="tb-tit">Precio</th>
                                <th style="text-align: center" class="tb-tit">Descuento</th>
                                <th style="text-align: center" title="% del Descuento" class="tb-tit">%</th>
                                <th style="text-align: center" class="tb-tit">Total Sin <?php echo $this->_tpl_vars['DatosGenerales'][0]['nombre_impuesto_principal']; ?>
</th>
                                <th style="text-align: center" class="tb-tit"><?php echo $this->_tpl_vars['DatosGenerales'][0]['nombre_impuesto_principal']; ?>
</th>
                                <th style="text-align: center" class="tb-tit">Total con <?php echo $this->_tpl_vars['DatosGenerales'][0]['nombre_impuesto_principal']; ?>
</th>
                                <th style="text-align: center" class="tb-tit">Opci&oacute;n</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr class="sf_admin_row_1">
                                <td colspan="10">
                                    <div class="span_cantidad_items">
                                        <span style="font-size: 14px; font-style: italic;">Cantidad de Items: 0</span>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--</contenedor factura paso 1>-->
    <!--</contenedor factura paso 2>-->
    <div id="contenedorTAB_factura_paso2">
        <div id="divTotalizarFactura">
            <div id="tabs">
                <table style="margin-left:20px;" >
                    <tr style="height:25px;">
                        <td id="tab1" class="tab">
                            <img src="../../../includes/imagenes/1.png" width="20" height="20" style="vertical-align: middle;"/><b>Totalizar Factura </b>&nbsp;
                        </td>
                        <td>&nbsp;&nbsp;</td>
                        <td id="tab2" class="tab">
                            <img src="../../../includes/imagenes/1.png" width="20" height="20" style="vertical-align: middle;"/><b>Retenciones y Forma de Pago</b>&nbsp;
                        </td>
                    </tr>
                </table>
            </div>
            <div id="contenedorTAB21">
                <!-- TAB1 -->
                <div class="tabpanel1">
                    <table>
                        <tr>
                            <td colspan="3" class="tb-head" style="width:50%;">
                                Sub Total
                            </td>
                            <td>
                                <input type="text" readonly name="totalizar_sub_total" value="" id="totalizar_sub_total"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="tb-head">
                                Descuento Parcial
                            </td>
                            <td>
                                <input type="text" readonly name="totalizar_descuento_parcial" id="totalizar_descuento_parcial"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="tb-head">
                                Total Operaci&oacute;n
                            </td>
                            <td>
                                <input type="text" readonly name="totalizar_total_operacion" id="totalizar_total_operacion"/>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3" class="tb-head" style="vertical-align:top;">
                                Descuento Global
                            </td>
                            <td>
                                <input type="text" class="ctotalizar_" size="2" value="0" name="totalizar_pdescuento_global" id="totalizar_pdescuento_global"/> % = <?php echo $this->_tpl_vars['DatosGenerales'][0]['moneda']; ?>

                                <input type="text" class="ctotalizar_" style="width: 100px" value="0" name="totalizar_descuento_global" id="totalizar_descuento_global"/>
                            </td>
                        </tr>
                        <!--tr>
                        <td colspan="3" class="tb-head">
                        Total Neto
                        </td>
                        <td>
                            <input type="text" value="0" name="totalizar_neto" id="totalizar_neto">
                        </td>
                        </tr-->
                        <tr>
                            <td colspan="3" class="tb-head" style="width:50%;">
                                Base Imponible
                            </td>
                            <td>
                                <input readonly type="text" value="0" name="totalizar_base_imponible" id="totalizar_base_imponible"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="tb-head" style="vertical-align:top;">
                                Monto <?php echo $this->_tpl_vars['DatosGenerales'][0]['nombre_impuesto_principal']; ?>

                            </td>
                            <td>
                                <input type="text" readonly name="totalizar_monto_iva" id="totalizar_monto_iva"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="tb-head" style="vertical-align:top;">
                                Monto Exento de <?php echo $this->_tpl_vars['DatosGenerales'][0]['nombre_impuesto_principal']; ?>

                            </td>
                            <td>
                                <input type="text" readonly name="totalizar_monto_exento" id="totalizar_monto_exento"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="tb-head" style="width:50%;">
                                Total General
                            </td>
                            <td>
                                <input type="text" readonly name="totalizar_total_general" id="totalizar_total_general"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="tb-head" style="width:50%;">
                                Total Retenciones
                            </td>
                            <td>
                                <input type="text" readonly name="totalizar_total_retencion" value="0" id="totalizar_total_retencion"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="tb-head" style="width:50%;">
                                Total Factura Menos Retenciones
                            </td>
                            <td>
                                <input type="text" readonly name="totalizar_total_factura" value="0" id="totalizar_total_factura"/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tabpanel2">
                    <table>
                        <?php $_from = $this->_tpl_vars['tipo_impuesto']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['a'] => $this->_tpl_vars['impuesto']):
?>
                            <tr>
                                <td colspan="4" class="tb-head" style="text-align:right; width:50%;">
                                    <b><?php echo $this->_tpl_vars['impuesto']['descripcion']; ?>
</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="tb-head" style="width:50%;">
                                    Base para Retenci&oacute;n
                                </td>
                                <td colspan="2">
                                    <?php if ($this->_tpl_vars['impuesto']['cod_tipo_impuesto'] == 1): ?>
                                        <input type="text" name="totalizar_monto_iva" id="totalizar_monto_iva" readonly/>
                                    <?php else: ?>
                                        <input type="text" name="totalizar_base_imponible" id="totalizar_base_imponible"/>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="tb-head" style="width:50%;">
                                    Porcentaje de Retenci&oacute;n
                                </td>
                                <td colspan="2">
                                    <input type="text" readonly name="totalizar_pbase_retencion<?php echo $this->_tpl_vars['impuesto']['cod_tipo_impuesto']; ?>
" value="0" id="totalizar_pbase_retencion<?php echo $this->_tpl_vars['impuesto']['cod_tipo_impuesto']; ?>
"/> %
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="tb-head" style="width:50%;">
                                    Monto Retenci&oacute;n
                                </td>
                                <td colspan="2">
                                    <input type="text" readonly name="totalizar_monto_retencion<?php echo $this->_tpl_vars['impuesto']['cod_tipo_impuesto']; ?>
" value="0" id="totalizar_monto_retencion<?php echo $this->_tpl_vars['impuesto']['cod_tipo_impuesto']; ?>
"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="tb-head" style="width:50%;">
                                    Descripci&oacute;n de Retenci&oacute;n
                                </td>
                                <td colspan="2">
                                    <select name="cod_impuesto<?php echo $this->_tpl_vars['a']+1; ?>
" id="cod_impuesto<?php echo $this->_tpl_vars['a']+1; ?>
">
                                        <option>Seleccione una Retenci&oacute;n</option>
                                        <?php $_from = $this->_tpl_vars['dato_impuesto']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['miItem']):
?>
                                            <?php if ($this->_tpl_vars['impuesto']['cod_tipo_impuesto'] == $this->_tpl_vars['miItem']['cod_tipo_impuesto']): ?>
                                                <option value="<?php echo $this->_tpl_vars['miItem']['cod_impuesto']; ?>
">
                                                    <?php echo $this->_tpl_vars['miItem']['descripcion']; ?>

                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?>
                                    </select>
                                    <input type="hidden" size="5" name="tipo_impuesto" value="<?php echo $this->_tpl_vars['impuesto']['cod_tipo_impuesto']; ?>
" id="tipo_impuesto"/>
                                    <!-- Siguientes 2 antes abajo-->
                                    <input type="hidden" size="5" name="cod_tipo_impuesto<?php echo $this->_tpl_vars['impuesto']['cod_tipo_impuesto']; ?>
" value="<?php echo $this->_tpl_vars['impuesto']['cod_tipo_impuesto']; ?>
" id="cod_tipo_impuesto<?php echo $this->_tpl_vars['impuesto']['cod_tipo_impuesto']; ?>
"/>
                                    <input type="hidden" size="5" name="i<?php echo $this->_tpl_vars['impuesto']['cod_tipo_impuesto']; ?>
" value="<?php echo $this->_tpl_vars['a']+1; ?>
" id="i<?php echo $this->_tpl_vars['impuesto']['cod_tipo_impuesto']; ?>
"/>
                                </td>
                                <!--td><input type="hidden" size="5" name="cod_tipo_impuesto<?php echo $this->_tpl_vars['impuesto']['cod_tipo_impuesto']; ?>
" value="<?php echo $this->_tpl_vars['impuesto']['cod_tipo_impuesto']; ?>
" id="cod_tipo_impuesto<?php echo $this->_tpl_vars['impuesto']['cod_tipo_impuesto']; ?>
"/></td>
                                <td><input type="hidden" size="5" name="i<?php echo $this->_tpl_vars['impuesto']['cod_tipo_impuesto']; ?>
" value="<?php echo $this->_tpl_vars['a']+1; ?>
" id="i<?php echo $this->_tpl_vars['impuesto']['cod_tipo_impuesto']; ?>
"/></td-->
                            </tr>
                        <?php endforeach; endif; unset($_from); ?>
                        <tr>
                            <td colspan="4" class="tb-head" style="text-align: right; width: 50%;">
                                <b>Total Retenciones</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head" style="vertical-align:top;">
                                Monto Retenci&oacute;n de Impuestos
                            </td>
                            <td colspan="2">
                                <input type="text" readonly name="totalizar_total_retencion" value="0" id="totalizar_total_retencion"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="tb-head" style="text-align:right; width:50%;">
                                <b>Total Facturaci&oacute;n</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head" style="width:50%;">
                                Monto a Cancelar
                            </td>
                            <td colspan="2">
                                <input type="text" class="ctotalizar_" name="totalizar_monto_cancelar" value="0" id="totalizar_monto_cancelar"/>
                                <input type="radio" name="forma_pago" id="pago_contado" value="contado" checked /> Contado
                                <input type="radio" name="forma_pago" id="pago_credito" value="credito" /> Cr&eacute;dito
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head" style="vertical-align:top; width:50%;">
                                Saldo Pendiente
                            </td>
                            <td colspan="2">
                                <input type="text" class="ctotalizar_" style="background-color: #eaeaea;" readonly name="totalizar_saldo_pendiente" value="0" id="totalizar_saldo_pendiente"/>
                                <div id="info_pago_pendiente" style="border: 1px solid #dbdbdb;background-color:#fbfbfb;margin-left:5px;margin-top:5px;margin-bottom:7px;padding-left:5px;color:#504b4b;">
                                    <b>Especifique los siguientes campos:</b>
                                    <br/><br/>
                                    <img align="absmiddle" style="margin-bottom:5px;" src="../../../includes/imagenes/ew_calendar.gif"/> Fecha Vencimiento: <br/>
                                    <input type="text" size="10" readonly style="border: 1px solid black; margin-bottom:5px;" value="0000-00-00" id="fecha_vencimiento" name="fecha_vencimiento" class=""/>  Ej: 2009-11-01
                                    <?php echo '
                                        <script type="text/javascript">//<![CDATA[
                                            var cal = Calendar.setup({
                                                onSelect: function(cal) {
                                                    cal.hide();
                                                }
                                            });
                                            cal.manageFields("fecha_vencimiento", "fecha_vencimiento", "%Y-%m-%d");
                                            //]]></script>
                                        '; ?>

                                    <br/>
                                    <img align="absmiddle" src="../../../includes/imagenes/ico_view.gif"/> Observaci&oacute;n:<br/>
                                    <textarea name="observacion"></textarea>
                                    <br/>
                                    <img align="absmiddle" src="../../../includes/imagenes/ico_user.gif"/> Persona Contacto:<br/>
                                    <input type="text" name="persona_contacto" class=""/><br/>
                                    <img align="absmiddle" src="../../../includes/imagenes/ico_cel.gif"/> Tel&eacute;fono:<br/>
                                    <input type="text" name="telefono"/><br/>
                                    <span style="font-size:9px;color:red;">
                                        Nota: Debe llenar todos los campos.
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head" style="width:50%;">
                                Cambio
                            </td>
                            <td colspan="2">
                                <input type="text" class="ctotalizar_" style="background-color: #eaeaea;" readonly name="totalizar_cambio" value="0" id="totalizar_cambio"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="tb-head" style="text-align:right; width:50%;">
                                <b>Instrumento de Pago</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head" style="width:50%;">
                                En Efectivo
                            </td>
                            <td colspan="2">
                                <input type="text" class="ctotalizar_" value="0" name="totalizar_monto_efectivo" id="totalizar_monto_efectivo"/>  (*)
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head" style="width:50%;">Cheque</td>
                            <td colspan="2">
                                <select name="opt_cheque" id="opt_cheque">
                                    <option value="0">No</option>
                                    <option value="1">S&iacute;</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head" style="width:50%;">Monto Cheque</td>
                            <td colspan="2">
                                <input type="text" class="ctotalizar_" value="0" name="totalizar_monto_cheque" id="totalizar_monto_cheque"/> (*)
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head" style="width:50%;">Nro. Cheque</td>
                            <td colspan="2">
                                <input type="text" class="ctotalizar_" value="0" name="totalizar_nro_cheque" id="totalizar_nro_cheque"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" width="50%" class="tb-head">Banco</td>
                            <td colspan="2">
                                <select class="ctotalizar_" name="totalizar_nombre_banco" id="totalizar_nombre_banco" >
                                    <option value="0">S/I</option>
                                    <?php echo smarty_function_html_options(array('output' => $this->_tpl_vars['option_output_banco'],'values' => $this->_tpl_vars['option_values_banco']), $this);?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head" style="width:50%;">Tarjeta</td>
                            <td colspan="2">
                                <select name="opt_tarjeta" id="opt_tarjeta">
                                    <option value="0">No</option>
                                    <option value="1">S&iacute;</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head" style="width:50%;">Monto Tarjeta</td>
                            <td colspan="2">
                                <input type="text" value="0" class="ctotalizar_" name="totalizar_monto_tarjeta" id="totalizar_monto_tarjeta"/>  (*)
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head" style="width:50%;">Nro. Tarjeta</td>
                            <td colspan="2">
                                <input type="text" value="0" class="ctotalizar_" name="totalizar_nro_tarjeta" id="totalizar_nro_tarjeta"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head" style="width:50%;">Tipo de Tarjeta</td>
                            <td colspan="2">
                                <select class="ctotalizar_" name="totalizar_tipo_tarjeta"  id="totalizar_tipo_tarjeta" >
                                    <option value="0">S/I</option>
                                    <?php echo smarty_function_html_options(array('output' => $this->_tpl_vars['option_output_instrumento_pago_tarjeta'],'values' => $this->_tpl_vars['option_values_instrumento_pago_tarjeta']), $this);?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head" style="width:50%;">Dep&oacute;sito</td>
                            <td colspan="2">
                                <select name="opt_deposito" id="opt_deposito">
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head" style="width:50%;">Monto del Dep&oacute;sito</td>
                            <td colspan="2">
                                <input type="text" value="0" class="ctotalizar_" name="totalizar_monto_deposito" id="totalizar_monto_deposito"/>   (*)
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head" style="width:50%;">Nro. de Dep&oacute;sito</td>
                            <td colspan="2">
                                <input type="text" class="ctotalizar_" name="totalizar_nro_deposito" id="totalizar_nro_deposito" value="0"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head">Banco Dep&oacute;sito</td>
                            <td colspan="2">
                                <select class="ctotalizar_" name="totalizar_banco_deposito" id="totalizar_banco_deposito">
                                    <option value="0">S/I</option>
                                    <?php echo smarty_function_html_options(array('output' => $this->_tpl_vars['option_output_banco'],'values' => $this->_tpl_vars['option_values_banco']), $this);?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head" style="width:50%;">Otro Documento</td>
                            <td colspan="2">
                                <select name="opt_otrodocumento" id="opt_otrodocumento">
                                    <option value="0">No</option>
                                    <option value="1">S&iacute;</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head" style="width:50%;">Tipo de Documento</td>
                            <td colspan="2">
                                <select class="ctotalizar_" name="totalizar_tipo_otrodocumento" id="totalizar_tipo_otrodocumento">
                                    <option value="0">S/I</option>
                                    <?php echo smarty_function_html_options(array('output' => $this->_tpl_vars['option_output_tipo_otrodocumento'],'values' => $this->_tpl_vars['option_values_tipo_otrodocumento']), $this);?>

                                </select>   (*)
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head" style="width:50%;">Monto</td>
                            <td colspan="2">
                                <input type="text" value="0" class="ctotalizar_" name="totalizar_monto_otrodocumento" id="totalizar_monto_otrodocumento"/>   (*)
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head" style="width:50%;">Numero</td>
                            <td colspan="2">
                                <input type="text" class="ctotalizar_" name="totalizar_nro_otrodocumento" id="totalizar_nro_otrodocumento" value="0"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-head">Banco</td>
                            <td colspan="2">
                                <select class="ctotalizar_" name="totalizar_banco_otrodocumento" id="totalizar_banco_otrodocumento" >
                                    <option value="0">S/I</option>
                                    <?php echo smarty_function_html_options(array('output' => $this->_tpl_vars['option_output_banco'],'values' => $this->_tpl_vars['option_values_banco']), $this);?>

                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr>
        </div>
        <input style="cursor: pointer" type="submit" id="PFactura2" name="PFactura2" value="Procesar Factura"/>
        <!--input style="cursor: pointer" type="submit" id="PFacturaEspera" name="PFacturaEspera" value="Factura en Espera"/-->
    </div>
    <input type="hidden" name="cantidadItem" id="cantidadItem"/>
    <input type="hidden" name="cantidadTotalItem" id="cantidadTotalItem"/>
    <input type="hidden" name="ivaItem" id="ivaItem"/>
    <input type="hidden" name="cantidadItemComprometidoByAlmacen" id="cantidadItemComprometidoByAlmacen"/>
    <input type="hidden" name="informacionitem" id="informacionitem"/>
    <input type="hidden" name="idpreciolibre" id="idpreciolibre" value="<?php echo $this->_tpl_vars['idpreciolibre']; ?>
"/>
    <input type="hidden" name="idprecio1" id="idprecio1" value="<?php echo $this->_tpl_vars['idprecio1']; ?>
"/>
    <input type="hidden" name="idprecio2" id="idprecio2" value="<?php echo $this->_tpl_vars['idprecio2']; ?>
"/>
    <input type="hidden" name="idprecio3" id="idprecio3" value="<?php echo $this->_tpl_vars['idprecio3']; ?>
"/>
    <input type="hidden" name="cantidad_impuesto" value="<?php echo $this->_tpl_vars['numero_impuesto'][0]['cantidad_impuesto']; ?>
" id="cantidad_impuesto"/>
    <input type="hidden" name="input_totalizar_sub_total" id="input_totalizar_sub_total" value=""/>
    <input type="hidden" name="input_totalizar_descuento_parcial" id="input_totalizar_descuento_parcial" value=""/>
    <input type="hidden" name="input_totalizar_total_operacion" id="input_totalizar_total_operacion" value=""/>
    <input type="hidden" name="input_totalizar_pdescuento_global" id="input_totalizar_pdescuento_global" value=""/>
    <input type="hidden" name="input_totalizar_descuento_global" id="input_totalizar_descuento_global" value=""/>
    <input type="hidden" name="input_totalizar_monto_iva" id="input_totalizar_monto_iva" value=""/>
    <input type="hidden" name="input_totalizar_total_general" id="input_totalizar_total_general" value=""/>
    <input type="hidden" name="input_totalizar_monto_cancelar" id="input_totalizar_monto_cancelar" value=""/>
    <input type="hidden" name="input_totalizar_saldo_pendiente" id="input_totalizar_saldo_pendiente" value=""/>
    <input type="hidden" name="input_totalizar_cambio" id="input_totalizar_cambio" value=""/>
    <input type="hidden" name="input_totalizar_monto_efectivo" id="input_totalizar_monto_efectivo" value=""/>
    <input type="hidden" name="input_totalizar_monto_cheque" id="input_totalizar_monto_cheque" value=""/>
    <input type="hidden" name="input_totalizar_nro_cheque" id="input_totalizar_nro_cheque" value=""/>
    <input type="hidden" name="input_totalizar_nombre_banco" id="input_totalizar_nombre_banco" value=""/>
    <input type="hidden" name="input_totalizar_monto_tarjeta" id="input_totalizar_monto_tarjeta" value=""/>
    <input type="hidden" name="input_totalizar_nro_tarjeta" id="input_totalizar_nro_tarjeta" value=""/>
    <input type="hidden" name="input_totalizar_tipo_tarjeta" id="input_totalizar_tipo_tarjeta" value=""/>
    <input type="hidden" name="input_totalizar_monto_deposito" id="input_totalizar_monto_deposito" value=""/>
    <input type="hidden" name="input_totalizar_nro_deposito" id="input_totalizar_nro_deposito" value=""/>
    <input type="hidden" name="input_totalizar_banco_deposito" id="input_totalizar_banco_deposito" value=""/>
</form>
<div id="info" style="display:none;">
</div>