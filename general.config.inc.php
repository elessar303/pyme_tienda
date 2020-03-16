<?php

ob_start();
if (session_status() !== PHP_SESSION_ACTIVE || session_id() === ""){
    session_start(); 
}
ob_clean();
/*-----------------------------------------------------------
Mostar Errores de ejecucion de PHP, (0)->Ninguno, (-1)->Todos
-----------------------------------------------------------*/
error_reporting(-1);

/************************
Configuraciones Generales
************************/
/*------------------
1. Nombre de Carpeta
------------------*/
define('FOLDER_NAME', 'pyme');
/*---------------
2. URL del Server
---------------*/
define('PROJECT_URL', 'http://127.0.0.1:8082');
/*---------------
3. Bases de Datos
---------------*/
define('SELECTRA_CONF_PYME', 'pyme_tienda_conf',true);//BD CONF
define('DB_SELECTRA_CONF', 'pyme_tienda_conf', true);//BD CONF
define('DB_SELECTRA_FAC', 'pyme_pyme', true);//BD PYME
define('DB_SELECTRA_DEFAULT', 'pyme_pyme', true);//BD PYME
define('POS', 'pyme_pos',true);//BD POS
/*------------------------
4. Acceso a Bases de Datos
------------------------*/
define('DB_USUARIO','root', true);//Usuario MySql
define('DB_CLAVE', 'root', true);//Password MySql
define('DB_HOST', '172.18.0.4', true);//IP BD My Sql
/*-----------------
5. Serial Impresora
-----------------*/
define('impresora_serial','Z1B8043126', true);
/*----------------
6. Conexion Remota
----------------*/
define('DB_USUARIOP','root', true);
define('DB_CLAVEP', 'admin.2040', true);
define('DB_HOSTP', '201.248.68.244', true);
define('DB_SELECTRA_PYMEP', 'selectrapyme_central_ccs', true);
/*---------------------------------
OJO No modificar de aqui para abajo
---------------------------------*/
define('DB_PYME', 'mysql', true );
define('DB_SELECTRA_CONT', 'pyme_contabilidad', true);
define('DB_SELECTRA_NOM', 'pyme_nomina', true);
define('DB_SELECTRA_BIE', '', true);
define('RESTRICCIONES', 'SI',true);
define('SUGARCRM', 'sugarcrm',true);
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
$_SESSION['ROOT_PROYECTO']= $_SERVER['DOCUMENT_ROOT'];//Ruta del proyecto
$ConnSys = array('server' => DB_HOST, 'user' => DB_USUARIO, 'pass' => DB_CLAVE, 'db' => DB_SELECTRA_DEFAULT);
$config['bd']='mysql';
require_once('funciones.inc.php');
?>
