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
                {include file = "snippets/regresar_buscar_botones.tpl"}
                {include file = "snippets/tb_head.tpl"}
                <br/>
                <table class="seleccionLista">
                    <tbody>
                        <tr class="tb-head">
                        {foreach from=$cabecera key=i item=campos}
                            <td><b>{$campos}</b></td>
                        {/foreach}
                            <td colspan="2" style="text-align:center;"><b>Opciones</b></td>
                        </tr>
                        {if $cantidadFilas == 0}
                        <tr><td colspan="4">{$mensaje}</td></tr>
                        {else}
                        {foreach from = $registros key=i item=campos}
                            {if $i%2==0}
                            {assign var=bgcolor value=""}
                            {else}
                            {assign var=bgcolor value="#cacacf"}
                            {/if}
                        <tr bgcolor="{$bgcolor}">
                            <td>{$campos.cod_item}</td>
                            <td>{$campos.descripcion1}</td>
                            <td style="cursor: pointer; width: 30px; text-align:center">
                                <img class="editar"
                                     onclick="javascript: window.location.href='?opt_menu={$smarty.get.opt_menu}&amp;opt_seccion={$smarty.get.opt_seccion}&amp;opt_subseccion=edit&amp;cod={$campos.id_item}'"
                                     title="Editar" src="../../../includes/imagenes/edit.gif"/></td>
                            <td style="cursor: pointer; width: 30px; text-align:center">
                                <img class="eliminar"
                                     onclick="javascript: window.location.href='?opt_menu={$smarty.get.opt_menu}&amp;opt_seccion={$smarty.get.opt_seccion}&amp;opt_subseccion=delete&amp;cod={$campos.id_item}'"
                                     title="Eliminar" src="../../../includes/imagenes/delete.gif"/></td>
                        </tr>
					{assign var=ultimo_cod_valor value=$campos.id_item} {/foreach}
					{/if}
                    </tbody>
                </table>
			{include file = "snippets/navegacion_paginas.tpl"}
            </div>
        </form>
    </body>
</html>
