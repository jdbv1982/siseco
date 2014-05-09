<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
$styleArray = array(
	'font' => array(
		'bold' => true,
	),
	'alignment' => array(
		'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
	),
	'borders' => array(
		'top' => array(
			'style' => \PHPExcel_Style_Border::BORDER_THIN,
		),
	),
	'fill' => array(
		'type' => \PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
		'rotation' => 90,
		'startcolor' => array(
			'argb' => 'FFA0A0A0',
		),
		'endcolor' => array(
			'argb' => 'FFFFFFFF',
		),
	),
);



$objPHPExcel = new \PHPExcel();

$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'REPORTE DE OBRAS AUTORIZADAS');

// Excel-date/time
$objPHPExcel->getActiveSheet()
            ->setCellValue('D1', 39813)
            ->setCellValue('G1',125534.98)
            ->setCellValue('F1',125534.98);
$objPHPExcel->getActiveSheet()
            ->getStyle('D1')
            ->getNumberFormat()
            ->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);

$objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_RED);

$objPHPExcel->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

//$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, 8, 'Some value');

$objPHPExcel->getActiveSheet()->getStyle('A1:C1')->applyFromArray($styleArray);

$objPHPExcel->getActiveSheet()->getStyle('G1')->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

$objPHPExcel->getActiveSheet()->getStyle('F1')->getNumberFormat()->setFormatCode('#,##0.00');

$objPHPExcel->getActiveSheet()->getStyle('A1:A4')->getAlignment()->setWrapText(true);

$objPHPExcel->getActiveSheet()->getCell('H1')->setValue("hello\nworld");
$objPHPExcel->getActiveSheet()->getStyle('H1')->getAlignment()->setWrapText(true);

$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->mergeCells('A1:C1');


/*$objDrawing = new \PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Logo');
$objDrawing->setDescription('Logo');
$objDrawing->setPath('../public/assets/images/logo.jpeg');
$objDrawing->setHeight(90);
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());}*/


$objRichText = new \PHPExcel_RichText();
$objRichText->createText('This invoice is ');

$objPayable = $objRichText->createTextRun('payable within thirty days after the end of the month');
$objPayable->getFont()->setBold(true);
$objPayable->getFont()->setItalic(true);
$objPayable->getFont()->setColor( new \PHPExcel_Style_Color( \PHPExcel_Style_Color::COLOR_DARKGREEN ) );

$objRichText->createText(', unless specified otherwise on the invoice.');

$objPHPExcel->getActiveSheet()->getCell('A18')->setValue($objRichText);

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('REPORTE');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="01simple.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter =  \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
});


Route::get('/pdf', function()
{
$pdf = new TCPDF("L", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(PDF_MARGIN_LEFT, 1, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->AddPage();

$html = '<html lang="es">
            <head>
            </head>
            <body>';
$html .= '<h1>holaaa</h1>';

$html .= '</body>
                </html>';



// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');
});
