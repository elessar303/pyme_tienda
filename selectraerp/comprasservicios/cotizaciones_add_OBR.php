<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once '../lib/common.php';

include ("../header.php");
$conexion=conexion();
//echo $conexion;

$url="cotizaciones_list";
$modulo="Cotizaciones";
$tabla="cotizaciones";
$titulos=array("Codigo","(%) Descuento ","Tipo de Pago","Días de Pago","Tiempo de Entrega (días)","Tiempo de Garantia (dias)","Total Cotización (Bs)","Observaciones");
$indices=array("0","7","9","10","5","6","8","13");
$req=$_GET['cod_requisicion'];

if(isset($_POST["guardardatos"])) 
{
	
	//$codigo=$_POST['codigo'];
	$tipodescuento=$_POST['tipodescuento'];
	$descuento=$_POST['descuento'];
	$fecha=$_POST['fecha'];
	$entrega=$_POST['tiempo_entrega'];
	$garantia=$_POST['tiempo_garantia'];
	$total=$_POST['total'];
	$tipopago=$_POST['tipopago'];
	$diaspago=$_POST['dias_pago'];
	$proveedor=$_POST['proveedor'];
	$observaciones=$_POST['obser'];
	$usuario=$_SESSION['nombre'];
	
	$consultaa="select max(codigo) as valor from cotizaciones";
	$resultadoo=query($consultaa,$conexion);
				
	$fila_=fetch_array($resultadoo);
	$max_cotizaciones=$fila_['valor'];
	$codigo=$max_cotizaciones+1;
	
	$req=$_GET['cod_requisicion'];

	$consulta="insert into ".$tabla."  values ($codigo,$proveedor,'".fecha_sql($fecha)."','','Creada',$entrega,$garantia,$descuento,$total,'$tipopago',$diaspago,$req,'$tipodescuento','$observaciones','$usuario')";
		
	$resultado=query($consulta,$conexion);
		
	//Guardar los detalles cotizacion
	$req=$_GET['cod_requisicion'];
	$requi = "SELECT * FROM requisiciones_det WHERE (cod_requisicion = $req) ORDER BY cod_requisicion_det ";
	$materiales=query($requi,$conexion);
		
	$cantidad=num_rows($materiales);
	$cons=0;
	for($i=0;$i<=$cantidad;$i++){
		if (($precio=$_POST['precio'.$i])!=0){
			$codigoo=$_POST['codigo'.$i];
			$cantidadd=$_POST['cantidad'.$i];
			$descuentoo=$_POST['descuento'.$i];
			$ivaa=$_POST['iva'.$i];
			$consulta="insert into cotizaciones_detalles  values ($codigo,'$codigoo',$cantidadd,$precio,'',$ivaa,'Creada',$cons)";
			$cons++;
			$resultado=query($consulta,$conexion);
		}
		
	}

	?>
	<SCRIPT language="JavaScript" type="text/javascript">
		alert("Se ha guardado una nueva cotización!!");
			
	</SCRIPT>
		
	<?php
	echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	     location.href=\"cotizaciones_list.php?cod_requisicion=".$_GET['cod_requisicion']."\"
	</SCRIPT>";
}

	$consulta="select * from ".$tabla;
	$resultado=query($consulta,$conexion);

?>
<html class="fondo">
<head>
  <title></title>
  <link href="../estilos.css" rel="stylesheet" type="text/css">
  <SCRIPT language="JavaScript" type="text/javascript" src="../lib/common.js">
  </SCRIPT>
