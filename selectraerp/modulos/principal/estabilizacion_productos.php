<?php
$comunes = new Comunes();

$tabla = "item a";
$tipob = @$_GET['tipo'];
$des = @$_GET['des'];
$pagina = @$_GET['pagina'];
$busqueda = @$_GET['busqueda'];

if (isset($_POST['buscar']) || $tipob != NULL) {
    if (!$tipob) {
        $tipob = $_POST['palabra'];
        $des = $_POST['buscar'];
        $busqueda = " a.codigo_barras not in (SELECT codigo_barras from productos_centrales) and a.".$_POST['busqueda'];
    }
    switch ($tipob) {
        case "exacta":
            $instruccion = $comunes->buscar_exacta($tabla, $des, $busqueda, "","*" );
            break;
        case "todas":
            $instruccion = $comunes->buscar_todas($tabla, $des, $busqueda, "","*" );
            break;
        case "cualquiera":
            $instruccion = $comunes->buscar_cualquiera($tabla, $des, $busqueda, "","*");
            break;
    }
} else {
    $instruccion = "SELECT * FROM " . $tabla." where a.codigo_barras not in (SELECT codigo_barras from productos_centrales) and a.estatus='A'";
}

$num_paginas = $comunes->obtener_num_paginas($instruccion);
$pagina = $comunes->obtener_pagina_actual($pagina, $num_paginas);
$campos = $comunes->paginacion($pagina, $instruccion);

$data_parametros = $comunes->ObtenerFilasBySqlSelect("select * from parametros_generales");
//$smarty->assign("idfiscal",$data_parametros);
$valueSELECT = $outputidfiscalSELECT = array();
foreach ($data_parametros as $key => $item) {
    $valueSELECT[] = $item["cod_empresa"];
    $outputidfiscalSELECT[] = $item["id_fiscal"];
}

$smarty->assign("registros", $campos);
$smarty->assign("cabecera", array("C&oacute;digo de Barras en el Punto de Venta", "Nombre en el Punto de Venta"));
$smarty->assign("limitePaginacion", $comunes->LimitePaginaciones);
$smarty->assign("num_paginas", $num_paginas);
$smarty->assign("pagina", $pagina);

$smarty->assign("busqueda", $busqueda);
$smarty->assign("des", $des);
$smarty->assign("tipo", $tipob);
$smarty->assign("cantidadFilas", $comunes->getFilas());

$campos = $menu->ObtenerFilasBySqlSelect("select * from modulos where cod_modulo = " . $_GET["opt_seccion"]);
$smarty->assign("campo_seccion", $campos);

//**************************************************************************
//Criterios de Busqueda ****************************************************
//**************************************************************************
$smarty->assign("option_values", array("codigo_barras"));
$smarty->assign("option_output", array("C&oacute;digo de Barras"));
$smarty->assign("option_selected", $busqueda);
//**************************************************************************
//**************************************************************************
//**************************************************************************
//**************************************************************************
//Nombre del Formulario****************************************************
//**************************************************************************
$smarty->assign("name_form", 'estabilizacion_productos');
//**************************************************************************
//**************************************************************************
$smarty->assign("mensaje", $comunes->Notificacion());
?>