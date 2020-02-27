{literal}
<script language="JavaScript">
    $(document).ready(function(){
        $("#descripcion").focus();
        $("#iva, #porcentaje").val("0.00");
        $("#iva, #porcentaje").numeric();
        $("#iva, #porcentaje").click(function(){
            $(this).select();
        }).blur(function(){
           
                $(this).val(parseFloat($(this).val()));
       });
        
        $("#formulario").submit(function(){
                if($("#descripcion").val()==""||$("#iva").val()==""||$("#porcentaje").val()==""){
                    $.facebox("Debe llenar todos los campos");
                    $("#descripcion").focus();
                    return false;
                }
            
        });
    });
</script>
{/literal}

<form name="formulario" id="formulario" method="POST" action="">
<input type="hidden" name="codigo_empresa" value="{$DatosEmpresa[0].codigo}">
<input type="hidden" name="opt_menu" value="{$smarty.get.opt_menu}">
<input type="hidden" name="opt_seccion" value="{$smarty.get.opt_seccion}">
<input type="hidden" name="opt_subseccion" value="{$smarty.get.opt_subseccion}">

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
          &nbsp;
      </td>
</tr>
<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
       Codigo
    </td>
    <td >
        <input type="text" readonly name="cod_impuesto_ica" value="{$datos_ica[0].cod_impuesto_ica}" id="cod_impuesto_ica" >
    </td>
</tr>
<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
       Actividad Economica.
    </td>
    <td >
        <input type="text" name="actividad" size="60" value="{$datos_ica[0].actividad}" id="actividad" >
    </td>
</tr>
<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
       Agrupacion
    </td>
    <td >
        <input type="text" name="agrupacion" size="60" value="{$datos_ica[0].agrupacion}" id="agrupacion" >
    </td>
</tr>
<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
       Codigo Actividad CIU
    </td>
    <td >
        <input type="text" name="cod_actividad_ciu" size="60" value="{$datos_ica[0].cod_actividad_ciu}" id="cod_actividad_ciu" >
    </td>
</tr>
<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
       Tarifa en Miles
    </td>
    <td >
        <input type="text" name="tarifa" size="60" value="{$datos_ica[0].tarifa}" id="tarifa" >
    </td>
</tr>
<tr>
    <td valign="top"  colspan="3" width="30%" class="tb-head" >
       Descripción
    </td>
    <td >
        <input type="text" name="descripcion" size="60" value="{$datos_ica[0].descripcion}" id="descripcion" >
    </td>
</tr>


</table>


   
<table width="100%" border="0">
    <tbody>
    <tr class="tb-tit" align="right">
    <td>
        <input type="submit" name="aceptar" id="aceptar" value="Guardar">
    </td>
    </tr>
    </tbody>
</table>

</form>