<script language="javascript" src="cal2.js"></script>
<script language="javascript" src="cal_conf2.js"></script>
<SCRIPT language="JavaScript" type="text/javascript">
	function validar(){
		var bandera=false
		if(document.sampleform.proveedor.value==""){
			alert("Debe seleccionar un proveedor!!!")
			return
		}else{
			document.sampleform.submit();
		}
	}
	
	function actualizar_formulario(valor,num_reg,num_reg)
	{
	
	total_gen = parseFloat(window.document.sampleform.total.value)	
	
	//capturamos el valor del iva
	var cadena="iva"+valor
	var cadena_temp=document.getElementById(cadena)
	valor_iva = parseFloat(cadena_temp.value)
	
	//capturamos el valor del precio
	cadena="precio"+valor
	
	cadena_temp=document.getElementById(cadena)
	textoCampo =parseFloat(cadena_temp.value)

	//valor de la cantidad
	cadena="cantidad"+valor
	cadena_temp=document.getElementById(cadena)
	cantidad =parseFloat(cadena_temp.value)
	
	//alert(total_gen+" "+textoCampo+" "+cantidad)
	
	var total=(textoCampo*cantidad)+valor_iva
	
	cadena="totalfinal"+valor
	cadena_temp=document.getElementById(cadena)
	cadena_temp.value=total
	
	cadena="totalfinall"+valor
	cadena_temp=document.getElementById(cadena)
	cadena_temp.value=total

	total=0
	for(i=1;i<=num_reg;i++){
		var cadena="totalfinal"+i
		var temp=document.getElementById(cadena)
		total=total+parseFloat(temp.value)
	}
	totaltotal=total
		if (window.document.sampleform.descuento.value==0){
			window.document.sampleform.total.value = total.toFixed(2)
		}else{
			
			if (window.document.sampleform.tipodescuento.value=="(%)"){
				total=total-((total*window.document.sampleform.descuento.value)/100)
			}else{
				if (window.document.sampleform.tipodescuento.value=="Monto Bs."){
					
					total=total-window.document.sampleform.descuento.value
				}
				else{	
					alert("Recuerde que debe seleccionar un tipo de Descuento!!!")
				}
			}
			
		}
		if (total>=0){
			window.document.sampleform.total.value = total.toFixed(2)
		}
		else{
			alert("El descuento es mayor al monto total de la Cotizacion!!!")
			window.document.sampleform.descuento.value=0
			window.document.sampleform.total.value =totaltotal
		}
	
	}
	function checkMyForm(valor,num_reg,var_por_iva) 
	{
	
		var cadena,temp, i,total=0,cad_iva,temp_iva,cad_cantidad,temp_cantidad,sub_total=0
		var cad_iva_sino,temp_iva_sino,cad_iva_sino_o,temp_iva_sino_o,cadena_total,temp_total,cadena_imponible,temp_imponible
	
	//cadena de cantidad
		cad_cantidad="cantidad"+valor
		temp_cantidad=document.getElementById(cad_cantidad)
	
	//cadena de iva
		cad_iva_sino="iva"+valor
		temp_iva_sino=document.getElementById(cad_iva_sino)
		cad_iva_sino_o="iva_sino_o"+valor
		temp_iva_sino_o=document.getElementById(cad_iva_sino_o)
	
	//cadena total
		cadena_total="totalfinal"+valor
		temp_total=document.getElementById(cadena_total)
		cadena_total_o="totalfinall"+valor
		temp_total_o=document.getElementById(cadena_total_o)
	
	
		cadena="precio"+valor
		temp_precio=document.getElementById(cadena)
		var_pre=parseFloat(temp_precio.value)
		
		if (!var_pre)
		{
			temp_iva_sino.value = 0
			temp_iva_sino_o.value = 0	
		}else{
			
			cad_iva="iva_sino_opt"+valor
			temp_iva=document.getElementById(cad_iva)
				
				if (temp_iva.checked)
				{
					
					temp_iva.value=1
					textoCampo1 = parseFloat(temp_precio.value)
					
					cantidad = parseFloat(temp_cantidad.value)
					textoCampo=textoCampo1*cantidad
				
					temp_iva_sino.value=parseFloat(textoCampo*var_por_iva/100).toFixed(2)
					temp_iva_sino_o.value=parseFloat(textoCampo*var_por_iva/100).toFixed(2)
					
					sub_total=parseFloat(textoCampo)
					textoCampo_iva=parseFloat(temp_iva_sino_o.value)
					temp_total.value=(textoCampo_iva+sub_total).toFixed(2)
					temp_total_o.value=(textoCampo_iva+sub_total).toFixed(2)
				
					
					
					
				}else
				{
					temp_iva.value=1
					var_monto_por_iva=parseFloat(temp_iva_sino.value)
					var_monto_sub_total=parseFloat(temp_total.value)
					temp_total.value= (var_monto_sub_total-var_monto_por_iva).toFixed(2)
					temp_total_o.value= (var_monto_sub_total-var_monto_por_iva).toFixed(2)
				//var_monto_total=parseFloat(window.document.fproveedoresadd.montoorden.value)
					temp_iva_sino.value=0
					temp_iva_sino_o.value=0
					
				}
			}
	//codigo nuevo
	
		
		
		
		
		total=0
		for(i=1;i<=num_reg;i++){
			var cadena="totalfinal"+i
			var temp=document.getElementById(cadena)
			total=total+parseFloat(temp.value)
		}
		totaltotal=total
		if (window.document.sampleform.descuento.value==0){
			window.document.sampleform.total.value = total.toFixed(2)
		}else{
			
			if (window.document.sampleform.tipodescuento.value=="(%)"){
				total=total-((total*window.document.sampleform.descuento.value)/100)
			}else{
				if (window.document.sampleform.tipodescuento.value=="Monto Bs."){
					
					total=total-window.document.sampleform.descuento.value
				}
				else{	
					alert("Recuerde que debe seleccionar un tipo de Descuento!!!")
				}
			}
			
		}
		if (total>=0){
			window.document.sampleform.total.value = total.toFixed(2)
		}
		else{
			
			alert("El descuento es mayor al monto total de la Cotizacion!!!")
			window.document.sampleform.descuento.value=0
			window.document.sampleform.total.value =totaltotal
		}
	//********************************************************************
	
	
		
		
	}
	function actualizar_descuento(num_reg){
		var total
		total=0
		for(i=1;i<=num_reg;i++){
			var cadena="totalfinal"+i
			var temp=document.getElementById(cadena)
			total=total+parseFloat(temp.value)
		}
		totaltotal=total
		var cadena="descuento"
		var temp=document.getElementById(cadena)
		descuento=parseFloat(temp.value)
		if (window.document.sampleform.descuento.value==0){
			window.document.sampleform.total.value = total.toFixed(2)
		}else{
			
			
			if (window.document.sampleform.tipodescuento.value=="(%)"){
				total2=((total*descuento)/100)
				total=parseFloat(total)-total2
				if (total>0){
					window.document.sampleform.total.value =total
				}
				else{
					alert("El descuento es mayor al monto total de la Cotizacion!!!")
					window.document.sampleform.descuento.value=0
					window.document.sampleform.total.value =totaltotal
				}
				
				
			}else{
				if (window.document.sampleform.tipodescuento.value=="Monto Bs."){
					total=total-window.document.sampleform.descuento.value
					if (total>0){
						window.document.sampleform.total.value =total
					}
					else{
						alert("El descuento es mayor al monto total de la Cotizacion!!!")
						window.document.sampleform.descuento.value=0
						window.document.sampleform.total.value =totaltotal
					}
				}
				else{	
					alert("Recuerde que debe seleccionar un tipo de Descuento!!!")
				}
			}
			
		}
	}

