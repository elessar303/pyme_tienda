<?php /* Smarty version 2.6.21, created on 2017-07-12 09:25:38
         compiled from operaciones_apertura_editar.tpl */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="autor" content="Lucas Sosa" />
        <title></title>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "snippets/inclusiones_reportes.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php echo '
            <script type="text/javascript">//<![CDATA[
            $(document).ready(function(){
                $("#cliente").autocomplete({
                    source: "../../libs/php/ajax/autocomplete_cliente.php",
                    minLength: 3, // how many character when typing to display auto complete
                    select: function(e, ui) {//define select handler
                        $("#cod_cliente").val(ui.item.id);
                    }
                });
                $("#producto").autocomplete({
                    source: "../../libs/php/ajax/autocomplete_producto.php",
                    minLength: 3,
                    select: function(e, ui) {//define select handler
                        $("#cod_producto").val(ui.item.id);
                    }
                });
                $("#aceptar").click(function(){
                   archivo=$("#archivo_productos").val();                   
                   if(archivo==\'\'){
                        alert("El campo esta vacio!");
                        return false;
                   }    
                  tamano= archivo.length;   
                  principio=tamano - 5;                  
                  tipo=archivo.substring(principio,tamano); 
                  if(tipo!="_data"){
                     alert("Extencion no valida! El archivo debe terminar con _data");
                    return false;  
                   }                   
                });
            });
            //]]>
            </script>
            <script language="JavaScript"> 
                var nav4 = window.Event ? true : false; 
                function acceptNum(evt){  
                // NOTE: Backspace = 8, Enter = 13, \'0\' = 48, \'9\' = 57  
                var key = nav4 ? evt.which : evt.keyCode;  
                return (key <= 13 || (key >= 48 && key <= 57 || key==46)); 
                } 
            </script>
        '; ?>

    </head>
    <body>
        <form name="formulario" id="formulario" method="post" enctype="multipart/form-data">
            <div id="datosGral" class="x-hide-display">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "snippets/regresar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <input type="hidden" name="codigo_empresa" value="<?php echo $this->_tpl_vars['DatosEmpresa'][0]['codigo']; ?>
"/>
                <input type="hidden" name="opt_menu" value="<?php echo $_GET['opt_menu']; ?>
"/>
                <input type="hidden" name="opt_seccion" value="<?php echo $_GET['opt_seccion']; ?>
"/>
                <input type="hidden" name="cant_fechas" id="cant_fechas" value="2"/>
                <input type="hidden" name="ordenar_por" id="ordenar_por" value="1"/>
                <input type="hidden" name="tiene_filtro" id="tiene_filtro" value="1"/>
                <input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['datos'][0]['id']; ?>
"></input>
                <table style="width:60%; background-color:white; bn" align="center">
                    <thead>
                        <tr>
                            <th colspan="8" class="tb-head" style="text-align:center;">
                                OPERACI&Oacute;N APERTURA
                            </th>
                        </tr>
                    </thead>
                    <tbody>                        
                       
                        <tr>
                            <td class="label">Operaci&oacute;n:</td>
                            <td colspan="3" style="padding-top:2px; padding-bottom: 2px;">
                            <input class="form-text" type="text" name="codigo_siga" id="codigo_siga" value="<?php echo $this->_tpl_vars['datos'][0]['operacion']; ?>
" readonly="readonly"></input>
                            </td>
                            <td class="label">Activa:</td>
                            <td colspan="3" style="padding-top:2px; padding-bottom: 2px;">
                                <select name="status" id="status" style="width:200px;" class="form-text">
                                    <option value="00" disabled="disabled" selected="selected">Seleccione</option>
                                    <option value="1" <?php if ($this->_tpl_vars['datos'][0]['status'] == '1'): ?> selected <?php endif; ?>>Si</option>
                                    <option value="0" <?php if ($this->_tpl_vars['datos'][0]['status'] == '0'): ?> selected <?php endif; ?>>No</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="tb-tit">
                            <td colspan="8">
                                <input type="submit" id="aceptar" name="aceptar" value="Guardar Cambios"  />
                                <input type="button" name="cancelar" value="Cancelar" onclick="javascript:document.location.href='?opt_menu=<?php echo $_GET['opt_menu']; ?>
';" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </body>
</html>