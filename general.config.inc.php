<?php
error_reporting(-1);
if (!isset($_SESSION)) {
    session_start();
    ob_start();
}
define('PROJECT_URL', 'http://127.0.0.1:8082');
define('FOLDER_NAME', 'pyme');
define('DB_USUARIO','root', true);
define('DB_CLAVE', 'root', true);
define('DB_HOST', '172.18.0.4', true);
define('DB_SELECTRA_CONF', 'pyme_tienda_conf', true);#sisalud_selectraconf
define('DB_SELECTRA_CONT', 'pyme_contabilidad', true);
define('DB_SELECTRA_NOM', 'pyme_nomina', true);
define('DB_SELECTRA_FAC', 'pyme_pyme', true);
define('impresora_serial','Z1B8043126', true);
define('DB_SELECTRA_BIE', '', true);
define('DB_SELECTRA_DEFAULT', '', true);
define('SELECTRA_CONF_PYME', 'pyme_tienda_conf',true);
define('POS', 'pyme_pos',true);
define('RESTRICCIONES', 'SI',true);
define('SUGARCRM', 'sugarcrm',true);
/* * CONSTANTES UTILIZADAS POR LA INTERFAZ DE REGISTRO DE EVENTOS (LOG) */
define('REG_INFO',0, true);
define('REG_LOGIN_OK',1, true);
define('REG_LOGIN_FAIL',2, true);
define('REG_LOGOUT',3, true);
define('REG_SESSION_INVALIDATE',4, true);
define('REG_SESSION_READ_ERROR',5, true);
define('REG_SQL_OK',6, true);
define('REG_SQL_FAIL',7, true);
define('REG_ILLEGAL_ACCESS',8, true);
define('REG_ALL',9, true);

$_SESSION['ROOT_PROYECTO']= $_SERVER['DOCUMENT_ROOT']."/".FOLDER_NAME; // debe especificarse el nivel donde est� instalada la aplicacion con respecto al root del sitio
/** * $config es un "por ahora", mientras se define donde va a residir la configuracion general de selectra **/

$ConnSys = array('server' => DB_HOST, 'user' => DB_USUARIO, 'pass' => DB_CLAVE, 'db' => DB_SELECTRA_DEFAULT);
define('DB_USUARIOP','root', true);
define('DB_CLAVEP', 'admin.2040', true);
define('DB_HOSTP', '201.248.68.244', true);
define('DB_SELECTRA_PYMEP', 'selectrapyme_central_ccs', true);
define('DB_PYME', 'pyme_tienda_pyme', true );
/** * $config es un "por ahora", mientras se define donde va a residir la configuracion general de selectra **/
$config['bd']='mysql';
/** Archivo _temporal_ para ir colocando las funciones generales... :/ */
require_once('funciones.inc.php');
?>
