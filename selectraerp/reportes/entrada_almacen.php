<?php
ob_start();
include('config_reportes.php');
include('fpdf.php');
include('qrphpgenerator/BarcodeBundle/Utils/QrCode.php');

use CodeItNow\BarcodeBundle\Utils\QrCode;

ob_end_clean();
header("Content-Encoding: None", true);
class PDF extends FPDF
{
    public $title;
    public $conexion;
    public $datosgenerales;
    public $array_compra;
    function Header()
    {

        $width = 10;
        $pic = $this->getImage($this->array_movimiento[0], $this->array_movimiento2[0]);
        if ($pic !== false) $this->Image($pic[0], 240, 25, 30, 30, $pic[1]);


        $this->SetY(5);
        $this->SetFont('Arial', '', 6);
        //$this->SetFillColor(239,239,239);

        $this->Ln(3);

        $this->SetFont('Arial', '', 8);
        $this->SetX(160);
        $this->Cell(0, 0, "Cod. Movimiento: ", 0, 0, 'L');
        if ($this->array_movimiento[0]["tipo_movimiento_almacen"] == 3) {
            $this->Cell(0, 0, "E-" . $this->datosgenerales[0]["codigo_siga"] . "-" . $this->array_movimiento[0]["id_transaccion"], 0, 0, 'R');
        }
        if ($this->array_movimiento[0]["tipo_movimiento_almacen"] == 2 || $this->array_movimiento[0]["tipo_movimiento_almacen"] == 4) {
            $this->Cell(0, 0, "S-" . $this->datosgenerales[0]["codigo_siga"] . "-" . $this->array_movimiento[0]["id_transaccion"], 0, 0, 'R');
        }

        if ($this->array_movimiento[0]["tipo_movimiento_almacen"] == 8) {
            $this->Cell(0, 0, "S-" . $this->datosgenerales[0]["codigo_siga"] . "-" . $this->array_movimiento[0]["id_transaccion"], 0, 0, 'R');
        }

        $this->Ln(10);
        $this->SetX(160);
        $this->AddFont('New', '', 'free3of9.php');
        $this->SetFont("New", '', 35);

        if ($this->array_movimiento[0]["tipo_movimiento_almacen"] == 3) {
            $this->Cell(0, 0, "E-" . $this->datosgenerales[0]["codigo_siga"] . "-" . $this->array_movimiento[0]["id_transaccion"], 0, 0, 'R');
        }
        if ($this->array_movimiento[0]["tipo_movimiento_almacen"] == 2 || $this->array_movimiento[0]["tipo_movimiento_almacen"] == 4) {
            $this->Cell(0, 0, "S-" . $this->datosgenerales[0]["codigo_siga"] . "-" . $this->array_movimiento[0]["id_transaccion"], 0, 0, 'R');
        }
        if ($this->array_movimiento[0]["tipo_movimiento_almacen"] == 8) {
            $this->Cell(0, 0, "S-" . $this->datosgenerales[0]["codigo_siga"] . "-" . $this->array_movimiento[0]["id_transaccion"], 0, 0, 'R');
        }
        $this->SetFont("Arial", '', 9);
        $this->Ln(3);

        $this->SetX(14);
        $this->SetFont('Arial', '', 6);
        $this->Cell(0, 0, utf8_decode($this->datosgenerales[0]["nombre_empresa"]), 0, 0, 'L');
        $this->Ln(3);

        $this->SetX(14);
        $this->Cell(0, 0, utf8_decode($this->datosgenerales[0]["direccion"]), 0, 0, 'L');
        $this->Ln(3);

        $this->SetX(14);
        $this->Cell(0, 0, $this->datosgenerales[0]["id_fiscal2"] . ": " . $this->datosgenerales[0]["nit"] . " - Telefonos: " . $this->datosgenerales[0]["telefonos"], 0, 0, 'L');
        $this->Ln(3);

        $this->SetX(14);
        $this->SetFont('Arial', 'B', 12);
        //3 es igual a entrada
        if ($this->array_movimiento[0]["tipo_movimiento_almacen"] == 3) {
            $this->Cell(0, 0, "ENTRADA DE ALMACEN", 0, 0, 'C');
        }
        if ($this->array_movimiento[0]["tipo_movimiento_almacen"] == 8) {
            $this->Cell(0, 0, "GUIA DE DESPACHO (PEDIDO)", 0, 0, 'C');
        }
        //2 4 es igual a salida
        if ($this->array_movimiento[0]["tipo_movimiento_almacen"] == 2 || $this->array_movimiento[0]["tipo_movimiento_almacen"] == 4) {
            $this->Cell(0, 0, "GUIA DE DESPACHO (SALIDA)", 0, 0, 'C');
        }
        //5  es igual a traslado
        if ($this->array_movimiento[0]["tipo_movimiento_almacen"] == 5) {
            $this->Cell(0, 0, "REPORTE DETALLE DE TRASLADO", 0, 0, 'C');
        }
        $this->Ln(10);

        //agregado 21/02/2014 el almacen la ubicacion y autorizado por 
        $this->SetX(14);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 0, "Fecha :", 0, 0, 'L');

