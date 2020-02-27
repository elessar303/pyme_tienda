<?php

include("../../../menu_sistemas/lib/common.php");
include("../../libs/php/clases/almacen.php");
include("../../libs/php/clases/proveedores.php");
include("../../libs/php/clases/producto.php");
include("../../libs/php/clases/clientes.php");

$almacen = new Almacen();
$campos = $almacen->ObtenerFilasBySqlSelect("SELECT * FROM almacen;");
foreach ($campos as $key => $item) {
    $arraySelectOption[] = $item["cod_almacen"];
    $arraySelectoutPut[] = $item["descripcion"];
}
$smarty->assign("name_form", "reporte");
$smarty->assign("option_values_almacen", $arraySelectOption);
$smarty->assign("option_output_almacen", $arraySelectoutPut);

$arraySelectOption = "";
$arraySelectoutPut = "";
$provee = new Proveedores();
$campos = $provee->ObtenerFilasBySqlSelect("SELECT * FROM tipo_movimiento_almacen where id_tipo_movimiento_almacen in (2,3,4,5, 8, 11, 12);");
foreach ($campos as $key => $item) {
    $arraySelectOption[] = $item["id_tipo_movimiento_almacen"];
    $arraySelectoutPut[] = $item["descripcion"];
}
$smarty->assign("option_values_tipo_mov1", $arraySelectOption); 
$smarty->assign("option_values_tipo_mov2", $arraySelectoutPut);

//transformacion
$arraySelectOption = "";
$arraySelectoutPut = "";
$campos = $provee->ObtenerFilasBySqlSelect("SELECT * FROM tipo_movimiento_almacen where id_tipo_movimiento_almacen in (11, 12);");
/*foreach ($campos as $key => $item) {
    $arraySelectOption[] = $item["id_tipo_movimiento_almacen"];
    $arraySelectoutPut[] = $item["descripcion"];
}*/
$arraySelectOption[] = 11;
$arraySelectoutPut[] = 'Transformacion';
$smarty->assign("option_values_tipo_mov3", $arraySelectOption); 
$smarty->assign("option_values_tipo_mov3", $arraySelectoutPut);

$campos = $menu->ObtenerFilasBySqlSelect("SELECT * FROM modulos WHERE cod_modulo = {$_GET["opt_seccion"]};");
$smarty->assign("campo_seccion", $campos);

$arraySelectOption = "";
$arraySelectoutPut = "";
$cliente = new Clientes();
$campos = $cliente->ObtenerFilasBySqlSelect("SELECT * FROM clientes");
foreach ($campos as $key => $item) {
    $arraySelectOption[] = $item["id_cliente"];
    $arraySelectOutPut[] = $item["nombre"];
}
$smarty->assign("option_values_cliente", $arraySelectOption);
$smarty->assign("option_output_cliente", $arraySelectOutPut);

$fecha = new DateTime();
$fecha->modify('first day of this month');
$smarty->assign("firstday", $fecha->format('Y-m-d'));
$fecha->modify('last day of this month');
$smarty->assign("lastday", $fecha->format('Y-m-d'));
#$smarty->assign("fecha_mes_anio", $fecha->format('F Y'));
?>