function actualiza(iva,cantidad,num_reg){

	cadena="precio"+cantidad
	temp_precio=document.getElementById(cadena)
	var_pre=parseFloat(temp_precio.value)

	cad_cantidad="cantidad"+cantidad
	temp_cantidad=document.getElementById(cad_cantidad)

	var cadena="totalfinal"+cantidad
	var temp=document.getElementById(cadena)

	var cadena2="totalfinall"+cantidad
	var temp2=document.getElementById(cadena2)


	var cant_pre=var_pre*temp_cantidad.value
	
	var temp1=parseFloat(iva)+cant_pre
	
	temp.value=temp1
	temp2.value=temp1
	total=0;
	for(i=1;i<=num_reg;i++){
			var cadena="totalfinal"+i
			var temp=document.getElementById(cadena)
			total=total+parseFloat(temp.value)
			
	}
	window.document.sampleform.total.value = total.toFixed(2)

}
</SCRIPT>
</head>
<body>
<FORM name="sampleform" method="POST" target="_self" action="<?php echo $_SERVER['PHP_SELF']."?cod_requisicion=$req"; ?>">
<TABLE  width="100%" height="100">
<TBODY>
<?
/*
$consulta="select max(codigo) as valor from cwprogra";
$resultado_progra=query($consulta,$conexion);
//echo $consulta;
$fila_progra=fetch_array($resultado_progra);
$max_progra=$fila_progra['valor'];
$valor=$max_progra+1;
*/
$consulta="select * from proveedores ORDER BY compania";
$resultado_cuenta=query($consulta,$conexion);
$resultado_cuenta1=query($consulta,$conexion);