        $this->SetX(25);
        $this->Cell(0, 0, $this->array_movimiento[0]["fecha_creacion"], 0, 0, 'L');

        /*
        $this->SetX(80);
        $this->Cell(0,0, "Elaborado por :",0,0,'L');

        $this->SetX(102);
        $this->Cell(0,0,utf8_decode($this->array_movimiento[0]["autorizado_por"]) ,0,0,'L');
        */

        if ($this->array_movimiento[0]["id_cliente"] != 0) {

            $this->SetFont('Arial', '', 8);
            $this->SetX(55);
            $this->Cell(0, 0, utf8_decode("Cliente a Despachar: " . $this->array_movimiento[0]["nombre_cliente"] . "         Rif: " . $this->array_movimiento[0]["rif_cliente"] . "          Direccion: " . $this->array_movimiento[0]["direccion_cliente"]), 0, 0, 'L');
            $this->SetFont('Arial', '', 8);
            $this->Ln(5);
        }

        $this->Ln(5);
        if ($this->array_movimiento[0]["tipo_movimiento_almacen"] == 3 || $this->array_movimiento[0]["tipo_movimiento_almacen"] == 5) {
            $this->SetX(14);
            $this->Cell(0, 0, "Almacen entrada: " . utf8_decode($this->array_movimiento[0]["almacen"] . " " . $this->datosgenerales[0]["nombre_empresa"] . " " . $this->datosgenerales[0]["codigo_siga"]) . "            Ubicacion entrada :" . utf8_decode($this->array_movimiento[0]["ubicacion"]) . "         Almacen Procedencia:" . utf8_decode($this->array_movimiento[0]["almacen_procedencia"] . "-" . $this->array_movimiento[0]["nombre_punto_rep2"]), 0, 0, 'L');
            $this->SetFont('Arial', '', 8);
            $this->Ln(5);
        }
        if ($this->array_movimiento[0]["tipo_movimiento_almacen"] == 3 || $this->array_movimiento[0]["tipo_movimiento_almacen"] == 4 || $this->array_movimiento[0]["tipo_movimiento_almacen"] == 8) {
            $this->SetX(14);
            $this->Cell(0, 0, "Empresa Transporte :" . utf8_decode($this->array_movimiento[0]["empresa_transporte"]) . "            Conductor :" . utf8_decode($this->array_movimiento[0]["nombre_conductor"]) . "           Cedula Conductor:" . $this->array_movimiento[0]["cedula_conductor"] . "         Placa :" . $this->array_movimiento[0]["placa"], 0, 0, 'L');

            $this->Ln(5);
            $this->SetX(14);
            if ($this->array_movimiento[0]["tipo_movimiento_almacen"] == 3) {

                if ($this->array_movimiento[0]["nombre_proveedor"] != '') {
                    $proveedor = "            Proveedor :" . $this->array_movimiento[0]["rif"] . " - " . $this->array_movimiento[0]["nombre_proveedor"];
                }
                $this->Cell(0, 0, "Nro Guia SUNAGRO :" . utf8_decode($this->array_movimiento[0]["guia_sunagro"]) . $proveedor . "", 0, 0, 'L');
            }

            if ($this->array_movimiento[0]["tipo_movimiento_almacen"] == 4 || $this->array_movimiento[0]["tipo_movimiento_almacen"] == 8) {
                $this->SetX(14);
                $this->Cell(0, 0, "Marca :" . utf8_decode($this->array_movimiento[0]["marca_vehiculo"]) . "          Color:" . utf8_decode($this->array_movimiento[0]["color"]) . "          Prescinto" . utf8_decode($this->array_movimiento[0]["prescintos"]) . "           Jornada:" . utf8_decode($this->array_movimiento[0]["id_jornada"]), 0, 0, 'L');
            }
            $this->Ln(5);
        }

