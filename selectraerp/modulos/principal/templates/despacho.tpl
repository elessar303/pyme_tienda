<!DOCTYPE html>
<!--
Modificado por: Charli Vivenes
Acción:
1._ Trasladar el código JS a un nuevo archivo (header_form.tpl) que funje como 
    nueva plantilla que contiene el código común a todos los formularios.
Objetivos:
1._ Hacer que la cofiguración del formulario sea dinámica. Esto apunta también a
    factorizar dicho snippet de código para obtener las bondades de la reutilización.
-->
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    {include file="snippets/header_form.tpl"}
    </head>
    <body>
        <form id="form-{$name_form}" name="form-{$name_form}" action="?opt_menu={$smarty.get.opt_menu}&amp;opt_seccion={$smarty.get.opt_seccion}" method="post">
            <div id="datosGral" class="x-hide-display">
            {include file = "snippets/regresar_boton.tpl"}
            {include file = "snippets/tb_head.tpl"}
                <br/>
                <table class="seleccionLista">
                    <tbody>
                        <tr class="tb-head">
                        {foreach from=$cabecera key=i item=campos}
                            <td><b>{$campos}</b></td>
                        {/foreach}
                            <td colspan="1" style="text-align:center;"><b>Opciones</b></td>
                        </tr>
                    {if $cantidadFilas == 0}
                        <tr><td colspan="3">{$mensaje}</td></tr>
                    {else}
                        {foreach from = $registros key=i item=campos}
                            <!--{if $i%2==0}<tr bgcolor="">{else}<tr bgcolor="#e1e1e1">{/if}-->
                            {if $i%2==0}
                                {assign var=bgcolor value=""}
                            {else}
                                {assign var=bgcolor value="#cacacf"}
                            {/if}
                        <tr bgcolor="{$bgcolor}">
                            <td>{$campos.cod_despacho}</td>
                            <td>{$campos.cod_factura}</td>
                            <td>{$campos.rif_cliente}</td>
                            <td>{$campos.nombre}</td>
                            <td>{$campos.fecha_creacion}</td>
                            {if $campos.estatus eq 1}
                                <td>Despachado</td>
                            {else}
                                <td>Pendiente</td>
                            {/if}
                           <!--  <td>{$campos.estatus}</td> -->
                            <td style="cursor: pointer; width: 30px; text-align:center">
                                <img class="editar" onclick="javascript: window.location.href='?opt_menu={$smarty.get.opt_menu}&amp;opt_seccion={$smarty.get.opt_seccion}&amp;opt_subseccion=addDesp&amp;cod={$campos.id}'" title="detalle despacho" src="../../../includes/imagenes/add.gif"/>
                            </td>

                        </tr>
                        {assign var=ultimo_cod_valor value=$campos.cod_almacen}
                        {/foreach}
                    {/if}
                    </tbody>
                </table>
                {include file = "snippets/navegacion_paginas.tpl"}
            </div>
        </form>
    </body>
</html>