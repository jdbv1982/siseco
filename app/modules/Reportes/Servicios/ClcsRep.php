<?php namespace App\Modules\Reportes\Servicios;

class ClcsRep{
	public function printInformacion($datos){
		$styleArray = array(
			'font' => array(
				'bold' => true,
			),
			'alignment' => array(
				'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			),
		);

		$objPHPExcel = new \PHPExcel();
		$f = new Funciones;
		//LOGO
		$objDrawing = new \PHPExcel_Worksheet_Drawing();
		$objDrawing->setPath('../public/assets/images/logo.jpeg');
		$objDrawing->setHeight(45);
		$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

		$f->mergeCelda($objPHPExcel,'B2','J2','REPORTE DE OBRAS CON CLCS','','CENTER','NO');

		$objPHPExcel->getActiveSheet()
		            ->setCellValue('A4', '#')
		            ->setCellValue('B4','Numero')
		            ->setCellValue('C4','Nombre')
		            ->setCellValue('D4','Ejercicio')
		            ->setCellValue('E4','Fuente')
		            ->setCellValue('F4','Region')
		            ->setCellValue('G4','Municipio')
		            ->setCellValue('H4','Residencia')
		            ->setCellValue('I4','# de Clcs')
		            ->setCellValue('J4','Importe');

		            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
		            $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);

		            $objPHPExcel->getActiveSheet()->getStyle('A4:J4')->applyFromArray($styleArray);

		            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(80);
		            $objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setWrapText(true);

		            $i=5;
			foreach ($datos as $key => $obra) {
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $obra->id);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $obra->numeroobra);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $obra->nombreobra);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $obra->ejercicio);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $obra->fuente);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $obra->region);
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $obra->municipio);
				$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $obra->residencia);
				$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $obra->num_clcs);
				$objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $obra->importe);
				$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(40);
				$objPHPExcel->getActiveSheet()->getStyle('J'.$i)->getNumberFormat()->setFormatCode('$#,##0.00');

			$i++;
			}


		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename=Obras con clcs.xlsx');
		$objWriter =  \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}

}