        if ($this->array_movimiento[0]["tipo_movimiento_almacen"] == 5 || $this->array_movimiento[0]["tipo_movimiento_almacen"] == 2 || $this->array_movimiento[0]["tipo_movimiento_almacen"] == 4) {
            $this->SetX(14);
            $this->Cell(0, 0, "Almacen Salida :" . utf8_decode($this->array_movimiento2[0]["almacen"]) . "           Ubicacion Salida :" . utf8_decode($this->array_movimiento2[0]["ubicacion"]) . "          Almacen Destino:" . utf8_decode($this->array_movimiento[0]["almacen_destino"]) . " - " . utf8_decode($this->array_movimiento[0]["nombre_punto_rep1"]) . "", 0, 0, 'L');
            $this->Ln(5);
        }


        if ($this->array_movimiento[0]["id_documento"] != '') {
            $this->SetX(14);
            $this->Cell(0, 0, "Nota de Entrega / Orden de Despacho / Factura :" . $this->array_movimiento[0]["id_documento"], 0, 0, 'L');
            $this->Ln(5);
        }

        $this->SetX(14);
        $this->Cell(0, 0, "Observacion :" . utf8_decode($this->array_movimiento[0]["observacion_cabecera"]), 0, 0, 'L');

        $this->Ln(5);
        if ($this->array_movimiento[0]["tipo_movimiento_almacen"] == 8) {
            $this->SetX(14);
            $this->Cell(0, 0, "Tipo Despacho:" . utf8_decode($this->array_movimiento[0]["tipo_despacho"]), 0, 0, 'L');
            $this->Ln(3);
        }

        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $this->SetLeftMargin(50);
        $width = 5;
        $this->SetX(14);
        $this->SetFont('Arial', '', 7);
        $this->SetFillColor(10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10);
        $this->Cell(20, $width, 'Codigo', 1, 0, "C", 0);
        $this->Cell(90, $width, utf8_decode('Descripción'), 1, 0, "C", 0);
        $this->Cell(18, $width, utf8_decode('Cantidad'), 1, 0, "C", 0);
        $this->Cell(18, $width, utf8_decode('Cantidad Esp'), 1, 0, "C", 0);
        $this->Cell(18, $width, utf8_decode('Unid. Bultos'), 1, 0, "C", 0);
        $this->Cell(18, $width, utf8_decode('Bultos'), 1, 0, "C", 0);
        $this->Cell(18, $width, utf8_decode('Unid. Sueltas'), 1, 0, "C", 0);
        $this->Cell(18, $width, utf8_decode('Toneladas'), 1, 0, "C", 0);
        $this->Cell(18, $width, utf8_decode('Precio C/Iva'), 1, 0, "C", 0);
        $this->Cell(18, $width, utf8_decode('Precio Total'), 1, 0, "C", 0);
        $this->Ln(5);
    }

    function getImage($data, $data2)
    {

        $Text = "Fecha: {$data['fecha_creacion']} \n";
        if ($data['id_cliente'] != 0) {
            $Text .= "Cliente a despachar: {$data['nombre_cliente']} Rif: {$data['rif_cliente']}";
        }
        if (in_array($data["tipo_movimiento_almacen"], [3, 5])) {
            $Text .= "Almacen entrada: {$data['almacen']} {$data['nombre_empresa']} {$this->datosgenerales[0]['codigo_siga']} \n";
            $Text .= "Ubicacion entrada: {$data['ubicacion']} \n";
            $Text .= "Almacen procedencia: {$data['almacen_procedencia']} {$data['nombre_punto_rep2']} \n";
        }
        if (in_array($data["tipo_movimiento_almacen"], [3, 4, 8])) {
            $Text .= "Empresa transporte: {$data['empresa_transporte']} \n";
            $Text .= "Conductor: {$data['nombre_conductor']} \n";
            $Text .= "Cedula conductor: {$data['cedula_conductor']} \n";
            $Text .= "Placa: {$data['placa']} \n";
        }
        if ($data["tipo_movimiento_almacen"] == 3) {
            $proveedor =  ($data["nombre_proveedor"] != '') ? "Proveedor : {$data['rif']} {$data['nombre_proveedor']}" : "";
            $Text .= "Nro Guia SUNAGRO: {$data['guia_sunagro']} {$proveedor}\n";
        }

        if (in_array($data["tipo_movimiento_almacen"], [4, 8])) {
            $Text .= "Marca: {$data['marca_vehiculo']} \n";
            $Text .= "Color: {$data['color']} \n";
            $Text .= "Prescinto: {$data['prescintos']} \n";
            $Text .= "Jornada: {$data['id_jornada']} \n";
        }

        if (in_array($data["tipo_movimiento_almacen"], [2, 4, 5])) {
            $Text .= "Almacen salida: {$data2['almacen']} \n";
            $Text .= "Ubicacion salida: {$data2['ubicacion']} \n";
            $Text .= "Almacen destino: {$data['almacen_destino']} {$data['nombre_punto_rep1']}\n";
        }

        if ($data['id_documento'] != '') {
            $Text .= "Nota de Entrega / Orden de Despacho / Factura : {$data['id_documento']} \n";
        }

        if ($data['tipo_movimiento_almacen'] == 8) {
            $Text .= "Tipo Despacho: {$data['tipo_despacho']} \n";
        }

        $qrCode = new QrCode();
        $qrCode
            ->setText($Text)
            ->setSize(300)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
            ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
            ->setLabel('Información')
            ->setLabelFontSize(16)
            ->setImageType(QrCode::IMAGE_TYPE_PNG);
        $String64 = "data:{$qrCode->getContentType()};base64,{$qrCode->generate()}";
        $img = explode(',', $String64, 2);
        $pic = 'data://text/plain;base64,' . $img[1];
        $type = explode("/", explode(':', substr($String64, 0, strpos($String64, ';')))[1])[1]; // get the image type
        if ($type == "png" || $type == "jpeg" || $type == "gif") return array($pic, $type);
        return false;
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 10);

        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function dwawCell($title, $data)
    {
        $width = 8;
        $this->SetFont('Arial', 'B', 12);
        $y =  $this->getY() * 20;
        $x =  $this->getX();
        $this->SetFillColor(10, 10, 10);
        $this->MultiCell(175, 8, $title, 0, 1, 'L', 0);
        $this->SetY($y);
        $this->SetFont('Arial', '', 12);
        $this->SetFillColor(10, 10, 10);
        $w = $this->GetStringWidth($title) + 3;
        $this->SetX($x + $w);
        $this->SetFillColor(10, 10, 10);
        $this->MultiCell(175, 8, $data, 0, 1, 'J', 0);
    }


    function ChapterBody()
    {



        //$conn = new rp_Connect();
        //$conn->SQL("select * from esquema.almacen_ubicacion");




        //aqui metemos los parametros del contenido
        $this->SetWidths(array(20, 90, 18, 18, 18, 18, 18, 18, 18, 18));
        $this->SetAligns(array("C", "J", "C", "C", "C", "C", "C", "C", "C", "C"));
        $this->SetFillColor(232, 232, 232, 232, 232, 232, 232, 232, 232, 232);
        // $cantidaditems = $this->array_movimiento[0]["numero_item"];

        $subtotal = 0;
        // for($i=0;$i<$cantidaditems;$i++) {
        //     $this->SetLeftMargin(30);
        //     $width = 5;
        //     $this->SetX(14);
        //     $this->SetFont('Arial','',7);

        //     $this->Row(
        //             array(  $this->array_movimiento[$i]["cod_item"],
        //             $this->array_movimiento[$i]["descripcion1"],
        //             $this->array_movimiento[$i]["cantidad_item"]),1);

        // }
        $total_bolivares = 0;
        $total_ton = 0;
        foreach ($this->array_movimiento as $key => $value) {

            if ($value["precio_hist"] == 0) {

                $value["precio_hist"] = $value["coniva1"];
            }

            $precio_total = $value["precio_hist"];
            if ($value["unidadxpeso"] == 1 || $value["unidadxpeso"] == 3) {
                $transf = 1000;
            } elseif ($value["unidadxpeso"] == 2 || $value["unidadxpeso"] == 4) {
                $transf = 1;
            } else {
                $transf = 0;
            }
            $gramos_prod = $value["pesoxunidad"] * $transf;

            if ($value["cantidad_bulto"] == 0) {
                $bultos = 0;
            } elseif ($value["cantidad_item"] < $value["cantidad_bulto"]) {
                $bultos = 0;
            } else {
                $bultos = floor($value["cantidad_item"] / $value["cantidad_bulto"]);
            }

            $unidades_sueltas = $value["cantidad_item"] - number_format($bultos, 0, '.', '') * $value["cantidad_bulto"];
            $unidades_sueltas;
            $this->SetLeftMargin(30);
            $width = 5;
            $this->SetX(14);
            $this->SetFont('Arial', '', 7);
            $this->Row(
                array(
                    $value["codigo_barras"],
                    $value["descripcion1"],
                    $value["cantidad_item"],
                    $value["c_esperada"],
                    $value["cantidad_bulto"],
                    number_format($bultos, 0, '.', ' '),
                    number_format($unidades_sueltas, 2, '.', ' '),
                    number_format(($gramos_prod * $value["cantidad_item"]) / 1000000, 2, '.', ' '),
                    number_format($precio_total, 2, '.', ' '),
                    number_format($precio_total * $value["cantidad_item"], 2, '.', ' ')
                ),
                1
            );
            $this->SetX(14);
            if ($value["cantidad_item"] != $value["c_esperada"] && $this->array_movimiento[0]["tipo_movimiento_almacen"] == 3) {
                $this->Cell(110, 5, 'Observacion : ' . $value["observacion_dif"], 1, 1, 'L');
            }
            $total_bolivares = $total_bolivares + $precio_total * $value["cantidad_item"];
            $total_ton = $total_ton + ($gramos_prod * $value["cantidad_item"] / 1000000);
        }
        $this->SetX(14);
        $this->Cell(200, $width, utf8_decode('TOTALES'), 1, 0, "C", 0);
        $this->Cell(18, $width, number_format($total_ton, 2, '.', ' '), 1, 0, "C", 0);
        $this->Cell(18, $width, '', 1, 0, "C", 0);
        $this->Cell(18, $width, number_format($total_bolivares, 2, '.', ' '), 1, 0, "C", 0);
        $this->Ln(15);

        $this->SetX(14);
        $this->Cell(63.75, $width, utf8_decode('Elaborado Por / Transcriptor:'), 1, 0, "C", 0);
        $this->Cell(63.75, $width, utf8_decode('Aprobado Por:'), 1, 0, "C", 0);
        $this->Cell(63.75, $width, utf8_decode('Seguridad:'), 1, 0, "C", 0);
        if ($this->array_movimiento5[0]['nombre_persona'] != '') {
            $this->Cell(63.75, $width, utf8_decode('Despachador:'), 1, 0, "C", 0);
        }
        if ($this->array_movimiento6[0]['nombre_persona'] != '') {
            $this->Cell(63.75, $width, utf8_decode('Receptor:'), 1, 0, "C", 0);
        }
        if ($this->array_movimiento6[0]['nombre_persona'] == '' && $this->array_movimiento5[0]['nombre_persona'] == '') {
            $this->Cell(63.75, $width, utf8_decode('Responsable Cargo/Descargo:'), 1, 0, "C", 0);
        }

        $this->Ln(5);
        $this->SetX(14);
        $this->Cell(63.75, $width, utf8_decode('Nombre y Apellido: ' . $this->array_movimiento[0]["autorizado_por"]), 0, 0, "J", 0);
        $this->SetX(14);
        $this->Cell(63.75, 25, '', 1, 0, "J", 0);
        $this->Cell(63.75, $width, utf8_decode('Nombre y Apellido: ' . $this->array_movimiento4[0]['nombre_persona']), 0, 0, "J", 0);
        $this->SetX(77.75);
        $this->Cell(63.75, 25, '', 1, 0, "J", 0);
        $this->Cell(63.75, $width, utf8_decode('Nombre y Apellido: ' . $this->array_movimiento3[0]['nombre_persona']), 0, 0, "J", 0);
        $this->SetX(141.5);
        $this->Cell(63.75, 25, '', 1, 0, "J", 0);
        if ($this->array_movimiento5[0]['nombre_persona'] != '') {
            $this->Cell(63.75, $width, utf8_decode('Nombre y Apellido: ' . $this->array_movimiento5[0]['nombre_persona']), 0, 0, "J", 0);
        }
        if ($this->array_movimiento6[0]['nombre_persona'] != '') {
            $this->Cell(63.75, $width, utf8_decode('Nombre y Apellido: ' . $this->array_movimiento6[0]['nombre_persona']), 0, 0, "J", 0);
        }
        $this->SetX(205.25);
        $this->Cell(63.75, 25, '', 1, 0, "J", 0);
        $this->Ln(5);
        $this->SetX(14);
        $this->Cell(63.75, $width, utf8_decode('C.I: '), 0, 0, "J", 0);
        $this->Cell(63.75, $width, utf8_decode('C.I: ' . $this->array_movimiento4[0]['cedula_persona']), 0, 0, "J", 0);
        $this->Cell(63.75, $width, utf8_decode('C.I: ' . $this->array_movimiento3[0]['cedula_persona']), 0, 0, "J", 0);
        if ($this->array_movimiento5[0]['nombre_persona'] != '') {
            $this->Cell(63.75, $width, utf8_decode('C.I: ' . $this->array_movimiento5[0]['cedula_persona']), 0, 0, "J", 0);
        }
        if ($this->array_movimiento6[0]['nombre_persona'] != '') {
            $this->Cell(63.75, $width, utf8_decode('C.I: ' . $this->array_movimiento6[0]['cedula_persona']), 0, 0, "J", 0);
        }
        $this->Ln(5);
        $this->SetX(14);
        $this->Cell(63.75, $width, utf8_decode('Cargo: '), 0, 0, "J", 0);
        $this->Cell(63.75, $width, utf8_decode('Cargo: ' . $this->array_movimiento4[0]['cargo']), 0, 0, "J", 0);
        $this->Cell(63.75, $width, utf8_decode('Cargo: ' . $this->array_movimiento3[0]['cargo']), 0, 0, "J", 0);
        if ($this->array_movimiento5[0]['nombre_persona'] != '') {
            $this->Cell(63.75, $width, utf8_decode('Cargo: ' . $this->array_movimiento5[0]['cargo']), 0, 0, "J", 0);
        }
        if ($this->array_movimiento6[0]['nombre_persona'] != '') {
            $this->Cell(63.75, $width, utf8_decode('Cargo: ' . $this->array_movimiento6[0]['cargo']), 0, 0, "J", 0);
        }
        $this->Ln(5);
        $this->SetX(14);
        $this->Cell(63.75, $width, utf8_decode('Firma:_______________________________________'), 0, 0, "J", 0);
        $this->Cell(63.75, $width, utf8_decode('Firma:_______________________________________'), 0, 0, "J", 0);
        $this->Cell(63.75, $width, utf8_decode('Firma:_______________________________________'), 0, 0, "J", 0);
        $this->Cell(63.75, $width, utf8_decode('Firma:_______________________________________'), 0, 0, "J", 0);
    }

    function ChapterTitle($num, $label)
    {
        $this->SetFont('Arial', '', 10);
        $this->SetFillColor(232, 232, 232, 232, 232);
        $this->Cell(0, 6, "$label", 0, 1, 'L', 1);
        $this->Ln(8);
    }

    function SetTitle($title)
    {
        $this->title   = $title;
    }

    function PrintChapter()
    {
        $this->AddPage();
        $this->ChapterBody();
    }

    function DatosGenerales($array)
    {
        $this->datosgenerales = $array;
    }

    function Arraymovimiento($array)
    {
        $this->array_movimiento = $array;
    }

    function Arraymovimiento2($array)
    {
        $this->array_movimiento2 = $array;
    }
    function Arraymovimiento3($array)
    {
        $this->array_movimiento3 = $array;
    }
    function Arraymovimiento4($array)
    {
        $this->array_movimiento4 = $array;
    }
    function Arraymovimiento5($array)
    {
        $this->array_movimiento5 = $array;
    }
    function Arraymovimiento6($array)
    {
        $this->array_movimiento6 = $array;
    }
}


