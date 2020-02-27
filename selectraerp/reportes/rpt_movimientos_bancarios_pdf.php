<?php

/*
 * Creado por: Charli J. Vivenes Rengel
 * Email: cvivenes@asys.com.ve - cjvrinf@gmail.com
 */
include('config_reportes.php');
include('fpdf.php');
include('../../menu_sistemas/lib/common.php');

class PDF extends FPDF {

//Cabecera de página
    function Header() {
        $comunes = new ConexionComun();
        $var_sql = "select * from parametros, parametros_generales";
        $row_rs = $comunes->ObtenerFilasBySqlSelect($var_sql);
        #$var_encabezado1 = $row_rs[0]['encabezado1'];
        #$var_encabezado2 = $row_rs[0]['encabezado2'];
        #$var_encabezado3 = $row_rs[0]['encabezado3'];
        #$var_encabezado4 = $row_rs[0]['encabezado4'];
        #$var_imagen_izq = $row_rs[0]['imagen_izq'];
        #$var_imagen_der = $row_rs[0]['imagen_der'];
        #$var_sql = "select codigo,nomemp,departamento,presidente,periodo,cargo,nivel,desislr,ctaisrl,desiva,ctaiva,por_isv,compra,servicio,rif,nit,direccion,telefono,por_im,por_bomberos,lugar,sobregirop,autorizacionodp,claveodp,contrato,gas_dir from parametros";
        #$row_rsu = $comunes->ObtenerFilasBySqlSelect($var_sql);
        #$var_nomemp = $row_rs[0]['nombre_empresa'];
        #cerrar_conexion($Conn);

        $this->SetFont("Arial", "B", 8);

        $this->Image($row_rs[0]['imagen_der'] ? $row_rs[0]['imagen_der'] : $row_rs[0]['imagen_izq'], 10, 8, 50, 10);
        $this->Cell(0, 0, utf8_decode($row_rs[0]['nombre_empresa']), 0, 0, 'C');
        $this->Ln(3);
        $this->Cell(0, 0, $row_rs[0]["id_fiscal"] . ": " . $row_rs[0]["rif"] . utf8_decode(" - Teléfonos: ") . $row_rs[0]["telefonos"], 0, 0, 'C');
        $this->Ln(3);
        $this->Cell(0, 0, utf8_decode($row_rs[0]["direccion"]), 0, 0, 'C');
        $this->Ln(10);
        $this->Cell(0, 0, 'MOVIMIENTOS BANCARIOS', 0, 0, 'C');
        $this->Ln(3);
    }

//Hacer que sea multilinea sin que haga un salto de linea
    var $widths;
    var $aligns;
    var $celdas;
    var $ancho;
    var $nro_ocs;

    function SetWidths($w) {
        //Set the array of column widths
        $this->widths = $w;
    }

    function SetAligns($a) {
        //Set the array of column alignments
        $this->aligns = $a;
    }

// Marco de la celda
    function Setceldas($cc) {

        $this->celdas = $cc;
    }

// Ancho de la celda
    function Setancho($aa) {
        $this->ancho = $aa;
    }

    function CheckPageBreak($h) {
        //If the height h would cause an overflow, add a new page immediately
        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt) {
        //Computes the number of lines a MultiCell of width w will take
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l+=$cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                }
                else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }

    function Row($data) {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = 5 * $nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            //$this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w, $this->ancho[$i], $data[$i], $this->celdas[$i], $a);
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }

