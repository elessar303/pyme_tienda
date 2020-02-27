<?php /* Smarty version 2.6.21, created on 2019-09-26 15:49:36
         compiled from salida_almacen_pedido.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'salida_almacen_pedido.tpl', 35, false),)), $this); ?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "snippets/header_form.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <script type="text/javascript" src="../../libs/js/entrada_almacen.js"></script>
    </head>
    <body>
        <form id="form-<?php echo $this->_tpl_vars['name_form']; ?>
" name="form-<?php echo $this->_tpl_vars['name_form']; ?>
" action="?opt_menu=<?php echo $_GET['opt_menu']; ?>
&amp;opt_seccion=<?php echo $_GET['opt_seccion']; ?>
" method="post">
            <div id="datosGral" class="x-hide-display">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "snippets/regresar_buscar_botones.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "snippets/tb_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <br/>
                <table class="seleccionLista">
                    <tbody>
                        <tr class="tb-head" >
                            <?php $_from = $this->_tpl_vars['cabecera']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['campos']):
?>
                                <td><?php echo $this->_tpl_vars['campos']; ?>
</td>
                            <?php endforeach; endif; unset($_from); ?>
                            <td colspan="3" style="text-align:center;">Opciones</td>
                        </tr>
                        <?php if ($this->_tpl_vars['cantidadFilas'] == 0): ?>
                            <tr><td colspan="6"><?php echo $this->_tpl_vars['mensaje']; ?>
</td></tr>
                        <?php else: ?>
                            <?php $_from = $this->_tpl_vars['registros']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['campos']):
?>
                                <?php if ($this->_tpl_vars['i']%2 == 0): ?>
                                    <?php $this->assign('color', ""); ?>
                                <?php else: ?>
                                    <?php $this->assign('color', "#cacacf"); ?>
                                <?php endif; ?>
                                <tr bgcolor="<?php echo $this->_tpl_vars['color']; ?>
" style="cursor: pointer;" class="detalle">
                                    <td style="text-align: right; padding-right: 20px;"><?php echo $this->_tpl_vars['campos']['id_transaccion']; ?>
</td>
                                    <td style="padding-left: 20px;"><?php echo $this->_tpl_vars['campos']['nombre']; ?>
</td>
                                    <td style="text-align: center;"><?php echo ((is_array($_tmp=$this->_tpl_vars['campos']['fecha'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%Y") : smarty_modifier_date_format($_tmp, "%d-%m-%Y")); ?>
</td>
                                    <td style="padding-left: 20px;"><?php echo $this->_tpl_vars['campos']['autorizado_por']; ?>
</td>
                                    <td style="padding-left: 20px;"><?php echo $this->_tpl_vars['campos']['observacion_despacho']; ?>
</td>
                                    <td style="padding-left: 20px;"><?php echo $this->_tpl_vars['campos']['observacion']; ?>
</td>
                                    <td style="padding-left: 20px;"><?php echo $this->_tpl_vars['campos']['estatus']; ?>
</td>
                                    <td style="width:50px; text-align: center;">
                                        <img class="boton_detalle" src="../../../includes/imagenes/drop-add.gif"/>
                                        <input type="hidden" name="id_transaccion" value="<?php echo $this->_tpl_vars['campos']['id_transaccion']; ?>
"/>
                                        <input type="hidden" name="id_tipo_movimiento_almacen" value="<?php echo $this->_tpl_vars['campos']['id_tipo_movimiento_almacen']; ?>
"/>
                                    </td>
                                    <td style="width: 30px; text-align:center">
                                        <?php if ($this->_tpl_vars['campos']['cod_movimiento'] != ""): ?>
                                            <img title="Entregado" src="../../../includes/imagenes/ico_ok.gif"/>
                                            <img class="impresion" onclick="javascript:window.open('../../reportes/entrada_almacen.php?id_transaccion=<?php echo $this->_tpl_vars['campos']['id_transaccion']; ?>
', '');" title="Imprimir Detalle de Movimiento" src="../../../includes/imagenes/ico_print.gif"/>
                                        <?php elseif ($this->_tpl_vars['campos']['cod_movimiento'] == ""): ?>
                                            <img title="Pendiente" src="../../../includes/imagenes/ico_note.gif"/>
                                        <?php endif; ?>
                                    </td>
                                     <td style="cursor:pointer; width:30px; text-align:center" colspan="2">
                                     <?php if ($this->_tpl_vars['campos']['observacion'] != 'Pedido Anulado'): ?>
                                        <img class="editar" onclick="javascript: window.location.href='?opt_menu=<?php echo $_GET['opt_menu']; ?>
&amp;opt_seccion=<?php echo $_GET['opt_seccion']; ?>
&amp;opt_subseccion=edit&amp;cod=<?php echo $this->_tpl_vars['campos']['id_transaccion']; ?>
'" title="Gestionar Despacho" src="../../../includes/imagenes/edit.gif"/>
                                    <?php elseif ($this->_tpl_vars['campos']['cod_movimiento'] != ""): ?>
                                    
                                    <?php endif; ?>
                                    <?php if (( $this->_tpl_vars['campos']['id_tipo_despacho'] == "" || $this->_tpl_vars['campos']['id_tipo_despacho'] == '0' ) && $this->_tpl_vars['campos']['cod_movimiento'] != ""): ?>
                                        <img class="editar" onclick="javascript: window.location.href='?opt_menu=<?php echo $_GET['opt_menu']; ?>
&amp;opt_seccion=<?php echo $_GET['opt_seccion']; ?>
&amp;opt_subseccion=tipodespacho&amp;cod=<?php echo $this->_tpl_vars['campos']['id_transaccion']; ?>
'" title="Agregar Tipo Despacho" src="../../../includes/imagenes/edit.gif"/>
                                    <?php endif; ?>
                                </td>
                                </tr>
                            <?php endforeach; endif; unset($_from); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "snippets/navegacion_paginas.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>
        </form>
    </body>
</html>