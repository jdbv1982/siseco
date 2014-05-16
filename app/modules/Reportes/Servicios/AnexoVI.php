<?php namespace App\Modules\Reportes\Servicios;

use App\Modules\Reportes\Servicios\Funciones;

class AnexoVI{
	public function printInformacion($datos, $datos_reporte, $estructura, $programado, $fisico, $financiero, $prorrogas){
		$styleArray = array(
			'font' => array(
				'bold' => true,
			),
			'alignment' => array(
				'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			),
		);


		setlocale (LC_TIME,"spanish");
		$f = new Funciones;

		$objPHPExcel = new \PHPExcel();

		$objPHPExcel->getDefaultStyle()->getFont()->setSize(12);

		//LOGO
		$objDrawing = new \PHPExcel_Worksheet_Drawing();
		$objDrawing->setPath('../public/assets/images/finanzasa6.png');
		$objDrawing->setHeight(55);
		$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
		$objDrawing->setCoordinates('B1');

		//titulo
		$f->mergeCelda($objPHPExcel,'B2','P2','Gobierno del Estado de Oaxaca, Secretaria de Finanzas, Anexo VI. Seguimiento','','CENTER','NO');
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);
		//primera linea
		$f->mergeCelda($objPHPExcel,'B4','C4','CÓDIGO DE REGISTRO DE PPI','FFC0C0C0');
		$f->mergeCelda($objPHPExcel,'D4','H4',$datos->ppi,'','CENTER');
		$f->mergeCelda($objPHPExcel,'I4','L4','CODIGO DE LA ACCION','FFC0C0C0');
		$f->mergeCelda($objPHPExcel,'M4','P4',$datos->codigoaccion,'','CENTER');


		//DATOS DEL EJECUTOR
		$f->mergeCelda($objPHPExcel,'B5','P5','DATOS DEL EJECUTOR','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'B6','C6','GRUPO','FFC0C0C0');
		$f->mergeCelda($objPHPExcel,'D6','H6',$datos_reporte->campo1,'','CENTER');
		$f->mergeCelda($objPHPExcel,'I6','L6','UNIDAD EJECUTORA','FFC0C0C0');
		$f->mergeCelda($objPHPExcel,'M6','P6',$datos->depejecutora,'','CENTER');
		$f->mergeCelda($objPHPExcel,'B7','C7','UNIDAD RESPONSABLE','FFC0C0C0','CENTER','',25);
		$f->mergeCelda($objPHPExcel,'D7','H7',$datos_reporte->campo2,'','CENTER');
		$f->mergeCelda($objPHPExcel,'I7','L7','NOMBRE DE LA AUTORIDAD MUNICIPAL','FFC0C0C0');
		$f->mergeCelda($objPHPExcel,'M7','P7','NO APLICA','','CENTER');

		//DATOS GENERALES DE LA ACCION
		$f->mergeCelda($objPHPExcel,'B8','P8','DATOS GENERALES DE LA ACCION','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'B9','C9','NOMBRE DE LA ACCION','FFC0C0C0');
		$f->mergeCelda($objPHPExcel,'D9','P9',$datos->nombreobra,'','CENTER','',70,'S');
		$f->mergeCelda($objPHPExcel,'B10','C10','MUNICIPIO','FFC0C0C0');
		$f->mergeCelda($objPHPExcel,'D10','H10',$datos->nombre_municipio,'','CENTER');
		$f->mergeCelda($objPHPExcel,'I10','L10','LOCALIDAD','FFC0C0C0');
		$f->mergeCelda($objPHPExcel,'M10','P10',$datos->nombre_localidad,'','CENTER');
		$f->mergeCelda($objPHPExcel,'B11','D11','MODALIDAD DE EJECUCION','FFC0C0C0');
		$f->mergeCelda($objPHPExcel,'E11','H11',$datos->nombremodalidad,'','CENTER');
		$f->mergeCelda($objPHPExcel,'I11','P11','','FFC0C0C0');

		//ESTRUCTURA FINANCIERA
		$f->mergeCelda($objPHPExcel,'B12','P12','ESTRUCTURA FINANCIERA','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'B13','D13','FONDO','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'E13','F13','FEDERAL','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'G13','H13','ESTATAL','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'I13','J13','MUNICIPAL','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'K13','L13','INDIRECTOS','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'M13','N13','TOTAL','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'O13','P13','OFICIO DE AUTORIZACION','FFC0C0C0','CENTER');

		$f->mergeCelda($objPHPExcel,'B14','D14',$datos->nombrefinanciamiento,'','CENTER','',90);
		$f->mergeCelda($objPHPExcel,'E14','F14',$estructura->federal,'','CENTER','','','','$');
		$f->mergeCelda($objPHPExcel,'G14','H14',$estructura->estatal,'','CENTER','','','','$');
		$f->mergeCelda($objPHPExcel,'I14','J14',$estructura->municipal,'','CENTER','','','','$');
		$f->mergeCelda($objPHPExcel,'K14','L14',$estructura->participantes,'','CENTER','','','','$');
		$f->mergeCelda($objPHPExcel,'M14','N14',$estructura->total,'FFC0C0C0','CENTER','','','','$');
		$f->mergeCelda($objPHPExcel,'O14','P14',$datos->numerooficio,'','CENTER');

		//DATOS DE EJECUCIÓN DE LA ACCIÓN
		$f->mergeCelda($objPHPExcel,'B16','P16','DATOS DE EJECUCIÓN DE LA ACCIÓN','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'B17','D17','No. DE CONTRATO','FFC0C0C0');
		$f->mergeCelda($objPHPExcel,'E17','H17',$datos->l_contrato,'','CENTER');
		$f->mergeCelda($objPHPExcel,'B18','D18','MONTO CONTRATADO','FFC0C0C0');
		$f->mergeCelda($objPHPExcel,'E18','H18',$datos->l_montocontratado,'','','','','','$');
		$f->mergeCelda($objPHPExcel,'B19','B19','ANTICIPO','FFC0C0C0');
		$f->mergeCelda($objPHPExcel,'C19','F19',$datos->l_anticipo,'','','','','','$');
		$porc_anticipo = round($datos->l_anticipo * 100 / $datos->l_montocontratado);
		$f->mergeCelda($objPHPExcel,'G19','H19',$porc_anticipo.' %','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'B20','D20','FECHA PAGADO','FFC0C0C0');
		$f->mergeCelda($objPHPExcel,'E20','H20','');//fecha de pago de Administracion
		$f->mergeCelda($objPHPExcel,'B21','D21','No DE CONVENIO','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'E21','H21','');//convenio
		$f->mergeCelda($objPHPExcel,'B22','B23','PLAZO DE EJECUCIÓN','FFC0C0C0','CENTER','','','S');
		$f->mergeCelda($objPHPExcel,'C23','E23', date("d-m-Y",  strtotime($datos->l_finicio)),'','CENTER');
		$f->mergeCelda($objPHPExcel,'F23','H23',date("d-m-Y",  strtotime($datos->l_ffinal)),'','CENTER');
		$f->mergeCelda($objPHPExcel,'C22','E22','INICIO','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'F22','H22','TÉRMINO','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'B24','B24','PRORROGA 1','FFC0C0C0');

		if(isset($prorrogas[0]->finicio)){$finicio1 = $f->get_fecha($prorrogas[0]->finicio);}else{$finicio1='';};
		if(isset($prorrogas[0]->ffinal)){$ffinal1 = $f->get_fecha($prorrogas[0]->ffinal);}else{$ffinal1='';};
		if(isset($prorrogas[1]->finicio)){$finicio2 = $f->get_fecha($prorrogas[1]->finicio);}else{$finicio2='';};
		if(isset($prorrogas[1]->ffinal)){$ffinal2 = $f->get_fecha($prorrogas[1]->ffinal);}else{$ffianl2='';};
		if(isset($prorrogas[2]->finicio)){$finicio3 = $f->get_fecha($prorrogas[2]->finicio);}else{$finicio3='';};
		if(isset($prorrogas[2]->ffinal)){$ffinal3 = $f->get_fecha($prorrogas[2]->ffinal);}else{$ffinal3='';};

		$f->mergeCelda($objPHPExcel,'C24','E24',$finicio1,'','CENTER');
		$f->mergeCelda($objPHPExcel,'F24','H24',$ffinal1,'','CENTER' );
		$f->mergeCelda($objPHPExcel,'B25','B25','PRORROGA 2','FFC0C0C0');
		$f->mergeCelda($objPHPExcel,'C25','E25',$finicio2,'','CENTER');
		$f->mergeCelda($objPHPExcel,'F25','H25',$ffinal2,'','CENTER' );
		$f->mergeCelda($objPHPExcel,'B26','B26','PRORROGA 3','FFC0C0C0');

		$f->mergeCelda($objPHPExcel,'C26','E26',$finicio3,'','CENTER');
		$f->mergeCelda($objPHPExcel,'F26','H26',$ffinal3,'','CENTER');
		$f->mergeCelda($objPHPExcel,'I17','P17','DESCRIPCIÓN DE LA ACCIÓN','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'I18','P25',$datos->observacionesseg,'','CENTER','','','S');

		//RESUMEN FINANCIERO
		$f->mergeCelda($objPHPExcel,'B27','P27','RESUMEN FINANCIERO','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'B28','D28','AUTORIZADO','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'E28','H28','CONTRATADO','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'I28','L28','ANTICIPO AMORTIZADO','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'M28','P28','EJERCIDO','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'B29','D29',$estructura->total,'FFC0C0C0','','','','','$');
		$f->mergeCelda($objPHPExcel,'E29','H29',$datos->l_montocontratado,'FFC0C0C0','','','','','$');
		$f->mergeCelda($objPHPExcel,'I29','L29','0','','','','','','$');
		$f->mergeCelda($objPHPExcel,'M29','P29','0','','','','','','$');

		//DESCRIPCIÓN DE LAS PARTIDAS PRINCIPALES
		$f->mergeCelda($objPHPExcel,'B31','P31','DESCRIPCIÓN DE LAS PARTIDAS PRINCIPALES','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'B32','H33','CONCEPTO','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'I32','P32','AVANCE FISICO','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'I33','J33','PONDERACION','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'K33','L33','PROGRAMADO','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'M33','N33','EJECUTADO','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'O33','P33','POR EJECUTAR','FFC0C0C0','CENTER');

		$f->mergeCelda($objPHPExcel,'B34','H34','','','CENTER','',120);
		$f->mergeCelda($objPHPExcel,'I34','J34','100 %','','CENTER');
		$f->mergeCelda($objPHPExcel,'K34','L34','100 %','','CENTER');
		$f->mergeCelda($objPHPExcel,'M34','N34',$fisico[11].'%','','CENTER');
		$f->mergeCelda($objPHPExcel,'O34','P34',100-$fisico[11].'%','FFC0C0C0','CENTER');


		$f->mergeCelda($objPHPExcel,'B35','H35','TOTAL (%)','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'I35','J35','0%','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'K35','L35','0%','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'M35','N35','0%','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'O35','P35','0%','FFC0C0C0','CENTER');

		//CALENDARIO DE EJECUCION
		$f->mergeCelda($objPHPExcel,'B37','P37','CALENDARIO DE EJECUCION','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'B38','C38','AVANCES','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'D38','D38','ENE','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'E38','E38','FEB','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'F38','F38','MAR','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'G38','G38','ABR','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'H38','H38','MAY','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'I38','I38','JUN','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'J38','J38','JUL','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'K38','K38','AGO','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'L38','L38','SEP','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'M38','M38','OCT','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'N38','N38','NOV','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'O38','O38','DIC','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'P38','P38','TOTAL','FFC0C0C0','CENTER');

		$f->mergeCelda($objPHPExcel,'B39','B40','FISICO','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'C39','C39','PROG','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'D39','D39',$programado[0].'%');
		$f->mergeCelda($objPHPExcel,'E39','E39',$programado[1].'%');
		$f->mergeCelda($objPHPExcel,'F39','F39',$programado[2].'%');
		$f->mergeCelda($objPHPExcel,'G39','G39',$programado[3].'%');
		$f->mergeCelda($objPHPExcel,'H39','H39',$programado[4].'%');
		$f->mergeCelda($objPHPExcel,'I39','I39',$programado[5].'%');
		$f->mergeCelda($objPHPExcel,'J39','J39',$programado[6].'%');
		$f->mergeCelda($objPHPExcel,'K39','K39',$programado[7].'%');
		$f->mergeCelda($objPHPExcel,'L39','L39',$programado[8].'%');
		$f->mergeCelda($objPHPExcel,'M39','M39',$programado[9].'%');
		$f->mergeCelda($objPHPExcel,'N39','N39',$programado[10].'%');
		$f->mergeCelda($objPHPExcel,'O39','O39',$programado[11].'%');
		$f->mergeCelda($objPHPExcel,'P39','P39',$programado[12].'%','FFC0C0C0','CENTER');

		$f->mergeCelda($objPHPExcel,'C40','C40','REAL','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'D40','D40',$fisico[0].'%');
		$f->mergeCelda($objPHPExcel,'E40','E40',$fisico[1].'%');
		$f->mergeCelda($objPHPExcel,'F40','F40',$fisico[2].'%');
		$f->mergeCelda($objPHPExcel,'G40','G40',$fisico[3].'%');
		$f->mergeCelda($objPHPExcel,'H40','H40',$fisico[4].'%');
		$f->mergeCelda($objPHPExcel,'I40','I40',$fisico[5].'%');
		$f->mergeCelda($objPHPExcel,'J40','J40',$fisico[6].'%');
		$f->mergeCelda($objPHPExcel,'K40','K40',$fisico[7].'%');
		$f->mergeCelda($objPHPExcel,'L40','L40',$fisico[8].'%');
		$f->mergeCelda($objPHPExcel,'M40','M40',$fisico[9].'%');
		$f->mergeCelda($objPHPExcel,'N40','N40',$fisico[10].'%');
		$f->mergeCelda($objPHPExcel,'O40','O40',$fisico[11].'%');
		$f->mergeCelda($objPHPExcel,'P40','P40',$fisico[12].'%','FFC0C0C0','CENTER');

		$f->mergeCelda($objPHPExcel,'B41','B42','FINANCIERO','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'C41','C41','PROG','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'D41','D41',$programado[0].'%');
		$f->mergeCelda($objPHPExcel,'E41','E41',$programado[1].'%');
		$f->mergeCelda($objPHPExcel,'F41','F41',$programado[2].'%');
		$f->mergeCelda($objPHPExcel,'G41','G41',$programado[3].'%');
		$f->mergeCelda($objPHPExcel,'H41','H41',$programado[4].'%');
		$f->mergeCelda($objPHPExcel,'I41','I41',$programado[5].'%');
		$f->mergeCelda($objPHPExcel,'J41','J41',$programado[6].'%');
		$f->mergeCelda($objPHPExcel,'K41','K41',$programado[7].'%');
		$f->mergeCelda($objPHPExcel,'L41','L41',$programado[8].'%');
		$f->mergeCelda($objPHPExcel,'M41','M41',$programado[9].'%');
		$f->mergeCelda($objPHPExcel,'N41','N41',$programado[10].'%');
		$f->mergeCelda($objPHPExcel,'O41','O41',$programado[11].'%');
		$f->mergeCelda($objPHPExcel,'P41','P41',$programado[12].'%','FFC0C0C0','CENTER');

		$f->mergeCelda($objPHPExcel,'C42','C42','REAL','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'D42','D42',$financiero[0].'%');
		$f->mergeCelda($objPHPExcel,'E42','E42',$financiero[1].'%');
		$f->mergeCelda($objPHPExcel,'F42','F42',$financiero[2].'%');
		$f->mergeCelda($objPHPExcel,'G42','G42',$financiero[3].'%');
		$f->mergeCelda($objPHPExcel,'H42','H42',$financiero[4].'%');
		$f->mergeCelda($objPHPExcel,'I42','I42',$financiero[5].'%');
		$f->mergeCelda($objPHPExcel,'J42','J42',$financiero[6].'%');
		$f->mergeCelda($objPHPExcel,'K42','K42',$financiero[7].'%');
		$f->mergeCelda($objPHPExcel,'L42','L42',$financiero[8].'%');
		$f->mergeCelda($objPHPExcel,'M42','M42',$financiero[9].'%');
		$f->mergeCelda($objPHPExcel,'N42','N42',$financiero[10].'%');
		$f->mergeCelda($objPHPExcel,'O42','O42',$financiero[11].'%');
		$f->mergeCelda($objPHPExcel,'P42','P42',$financiero[12].'%','FFC0C0C0','CENTER');

		//PROBLEMATICA
		$f->mergeCelda($objPHPExcel,'B44','P44','PROBLEMATICA','FFC0C0C0','CENTER');
		$f->mergeCelda($objPHPExcel,'B45','P45',$datos->observaciones,'','CENTER','',120,'S');

		//FIRMAS
		$f->mergeCelda($objPHPExcel,'C47','H47',$datos_reporte->campo5,'','CENTER','NO');
		$f->mergeCelda($objPHPExcel,'C48','H48','____________________________________________________','','CENTER','NO');
		$f->mergeCelda($objPHPExcel,'C49','H49','Nombre y Firma del Servidor Publico Autorizado','','CENTER','NO');

		$f->mergeCelda($objPHPExcel,'K47','O47','Oaxaca de Juarez, Oaxaca a ' . strftime("%d de %B %Y"),'','CENTER','NO');
		$f->mergeCelda($objPHPExcel,'K48','O48','______________________________________','','CENTER','NO');
		$f->mergeCelda($objPHPExcel,'K49','O49','Lugar y Fecha','','CENTER','NO');

		$f->mergeCelda($objPHPExcel,'B51','P51','El Servidor Público Autorizado constata  que la información señalada en el presente formato es verídica y verificable, cumple con lo establecido en la Ley de Obras Públicas y Servicios relacionados con las Mismas y demás normatividad  Estatal y Federal vigente aplicable.','','CENTER','NO',35,'S');

		$f->anchoColumnas($objPHPExcel, array('B','C','D','E','F','G','H','I','J','K','L','M','N','O','P'));

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename=AnexoVI.xlsx');
		$objWriter =  \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}







}
