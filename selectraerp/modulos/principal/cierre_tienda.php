<?php
session_start();
$_SESSION['ROOT_PROYECTO1']="/var/www/pyme";
require_once("../../../general.config.inc.php");
require_once("../../libs/php/adodb5/adodb.inc.php");
require_once("../../libs/php/configuracion/config.php");
require_once("../../libs/php/clases/ConexionComun.php");
require_once("../../libs/php/clases/comunes.php");
require_once("../../libs/php/clases/login.php");
include_once("../../libs/php/clases/correlativos.php");
require_once "../../libs/php/clases/numerosALetras.class.php";
include("../../../menu_sistemas/lib/common.php");
include("../../libs/php/clases/almacen.php");
require_once("../../config.ini.php");
require_once('../../../includes/clases/BDControlador.php');
ini_set('max_execution_time', 300000);
ini_set("memory_limit","4056M");
error_reporting(-1);
	$pyme=DB_SELECTRA_FAC;
	$pos=POS;
	$dia=date("d");
	$mes=date("m");
	$ano=date("y");
	$hora=date("H");
	$min=date("i");
	$seg=date("s");

	$almacen = new Almacen();
	$sql="SELECT codigo_siga, servidor FROM $pyme.parametros_generales";
	$array_sucursal=$almacen->ObtenerFilasBySqlSelect($sql);

	foreach ($array_sucursal as $key => $value) {
	$sucursal=$value['codigo_siga']; 
	$servidor=$value['servidor']; 
	}

	$sql="SELECT numero_version FROM $pyme.version_pyme order by id desc limit 1";
	$array_version=$almacen->ObtenerFilasBySqlSelect($sql);

	foreach ($array_version as $key => $value) {
	$version=$value['numero_version'];
	}

	$sql="SELECT apertura_date FROM $pyme.apertura_tienda order by id_apertura desc limit 1";
	$array_cierre=$almacen->ObtenerFilasBySqlSelect($sql);

	foreach ($array_cierre as $key => $value) {
	$fecha_cierre=$value['apertura_date'];
	}

	$ruta_master=$_SESSION['ROOT_PROYECTO']."/selectraerp/uploads";

	$path_kardex=$ruta_master."/kardex";
	$path_ventas=$ruta_master."/ventas";
	$path_ventas_pyme=$ruta_master."/ventas_pyme";
	$path_descarga=$ruta_master."/descarga_ventas";
	$path_comprobantes=$ruta_master."/comprobantes";

	$nombre_kardex="000".$sucursal.'_'.$dia.$mes.$ano."_v".$version."_kardex.csv";
	$nomb="000".$sucursal.'_'.$dia.$mes.$ano."_v".$version."_ventas.csv";
	$nomb_pyme="000".$sucursal.'_'.$dia.$mes.$ano."_v".$version."_pyme.csv";
	$nombre_comprobante_cabecera="000".$sucursal.'_'.$dia.$mes.$ano."_v".$version."_comprobante_cabecera.csv";
	$nombre_comprobante_detalle="000".$sucursal.'_'.$dia.$mes.$ano."_v".$version."_comprobante_detalle.csv";
	$nombre_ingresos_detalle="000".$sucursal.'_'.$dia.$mes.$ano."_v".$version."_ingresos_detalle.csv";

	$fecha_movimientos=$fecha_cierre;
	$fecha_ventas_pyme=$fecha_cierre;
	$fecha_ventas_pos=$fecha_cierre;
	$fecha_comprobantes=$fecha_cierre;

	//Reprocesando Kardex
	$sql_kardex="SELECT ka.autorizado_por, ka.estado, ka.fecha, REPLACE(ka.id_documento, ',','.') as id_documento, tma.descripcion, REPLACE(ka.observacion, ',','.') as observacion_cabecera, it.codigo_barras, kad.cantidad, kad.c_esperada, REPLACE(kad.observacion, ',','.') as observacion_detalle, alme.descripcion as almacen_entrada, alms.descripcion as almacen_salida, ubie.descripcion as ubicacion_entrada, ubis.descripcion as ubicacion_salida, ka.cod_movimiento as cod_movimiento, kad.vencimiento, kad.lote, prove.rif , REPLACE(REPLACE(prove.descripcion, ',','.'), char(9), '') as nombre_proveedor, ka.guia_sunagro
		FROM $pyme.kardex_almacen_detalle kad
		LEFT JOIN $pyme.kardex_almacen ka ON kad.id_transaccion=ka.id_transaccion
		LEFT JOIN $pyme.item it ON kad.id_item=it.id_item
		LEFT JOIN $pyme.tipo_movimiento_almacen tma ON ka.tipo_movimiento_almacen=tma.id_tipo_movimiento_almacen
		LEFT JOIN $pyme.almacen alme ON kad.id_almacen_entrada=alme.cod_almacen
		LEFT JOIN $pyme.almacen alms ON kad.id_almacen_salida=alms.cod_almacen
		LEFT JOIN $pyme.ubicacion ubie ON kad.id_ubi_entrada=ubie.id
		LEFT JOIN $pyme.ubicacion ubis ON kad.id_ubi_salida=ubis.id
		LEFT JOIN $pyme.proveedores prove ON ka.id_proveedor=prove.id_proveedor
		WHERE ka.fecha_creacion>='".$fecha_movimientos." 00:00:00'
		AND cod_movimiento<>''";
		//echo $sql_kardex; exit();

		$array_kardex=$almacen->ObtenerFilasBySqlSelect($sql_kardex);

		//Creando el archivo de kardex
		$filas_kardex=$almacen->getFilas();
		$contenido_kardex="";
		if($filas_kardex!=0){
		    foreach ($array_kardex as $key => $value) {
		        if($value['descripcion']=='Cargo'){
		            $value['ubicacion_salida']='No Posee';
		        	}
					$contenido_kardex.=$value['autorizado_por'].','.$value['estado'].','.$value['fecha'].','.$value['id_documento'].','.$value['descripcion'].','.$value['observacion_cabecera'].','.$value['codigo_barras'].','.$value['cantidad'].','.$value['c_esperada'].','.$value['observacion_detalle'].','.$value['almacen_entrada'].','.$value['almacen_salida'].','.$value['ubicacion_entrada'].','.$value['ubicacion_salida'].','.$value['cod_movimiento'].','.$value['vencimiento'].','.$value['lote'].','.$value['rif'].','.trim($value['nombre_proveedor']).','.$value['guia_sunagro'].("\r\n");
				}
		        $pf_kar=fopen($path_kardex."/".$nombre_kardex,"w+");
		        fwrite($pf_kar, utf8_decode($contenido_kardex));
		        fclose($pf_kar);
		        //Actualizamos el kardex_control con el ultimo registro de kardex
		        $instruccion="UPDATE $pyme.kardex_control SET id_kardex=(SELECT max(id_transaccion) FROM $pyme.kardex_almacen)";
		        $almacen->Execute2($instruccion);		    
		}
		//Fin Reprocesar Kardex

		//Reprocesando Ventas Pyme
		$sql_pyme="SELECT REPLACE(a.nombre,',',' ') as nombre, a.telefonos, a.email, REPLACE(a.direccion,',',' ') as direccion, a.rif, a.nit, b.id_factura, b.cod_factura_fiscal, b.impresora_serial, b.fechaFactura, b.subtotal, b.descuentosItemFactura, b.montoItemsFactura, b.ivaTotalFactura, b.TotalTotalFactura, b.cantidad_items, b.totalizar_total_general, b.formapago, b.fecha_creacion, REPLACE(f.nombreyapellido,',',' ') as nombreyapellido, b.usuario_creacion, d.codigo_barras, REPLACE(c._item_descripcion,',',' ') as _item_descripcion, c._item_cantidad, c._item_totalsiniva, c._item_totalconiva, e.totalizar_monto_efectivo as monto_efectivo, e.totalizar_monto_cheque as monto_cheque, e.totalizar_nro_cheque as nro_cheque, e.totalizar_nombre_banco as banco_cheque, e.totalizar_monto_tarjeta as monto_tarjeta, e.totalizar_monto_deposito as monto_deposito, e.totalizar_nro_deposito as nro_deposito, e.totalizar_banco_deposito as banco_deposito, e.totalizar_monto_credito2 as monto_credito, c.id_detalle_factura
			FROM $pyme.factura_detalle c
			LEFT JOIN $pyme.factura b ON b.id_factura = c.id_factura 
			LEFT JOIN $pyme.clientes a ON  a.id_cliente = b.id_cliente 
			LEFT JOIN $pyme.item d ON c.id_item = d.id_item 
			LEFT JOIN $pyme.factura_detalle_formapago e ON c.id_factura = e.id_factura
			LEFT JOIN $pyme.usuarios f ON b.cod_vendedor = f.cod_usuario
			WHERE b.fecha_creacion>='".$fecha_ventas_pyme." 00:00:00'";

	    //echo $sql_pyme; exit();
		$array_venta = $almacen->ObtenerFilasBySqlSelect($sql_pyme);

		//Creando el archivo de ventas pyme
		$filas_pyme=$almacen->getFilas();
		$contenido_pyme="";
		if($filas_pyme!=0){
		    foreach ($array_venta as $key => $value) {
			$contenido_pyme.=$value['nombre'].';'.$value['telefonos'].';'.$value['email'].';'.$value['direccion'].';'.$value['rif'].';'.$value['nit'].';'.$value['id_factura'].';'.$value['cod_factura_fiscal'].';'.$value['impresora_serial'].';'.$value['fechaFactura'].';'.$value['subtotal'].';'.$value['descuentosItemFactura'].';'.$value['montoItemsFactura'].';'.$value['ivaTotalFactura'].';'.$value['TotalTotalFactura'].';'.$value['cantidad_items'].';'.$value['totalizar_total_general'].';'.$value['formapago'].';'.$value['fecha_creacion'].';'.$value['nombreyapellido'].';'.$value['usuario_creacion'].';'.$value['codigo_barras'].';'.$value['_item_descripcion'].';'.$value['_item_cantidad'].';'.trim($value['_item_totalsiniva']).';'.$value['_item_totalconiva'].';'.$sucursal.';'.trim($value['monto_efectivo']).';'.trim($value['monto_cheque']).';'.trim($value['nro_cheque']).';'.trim($value['banco_cheque']).';'.trim($value['monto_tarjeta']).';'.trim($value['monto_deposito']).';'.trim($value['nro_deposito']).';'.trim($value['banco_deposito']).';'.trim($value['monto_credito']).';'.$value['id_detalle_factura'].("\r\n");
				}
		        $pf_pyme=fopen($path_ventas_pyme."/".$nomb_pyme,"w+");
		        fwrite($pf_pyme, utf8_decode($contenido_pyme));
		        fclose($pf_pyme);
		        //Actualizamos el ticket_control_pyme con el ultimo registro de kardex
		        $instruccion="UPDATE $pyme.ticket_control_pyme SET ticket_id=(SELECT max(id_factura) FROM $pyme.factura)";
		        $almacen->Execute2($instruccion);		    
		}
		//Fin Reprocesar ventas pyme

		//Reprocesando Ventas POS

		$sql_pos="SELECT a.ID as id_tickets ,  a.TICKETTYPE ,  a.TICKETID ,  a.PERSON ,  a.CUSTOMER ,  a.STATUS,    b.TICKET  ,   b.LINE  ,   b.PRODUCT  ,   b.ATTRIBUTESETINSTANCE_ID  ,   b.UNITS  ,   b.PRICE  ,   b.TAXID as taxid_tikestline  ,      b.DATENEW as datenew_ticketlines,    c.ID as id_products  ,   c.REFERENCE  ,   c.CODE  ,   c.CODETYPE  ,   REPLACE(c.NAME ,',',' ') as nombre_producto  ,   c.PRICEBUY  ,   c.PRICESELL  ,   c.CATEGORY  ,   c.TAXCAT  ,   c.ATTRIBUTESET_ID  ,  c.STOCKCOST  ,   c.STOCKVOLUME  ,    cast(c.ISCOM as unsigned) as ISCOM  ,   cast(c.ISSCALE as unsigned) as ISSCALE,  c.QUANTITY_MAX  ,   c.TIME_FOR_TRY,    d.ID as id_gente  ,   d.SEARCHKEY  ,   d.TAXID  ,   REPLACE(d.NAME ,',',' ') as name_persona  ,   d.TAXCATEGORY  ,   d.CARD  ,   d.MAXDEBT  ,   d.ADDRESS  ,   d.ADDRESS2  ,   d.POSTAL  ,   d.CITY  ,   d.REGION  ,   d.COUNTRY  ,  REPLACE(d.FIRSTNAME ,',',' ') as FIRSTNAME,  REPLACE(d.LASTNAME ,',',' ') as LASTNAME,   d.EMAIL  ,   d.PHONE  ,   d.PHONE2  ,   d.FAX  ,   d.NOTES  ,    cast(d.VISIBLE as unsigned) as visible  ,   d.CURDATE  ,   d.CURDEBT  ,     e.ID as id_receipts  ,   e.MONEY as money_receipts  ,   e.DATENEW  ,   f.MONEY  ,   f.HOST  ,   f.HOSTSEQUENCE  ,   f.DATESTART  ,   f.DATEEND
      		from $pos.tickets as a,
      		$pos.ticketlines as b,
      		$pos.products as c,
      		$pos.customers as d,
      		$pos.receipts as e,
      		$pos.closedcash as f
      		WHERE a.id=b.ticket and b.product=c.id
      		AND a.customer=d.id and a.id=e.id and e.money=f.money
      		AND b.SOLD=1
      		AND b.DATENEW>='".$fecha_ventas_pos." 00:00:00'";

      		//echo $sql_pos; exit();
      		$array_venta = $almacen->ObtenerFilasBySqlSelect($sql_pos);

			//Se crea el archivo de Ventas para subir
			$filas_pos=$almacen->getFilas();
			if($filas_pos==0){
			    $contenido_pos="";
			    }else{ 
			        $cont=0;
			        foreach ($array_venta as $value) {
			            foreach( $value as $key1){
			                     if($cont==60){
			                        $contenido_pos.=$key1.",".$sucursal.("\r\n");
			                        $cont=0;
			                        }else{
			                        $contenido_pos.=$key1.",";
			                        $cont++;
			                        }
			                }
			            }
			        $pf=fopen($path_ventas."/".$nomb,"w+");
			        fwrite($pf, utf8_decode($contenido_pos));
			        $instruccion="TRUNCATE $pos.ticket_control; INSERT INTO $pos.ticket_control (ticket_id) SELECT max(TICKETID) FROM $pos.tickets;";
			        //echo $instruccion; exit();
					$almacen->Execute2($instruccion);
			        fclose($pf);
			        chmod($path_ventas."/".$nomb,  0777);
			}

?>