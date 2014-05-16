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

		$objPHPExcel->getActiveSheet()->mergeCells('B1:BO1');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'REPORTE DE OBRAS CON LA INFORMACION DE TODOS LOS DEPARTAMENTOS');
		$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


		$objPHPExcel->getActiveSheet()->mergeCells('B3:AI3');
		$objPHPExcel->getActiveSheet()->setCellValue('B3', 'INFORMACION DE PLANEACION');
		$objPHPExcel->getActiveSheet()->mergeCells('AJ3:AV3');
		$objPHPExcel->getActiveSheet()->setCellValue('AJ3', 'INFORMACION DE LICITACIONES');
		$objPHPExcel->getActiveSheet()->mergeCells('AW3:AZ3');
		$objPHPExcel->getActiveSheet()->setCellValue('AW3', 'INFORMACION DE FONDEN');
		$objPHPExcel->getActiveSheet()->mergeCells('BA3:BQ3');
		$objPHPExcel->getActiveSheet()->setCellValue('BA3', 'INFORMACION DE ADMINISTRACION');

		$objPHPExcel->getActiveSheet()->getStyle('B3')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('B3')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AJ3')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('AJ3')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AW3')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('AW3')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('BA3')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('BA3')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(15);
		$objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(15);
		$objPHPExcel->getActiveSheet()->getRowDimension(3)->setRowHeight(15);

		$objPHPExcel->getActiveSheet()->getStyle('B3:AI3')->getFill()
			->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('FFCCFFCC');
		$objPHPExcel->getActiveSheet()->getStyle('AJ3:AU3')->getFill()
			->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('FFFFFF00');
		$objPHPExcel->getActiveSheet()->getStyle('AW3:AZ3')->getFill()
			->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('FF00CCFF');
		$objPHPExcel->getActiveSheet()->getStyle('BA3:BQ3')->getFill()
			->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('FFFF9900');



		$objPHPExcel->getActiveSheet()
		            ->setCellValue('A4', 'NUMERO')
		            ->setCellValue('B4','PPI')
		            ->setCellValue('C4','NOMBRE PPI')
		            ->setCellValue('D4','REGION')
		            ->setCellValue('E4','DISTRITO')
		            ->setCellValue('F4','MUNICIPIO')
		            ->setCellValue('G4','LOCALIDAD')
		           ->setCellValue('H4','PROGRAMA')
		            ->setCellValue('I4','SUBPROGRAMA')
		            ->setCellValue('J4','TIPO')
		            ->setCellValue('K4','NUMERO DE OBRA')
		            ->setCellValue('L4','NOMBRE DE LA OBRA')
		            ->setCellValue('M4','FUENTE')
		            ->setCellValue('N4','SUBFUENTE')
		            ->setCellValue('O4','ORIGEN')
		            ->setCellValue('P4','SUBORIGEN')
		            ->setCellValue('Q4','CLASIFICACION SUBORIGEN')
		            ->setCellValue('R4','FINANCIAMIENTO')
		            ->setCellValue('S4','EJERCICIO')
		            ->setCellValue('T4','SITUACION')
		            ->setCellValue('U4','NOMBRE ACCION')
		            ->setCellValue('V4','UNIDAD DE MEDIDA')
		            ->setCellValue('W4','META')
		           ->setCellValue('X4','CANTIDAD')
		           ->setCellValue('Y4','POBLACION')
		            ->setCellValue('Z4','MUJERES')
		            ->setCellValue('AA4','HOMBRES')
		            ->setCellValue('AB4','TOTAL')
		            ->setCellValue('AC4','CARACTERISTICAS')
		            ->setCellValue('AD4','MODALIDAD')
		            ->setCellValue('AR4','COMENTARIOS')
		            ->setCellValue('AF4','CONCEPTOS A EJECUTAR')
		            ->setCellValue('AG4','OBSERVACIONES')
		            ->setCellValue('AH4','CODIGO DE ACCION')
		            ->setCellValue('AI4','OBSERVACIONES DE SEGUIMIENTO')
		            ->setCellValue('AJ4','FUENTE GENERAL')
		            ->setCellValue('AK4','PROCEDIMIENTO')
		            ->setCellValue('AL4','CONTRATO')
		            ->setCellValue('AM4','FUENTE GENERAL')
		            ->setCellValue('AN4','ANTICIPO')
		            ->setCellValue('AO4','FECHA')
		            ->setCellValue('AP4','DIAS DE EJECUCION')
		            ->setCellValue('AQ4','FECHA DE INICIO')
		            ->setCellValue('AR4','FECHA FINAL')
		            ->setCellValue('AS4','CONTRATISTA')
		            ->setCellValue('AT4','ENTIDAD FEDERATIVA')
		            ->setCellValue('AU4','CMIC')
		            ->setCellValue('AV4','MODALIDAD DE CONTRATACION')
		            ->setCellValue('AW4','POA')
		            ->setCellValue('AX4','EVENTO')
		            ->setCellValue('AY4','OBSERVACIONES')
		            ->setCellValue('AZ4','AVANCE FISICO')
		            ->setCellValue('BA4','CLC')
		            ->setCellValue('BB4','FECHA DE ELABORACION')
		            ->setCellValue('BC4','FECHA DE RECEPCION')
		            ->setCellValue('BD4','NUMERO FACTURA')
		            ->setCellValue('BE4','CONCEPTO')
		            ->setCellValue('BF4','FIANZA')
		            ->setCellValue('BG4','MINISTRADO')
		            ->setCellValue('BH4','5 %')
		            ->setCellValue('BI4','2 %')
		            ->setCellValue('BJ4','RADICADO')
		            ->setCellValue('BK4','ORDEN')
		            ->setCellValue('BL4','SPEI')
		            ->setCellValue('BM4','NUMERO DE CHEQUE')
		            ->setCellValue('BN4','FECHA CHEQUE')
		            ->setCellValue('BO4','MONTO PAGADO')
		            ->setCellValue('BP4','AMORTIZACION DE CREDITO PUENTE')
		            ->setCellValue('BQ4','AVANCE FINANCIERO');
			$i=5;
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
				$objPHPExcel->getActiveSheet()->setCellValue('AB'.$i, $dato->bhombres+ $dato->bmujeres);
				$objPHPExcel->getActiveSheet()->setCellValue('AC'.$i, $dato->caracteristicas);
				$objPHPExcel->getActiveSheet()->setCellValue('AD'.$i, $dato->nombremodalidad);
				$objPHPExcel->getActiveSheet()->setCellValue('AE'.$i, $dato->comentarios);
				$objPHPExcel->getActiveSheet()->setCellValue('AF'.$i, $dato->concejecutar);
				$objPHPExcel->getActiveSheet()->setCellValue('AG'.$i, $dato->observaciones);
				$objPHPExcel->getActiveSheet()->setCellValue('AH'.$i, $dato->codigoaccion);
				$objPHPExcel->getActiveSheet()->setCellValue('AI'.$i, $dato->observacionesseg);
				$objPHPExcel->getActiveSheet()->setCellValue('AJ'.$i, $dato->fuentegeneral);
				$objPHPExcel->getActiveSheet()->setCellValue('AK'.$i, $dato->l_procedimiento);
				$objPHPExcel->getActiveSheet()->setCellValue('AL'.$i, $dato->l_contrato);
				$objPHPExcel->getActiveSheet()->setCellValue('AM'.$i, $dato->l_montocontratado);
				$objPHPExcel->getActiveSheet()->setCellValue('AN'.$i, $dato->l_anticipo);
				$objPHPExcel->getActiveSheet()->setCellValue('AO'.$i, $dato->l_fecha);
				$objPHPExcel->getActiveSheet()->setCellValue('AP'.$i, $dato->l_ndias);
				$objPHPExcel->getActiveSheet()->setCellValue('AQ'.$i, $dato->l_finicio);
				$objPHPExcel->getActiveSheet()->setCellValue('AR'.$i, $dato->l_ffinal);
				$objPHPExcel->getActiveSheet()->setCellValue('AS'.$i, $dato->razsoc);
				$objPHPExcel->getActiveSheet()->setCellValue('AT'.$i, $dato->estado);
				$objPHPExcel->getActiveSheet()->setCellValue('AU'.$i, $dato->l_cmic);
				$objPHPExcel->getActiveSheet()->setCellValue('AV'.$i, $dato->l_modcontrato);
				$objPHPExcel->getActiveSheet()->setCellValue('AW'.$i, $dato->poa);
				$objPHPExcel->getActiveSheet()->setCellValue('AX'.$i, $dato->evento);
				$objPHPExcel->getActiveSheet()->setCellValue('AY'.$i, $dato->observaciones);
				$objPHPExcel->getActiveSheet()->setCellValue('AZ'.$i, $dato->afisico.'%');
				$objPHPExcel->getActiveSheet()->setCellValue('BA'.$i, $dato->clc);
				$objPHPExcel->getActiveSheet()->setCellValue('BB'.$i, $dato->felab);
				$objPHPExcel->getActiveSheet()->setCellValue('BC'.$i, $dato->frecp);
				$objPHPExcel->getActiveSheet()->setCellValue('BD'.$i, $dato->numfactura);
				$objPHPExcel->getActiveSheet()->setCellValue('BE'.$i, $dato->concepto);
				$objPHPExcel->getActiveSheet()->setCellValue('BF'.$i, $dato->fianza);
				$objPHPExcel->getActiveSheet()->setCellValue('BG'.$i, $dato->ministrado);
				$objPHPExcel->getActiveSheet()->setCellValue('BH'.$i, $dato->porc5);
				$objPHPExcel->getActiveSheet()->setCellValue('BI'.$i, $dato->porc2);
				$objPHPExcel->getActiveSheet()->setCellValue('BJ'.$i, $dato->radicado);
				$objPHPExcel->getActiveSheet()->setCellValue('BK'.$i, $dato->orden);
				$objPHPExcel->getActiveSheet()->setCellValue('BL'.$i, $dato->spei);
				$objPHPExcel->getActiveSheet()->setCellValue('BM'.$i, $dato->numcheque);
				$objPHPExcel->getActiveSheet()->setCellValue('BN'.$i, $dato->fcheque);
				$objPHPExcel->getActiveSheet()->setCellValue('BO'.$i, $dato->montopagado);
				$objPHPExcel->getActiveSheet()->setCellValue('BP'.$i, $dato->amort_cred_pte);
				$objPHPExcel->getActiveSheet()->setCellValue('BQ'.$i, $dato->afinanciero.'%');

				$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);

				$objPHPExcel->getActiveSheet()->getStyle('AM'.$i)->getNumberFormat()->setFormatCode('$#,##0.00');
				$objPHPExcel->getActiveSheet()->getStyle('AN'.$i)->getNumberFormat()->setFormatCode('$#,##0.00');
				$objPHPExcel->getActiveSheet()->getStyle('BG'.$i)->getNumberFormat()->setFormatCode('$#,##0.00');
				$objPHPExcel->getActiveSheet()->getStyle('BH'.$i)->getNumberFormat()->setFormatCode('$#,##0.00');
				$objPHPExcel->getActiveSheet()->getStyle('BI'.$i)->getNumberFormat()->setFormatCode('$#,##0.00');
				$objPHPExcel->getActiveSheet()->getStyle('BJ'.$i)->getNumberFormat()->setFormatCode('$#,##0.00');
				$objPHPExcel->getActiveSheet()->getStyle('BN'.$i)->getNumberFormat()->setFormatCode('$#,##0.00');
				$objPHPExcel->getActiveSheet()->getStyle('BO'.$i)->getNumberFormat()->setFormatCode('$#,##0.00');
				$i++;
		}


		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename=Informacion Completa.xlsx');
		$objWriter =  \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}

}
