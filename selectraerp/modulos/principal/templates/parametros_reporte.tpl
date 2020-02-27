<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title></title>
        {include file="snippets/inclusionesFpdUbicacion.tpl"}
        {literal}
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
                    timeFormat: 'HH:mm:ss',
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
                    timeFormat: 'HH:mm:ss',
                    showOn: "both",//button,
                    onClose: function( selectedDate ) {
                        $( "#fecha" ).datetimepicker( "option", "maxDate", selectedDate );
                    }
                });
            });
            //]]>
            </script>
        {/literal}
    </head>
    <body>
        <form name="formulario" id="formulario" method="get" action="{$url_reporte}" >
            <input type="hidden" name="tipo_producto" value="{$tipo_producto}">
            <input type="hidden" name="tipo_red" value="{$tipo_red}">
            <div id="datosGral" class="x-hide-display">
                {include file = "snippets/regresar_boton.tpl"}
                <table style="width:100%; background-color:white;">
                    <thead>
                        <tr>
                            <th colspan="6" class="tb-head" style="text-align:center;">
                                LOS CAMPOS MARCADOS CON&nbsp;** SON OBLIGATORIOS {$hola} 
                            </th>
                        </tr>
                    </thead>
                    <tbody>                      
                        {if $tipo_reporte neq "red_puntos" and $tipo_reporte neq "resumen_red_directa" and $tipo_reporte neq "resumen_red_indirecta" and $tipo_reporte neq "resumen_redes"}
                         <tr>
                            <td class="label">A&ntilde;o</td>
                            <td colspan="5" style="padding-top:2px; padding-bottom: 2px;">
                                <select name="anio" id="anio" style="width:200px;" class="form-text">
                                    {html_options values=$option_values_id_anio output=$option_values_nombre_anio}                                
                            </select>
                               </td>
                        </tr>
                        {/if}
                        {if $tipo_reporte neq "persona_beneficiada" and $tipo_reporte neq "red_puntos" and $tipo_reporte neq "resumen_red_directa" and $tipo_reporte neq "resumen_red_indirecta" and $tipo_reporte neq "resumen_redes"}
                        <tr>
                            <td class="label">Mes</td>
                            <td colspan="5" style="padding-top:2px; padding-bottom: 2px;">
                                <select name="mes" id="mes" style="width:200px;" class="form-text">
                                    <option value="1">Enero</option>                                
                                    <option value="2">Febrero</option>                                
                                    <option value="3">Marzo</option>                                
                                    <option value="4">Abril</option>                                
                                    <option value="5">Mayo</option>                                
                                    <option value="6">Junio</option>                                
                                    <option value="7">Julio</option>                                
                                    <option value="8">Agosto</option>                                
                                    <option value="9">Septiembre</option>                                
                                    <option value="10">Octubre</option>                                
                                    <option value="11">Noviembre</option>                                
                                    <option value="12">Diciembre</option>                                
                                </select>
                               </td>
                        </tr>
                        {/if}
                        {if $tipo_reporte eq "resumen_redes"}
                        <tr>
                            <td class="label">Esado</td>
                            <td colspan="5" style="padding-top:2px; padding-bottom: 2px;">
                                <select name="estado" id="estado" style="width:200px;" class="form-text">
                                    {html_options values=$option_values_id_estado output=$option_values_nombre_estado}                                
                            </select>
                               </td>
                        </tr>
                        {/if}
                        <!--if $tipo_reporte eq "consolidado_pert" or $tipo_reporte eq "consolidado_no_pert" or $tipo_reporte eq "consolidado_pert_no_pert"
                        <tr>
                            <td class="label">Tipo Producto</td>
                            <td colspan="5" style="padding-top:2px; padding-bottom: 2px;">
                                <div class="formato">
                                    <input type="radio" id="radio1" name="radio_producto" value="basico" checked /><label for="radio1">Basico</label>
                                    <input type="radio" id="radio2" name="radio_producto" value="no_basico" /><label for="radio2">No Basico</label>
                                    <input type="radio" id="radio3" name="radio_producto" value="ambos" /><label for="radio3">Ambos</label>
                                </div>
                            </td>
                        </tr>
                        /if-->

                        <!--if $tipo_reporte eq "resumen_red_directa" or $tipo_reporte eq "resumen_red_indirecta"
                        <tr>
                            <td class="label">Tipo Red</td>
                            <td colspan="5" style="padding-top:2px; padding-bottom: 2px;">
                                <div class="formato">
                                    <input type="radio" id="radio4" name="radio_red" value="directa" checked /><label for="radio4">Directa</label>
                                    <input type="radio" id="radio5" name="radio_red" value="indirecta" /><label for="radio5">Indirecta</label>
                                </div>
                            </td>
                        </tr>
                        /if-->
                        <tr class="tb-tit">
                            <td colspan="6">
                                <input type="submit" id="aceptar" name="aceptar" value="Enviar" onclick="javascript:valida_envia('imprimir_toma_inventario_fisico.php','imprimir_toma_inventario_fisico.php');" />
                                <input type="button" name="cancelar" value="Cancelar" onclick="javascript:document.location.href='?opt_menu={$smarty.get.opt_menu}';" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </body>
</html>