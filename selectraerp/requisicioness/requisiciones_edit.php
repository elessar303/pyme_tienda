<?php
require_once '../lib/common.php';
include ("../header.php");
$url="requisiciones";
$modulo="Requisiciones";
$tabla="requisiciones";
$titulos=array("Concepto","Observaciones");
$indices=array("8","4");

$conexion=conexion();
$cod_unidad=@$_GET['codigo'];
$cod_centro=@$_GET['cod_centro'];
$id=@$_GET['id'];
$id_det=@$_GET['id_det'];
$rsac=@$_GET['rsac'];
$conexion=conexion();
//echo $conexion;
$paginam=@$_GET['paginam'];
$pagina=@$_GET['pagina'];
//$codigo_snc=@$_GET['codigo_snc'];
if ($rsac=='del')
{
		//echo "Pase aqui";
		$rs = query("delete from requisiciones_det where cod_requisicion=$id and cod_requisicion_det=$id_det",$conexion);	
  		//$rsac ="edit";
}
if(isset($_POST['guardar'])){
	
	$consulta="select * from ".$tabla;
	$resultado= query($consulta,$conexion);

	$indices=array("8","4","10");
	$cadena="";
	foreach($indices as $valor){
		$campo=mysql_field_name($resultado,$valor);
		if($cadena==""){
			
			$cadena=$cadena.$campo."='".$_POST[$campo]."'";
		}
		else{
			$cadena=$cadena.",".$campo."='".$_POST[$campo]."'";
		}
	}
	$cadena1=fecha_sql($_POST['fecha']);
	if($_POST['fecha']!="")
	{
		$cadena=$cadena.",fecha='".$cadena1."'";
	}

	$id=@$_POST['cod_requisicion'];
	$consulta="update ".$tabla." set ".$cadena.", unidad='".$_POST['unidad']."', cod_centro='".$_POST['cod_centro']."'  where cod_requisicion='".$id."'";
	//echo $consulta;
	//exit(0);
	
	$resultado=query($consulta,$conexion);
	$val=$_POST['unidad'];
	$val2=$_POST['cod_centro'];
	$pagina=@$_POST['pagina'];
	$paginam=@$_POST['paginam'];
	$consulta="select max(cod_requisicion_det) as maximo from requisiciones_det where cod_requisicion='".$id."'";
	$resultado=query($consulta,$conexion);
	$fila=fetch_array($resultado);
	
	if (isset($_POST['cod_material']))
	{
	//if (isset($_POST['guardar']))
		//{

		$desc_arreglo;
		$contador=0;
		foreach ($_POST['descrip'] as $desc)
		{
		$desc_arreglo[$contador]=$desc;
		$contador++;
		//echo $desc_arreglo[$contador-1]."<br />";
		}
		$contador=0;
		foreach ($_POST['cantidad'] as $cant)
		{
		$cant_arreglo[$contador]=$cant;
		$contador++;
		//echo $desc_arreglo[$contador-1]."<br />";
		}
		$contador=0;
		foreach ($_POST['medida'] as $cant)
		{
		$uni_arreglo[$contador]=$cant;
		$contador++;
		//echo $desc_arreglo[$contador-1]."<br />";
		}
		//exit(0);
		$contador=0;
		$i=$fila['maximo']+1;
		foreach ($_POST['cod_material'] as $valor)
		{
			//$cadena_des="descripcion".$i;
			//echo "Cadena_des: ".$cadena_des."<br>";
			//$cadena_cant="cantidad".$i;
	//		echo "Cadena_cant: ".$cadena_cant."<br>";
			if($cant_arreglo[$contador]!=""){
				$consulta="insert into requisiciones_det values('".$i."','".$id."','".$valor."','".$desc_arreglo[$contador]."','".$cant_arreglo[$contador]."','".$val."','".$val2."','".$uni_arreglo[$contador]."')";
				//echo "<br />".$consulta;
				query($consulta,$conexion);
			}	
			$i++;
			$contador++;
			$cadena="cod_material".$i;	
		}
	}

	cerrar_conexion($conexion);
	echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	
	parent.cont.location.href=\"".$url.".php?pagina=".$pagina."&codigo=".$val."&cod_centro=".$val2."&paginam=".$paginam."\"
	</SCRIPT>";

}
	$codigo = @$_GET['codigo'];
	$pagina = @$_GET['pagina'];
	//$descripcion= @$_GET['descripcion'];
	$consulta="select * from ".$tabla." where cod_requisicion='".$id."'";
	//echo $consulta;
	$resultado=query($consulta, $conexion);
	//echo $resultado;
	$fila=fetch_array($resultado);
	//echo $fila;
