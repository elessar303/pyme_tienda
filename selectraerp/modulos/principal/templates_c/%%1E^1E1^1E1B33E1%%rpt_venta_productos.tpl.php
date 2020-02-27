<?php /* Smarty version 2.6.21, created on 2016-08-10 19:51:25
         compiled from rpt_venta_productos.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'rpt_venta_productos.tpl', 149, false),array('function', 'html_options', 'rpt_venta_productos.tpl', 173, false),)), $this); ?>
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
        <style type="text/css">
            .imgajax{               
                position: absolute;
                top: 50%;
                left: 50%;
                margin-top: 100px; 
            }
            .cargando{
                margin-top: 10px;
                font-size: 18px;
                text-align: center;
            }
           
        </style>
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
                $("#fecha").datetimepicker({
                    changeMonth: true,
                    changeYear: true,
                    showOtherMonths:true,
                    selectOtherMonths: true,
                    //numberOfMonths: 1,
                    //yearRange: "-100:+100",
                    dateFormat: "yy-mm-dd",
                    timeFormat: \'HH:mm:ss\',
                    showOn: "both",//button,
                    onClose: function( selectedDate ) {
                        //$( "#fecha2" ).datepicker( "option", "minDate", selectedDate );
                        $( "#fecha2" ).datetimepicker("option", "minDate", selectedDate);
                    }
                });
                $("#fecha2").datetimepicker({
                    changeMonth: true,
                    changeYear: true,
                    showOtherMonths:true,
                    selectOtherMonths: true,
                    //numberOfMonths: 1,
                    //yearRange: "-100:+100",
                    dateFormat: "yy-mm-dd",
                    timeFormat: \'HH:mm:ss\',
                    showOn: "both",//button,
                    onClose: function( selectedDate ) {
                        $( "#fecha" ).datetimepicker( "option", "maxDate", selectedDate );
                    }
                });

                //ajax para el reporte por html
                $("#enviarajax").click(function() {
                proveedor=$("#proveedor").val();
                almacenes=$("#almacenes").val();
                desde=$("#fecha").val();
                hasta=$("#fecha2").val();
                items=$("#items").val();
                cliente=$("#cliente").val();
               
                    $.ajax({
                            type: \'GET\',
                            data: "opt=reporte_productoCentral&proveedor="+proveedor+"&almacenes="+almacenes+"&desde="+desde+"&hasta="+hasta+"&items="+items+"&cliente="+cliente,
                            url: \'../../libs/php/ajax/ajax.php\',
                            beforeSend: function() {
                                $("#contenido_reporte").empty();
                                $("#contenido_reporte").html(\'<div class="imgajax"><img style="margin-left: 10px" src="../../imagenes/ajax-loader.gif" alt=""><div class="cargando">Cargando...</div></div>\');


                            },
                            success: function(data) {     
                                 $("#contenido_reporte").empty();
                                  $("#contenido_reporte").html(data);
                            }
                    });//fin del ajax    

                });//fin de la funcion aceptar

                

                  //funcion para cargar los puntos 
                  $("#almacenes").change(function() {
                    almacenes = $("#almacenes").val();
                        $.ajax({
                            type: \'GET\',
                            data: \'opt=getPuntos&\'+\'almacenes=\'+almacenes,
                            url: \'../../libs/php/ajax/ajax.php\',
                            beforeSend: function() {
                                $("#proveedor").find("option").remove();
                                $("#proveedor").append("<option value=\'\'>Cargando..</option>");
                            },
                            success: function(data) {
                                $("#proveedor").find("option").remove();
                                this.vcampos = eval(data);
                                     $("#proveedor").append("<option value=\'0\'>Todos</option>");
                                for (i = 0; i <= this.vcampos.length; i++) {
                                    $("#proveedor").append("<option value=\'" + this.vcampos[i].siga+ "\'>" + this.vcampos[i].nombre_punto + "</option>");
                                }
                            }
                        }); 
                        $("#proveedor").val(0);
                  });

                  
            });
            //]]>
            </script>
        '; ?>

    </head>
    <body>
        <form name="formulario" id="formulario" method="post">
            <div id="datosGral" class="x-hide-display">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "snippets/regresar_boton.tpl", 'smarty_include_vars' => array()));
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
                                LOS CAMPOS MARCADOS CON&nbsp;** SON OBLIGATORIOS
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="label">Per&iacute;odo **</td>
                            <td colspan="5" style="padding-top:2px; padding-bottom: 2px;">
                                <input type="text" name="fecha" id="fecha" size="20" value='<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
' readonly class="form-text" />
                                <!--button id="boton_fecha">...</button-->
                                <input type="text" name="fecha2" id="fecha2" size="20" value='<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
' readonly class="form-text" />
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
                        
                        <tr>
                          <!-- ESTADOS -->
                            <td class="label">ALMACENES</td>
                            <td width="200px" style="padding-top:2px; padding-bottom: 2px;">
                                <select name="almacenes" id="almacenes" style="width:200px;" class="form-text">
                                    <option value="0">almacen</option>
                               
                                <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_almacen'],'output' => $this->_tpl_vars['option_output_estado']), $this);?>

                                
                                </select>
                            </td>
                            <td width="80px" style="width:80px" class="label">Proveedor</td>
                             <!-- PUNTOS -->
                            <td  style="padding-top:2px; padding-bottom: 2px; ">
                                <select name="proveedor" id="proveedor" style="width:200px;" class="form-text">
                                    <option value="0">proveedores</option>                               
                                <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_proveedores'],'output' => $this->_tpl_vars['option_output_punto']), $this);?>

                                
                                </select>
                            </td>
                           
                        </tr>
                         <tr>
                          <!-- ESTADOS -->
                            <td class="label">ITEM</td>
                            <td width="200px" style="padding-top:2px; padding-bottom: 2px;">
                                <select name="items" id="items" style="width:200px;" class="form-text">
                                    <option value="0">item</option>
                               
                                <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_item'],'output' => $this->_tpl_vars['option_output_categoria']), $this);?>

                                
                                </select>
                            </td>
                            <td width="80px" style="width:80px" class="label">CLIENTES</td>
                             <!-- PUNTOS -->
                            <td  style="padding-top:2px; padding-bottom: 2px; ">
                                <select name="cliente" id="cliente" style="width:200px;" class="form-text">
                                    <option value="0">clientes</option>                               
                                <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_clientes'],'output' => $this->_tpl_vars['option_output_productos']), $this);?>

                                
                                </select>
                            </td>
                           
                        </tr>
                        <!-- COMENTADO HASTA QUE SE UNIFIQUEN LAS CATEGORIAS -->
                         <!-- <tr>      
                                  <td class="label">CATEGORIA</td>
                            <td width="200px" style="padding-top:2px; padding-bottom: 2px; ">
                                <select name="categoria" id="categoria" style="width:200px;" class="form-text">
                                    <option value="0">Todos</option>
                                
                                <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_categoria'],'output' => $this->_tpl_vars['option_output_categoria']), $this);?>

                                
                                </select>
                            </td>
                         </tr>    -->
                         <tr>
                            
                        </tr>
                        
                        <!-- <tr>
                            <td class="label">Formato Reporte</td>
                            <td colspan="5" style="padding-top:2px; padding-bottom: 2px;">
                                <div id="formato">
                                    <input type="radio" id="radio1" name="radio" value="0" checked/><label for="radio1">Hoja de C&aacute;lculo</label>
                                  <!--   <input type="radio" id="radio2" name="radio" value="1"  />
                                    <input type="radio" id="radio2" name="radio" value="1"  /><label for="radio2">Formato PDF</label>
                                </div>
                            </td>
                        </tr> -->
                        <tr class="tb-tit">
                            <td colspan="6">
                                <input type="button" id="enviarajax" name="enviarajax" value="Enviar" />
                                <input type="button" name="cancelar" value="Cancelar" onclick="javascript:document.location.href='?opt_menu=<?php echo $_GET['opt_menu']; ?>
';" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
        <div style="margin-top: 20px;position:relative" id="contenido_reporte">
           
           
        </div>
    </body>
</html>