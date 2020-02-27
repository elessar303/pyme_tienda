<?php /* Smarty version 2.6.21, created on 2020-02-26 22:34:10
         compiled from file_upload.tpl */ ?>
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
                   archivo=$("#archivo1").val();                   
                   if(archivo==\'\'){
                        alert("El campo esta vacio!");
                        return false;
                   }    
                  tamano= archivo.length;   
                  principio=tamano - 3;                  
                  tipo=archivo.substring(principio,tamano); 
                  if(tipo!="csv"){
                     alert("no es una extencion valida! extencion permitida: csv");
                    return false;  
                   }                   
                 


                      
                });
               
               
            });
            //]]>
            </script>
        '; ?>

    </head>
    <body>
        <form name="formulario" id="formulario" method="post" enctype="multipart/form-data">
            <div id="datosGral" class="x-hide-display">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "snippets/regresar_solo.tpl", 'smarty_include_vars' => array()));
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
                <table style="width:100%; background-color:white;">
                    <thead>
                        <tr>
                            <th colspan="6" class="tb-head" style="text-align:center;">
                                MODULO PARA SUBIR VENTAS
                            </th>
                        </tr>
                    </thead>
                    <tbody>                        
                        <tr>
                            
                            <td class="label">Archivo ventas</td>
                            <td colspan="5" style="padding-top:2px; padding-bottom: 2px;">
                               
                                    <input class="form-text" type="file" name="archivo1" id="archivo1"></input>                     

                            </td>
                        </tr>
                       
                       
                        <!--<tr>
                            <td class="label">Ordenar por</td>
                            <td colspan="5" style="padding-top:2px; padding-bottom: 2px;">
                                <select name="filtrado_por" id="filtrado_por" class="form-text">
                                    <!--option value="null">Seleccione un campo</option-->
                            <!--        <option value="REFERENCE">C&oacute;digo</option>
                                    <option value="NAME">Descripci&oacute;n</option>
                                </select>
                            </td>
                        </tr>-->
                       
                       
                        <tr class="tb-tit">
                            <td colspan="6">
                                <input type="submit" id="aceptar" name="aceptar" value="Enviar"  />
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