<?php

include("../../../menu_sistemas/lib/common.php");
include("../../libs/php/clases/almacen.php");
include("../../libs/php/clases/proveedores.php");
include("../../libs/php/clases/producto.php");
include("../../libs/php/clases/clientes.php");
require_once("../../libs/php/clases/login.php");
$bdCentral= "selectrapyme_central";
$almacen = new Almacen();
$campos = $almacen->ObtenerFilasBySqlSelect("SELECT * FROM almacen;");
foreach ($campos as $key => $item) {
    $arraySelectOption[] = $item["cod_almacen"];
    $arraySelectoutPut[] = $item["descripcion"];
}
$smarty->assign("name_form", "reporte");
$smarty->assign("option_values_almacen", $arraySelectOption);
$smarty->assign("option_output_almacen", $arraySelectoutPut);

$campos = $almacen->ObtenerFilasBySqlSelect("SELECT * FROM parametros_generales;");
$smarty->assign("paramentros",$campos);

$arraySelectOption = "";
$arraySelectoutPut = "";
$provee = new Proveedores();
$campos = $provee->ObtenerFilasBySqlSelect("SELECT * FROM proveedores;");
foreach ($campos as $key => $item) {
    $arraySelectOption[] = $item["id_proveedor"];
    $arraySelectoutPut[] = $item["descripcion"];
}
$smarty->assign("option_values_provee", $arraySelectOption);
$smarty->assign("option_output_provee", $arraySelectoutPut);

$campos = $menu->ObtenerFilasBySqlSelect("SELECT * FROM modulos WHERE cod_modulo = {$_GET["opt_seccion"]};");
$smarty->assign("campo_seccion", $campos);

$arraySelectOption = "";
$arraySelectoutPut = "";
$producto = new Producto();
$campos = $producto->ObtenerFilasBySqlSelect("SELECT * FROM ubicacion");
foreach ($campos as $key => $item) {
    $arraySelectOption[] = $item["id"];
    $arraySelectOutPut[] = $item["descripcion"];
}
$smarty->assign("option_values_producto", $arraySelectOption);
$smarty->assign("option_output_producto", $arraySelectOutPut);

$arraySelectOption = "";
$arraySelectoutPut = "";
$producto = new Producto();
$campos = $producto->ObtenerFilasBySqlSelect("SELECT * FROM tipo_toma");
foreach ($campos as $key => $item) {
    $arraySelectOption2[] = $item["id"];
    $arraySelectOutPut2[] = $item["descripcion"];
}
$smarty->assign("option_values_tipo", $arraySelectOption2);
$smarty->assign("option_output_tipo", $arraySelectOutPut2);

//FILTRO PARA EL CODIGO SIGA
//$bdpp = DB_SELECTRA_PYMEPP;
$bdpp=DB_REPORTE_CENTRAL;
$filtro_siga_id="";
$siga=new Almacen();
$cod_sig=$siga->ObtenerFilasBySqlSelect("select distinct siga from $bdpp.vproducto");
foreach ($cod_sig as $key => $item) {
    $arraycod_sigainput[] = $item["siga"];
    
}
$smarty->assign("option_values_siga", $arraycod_sigainput);
//FIN DEL FILTRO PARA EL CODIGO SIGA


// punto de ventas
$arraySelectOption = "";
$arraySelectoutPut1 = "";
$cliente = new Clientes();

$punto = $cliente->ObtenerFilasBySqlSelect("SELECT `nombre_punto`,codigo_siga_punto as siga  from $bdCentral.puntos_venta where estatus='A'");
foreach ($punto as $key => $puntos) {
    $arraySelectOption[] = $puntos["siga"];
    $arraySelectOutPut1[] = $puntos["nombre_punto"];
}

$smarty->assign("option_values_punto", $arraySelectOption);
$smarty->assign("option_output_punto", $arraySelectOutPut1);

//estados
$arraySelectOption2 = "";
$arraySelectoutPut2 = "";
$cliente = new Clientes();
$campos = $cliente->ObtenerFilasBySqlSelect("SELECT * FROM $bdCentral.estados");
foreach ($campos as $key => $item) {
    $arraySelectOption2[] = $item["codigo_estado"];
    $arraySelectOutPut2[] = $item["nombre_estado"];
}
$smarty->assign("option_values_estado", $arraySelectOption2);
$smarty->assign("option_output_estado", $arraySelectOutPut2);

