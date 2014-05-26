<?php namespace App\Modules\Reportes\Servicios;

class Funciones{
	public function mergeCelda($objPHPExcel,$rini,$rfin,$mensaje,$color='', $alinear='',$bordes='',$hgt = 0, $wrap = '', $moneda=''){
		$styleArray = array(
			'borders' => array(
				'outline' => array(
					'style' => \PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('argb' => 'FF000000'),
				),
			),
		);
		$objPHPExcel->getActiveSheet()->mergeCells($rini.':'.$rfin);
		$objPHPExcel->getActiveSheet()->setCellValue($rini,$mensaje);

		if($color != ''){
			$objPHPExcel->getActiveSheet()->getStyle($rini.':'.$rfin)->getFill()
			->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB($color);
		}

		if($alinear == 'CENTER'){
			$objPHPExcel->getActiveSheet()->getStyle($rini)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle($rini)->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
		}
		if($bordes == ''){
			$objPHPExcel->getActiveSheet()->getStyle($rini.':'.$rfin)->applyFromArray($styleArray);
		}

		if($hgt != 0){
			$num = substr($rini, 1);
			$objPHPExcel->getActiveSheet()->getRowDimension($num)->setRowHeight($hgt);
		}

		if($wrap != '')
		{
			$objPHPExcel->getActiveSheet()->getStyle($rini)->getAlignment()->setWrapText(true);
		}

		if($moneda != ''){
			$objPHPExcel->getActiveSheet()->getStyle($rini)->getNumberFormat()->setFormatCode('$  #,##0.00');
		}


	}




	public function anchoColumnas($objPHPExcel, $columnas){
		for ($i=0;$i<count($columnas);$i++) {
		        $objPHPExcel->getActiveSheet()->getColumnDimension($columnas[$i])->setWidth(12);
		    }

	}

	public function get_fecha($fecha){
		if(isset($fecha)){
			return date("d-m-Y",  strtotime($fecha));
		}else{
			return '';
		};
	}
}
