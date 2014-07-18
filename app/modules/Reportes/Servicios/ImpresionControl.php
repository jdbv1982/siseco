<?php namespace App\Modules\Reportes\Servicios;

class ImpresionControl{

	public function printInversionAnual($datos, $totales){

		$styleArray = array(
			'font' => array(
				'bold' => true,
			),
			'alignment' => array(
				'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			),
		);

		$styleArray2 = array(
			'font' => array(
				'bold' => true,
			)
		);

		$objPHPExcel = new \PHPExcel();

		//LOGO
		$objDrawing = new \PHPExcel_Worksheet_Drawing();
		$objDrawing->setPath('../public/assets/images/logo.jpeg');
		$objDrawing->setHeight(45);
		$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

		$objPHPExcel->getActiveSheet()->mergeCells('B1:O1');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'INVERSION ANUAL');
		$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$objPHPExcel->getActiveSheet()
		            ->setCellValue('B4','FUENTE')
		            ->setCellValue('C4','# OBRAS')
		            ->setCellValue('D4','ENE')
		            ->setCellValue('E4','FEB')
		            ->setCellValue('F4','MAR')
		            ->setCellValue('G4','ABR')
		            ->setCellValue('H4','MAY')
		            ->setCellValue('I4','JUN')
		            ->setCellValue('J4','JUL')
		            ->setCellValue('K4','AGO')
		            ->setCellValue('L4','SEP')
		            ->setCellValue('M4','OCT')
		            ->setCellValue('N4','NOV')
		            ->setCellValue('O4','DIC')
		            ->setCellValue('P4','TOTAL')
		            ;
		$objPHPExcel->getActiveSheet()->getStyle('B4:P4')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);


		$i=5;
		foreach ($datos as $key => $dato) {
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $dato->fuentegeneral);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $dato->numobras);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $this->getPorcentaje($dato->enero, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $this->getPorcentaje($dato->febrero, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $this->getPorcentaje($dato->marzo, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $this->getPorcentaje($dato->abril, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $this->getPorcentaje($dato->mayo, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $this->getPorcentaje($dato->junio, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $this->getPorcentaje($dato->julio, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('K'.$i, $this->getPorcentaje($dato->agosto, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('L'.$i, $this->getPorcentaje($dato->septiembre, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('M'.$i, $this->getPorcentaje($dato->octubre, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('N'.$i, $this->getPorcentaje($dato->noviembre, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('O'.$i, $this->getPorcentaje($dato->diciembre, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('P'.$i, $dato->total);
			$objPHPExcel->getActiveSheet()->getStyle('P'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
			$i++;
		}

		foreach ($totales as $key => $dato) {
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, 'TOTAL');
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $dato->numobras);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $this->getPorcentaje($dato->enero, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $this->getPorcentaje($dato->febrero, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $this->getPorcentaje($dato->marzo, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $this->getPorcentaje($dato->abril, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $this->getPorcentaje($dato->mayo, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $this->getPorcentaje($dato->junio, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $this->getPorcentaje($dato->julio, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('K'.$i, $this->getPorcentaje($dato->agosto, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('L'.$i, $this->getPorcentaje($dato->septiembre, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('M'.$i, $this->getPorcentaje($dato->octubre, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('N'.$i, $this->getPorcentaje($dato->noviembre, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('O'.$i, $this->getPorcentaje($dato->diciembre, $dato->total) );
			$objPHPExcel->getActiveSheet()->setCellValue('P'.$i, $dato->total);
			$objPHPExcel->getActiveSheet()->getStyle('P'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
		}
		$objPHPExcel->getActiveSheet()->getStyle('B'.$i.':'.'P'.$i)->applyFromArray($styleArray2);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename=Informacion Completa.xlsx');
		$objWriter =  \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}

	public function getPorcentaje($valor, $total){
		return round($valor * 100 / $total, 2);
	}

}
