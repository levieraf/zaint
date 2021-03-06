<?php /* Smarty version 2.6.21, created on 2013-07-31 18:28:50
         compiled from anular_nota_entrega.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'anular_nota_entrega.tpl', 51, false),)), $this); ?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link type="text/css" rel="stylesheet" href="../../../includes/css/estilos_basicos.css"/>
        <?php echo '
            <script type="text/javascript">//<![CDATA[
            $(document).ready(function(){
                $("#detalle_factura_").hide();
                sw=0;
                $.setValoresInput = function(nombreObjetoDestino,nombreObjetoActual){
                    $(nombreObjetoDestino).attr("value", $(nombreObjetoActual).val());
                }
                $("#lick_detalle").click(function(){
                    if(sw===0){
                        $("#detalle_factura_").show(150);
                        $(this).html("<img align=\\"absmiddle\\" src=\\"../../../includes/imagenes/drop-add2.gif\\"> Ocultar</div>");
                        sw=1;
                    }else{
                        $("#detalle_factura_").hide(150);
                        $(this).html("<img align=\\"absmiddle\\" src=\\"../../../includes/imagenes/drop-add.gif\\"> Ver detalles</div>");
                        sw=0;
                    }
                });
            });
            //]]>
            </script>
        '; ?>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "snippets/header_form.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </head>
    <body>
        <form id="form-<?php echo $this->_tpl_vars['name_form']; ?>
" name="form-<?php echo $this->_tpl_vars['name_form']; ?>
" method="post">
            <input type="hidden" name="DatosCliente" value=""/>
            <input type="hidden" name="codigo_empresa" value="<?php echo $this->_tpl_vars['DatosEmpresa'][0]['codigo']; ?>
"/>
            <input type="hidden" name="opt_menu" value="<?php echo $_GET['opt_menu']; ?>
"/>
            <input type="hidden" name="opt_seccion" value="<?php echo $_GET['opt_seccion']; ?>
"/>
            <input type="hidden" name="opt_subseccion" value="<?php echo $_GET['opt_subseccion']; ?>
"/>
            <div id="datosGral">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "snippets/regresar_boton.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <!--<Datos del cliente y vendedor>-->
                <div class="subcontenedor">
                    <img style="float:left" src="../../../includes/imagenes/ico_user.gif"/>
                    <span style="font-family:'Verdana';"><b>Cliente: </b><?php echo $this->_tpl_vars['dataDevolucion'][0]['nombre']; ?>
</span>
                    <span style="font-family:'Verdana';"><b>RIF: </b><?php echo $this->_tpl_vars['dataDevolucion'][0]['rif']; ?>
</span>
                    <input type="hidden" name="id_cliente" value="<?php echo $this->_tpl_vars['dataDevolucion'][0]['id_cliente']; ?>
"/>
                </div>
                <!--<Datos de la factura>-->
                <div class="subcontenedor">
                    <div style="float: left; margin-right: 20px;">
                        Fecha: <input type="hidden" name="input_fechaFactura" id="input_fechaFactura" value='<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
'>
                        <div style="color:#4e6a48" id="fechaFactura"><?php echo ((is_array($_tmp=$this->_tpl_vars['dataDevolucion'][0]['fechaNotaEntrega'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%Y") : smarty_modifier_date_format($_tmp, "%d-%m-%Y")); ?>
</div>
                    </div>
                    <div style="margin-right: 20px;">
                        Nota de Entrega N&uacute;mero
                        <div style="font-size:15px; color:red; font-weight: bold;" id="numFactura"><?php echo $this->_tpl_vars['dataDevolucion'][0]['cod_nota_entrega']; ?>
</div>
                    </div>
                    <div id="lick_detalle" style="cursor:pointer;width:100px;"><img style="float:left" src="../../../includes/imagenes/drop-add.gif"/> Ver Detalles</div>
                    <div id="detalle_factura_">
                        <div class="resumen">
                            Sub-Total
                            <div style="font-size:20px; color:#2e931a;" id="subTotal"><?php echo $this->_tpl_vars['DatosGenerales'][0]['moneda']; ?>
 <?php echo $this->_tpl_vars['dataDevolucion'][0]['subtotal']; ?>
</div>
                            <input type="hidden" name="input_subtotal" id="input_subtotal" value=""/>
                        </div>
                        <div class="resumen">
                            Descuento
                            <input type="hidden" name="input_descuentosItemFactura" id="input_descuentosItemFactura" value=""/>
                            <div style="font-size:20px; color:red; text-decoration:line-through;" id="descuentosItemFactura"><?php echo $this->_tpl_vars['DatosGenerales'][0]['moneda']; ?>
 <?php echo $this->_tpl_vars['dataDevolucion'][0]['descuentosItemNotaEntrega']; ?>
</div>
                        </div>
                        <div class="resumen">
                            Monto Items
                            <input type="hidden" name="input_montoItemsFactura" id="input_montoItemsFactura" value=""/>
                            <div style="font-size:20px;color:#2e931a;" id="montoItemsFactura"><?php echo $this->_tpl_vars['DatosGenerales'][0]['moneda']; ?>
 <?php echo $this->_tpl_vars['dataDevolucion'][0]['montoItemsNotaEntrega']; ?>
</div>
                        </div>
                        <div class="resumen">
                            <?php echo $this->_tpl_vars['DatosGenerales'][0]['nombre_impuesto_principal']; ?>

                            <input type="hidden" name="input_ivaTotalFactura" id="input_ivaTotalFactura" value=""/>
                            <div style="font-size:20px; color:#2e931a;" id="ivaTotalFactura"><?php echo $this->_tpl_vars['DatosGenerales'][0]['moneda']; ?>
 <?php echo $this->_tpl_vars['dataDevolucion'][0]['ivaTotalNotaEntrega']; ?>
</div>
                        </div>
                        <div class="resumen">
                            Total
                            <input type="hidden" name="input_TotalTotalFactura" id="input_TotalTotalFactura" value=""/>
                            <div style="font-size:20px; color:#00005e;" id="TotalTotalFactura"><?php echo $this->_tpl_vars['DatosGenerales'][0]['moneda']; ?>
 <?php echo $this->_tpl_vars['dataDevolucion'][0]['totalizar_total_general']; ?>
</div>
                        </div>
                        <br/><br/><br/>
                        <input type="hidden" name="input_cantidad_items" id="input_cantidad_items" value=""/>
                        <div class="span_cantidad_items">
                            <span style="font-size: 15px;">Cantidad de Items: <?php echo $this->_tpl_vars['dataDevolucion'][0]['cantidad_items']; ?>
</span>
                        </div>
                    </div>
                </div>
                <!--</Datos de la factura>-->
                <!--<Tab de pasos de factura>-->
                <div id="contenedorTAB_factura_paso1">
                    <div class="subcontenedor">
                        <table class="seleccionLista">
                            <tbody>
                                <tr class="tb-head" >
                                    <?php $_from = $this->_tpl_vars['cabecera']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['campos']):
?>
                                        <td><?php echo $this->_tpl_vars['campos']; ?>
</td>
                                    <?php endforeach; endif; unset($_from); ?>
                                </tr>
                                <?php $_from = $this->_tpl_vars['dataDetalleFactura']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['campos']):
?>
                                    <?php if ($this->_tpl_vars['i']%2 == 0): ?>
                                        <?php $this->assign('color', ""); ?>
                                    <?php else: ?>
                                        <?php $this->assign('color', "#cacacf"); ?>
                                    <?php endif; ?>
                                    <tr bgcolor="<?php echo $this->_tpl_vars['color']; ?>
">
                                        <td style="text-align:center;"><?php echo $this->_tpl_vars['campos']['cod_item']; ?>
</td>
                                        <td><?php echo $this->_tpl_vars['campos']['_item_descripcion']; ?>
</td>
                                        <td class="posicion_cantidades"><?php echo $this->_tpl_vars['campos']['_item_cantidad']; ?>
</td>
                                        <td class="posicion_cantidades"><?php echo $this->_tpl_vars['campos']['_item_preciosiniva']; ?>
</td>
                                        <td class="posicion_cantidades"><?php echo $this->_tpl_vars['campos']['_item_descuento']; ?>
</td>
                                        <td class="posicion_cantidades"><?php echo $this->_tpl_vars['campos']['_item_totalsiniva']; ?>
</td>
                                        <td class="posicion_cantidades"><?php echo $this->_tpl_vars['campos']['_item_totalsiniva']; ?>
</td>
                                        <td class="posicion_cantidades"><?php echo $this->_tpl_vars['campos']['_item_piva']; ?>
</td>
                                        <td class="posicion_cantidades"><?php echo $this->_tpl_vars['campos']['_item_totalconiva']; ?>
</td>
                                    </tr>
                                    <?php $this->assign('ultimo_cod_valor', $this->_tpl_vars['campos']['id_cliente']); ?>
                                <?php endforeach; endif; unset($_from); ?>
                            </tbody>
                        </table>
                    </div>
                    <input type="submit" id="anular" name="anular" value="Anular Nota Entrega" />
                </div>
                <input type="hidden" id="<?php echo $this->_tpl_vars['dataDevolucion'][0]['id_nota_entrega']; ?>
" name="<?php echo $this->_tpl_vars['dataDevolucion'][0]['id_nota_entrega']; ?>
" />
            </div>
        </form>
        <div id="info" style="display:none;"></div>
    </body>
</html>