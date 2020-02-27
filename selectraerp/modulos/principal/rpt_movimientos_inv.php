<?php
ob_start();
include('config_reportes.php');
include('fpdf.php');
include('../../menu_sistemas/lib/common.php');
ob_end_clean();    header("Content-Encoding: None", true);
class PDF extends FPDF {

    public $title;
    public $conexion;
    public $datosgenerales;
    public $array_factura;

    function Header() {

        $fecha_ini = new DateTime(@$_GET["fecha"]); # PHP 5 >= 5.2.0;
        $fecha_fin = new DateTime(@$_GET["fecha2"]);

        $fecha_ini = $fecha_ini->format("d-m-Y");
        $fecha_fin = $fecha_fin->format("d-m-Y");

        $this->Image($this->datosgenerales[0]["img_der"] ? "../../includes/imagenes/" . $this->datosgenerales[0]["img_der"] : "../../includes/imagenes/" . $this->datosgenerales[0]["img_izq"], 10, 8, 50, 20);
        $this->SetY(15);
        $this->SetLeftMargin(10);
        $this->SetFont('Arial', 'B', 8);
        #$this->SetFillColor(10, 50, 100);
        $this->Cell(0, 0, utf8_decode($this->datosgenerales[0]["nombre_empresa"]), 0, 0, 'C');
        $this->Ln(3);
        $this->Cell(0, 0, $this->datosgenerales[0]["id_fiscal"] . ": " . $this->datosgenerales[0]["rif"] . " - Telefonos: " . $this->datosgenerales[0]["telefonos"], 0, 0, 'C');
        $this->Ln(3);
        $this->Cell(0, 0, utf8_decode($this->datosgenerales[0]["direccion"]), 0, 0, 'C');
        $this->Ln(3);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 0, utf8_decode("Fecha Emisión: ") . date("d-m-Y"), 0, 0, 'R');
        $this->SetFont('Arial', 'B', 8);
        $this->Ln(10);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 0, utf8_decode("REPORTE DE MOVIMIENTOS"), 0, 0, 'C');
        $this->SetFont('Arial', '', 12);
        $this->Ln(5);
        $this->Cell(0, 0, @$_GET["fecha"] != @$_GET["fecha2"] ? "Desde {$fecha_ini} Hasta {$fecha_fin}" : $fecha_ini, 0, 0, 'C');
        $this->Ln(10);

        // if (isset($_GET["cod_cliente"]) && $_GET["cod_cliente"] != "") {
        //     $this->SetFont('Arial', 'B', 10);
        //     $this->Cell(20, 0, utf8_decode("CLIENTE: "), 0, 0, 'L');
        //     $this->SetFont('Arial', '', 10);
        //     $cliente = utf8_decode(strtoupper($this->array_factura[0]["nombre"]));
        //     $this->Cell(150, 0, ($this->array_factura[0]["tipo"] == "Contador" ? $cliente . " - " . $this->array_factura[0]["cod_cliente"] : $cliente), 0, 0, 'L');
        //     if (@$_GET["cod_producto"]) {
        //         $this->Ln(5);
        //     }
        // }
        // if (isset($_GET["cod_producto"])) {
        //     $this->SetFont('Arial', 'B', 10);
        //     $this->Cell(25, 0, utf8_decode("PRODUCTO: "), 0, 0, 'L');
        //     $this->SetFont('Arial', '', 10);
        //     $this->Cell(165, 0, utf8_decode(strtoupper($this->array_factura[0]["item_descripcion"])), 0, 0, 'L');
        // }
        $this->Ln(10);
        $this->SetFont('Arial', 'B', 8);
        $this->SetLineWidth(0.1);
        $this->SetWidths(array(20,30, 80, 15, 18, 25, 25,25,25));
        $this->SetAligns(array("C","C", "C", "C", "C", "C", "C"));
        $this->Row(array('Fecha',utf8_decode('Código'), utf8_decode('Descripción'), 'Unid.','Tipo', 'Almacen Ent', 'Almacen Sal', 'Ubicacion Ent','Ubicacion Sal'), 1);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function dwawCell($title, $data) {
        $width = 8;
        $this->SetFont('Arial', 'B', 12);
        $y = $this->getY() * 20;
        $x = $this->getX();
        $this->SetFillColor(206, 230, 100);
        $this->MultiCell(175, 8, $title, 0, 1, 'L', 0);
        $this->SetY($y);
        $this->SetFont('Arial', '', 12);
        $this->SetFillColor(206, 230, 172);
        $w = $this->GetStringWidth($title) + 3;
        $this->SetX($x + $w);
        $this->SetFillColor(206, 230, 172);
        $this->MultiCell(175, 8, $data, 0, 1, 'J', 0);
    }

    function ChapterBody() {

        $i = $iva = $total_iva = $subtotal = $total_venta = 0;
        $item_descripcion = array();
        $item_cod = array();
        $item_unidades = array();
        $item_iva = array();
        $item_subtotales = array();
        $item_totales = array();
      
          

            // foreach ($item_descripcion as $id => $descripcion) {
            //     $this->SetFont('Arial', '', 10);
            //     $this->SetLineWidth(0.1);
            //     $this->SetWidths(array(20, 95, 15, 20, 20, 20));
            //     $this->SetAligns(array("C", "L", "R", "R", "R", "R"));
            //     $this->Row(array(
            //         $item_cod[$id],
            //         utf8_decode($descripcion),
            //         $item_unidades[$id],
            //         number_format($item_subtotales[$id], 2, ',', '.'),
            //         number_format($item_iva[$id], 2, ',', '.'),
            //         #number_format($item_totales[$id], 2, ',', '.')), 1);
            //         number_format($item_subtotales[$id] + $item_iva[$id], 2, ',', '.')), 1);
            //     $total_iva += $item_iva[$id];
            //     $subtotal += $item_subtotales[$id];
            //     #$total_venta += $item_totales[$id];
            // }
        
            // aqui se imprime los datos en la tabla
          $this->Ln(5);
        foreach ($this->array_factura as $value) {
           if($value["tipo_movimiento_almacen"]==2){
            $tipo="Venta";
           }
           if($value["tipo_movimiento_almacen"]==3){
            $tipo="Cargo";
           }
           if($value["tipo_movimiento_almacen"]==5){
            $tipo="Traslado";
           }
           if($value["tipo_movimiento_almacen"]==4){
            $tipo="Salida";
           }
           if($value["tipo_movimiento_almacen"]==11){
            $tipo="Trans. Entrada";
           }
           if($value["tipo_movimiento_almacen"]==12){
            $tipo="Trans. Salida";
           }
            $this->SetFont('Arial', '', 8);
                $this->SetLineWidth(0.1);
                $this->SetWidths(array(20,30, 80, 15, 18, 25, 25,25,25));
                $this->SetAligns(array("C","C","c","C","C","c","C"));
                $this->Row(array(
                    $value["fecha"],
                    $value["codigo_barras"],
                    utf8_decode($value["descripcion1"]),
                    $value["cantidad"],
                    $tipo,
                    ucfirst(strtolower($value["almacen_entrada"])),
                    ucfirst(strtolower($value["almacen_salida"])),
                    ucfirst(strtolower($value["ubicacion_entrada"])),
                    ucfirst(strtolower($value["ubicacion_salida"]))
                    
                   ));
        }
            // while ($this->array_factura[$i]) {
            //     // $iva = $this->array_factura[$i]["totalconiva"] > 0 ? $this->array_factura[$i]["totalconiva"] - $this->array_factura[$i]["totalsiniva"] : $this->array_factura[$i]["totalconiva"];
            //     $this->SetFont('Arial', '', 10);
            //     $this->SetLineWidth(0.1);
            //     $this->SetWidths(array(20, 95, 15, 20, 20, 20));
            //     $this->SetAligns(array("C", "L", "R", "R", "R", "R"));
            //     $this->Row(array(
            //         $this->array_factura[$i]["cod_item"],
            //         utf8_decode($this->array_factura[$i]["descripcion1"]),
            //         $this->array_factura[$i]["cantidad"],
            //        $this->array_factura[$i]["almacen_entrada"],
            //        $this->array_factura[$i]["almacen_salida"],
            //        $this->array_factura[$i]["ubicacion_entrada"]));
            //         #number_format($item_totales[$id], 2, ',', '.')), 1);
            //         // number_format($this->array_factura[$i]["totalsiniva"] + $iva, 2, ',', '.')), 1);
            //     // $total_iva += $iva;
            //     // $subtotal += $this->array_factura[$i]["totalsiniva"];
            //     // $i++;
            // }
        
        #$total_venta = number_format($total_venta, 2, ',', '.');
        // $total_venta = number_format($total_iva + $subtotal, 2, ',', '.');
        // $total_iva = number_format($total_iva, 2, ',', '.');
        // $subtotal = number_format($subtotal, 2, ',', '.');

        // $this->Ln(1);
        // $this->SetFont('Arial', 'B', 10);
        // $this->SetWidths(array(130, 20, 20, 20));
        // $this->SetAligns(array("C", "R", "R", "R"));
        // $this->Row(array("T O T A L E S", $subtotal, $total_iva, $total_venta), 1);

        // unset($i, $subtotal, $total_iva, $iva, $total_venta, $item_descripcion, $item_cod, $item_unidades, $item_subtotales, $item_iva, $item_totales);
        // unset($this->array_factura, $this->datosgenerales);
    }

    function ChapterTitle($num, $label) {
        $this->SetFont('Arial', '', 10);
        $this->SetFillColor(200, 220, 255);
        $this->Cell(0, 6, $label, 0, 1, 'L', 1);
        $this->Ln(8);
    }

    function SetTitle($title, $isUTF8 = false) {
        $this->title = $title;
    }

    function PrintChapter() {
        $this->AddPage();
        $this->ChapterBody();
    }

    function DatosGenerales($array) {
        $this->datosgenerales = $array;
    }

    function ArrayFactura($array) {
        $this->array_factura = $array;
    }

}

