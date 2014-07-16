<?php namespace App\Modules\Reportes\Servicios;

class Pdf_planeacion{
	public function printResumen($datos, $totales, $filtro){
		$styleArray = array(
			'font' => array(
				'bold' => true,
			),
			'alignment' => array(
				'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			),
		);

		$objPHPExcel = new \PHPExcel();

		//LOGO
		$objDrawing = new \PHPExcel_Worksheet_Drawing();
		$objDrawing->setPath('../public/assets/images/logo.jpeg');
		$objDrawing->setHeight(45);
		$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

		$objPHPExcel->getActiveSheet()->mergeCells('B2:I2');
		$objPHPExcel->getActiveSheet()->setCellValue('B2', 'RESUMEN DE INVERSION DE OBRAS');
		$objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$objPHPExcel->getActiveSheet()->mergeCells('E4:I4');
		$objPHPExcel->getActiveSheet()->setCellValue('E4', 'MONTOS AUTORIZADOS');
		$objPHPExcel->getActiveSheet()->getStyle('E4')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$objPHPExcel->getActiveSheet()
		            ->setCellValue('B5',$filtro)
		            ->setCellValue('C5','AÑO')
		            ->setCellValue('D5','NUM. OBRAS')
		            ->setCellValue('E5','TOTAL')
		            ->setCellValue('F5','FEDERAL')
		            ->setCellValue('G5','ESTATAL')
		            ->setCellValue('H5','MUNICIPAL')
		            ->setCellValue('I5','PARTICIPANTES');
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getStyle('B4:I5')->applyFromArray($styleArray);


		$i=6;
		foreach ($datos as $key => $dato) {
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $dato->nombre);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $dato->ejercicio);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $dato->autorizadas);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $dato->total);
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $dato->federal);
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $dato->estatal);
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $dato->municipal);
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $dato->participantes);
			$objPHPExcel->getActiveSheet()->getStyle('E'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
			$objPHPExcel->getActiveSheet()->getStyle('F'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
			$objPHPExcel->getActiveSheet()->getStyle('G'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
			$objPHPExcel->getActiveSheet()->getStyle('H'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
			$objPHPExcel->getActiveSheet()->getStyle('I'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
			$i++;
		}

		foreach ($totales as $key => $total) {
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, 'TOTALES:');
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i,'');
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $total->autorizadas);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $total->total);
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $total->federal);
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $total->estatal);
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $total->municipal);
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $total->participantes);
			$objPHPExcel->getActiveSheet()->getStyle('E'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
			$objPHPExcel->getActiveSheet()->getStyle('F'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
			$objPHPExcel->getActiveSheet()->getStyle('G'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
			$objPHPExcel->getActiveSheet()->getStyle('H'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
			$objPHPExcel->getActiveSheet()->getStyle('I'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
			//$i++;
		}
		$objPHPExcel->getActiveSheet()->getStyle('B'.$i.':'.'I'.$i)->getFont()->setBold(true);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename='.$filtro.'.xlsx');
		$objWriter =  \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}



}
