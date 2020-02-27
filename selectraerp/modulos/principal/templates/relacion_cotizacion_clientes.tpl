<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="autor" content="Charli Vivenes" />
        {include file="snippets/header_form.tpl"}
    </head>
    <body>
        <form id="form-{$name_form}" name="formulario" action="?opt_menu={$smarty.get.opt_menu}&opt_seccion={$smarty.get.opt_seccion}" method="post">
            <div id="datosGral" class="x-hide-display">
                {include file = "snippets/regresar_boton.tpl"}
                {include file = "snippets/tb_head.tpl"}
                <br/>
                <table class="seleccionLista">
                    <thead>
                        <tr class="tb-head" >
                            {foreach from=$cabecera key=i item=campo}
                                <th>{$campo}</th>
                            {/foreach}
                            <th colspan="2" style="text-align:center;">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {if $cantidadFilas eq 0}
                            <tr><td colspan="9" style="text-align:center; background-color:#f99696;">{$mensaje}</td></tr>
                        {else}
                            {foreach from=$registros key=i item=campo}
                                {if $campo.cod_estatus eq 1}
                                    {assign var=status value="Pendiente"}
                                    {assign var=color value="#f3ed8b"}<!--amarillo-->
                                {elseif $campo.cod_estatus eq 2}
                                    {assign var=status value="Facturado"}
                                    {assign var=color value="#a3fba3"}<!--verde-->
                                {else}
                                    {assign var=status value="Anulado"}
                                    {assign var=color value="#f99696"}<!--rojo-->
                                {/if}
                                <tr bgcolor="{$color}">
                                    <td style="text-align: right">{$campo.id_cotizacion}</td>
                                    <td style="text-align: center">{$campo.cod_cotizacion}</td>
                                    <td style="padding-left: 10px;">{$campo.nombre}</td>
                                    <td style="text-align: center">{$campo.rif}</td>
                                    <td style="text-align: center">{$campo.fecha_cotizacion}</td>
                                    <td style="text-align: right; padding-right: 10px;">{$campo.totalizar_total_general}</td>
                                    <td style="text-align: center; width: 30px;">
                                        <img class="impresion" title="{$status}" src="../../../includes/imagenes/ico_note.gif"/>
                                    </td>
                                    <td style="text-align: center; cursor: pointer; width: 30px;">
                                        <img class="impresion" onclick="javascript: window.open('../../reportes/rpt_presupuesto_cotizacion.php?codigo={$campo.cod_cotizacion}', '');" title="Imprimir Presupuesto" src="../../../includes/imagenes/ico_print.gif"/>
                                    </td>
                                </tr>
                                {assign var=ultimo_cod_valor value=$campo.id_cotizacion}
                            {/foreach}
                        {/if}
                    </tbody>
                </table>
                {include file = "snippets/navegacion_paginas.tpl"}
            </div>
        </form>
    </body>
</html>