<?php namespace App\Modules\Reportes\Servicios;

class Completas{
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

		//LOGO
		$objDrawing = new \PHPExcel_Worksheet_Drawing();
		$objDrawing->setPath('../public/assets/images/logo.jpeg');
		$objDrawing->setHeight(45);
		$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

		$objPHPExcel->getActiveSheet()->mergeCells('B1:G1');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'REPORTE DE OBRAS CON LA INFORMACION DE TODOS LOS DEPARTAMENTOS');
		$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->mergeCells('B2:AI2');
		$objPHPExcel->getActiveSheet()->setCellValue('B2', 'INFORMACION DE PLANEACION');
		$objPHPExcel->getActiveSheet()->mergeCells('AJ2:AU2');
		$objPHPExcel->getActiveSheet()->setCellValue('AJ2', 'INFORMACION DE LICITACIONES');
		$objPHPExcel->getActiveSheet()->mergeCells('AV2:AX2');
		$objPHPExcel->getActiveSheet()->setCellValue('AV2', 'INFORMACION DE OBRAS');
		$objPHPExcel->getActiveSheet()->mergeCells('AY2:BN2');
		$objPHPExcel->getActiveSheet()->setCellValue('AY2', 'INFORMACION DE ADMINISTRACION');

		$objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AJ2')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('AJ2')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AV2')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('AV2')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AY2')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('AY2')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(15);
		$objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(15);
		$objPHPExcel->getActiveSheet()->getRowDimension(3)->setRowHeight(15);

		$objPHPExcel->getActiveSheet()->getStyle('B2:AI2')->getFill()
			->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('FFCCFFCC');
		$objPHPExcel->getActiveSheet()->getStyle('AJ2:AU2')->getFill()
			->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('FFFFFF00');
		$objPHPExcel->getActiveSheet()->getStyle('AV2:AX2')->getFill()
			->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('FF00CCFF');
		$objPHPExcel->getActiveSheet()->getStyle('AY2:BN2')->getFill()
			->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('FFFF9900');



		$objPHPExcel->getActiveSheet()
		            ->setCellValue('A3', 'NUMERO')
		            ->setCellValue('B3','PPI')
		            ->setCellValue('C3','NOMBRE PPI')
		            ->setCellValue('D3','REGION')
		            ->setCellValue('E3','DISTRITO')
		            ->setCellValue('F3','MUNICIPIO')
		            ->setCellValue('G3','LOCALIDAD')
		           ->setCellValue('H3','PROGRAMA')
		            ->setCellValue('I3','SUBPROGRAMA')
		            ->setCellValue('J3','TIPO')
		            ->setCellValue('K3','NUMERO DE OBRA')
		            ->setCellValue('L3','NOMBRE DE LA OBRA')
		            ->setCellValue('M3','FUENTE')
		            ->setCellValue('N3','SUBFUENTE')
		            ->setCellValue('O3','ORIGEN')
		            ->setCellValue('P3','SUBORIGEN')
		            ->setCellValue('Q3','CLASIFICACION SUBORIGEN')
		            ->setCellValue('R3','FINANCIAMIENTO')
		            ->setCellValue('S3','EJERCICIO')
		            ->setCellValue('T3','SITUACION')
		            ->setCellValue('U3','NOMBRE ACCION')
		            ->setCellValue('V3','UNIDAD DE MEDIDA')
		            ->setCellValue('W3','META')
		           ->setCellValue('X3','CANTIDAD')
		           ->setCellValue('Y3','POBLACION')
		            ->setCellValue('Z3','MUJERES')
		            ->setCellValue('AA3','HOMBRES')
		            ->setCellValue('AB3','CARACTERISTICAS')
		            ->setCellValue('AC3','MODALIDAD')
		            ->setCellValue('AD3','COMENTARIOS')
		            ->setCellValue('AE3','CONCEPTOS A EJECUTAR')
		            ->setCellValue('AF3','OBSERVACIONES')
		            ->setCellValue('AG3','CODIGO DE ACCION')
		            ->setCellValue('AH3','OBSERVACIONES DE SEGUIMIENTO')
		            ->setCellValue('AI3','FUENTE GENERAL')
		            ->setCellValue('AJ3','PROCEDIMIENTO')
		            ->setCellValue('AK3','CONTRATO')
		            ->setCellValue('AL3','FUENTE GENERAL')
		            ->setCellValue('AM3','ANTICIPO')
		            ->setCellValue('AN3','FECHA')
		            ->setCellValue('AO3','DIAS DE EJECUCION')
		            ->setCellValue('AP3','FECHA DE INICIO')
		            ->setCellValue('AQ3','FECHA FINAL')
		            ->setCellValue('AR3','CONTRATISTA')
		            ->setCellValue('AS3','ENTIDAD FEDERATIVA')
		            ->setCellValue('AT3','CMIC')
		            ->setCellValue('AU3','MODALIDAD DE CONTRATACION')
		            ->setCellValue('AV3','POA')
		            ->setCellValue('AW3','EVENTO')
		            ->setCellValue('AX3','OBSERVACIONES')
		            ->setCellValue('AY3','CLC')
		            ->setCellValue('AZ3','FECHA DE ELABORACION')
		            ->setCellValue('BA3','FECHA DE RECEPCION')
		            ->setCellValue('BB3','NUMERO FACTURA')
		            ->setCellValue('BC3','CONCEPTO')
		            ->setCellValue('BD3','FIANZA')
		            ->setCellValue('BE3','SPEI')
		            ->setCellValue('BF3','MINISTRADO')
		            ->setCellValue('BG3','5 %')
		            ->setCellValue('BH3','2 %')
		            ->setCellValue('BI3','RADICADO')
		            ->setCellValue('BJ3','ORDEN')
		            ->setCellValue('BK3','NUMERO DE CHEQUE')
		            ->setCellValue('BL3','FECHA CHEQUE')
		            ->setCellValue('BM3','MONTO PAGADO')
		            ->setCellValue('BN3','AMORTIZACION DE CREDITO PUENTE');
			$i=4;
			foreach ($datos as $key => $dato) {
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $dato->id);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $dato->ppi);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $dato->nombreppi);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $dato->nombre_region);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $dato->nombre_distrito);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $dato->nombre_municipio);
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $dato->nombre_localidad);
				$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $dato->nombreprograma);
				$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $dato->nombresubprograma);
				$objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $dato->nombretipo);
				$objPHPExcel->getActiveSheet()->setCellValue('K'.$i, $dato->numeroobra);
				$objPHPExcel->getActiveSheet()->setCellValue('L'.$i, $dato->nombreobra);
				$objPHPExcel->getActiveSheet()->setCellValue('M'.$i, $dato->nombre_fuente);
				$objPHPExcel->getActiveSheet()->setCellValue('N'.$i, $dato->nombresubfuente);
				$objPHPExcel->getActiveSheet()->setCellValue('O'.$i, $dato->nombreorigen);
				$objPHPExcel->getActiveSheet()->setCellValue('P'.$i, $dato->nombresuborigen);
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.$i, $dato->nombreclasificacion);
				$objPHPExcel->getActiveSheet()->setCellValue('R'.$i, $dato->nombrefinanciamiento);
				$objPHPExcel->getActiveSheet()->setCellValue('S'.$i, $dato->ejercicio);
				$objPHPExcel->getActiveSheet()->setCellValue('T'.$i, $dato->nombresituacion);
				$objPHPExcel->getActiveSheet()->setCellValue('U'.$i, $dato->nombreaccion);
				$objPHPExcel->getActiveSheet()->setCellValue('V'.$i, $dato->nombremedida);
				$objPHPExcel->getActiveSheet()->setCellValue('W'.$i, $dato->nombremeta);
				$objPHPExcel->getActiveSheet()->setCellValue('X'.$i, $dato->cantidad);
				$objPHPExcel->getActiveSheet()->setCellValue('Y'.$i, $dato->nombrepoblacion);
				$objPHPExcel->getActiveSheet()->setCellValue('Z'.$i, $dato->bmujeres);
				$objPHPExcel->getActiveSheet()->setCellValue('AA'.$i, $dato->bhombres);
				$objPHPExcel->getActiveSheet()->setCellValue('AB'.$i, $dato->caracteristicas);
				$objPHPExcel->getActiveSheet()->setCellValue('AC'.$i, $dato->nombremodalidad);
				$objPHPExcel->getActiveSheet()->setCellValue('AD'.$i, $dato->comentarios);
				$objPHPExcel->getActiveSheet()->setCellValue('AE'.$i, $dato->concejecutar);
				$objPHPExcel->getActiveSheet()->setCellValue('AF'.$i, $dato->observaciones);
				$objPHPExcel->getActiveSheet()->setCellValue('AG'.$i, $dato->codigoaccion);
				$objPHPExcel->getActiveSheet()->setCellValue('AH'.$i, $dato->observacionesseg);
				$objPHPExcel->getActiveSheet()->setCellValue('AI'.$i, $dato->fuentegeneral);
				$objPHPExcel->getActiveSheet()->setCellValue('AJ'.$i, $dato->l_procedimiento);
				$objPHPExcel->getActiveSheet()->setCellValue('AK'.$i, $dato->l_contrato);
				$objPHPExcel->getActiveSheet()->setCellValue('AL'.$i, $dato->l_montocontratado);
				$objPHPExcel->getActiveSheet()->setCellValue('AM'.$i, $dato->l_anticipo);
				$objPHPExcel->getActiveSheet()->setCellValue('AN'.$i, $dato->l_fecha);
				$objPHPExcel->getActiveSheet()->setCellValue('AO'.$i, $dato->l_ndias);
				$objPHPExcel->getActiveSheet()->setCellValue('AP'.$i, $dato->l_finicio);
				$objPHPExcel->getActiveSheet()->setCellValue('AQ'.$i, $dato->l_ffinal);
				$objPHPExcel->getActiveSheet()->setCellValue('AR'.$i, $dato->razsoc);
				$objPHPExcel->getActiveSheet()->setCellValue('AS'.$i, $dato->estado);
				$objPHPExcel->getActiveSheet()->setCellValue('AT'.$i, $dato->l_cmic);
				$objPHPExcel->getActiveSheet()->setCellValue('AU'.$i, $dato->l_modcontrato);
				$objPHPExcel->getActiveSheet()->setCellValue('AV'.$i, $dato->poa);
				$objPHPExcel->getActiveSheet()->setCellValue('AW'.$i, $dato->evento);
				$objPHPExcel->getActiveSheet()->setCellValue('AX'.$i, $dato->observaciones);
				$objPHPExcel->getActiveSheet()->setCellValue('AY'.$i, $dato->clc);
				$objPHPExcel->getActiveSheet()->setCellValue('AZ'.$i, $dato->felab);
				$objPHPExcel->getActiveSheet()->setCellValue('BA'.$i, $dato->frecp);
				$objPHPExcel->getActiveSheet()->setCellValue('BB'.$i, $dato->numfactura);
				$objPHPExcel->getActiveSheet()->setCellValue('BC'.$i, $dato->concepto);
				$objPHPExcel->getActiveSheet()->setCellValue('BD'.$i, $dato->fianza);
				$objPHPExcel->getActiveSheet()->setCellValue('BE'.$i, $dato->spei);
				$objPHPExcel->getActiveSheet()->setCellValue('BF'.$i, $dato->ministrado);
				$objPHPExcel->getActiveSheet()->setCellValue('BG'.$i, $dato->porc5);
				$objPHPExcel->getActiveSheet()->setCellValue('BH'.$i, $dato->porc2);
				$objPHPExcel->getActiveSheet()->setCellValue('BI'.$i, $dato->radicado);
				$objPHPExcel->getActiveSheet()->setCellValue('BJ'.$i, $dato->orden);
				$objPHPExcel->getActiveSheet()->setCellValue('BK'.$i, $dato->numcheque);
				$objPHPExcel->getActiveSheet()->setCellValue('BL'.$i, $dato->fcheque);
				$objPHPExcel->getActiveSheet()->setCellValue('BM'.$i, $dato->montopagado);
				$objPHPExcel->getActiveSheet()->setCellValue('BN'.$i, $dato->amort_cred_pte);
				$i++;
		}


		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename=Informacion Completa.xlsx');
		$objWriter =  \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}

}
