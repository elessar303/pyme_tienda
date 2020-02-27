<?php
include('config_reportes.php');
include('fpdf.php');
#include('../fpdf/fpdfselectra.php');
include('../../menu_sistemas/lib/common.php');

class PDF extends FPDF {
	public $title;
	public $conexion;
	public $datosgenerales;
	public $array_factura;
	public $fecha,$fecha2;

	function Header() {
		$width = 10;
		$this->SetY(15);
		$this->SetLeftMargin(15);
		$width = 5;
		$this->SetX(5);
		$this->SetFont('Arial','B',10);
		$this->SetFillColor(10,50,100);
		#$this->Image('../libs/imagenes/asys.jpg', 6 ,10, 45, 28,'JPG', '');
		$this->Image('../libs/imagenes/asys.jpg', 6 ,10, 45, 28,'JPG', '');
		$this->Cell(165,0,'RELACION DE CUENTAS POR COBRAR',0,0,'C');
		$this->Ln(6);
		$this->Cell(102,0,'Al: '. date('d/m/Y'),0,0,'C');
		$this->Ln(6);
		$this->Cell(143,0,"Periodo: ".$this->fecha." Hasta " .$this->fecha2,0,0,'C');
		$this->Ln(15);
	}

	function Footer() {
		$this->SetY(-15);
		$this->SetFont('Arial','I',10);
		$this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
	}

	function dwawCell($title,$data) {
		$width = 8;
		$this->SetFont('Arial','B',12);
		$y =  $this->getY() * 20;
		$x =  $this->getX();
		$this->SetFillColor(206,230,100);
		$this->MultiCell(175,8,$title,0,1,'L',0);
		$this->SetY($y);
		$this->SetFont('Arial','',12);
		$this->SetFillColor(206,230,172);
		$w=$this->GetStringWidth($title)+3;
		$this->SetX($x+$w);
		$this->SetFillColor(206,230,172);
		$this->MultiCell(175,8,$data,0,1,'J',0);
	}

	function ChapterBody() {

		$this->SetWidths(array(65,30,30,25,25,25,25,25,25));
		$this->SetAligns(array("C","C","C","C","C","C","C","C","C",));
		$this->SetFillColor(232,232,232,232,232,232,232,232,232);
		$this->SetLeftMargin(18);
		$width = 5;
		$this->SetX(8);
		$this->SetFont('Arial','B',6);
		$this->Row(array('Seguro','Saldo Total','Por Recibir en Seguro','Recibido en Seguro','0 a 30 Dias', '31 a 45 Dias', '46 a 60 Dias', '61 a 90 Dias','Mayor a 90 Dias'),1);
		$this->SetWidths(array(10,15,00,15,38,15,15,18,10,13,13,20,15,15,15));
		$this->SetAligns(array("C","C","C","C","C","C","C","C","C","C","C","C","C","C","C"));
		$this->SetFillColor(10,10,10,10,10,10,10,10,10,10,10,10,10,10,10);
		$totalDebito=0;
		$totalCredito=0;
		$totalVentasConIva=0;
		$totalVentasNoGravadas=0;
		$totalBaseImponible=0;
		$totalIva=0;
		$totalIvaRet=0;
		$i=0;
		while($this->array_factura[$i])
		{
			$porc=($this->array_factura[$i][ivaTotalFactura]*100)/$this->array_factura[$i][montoItemsFactura];
			if(($porc>=11.9)&&($porc<12)){
				$porc=12;
			}
			$this->SetLeftMargin(18);
			$width = 5;
			$this->SetX(8);$this->SetFont('Arial','',6);
			$this->Row(
			array(
			$this->$i+1,
			$this->array_factura[$i]["fechaFactura"],
			$this->array_factura[$i]["rif"],
			$this->array_factura[$i]["nombre"],
			number_format($this->array_factura[$i]["cod_factura"], 2, ',', '.'),
			number_format($this->array_factura[$i]["cod_factura"], 2, ',', '.'),
			number_format($this->array_factura[$i]["0,00"], 2, ',', '.'),
			number_format($this->array_factura[$i]["0,00"], 2, ',', '.'),
			number_format($this->array_factura[$i][""], 2, ',', '.'),
			number_format($this->array_factura[$i]["0"], 2, ',', '.')),1);

			$totalDebito+=0;
			$totalCredito+=0;
			$totalVentasConIva+=($this->array_factura[$i][montoItemsFactura]+$this->array_factura[$i][ivaTotalFactura]);
			$totalVentasNoGravadas+=0;
			$totalBaseImponible+=$this->array_factura[$i][totalizar_base_imponible];
			$totalIva+=$this->array_factura[$i][ivaTotalFactura];
			$totalIvaRet+=$this->array_factura[$i][totalizar_total_retencion];
			$i++;
		}
		$this->Ln(1);
		//:::::::::::::::::::::::::::::::::::::::::::AQUI VA TOTAL::::::::::::::::::::::::::::::::::::::::::::::::::::::
	}

	function ChapterTitle($num,$label) {
		$this->SetFont('Arial','',10);
		$this->SetFillColor(200,220,255);
		$this->Cell(0,6,"$label",0,1,'L',1);
		$this->Ln(8);
	}

	function SetTitle($title) {
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

fecha_sql($fecha = @$_GET["fecha"]);
$fecha2= @$_GET['fecha2'];

$comunes = new ConexionComun();

$array_parametros_generales = $comunes->ObtenerFilasBySqlSelect("select * from parametros_generales");

$fechaz=$fecha."-01";

$array_factura =   $comunes->ObtenerFilasBySqlSelect("
 SELECT f.*, c.nombre, c.direccion, c.nit, c.cod_cliente, c.telefonos, fd.*, c.rif FROM factura f inner join clientes c on c.id_cliente = f.id_cliente inner join factura_detalle fd on fd.id_factura = f.id_factura where month(f.fechaFactura) = month('".$fechaz."') and year(f.fechaFactura) = year('".$fechaz."')"); 

//$mes=mesaletras(substr($fecha,5,2));

$pdf=new PDF('L','mm','A4');
$title='Relacion de Cuentas por Cobrar Charli';
//$fecha=mesaletras(substr($fecha,5,2))
$pdf->fecha=$fecha;
$pdf->fecha2=$fecha2;
$pdf->DatosGenerales($array_parametros_generales);
$pdf->ArrayFactura($array_factura);

$pdf->SetTitle($title);
$pdf->PrintChapter();
$pdf->SetDisplayMode('default');
$pdf->Output();

?>