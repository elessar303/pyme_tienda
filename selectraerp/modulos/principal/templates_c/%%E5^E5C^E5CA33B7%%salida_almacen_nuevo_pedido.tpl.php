<?php /* Smarty version 2.6.21, created on 2019-09-24 14:51:49
         compiled from salida_almacen_nuevo_pedido.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'salida_almacen_nuevo_pedido.tpl', 136, false),array('modifier', 'date_format', 'salida_almacen_nuevo_pedido.tpl', 160, false),)), $this); ?>
<script src="../../libs/js/event_almacen_salida.js" type="text/javascript"></script>
<script src="../../libs/js/eventos_formAlmacen.js" type="text/javascript"></script>
<script type="text/javascript" src="../../libs/js/buscar_productos_servicio_factura_rapida_entrada.js"></script>
<?php echo '
    <script type="text/javascript">//<![CDATA[
            $(document).ready(function(){
                //funcion para cargar los puntos 
                  $("#estado").change(function() {
                    estados = $("#estado").val();
                        $.ajax({
                            type: \'GET\',
                            data: \'opt=getPuntos&\'+\'estados=\'+estados,
                            url: \'../../libs/php/ajax/ajax.php\',
                            beforeSend: function() {
                                $("#puntodeventa").find("option").remove();
                                $("#puntodeventa").append("<option value=\'\'>Cargando..</option>");
                            },
                            success: function(data) {
                                $("#puntodeventa").find("option").remove();
                                this.vcampos = eval(data);
                                     $("#puntodeventa").append("<option value=\'0\'>Todos</option>");
                                for (i = 0; i <= this.vcampos.length; i++) {
                                    $("#puntodeventa").append("<option value=\'" + this.vcampos[i].siga+ "\'>" + this.vcampos[i].nombre_punto + "</option>");
                                }
                            }
                        }); 
                        $("#puntodeventa").val(0);
                  });
            });


            function comprobarconductor() {
        var consulta;     
        consulta = $("#nacionalidad_conductor").val()+$("#cedula_conductor").val();                      
                        $.ajax({
                              type: "POST",
                              url: "comprobar_conductor.php",
                              data: "b="+consulta,
                              dataType: "html",
                              asynchronous: false, 
                              error: function(){
                                    alert("error petici�n ajax");
                              },
                              success: function(data){  

                                $("#resultado").html(data);
                                document.getElementById("conductor").focus();
                                ///// verificamos su estado

                              }
                  });

        }
    </script>
'; ?>

 <link type="text/css" rel="stylesheet" href="../../../includes/css/estilos_basicos.css" />
<form name="formulario" id="formulario" method="POST" action="gestionar_pedido_despacho.php">
    <input type="hidden" name="Datosproveedor" value="">
    <input type="hidden" name="codigo_empresa" value="<?php echo $this->_tpl_vars['DatosEmpresa'][0]['codigo']; ?>
"/>
    <input type="hidden" name="opt_menu" value="<?php echo $_GET['opt_menu']; ?>
"/>
    <input type="hidden" name="opt_seccion" value="<?php echo $_GET['opt_seccion']; ?>
"/>
    <input type="hidden" name="opt_subseccion" value="<?php echo $_GET['opt_subseccion']; ?>
"/>
    <table width="100%">
        <tr class="row-br">
            <td>
                <table class="tb-tit" cellspacing="0" cellpadding="1" border="0" width="100%">
                    <tbody>
                        <tr>
                            <td width="900"><span style="float:left"><img src="<?php echo $this->_tpl_vars['subseccion'][0]['img_ruta']; ?>
" width="22" height="22" class="icon" /><?php echo $this->_tpl_vars['subseccion'][0]['descripcion']; ?>
</span></td>
                            <td width="75">
                                <table style="cursor: pointer;" class="btn_bg" onClick="javascript:window.location='?opt_menu=<?php echo $_GET['opt_menu']; ?>
&opt_seccion=<?php echo $_GET['opt_seccion']; ?>
'" name="buscar" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="padding: 0px;" align="right"><img src="../../libs/imagenes/bt_left.gif" alt="" width="4" height="21" style="border-width: 0px;" /></td>
                                        <td class="btn_bg"><img src="../../libs/imagenes/back.gif" width="16" height="16" /></td>
                                        <td class="btn_bg" nowrap style="padding: 0px 1px;">Regresar</td>
                                        <td  style="padding: 0px;" align="left"><img  src="../../libs/imagenes/bt_right.gif" alt="" width="4" height="21" style="border-width: 0px;" /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>

    <!--<Datos del proveedor y vendedor>-->
    <div id="dp" class="x-hide-display">
        <br>
        <table>
        <tr>
                <td>
                    <!--img align="absmiddle" width="17" height="17" src="../../libs/imagenes/28.png"/-->
                    <span style="font-family:'Verdana';"><b>Nro Pedido</b></span>
                </td>
                <td>
                    <input class="form-text" type="text" maxlength="100"  size="30" name="nro_pedido" id="nro_pedido" value="<?php echo $_GET['cod']; ?>
 "readonly/>
                </td>
            </tr>
            <tr>
                <td>
                    <!--img align="absmiddle" width="17" height="17" src="../../libs/imagenes/28.png"/-->
                    <span style="font-family:'Verdana';"><b>Cliente</b></span>
                </td>
                <td>
                    <input class="form-text" type="text" maxlength="100"  size="30" name="cliente" id="cliente" value="<?php echo $this->_tpl_vars['cliente_nombre']; ?>
 "readonly/>
                </td>
            </tr>
            <tr>
                <td>
                    <!--img align="absmiddle" width="17" height="17" src="../../libs/imagenes/28.png"/-->
                    <span style="font-family:'Verdana';"><b>Autorizado Por (*)</b></span>
                </td>
                <td>
                    <input class="form-text" type="text" maxlength="100"  size="30" name="autorizado_por" id="autorizado_por" value="<?php echo $this->_tpl_vars['nombre_usuario']; ?>
" readonly/>
                </td>
            </tr>
            <tr>
                <td>
                    <!--img align="absmiddle" width="17" height="17" src="../../libs/imagenes/8.png"/-->
                    <span style="font-family:'Verdana';"><b>Observaciones</b></span>
                </td>
                <td>
                    <input class="form-text" type="text"  size="30" name="observaciones" maxlength="100" id="observaciones"/>
                </td>
            </tr>
            <!--
            <tr>
                <td>
                    <!--img align="absmiddle" width="17" height="17" src="../../libs/imagenes/ico_user.gif"
                    <span style="font-family:'Verdana';"><b>Estado Destino:</b></span>
                </td>
                <td>
                    <select  name="estado_destino" id="estado" class="form-text" disabled="disabled">
                        <option value="9999">Todos</option>
                        <?php echo smarty_function_html_options(array('output' => $this->_tpl_vars['option_values_nombre_estado'],'values' => $this->_tpl_vars['option_values_id_estado']), $this);?>

                    </select>
                </td>
            </tr>
            -->
            <?php if ($this->_tpl_vars['almacen_destino'] != ''): ?>
            <tr>
                <td>
                    <!--img align="absmiddle" width="17" height="17" src="../../libs/imagenes/ico_user.gif"-->
                    <span style="font-family:'Verdana';"><b>Almacen de Destino:</b></span>
                </td>
                <td>
                    <select  name="puntodeventa" id="puntodeventa" class="form-text" disabled="disabled">
                        <option value="0">Todos</option> 
                        <?php echo smarty_function_html_options(array('output' => $this->_tpl_vars['option_output_punto'],'values' => $this->_tpl_vars['option_values_punto'],'selected' => $this->_tpl_vars['almacen_destino']), $this);?>

                    </select>
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td>
                    <span style="font-family:'Verdana';"><b>Fecha</b></span>
                </td>
                <td>
                    <input class="form-text" maxlength="100" type="text" name="input_fechacompra" id="input_fechacompra"  size="30" value='<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
' readonly/>
                    <!--div  style="color:#4e6a48" id="fechacompra"><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%Y") : smarty_modifier_date_format($_tmp, "%d-%m-%Y")); ?>
</div-->
                    <?php echo '
                        <script type="text/javascript">//<![CDATA[
                            // var cal = Calendar.setup({onSelect: function(cal) { cal.hide() }});
                            // cal.manageFields("input_fechacompra", "input_fechacompra", "%d-%m-%Y");
                        //]]></script>
                    '; ?>

                </td>
            </tr>

            <tr>
                <td>
                    <!--img align="absmiddle" width="17" height="17" src="../../libs/imagenes/ico_user.gif"-->
                    <span style="font-family:'Verdana';"><b>Prescintos:</b></span>
                </td>
                <td>
                    <input class="form-text" type="text" maxlength="100"  size="30" name="prescintos" id="prescintos"/>
                </td>
            </tr>
            <tr>
                <td>
                    <!--img align="absmiddle" width="17" height="17" src="../../libs/imagenes/ico_user.gif"-->
                    <span style="font-family:'Verdana';"><b>Codigo Jornada:</b></span>
                </td>
                <td>
                    <input class="form-text" type="text" maxlength="100"  size="30" name="id_jornada" id="id_jornada"/>
                </td>
            </tr>

            <tr>
                        <td>
                            <!--img align="absmiddle" width="17" height="17" src="../../../includes/imagenes/8.png"-->
                            <span style="font-family:'Verdana';font-weight:bold;"><b>Tipo despacho:</b></span>
                        </td>
                        <td>
                            <select name="id_tipo_despacho" id="id_tipo_despacho" class="form-text" style="width:205px">                        
                                <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_tipodespacho'],'output' => $this->_tpl_vars['option_output_tipodespacho']), $this);?>

                                
                                </select>
                        </td>
                    </tr>
            <tr>
                        <td>
                            <!--img align="absmiddle" width="17" height="17" src="../../../includes/imagenes/8.png"-->
                            <span style="font-family:'Verdana';font-weight:bold;"><b>C&eacute;dula del Conductor</b></span>
                        </td>
                        <td>
                            <select name="nacionalidad_conductor" id="nacionalidad_conductor" class="form-text">
                              <option value="">..</option>
                              <option value="V">V</option>
                              <option value="E">E</option>
                            </select>
                            <input type="text" name="cedula_conductor" maxlength="8" id="cedula_conductor" size="21"  class="form-text" onBlur="comprobarconductor(this.id)" onKeyPress="return soloNumeros(event)"/>
                        </td>
                    </tr>
                    <tr>
                    <td style="font-family:'Verdana';font-weight:bold;">
                    <span style="font-family:Verdana"><b>Nombre del Conductor</b></span>
                    </td>
                    <td>
                    <div id="resultado" style="font-family:'Verdana';font-weight:bold;">
                    
                    </div>
                    </td>
                    </tr>
                    <tr>
                        <td>
                            <!--img align="absmiddle" width="17" height="17" src="../../../includes/imagenes/8.png"-->
                            <span style="font-family:'Verdana';font-weight:bold;"><b>Placa</b></span>
                        </td>
                        <td>
                            <input type="text" name="placa" maxlength="100" id="placa" size="30" maxlength="70" class="form-text"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!--img align="absmiddle" width="17" height="17" src="../../../includes/imagenes/8.png"-->
                            <span style="font-family:'Verdana';font-weight:bold;"><b>Marca</b></span>
                        </td>
                        <td>
                            <input type="text" name="marca" maxlength="100" id="marca" size="30" maxlength="70" class="form-text"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!--img align="absmiddle" width="17" height="17" src="../../../includes/imagenes/8.png"-->
                            <span style="font-family:'Verdana';font-weight:bold;"><b>Color</b></span>
                        </td>
                        <td>
                            <input type="text" name="color" maxlength="100" id="color" size="30" maxlength="70" class="form-text"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><span style="font-family:'Verdana';font-weight:bold;"><b>CASILLA DE FIRMAS:</b></span></td>
                    </tr>
                    <tr>
                        <td>
                            <!--img align="absmiddle" width="17" height="17" src="../../../includes/imagenes/8.png"-->
                            <span style="font-family:'Verdana';font-weight:bold;"><b>Aprobado Por:</b></span>
                        </td>
                        <td>
                            <select name="id_aprobado" id="id_aprobado" class="form-text" style="width:205px">                        
                                <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_aprobado'],'output' => $this->_tpl_vars['option_output_aprobado']), $this);?>

                                
                                </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!--img align="absmiddle" width="17" height="17" src="../../../includes/imagenes/8.png"-->
                            <span style="font-family:'Verdana';font-weight:bold;"><b>Despachador:</b></span>
                        </td>
                        <td>
                            <select name="id_despachador" id="id_despachador" class="form-text" style="width:205px">                        
                                <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_receptor'],'output' => $this->_tpl_vars['option_output_receptor']), $this);?>

                                
                                </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!--img align="absmiddle" width="17" height="17" src="../../../includes/imagenes/8.png"-->
                            <span style="font-family:'Verdana';font-weight:bold;"><b>Seguridad:</b></span>
                        </td>
                        <td>
                           <select name="id_seguridad" id="id_seguridad" class="form-text" style="width:205px">                        
                                <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_seguridad'],'output' => $this->_tpl_vars['option_output_seguridad']), $this);?>

                                
                                </select>
                        </td>
                    </tr>
                    <tr>
                    <?php if ($this->_tpl_vars['estado_pedido'] == 'Facturado' || $this->_tpl_vars['estado_pedido'] == 'Pendiente'): ?>
                    <td>                    
                    <input type="submit" name="aceptar" value="Gestionar Despacho" onclick="return confirm('¿Gestionar Despacho?');">
                    </td>
                    <?php if ($this->_tpl_vars['anular'] == '1' && $this->_tpl_vars['estado_pedido'] != 'Facturado' && $this->_tpl_vars['observacion_kardex'] != 'Pedido Anulado'): ?>
                    <td>
                    <input type="submit" name="anular" value="Anular Pedido" onclick="return confirm('¿Seguro Desea Anular este Pedido?');">
                    <?php endif; ?>
                    <?php endif; ?>
                    </td>
                    </tr>

        </table>

    </div>
    <!--</Datos del proveedor y vendedor>-->


    <input type="hidden" title="input_cantidad_items" value="0" name="input_cantidad_items" id="input_cantidad_items">
    <input type="hidden" title="input_tiva" value="0" name="input_tiva" id="input_tiva">
    <input type="hidden" title="input_tsiniva" value="0" name="input_tsiniva" id="input_tsiniva">
    <input type="hidden" title="input_tciniva" value="0" name="input_tciniva" id="input_tciniva">

</form>

