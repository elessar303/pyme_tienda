<?php
include("../../libs/php/clases/departamento.php");
$departamento = new Departamento();
if(isset($_POST["aceptar"])){
$instruccion = "
update marca set marca = '".$_POST["descripcion_linea"]."'
 where id = ".$_POST["cod_linea"];
$departamento->Execute2($instruccion);
header("Location: ?opt_menu=".$_POST["opt_menu"]."&opt_seccion=".$_POST["opt_seccion"]);
}


if(isset($_GET["cod"])){
$campos = $departamento->ObtenerFilasBySqlSelect("select * from marca where id = ".$_GET["cod"]);
$smarty->assign("campo_linea",$campos);
}


?>