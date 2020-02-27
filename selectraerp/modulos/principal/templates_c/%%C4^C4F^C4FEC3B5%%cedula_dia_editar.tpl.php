<?php /* Smarty version 2.6.21, created on 2018-08-28 09:43:12
         compiled from cedula_dia_editar.tpl */ ?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <?php $this->assign('name_form', 'cedula_dia_editar'); ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "snippets/header_form.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <!--Para estilo JQuery en botones-->
        <link type="text/css" href="../../../includes/js/jquery-ui-1.10.0/css/redmond/jquery-ui-1.10.0.custom.min.css" rel="stylesheet"/>
        <script type="text/javascript" src="../../../includes/js/jquery-ui-1.10.0/js/jquery-1.9.0.js"></script>
        <script type="text/javascript" src="../../../includes/js/jquery-ui-1.10.0/js/jquery-ui-1.10.0.custom.min.js"></script>
        <script type="text/javascript" src="../../libs/js/md5_crypt.js"></script>
        <link type="text/css" rel="stylesheet" href="../../../includes/css/estilos_basicos.css" />
        <script type="text/javascript" src="../../libs/js/cedula_dia_tabs.js"></script>
        <?php echo '
            
        '; ?>

    </head>
    <body>
        <form id="form-<?php echo $this->_tpl_vars['name_form']; ?>
" name="formulario" action="" method="post">
            <div id="datosGral">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "snippets/regresar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <input type="hidden" name="opt_menu" value="<?php echo $_GET['opt_menu']; ?>
"/>
                <input type="hidden" name="opt_seccion" value="<?php echo $_GET['opt_seccion']; ?>
"/>
                <input type="hidden" name="opt_subseccion" value="<?php echo $_GET['opt_subseccion']; ?>
"/>
                <input type="hidden" name="day" value="<?php echo $_GET['cod']; ?>
"/>
                <div id="contenedorTAB">
                    <div id="div_tab1" class="x-hide-display">
                        <table style="width: 100%">
                            <thead>
                                <tr>
                                    <th colspan="4" class="tb-head">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="label">
                                        Día
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="text" name="dia" readonly="true" value="<?php echo $this->_tpl_vars['days_id'][0]['NAME']; ?>
" size="30" id="dia" class="form-text"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="label">
                                        Mínimo
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="text" name="minimo" value="<?php echo $this->_tpl_vars['days_id'][0]['MIN']; ?>
" size="30" id="minimo" class="form-text"/>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="label">
                                        Máximo
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="text" name="maximo" value="<?php echo $this->_tpl_vars['days_id'][0]['MAX']; ?>
" size="30" id="maximo" class="form-text"/>
                                        
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <table style="width: 100%;">
                    <tbody>
                        <tr class="tb-tit" style="text-align: right;">
                            <td style="padding-top:2px; padding-right: 2px;">
                                <input type="submit" name="aceptar" id="aceptar" value="Guardar Cambios" />
                                <input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="javascript:window.location='?opt_menu=<?php echo $_GET['opt_menu']; ?>
&amp;opt_seccion=<?php echo $_GET['opt_seccion']; ?>
';" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </body>
</html>