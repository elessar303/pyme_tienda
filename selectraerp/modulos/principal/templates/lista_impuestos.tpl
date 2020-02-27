<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        {include file="snippets/header_form.tpl"}
    </head>
    <body>
        <form id="form-{$name_form}" name="form-{$name_form}" action="?opt_menu={$smarty.get.opt_menu}&amp;opt_seccion={$smarty.get.opt_seccion}" method="POST">
            <div id="datosGral" class="x-hide-display">
                {include file = "snippets/regresar_buscar_botones.tpl"}
                {include file = "snippets/tb_head.tpl"}
                <br/>
                <table class="seleccionLista">
                    <tbody>
                        <tr class="tb-head" >
                {foreach from=$cabecera key=i item=campos}
                            <td><b>{$campos}</b></td>
                {/foreach}
                            <td colspan="2" style="text-align:center;"><b>Opciones</b></td>
                        </tr>
            {if $cantidadFilas == 0}
                        <tr><td colspan="7">{$mensaje}</td></tr>
{else}
    {foreach from=$registros key=i item=campos}
                {if $i%2==0}
                    {assign var=color value=""}
                {else}
                    {assign var=color value="#cacacf"}
                {/if}
                        <tr bgcolor="{$color}">
                            <td>{$campos.cod_impuesto}</td>
                            <td>{$campos.descripcion}</td>
                            <td>{$campos.entidad}</td>
                            <td>{$campos.descripcion_formula}</td>
                            <td>{$campos.impuesto}</td>
                            <td style="cursor:pointer; width:30px; text-align:center;">
                                <img style="cursor: pointer;" class="editar" onclick="javascript: window.location.href='?opt_menu={$smarty.get.opt_menu}&amp;opt_seccion={$smarty.get.opt_seccion}&amp;opt_subseccion=edit&amp;cod={$campos.cod_impuesto}&amp;pagina={$pagina}'" title="Editar" src="../../../includes/imagenes/edit.gif"/>
                            </td>
                            <td style="cursor:pointer; width:30px; text-align:center;">
                                <img style="cursor: pointer;" class="eliminar" onclick="javascript: window.location.href='?opt_menu={$smarty.get.opt_menu}&amp;opt_seccion={$smarty.get.opt_seccion}&amp;opt_subseccion=delete&amp;cod={$campos.cod_impuesto}&amp;pagina={$pagina}'" title="Eliminar" src="../../../includes/imagenes/delete.gif"/>
                            </td>
                        </tr>
    {assign var = ultimo_cod_valor value=$campos.cod_impuesto}
    {/foreach}
{/if}
                    </tbody>
                </table>
    {include file = "snippets/navegacion_paginas.tpl"}
            </div>
        </form>
    </body>
</html>