?>
<script language="javascript" src="../lib/common.js"></script>
<script type="text/javascript" src="cambiar_cantidad.js"></script>
<SCRIPT language="JavaScript" type="text/javascript">

function cambiar_cantidad(celda,codigo,descripcion,id,centro,id_det,unidad)
{
	var cam = prompt("Ingrese cantidad para: "+codigo+" "+descripcion)
	if(cam!=null)
	{
	cambiar_cantidades(celda,codigo,descripcion,cam,id,centro,id_det,unidad)
	}
}

</SCRIPT>


<FORM name="sampleform" method="POST" target="_self" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<?
	titulo("Agregar nuevo registro de ".$modulo,"","requisiciones.php?codigo=".$cod_unidad."&cod_centro=".$cod_centro."&pagina=".$pagina,"12");
?>

<TABLE  width="100%" height="100">
<TBODY>
<?
$consulta="select * from requisiciones where cod_requisicion=".$id;
$resultado_req=query($consulta,$conexion);

$fila_req=fetch_array($resultado_req);


$consulta_u="select descripcion from unidades where cod_unidad=".$cod_unidad;
$resultado_u=query($consulta_u,$conexion);
$fila_u=fetch_array($resultado_u);
$des_unidad=$fila_u['descripcion'];
$descripcion_u=$des_unidad;

$consulta_uni="select * from unidades";
$resultado_uni=query($consulta_uni,$conexion);


$consulta_c="select descripcion from centros where cod_centro=".$cod_centro;
$resultado_c=query($consulta_c,$conexion);
$fila_c=fetch_array($resultado_c);
$des_centro=$fila_c['descripcion'];
$descripcion_c=$des_centro;



$consulta_t="select * from ordenes_tipos";
$resultado_tipo=query($consulta_t,$conexion);

?>
	<tr>
	<td class="tb-head"><strong>Unidad Administrativa:</strong></td>
	<td colspan="3"><SELECT name="unidad" id="unidad" onchange="javascript:cargar_ucompra()">
	<option value="<? echo $cod_unidad;?>" > <? echo $descripcion_u; ?> </option>
 	<?                       while($fila_uni=fetch_array($resultado_uni)){
				$cod_uni=$fila_uni['cod_unidad'];
				$des_unidad=$fila_uni['descripcion'];
				echo "<option value='$cod_uni'>$des_unidad</option>";
				
			}
	?></SELECT></td> </tr>
<!-- 	<INPUT type="hidden" name="unidad" value="//echo "$cod_unidad";?>"></td> -->
	</tr>
	<tr>
	<td class="tb-head"><strong>Centro de Costo:</strong></td>
	<td colspan="3"><SELECT name="cod_centro" id="cod_centro">
	<option value="<? echo $cod_centro; ?>" > <? echo $descripcion_c ?> </option>";
            </SELECT></td> </tr> 

<!--      <td colspan="6" class="tb-head"><strong>//echo "$cod_centro -"." $descripcion_c";?></strong> <INPUT type="hidden" name="cod_centro" value="//echo "$cod_centro";?>"></td> -->
	</tr>
	<tr>
	<td class="tb-head">Número:</td>
      	<td colspan="6"><INPUT type="text" readonly="true" size="100" name="cod_requisicion" value="<?echo "$id";?>"></td>
	</tr>
