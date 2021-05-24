-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql
-- Tiempo de generación: 24-05-2021 a las 17:49:15
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
-- Estructura de tabla para la tabla `subseccion`
--

CREATE TABLE `subseccion` (
  `opt_subseccion` varchar(80) NOT NULL COMMENT 'add, edit, delete',
  `archivo_tpl` varchar(100) NOT NULL,
  `archivo_php` varchar(100) NOT NULL,
  `cod_seccion` int(32) UNSIGNED DEFAULT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subseccion`
--

INSERT INTO `subseccion` (`opt_subseccion`, `archivo_tpl`, `archivo_php`, `cod_seccion`, `descripcion`) VALUES
('edit', 'almacen_editar.tpl', 'almacen_editar.php', 55, 'Editar Almacen'),
('delete', 'almacen_eliminar.tpl', 'almacen_eliminar.php', 55, 'Eliminar Almacen'),
('add', 'zona_nuevo.tpl', 'zona_nuevo.php', 56, 'Agregrando Zona'),
('edit', 'zona_editar.tpl', 'zona_editar.php', 56, 'Editar Zona'),
('delete', 'zona_eliminar.tpl', 'zona_eliminar.php', 56, 'Eliminar Zona'),
('add', 'vendedor_nuevo.tpl', 'vendedor_nuevo.php', 57, 'Incluyendo Vendedor'),
('edit', 'vendedor_editar.tpl', 'vendedor_editar.php', 57, 'Editar Informacion del Vendedor'),
('delete', 'vendedor_eliminar.tpl', 'vendedor_eliminar.php', 57, 'Eliminar Vendedor'),
('add', 'departamento_nuevo.tpl', 'departamento_nuevo.php', 64, 'Agregando Departamento'),
('edit', 'departamento_editar.tpl', 'departamento_editar.php', 64, 'Editar Departamento'),
('delete', 'departamento_eliminar.tpl', 'departamento_eliminar.php', 64, 'Eliminar Departamento'),
('add1', 'grupo_nuevo.tpl', 'grupo_nuevo.php', 65, 'Agregando Grupo'),
('edit1', 'grupo_editar.tpl', 'grupo_editar.php', 65, 'Editar Grupo'),
('delete', 'grupo_eliminar.tpl', 'grupo_eliminar.php', 65, 'Eliminar Grupo'),
('add', 'linea_nuevo.tpl', 'linea_nuevo.php', 66, 'Agregando Linea'),
('edit', 'linea_editar.tpl', 'linea_editar.php', 66, 'Editar Linea'),
('delete', 'linea_eliminar.tpl', 'linea_eliminar.php', 66, 'Eliminar Linea'),
('edit', 'cliente_editar.tpl', 'cliente_editar.php', 8, 'Editar Informacion del Cliente'),
('delete', 'cliente_eliminar.tpl', 'cliente_eliminar.php', 8, 'Eliminar Cliente'),
('delete', 'producto_eliminar.tpl', 'producto_eliminar.php', 61, 'Eliminar Producto'),
('add', 'cliente_nuevo.tpl', 'cliente_nuevo.php', 8, 'Nuevo Cliente'),
('add', 'servicio_nuevo.tpl', 'servicio_nuevo.php', 67, 'Incluyendo Nuevo Servicio'),
('edit', 'servicio_editar.tpl', 'servicio_editar.php', 67, 'Editar Servicio'),
('delete', 'servicio_eliminar.tpl', 'servicio_eliminar.php', 67, 'Eliminar Servicio'),
('add', 'usuarios_nuevo.tpl', 'usuarios_nuevo.php', 68, 'Nuevo Usuario'),
('edit', 'usuarios_editar.tpl', 'usuarios_editar.php', 68, 'Editar Usuario'),
('delete', 'usuarios_eliminar.tpl', 'usuarios_eliminar.php', 68, 'Eliminar Usuario'),
('add', 'cliente_nuevo.tpl', 'cliente_nuevo.php', 58, 'Incluyendo Cliente'),
('edit', 'cliente_editar.tpl', 'cliente_editar.php', 58, 'Editar Informacion del Cliente'),
('newfactura', 'factura_nueva.tpl', 'factura_nueva.php', 58, 'Nueva Factura'),
('viewProductos', 'producto_existencia_almacen_viewProductos.tpl', 'producto_existencia_almacen_viewProductos.php', 69, 'Lista de Productos por Almacen'),
('add', 'producto_existencia_almacen_viewProductosAgregar.tpl', 'producto_existencia_almacen_viewProductosAgregar.php', 69, 'Incluyendo Producto al Almacen'),
('edit', 'producto_existencia_almacen_viewProductosEditar.tpl', 'producto_existencia_almacen_viewProductosEditar.php', 69, 'Editar Cantidad Existente del Producto'),
('delete', 'producto_existencia_almacen_viewProductosEliminar.tpl', 'producto_existencia_almacen_viewProductosEliminar.php', 69, 'Eliminar Existencia del Producto'),
('add', 'almacen_nuevo.tpl', 'almacen_nuevo.php', 55, 'Agregando Almacen'),
('add', 'almacen_nuevo.tpl', 'almacen_nuevo.php', 55, 'Agregando Almacen'),
('add', 'islr_nuevo.tpl', 'islr_nuevo.php', 70, 'Nuevo ISLR'),
('edit', 'islr_editar.tpl', 'islr_editar.php', 70, 'Editar ISLR'),
('delete', 'islr_eliminar.tpl', 'islr_eliminar.php', 70, 'Eliminar ISLR'),
('add', 'boletos_nuevo.tpl', 'boletos_nuevo.php', 72, 'AÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â±adir Boleto'),
('edit', 'boletos_editar.tpl', 'boletos_editar.php', 72, 'Editar Boleto'),
('delete', 'boletos_eliminar.tpl', 'boletos_eliminar.php', 72, 'Eliminar Boleto'),
('add', 'cliente_nuevo.tpl', 'cliente_nuevo.php', 73, 'Incluyendo Cliente'),
('edit', 'cliente_editar.tpl', 'cliente_editar.php', 73, 'Editar Informacion del Cliente'),
('newfactura', 'factura_nueva_boleto.tpl', 'factura_nueva_boleto.php', 73, 'Nueva Factura (Boletos)'),
('add', 'responsable_nuevo.tpl', 'responsable_nuevo.php', 76, 'Incluyendo Responsable'),
('edit', 'responsable_editar.tpl', 'responsable_editar.php', 76, 'Editar Responsable'),
('delete', 'responsable_eliminar.tpl', 'responsable_eliminar.php', 76, 'Eliminar Responsable'),
('add', 'banco_nuevo.tpl', 'banco_nuevo.php', 77, 'Incluir Banco'),
('edit', 'banco_editar.tpl', 'banco_editar.php', 77, 'Editar Banco'),
('delete', 'banco_eliminar.tpl', 'banco_eliminar.php', 77, 'Eliminar Banco'),
('add', 'instrumentoformapago_nuevo.tpl', 'instrumentoformapago_nuevo.php', 78, 'Incluir Forma Pago'),
('edit', 'instrumentoformapago_editar.tpl', 'instrumentoformapago_editar.php', 78, 'Editar Forma Pago'),
('delete', 'instrumentoformapago_eliminar.tpl', 'instrumentoformapago_eliminar.php', 78, 'Eliminar Forma Pago'),
('edocuenta', 'cxc_estadodecuenta.tpl', 'cxc_estadodecuenta.php', 59, 'Estado de Cuenta'),
('newfactura', 'factura_nueva.tpl', 'factura_nueva.php', 59, 'Nueva Factura'),
('pagooabono', 'cxc_pagooabono.tpl', 'cxc_pagooabono.php', 59, 'Nuevo Pago/Abono'),
('add', 'retencioniva_nuevo.tpl', 'retencioniva_nuevo.php', 80, 'Agregar Nuevo Registro de Retencion I.V.A.'),
('edit', 'retencioniva_editar.tpl', 'retencioniva_editar.php', 80, 'Editar Registro de Retencion I.V.A.'),
('delete', 'retencioniva_eliminar.tpl', 'retencioniva_eliminar.php', 80, 'Eliminar Registro de Retencion I.V.A.'),
('devolver_ps', 'devolucion_venta.tpl', 'devolucion_venta.php', 79, 'DevoluciÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n de Venta'),
('add', 'proveedores_nuevo.tpl', 'proveedores_nuevo.php', 86, 'Incluir Nuevo Proveedor'),
('edit', 'proveedores_editar.tpl', 'proveedores_editar.php', 86, 'Editar Informacion del proveedor'),
('delete', 'proveedores_eliminar.tpl', 'proveedores_eliminar.php', 86, 'Eliminar Proveedor'),
('newCompra', 'proveedores_compra_nuevo.tpl', 'proveedores_compra_nuevo.php', 87, 'Generar Nueva Compra'),
('add', 'proveedores_nuevo.tpl', 'proveedores_nuevo.php', 87, 'Incluir Nuevo Proveedor'),
('edit', 'proveedores_editar.tpl', 'proveedores_editar.php', 87, 'Editar Informacion del proveedor'),
('delete', 'proveedores_eliminar.tpl', 'proveedores_eliminar.php', 87, 'Eliminar Proveedor'),
('edocuenta', 'cxp_estadodecuenta.tpl', 'cxp_estadodecuenta.php', 88, 'Cuenta por pagar'),
('pagoabonoCXP', 'cxp_pagoabono.tpl', 'cxp_pagoabono.php', 88, 'Agregar Abono de compra'),
('add', 'banco_nuevo.tpl', 'banco_nuevo.php', 90, 'Incluir Banco'),
('edit', 'banco_editar.tpl', 'banco_editar.php', 90, 'Editar Banco'),
('viewcuentasByBanco', 'tesoreria_banco_cuentas.tpl', 'tesoreria_banco_cuentas.php', 90, 'Cuentas'),
('addCuentaByBanco', 'tesoreria_banco_cuentas_agregar.tpl', 'tesoreria_banco_cuentas_agregar.php', 90, 'Incluir Cuenta Bancaria'),
('editCuentaByBanco', 'tesoreria_banco_cuentas_editar.tpl', 'tesoreria_banco_cuentas_editar.php', 90, 'Editar Cuenta'),
('deleteCuentaByBanco', 'tesoreria_banco_cuentas_eliminar.tpl', 'tesoreria_banco_cuentas_eliminar.php', 90, 'Eliminar Cuenta'),
('listaChequeraCuentaB', 'listaChequeraCuentaByBanco.tpl', 'listaChequeraCuentaByBanco.php', 90, 'Lista de Chequeras'),
('listaChequeraCuentaByBanco', 'tesoreria_listaChequeraCuentaByBanco.tpl', 'tesoreria_listaChequeraCuentaByBanco.php', 90, 'Lista de Chequeras'),
('addChequeraCuentaByBanco', 'tesoreria_addChequeraCuentaByBanco.tpl', 'tesoreria_addChequeraCuentaByBanco.php', 90, 'Nuevo Cheque'),
('editChequeraCuentaByBanco', 'tesoreria_editChequeraCuentaByBanco.tpl', 'tesoreria_editChequeraCuentaByBanco.php', 90, 'Editar Chequera'),
('deleteChequeraCuentaByBanco', 'tesoreria_deleteChequeraCuentaByBanco.tpl', 'tesoreria_deleteChequeraCuentaByBanco.php', 90, 'Eliminar Chequera'),
('generarChequeraCuentaByBanco', 'tesoreria_generarChequeraCuentaByBanco.tpl', 'tesoreria_generarChequeraCuentaByBanco.php', 90, 'Generar Chequera'),
('activarChequeraCuentaByBanco', 'tesoreria_activarChequeraCuentaByBanco.tpl', 'tesoreria_activarChequeraCuentaByBanco.php', 90, 'Activar Cheques'),
('consumirChequeraCuentaByBanco', 'tesoreria_consumirChequeraCuentaByBanco.tpl', 'tesoreria_consumirChequeraCuentaByBanco.php', 90, 'Consumir Chequera'),
('depositoChequeraCuentaByBanco', 'tesoreria_depositoChequeraCuentaByBanco.tpl', 'tesoreria_depositoChequeraCuentaByBanco.php', 90, 'Cambiar a Estatus Deposito'),
('ver_chequesChequeraCuentaByBanco', 'tesoreria_ver_chequesChequeraCuentaByBanco.tpl', 'tesoreria_ver_chequesChequeraCuentaByBanco.php', 90, 'Cheques'),
('verChequerasByBanco', 'tesoreria_banco_cuentasSeleccioneParaCuenta.tpl', 'tesoreria_banco_cuentasSeleccioneParaCuenta.php', 91, 'Cuentas'),
('SeleccionlistaChequeraCuentaByBanco', 'tesoreria_SeleccionlistaChequeraCuentaByBanco.tpl', 'tesoreria_SeleccionlistaChequeraCuentaByBanco.php', 91, 'Chequeras Activas'),
('hacerCheque', 'tesoreria_hacerCheque.tpl', 'tesoreria_hacerCheque.php', 91, 'Cheque por CxP / Cheque por Beneficiario'),
('viewmovimientosByBanco', 'tesoreria_banco_movimientos.tpl', 'tesoreria_banco_movimientos.php', 93, 'Cuentas'),
('movimientosCuentaByBanco', 'tesoreria_lista_movimientos_bancarios.tpl', 'tesoreria_lista_movimientos_bancarios.php', 93, 'Lista de Movimientos Bancarios'),
('addMovimientoCuentaByBanco', 'tesoreria_addMovimientoCuentaByBanco.tpl', 'tesoreria_addMovimientoCuentaByBanco.php', 93, 'Agregar Movimientos Bancarios'),
('editMovimientoCuentaByBanco', 'tesoreria_editMovimientoCuentaByBanco.tpl', 'tesoreria_editMovimientoCuentaByBanco.php', 93, 'Editar Movimientos Bancarios'),
('deleteMovimientoCuentaByBanco', 'tesoreria_deleteMovimientoCuentaByBanco.tpl', 'tesoreria_deleteMovimientoCuentaByBanco.php', 93, 'Eliminar Movimientos Bancarios'),
('edit', 'tipos_movimientos_bancarios_edit.tpl', 'tipos_movimientos_bancarios_edit.php', 96, 'Editar Tipo de Movimiento'),
('delete', 'tipos_movimientos_bancarios_delete.tpl', 'tipos_movimientos_bancarios_delete.php', 96, 'Eliminar Tipo Movimiento'),
('add', 'tipos_movimientos_bancarios_add.tpl', 'tipos_movimientos_bancarios_add.php', 96, 'Agregar Tipo de Movimiento'),
('edit', 'impuesto_municipal_ica_edit.tpl', 'impuesto_municipal_ica_edit.php', 97, 'Editar Impuesto ICA'),
('delete', 'impuesto_municipal_ica_delete.tpl', 'impuesto_municipal_ica_delete.php', 97, 'Eliminar Impuesto ICA'),
('add', 'impuesto_municipal_ica_add.tpl', 'impuesto_municipal_ica_add.php', 97, 'Agregar Impuesto ICA'),
('edit', 'tipo_impuesto_editar.tpl', 'tipo_impuesto_editar.php', 98, 'Editar Tipo de Impuesto'),
('delete', 'tipo_impuesto_eliminar.tpl', 'tipo_impuesto_eliminar.php', 98, 'Eliminar Tipo de Impuesto'),
('add', 'tipo_impuesto_nuevo.tpl', 'tipo_impuesto_nuevo.php', 98, 'Agregar Tipo de Impuesto'),
('edit', 'entidad_editar.tpl', 'entidad_editar.php', 99, 'Editar Entidad'),
('delete', 'entidad_eliminar.tpl', 'entidad_eliminar.php', 99, 'Eliminar Entidad'),
('add', 'entidad_nuevo.tpl', 'entidad_nuevo.php', 99, 'Agregar Entidad'),
('edit', 'formulacion_impuestos_editar.tpl', 'formulacion_impuestos_editar.php', 100, 'Editar Formulacion de Impuesto'),
('delete', 'formulacion_impuestos_eliminar.tpl', 'formulacion_impuestos_eliminar.php', 100, 'Eliminar Formulacion de Impuesto'),
('add', 'formulacion_impuestos_nuevo.tpl', 'formulacion_impuestos_nuevo.php', 100, 'Agregar Formulacion de Impuesto'),
('edit', 'lista_impuestos_editar.tpl', 'lista_impuestos_editar.php', 101, 'Editar Impuesto'),
('delete', 'lista_impuestos_eliminar.tpl', 'lista_impuestos_eliminar.php', 101, 'Eliminar Impuesto'),
('add', 'lista_impuestos_nuevo.tpl', 'lista_impuestos_nuevo.php', 101, 'Agregar Impuesto'),
('add', 'tipo_cliente.tpl', 'tipo_cliente_nuevo.php', 102, 'Agregandar Tipo de Cliente'),
('edit', 'tipo_cliente_editar.tpl', 'tipo_cliente_editar.php', 102, 'Editar Tipo de Cliente'),
('delete', 'tipo_cliente_eliminar.tpl', 'tipo_cliente_eliminar.php', 102, 'Eliminar Tipo de Cliente'),
('edit', 'divisas_editar.tpl', 'divisas_editar.php', 104, 'Editar Divisas'),
('add', 'divisas_agregar.tpl', 'divisas_agregar.php', 104, 'Agregar Divisa'),
('add', 'divisas_agregar2.tpl', 'divisas_agregar2.php', 105, 'Agregar Tasa Cambio'),
('edit', 'tasa_editar.tpl', 'tasa_editar.php', 105, 'Editar Tasa de Cambio'),
('add', 'tipo_movimientos_almacen_nuevo.tpl', 'tipo_movimientos_almacen_nuevo.php', 112, 'Agregar Tipo de Movimiento de Almacen'),
('edit', 'tipo_movimientos_almacen_editar.tpl', 'tipo_movimientos_almacen_editar.php', 112, 'Editar Tipo de Movimiento de Almacen'),
('delete', 'tipo_movimientos_almacen_eliminar.tpl', 'tipo_movimientos_almacen_eliminar.php', 112, 'Eliminar Tipo de Movimiento de Almacen'),
('add', 'entrada_almacen_nuevo.tpl', 'entrada_almacen_nuevo.php', 109, 'Agregar Entrada de Almacen'),
('edit', 'entrada_almacen_editar.tpl', 'entrada_almacen_editar.php', 109, 'Editar Entrada de Almacen'),
('delete', 'entrada_almacen_eliminar.tpl', 'entrada_almacen_eliminar.php', 109, 'Eliminar Entrada de Almacen'),
('add', 'salida_almacen_nuevo.tpl', 'salida_almacen_nuevo.php', 110, 'Agregar Salida de Almacen'),
('edit', 'salida_almacen_editar.tpl', 'salida_almacen_editar.php', 110, 'Editar Salida de Almacen'),
('delete', 'salida_almacen_eliminar.tpl', 'salida_almacen_eliminar.php', 110, 'Eliminar Salida de Almacen'),
('add', 'traslado_almacen_nuevo.tpl', 'traslado_almacen_nuevo.php', 111, 'Agregar Traslado de Almacen'),
('edit', 'traslado_almacen_editar.tpl', 'traslado_almacen_editar.php', 111, 'Editar Traslado de Almacen'),
('delete', 'traslado_almacen_eliminar.tpl', 'traslado_almacen_eliminar.php', 111, 'Eliminar Traslado de Almacen'),
('CuentaByBancoConciliacion', 'tesoreria_banco_movimientos_conciliacion.tpl', 'tesoreria_banco_movimientos_conciliacion.php', 94, 'Cuentas'),
('seleccionFechaAconciliar', 'tesoreria_fechas_concilar.tpl', 'tesoreria_fechas_concilar.php', 94, 'Especifique el mes a conciliar'),
('tesoreria_conciliar', 'tesoreria_concilar.tpl', 'tesoreria_concilar.php', 94, 'Conciliar'),
('add', 'proveedores_especialidad_add.tpl', 'proveedores_especialidad_add.php', 132, 'Agregar Especialidad Proveedor'),
('edit', 'proveedores_especialidad_edit.tpl', 'proveedores_especialidad_edit.php', 132, 'Editar Especialidad'),
('delete', 'proveedores_especialidad_delete.tpl', 'proveedores_especialidad_delete.php', 132, 'Eliminar Especialidad'),
('facturasCXP', 'cxp_facturas.tpl', 'cxp_facturas.php', 88, 'Facturas de compra'),
('addFac', 'cxp_facturas_nuevo.tpl', 'cxp_facturas_nuevo.php', 88, 'Agregar Factura'),
('pendienteFactura', 'cxc_pendiente.tpl', 'cxc_pendiente.php', 133, 'Cuenta por cobrar Pendiente'),
('autorizarFactura', 'cxc_autorizar.tpl', 'cxc_autorizar.php', 134, 'Cuenta por Cobrar Enviadas'),
('pagarFactura', 'cxc_pagar.tpl', 'cxc_pagar.php', 135, 'Cuenta por Cobrar '),
('cxpFacturasMedico', 'cxp_facturas_medico.tpl', 'cxp_facturas_medico.php', 140, 'Facturas por pagar medico'),
('add', 'tipo_proveedor_agregar.tpl', 'tipo_proveedor_agregar.php', 141, 'Agregar Tipo de Proveedor'),
('edit', 'tipo_proveedor_editar.tpl', 'tipo_proveedor_editar.php', 141, 'Editar Tipo de Proveedor'),
('delete', 'tipo_proveedor_eliminar.tpl', 'tipo_proveedor_eliminar.php', 141, 'Eliminar Tipo de Proveedor'),
('imprimirFacturas', 'facturasxmedico.tpl', 'facturasxmedico.php', 140, 'Facturas por Medico'),
('view', 'cxp_facturas_ver.tpl', 'cxp_facturas_ver.php', 88, 'Ver factura'),
('verCuentasPorBanco', 'tesoreria_banco_cuentasSeleccioneParaCuentaTransf.tpl', 'tesoreria_banco_cuentasSeleccioneParaCuentaTransf.php', 151, 'Cuentas'),
('transferencias', 'tesoreria_transferencia.tpl', 'tesoreria_transferencia.php', 151, 'Ver Transferencias'),
('hacerTransferencia', 'tesoreria_hacerTransferencia.tpl', 'tesoreria_hacerTransferencia.php', 151, 'Hacer transferencia'),
('imprimirFactxCheque', 'listaFactxCheque.tpl', 'listaFactxCheque.php', 152, 'Lista Factura x Cheque'),
('new', 'presupuesto_nuevo.tpl', 'presupuesto_nuevo.php', 156, 'Nuevo Presupuesto/Cotizacion'),
('add', 'cliente_nuevo.tpl', 'cliente_nuevo.php', 156, 'Agregrando Cliente'),
('edit', 'cliente_editar.tpl', 'cliente_editar.php', 156, 'Editar Cliente'),
('new', 'pedido_nuevo.tpl', 'pedido_nuevo.php', 155, 'Nuevo Pedido'),
('add', 'cliente_nuevo.tpl', 'cliente_nuevo.php', 155, 'Agregrando Cliente'),
('edit', 'cliente_editar.tpl', 'cliente_editar.php', 155, 'Editar Cliente'),
('new', 'nota_entrega_nueva.tpl', 'nota_entrega_nueva.php', 154, 'Nueva Nota de Entrega'),
('add', 'cliente_nuevo.tpl', 'cliente_nuevo.php', 154, 'Agregrando Cliente'),
('edit', 'cliente_editar.tpl', 'cliente_editar.php', 154, 'Editar Cliente'),
('delete', 'anular_pedido.tpl', 'anular_pedido.php', 159, 'Anular Pedido'),
('delete', 'anular_nota_entrega.tpl', 'anular_nota_entrega.php', 158, 'Anular Notas de Entrega'),
('newfactura_rapida_pedido', 'factura_rapida_nueva_pedido.tpl', 'factura_rapida_nueva_pedido.php', 238, 'Nuevo Pedido'),
('delete', 'anular_compra.tpl', 'anular_compra.php', 60, 'Anular Compra'),
('add', 'region_nuevo.tpl', 'region_nuevo.php', 170, 'region donde se ubican los almacenes'),
('edit', 'region_editar.tpl', 'region_editar.php', 170, 'editar las regiones'),
('delete', 'region_eliminar.tpl', 'region_eliminar.php', 170, 'eliminar region'),
('add', 'localidad_nuevo.tpl', 'localidad_nuevo.php', 171, 'localidad de los almacenes'),
('edit', 'localidad_editar.tpl', 'localidad_editar.php', 171, 'Editar las localidades'),
('serial', 'serial.tpl', 'serial.php', 61, 'seriales'),
('listserial', 'serial_nuevo.tpl', 'serial_nuevo.php', 61, 'agregar serial '),
('editserial', 'serial_editar.tpl', 'serial_editar.php', 61, 'editar serial'),
('deleteserial', 'serial_eliminar.tpl', 'serial_eliminar.php', 61, 'eliminar serial'),
('listEst', 'estados.tpl', 'estados.php', 170, 'estados que conforma la region'),
('addEstado', 'estados_nuevo.tpl', 'estados_nuevo.php', 170, 'estado en la region'),
('addDesp', 'detalleDesp_nuevo.tpl', 'detalleDesp_nuevo.php', 172, 'nuevo despacho detalle'),
('editEstados', 'estados_editar.tpl', 'estados_editar.php', 170, 'editar estados en la region'),
('deleteEstado', 'estados_eliminar.tpl', 'estados_eliminar.php', 170, 'eliminar estados en la region'),
('addUbicacion', 'ubicacion_nuevo.tpl', 'ubicacion_nuevo.php', 55, 'nueva ubicacion'),
('editUbicacion', 'ubicacion_editar.tpl', 'ubicacion_editar.php', 55, 'editar ubicacion'),
('deleteUbicacion', 'ubicacion_eliminar.tpl', 'ubicacion_eliminar.php', 55, 'eliminar ubicacion'),
('ubicacion', 'ubicacion.tpl', 'ubicacion.php', 55, 'Ubicacion'),
('delete', 'localidad_eliminar.tpl', 'localidad_eliminar.php', 171, 'eliminar localidad'),
('add', 'ministerio_nuevo.tpl', 'ministerio_nuevo.php', 180, 'Agregar Ministerios'),
('edit', 'ministerio_editar.tpl', 'ministerio_editar.php', 180, 'Editar Ministerio'),
('delete', 'ministerio_eliminar.tpl', 'ministerio_eliminar.php', 180, 'Eliminar Ministerios'),
('add', 'distrito_escolar_nuevo.tpl', 'distrito_escolar_nuevo.php', 179, 'Agregar Distrito Escolar'),
('edit', 'distrito_escolar_editar.tpl', 'distrito_escolar_editar.php', 179, 'Editar Distrito Escolar'),
('delete', 'distrito_escolar_eliminar.tpl', 'distrito_escolar_eliminar.php', 179, 'Eliminar Distrito Escolar'),
('edit', 'cedula_dia_editar.tpl', 'cedula_dia_editar.php', 196, 'Editar Restriccion Cedula/Dia'),
('add', 'deposito.tpl', 'deposito.php', 206, 'Editar Restriccion Cedula/Dia'),
('add', 'cataporte.tpl', 'cataporte.php', 207, 'Editar Restriccion Cedula/Dia'),
('add', 'agre_libro_venta.tpl', 'agre_libro_venta.php', 208, 'Agregar Libro de Venta'),
('add', 'caja_impresora_agregar.tpl', 'caja_impresora_agregar.php', 209, 'Agregar Impresora y Caja'),
('edit', 'caja_impresora_editar.tpl', 'caja_impresora_editar.php', 209, 'Editar Impresora y Caja'),
('delete', 'caja_impresora_borrar.tpl', 'caja_impresora_borrar.php', 209, 'Borrar Impresora y Caja'),
('add', 'agregar_cuentas_contables.tpl', 'agregar_cuentas_contables.php', 219, 'Agregar Cuentas Bancarias'),
('edit', 'editar_cuentas_contables.tpl', 'editar_cuentas_contables.php', 219, 'Editar Las Cuentas Bancarias'),
('delete', 'borrar_cuentas_contables.tpl', 'borrar_cuentas_contables.php', 219, 'Borrar Las Cuentas Bancarias'),
('add', 'agre_cierre_cajero.tpl', 'agre_cierre_cajero.php', 210, 'Agregar un cierre de cajero'),
('add', 'file_upload_productos.tpl', 'file_upload_productos.php', 218, 'Actualizar Productos y Precios'),
('add', 'file_upload_estabilizacion.tpl', 'file_upload_estabilizacion.php', 221, 'Estabilizaci&oacute;n Productos'),
('add', 'retiro_efectivo_agregar.tpl', 'retiro_efectivo_agregar.php', 223, 'Editar un retiro de efectivo'),
('edit', 'retiro_efectivo_editar.tpl', 'retiro_efectivo_editar.php', 223, 'Agregar un retiro de efectivo'),
('edit', 'operaciones_apertura_editar.tpl', 'operaciones_apertura_editar.php', 220, 'Editar Operaci&oacute;n Apertura'),
('add', 'calidad_almacen_add.tpl', 'calidad_almacen_add.php', 226, 'Agregar Nuevos Entradas De Productos'),
('edit', 'calidad_almacen_edit.tpl', 'calidad_almacen_edit.php', 226, 'Editar Entrada De Calidad'),
('delete', 'calidad_almacen_delete.tpl', 'calidad_almacen_delete.php', 225, 'Borrar Registros'),
('add', 'calidad_almacen_retiro_add.tpl', 'calidad_almacen_retiro_add.php', 227, 'Retirar productos de almacen que esten dañados'),
('add', 'tipo_uso_agregar.tpl', 'tipo_uso_agregar.php', 229, 'Agregar Tipo Uso'),
('edit', 'tipo_uso_editar.tpl', 'tipo_uso_editar.php', 229, 'Modificar Tipo Uso'),
('add', 'tipo_visita_agregar.tpl', 'tipo_visita_agregar.php', 230, 'Agregar Tipo Visita'),
('delete', 'tipo_uso_borrar.tpl', 'tipo_uso_borrar.php', 229, 'Borrar Tipo Uso'),
('edit', 'tipo_visita_editar.tpl', 'tipo_visita_editar.php', 230, 'Modificar Tipo visita'),
('delete', 'tipo_visita_borrar.tpl', 'tipo_visita_borrar.php', 230, 'Borrar Tipo Visita'),
('add', 'calidad_visita_add.tpl', 'calidad_visita_add.php', 228, 'Agregar Visita'),
('add', 'tomas_fisicas_add.tpl', 'tomas_fisicas_add.php', 232, 'Agregar Toma F&iacute;sica'),
('add', 'acta_inventario_nuevo.tpl', 'acta_inventario_nuevo.php', 235, 'Agregando Acta de Inventario'),
('newfactura_rapida', 'factura_rapida_nueva.tpl', 'factura_rapida_nueva.php', 58, 'Nuevo Pedido'),
('edit', 'salida_almacen_nuevo_pedido.tpl', 'salida_almacen_nuevo_pedido.php', 241, ''),
('add', 'factura_rapida_nueva_pedido.tpl', 'factura_rapida_nueva_pedido.php', 238, 'Nuevo Pedido'),
('add', 'rol_add.tpl', 'rol_add.php', 242, 'Agregar Rol'),
('edit', 'rol_edit.tpl', 'rol_edit.php', 242, 'Editar Rol'),
('ajuste', 'tomas_fisicas_ajuste.tpl', 'tomas_fisicas_ajuste.php', 232, 'Ajuste de Inventario según Tomas Físicas'),
('add', 'cesta_clap_add.tpl', 'cesta_clap_add.php', 247, 'Crear Cesta Clap'),
('add', 'billetes_add.tpl', 'billetes_add.php', 248, 'Agregar Nuevo Billete'),
('edit', 'billetes_update.tpl', 'billetes_update.php', 248, 'Editar Billete'),
('add', 'cierre_pos_add.tpl', 'cierre_pos_add.php', 249, 'Agregar Cierre POS'),
('tipodespacho', 'salida_almacen_update_pedido.tpl', 'salida_almacen_update_pedido.php', 241, 'Agregar Tipo Despacho'),
('add', 'transformacion_add.tpl', 'transformacion_add.php', 252, 'Agregar Nueva Producci&oacute;n'),
('correccion', 'correccion_deposito_crear.tpl', 'correccion_deposito_crear.php', 254, 'Correcci&oacute;n Cataporte'),
('add', 'cataporte_ticket_add.tpl', 'cataporte_ticket_add.php', 255, 'Agregar un nuevo cataporte'),
('add', 'tipo_cuenta_presupuesto_add.tpl', 'tipo_cuenta_presupuesto_add.php', 259, 'Agregar tipo cuenta presupuesto'),
('edit', 'tipo_cuenta_presupuesto_edit.tpl', 'tipo_cuenta_presupuesto_edit.php', 259, 'Editar tipo cuenta presupuesto'),
('delete', 'tipo_cuenta_presupuesto_delete.tpl', 'tipo_cuenta_presupuesto_delete.php', 259, 'Borrar Cuenta Tipo Presupuesto'),
('add', 'cuenta_presupuesto_add.tpl', 'cuenta_presupuesto_add.php', 260, 'Agregar Cuenta Presupuestaría'),
('edit', 'cuenta_presupuesto_edit.tpl', 'cuenta_presupuesto_edit.php', 260, 'Editar Cuenta Presupuestaría'),
('delete', 'cuenta_presupuesto_delete.tpl', 'cuenta_presupuesto_delete.php', 260, 'Borrar Cuenta Presupuestaría'),
('add', 'cataporte_tarjeta_add.tpl', 'cataporte_tarjeta_add.php', 261, 'Cierre Tarjeta'),
('add', 'cataporte_deposito_add.tpl', 'cataporte_deposito_add.php', 263, 'Cierre Deposito'),
('add', 'cataporte_cheque_add.tpl', 'cataporte_cheque_add.php', 262, 'Cierre Cheque'),
('add', 'cataporte_credito_add.tpl', 'cataporte_credito_add.php', 264, 'Cierre Credito'),
('edit', 'usuarios_pos_editar.tpl', 'usuario_pos_editar.php', 269, 'editar usuario pos'),
('edit', 'producto_editar.tpl', 'producto_editar.php', 61, 'Editar Producto'),
('add', 'producto_nuevo.tpl', 'producto_nuevo.php', 61, 'producto Nuevo'),
('add', 'reconversion_add.tpl', 'reconversion_add.php', 271, 'Agregar a Reconversi&oacute;n');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `subseccion`
--
ALTER TABLE `subseccion`
  ADD KEY `FK_subseccion_1` (`cod_seccion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
