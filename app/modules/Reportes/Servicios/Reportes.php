<?php namespace App\Modules\Reportes\Servicios;

class Reportes{
	public function printObrasAutorizadas($obras){
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

		$objPHPExcel->getActiveSheet()->mergeCells('B2:H2');
		$objPHPExcel->getActiveSheet()->setCellValue('B2', 'REPORTE DE OBRAS AUTORIZADAS');
		$objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(15);
		$objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(15);
		$objPHPExcel->getActiveSheet()->getRowDimension(3)->setRowHeight(15);

		$objPHPExcel->getActiveSheet()
		            ->setCellValue('B3', 'NUMERO')
		            ->setCellValue('C3', 'EJERCICIO')
		            ->setCellValue('D3','NUMERO DE OBRA')
		            ->setCellValue('E3','NOMBRE DE LA OBRA')
		            ->setCellValue('R3','MONTO')
		            ->setCellValue('G3','NO. OFICIO')
		            ->setCellValue('H3','FECHA')
		            ->setCellValue('I3','FUENTE FINANCIAMIENTO');
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getStyle('B3:I3')->applyFromArray($styleArray);

		$i=4;
			foreach ($obras as $key => $obra) {
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $obra->id);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $obra->ejercicio);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $obra->numeroobra);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $obra->nombreobra);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $obra->monto);
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $obra->numerooficio);
				$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $obra->fechaoficio);
				$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $obra->nombrefinanciamiento);
				$objPHPExcel->getActiveSheet()->getStyle('E'.$i)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle('G'.$i)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(60);
				$objPHPExcel->getActiveSheet()->getStyle('F'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
				$i++;
		}

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename=Obras Autorizadas.xlsx');
		$objWriter =  \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}





	public function printReporte($obras){
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
		$objPHPExcel->getActiveSheet()->setCellValue('B2', 'REPORTE DE OBRAS CONTRATADAS');
		$objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(15);

		$objPHPExcel->getActiveSheet()
		            ->setCellValue('B3', 'REGION')
		            ->setCellValue('C3', 'NOMBRE OBRA')
		            ->setCellValue('D3','FUENTE DE FINANCIAMIENTO')
		            ->setCellValue('E3','INVERSION AUTORIZADA')
		            ->setCellValue('F3','DISTRITO')
		            ->setCellValue('G3','MUNICIPIO')
		            ->setCellValue('H3','LOCALIDAD')
		            ->setCellValue('I3','CONTRATO')
		            ->setCellValue('J3','MONTO CONTRATO')
		            ->setCellValue('K3','CONTRATISTA');
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getStyle('B3:K3')->applyFromArray($styleArray);



		$i=4;
		foreach ($obras as $key => $obra) {
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $obra->nombre_region);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $obra->nombreobra);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $obra->fuentegeneral);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $obra->monto);
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $obra->nombre_distrito);
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $obra->nombre_municipio);
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $obra->nombre_localidad);
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $obra->l_contrato);
			$objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $obra->l_montocontratado);
			$objPHPExcel->getActiveSheet()->setCellValue('K'.$i, $obra->razsoc);
			$objPHPExcel->getActiveSheet()->getStyle('E'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
			$objPHPExcel->getActiveSheet()->getStyle('J'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
			$i++;
		}



		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename=Obras Contratadas.xlsx');
		$objWriter =  \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}


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



		$objPHPExcel->getActiveSheet()->mergeCells('B2:F2');
		$objPHPExcel->getActiveSheet()->setCellValue('B2', 'RESUMEN DE OBRAS');
		$objPHPExcel->getActiveSheet()->mergeCells('B3:F3');
		$objPHPExcel->getActiveSheet()->setCellValue('B3', 'FILTRO POR: '.$filtro);
		$objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('B3')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('B3')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(15);


		$objPHPExcel->getActiveSheet()
		            ->setCellValue('B4',$filtro)
		            ->setCellValue('C4','Año')
		            ->setCellValue('D4','NUM OBRAS AUTORIZADAS')
		            ->setCellValue('E4','MONTO AUTORIZADO')
		            ->setCellValue('F4','NUM OBRAS CONTRATADAS')
		            ->setCellValue('G4','MONTO CONTRATADO');
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getStyle('B4:G4')->applyFromArray($styleArray);


		$i=5;
		foreach ($datos as $key => $dato) {
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $dato->nombre);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $dato->ejercicio);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $dato->autorizadas);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $dato->montoautorizado);
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $dato->contratadas);
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $dato->montocontratado);
			$objPHPExcel->getActiveSheet()->getStyle('E'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
			$objPHPExcel->getActiveSheet()->getStyle('G'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
			$i++;
		}

		foreach ($totales as $key => $total) {
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, 'TOTALES:');
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $total->autorizadas);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $total->montoautorizado);
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $total->contratadas);
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $total->montocontratado);
			$objPHPExcel->getActiveSheet()->getStyle('D'.$i.':'.'G4'.$i)->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('E'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
			$objPHPExcel->getActiveSheet()->getStyle('G'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
			$i++;
		}



		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename='.$filtro.'.xlsx');
		$objWriter =  \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}



}
