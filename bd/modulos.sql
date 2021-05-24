-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql
-- Tiempo de generación: 24-05-2021 a las 17:48:40
-- Versión del servidor: 5.7.34-log
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pyme_pyme`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `cod_modulo` int(32) UNSIGNED NOT NULL,
  `cod_modulo_padre` int(11) DEFAULT NULL,
  `nom_menu` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `archivo_php` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `archivo_tpl` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `img_ruta` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`cod_modulo`, `cod_modulo_padre`, `nom_menu`, `archivo_php`, `archivo_tpl`, `orden`, `img_ruta`, `visible`) VALUES
(0, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(1, NULL, 'Configuraci&oacute;n', NULL, NULL, 0, '../../libs/imagenes/system.png', 1),
(2, NULL, 'Clientes', NULL, NULL, 3, '../../libs/imagenes/icons/2.png', 1),
(3, NULL, 'Stock', NULL, NULL, 1, '../../libs/imagenes/icons/13.png', 1),
(5, NULL, 'Ventas', NULL, NULL, 5, '../../libs/imagenes/icons/8.png', 1),
(6, NULL, 'Ctas. por Cobrar', NULL, NULL, 6, '../../libs/imagenes/icons/4.png', 1),
(7, NULL, 'Reportes', NULL, NULL, 7, '../../libs/imagenes/68.png', 1),
(8, 5, 'Clientes', 'cliente.php', 'cliente.tpl', 1, '../../libs/imagenes/icons/28.png', 1),
(13, 7, 'Reporte Historico de Precios', 'seleccionarFecha14.php', 'rpt_venta_productos14.tpl', NULL, '../../libs/imagenes/68.png', 1),
(31, 1, 'Par&aacute;metros Generales', 'parametros_generales.php', 'parametros_generales.tpl', 1, '../../libs/imagenes/11.png', 1),
(54, NULL, 'P&aacute;gina de Inicio', 'pagina_inicio.php', 'pagina_inicio.tpl', NULL, '../../libs/imagenes/icons/12.png', 1),
(55, 3, 'Almac&eacute;n', 'almacen.php', 'almacen.tpl', 4, '../../libs/imagenes/11.png', 0),
(56, 5, 'Zonas', 'zona.php', 'zona.tpl', 3, '../../libs/imagenes/11.png', 0),
(57, 5, 'Vendedor', 'vendedor.php', 'vendedor.tpl', 4, '../../libs/imagenes/21.png', 0),
(58, 5, 'Gestionar Facturas (Productos y/o Servicios)', 'factura_lista_clientes.php', 'factura_lista_clientes.tpl', 5, '../../libs/imagenes/65.png', 1),
(59, 5, 'Estado de Cuentas de Clientes', 'cxc_lista_clientes.php', 'cxc_lista_clientes.tpl', 1, '../../libs/imagenes/55.png', 0),
(60, 7, 'Relaci&oacute;n de Compra por Proveedor', 'relacion_compra_proveedores.php', 'relacion_compra_proveedores.tpl', 6, '../../libs/imagenes/4.png', 0),
(61, 3, 'Productos', 'producto.php', 'producto.tpl', 8, '../../libs/imagenes/13.png', 1),
(64, 3, 'Rubro', 'departamento.php', 'departamento.tpl', 6, '../../libs/imagenes/11.png', 1),
(65, 3, 'Subrubro', 'grupo.php', 'grupo.tpl', 7, '../../libs/imagenes/55.png', 1),
(66, 3, 'Marca', 'linea.php', 'linea.tpl', 24, '../../libs/imagenes/37.png', 0),
(67, 3, 'Servicios', 'servicio.php', 'servicio.tpl', 9, '../../libs/imagenes/13.png', 0),
(68, 1, 'Usuarios', 'usuarios.php', 'usuarios.tpl', 5, '../../libs/imagenes/21.png', 1),
(69, 3, 'Existencia de Producto por Almac&eacute;n', 'producto_existencia_almacen.php', 'producto_existencia_almacen.tpl', 5, '../../libs/imagenes/13.png', 0),
(70, 1, 'Retenci&oacute;n I.S.L.R', 'islr.php', 'islr.tpl', 9, '../../libs/imagenes/18.png', 0),
(71, 7, 'Relación de Facturas por Clientes (Productos y/o Servicios)', 'relacion_factura_clientes.php', 'relacion_factura_clientes.tpl', 4, '../../libs/imagenes/4.png', 0),
(72, 3, 'Boletos', 'boletos.php', 'boletos.tpl', 3, '../../libs/imagenes/13.png', 0),
(73, 5, 'Gestionar Facturas (Boletos)', 'factura_lista_clientes_boletos.php', 'factura_lista_clientes_boletos.tpl', 4, '../../libs/imagenes/11.png', 0),
(74, 7, 'Relaci&oacute;n de Facturas por Clientes (Boletos)', 'relacion_factura_clientes_boletos.php', 'relacion_factura_clientes_boletos.tpl', 5, '../../libs/imagenes/4.png', 0),
(75, NULL, 'Consulta', NULL, NULL, 6, '../../libs/imagenes/59.png', 0),
(76, 1, 'Responsable', 'responsable.php', 'responsable.tpl', 7, '../../libs/imagenes/28.png', 0),
(77, 1, 'Banco', 'banco.php', 'banco.tpl', 8, '../../libs/imagenes/55.png', 0),
(78, 1, 'Instrumento de Forma Pago', 'instrumentoformapago.php', 'instrumentoformapago.tpl', 10, '../../libs/imagenes/023.png', 0),
(79, 5, 'Devoluci&oacute;n Facturas (Productos y/o Servicios)', 'devolucion_venta_lista.php', 'devolucion_venta_lista.tpl', 6, '../../libs/imagenes/tipo.png', 1),
(80, 1, 'Retenci&oacute;n I.V.A', 'retencioniva.php', 'retencioniva.tpl', 8, '../../libs/imagenes/19.png', 0),
(81, 1, 'Correlativos', 'correlativos.php', 'correlativos.tpl', 20, '../../libs/imagenes/023.png', 0),
(83, NULL, 'Proveedores', 'proveedores.php', 'proveedores.tpl', 3, '../../libs/imagenes/28.png', 0),
(84, NULL, 'Compras', NULL, NULL, 2, '../../libs/imagenes/29.png', 0),
(85, NULL, 'Ctas. por Pagar', NULL, NULL, 6, '../../libs/imagenes/41.png', 0),
(86, 3, 'Proveedores', 'proveedores.php', 'proveedores.tpl', 1, '../../libs/imagenes/proveedor.png', 1),
(87, 84, 'Gestionar Compra', 'proveedores_compra_lista.php', 'proveedores_compra_lista.tpl', 5, '../../libs/imagenes/4.png', 1),
(88, 89, 'Estado de Cuentas de Proveedores', 'cxp_lista_proveedores.php', 'cxp_lista_proveedores.tpl', 1, '../../libs/imagenes/55.png', 0),
(89, NULL, 'Caja y Bancos', NULL, NULL, 6, '../../libs/imagenes/05.png', 1),
(90, 1, 'Bancos', 'tesoreria_banco.php', 'tesoreria_banco.tpl', 1, '../../libs/imagenes/55.png', 1),
(91, 89, 'Cheques', 'tesoreria_bancoSeleccion.php', 'tesoreria_bancoSeleccion.tpl', 2, '../../libs/imagenes/49.png', 0),
(92, 89, 'Consulta / Impresi&oacute;n de Cheques', 'tesoreria_impresioncheque.php', 'tesoreria_impresioncheque.tpl', 3, '../../libs/imagenes/03.png', 0),
(93, 89, 'Movimientos Bancarios', 'tesoreria_movimientos_bancarios.php', 'tesoreria_movimientos_bancarios.tpl', 4, '../../libs/imagenes/01.png', 0),
(94, 89, 'Conciliaci&oacute;n Bancaria', 'tesoreria_conciliacion_seleccion_cuenta.php', 'tesoreria_conciliacion_seleccion_cuenta.tpl', 5, '../../libs/imagenes/41.png', 0),
(95, 89, 'Reportes', NULL, NULL, 6, '../../libs/imagenes/66.png', 0),
(96, 89, 'Tipos de Movimientos Bancarios', 'tipos_movimientos_bancarios.php', 'tipos_movimientos_bancarios.tpl', 11, '../../libs/imagenes/55.png', 0),
(97, 1, 'Impuesto Municipal ICA', 'impuesto_municipal_ica.php', 'impuesto_municipal_ica.tpl', 9, '../../libs/imagenes/20.png', 0),
(98, 1, 'Tipos de Impuestos', 'tipo_impuesto.php', 'tipo_impuesto.tpl', 12, '../../libs/imagenes/20.png', 0),
(99, 1, 'Entidades', 'entidad.php', 'entidad.tpl', 13, '../../libs/imagenes/20.png', 0),
(100, 1, 'Formulaci&oacute;n de Impuestos', 'formulacion_impuestos.php', 'formulacion_impuestos.tpl', 14, '../../libs/imagenes/20.png', 0),
(101, 1, 'Lista de Impuestos', 'lista_impuestos.php', 'lista_impuestos.tpl', 15, '../../libs/imagenes/11.png', 0),
(102, 5, 'Tipo de Clientes', 'tipo_cliente.php', 'tipo_cliente.tpl', 1, '../../libs/imagenes/icons/28.png', 0),
(103, 1, 'Moneda', 'multi_moneda.php', 'multi_moneda.tpl', 20, '../../libs/imagenes/moneda.png', 0),
(104, 1, 'Divisas', 'divisas.php', 'divisas.tpl', NULL, '../../libs/imagenes/moneda.png', 0),
(105, 1, 'Tasas de Cambio', 'tasas_de_cambio.php', 'tasas_de_cambio.tpl', 0, '../../libs/imagenes/moneda.png', 0),
(106, NULL, 'Operaciones', NULL, NULL, 10, '../../libs/imagenes/icons/10.png', 1),
(107, 106, 'Cargar Archivo POS', 'cargar_post.php', 'cargar_post.tpl', 1, '../../libs/imagenes/icons/10.png', 0),
(108, 3, 'Kardex Almac&eacute;n', 'kardex_almacen.php', 'kardex_almacen.tpl', 13, '../../libs/imagenes/icons/10.png', 0),
(109, 3, 'Entradas Almac&eacute;n', 'entrada_almacen.php', 'entrada_almacen.tpl', 10, '../../libs/imagenes/traslados.png', 1),
(110, 3, 'Salidas Almac&eacute;n', 'salida_almacen.php', 'salida_almacen.tpl', 12, '../../libs/imagenes/traslados.png', 1),
(111, 3, 'Traslados entre Almacenes', 'traslados_almacen.php', 'traslados_almacen.tpl', 11, '../../libs/imagenes/traslados.png', 1),
(112, 3, 'Tipos de Movimientos de Inventario', 'tipo_movimientos_almacen.php', 'tipo_movimientos_almacen.tpl', 14, '../../libs/imagenes/icons/10.png', 0),
(113, 106, 'Contabilizar cheques', 'contabilizar_cheque.php', 'contabilizar_cheque.tpl', 2, '../../libs/imagenes/icons/10.png', 0),
(114, 106, 'Contabilizar Facturas', 'contabilizar_facturacion.php', 'contabilizar_facturacion.tpl', 3, '../../libs/imagenes/icons/10.png', 0),
(115, 106, 'Contabilizar ND', 'contabilizar_nota_debito.php', 'contabilizar_nota_debito.tpl', 5, '../../libs/imagenes/icons/10.png', 0),
(116, 106, 'Contabilizar NC', 'contabilizar_nota_credito.php', 'contabilizar_nota_credito.tpl', 4, '../../libs/imagenes/icons/10.png', 0),
(117, 89, 'Imprimir de Conciliaci&oacute;n Bancaria', 'tesoreria_vista_conciliaciones.php', 'tesoreria_vista_conciliaciones.tpl', 5, '../../libs/imagenes/03.png', 0),
(118, NULL, 'Requisiciones', NULL, NULL, 2, '../../libs/imagenes/41.png', 0),
(119, 118, 'Requisiciones compras/materiales 	', 'requisiciones.php', 'requisiciones.tpl', 1, '../../libs/imagenes/41.png', 1),
(120, 1, 'Unidades Administrativas / Departamentos', 'unidades_list.php', 'unidades_list.tpl', 22, '../../libs/imagenes/12.png', 0),
(121, 118, 'Requisiciones Servicios', 'unidades_list3.php', 'unidades_list3.tpl', 2, '../../libs/imagenes/41.png', 1),
(122, 84, 'Requisiciones Administraci&oacute;n', 'requisiciones_administracion_list.php', 'requisiciones_administracion_list.tpl', 3, '../../libs/imagenes/41.png', 0),
(123, 118, 'An&aacute;lisis de Cotizaciones', 'analisiscotizaciones.php', 'analisiscotizaciones.tpl', 4, '../../libs/imagenes/67.png', 1),
(124, 84, 'Reporte de Listado de Proveedores', 'listadoproveedores.php', 'listadoproveedores.tpl', 2, '../../libs/imagenes/66.png', 1),
(125, 3, 'Reporte de Listado de Materiales', 'listadomateriales.php', 'listadomateriales.tpl', 20, '../../libs/imagenes/68.png', 1),
(126, 3, 'Reporte de Productos en Existencia', 'productosexistencia.php', 'productosexistencia.tpl', 17, '../../libs/imagenes/68.png', 1),
(127, 84, 'Analisis de Cotizaciones', 'analisiscotizaciones.php', 'analisiscotizaciones.tpl', 2, '../../libs/imagenes/67.png', 0),
(128, 84, 'Requisiciones Compras', 'requisicionescompras.php', 'requisicionescompras.tpl', 1, '../../libs/imagenes/61.png', 0),
(129, 84, 'Emisi&oacute;n de Ordenes de Compra ', 'ordendecompra.php', 'ordendecompra.tpl', 3, '../../libs/imagenes/4.png', 0),
(130, 7, 'Libro de Compras', 'seleccionarFecha1.php', 'seleccionarFecha7.tpl', 7, '../../libs/imagenes/56.png', 0),
(131, 7, 'Libro de Ventas', 'seleccionarFecha1.php', 'seleccionarFecha6.tpl', 8, '../../libs/imagenes/56.png', 0),
(132, 1, 'Especialidades de Proveedores', 'proveedores_especialidad.php', 'proveedores_especialidad.tpl', 21, '../../libs/imagenes/28.png', 0),
(133, 5, 'Cuentas x Cobrar Pendiente por Presentar', 'cxc_lista_clientes_pendiente.php', 'cxc_lista_clientes_pendiente.tpl', 2, '../../libs/imagenes/25.png', 0),
(134, 5, 'Cuentas x Cobrar Pendiente por Autorizar', 'cxc_lista_clientes_autorizar.php', 'cxc_lista_clientes_autorizar.tpl', 3, '../../libs/imagenes/26.png', 0),
(135, 5, 'Cuentas x Cobrar Pendiente Pago', 'cxc_lista_clientes_pago.php', 'cxc_lista_clientes_pago.tpl', 4, '../../libs/imagenes/23.png', 0),
(136, 5, 'Reporte de Cobranzas Realizadas', 'seleccionarFecha1.php', 'cobranzas_realizadas.tpl', 5, '../../libs/imagenes/icons/7.png', 0),
(137, 5, 'Reporte de Estado de Cuenta', 'resumen_cxc_clasificacion.php', 'rpt_estado_de_cuenta.tpl', 7, '../../libs/imagenes/icons/7.png', 0),
(138, 5, 'Relaci&oacute;n de Cuentas por Cobrar', 'seleccionarFecha1.php', 'rpt_relaciones_cxc.tpl', 8, '../../libs/imagenes/icons/7.png', 0),
(139, 5, 'Reporte Detalles de Pagos de Mas', 'seleccionarFecha1.php', 'rpt_pagos_demas.tpl', 9, '../../libs/imagenes/icons/7.png', 0),
(140, 89, 'M&eacute;dicos', 'proveedores_medicos.php', 'proveedores_medicos.tpl', 2, '../../libs/imagenes/28.png', 0),
(141, 1, 'Tipo de Proveedor', 'tipo_proveedor.php', 'tipo_proveedor.tpl', 20, '../../libs/imagenes/28.png', 0),
(142, 5, 'Reporte Detalle de Pago', 'rpt_detalle_pago.php', 'rpt_detalle_pago.tpl', 10, '../../libs/imagenes/icons/7.png', 0),
(143, 5, 'Reporte Resumen CXP Clasificado', 'resumen_cxc_clasificacion.php', 'resumen_cxc_clasificacion.tpl', 11, '../../libs/imagenes/icons/7.png', 0),
(144, 5, 'Listado de Clientes', 'listado_clientes.php', 'listado_clientes.tpl', 9, '../../libs/imagenes/icons/7.png', 0),
(145, 5, 'Listado CXP M&eacute;dico', 'cxp_listado_medico.php', 'cxp_listado_medico.tpl', 12, '../../libs/imagenes/icons/7.png', 0),
(146, 89, 'Listado de M&eacute;dicos por Pagar', 'seleccionarFecha1.php', 'listado_cxp_medicos.tpl', 3, '../../libs/imagenes/icons/7.png', 0),
(147, 7, 'IVA Retenido', 'seleccionarFecha1.php', 'seleccionarFecha8.tpl', 9, '../../libs/imagenes/56.png', 0),
(148, 7, 'Cheques Emitidos', 'seleccionarFecha1.php', 'seleccionarFecha9.tpl', 10, '../../libs/imagenes/56.png', 0),
(149, 89, 'Listado Anal&iacute;ticos', 'seleccionarFecha1.php', 'analiticos.tpl', 4, '../../libs/imagenes/icons/7.png', 0),
(150, 5, 'Anal&iacute;ticos Facturas', 'seleccionarFecha1.php', 'analiticoscxc.tpl', 13, '../../libs/imagenes/icons/7.png', 0),
(151, 89, 'Transferencias/Cheques de gerencia', 'tesoreria_bancoSeleccionTransf.php', 'tesoreria_bancoSeleccionTransf.tpl', 10, '../../libs/imagenes/preview_f2.png', 0),
(152, 89, 'Facturas/Cheque', 'facturasxCheque.php', 'facturasxCheque.tpl', 11, '../../libs/imagenes/03.png', 0),
(153, 5, 'Estado de Cta. Cliente', 'edo_cta_xcliente.php', 'edo_cta_xcliente.tpl', 13, '../../libs/imagenes/icons/7.png', 0),
(154, 5, 'Notas de Entrega', 'lista_clientes.php', 'lista_clientes.tpl', 3, '../../libs/imagenes/9.png', 0),
(155, 5, 'Pedidos', 'lista_clientes.php', 'lista_clientes.tpl', 2, '../../libs/imagenes/02.png', 0),
(156, 5, 'Presupuesto/Cotizaci&oacute;n', 'lista_clientes.php', 'lista_clientes.tpl', 1, '../../libs/imagenes/4.png', 0),
(157, 7, 'Relaci&oacute;n de Cotizaciones por Clientes', 'relacion_cotizacion_clientes.php', 'relacion_cotizacion_clientes.tpl', 1, '../../libs/imagenes/4.png', 0),
(158, 5, 'Relaci&oacute;n de Notas de Entrega por Clientes', 'relacion_notas_entrega_clientes.php', 'relacion_notas_entrega_clientes.tpl', 3, '../../libs/imagenes/4.png', 0),
(159, 7, 'Relaci&oacute;n de Pedidos por Clientes', 'relacion_pedidos_clientes.php', 'relacion_pedidos_clientes.tpl', 3, '../../libs/imagenes/4.png', 0),
(160, 106, 'Corte X<br>(Impresora Fiscal)', 'corte_x.php', 'corte_x.tpl', 6, '../../libs/imagenes/icons/10.png', 0),
(161, 106, 'Corte Z<br>(Impresora Fiscal)', 'corte_z.php', 'corte_z.tpl', 7, '../../libs/imagenes/icons/10.png', 0),
(162, 5, 'Productos (Precios)', 'producto_precios.php', 'producto_precios.tpl', 7, '../../libs/imagenes/13.png', 0),
(163, 7, 'Compras por Cliente (PYME)', 'seleccionarFecha1.php', 'rpt_ventas_diarias.tpl', 26, '../../libs/imagenes/68.png', 0),
(164, 7, 'Devoluciones Diarias', 'seleccionarFecha1.php', 'rpt_devolucion_diaria_ventas.tpl', 12, '../../libs/imagenes/56.png', 0),
(165, 3, 'Reporte Movimientos de Inventario', 'seleccionarFecha1.php', 'movimientos_inventario.tpl', 15, '../../libs/imagenes/68.png', 0),
(166, 3, 'Reporte Toma de Inventario F&iacute;sico', 'toma_inventario_fisico.php', 'toma_inventario_fisico.tpl', 16, '../../libs/imagenes/68.png', 0),
(167, 106, 'Borrar Precompromisos de Inventarios', 'precompromisos.php', 'precompromisos.tpl', 8, '../../libs/imagenes/icons/10.png', 0),
(168, 7, 'Ventas por Productos', 'seleccionarFecha1.php', 'rpt_venta_productos.tpl', 13, '../../libs/imagenes/56.png', 0),
(169, 7, 'Reporte productos en existencia ', 'seleccionarFecha1.php', 'rpt_vendedor_ventas.tpl', 14, '../../libs/imagenes/68.png', 1),
(170, 3, 'Region', 'region.php', 'region.tpl', 2, '../../libs/imagenes/sitios.png', 1),
(171, 3, 'Localidad', 'localidad.php', 'localidad.tpl', 3, '../../libs/imagenes/sitios.png', 1),
(172, 5, 'Despacho', 'despacho.php', 'despacho.tpl', 26, '../../libs/imagenes/37.png', 1),
(173, 3, 'Cambio de Precios', 'cambio_precio.php', 'cambio_precio.tpl', 22, '../../libs/imagenes/50.png', 0),
(174, 3, 'Reporte Localidad', 'rpt_localidades.php', 'rpt_localidades.php', 21, '../../libs/imagenes/68.png', 0),
(175, 3, 'Almac&eacute;n Localidad', 'almacen_localidad.php', 'almacen_localidad.tpl', 4, '../../libs/imagenes/patentes_vivienda.png', 1),
(176, 5, 'Despachado', 'despachado.php', 'despachado.tpl', 27, '../../libs/imagenes/37.png', 1),
(177, 3, 'Cambio de Precio', 'precio_cambio.php', 'precio_cambio.tpl', 23, '../../libs/imagenes/37.png', 0),
(178, 7, 'Ventas por Productos (POS)', 'seleccionarFecha7.php', 'rpt_venta_productos3.tpl', 18, '../../libs/imagenes/68.png', 1),
(179, 5, 'Distrito Escolar', 'Distrito_escolar.php', 'Distrito_escolar.tpl', 29, '../../libs/imagenes/56.png', 0),
(180, 5, 'Ministerios', 'ministerio.php', 'ministerio.tpl', 28, '../../libs/imagenes/56.png', 0),
(181, 106, 'Ventas Pos->Pyme', 'sincro_pos_pyme.php', 'sincro_pos_pyme.tpl', 9, '../../libs/imagenes/icons/10.png', 0),
(182, 106, 'Actualizacion de Precios', 'act_precios.php', 'act_precios.tpl', 10, '../../libs/imagenes/icons/10.png', 0),
(183, 106, 'Actualizacion de Precios TXT', 'act_precios_txt.php', 'act_precios_txt.tpl', 11, '../../libs/imagenes/icons/10.png', 0),
(184, 106, 'Sincronizacion Pyme central', 'act_central.php', 'act_central.tpl', 12, '../../libs/imagenes/icons/10.png', 0),
(185, 7, 'Notas de entrega por DE (POS)', 'seleccionarFecha3.php', 'rpt_nota_entrega_de.tpl', 20, '../../libs/imagenes/56.png', 0),
(186, 7, 'Reporte producto en existencia (POS)', 'seleccionarFecha3.php', 'rpt_venta_vendedor.tpl', 19, '../../libs/imagenes/68.png', 1),
(187, 106, 'Sincronizacion Pyme central CCS', 'act_central_ccs.php', 'act_central_ccs.tpl', 13, '../../libs/imagenes/icons/10.png', 0),
(188, 7, 'Ventas por Productos (CENTRAL)', 'seleccionarFecha4.php', 'rpt_venta_productos4.tpl', 22, '../../libs/imagenes/56.png', 0),
(189, 7, 'Ventas por Vendedor (CENTRAL)', 'seleccionarFecha4.php', 'rpt_venta_vendedor4.tpl', 23, '../../libs/imagenes/56.png', 0),
(190, 7, 'Compras por Cliente (POS)', 'seleccionarFecha4.php', 'rpt_compras_x_cliente_pos.tpl', 24, '../../libs/imagenes/68.png', 1),
(191, 3, 'Reporte Movimientos de Invetario', 'seleccionarFecha1_traslado.php', 'rpt_movimiento_inventario.tpl', 18, '../../libs/imagenes/68.png', 1),
(192, 3, 'Reporte Existencia Inventario (POS)', 'existenciaPos.php', 'existenciaPos.tpl', 19, '../../libs/imagenes/68.png', 1),
(196, 1, 'Restricciones Cedula/Dia', 'cedula_dia.php', 'cedula_dia.tpl', 5, '../../libs/imagenes/21.png', 0),
(197, 7, 'Clientes registrados Bio', 'seleccionarFecha4.php', 'clientes_biometrico.tpl', 25, '../../libs/imagenes/56.png', 0),
(198, 106, 'Subir Ventas', 'file_upload.php', 'file_upload.tpl', 20, '../../libs/imagenes/icons/4.png', 1),
(199, 106, 'Descarga De Ventas', 'files_dowload_send.php', 'files_dowload.tpl', 11, '../../libs/imagenes/icons/4.png', 0),
(200, 106, 'Sincronizacion Categorias y Productos Centrales', 'sincronizar_prod_cat.php', 'sincronizar_prod_cat.tpl', 20, '../../libs/imagenes/icons/50.png', 0),
(201, 3, 'Almacenes SIGA', 'almacen_siga.php', 'almacen_siga.tpl', 5, '../../libs/imagenes/patentes_vivienda.png', 0),
(202, 3, 'Ubicaciones SIGA', 'ubicaciones_siga.php', 'ubicaciones_siga.tpl', 5, '../../libs/imagenes/ubicacion.png', 0),
(203, 89, 'Cierre de Caja', 'cierre_caja.php', 'cierre_caja.tpl', 2, '../../libs/imagenes/icons/054.png', 0),
(204, 89, 'Depositos de Efectivo', 'deposito.php', 'deposito.tpl', 2, '../../libs/imagenes/icons/054.png', 0),
(205, 89, 'Generar Cataportes', 'cataporte.php', 'cataporte.tpl', 5, '../../libs/imagenes/icons/054.png', 0),
(206, 89, 'Transferencia a Caja Principal', 'depositos.php', 'depositos.tpl', 2, '../../libs/imagenes/icons/054.png', 1),
(207, 89, 'Cierre Efectivo', 'cataportes.php', 'cataportes.tpl', 3, '../../libs/imagenes/icons/054.png', 1),
(208, 89, 'Libro Ventas', 'libro_ventas.php', 'libro_ventas.tpl', 10, '../../libs/imagenes/66.png', 1),
(209, 1, 'Cajas Impresora', 'caja_impresora.php', 'caja_impresora.tpl', 5, '../../libs/imagenes/11.png', 1),
(210, 89, 'Cerrar Cajero', 'cierre_cajero.php', 'cierre_cajero.tpl', 1, '../../libs/imagenes/icons/054.png', 1),
(211, 106, 'Descarga De Inventario Actual', 'inventario_dowload_send.php', 'inventario_dowload.tpl', 21, '../../libs/imagenes/document-save.png', 0),
(212, 106, 'Descarga De Movimientos de Inventario', 'kardex_dowload_send.php', 'kardex_dowload.tpl', 21, '../../libs/imagenes/document-save.png', 0),
(217, 7, 'Reporte Libro Ventas Totales', 'reporte_libro_venta.php', 'reporte_libro_venta.tpl', 12, '../../libs/imagenes/68.png', 1),
(218, 106, 'Actualizar Productos y Precios', 'precios_productos.php', 'precios_productos.tpl', 20, '../../libs/imagenes/icons/4.png', 1),
(219, 1, 'Cuentas Bancarias', 'cuentas_contables.php', 'cuentas_contables.tpl', 6, '../../libs/imagenes/26.png', 1),
(220, 1, 'Operaciones de Apertura', 'operaciones_apertura.php', 'operaciones_apertura.tpl', 1, '../../libs/imagenes/113.png', 1),
(221, 106, 'Estabilizaci&oacute;n Productos', 'estabilizacion_productos.php', 'estabilizacion_productos.tpl', 20, '../../libs/imagenes/icons/50.png', 1),
(222, 106, 'Descargar Sincronizacion Data', 'descargar_sincronizacion.php', 'descargar_sincronizacion.tpl', 22, '../../libs/imagenes/document-save.png', 1),
(223, 89, 'Retiro Efectivo Cajero', 'retiro_efectivo.php', 'retiro_efectivo.tpl', 13, '../../libs/imagenes/65.png', 1),
(224, 7, 'Reporte Consolidado Arqueos', 'reporte_arqueos.php', 'reporte_arqueos.tpl', 12, '../../libs/imagenes/68.png', 1),
(225, NULL, 'Calidad', '', '', 5, '../../libs/imagenes/113.png', 1),
(226, 225, 'Evaluar Productos', 'calidad_entrada.php', 'calidad_entrada.tpl', 1, '../../libs/imagenes/113.png', 1),
(227, 225, 'Revision Almacen', 'calidad_retiro.php', 'calidad_retiro.tpl', 2, '../../libs/imagenes/113.png', 1),
(228, 225, 'Acta De Visitas', 'calidad_visita.php', 'calidad_visita.tpl', 1, '../../libs/imagenes/88.png', 1),
(229, 1, 'Tipo Uso', 'tipo_uso.php', 'tipo_uso.tpl', 1, '../../libs/imagenes/11.png', 1),
(230, 1, 'Tipo Visita', 'tipo_visita.php', 'tipo_visita.tpl', 1, '../../libs/imagenes/11.png', 1),
(231, 7, 'Reporte Calidad', 'seleccionarFecha1.php', 'rpt_calidad.tpl', 1, '../../libs/imagenes/68.png', 1),
(232, 3, 'Tomas F&iacute;sica de Inventario', 'tomas_fisicas.php', 'tomas_fisicas.tpl', 13, '../../libs/imagenes/46.png', 1),
(233, 3, 'Planilla Toma Fisica Inventario', 'toma_fisica_manual.php', 'toma_fisica_manual.tpl', 16, '../../libs/imagenes/68.png', 1),
(234, 7, 'Ventas por Productos (PYME)', 'rpt_ventas_productos_pyme.php', 'rpt_ventas_productos_pyme.tpl', 50, '../../libs/imagenes/68.png', 0),
(235, 3, 'Actas de Inventario', 'actas_inventario.php', 'actas_inventario.tpl', 15, '../../libs/imagenes/68.png', 1),
(236, 3, 'Planilla Toma Fisica Inventario (etiqueta)', 'toma_fisica_manual_etiqueta.php', 'toma_fisica_manual_etiqueta.tpl', 16, '../../libs/imagenes/68.png', 1),
(237, 225, 'Modulo nuevo', 'calidad_nuevo.php', 'calidad_nuevo.tpl', 1, '../../libs/imagenes/88.png', 0),
(238, 239, 'Gestionar Pedidos (Productos y/o Servicios)', 'pedidos_lista_clientes.php', 'pedidos_lista_clientes.tpl', 4, '../../libs/imagenes/64.png', 1),
(239, NULL, 'Pedido', NULL, NULL, 5, '../../libs/imagenes/02.png', 1),
(240, 5, 'Facturar Pedidos', 'salida_almacen_pedido_facturar.php', 'salida_almacen_pedido_facturar.tpl', 5, '../../libs/imagenes/64.png', 1),
(241, 239, 'Gestionar Despacho desde Pedido', 'salida_almacen_pedido.php', 'salida_almacen_pedido.tpl', 12, '../../libs/imagenes/traslados.png', 1),
(242, 1, 'Roles', 'roles.php', 'roles.tpl', 5, '../../libs/imagenes/82.png', 1),
(243, 7, 'Ventas por Productos (PYME por RUBRO)', 'toma_fisica_manual_2.php', 'toma_fisica_manual_2.tpl', 50, '../../libs/imagenes/68.png', 0),
(244, 7, 'Ventas por Productos (PYME por Categoria)', 'rpt_ventas_productos_pyme_grupo.php', 'rpt_ventas_productos_pyme_grupo.tpl', 50, '../../libs/imagenes/68.png', 0),
(245, 5, 'Relaci&oacute;n de Facturas por Clientes (Productos y/o Servicios)', 'relacion_factura_clientes.php', 'relacion_factura_clientes.tpl', 4, '../../libs/imagenes/4.png', 1),
(246, 3, 'Ajustes de Almacen', 'ajustes_almacen.php', 'ajustes_almacen.tpl', 12, '../../libs/imagenes/traslados.png', 1),
(247, 239, 'Crear Cesta Clap', 'cesta_clap_index.php', 'cesta_clap_index.tpl', 4, '../../libs/imagenes/64.png', 1),
(248, 89, 'Billetes', 'billetes_index.php', 'billetes_index.tpl', 12, '../../libs/imagenes/05.png', 1),
(249, 89, 'Cierre POS', 'cierre_pos.php', 'cierre_pos.tpl', 4, '../../libs/imagenes/icons/054.png', 1),
(250, 106, 'Reprocesar Sincronizacion Data', 'reprocesar_descargar_sincronizacion.php', 'reprocesar_descargar_sincronizacion.tpl', 22, '../../libs/imagenes/traslados.png', 1),
(251, 106, 'Cambio Precio Historico', 'cambiar_historico_precio.php', 'cambiar_historico_precio.tpl', 21, '../../libs/imagenes/icons/4.png', 1),
(252, 3, 'Producci&oacute;n', 'transformacion_index.php', 'transformacion_index.tpl', 11, '../../libs/imagenes/traslados.png', 1),
(253, 3, 'Reporte Transformación', 'seleccionarFecha1_traslado.php', 'rpt_movimiento_inv_produccion.tpl', 25, '../../libs/imagenes/68.png', 1),
(254, 89, 'Correcci&oacute;n Cataporte', 'correccion_deposito.php', 'correccion_deposito.tpl', 12, '../../libs/imagenes/icons/054.png', 1),
(255, 89, 'Cierre Tickets', 'cataporte_ticket.php', 'cataporte_ticket.tpl', 5, '../../libs/imagenes/icons/054.png', 1),
(256, 89, 'Depositos en Efectivo', 'depositos_old.php', 'depositos_old.tpl', 15, '../../libs/imagenes/icons/054.png', 1),
(257, 89, 'Generar Comprobante', 'comprobante_generar.php', 'comprobante_generar.tpl', 11, '../../libs/imagenes/64.png', 1),
(258, 7, 'Reporte Consolidado Comprobantes', 'seleccionarFecha14.php', 'rpt_consolidado.tpl', 11, '../../libs/imagenes/68.png', 1),
(259, 7, 'Reporte Movimientos Banco', 'seleccionarFecha14.php', 'rpt_consolidado_banco.tpl', 12, '../../libs/imagenes/68.png', 1),
(260, 1, 'Tipo Cuenta Presupuesto', 'tipo_cuenta_presupuesto.php', 'tipo_cuenta_presupuesto.tpl', 15, '../../libs/imagenes/26.png', 1),
(261, 1, 'Cuenta Presupuestaría', 'cuenta_presupuesto.php', 'cuenta_presupuesto.tpl', 16, '../../libs/imagenes/26.png', 1),
(262, 89, 'Cierre Tarjeta', 'cataporte_tarjeta.php', 'cataporte_tarjeta.tpl', 6, '../../libs/imagenes/icons/054.png', 0),
(263, 89, 'Cierre Deposito', 'cataporte_deposito.php', 'cataporte_deposito.tpl', 6, '../../libs/imagenes/icons/054.png', 1),
(264, 89, 'Cierre Cheque', 'cataporte_cheque.php', 'cataporte_cheque.tpl', 7, '../../libs/imagenes/icons/054.png', 1),
(265, 89, 'Cierre Credito', 'cataporte_credito.php', 'cataporte_credito.tpl', 8, '../../libs/imagenes/icons/054.png', 0),
(266, 7, 'Clientes Atendidos (POS)', 'seleccionarFecha4.php', 'rpt_atendidos_x_cliente_pos.tpl', 24, '../../libs/imagenes/68.png', 1),
(267, 5, 'Impresi&oacute;n de Facturas', 'relacion_factura_clientes_impresion.php', 'relacion_factura_clientes_impresion.tpl', 4, '../../libs/imagenes/printer.png', 1),
(268, NULL, 'Administracion POS ', 'usuarios.php', 'usuarios.tpl', 0, '../../libs/imagenes/21.png', 1),
(269, 268, 'Usuarios POS', 'usuarios_post.php', 'usuarios_post.tpl', 5, '../../libs/imagenes/21.png', 1),
(270, 106, 'CONTRUCCION', 'file_upload_estabilizacion3.php', 'file_upload_estabilizacion3.tpl', 8, '../../libs/imagenes/icons/50.png', 0),
(271, 1, 'Reconversi&oacute;n Monetaria', 'reconversion_monetaria.php', 'reconversion_monetaria.tpl', 10, '../../libs/imagenes/traslados.png', 1),
(272, 1, 'Cotizaciones Dolar', 'cotizaciones_dolar.php', 'cotizaciones_dolar.tpl', 17, '../../libs/imagenes/35.png', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`cod_modulo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `cod_modulo` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