?>
    <tr >
      <td colspan="7" height="30" class="tb-tit"><strong>Agregar Nuevo Registro de <?echo $modulo?></strong></td>
    </tr>

	<?
	$i=0;
	$cont=0;
	foreach($titulos as $nombre){
		
		$campo=mysql_field_name($resultado,$indices[$i]);
		$req=$_GET['cod_requisicion'];
			$requi = "SELECT * FROM requisiciones_det WHERE (cod_requisicion = $req) ORDER BY cod_requisicion_det ";
			$materiales2=query($requi,$conexion);
				$totalregistros=0;
				while($canmateriales=fetch_array($materiales2)){
					$totalregistros+=1;
				}
			
		if($nombre=="(%) Descuento "){
			echo "<TR>";?><td class=tb-head  colspan="2" ><?echo "$nombre:</td>";
			echo "<td colspan=\"3\"><SELECT name=\"tipodescuento\" id=\"tipodescuento\">";
			echo "<option value='' selected='selected'> Ninguno</option>";
			echo "<option value='(%)' > (%)</option>";
			echo "<option value='Monto Bs.' > Monto Bs.</option>";
			echo "</SELECT>  ";
			echo "<INPUT  type=\"text\" name=\"descuento\" id=\"descuento\" size=\"10\" onBlur=\"actualizar_descuento($totalregistros);\" value=\"0\"></td> </tr>";
		}else{
		     if ($nombre=="Tipo de Pago"){
			echo "<TR>";?><td class=tb-head colspan="2"><?echo "$nombre:</td>";
			echo "<td colspan=\"3\"><SELECT name=\"tipopago\" id=\"tipopago\">";
			echo "<option value='' selected='selected'> Ninguno</option>";
			echo "<option value='Abono en cuenta'>Abono en cuenta</option>";
			echo "<option  value='Carta de Crédito'>Carta de Crédito</option>";
			echo "<option  value='Cheque'>Cheque</option>";
			echo "</SELECT>  ";
			echo "</td> </tr>";
			
			
			}else{
				echo "<TR>";?><td class=tb-head colspan="2"><?echo "$nombre:</td>";
				if($campo=='codigo'){
					$consultaa="select max(codigo) as valor from cotizaciones";
					$resultadoo=query($consultaa,$conexion);
				
					$fila_=fetch_array($resultadoo);
					$max_cotizaciones=$fila_['valor'];
					$valor=$max_cotizaciones+1;
					echo "<td  colspan=\"3\"><INPUT  type=\"text\" size=\"50\" disabled='true' value=\"$valor\"> <INPUT type=\"hidden\" name=\"$campo\" id=\"$campo\"value=\"$valor\"></td> </tr>";
				}else{
					if($campo=='total'){
						echo "<td  colspan=\"3\"><INPUT readonly='true' type=\"text\" name=\"$campo\" id=\"$campo\" value=\"0\" size=\"50\"></td> </tr>";
					}else{
						if($campo=="observaciones"){
							echo "<td colspan=\"3\" height=\"25\">
							<textarea name=\"obser\"  cols=48 id=\"obser\" maxlength=\"250\"></textarea>
							</td>";
						}else{
							echo "<td  colspan=\"3\"><INPUT  type=\"text\" name=\"$campo\" id=\"$campo\" value=\"0\" size=\"50\" onkeypress=\"javascript:return numeros(event)\"></td> </tr>";
						}
					}
				}
				
			}
		}
		
		$i++;
		$cont++;
		
		
		
		if($cont==1){
		 	 echo "<TR>";?><td class=tb-head colspan="2"><?echo "Proveedor:</td>";
			echo "<td colspan=\"3\"><SELECT name=\"proveedor\" id=\"proveedor\">";
			echo "<option value=''> Ninguno</option>";
			while($rs=fetch_array($resultado_cuenta)){
				echo "<option value='".$rs['cod_proveedor']."'> ".$rs['compania']."</option>";
			}	
			echo "</SELECT></td> </tr>";
		}
		if ($cont==2){
			echo "<TR>";?><TD class="tb-head" colspan="2"><?echo "Fecha: </TD>";
			echo "<TD width=30><INPUT type=\"text\" name=\"fecha\" id=\"fecha\" size=\"15\" maxlength=\"12\" value=\"".date("d/m/Y")."\"></td><td>&nbsp;<input name=\"d_fecha\" type=\"image\" id=\"d_fecha\" src=\"../lib/jscalendar/cal.gif\">";
			?>
			<script type="text/javascript">Calendar.setup({inputField:"fecha",ifFormat:"%d/%m/%Y",button:"d_fecha"});</script></TD>
			</TR><?
		}
	}
