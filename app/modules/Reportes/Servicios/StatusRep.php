<?php namespace App\Modules\Reportes\Servicios;

class StatusRep{
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

		$f->mergeCelda($objPHPExcel,'B2','F2','REPORTE DE OBRAS CANCELADAS','','CENTER','NO');

		$objPHPExcel->getActiveSheet()
		            ->setCellValue('B4', 'NUM FOLIO')
		            ->setCellValue('C4','EJERCICIO')
		            ->setCellValue('D4','FUENTE')
		            ->setCellValue('E4','NUMERO DE OBRA')
		            ->setCellValue('F4','NOMBRE');
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(100);
		$objPHPExcel->getActiveSheet()->getStyle('B4:F4')->applyFromArray($styleArray);


		            $i=5;
			foreach ($datos as $key => $obra) {
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $obra->id);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $obra->ejercicio);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $obra->fuente);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $obra->numeroobra);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $obra->nombreobra);
				$objPHPExcel->getActiveSheet()->getStyle('F'.$i)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(60);

			$i++;
			}


		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename=Obras canceladas.xlsx');
		$objWriter =  \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}

}
