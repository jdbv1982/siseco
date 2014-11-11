<?php namespace App\Modules\Reportes\Servicios;

class Avances{
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

		$f->mergeCelda($objPHPExcel,'B2','J2','REPORTE DE OBRAS CON AVANCE FISICO Y FINANCIERO','','CENTER','NO');

		$objPHPExcel->getActiveSheet()
		            ->setCellValue('A4', '#')
		            ->setCellValue('B4','Numero')
		            ->setCellValue('C4','Nombre')
		            ->setCellValue('D4','Ejercicio')
		            ->setCellValue('E4','Region')
		            ->setCellValue('F4','Municipio')
		            ->setCellValue('G4','Residencia')
		            ->setCellValue('H4','# de avances')
		            ->setCellValue('I4','Fisico')
		            ->setCellValue('J4','Financiero');

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
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $obra->region);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $obra->municipio);
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $obra->residencia);
				$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $obra->num_avances);
				$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $obra->fisico . "%");
				$objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $obra->financiero. "%");
				$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(40);

			$i++;
			}





		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename=Informacion Completa.xlsx');
		$objWriter =  \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}

}
