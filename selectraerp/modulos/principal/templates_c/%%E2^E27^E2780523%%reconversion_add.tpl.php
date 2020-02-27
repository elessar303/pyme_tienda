<?php /* Smarty version 2.6.21, created on 2018-06-01 10:58:12
         compiled from reconversion_add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'reconversion_add.tpl', 95, false),)), $this); ?>
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
        <!--link type="text/css" href="../../../includes/js/jquery-ui-1.10.0/css/redmond/jquery-ui-1.10.0.custom.min.css" rel="Stylesheet"/>
        
            <script type="text/javascript" src="../../../includes/js/jquery-ui-1.10.0/js/jquery-ui-1.10.0.custom.min.js"></script>-->
            <script type="text/javascript" src="../../../includes/js/jquery-ui-1.10.0/js/jquery-1.9.0.js"></script>
            <link type="text/css" rel="stylesheet" href="../../../includes/css/estilos_basicos.css"/>
            <?php echo '
            <script type="text/javascript">
            //<![CDATA[
            $(document).ready(function(){

                $("#aceptar").click(function(){
                    showLoading();
                });

                function showLoading() {
                    document.getElementById(\'loadingmsg\').style.display = \'block\';
                    document.getElementById(\'loadingover\').style.display = \'block\';
                }

                $("input[name=\'aceptar\']").click(function(){
                    if($("#descripcion_almacen").val()==""){
                        $("#descripcion_almacen").focus();
                        Ext.Msg.alert("Alerta","Debe Ingresar la descripción del almacen!");
                        return false;
                    }
                });
            });
            //]]>
        </script>

        <style type="text/css">
        #loadingmsg {
          color: black;
          background: #fff; 
          padding: 10px;
          position: fixed;
          top: 50%;
          left: 50%;
          z-index: 100;
          margin-right: -25%;
          margin-bottom: -25%;
      }
      #loadingover {
          background: black;
          z-index: 99;
          width: 100%;
          height: 100%;
          position: fixed;
          top: 0;
          left: 0;
          -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
          filter: alpha(opacity=80);
          -moz-opacity: 0.8;
          -khtml-opacity: 0.8;
          opacity: 0.8;
      }
  </style>
  '; ?>

</head>
<div id='loadingmsg' style='display: none;'>Procesando, por favor espere...</div>
<div id='loadingover' style='display: none;'></div>
<body>
    <form id="form-<?php echo $this->_tpl_vars['name_form']; ?>
" name="formulario" action="" method="post">
        <div id="datosGral">
          <?php if ($_GET['loc']): ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "snippets/regresar_boton_alm_loc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
          <?php else: ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "snippets/regresar_boton.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <?php endif; ?>
          <input type="hidden" name="codigo_empresa" value="<?php echo $this->_tpl_vars['DatosEmpresa'][0]['codigo']; ?>
"/>
          <input type="hidden" name="opt_menu" value="<?php echo $_GET['opt_menu']; ?>
"/>
          <input type="hidden" name="opt_seccion" value="<?php echo $_GET['opt_seccion']; ?>
"/>
          <input type="hidden" name="opt_subseccion" value="<?php echo $_GET['opt_subseccion']; ?>
"/>
          <table style="width:100%; background-color: white;">
            <thead>
                <tr>
                    <th colspan="8" class="tb-head" style="text-align:center;">
                        &nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3" class="label">
                        Tabla
                    </td>
                    <td style="padding-top:2px; padding-bottom: 2px;">
                        <input type="text" name="tabla" size="60" id="tabla" class="form-text" required="required"/>
                        <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_numero'],'output' => $this->_tpl_vars['option_output_numero']), $this);?>

                    </td>

                    <td colspan="3" class="label">
                        Columna
                    </td>
                    <td style="padding-top:2px; padding-bottom: 2px;">
                        <input type="text" name="columna" size="60" id="columna" class="form-text" required="required"/>
                        <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_numero'],'output' => $this->_tpl_vars['option_output_numero']), $this);?>

                    </td>
                </tr>


            </tbody>
        </table>
        <table style="width:100%">
            <tbody>
                <tr class="tb-tit">
                    <td>
                        <input type="submit" name="aceptar" id="aceptar" value="Guardar"/>
                        <input type="button" name="cancelar" value="Cancelar" onclick="javascript:document.location.href='?opt_menu=<?php echo $_GET['opt_menu']; ?>
&amp;opt_seccion=<?php echo $_GET['opt_seccion']; ?>
';"/>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</form>
</body>
</html>