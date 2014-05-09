<?php namespace App\Modules\Contratistas\Servicios;

class ContratistasReportes{

	public function listado($datos){
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

		$objPHPExcel->getActiveSheet()->mergeCells('B2:J2');
		$objPHPExcel->getActiveSheet()->setCellValue('B2', 'REPORTE DE OBRAS AUTORIZADAS');
		$objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(15);
		$objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(15);
		$objPHPExcel->getActiveSheet()->getRowDimension(3)->setRowHeight(15);

		$objPHPExcel->getActiveSheet()
		            ->setCellValue('B3', 'ID')
		            ->setCellValue('C3','NUMERO')
		            ->setCellValue('D3','RFC')
		            ->setCellValue('E3','RAZON SOCIAL')
		            ->setCellValue('F3','DOMICILIO')
		            ->setCellValue('G3','REPRESENTANTE LEGAL')
		            ->setCellValue('H3','TELEFONOS')
		            ->setCellValue('I3','CORREO')
		            ->setCellValue('J3','CELULAR');
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getStyle('B3:J3')->applyFromArray($styleArray);

		$i=4;
			foreach ($datos as $key => $dato) {
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $dato->id);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $dato->numero);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $dato->rfc);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $dato->razsoc);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $dato->domicilio);
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $dato->repleg);
				$objPHPExcel->getActiveSheet()->setCellValue('h'.$i, $dato->telefonos);
				$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $dato->correo);
				$objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $dato->celular);
				$i++;
		}
						
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename=Contratistas.xlsx');
		$objWriter =  \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}

}
