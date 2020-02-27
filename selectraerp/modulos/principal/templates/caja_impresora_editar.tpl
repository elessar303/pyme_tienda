<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        {assign var=name_form value="usuarios_editar"}
        {include file="snippets/header_form.tpl"}
        <!--Para estilo JQuery en botones-->
        <link type="text/css" href="../../../includes/js/jquery-ui-1.10.0/css/redmond/jquery-ui-1.10.0.custom.min.css" rel="stylesheet"/>
        <script type="text/javascript" src="../../../includes/js/jquery-ui-1.10.0/js/jquery-1.9.0.js"></script>
        <script type="text/javascript" src="../../../includes/js/jquery-ui-1.10.0/js/jquery-ui-1.10.0.custom.min.js"></script>
        <script type="text/javascript" src="../../libs/js/md5_crypt.js"></script>
        <link type="text/css" rel="stylesheet" href="../../../includes/css/estilos_basicos.css" />
        <script type="text/javascript" src="../../libs/js/usuarios_tabs.js"></script>
        {literal}
            <script type="text/javascript">//<![CDATA[
                
                $(document).ready(function(){
                    $("#clave1").focus();
                        //$("input[type='password']").val('valor');
                        //$('input:password[name="clave1"]').val('valor');
                    $("input[name='cancelar']").button();//Coloca estilo JQuery
                    $("input[name='aceptar']").button().click(function(){
                        
                        var c2 = document.formulario.serial.value;//$("#clave2").val()
                        var nom = document.formulario.nombre_caja.value;//$("#nombreyapellido").val()
                        if(nom === ""){
                            Ext.Msg.alert("Alerta","Debe suministrar Nombre y Apellido");
                                /*alert("clave1:"+$("#clave2").val())
                                alert("clave2:"+document.formulario.clave2.value)
                                alert("nombreyapellido:"+document.formulario.nombreyapellido.value)
                                alert("nuevo:"+$('input:password[name="clave1"]').val())
                                alert("nuevo:"+$('input:password[name="clave2"]').val())
                                alert("nuevo:"+$('input:text[name="nombreyapellido"]').val())*/
                                //$('input[type=password]').each(function(index,value){alert ($(value).val());});
                            return false;
                        }//else{
                        
                    });
                });
            //]]>
            </script>
        {/literal}
    </head>
    <body>
        <form id="form-{$name_form}" name="formulario" action="" method="post">
            <div id="datosGral">
                {include file = "snippets/regresar.tpl"}
                
                
                        <table style="width: 100%">
                            <thead>
                                <tr>
                                    <th colspan="4" class="tb-head">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="label">
                                        Nombre Caja ** <input type='hidden' name='id' id='id' value='{$datos_usuarios[0].id}' />
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="text" name="nombre_caja" value="{$datos_usuarios[0].caja_host}" size="60" id="nombre_caja" class="form-text"/>
                                        <div id="notificacionVUsuario"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="label">
                                        Serial **
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="text" name="serial" value="{$datos_usuarios[0].serial_impresora}"  size="60" id="serial" class="form-text"/>
                                        <div id="notificacionVUsuario1"></div>
                                    </td>
                                </tr>
                                  <tr>
                                    <td colspan="3" class="label">IP **</td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="text" name="ip"  value="{$datos_usuarios[0].ip}"placeholder="IP De La Caja" size="60" id="ip" class="form-text"/>
                                       
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3" class="label">Tipo CAJA **</td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <select name="tipo_caja" id="tipo_caja" style="width:200px;" class="form-text">
                                        <option value="0">Tipo de Caja...</option>                               
                                        {html_options values=$option_values_cajas_tipo output=$option_output_cajas_tipo selected=$datos_usuarios[0].caja_tipo}
                                        </select>
                                      
                                    </td>
                                </tr>

                                
                            </tbody>
                        </table>
                   
                <table style="width: 100%;">
                    <tbody>
                        <tr class="tb-tit" style="text-align: right;">
                            <td style="padding-top:2px; padding-right: 2px;">
                                <input type="submit" name="aceptar" id="aceptar" value="Guardar Cambios" />
                                <input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="javascript:window.location='?opt_menu={$smarty.get.opt_menu}&amp;opt_seccion={$smarty.get.opt_seccion}';" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </body>
</html>