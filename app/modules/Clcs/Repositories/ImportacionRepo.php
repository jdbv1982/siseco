<?php namespace App\Modules\Clcs\Repositories;

use DB;

use App\Modules\Clcs\Models\Clc;

use App\Modules\Clcs\Controllers\ClcController;
class ImportacionRepo {

	protected $noEncontradas;
	protected $existe;
	protected $obraExiste;

	public function insertaRegistros($data){
		$no_afectacion = "";
		$pasadas = 0;
		$this->noEncontradas = '';
		$this->obraExiste = false;
		foreach ($data as $dato) {
			if($no_afectacion <> $dato[1]){
				if(($this->obraExiste == true) and ($no_afectacion <> '')){
					$this->insertaObraClc($obra, $no_afectacion, $folio);
				}
				$this->obraExiste = $this->validaObra($dato[0]);
				if($this->obraExiste == false){
					$this->noEncontradas .=$dato[0] . ' | ';
					$no_afectacion = $dato[1];
				}else{
					$this->existe = $this->validaNumero($dato[1]);
					$no_afectacion = $dato[1];
					$obra = $dato[0];
					$folio = $dato[13];
				}
			}

			if(($this->obraExiste == true) and ($this->existe == false)){
				$this->insertaClc($dato);
			}
		}

		return $this->noEncontradas;
	}

	public function insertaObraClc($nObra, $nAfectacion, $folio){
		$cc = new ClcController($this);
		$cc->setObraClc($nObra, $nAfectacion, $folio);
	}

	public function getIdObra($numero){
		$id = DB::table('planeacion')->select('id')->where('numeroobra','=',$numero)->get();
		return $id[0]->id;
	}

	public function insertaClc($dato){

		if( $dato[12] == '+'){
			$signo = 1;
		}else{
			$signo = -1;
		}

		$data = array(
			'no_afectacion'=> $dato[1],
			'no_control'=> $dato[2],
			'cve_presupuestal'=> $dato[3],
			'descripcion'=> $dato[4],
			'referencia'=> $dato[5],
			'fecha_ref'=> $dato[6],
			'proveedor'=> $dato[7],
			'rfc'=> $dato[8],
			'importe'=> $dato[9],
			'iva'=> $dato[10],
			'total'=> $dato[11],
			'signo'=> $signo,
			'folio' => $dato[13]
		);

		$clc = new Clc;
		$clc->validAndSave($data);
	}

	public function validaObra($numero){
		$obra = DB::table('planeacion')->where('numeroobra','=',$numero)->get();
		if(empty($obra)){
			return false;
		}

		return true;
	}

	public function validaNumero($numero){
		$obra = DB::table('obra_clc')->where('no_afectacion','=',$numero)->get();

		if(empty($obra)){
			return false;
		}
			return true;
	}

}