?>
	
    	<tr>
	<td colspan="7" height="30" class="tb-tit"><strong>Detalles de Materiales <?echo $modulo?></strong></td>
	</tr>
	<tr>
		<TABLE  width="100%" height="100">
		<tr class="tb-head">
		<td  align="center"><strong>C&oacute;digo</strong></td>
		<td align="center"><strong>Descripci&oacute;n</strong></td>
		<td align="center"><strong>Cantidad</strong></td>
		<td align="center"><strong>Precio Unitario</strong></td>
		<td align="center"><strong>I.V.A.</strong></td>
		<!--<td align="center"><strong>Descuento</strong></td>-->
		<td align="center"><strong>Total</strong></td>
		<td align="center"><strong>I.V.A.</strong></td>
		</tr>
		
		<?php
			
			$materiales=query($requi,$conexion);
			$cantidad=1;
			while($canmateriales=fetch_array($materiales)){
				$iva=$canmateriales['cod_material'];
				$materialesiva = "SELECT iva FROM materiales WHERE cod_material='".$iva."'";
				
				$ivamaterial=query($materialesiva,$conexion);
				$ivamaterial1=fetch_array($ivamaterial);
				$var_por_iva=$ivamaterial1['iva'];
				$var_por_iva= number_format($var_por_iva, 0);
				
								
				
		?>
		<tr>
			<td width="10" ><input  disabled="true"  type="text"  size="10"  value="<?php echo $canmateriales['cod_material'];?>" />
			<INPUT type="hidden"  name="codigo<?php echo $cantidad?>" id="codigo<?php echo $cantidad?>"  value="<?php echo $canmateriales['cod_material'];?>"/></td></td>
			<td ><input  disabled="true" name="descrip" id="descrip" type="text"  size="30"  value="<?php echo $canmateriales['descripcion'];?>"></td>
			<td ><input   disabled="true"  type="text"  size="10"  value="<?php echo $canmateriales['cantidad'];?>"/><INPUT type="hidden" name="cantidad<?php echo $cantidad?>" id="cantidad<?php echo $cantidad?>" value="<?php echo $canmateriales['cantidad'];?>"/></td>
			<td ><input name="precio<?php echo $cantidad?>" id="precio<?php echo $cantidad?>" type="text"  size="10" <?php if(!isset($_POST["guardardatos"])) { echo 'value="0.00"';}?> style="width:100%"  onkeypress="javascript:return numeros(event)" /></td>
			<td >
			<input  name="iva_sino_o<?php echo $cantidad?>" id="iva_sino_o<?php echo $cantidad?>"  type="hidden" size="10" style="width:100%" value="0.00"/> 
			<input name="iva<?php echo $cantidad?>" id="iva<?php echo $cantidad?>"  type="text"  value= "<?php if (isset($canmateriales['iva'])){echo $canmateriales['iva'];}else{ echo '0.00';}?>"  onblur="actualiza(this.value,<?php echo $cantidad ?>,<?php echo $totalregistros; ?>)" />
		
			</td>
			<!--<td ><input name="descuento<?php echo $cantidad?>" id="descuento<?php echo $cantidad?>" type="text" style="width:100%" size="10" value="0.00 "/></td> -->
			<td  ><input disabled='disable' name="totalfinall<?php echo $cantidad?>" id="totalfinall<?php echo $cantidad?>" type="text" style="width:100%" size="10" value="0.00"/>
			<input type="hidden" name="totalfinal<?php echo $cantidad?>" id="totalfinal<?php echo $cantidad?>" value="0.00"/></td>
			<td>
			<input  name="iva_sino_opt<?php echo $cantidad?>" type="checkbox" id="iva_sino_opt<?php echo $cantidad?>" value="checkbox"  onchange="checkMyForm(<?php echo $cantidad?>,<?php echo $totalregistros; ?>,<?php echo $var_por_iva; ?>);" >
			</td>
			
	
		</tr>
		<?php
			$cantidad+=1;
			}
		?>
		</table>
	</tr>

	
	<tr >
	
      		<TABLE  width="100%" height="100">
	     		<tr>
				
      				<td class="" align="right">
				<input  type="hidden" name="guardardatos"  id="guardardatos" value="Guardar" />
				<input  type="button" name="guardar"  id="guardar" value="Guardar" onclick="javascript:validar()" />&nbsp;<INPUT type="button" name="cancelar" value="Cancelar" onclick="javascript:self.history.back();"></td>
				
			</tr>
		</table>
    	</tr>
  </tbody>
</table>
</FORM>
</body>
</html>
<?
cerrar_conexion($conexion);
?>