<INPUT type="hidden" name="pagina" value="<?echo $pagina;?>"></td>
<INPUT type="hidden" name="paginam" value="<?echo $paginam;?>"></td>
	<?
	$i=0;
	$cont=0;
	foreach($titulos as $nombre)
	{
		$campo=mysql_field_name($resultado,$indices[$i]);
		if($cont==0)
		{
		//$fecha=$fila_req['fecha'];
		
		echo "<TR>";?><TD class="tb-head"><?echo "Fecha Requisición</TD>";
		echo "<TD><INPUT type=\"text\" name=\"fecha\" id=\"fecha\" size=\"20\" maxlength=\"20\" value=\"".fecha($fila['fecha'])."\"><input name=\"d_fecha\" type=\"image\" id=\"d_fecha\" src=\"../lib/jscalendar/cal.gif\">";
  		?>
		<script type="text/javascript">Calendar.setup({inputField:"fecha",ifFormat:"%d/%m/%Y",button:"d_fecha"});</script></TD>
		</TR><?
		}

		if($cont==0){
		$tipo=$fila_req['tipo'];
		$consulta_ti="select descripcion from ordenes_tipos where cod_orden_tipo=".$tipo;
		$resultado_ti=query($consulta_ti,$conexion);
		$tipo_row=fetch_array($resultado_ti);
		$tipo_des=$tipo_row['descripcion'];

		echo "<TR>";?><td class=tb-head ><?echo "Tipo</td>";
		echo "<td colspan=\"3\"><SELECT name=\"tipo\" id=\"tipo\">";
		echo "<option value= \"$tipo\">$tipo_des</option>";
                        while($fila_tipo=fetch_array($resultado_tipo)){
				$cod_tipo=$fila_tipo['cod_orden_tipo'];
				$descripcion_tipo=$fila_tipo['descripcion'];
				echo "<option value=\"$cod_tipo\">$descripcion_tipo</option>";
			}
		echo "</SELECT></td> </tr>";
		}
		echo "<TR>";?><td class=tb-head ><?echo "$nombre</td>";
		
		if($campo=="concepto")
		{
			//echo "Pase por aqui".$campo;
			?><td colspan="3"><textarea name="<?= $campo;?>" style="width:61%" id="<?  $campo;?>"><?=$fila[$campo]?></textarea></td> </tr><?
		}else
		{
			?><td><INPUT type="text" name="<?echo $campo?>" size="100" value="<?echo $fila[$campo];?>"></td> </tr>	<?
		}		
		$i++;
		$cont++;
	}

?>
    <input type="hidden" name="guardar" value="guardar" />
	<table width="100%"><tr class="tb-tit"><td>Agregar Materiales a la Requisici&oacute;n</td><td align="right" width="30"><?btn("add","window.open('materiales_search.php','Listado de Materiales','width=720, height=550')",2)?></td><td id="grabar" align="right" width="30"><? btn("grabar","document.sampleform.submit()",2)?></td></tr></table>
	<br>
	<input type="hidden" id="contador" name="contador" value="<?echo ($fila['maximo']);?>">
	<input type="hidden" id="inicio" name="inicio" value="<?echo ($fila['maximo']+1);?>">
	<table width="100%" border="0" cellpadding="2" cellspacing="1" class="menu-bg" id="tabla_materiales" name="prueba de tabla">
	<tr class="tb-head">
		<td width="100">Codigo</td>
		<td>Descripci&oacute;n</td>
		<td width="60">Cantidad</td>
		<td width="16">&nbsp;</td>
		<td width="16">&nbsp;</td>
	</tr>
<?
	$consulta_det="select * from requisiciones_det where cod_requisicion=".$id;
	$resultado_det=query($consulta_det,$conexion);
	?>
	<tr>
	<?
	$cont=0;
	while( $fila_det=fetch_array($resultado_det))
	{
		?>
		<td width="100"><? echo $fila_det['cod_material'];?></td>
		<td><? echo $fila_det['descripcion'];?></td>
		<td width="60" id="cantidad<?echo $cont?>"><? echo $fila_det['cantidad'];?></td>
		<td width="16" style="cursor : pointer;" onclick="cambiar_cantidad('cantidad<?echo $cont?>','<?echo $fila_det['cod_material']?>', '<?echo $fila_det['descripcion']?>','<?php echo $id; ?>','<?php echo $cod_centro; ?>','<?php echo $fila_det['cod_requisicion_det'];?>','<?php echo $cod_unidad;?>')"> <img title="Editar" src="../img_sis/ico_edit.gif" title="Editar" width="16" height="16" border="0" /></td>
      	<td width="16"><a href="javascript:;" onclick="confirmar('Seguro de Borrar?','<?php if($fila_req['situacion']=='Registrada'){echo "requisiciones_edit2.php?id="?> <?php echo $id; ?>&cod_centro=<?php echo $cod_centro; ?>&rsac=del&id_det=<?php echo $fila_det['cod_requisicion_det'];?>&codigo=<?php echo $cod_unidad; ?>&pagina=<?php echo $pagina;} ?>'); return self.rValue"><img title="Borrar" src="../img_sis/ico_basket.gif" title="Eliminar" width="15" height="15" border="0" /></a></td>    </tr>
		<?$cont++;
	}
?>
	
  </tbody>
</table>
</FORM>
</body>
</html>
<?
cerrar_conexion($conexion);

?>