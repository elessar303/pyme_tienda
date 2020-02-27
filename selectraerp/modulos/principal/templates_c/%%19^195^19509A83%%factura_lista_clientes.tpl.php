<?php /* Smarty version 2.6.21, created on 2019-09-18 09:35:01
         compiled from factura_lista_clientes.tpl */ ?>
<!DOCTYPE html>
<!--Creado por: Charli Vivenes, email: cjvrinf@gmail.com-->
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <?php $this->assign('nom_menu', $this->_tpl_vars['campo_seccion'][0]['nom_menu']); ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "snippets/header_form.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
                    <thead>
                        <tr class="tb-head" >
                            <?php $_from = $this->_tpl_vars['cabecera']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['campos']):
?>
                                <td><strong><?php echo $this->_tpl_vars['campos']; ?>
</strong></td>
                            <?php endforeach; endif; unset($_from); ?>
                            <td colspan="2" style="text-align:center;"><strong>Opciones</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($this->_tpl_vars['cantidadFilas'] == 0): ?>
                        <td colspan="6" style="text-align: center;"><?php echo $this->_tpl_vars['mensaje']; ?>
</td>
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
">
                                <td style="text-align: center; width: 150px;"><?php echo $this->_tpl_vars['campos']['cod_cliente']; ?>
</td>
                                <td style="padding-left: 20px;"><?php echo $this->_tpl_vars['campos']['nombre']; ?>
</td>
                                <td style="text-align: right; width: 150px; padding-right: 20px;"><?php echo $this->_tpl_vars['campos']['rif']; ?>
</td>
                                <td style="text-align: right; width: 150px; padding-right: 20px;"><?php echo $this->_tpl_vars['campos']['telefonos']; ?>
</td>
                           
                           
                                <td style="text-align: center; width: 30px; cursor: pointer;">
                                    <img style="cursor: pointer;" class="editar" onclick="javascript: window.location.href='?opt_menu=<?php echo $_GET['opt_menu']; ?>
&amp;opt_seccion=<?php echo $_GET['opt_seccion']; ?>
&amp;opt_subseccion=edit&amp;cod=<?php echo $this->_tpl_vars['campos']['id_cliente']; ?>
';" title="Editar Cliente" src="../../../includes/imagenes/edit.gif"/>
                                </td>
                            
                               <?php if ($this->_tpl_vars['hicc'] == 0): ?>   
                                <td style="text-align: center; width: 50px; cursor: pointer;">
                                    <?php if (( $this->_tpl_vars['campos']['estado'] == 'A' )): ?>
                                       <!--  <img style="cursor: pointer;" class="newfactura" onclick="javascript: window.location.href='?opt_menu=<?php echo $_GET['opt_menu']; ?>
&amp;opt_seccion=<?php echo $_GET['opt_seccion']; ?>
&amp;opt_subseccion=newfactura&amp;cod=<?php echo $this->_tpl_vars['campos']['id_cliente']; ?>
';" title="Nueva Factura" src="../../../includes/imagenes/factu.png"/>
 -->
                                        <img style="cursor: pointer;" class="newfactura" onclick="javascript: window.open('?opt_menu=<?php echo $_GET['opt_menu']; ?>
&amp;opt_seccion=<?php echo $_GET['opt_seccion']; ?>
&amp;opt_subseccion=newfactura_rapida&amp;cod=<?php echo $this->_tpl_vars['campos']['id_cliente']; ?>
&amp;layout=2','window','menubar=1,resizable=1,fullscreen=yes');" title="Nueva Factura Rapida" src="../../../includes/imagenes/factu.png"/>
                                    <?php else: ?>
                                        <img title="Cliente Bloqueado" src="../../../includes/imagenes/ico_note_1.gif"/>
                                    <?php endif; ?>
                                </td>
                                <?php else: ?>
                                    <td style="text-align: center; width: 50px; cursor: pointer;">
                                    <?php if (( $this->_tpl_vars['campos']['estado'] == 'A' )): ?>
                                       <!--  <img style="cursor: pointer;" class="newfactura" onclick="javascript: window.location.href='?opt_menu=<?php echo $_GET['opt_menu']; ?>
&amp;opt_seccion=<?php echo $_GET['opt_seccion']; ?>
&amp;opt_subseccion=newfactura&amp;cod=<?php echo $this->_tpl_vars['campos']['id_cliente']; ?>
';" title="Nueva Factura" src="../../../includes/imagenes/factu.png"/>
 -->
                                        <img style="cursor: pointer;" class="newfactura" onclick="javascript: window.open('?opt_menu=<?php echo $_GET['opt_menu']; ?>
&amp;opt_seccion=<?php echo $_GET['opt_seccion']; ?>
&amp;opt_subseccion=newfactura_rapida&amp;cod=<?php echo $this->_tpl_vars['campos']['id_cliente']; ?>
&amp;layout=2','window','menubar=1,resizable=1,fullscreen=yes');" title="Nueva Factura Rapida" src="../../../includes/imagenes/factu.png"/>
                                    <?php else: ?>
                                        <img title="Cliente Bloqueado" src="../../../includes/imagenes/ico_note_1.gif"/>
                                    <?php endif; ?>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php $this->assign('ultimo_cod_valor', $this->_tpl_vars['campos']['id_cliente']); ?>
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