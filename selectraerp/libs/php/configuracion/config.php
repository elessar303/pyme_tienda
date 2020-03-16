<?php
/*
 * <DATOS DE CONEXION A BASE DE DATOS>
 */
require_once(__DIR__.'/../../../../general.config.inc.php');

define("USUARIO",DB_USUARIO);
define("CLAVE",DB_CLAVE);
define("BASEDEDATOS",$_SESSION['EmpresaFacturacion']);
define("SERVIDOR", DB_HOST);
define("GESTOR_DATABASE","mysqli"); //mysql, postgrest

define("codTipoPrecioLibre",1);
define("codTipoPrecio1",2);
define("codTipoPrecio2",3);
define("codTipoPrecio3",4);
?>