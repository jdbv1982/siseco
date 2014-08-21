<?php namespace App\Modules\Caja\Servicios;

use Auth;

class ImpresionBancos{
	public function ImprimeBancomer($caja, $fecha, $importe){
		$destino = '../../documentacion/';
		$fichero = $destino . "cheque".Auth::user()->id.".txt";
		$file = fopen($fichero, "w");
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file, "                                                                       ".$fecha . PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file, $caja->beneficiario ."                                                  ". $caja->importe . PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file, $importe . PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file, $caja->concepto . PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file,PHP_EOL);
		fwrite($file, "JDBV" . PHP_EOL);
		fclose($file);

		$this->DescargarArchivo($fichero);
	}


	public function DescargarArchivo($fichero){
		$basefichero = basename($fichero);

		header( "Content-Type: application/octet-stream");
		header( "Content-Length: ".filesize($fichero));
		header( "Content-Disposition:attachment;filename=" .$basefichero."");

		readfile($fichero);
	}
}