$inicio = @$_GET["fecha"];
$final = @$_GET["fecha2"];
$ordenar = @$_GET["ordenado_por"];
$producto = @$_GET["filtro_codigo"];
$cliente = @$_GET["cod_cliente"];
$tip_mov = @$_GET["tip_mov"];

$comunes = new ConexionComun();

$array_parametros_generales = $comunes->ObtenerFilasBySqlSelect("SELECT * FROM parametros, parametros_generales");

/* $array_factura = $comunes->ObtenerFilasBySqlSelect("
  SELECT i.id_item, i.cod_item, i.descripcion1, fd.*
  FROM factura f
  INNER JOIN factura_detalle fd ON fd.id_factura = f.id_factura
  INNER JOIN item i ON i.id_item = fd.id_item
  WHERE f.cod_estatus = 2 AND f.fechaFactura >= '{$inicio}' AND f.fechaFactura <= '{$final}'
  ORDER BY {$filtro};"); */
// $array_factura = $comunes->ObtenerFilasBySqlSelect($sql = "
//         SELECT f.id_factura, i.id_item, i.cod_item, i.descripcion1 AS item_descripcion,
//         fd._item_descripcion AS descripcion, fd._item_cantidad AS totalunidades, fd._item_totalsiniva AS totalsiniva, fd.id_item,
//         fd._item_totalconiva AS totalconiva" . ($cliente != "" ? ", c.nombre, c.cod_cliente, IF (c.cod_tipo_cliente = 1, 'Contador', 'Otro') AS tipo" : "") . "
//         FROM factura f
//         INNER JOIN factura_detalle fd ON fd.id_factura = f.id_factura
//         INNER JOIN item i ON i.id_item = fd.id_item " .
//         ($cliente != "" ? "INNER JOIN clientes c ON c.id_cliente = f.id_cliente" : " ") . "
//         WHERE f.cod_estatus = 2 AND " . ($inicio != $final ? "f.fechaFactura >= '{$inicio}' AND f.fechaFactura <= '{$final}'" : "f.fechaFactura = '{$inicio}' ") .
//         ($cliente != "" ? " AND f.id_cliente = {$cliente} " : "") .
//         ($producto != "" ? " AND fd.id_item = {$producto} " : "") . "
//         ORDER BY {$ordenar};");
#echo $sql;exit;