//fin

    function imprimir_tabla($banco, $fDesde, $fHasta, $pdf) {
        $conexion = conexion();
        $consulta1 = "SELECT fecha_apertura, monto_apertura, nro_cuenta, descripcion FROM tesor_bancodet WHERE cod_tesor_bandodet = " . $banco;
        $resultado1 = query($consulta1, $conexion);
        $aperturac = fetch_array($resultado1);
        $saldo_ant1 = $saldo_ant = $aperturac['monto_apertura'];
        $cuenta = $aperturac['nro_cuenta'];
        $descripcion = $aperturac['descripcion'];

        $this->SetFont('Arial', 'B', 8);
        $string = "Relación de Movimientos Bancarios de la Cuenta Nro. " . $cuenta . " del " . fecha($fDesde) . " al " . fecha($fHasta);

        $this->Cell(188, 8, utf8_decode($string), 0, 0, "C");
        //$this->cell(38,8,'Fecha: '.fecha($fecha),0,0,'C');
        $this->Ln();
        $this->SetFont('Arial', 'B', 8);
        $string = "Banco: " . $descripcion;
        $this->Cell(100, 7, $string, 0, "C");
        $this->Cell(48, 7, '', 0, "C");
        $this->Cell(40, 7, "Fecha Consulta: " . date('d/m/Y'), 0, "C");
        $this->Ln();
    }

    function imprimir_datos($fDesde, $fHasta, $banco, $tipomov, $pdf) {
        $cantidad_registros = 35;
        if ($cont + 3 > $cantidad_registros) {
            $this->Ln(30);
        }

        $this->SetFont("Arial", "B", 9);
        $this->Cell(18, 7, 'Fecha', 'LTB', 0, 'C');
        $this->Cell(18, 7, 'Tipo Mov.', 'LTB', 0, 'C');
        $this->Cell(18, 7, 'Nro. Mov.', 'LTB', 0, 'C');
        $this->Cell(72, 7, 'Beneficiario / Concepto', 'LTB', 0, 'C');
        $this->Cell(21, 7, 'Debe', 'LTB', 0, 'C');
        $this->Cell(21, 7, 'Haber', 'LTB', 0, 'C');
        $this->Cell(23, 7, 'Saldo', 'LTBR', 0, 'C');
        $this->Ln();

        $conexion = conexion();
        if ($tipomov == 0) {
            $consulta = "SELECT fecha_movimiento, tipo_movimiento, descripcion, numero_movimiento, monto, cod_tesor_bancodet, concepto FROM movimientos_bancarios INNER JOIN tipo_movimientos_ban ON cod_tipo_movimientos_ban = tipo_movimiento WHERE cod_tesor_bancodet = " . $banco . " AND fecha_movimiento BETWEEN '" . $fDesde . "' AND '" . $fHasta . "' order by fecha_movimiento";
        } else {
            $consulta = "SELECT fecha_movimiento, tipo_movimiento, descripcion, numero_movimiento, monto, cod_tesor_bancodet, concepto FROM movimientos_bancarios INNER JOIN tipo_movimientos_ban ON cod_tipo_movimientos_ban = tipo_movimiento WHERE cod_tesor_bancodet = " . $banco . " AND tipo_movimiento = '" . $tipomov . "' AND fecha_movimiento BETWEEN '" . $fDesde . "' AND '" . $fHasta . "' order by fecha_movimiento";
        }
        $resultado = query($consulta, $conexion);
        $totalwhile = num_rows($resultado);
        if ($totalwhile == 0) {
            $this->SetY(-75);
            $this->Cell(188, 7, 'No hay Movimientos', 0, 0, 'C');
        }

        $contar = 1;
        $cantidad_registros = 35;

        /* $cheques = 0;
          $monto_cheques = 0;
          $depositos = 0;
          $monto_depositos = 0;
          $notas_deb = 0;
          $monto_notas_deb = 0;
          $notas_cre = 0;
          $monto_notas_cre = 0;
          $i = 1; */
        $saldo_act = 0;
        $debe = 0;
        $haber = 0;

        // Consultar los tipos de movimientos efectuados para elaborar el resumen final: movimiento, veces y monto.
        $sql = "SELECT cod_tipo_movimientos_ban, descripcion
                FROM tipo_movimientos_ban
                WHERE cod_tipo_movimientos_ban IN (SELECT DISTINCT (tipo_movimiento) FROM movimientos_bancarios)";
        $rs = query($sql, $conexion);
        $tipo_movimientos_efectuados = array();
        $tipo_movimientos_efectuados_veces = array();
        $tipo_movimientos_efectuados_monto = array();
        while ($fila = fetch_array($rs)) {
            $tipo_movimientos_efectuados[$fila['cod_tipo_movimientos_ban']] = $fila['descripcion'];
        }

        while ($totalwhile >= $contar) {
            $conexion = conexion();
            $contenido = fetch_array($resultado);
            $contador++;
            $conCq = "SELECT * FROM cheque c INNER JOIN chequera cq ON c.cod_chequera = cq.cod_chequera WHERE nro_cheque = '" . $contenido['numero_movimiento'] . "' AND cq.cod_tesor_bandodet = '" . $contenido['cod_tesor_bancodet'] . "' AND fecha = '" . $contenido['fecha_movimiento'] . "'";
            $resCq = query($conCq, $conexion);
            $filaCq = fetch_array($resCq);
            $Beneficiaro = $filaCq['beneficiario'];
            if (($contenido['tipo_movimiento'] == 1/* Cheque */) || ($contenido['tipo_movimiento'] == 3/* Debito */)) {
                $saldo_act = $saldo_ant + 0 - $contenido['monto'];
                $saldo_ant = $saldo_act;
                $haber = $haber + $contenido['monto'];
                $monto = number_format($contenido['monto'], 2, ',', '.');
                $saldo = number_format($saldo_act, 2, ',', '.');
                $this->SetFont("Arial", "I", 9);
                // llamado para hacer multilinea sin que haga salto de linea
                $this->SetWidths(array(18, 18, 18, 72, 21, 21, 23));
                $this->SetAligns(array('C', 'C', 'C', 'L', 'R', 'R', 'R'));
                $this->Setceldas(array(0, 0, 0, 0, 0, 0, 0));
                $this->Setancho(array(5, 5, 5, 5, 5, 5, 5));
                if ($contenido['tipo_movimiento'] == 1/* Cheque */) {
                    if ($contenido['monto'] == 0) {
                        $this->Row(array(fecha($contenido['fecha_movimiento']), $contenido['descripcion'], $contenido['numero_movimiento'], utf8_decode($Beneficiaro . " " . $contenido['concepto']), '0.00', $monto, $saldo));
                    } else {
                        $this->Row(array(fecha($contenido['fecha_movimiento']), $contenido['descripcion'], $contenido['numero_movimiento'], utf8_decode($Beneficiaro), '0.00', $monto, $saldo));
                    }
                } else {
                    $this->Row(array(fecha($contenido['fecha_movimiento']), $contenido['descripcion'], $contenido['numero_movimiento'], utf8_decode($contenido['concepto']), '0.00', $monto, $saldo));
                }
            } else {
                $saldo_act = $saldo_ant + $contenido['monto'] - 0;
                $saldo_ant = $saldo_act;
                $debe = $debe + $contenido['monto'];
                $monto = number_format($contenido['monto'], 2, ',', '.');
                $saldo = number_format($saldo_act, 2, ',', '.');
                $this->SetFont("Arial", "I", 9);
                // llamado para hacer multilinea sin que haga salto de linea
                $this->SetWidths(array(18, 18, 18, 72, 21, 21, 23));
                $this->SetAligns(array('C', 'C', 'C', 'L', 'R', 'R', 'R'));
                $this->Setceldas(array(0, 0, 0, 0, 0, 0, 0));
                $this->Setancho(array(5, 5, 5, 5, 5, 5, 5));
                $this->Row(array(fecha($contenido['fecha_movimiento']), $contenido['descripcion'], $contenido['numero_movimiento'], utf8_decode($contenido['concepto']), $monto, '0.00', $saldo));
            }
            $contador++;

            /* if ($contenido['tipo_movimiento'] == 1) {//Cheque
              $cheques = $cheques + 1;
              $monto_cheques = $monto_cheques + $contenido['monto'];
              } elseif ($contenido['tipo_movimiento'] == 2) {//Deposito
              $depositos = $depositos + 1;
              $monto_depositos = $monto_depositos + $contenido['monto'];
              } elseif ($contenido['tipo_movimiento'] == 3) {//Debito
              $notas_deb = $notas_deb + 1;
              $monto_notas_deb = $monto_notas_deb + $contenido['monto'];
              } elseif ($contenido['tipo_movimiento'] == 4) {//Credito
              $notas_cre = $notas_cre + 1;
              $monto_notas_cre = $monto_notas_cre + $contenido['monto'];
              } */
            switch ($contenido['tipo_movimiento']) {
                case 1:case 7:case 8:case 11:
                    $tipo_movimientos_efectuados_monto[$contenido['tipo_movimiento']] -= $contenido['monto'];
                    break;
                case 2:
                    $tipo_movimientos_efectuados_monto[$contenido['tipo_movimiento']] += $contenido['monto'];
                    break;
            }
            $tipo_movimientos_efectuados_veces[$contenido['tipo_movimiento']]++;

            if ($cont >= $cantidad_registros) {

                $this->Ln(100);
                $pdf->imprimir_tabla($banco, $fDesde, $fHasta, $pdf);
                $this->SetFont("Arial", "B", 9);
                //$string=utf8_decode();
                $this->Cell(18, 7, 'Fecha', 'LTB', 0, 'C');
                $this->Cell(18, 7, 'Tipo Mov.', 'LTB', 0, 'C');
                $this->Cell(18, 7, 'Nro. Mov.', 'LTB', 0, 'C');
                $this->Cell(72, 7, 'Beneficiario / Concepto', 'LTB', 0, 'C');
                $this->Cell(21, 7, 'Debe.', 'LTB', 0, 'C');
                $this->Cell(21, 7, 'Haber', 'LTB', 0, 'C');
                $this->Cell(23, 7, 'Saldo', 'LTBR', 0, 'C');
                $this->Ln();
                $cont = 1;
            } else {
                $cont++;
                //echo $cont;
            }
            //$contar=$contar+$m;
            $contar++;
        }//fin del while
        /* $this->SetFont("Arial", "I", 9);
          $this->Cell(188, 7, ' TOTALES', '', 0, 'C');
          $this->Ln();
          $this->Cell(49, 7, '', '', 0, 'C');
          $this->Cell(30, 7, utf8_decode('Descripción'), '', 0, 'C');
          $this->Cell(30, 7, 'Cantidad', '', 0, 'C');
          $this->Cell(30, 7, 'Monto', '', 0, 'C');
          $this->Cell(49, 7, '', '', 0, 'C');
          $this->Ln();
          // llamado para hacer multilinea sin que haga salto de line
          $this->SetFont("Arial", "I", 9);
          $this->SetWidths(array(49, 30, 30, 30, 49));
          $this->SetAligns(array('C', 'C', 'C', 'C', 'R'));
          $this->Setceldas(array(0, 0, 0, 0, 0));
          $this->Setancho(array(5, 5, 5, 5, 5));
          $this->Row(array('', 'Depositos', $depositos, $monto_depositos, ''));
          $this->Row(array('', 'Cheques', $cheques, $monto_cheques, ''));
          $this->Row(array('', 'Nota Cred', $notas_cre, $monto_notas_cre, ''));
          $this->Row(array('', 'Nota Deb', $notas_deb, $monto_notas_deb, '')); */
        $this->SetFont("Arial", "B", 9);
        $this->Cell(54, 7, '', '', 0, 'C');
        $this->Cell(137, 7, 'TOTALES', '1', 1, 'C');
        $this->SetWidths(array(54, 72, 21, 44));
        $this->SetAligns(array('C', 'C', 'C', 'C'));
        $this->Setceldas(array(0, 1, 1, 1));
        $this->Setancho(array(5, 5, 5, 5));
        $this->Row(array('', utf8_decode('Descripción Tipo Movimiento'), 'Cantidad', 'Monto'));
        $this->SetFont("Arial", "I", 9);
        $this->SetWidths(array(54, 72, 21, 44));
        $this->SetAligns(array('C', 'R', 'C', 'R'));
        $this->Setceldas(array(0, 1, 1, 1));
        $this->Setancho(array(5, 5, 5, 5));
        foreach ($tipo_movimientos_efectuados as $key => $value) {
            $this->Row(array('', $value, $tipo_movimientos_efectuados_veces[$key], number_format($tipo_movimientos_efectuados_monto[$key], 2, ',', '.')));
        }
    }

//Pie de página
    function Footer() {

        //Posición: a  cm del final
        $this->SetY(-15);
        // fin
        $this->SetFont('Arial', 'I', 8);
        //Número de página
        $this->Cell(188, 5, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->SetFont('Arial', 'I', 8);
        $this->Ln();
        $this->Cell(188, 5, 'Elaborado Por: ' . $_SESSION['nombre'], 0, 0, 'L');


        //Número de página
        // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

}

//Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);

$fDesde = $_GET['fecha_desde'];
$fHasta = $_GET['fecha_hasta'];
$banco = $_GET['cuenta_banco'];
$tipomov = $_GET['tipomov'];

#$comunes = new ConexionComun();
#$consulta = "SELECT fecha, tipo, numero, monto, concepto FROM movimientos_bancarios WHERE codigo =" . $banco . " AND tipo='" . $tipomov . "' AND fecha BETWEEN '" . $fDesde . "' AND '" . $fHasta . "'";
#$resultado = $comunes->ObtenerFilasBySqlSelect($consulta);

$pdf->imprimir_tabla($banco, $fDesde, $fHasta, $pdf);
$pdf->imprimir_datos($fDesde, $fHasta, $banco, $tipomov, $pdf);
$pdf->Output();
?>
