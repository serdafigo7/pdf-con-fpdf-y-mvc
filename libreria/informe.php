<?php

//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//    

// Include the main TCPDF library (search for installation path).
include('tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sergio Figueroa G');
$pdf->SetTitle('INFORME-001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);


$pdf->AddPage();
 


$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));


$html = <<<EOD
<h1>Informe De  Ventas <a  style="text-align:center; text-decoration:none; opacity:.5; color:black;">&nbsp;<span style="color: red; font-family:Times New Roman (serif);">Sis</span><span style="color:lightblue;">Inventario</span>&nbsp;</a>!</h1>
<i>Informe mensual de ventas de la empresa</i><p>&nbsp;</p>

EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);




require_once('../conexion.php');
require_once('../class.pruebas.php');
$obj = new Conexion();
$conx = $obj->conectar();
$obj = new Pruebas;
$resp = $obj->seleccionar_datos_prueba2();


$html1 = '<h2 border=".5" style="text-align:center width=100%; font-family:Times New Roman (serif); background-color:gray; color:white; padding:5px;" > Datos de las ventas </h2>';
$html1 .= '<table border="1">';

$html1 .= '<tr><th style="text-align:center; background-color:#89, 97, 83; font-weight: bold; color:white; ">ID</th><th style="text-align:center; background-color:#89, 97, 83; font-weight: bold; color:white; ">Cliente</th><th style="text-align:center; background-color:#89, 97, 83; font-weight: bold; color:white; ">Valor</th><th style="text-align:center; background-color:#89, 97, 83; font-weight: bold; color:white; ">Forma de Pago</th><th style="text-align:center; background-color:#89, 97, 83; font-weight: bold; color:white; ">Fecha - Hora</th></tr>';

foreach ($resp as $row) {
    $html1 .= '<tr>';
    $html1 .= '<td style="text-align:center; padding:15px; ">' . $row['id'] . '</td>';
    $html1 .= '<td style="text-align:center; padding:15px;">' . $row['cliente'] . '</td>';
    $html1 .= '<td style="text-align:center; padding:15px;">' . $row['valor'] . '</td>';
    $html1 .= '<td style="text-align:center; padding:15px;">' . $row['forma_de_pago'] . '</td>';
    $html1 .= '<td style="text-align:center; padding:15px;">' . $row['fecha'] . '</td>';
    $html1 .= '</tr>';
}
$html1 .= '</table>';


$pdf->writeHTMLCell(0, 0, '', '', $html1, 0, 1, 0, true, '', true);


$pdf->Output('example_001.pdf', 'I');



?>