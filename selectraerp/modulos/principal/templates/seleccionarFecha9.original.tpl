{literal}
<script type="text/javascript">

function valida_envia(){
    //valido el codigo
//     if (document.formulario.fecha.value.length==0){
//        alert("Tiene que seleccionar una fecha para el documento")
//        document.formulario.fecha.focus()
//        return false;}

	
	var fecha_val=document.formulario.fecha.value;
	var fecha_val2=document.formulario.fecha2.value;
	//alert(document.formulario.radio.value);
	if (document.formulario.radio[1].checked){
			window.open('../../reportes/rpt_chequesEmitidos.php?fecha='+fecha_val+'&fecha2='+fecha_val2);
	}else{
			window.open('../../reportes/rpt_chequesEmitidosXls.php?fecha='+fecha_val+'&fecha2='+fecha_val2);
	}

	//el formulario se envia
    document.formulario.submit();
}
</script>
{/literal}




<form name="formulario" id="formulario" method="POST" action="" >
<input type="hidden" name="codigo_empresa" value="{$DatosEmpresa[0].codigo}">
<input type="hidden" name="opt_menu" value="{$smarty.get.opt_menu}">
<input type="hidden" name="opt_seccion" value="{$smarty.get.opt_seccion}">

<table  width="100%" border="0">
<tbody>
<tr>
<td  class="tb-tit">
<img src="../../libs/imagenes/118.png" width="20" align="absmiddle" height="20">  <b>Datos Del reporte</b>
</td>
</tr>
</tbody>
</table>


<table   width="100%" border="0" height="100">
<tr>
<td colspan="3" class="tb-head" align="center">
	COMPLETLE LOS CAMPOS MARCADOS CON&nbsp;** OBLIGATORIAMENTE
</td>

<tr>
<td colspan="" class="tb-head" width="170px">
Fecha Desde
</td>
<td>
<input type="text" name="fecha" id="fecha" size="20"  value="{$campos_item[0].fecha}">
{literal}
<script type="text/javascript">//<![CDATA[

var cal = Calendar.setup({
	onSelect: function(cal) { cal.hide() }
});
cal.manageFields("fecha", "fecha", "%d/%m/%Y");
//]]></script>
{/literal}
</td>
</tr>


<tr>
<td colspan="" class="tb-head">
	Fecha de Hasta 
</td>
<td>
	<input type="text" name="fecha2" id="fecha2" size="20"  value="{$campos_item[0].fecha_hasta}">
{literal}
<script type="text/javascript">//<![CDATA[

var cal = Calendar.setup({
	onSelect: function(cal) { cal.hide() }
});
cal.manageFields("fecha2", "fecha2", "%d/%m/%Y");
//]]></script>
{/literal}
    </td>
</tr>


<tr class="tb-tit" align="right">
<td align="left" colspan="3">
<input type="radio" name="radio" value="0" /> Formato EXCEL 
<input type="radio" name="radio" value="1" checked="checked"/> Formato PDF
</td>
<td colspan="3">
<input type="submit" id="aceptar" name="aceptar" value="Enviar" onclick="valida_envia()">
<input type="button" name="cancelar" onclick="javascript:document.location.href='?opt_menu=7';" value="Cancelar">

</td>
</tr>

</tbody>
</table>
</form>