// $array_factura = $comunes->ObtenerFilasBySqlSelect($sql = "SELECT f.id_factura, i.id_item, i.cod_item, i.descripcion1 AS item_descripcion,
//         fd._item_descripcion AS descripcion, fd._item_cantidad AS totalunidades, fd._item_totalsiniva AS totalsiniva, fd.id_item,
//         fd._item_totalconiva AS totalconiva
//         FROM factura f
//         INNER JOIN factura_detalle fd ON fd.id_factura = f.id_factura
//         INNER JOIN item i ON i.id_item = fd.id_item
//         WHERE f.cod_estatus = 2 AND f.fechaFactura >= '{$inicio}' AND f.fechaFactura <= '{$final}' ");

// aqui se coloca la sql 
$filtro='';
if($tip_mov!=0){
$filtro=" and k.tipo_movimiento_almacen=".$tip_mov."";
}

if($producto!=0){
$filtro.=" and ite.codigo_barras='".$producto."'";
}
$sql = "SELECT k.tipo_movimiento_almacen,  ite.descripcion1, ite.codigo_barras, kad.cantidad AS cantidad, alm.descripcion AS almacen_entrada, a.descripcion AS almacen_salida, ubi.descripcion AS ubicacion_entrada, u.descripcion AS ubicacion_salida, k.fecha
FROM kardex_almacen_detalle AS kad
LEFT JOIN almacen AS alm ON kad.id_almacen_entrada = alm.cod_almacen
LEFT JOIN almacen AS a ON kad.id_almacen_salida = a.cod_almacen
LEFT JOIN ubicacion AS ubi ON kad.id_ubi_entrada = ubi.id
LEFT JOIN ubicacion AS u ON kad.id_ubi_salida = u.id
LEFT JOIN kardex_almacen AS k ON k.id_transaccion = kad.id_transaccion
LEFT JOIN item AS ite ON kad.id_item = ite.id_item
WHERE 
 k.fecha BETWEEN '{$inicio}' AND '{$final}' 
".$filtro." ORDER BY  k.fecha";

//
//echo $sql; exit();
$array_factura = $comunes->ObtenerFilasBySqlSelect($sql);
$pdf = new PDF('L', 'mm', 'A4');

$pdf->DatosGenerales($array_parametros_generales);
$pdf->ArrayFactura($array_factura);

$pdf->SetTitle('Movimiento inventario');
$pdf->AliasNbPages();
$pdf->PrintChapter();
$pdf->SetDisplayMode('default');
ob_end_clean();
$pdf->Output();
ob_end_flush();
?>