$id_transaccion = @$_GET["id_transaccion"];
$comunes = new ConexionComun();

$array_parametros_generales = $comunes->ObtenerFilasBySqlSelect("select * from parametros_generales");

$operacion = "Entrada";
$array_movimiento = $comunes->ObtenerFilasBySqlSelect("SELECT *, REPLACE(REPLACE(pv1.nombre_punto, 'PUNTO DE VENTA - ', ''), 'CENTRO DE DISTRIBUCION -','') as nombre_punto_rep1, REPLACE(REPLACE(pv2.nombre_punto, 'PUNTO DE VENTA - ', ''), 'CENTRO DE DISTRIBUCION -','') as nombre_punto_rep2, kad.cantidad as cantidad_item,k.fecha,alm.descripcion as almacen,ubi.descripcion as ubicacion,kad.observacion as observacion_dif, cli.nombre as nombre_cliente, cli.rif as rif_cliente, cli.direccion as direccion_cliente, kad.precio as precio_hist, ite.iva as iva, k.marca as marca_vehiculo, prove.descripcion as nombre_proveedor,
    concat(ite.descripcion1,' - ',m.marca,' ',ite.pesoxunidad,um.nombre_unidad) AS descripcion1, k.observacion as observacion_cabecera, k.fecha_creacion, tp.descripcion as tipo_despacho
    from kardex_almacen_detalle as kad  
    left join almacen as alm on kad.id_almacen_entrada=alm.cod_almacen  
    left join ubicacion as ubi on kad.id_ubi_entrada=ubi.id 
    left join kardex_almacen as k on k.id_transaccion=kad.id_transaccion 
    left join item as ite on kad.id_item=ite.id_item 
    left join conductores AS con ON k.id_conductor = con.id_conductor
    left join puntos_venta AS pv1 ON k.almacen_destino = pv1.codigo_siga_punto
    left join puntos_venta AS pv2 ON k.almacen_procedencia = pv2.codigo_siga_punto
    left join clientes AS cli ON k.id_cliente = cli.id_cliente
    left join marca m on m.id = ite.id_marca 
    left join unidad_medida um on um.id = ite.unidadxpeso
    left join proveedores as prove on k.id_proveedor=prove.id_proveedor
    left join tipo_despacho as tp on k.id_tipo_despacho=tp.id
    where kad.id_transaccion=" . $id_transaccion);

if (count($array_movimiento) == 0) {
    echo "no se encontraron registros.";
    exit;
}

$array_movimiento2 = $comunes->ObtenerFilasBySqlSelect("SELECT *,kad.cantidad as cantidad_item,k.fecha,alm.descripcion as almacen,ubi.descripcion as ubicacion, kad.precio as precio_hist, ite.iva as iva, k.fecha_creacion, tp.descripcion as tipo_despacho
    from kardex_almacen_detalle as kad  
    left join almacen as alm on kad.id_almacen_salida=alm.cod_almacen  
    left join ubicacion as ubi on kad.id_ubi_salida=ubi.id 
    left join kardex_almacen as k on k.id_transaccion=kad.id_transaccion 
    left join item as ite on kad.id_item=ite.id_item 
    left join tipo_despacho as tp on k.id_tipo_despacho=tp.id
    where kad.id_transaccion =" . $id_transaccion);

$seguridad = $comunes->ObtenerFilasBySqlSelect("select cedula_persona, nombre_persona, descripcion_rol, cargo FROM roles_firma a
LEFT JOIN kardex_almacen b on b.id_seguridad=a.id_rol
WHERE b.id_transaccion=" . $id_transaccion);

$aprobado = $comunes->ObtenerFilasBySqlSelect("select cedula_persona, nombre_persona, descripcion_rol, cargo FROM roles_firma a
LEFT JOIN kardex_almacen b on b.id_aprobado=a.id_rol
WHERE b.id_transaccion=" . $id_transaccion);

$despachador = $comunes->ObtenerFilasBySqlSelect("select cedula_persona, nombre_persona, descripcion_rol, cargo FROM roles_firma a
LEFT JOIN kardex_almacen b on b.id_despachador=a.id_rol
WHERE b.id_transaccion=" . $id_transaccion);

$receptor = $comunes->ObtenerFilasBySqlSelect("select cedula_persona, nombre_persona, descripcion_rol, cargo FROM roles_firma a
LEFT JOIN kardex_almacen b on b.id_receptor=a.id_rol
WHERE b.id_transaccion=" . $id_transaccion);

if (count($array_movimiento2) == 0) {
    echo "no se encontraron registros.";
    exit;
}
$pdf = new PDF('L', 'mm', 'letter');
$pdf->AliasNbPages();
$title = 'Detalle de Movimiento de Almacen';
$pdf->DatosGenerales($array_parametros_generales);
$pdf->Arraymovimiento($array_movimiento);
$pdf->Arraymovimiento2($array_movimiento2);
$pdf->Arraymovimiento3($seguridad);
$pdf->Arraymovimiento4($aprobado);
$pdf->Arraymovimiento5($despachador);
$pdf->Arraymovimiento6($receptor);
$pdf->SetTitle($title);
$pdf->PrintChapter();
$pdf->SetDisplayMode('default');
ob_end_clean();
$pdf->Output();
ob_end_flush();
