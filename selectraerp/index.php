<?php
# Este condicional y la inclusion antes de los comentarios estaban al inicio del archivo
ob_start();
if (session_status() !== PHP_SESSION_ACTIVE || session_id() === ""){
    session_start(); 
}
ob_clean();

include(__DIR__."/../general.config.inc.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>.: SISCOL :.</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link type="text/css" rel="stylesheet" href="../includes/css/estilos.css" />
        <link type="text/css" rel="stylesheet" href="../includes/css/index.css" />
        <link type="text/css" rel="stylesheet" href="../includes/css/estilos_basicos.css" />
        <link rel="shortcut icon" href="../includes/imagenes/logo.ico" />
        <script type="text/javascript" src="../includes/js/index.js"></script>
        <script type="text/javascript" src="libs/js/ajax.js"></script>
    </head>
    <body>
        <?php
        #session_start();
        #ob_start();
        include(__DIR__."/../menu_sistemas/lib/common.php");

        $conexion = new bd(SELECTRA_CONF_PYME);
        $empresas = new bd(SELECTRA_CONF_PYME);
        $query = "SELECT * FROM nomempresa WHERE bd <> ''";
        $resultado = $empresas->query($query);
        $ejecutar = (isset($_GET['ejecutar'])) ? $_GET['ejecutar'] : '';
        $baseDatos = (isset($_GET['baseDatos'])) ? $_GET['baseDatos'] : '';
        ?>
        <?php if (isset($_GET['empresaSeleccionada'])): ?>
            <?php $_SESSION['EmpresaFacturacion'] = $_GET['empresaSeleccionada']; #Base de datos?>
        <?php endif; ?>
        <?php if (isset($_SESSION['EmpresaFacturacion'])): ?>
            <?php #echo "<script> location = 'modulos/sesion/'; </script>";?>
            <?php header("Location: modulos/sesion/"); ?>
        <?php else: ?>
            <div class="contenedor">
                <div class="procesando" id="procesando" style="visibility:hidden; text-align: center"><br/>
                    <h1 style="color: #007ED1; font-family:arial; "><br/> Se Est&aacute; Creando  <br/> La Empresa <?php echo (isset($_POST["nombre"])) ? $_POST["nombre"]:'' ?></h1>
                    <img src="../includes/imagenes/Procesando.gif"/>
                    <br/><br/><br/>Esta Operaci&oacute;n <br/> Puede Durar Algunos Minutos<br/><br/>
                    <img src="../includes/imagenes/logo.png" />
                </div>
              <img src="../includes/imagenes/siscolp.png" width="401" height="90"/>
                <hr/>
                <div class="titulo1">SELECCIONE UNA EMPRESA PARA CONTINUAR </div>
                <hr/>
                <div id="listado">
                    <form id="seleccionar_empresa" name="seleccionar_empresa" method="get">
                        <select class="seleccionEmpresa" multiple="multiple" name="empresaSeleccionada">
                            <?php $i = 0 ?>
                            <?php while ($fila = $resultado->fetch_assoc()): ?>
                                <option value="<?php echo $fila['bd'] ?>" <?php if ($i == 0): ?> selected <?php endif; ?>>
                                    <?php echo $fila['nombre'] ?>
                                </option>
                                <?php $i++ ?>
                            <?php endwhile; ?>
                        </select>
                    </form>
                </div>
                <hr/>
                <!--table>
                    <tbody>
                        <tr>
                            <td style="float:left; background:none; width:48%;"><img src="../includes/imagenes/asys.png" style="width:60%"/></td>
                            <td style='padding-right: 10px; float:left; white-space: nowrap;'><?php btn2(" Seleccionar ", 'document.seleccionar_empresa.submit()', 'ok.gif') ?></td>
                            <td style='padding-right: 10px; float:left; white-space: nowrap;'><?php btn2('Nueva', 'mostrarAgregarEmpresa();', 'add.gif') ?></td>
                        </tr>
                    </tbody>
                </table-->
                <div style='padding-right: 10px; float:right; white-space: nowrap;'>
                    <input type="submit" value="Continuar" name="seleccionar" onclick="javascript:document.seleccionar_empresa.submit();"/>
                </div>
                <div style='padding-right: 10px; float:right; white-space: nowrap;'>
                    <input type="button" value="Nueva Empresa" name="nueva" onclick="javascript:mostrarAgregarEmpresa();"/>
                </div>
                <!--br/-->
                <div style="text-align: center; padding-top: 50px;">
                    
                    <a style="color: blue" href="../entrada/index.php"><img src="../includes/imagenes/back.gif"/>&nbsp;Ir al Men&uacute; de Sistemas</a>
                </div>
            </div><!-- contenedor-->
        <?php endif; ?>
        <div id='nuevaEmpresa' class='nuevaEmpresa' style='visibility:hidden'>
            <div onclick='ocultarAgregarEmpresa()' style='position:absolute; cursor:pointer; top:0px; right:0px; width:240px'>
                <img src='imagenes/cerrar.png'/>
            </div>
            <hr/>
            <div class="titulo1" style='background:none;' >AGREGAR EMPRESA </div>
            <hr/>
            <form id='formularioNuevaEmpresa' method="post">
                <table>
                    <tr>
                        <td width='100px' class='columna1' >Nombre de la Empresa</td>
                        <td>
                            <input type="text" id='nombre' name='nombre' onchange="chk_NombreEmpresa(this);" >
                            <div id='resultado1' style='position:absolute' ></div>
                            <span id='nombre_error' class='error'></span><!--  name='nombre_error' -->
                        </td>
                    </tr>
                    <tr>
                        <td class='columna1'>Nombre de Base de Datos Administrativo: </td>
                        <td>
                            <input type="text" id='base_adm' name='base_adm' onchange="chk_BaseDatos(this);">
                            <div id='resultado2' style='position:absolute' ></div>
                            <span id='base_error' class='error'></span><!--  name='base_error' -->
                        </td>
                    </tr>
                    <?php if (file_exists($_SESSION['ROOT_PROYECTO'] . "/contabilidad")): ?>
                        <tr>
                            <td class='columna1'>Nombre de Base de Datos Contabilidad: </td>
                            <td>
                                <input type="text" id='base_con' name='base_con' onchange="chk_BaseDatos(this);">
                                <div id='resultado3' style='position:absolute' ></div>
                                <span id='base_error' class='error'></span><!--  name='base_error' -->
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (file_exists($_SESSION['ROOT_PROYECTO'] . "/nomina")): ?>
                        <tr>
                            <td class='columna1'>Nombre de Base de Datos Nomina: </td>
                            <td>
                                <input type="text" id='base_nom' name='base_nom' onchange="chk_BaseDatos(this);">
                                <div id='resultado4' style='position:absolute' ></div>
                                <span id='base_error' class='error3'></span><!--  name='base_error' -->
                            </td>
                        </tr>
                    <?php endif; ?>
                </table>
                <br/>
                <div id='boton1' style='visibility:hidden;'>
                    <?php btn2('Agregar', 'agregarEmpresa();', 'add.gif') ?>
                </div>
                <br/><br/>
            </form>
        </div>
        <iframe id='iframe_procesamiento' style='visibility:hidden;' ></iframe>
    </body>
</html>