//categoria
$arraySelectOption3 = "";
$arraySelectoutPut3 = "";
$cliente = new Clientes();
$campos3 = $cliente->ObtenerFilasBySqlSelect("SELECT grupopos,TRIM(descripcion) as descripcion FROM $bdCentral.grupo2 order by descripcion");
foreach ($campos3 as $key => $item) {
    $arraySelectOption3[] = $item["grupopos"];
    $arraySelectOutPut3[] = $item["descripcion"];
}
$smarty->assign("option_values_categoria", $arraySelectOption3);
$smarty->assign("option_output_categoria", $arraySelectOutPut3);

//producto
$arraySelectOption4 = "";
$arraySelectoutPut4 = "";
$cliente = new Clientes();
$campos3 = $cliente->ObtenerFilasBySqlSelect("SELECT TRIM(descripcion1) as descripcion1,itempos  FROM $bdCentral.productos order by descripcion1");
foreach ($campos3 as $key => $item) {
    $arraySelectOption4[] = $item["itempos"];
    $arraySelectOutPut4[] = $item["descripcion1"];
}
$smarty->assign("option_values_productos", $arraySelectOption4);
$smarty->assign("option_output_productos", $arraySelectOutPut4);

$fecha = new DateTime();
$fecha->modify('first day of this month');
$smarty->assign("firstday", $fecha->format('Y-m-d'));
$fecha->modify('last day of this month');
$smarty->assign("lastday", $fecha->format('Y-m-d'));
#$smarty->assign("fecha_mes_anio", $fecha->format('F Y'));

if (isset($_POST['aceptar'])){

     $aceptar=$_POST['aceptar'];
     $fecha_apertura=$_POST['fecha_apertura'];
     $establecimiento=$_POST['establecimiento'];
     $almacen=$_POST['almacen'];
     $ubicacion=$_POST['ubicacion'];
     $smarty->assign("aceptar", $aceptar);
     $smarty->assign("establecimiento", $establecimiento);
     $smarty->assign("almacen", $almacen);
     $smarty->assign("ubicacion", $ubicacion);
     $smarty->assign("fecha_apertura", $fecha_apertura);

}

if (isset($_POST['guardar'])){
    $kk = 0;
     $aceptar=$_POST['aceptar'];
     $fecha_apertura=$_POST['fecha_apertura'];
     $almacen=$_POST['almacen'];
     $establecimiento=$_POST['establecimiento'];
     $ubicacion=$_POST['ubicacion'];

     for($i=0;$i<=20;$i++){

        $nombre = "nombres".$i;
        $cedula = "cedula".$i;
        $cargo = "cargo".$i;
        $procedencia = "procedencia".$i;
        $encargado = "encargado";
        if($_POST[$nombre]!='')
        {
            if($kk == 0)
                {
                $instruccion = "INSERT INTO `actas_inventario`(`fecha_acta`, `establecimiento`, `almacen`, `ubicacion`) VALUES ('".$fecha_apertura."',".$almacen.",'".$establecimiento."',".$ubicacion.")";
                $cliente->ExecuteTrans($instruccion);
                $kk = 1;
                $idCab = $cliente->getInsertID();
                }

            $instruccion = "INSERT INTO `actas_inventario_detalle`(`id_acta`, `nombre`, `cedula`, `cargo`, `procedencia`) VALUES (".$idCab.",'".$_POST[$nombre]."','".$_POST[$cedula]."','".$_POST[$cargo] ."',".$_POST[$procedencia].");";
            $cliente->ExecuteTrans($instruccion);
        }

    }
    if ($cliente->errorTransaccion == 1) {
        Msg::setMessage("<span style=\"color:#62875f;\">Acta Generada Exitosamente con en Nro. " . $idCab . "</span>");
    }
    if ($cliente->errorTransaccion == 0) {
        Msg::setMessage("<span style=\"color:red;\">Error al tratar de crear el Acta.</span>");
    }
    $cliente->CommitTrans($cliente->errorTransaccion);
}   


?>
