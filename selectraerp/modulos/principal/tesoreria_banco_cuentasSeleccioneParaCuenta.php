<?php

$comunes = new Comunes();

$tabla = "vw_tesor_bancodet";
$name_form = "tesor_bancodet";
$tipob = @$_GET['tipo'];
$des = @$_GET['des'];
$pagina = @$_GET['pagina'];
$busqueda = @$_GET['busqueda'];

if (isset($_POST['buscar']) || $tipob != NULL) {
    if (!$tipob) {
        $tipob = $_POST['palabra'];
        $des = $_POST['buscar'];
        $busqueda = $_POST['busqueda'];
    }

    switch ($tipob) {
        case "exacta":
            $instruccion = $comunes->buscar_exacta($tabla, $des, $busqueda);
            break;
        case "todas":
            $instruccion = $comunes->buscar_todas($tabla, $des, $busqueda);
            break;
        case "cualquiera":
            $instruccion = $comunes->buscar_cualquiera($tabla, $des, $busqueda);
            break;
    }
    $instruccion .= " AND NOT cod_tipo_cuenta_banco IN (4) AND cod_banco = " . $_GET["cod"];
} else {
    $instruccion = "SELECT * FROM  " . $tabla . " WHERE NOT cod_tipo_cuenta_banco IN (4) AND cod_banco = " . $_GET["cod"];
}

$num_paginas = $comunes->obtener_num_paginas($instruccion);
$pagina = $comunes->obtener_pagina_actual($pagina, $num_paginas);
$campos = $comunes->paginacion($pagina, $instruccion);

$smarty->assign("registros", $campos);
$smarty->assign("cabecera", array("C&oacute;digo", "Descripci&oacute;n", "Nro. Cuenta", "Tipo"));
$smarty->assign("limitePaginacion", $comunes->LimitePaginaciones);
$smarty->assign("num_paginas", $num_paginas);
$smarty->assign("pagina", $pagina);

$smarty->assign("busqueda", $busqueda);
$smarty->assign("des", $des);
$smarty->assign("tipo", $tipob);
$smarty->assign("cantidadFilas", $comunes->getFilas());

$campos = $menu->ObtenerFilasBySqlSelect("SELECT * FROM modulos WHERE cod_modulo = " . $_GET["opt_seccion"]);
$smarty->assign("campo_seccion", $campos);
//**************************************************************************
//Criterios de Busqueda ****************************************************
//**************************************************************************
$smarty->assign("option_values", array("cod_tesor_bandodet", "descripcion", "nro_cuenta", "tipo_cuenta"));
$smarty->assign("option_output", array("C&oacute;digo", "Descripci&oacute;n", "Nro. Cuenta", "Tipo"));
$smarty->assign("option_selected", $busqueda);
//**************************************************************************
//Nombre del Formulario****************************************************
//**************************************************************************
$smarty->assign("name_form", $name_form);
//**************************************************************************
//**************************************************************************
$smarty->assign("mensaje", $comunes->Notificacion());
?>
