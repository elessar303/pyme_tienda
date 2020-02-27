{literal}
<script language="JavaScript">
    $(document).ready(function(){
        $("#cod_proveedor").focus();
        $("#formulario").submit(function(){
                if($("#cod_proveedor").val()==""||$("#descripcion").val()==""||$("#rif").val()==""||$("#telefonos").val()==""){
                    alert("Debe llenar todos los campos obligatorios (**)!");
                    return false;
                }
        });


       
       $(".validadDecimales").numeric();
       $(".validadDecimales").blur(function(){
            if($(this).val()!=''&&$(this).val()!='.'){
                $(this).val(parseFloat($(this).val()));
            }else{
                $(this).val("0.00");
            }
        });


     $(".validadNumerico").numeric();
       $(".validadNumerico").blur(function(){
            if($(this).val()!=''&&$(this).val()!='.'){
                $(this).val(parseInt($(this).val()));
            }else{
                $(this).val("0");
            }
        });

        $("input").attr("readonly", "readonly");
        $("select").attr("disabled", "disabled");

    });

</script>
{/literal}
<form name="formulario" id="formulario" method="POST" action="">
<input type="hidden" name="codigo_empresa" value="{$DatosEmpresa[0].codigo}">
<input type="hidden" name="opt_menu" value="{$smarty.get.opt_menu}">
<input type="hidden" name="opt_seccion" value="{$smarty.get.opt_seccion}">
<input type="hidden" name="opt_subseccion" value="{$smarty.get.opt_subseccion}">
<input type="hidden" name="id_proveedor" value="{$smarty.get.cod}">
  <table width="100%">
        <tr class="row-br">
            <td>
                <table class="tb-tit" cellspacing="0" cellpadding="1" border="0" width="100%">
                    <tbody>
                        <tr>
                        <td width="900"><span style="float:left"><img src="{$subseccion[0].img_ruta}" width="22" height="22" class="icon" />{$subseccion[0].descripcion}</span></td>
                        <td width="75">
                            <table style="cursor: pointer;" class="btn_bg" onClick="javascript:window.location='?opt_menu={$smarty.get.opt_menu}&opt_seccion={$smarty.get.opt_seccion}'" name="buscar" border="0" cellpadding="0" cellspacing="0">
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
<table   width="100%" border="0" >
<tr>
        <td colspan="4" class="tb-head" align="center">
          LOS CAMPOS CON ** SON OBLIGATORIOS&nbsp;
      </td>
</tr>
<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
       Codigo Proveedor**
    </td>
    <td >
        <input type="text" name="cod_proveedor" value="{$datos_proveedores[0].cod_proveedor}" readonly id="cod_proveedor" >

    </td>
</tr>
<tr>
        <td colspan="4" class="tb-head" align="center">
          &nbsp;
      </td>
</tr>
<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
      R.I.F **
    </td>
    <td >
        <input type="text" name="rif" size="60"  value="{$datos_proveedores[0].rif}" id="rif" >

    </td>
</tr>


<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
      N.I.T
    </td>
    <td >
        <input type="text" name="nit" size="60" value="{$datos_proveedores[0].nit}" id="nit" >

    </td>
</tr>


<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
      Descripción
    </td>
    <td >
        <input type="text" name="descripcion"  size="60" value="{$datos_proveedores[0].descripcion}" id="descripcion" >

    </td>
</tr>
<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
       Dirección **
    </td>
    <td >
        <input type="text" name="direccion"  value="{$datos_proveedores[0].direccion}" size="60" id="direccion" >
    </td>
</tr>
<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
       Telefonos **
    </td>
    <td >
        <input type="text" name="telefonos" value="{$datos_proveedores[0].telefonos}" size="60" id="telefonos" >
    </td>
</tr>
<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
       Fax
    </td>
    <td >
        <input type="text" name="fax"  value="{$datos_proveedores[0].fax}" size="60" id="fax" >
    </td>
</tr>
<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
       E-Mail
    </td>
    <td >
        <input type="text"  value="{$datos_proveedores[0].email}"  name="email" size="60" id="email" >
    </td>
</tr>

<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
       Dias de Credito
    </td>
    <td >
        <input type="text" class="validadNumerico" value="{$datos_proveedores[0].diascredito}" name="diascredito" size="60" id="diascredito" >
    </td>
</tr>

<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
     ¿Se calcula retención impuesto ISLR?
    </td>
    <td >
         <select name="caldulo_retencion" id="caldulo_retencion">
             <option {if $datos_proveedores[0].caldulo_retencion eq '0' } selected {/if} value="0">No</option>
             <option {if $datos_proveedores[0].caldulo_retencion eq '1' } selected {/if} value="1">Si</option>
        </select>
    </td>
</tr>
<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
       Monto Retencion Impuesto ISLR
    </td>
    <td >
        <input class="validadDecimales" type="text" name="montoislr" size="60" value="{$datos_proveedores[0].monto_calculo_retencion}" id="montoislr" >
    </td>
</tr>

<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
      Tipo de Comercio
    </td>
    <td >
        <select name="cod_tipo_comercio" id="cod_tipo_comercio">
            {html_options values=$option_values_tipo_comercio output=$option_output_tipo_comercio selected=$datos_proveedores[0].cod_tipo_comercio }
        </select>
    </td>
</tr>

<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
      Tipo de Proveedor
    </td>
    <td >
        <select name="cod_tipo_proveedor" id="cod_tipo_proveedor">
            {html_options values=$option_values_tipo_proveedor output=$option_output_tipo_proveedor selected=$datos_proveedores[0].cod_tipo_proveedor}
        </select>
    </td>
</tr>

<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
      Origen de Proveedor
    </td>
    <td >
        <select name="cod_tipo_origen_proveedor" id="cod_tipo_origen_proveedor">
            {html_options values=$option_values_tipo_origen_proveedor output=$option_output_tipo_origen_proveedor selected=$datos_proveedores[0].cod_tipo_origen_proveedor}
        </select>
    </td>
</tr>

<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
       Clase
    </td>
    <td >
        <input type="text" name="clase" value="{$datos_proveedores[0].clase}" size="60" id="clase" >
    </td>
</tr>

</table>

<table width="100%" border="0">
    <tbody>
    <tr class="tb-tit" align="right">
    <td>
        <input type="submit" name="aceptar" id="aceptar" value="Eliminar Proveedor">
    </td>
    </tr>
    </tbody>
</table>

</form>
