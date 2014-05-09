<?php namespace App\Modules\Reportes\Models;

use DB;

class ObrasAutorizadas extends \Eloquent{
	public function getObrasAut($r, $d, $m, $l){
		if(($r == 0) and ($d == 0) and ($m == 0) and ($l == 0)){
			return $obras = DB::table('planeacion')
				->join('financiamiento','planeacion.idcvefin','=','financiamiento.id')
				->join('oficios','planeacion.id','=','oficios.idobra')
				->join('estructura','planeacion.id','=','estructura.idobra')
				->groupBy('planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio')
				->where('oficios.nombreoficio','=','AUTORIZACION')
				->get(array(
	            		'planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio',
				        DB::raw( 'SUM(estructura.investatal) AS monto' ),
			    ));
		}//todas las obras

		if($r != 0){
			if($d != 0){
				if($m != 0){
					if($l != 0){
						return $obras = DB::table('planeacion')
						->join('financiamiento','planeacion.idcvefin','=','financiamiento.id')
						->join('oficios','planeacion.id','=','oficios.idobra')
						->join('estructura','planeacion.id','=','estructura.idobra')
						->groupBy('planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio')
						->where('oficios.nombreoficio','=','AUTORIZACION')
						->where('planeacion.idregion','=',$r)
						->where('planeacion.iddistrito','=',$d)
						->where('planeacion.idmunicipio','=',$m)
						->where('planeacion.idlocalidad','=',$l)
						->get(array(
			            		'planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio',
						        DB::raw( 'SUM(estructura.investatal) AS monto' ),
					    ));						
					}
					return $obras = DB::table('planeacion')
						->join('financiamiento','planeacion.idcvefin','=','financiamiento.id')
						->join('oficios','planeacion.id','=','oficios.idobra')
						->join('estructura','planeacion.id','=','estructura.idobra')
						->groupBy('planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio')
						->where('oficios.nombreoficio','=','AUTORIZACION')
						->where('planeacion.idregion','=',$r)
						->where('planeacion.iddistrito','=',$d)
						->where('planeacion.idmunicipio','=',$m)
						->get(array(
			            		'planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio',
						        DB::raw( 'SUM(estructura.investatal) AS monto' ),
					    ));					
				}
				return $obras = DB::table('planeacion')
				->join('financiamiento','planeacion.idcvefin','=','financiamiento.id')
				->join('oficios','planeacion.id','=','oficios.idobra')
				->join('estructura','planeacion.id','=','estructura.idobra')
				->groupBy('planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio')
				->where('oficios.nombreoficio','=','AUTORIZACION')
				->where('planeacion.idregion','=',$r)
				->where('planeacion.iddistrito','=',$d)
				->get(array(
	            		'planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio',
				        DB::raw( 'SUM(estructura.investatal) AS monto' ),
			    ));				
			}
			return $obras = DB::table('planeacion')
				->join('financiamiento','planeacion.idcvefin','=','financiamiento.id')
				->join('oficios','planeacion.id','=','oficios.idobra')
				->join('estructura','planeacion.id','=','estructura.idobra')
				->groupBy('planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio')
				->where('oficios.nombreoficio','=','AUTORIZACION')
				->where('planeacion.idregion','=',$r)
				->get(array(
	            		'planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio',
				        DB::raw( 'SUM(estructura.investatal) AS monto' ),
			    ));			
		}//filtro por region

		if($d != 0){
			if($m != 0){
					if($l != 0){
						return $obras = DB::table('planeacion')
						->join('financiamiento','planeacion.idcvefin','=','financiamiento.id')
						->join('oficios','planeacion.id','=','oficios.idobra')
						->join('estructura','planeacion.id','=','estructura.idobra')
						->groupBy('planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio')
						->where('oficios.nombreoficio','=','AUTORIZACION')
						->where('planeacion.idregion','=',$r)
						->where('planeacion.iddistrito','=',$d)
						->where('planeacion.idmunicipio','=',$m)
						->where('planeacion.idlocalidad','=',$l)
						->get(array(
			            		'planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio',
						        DB::raw( 'SUM(estructura.investatal) AS monto' ),
					    ));						
					}
					return $obras = DB::table('planeacion')
						->join('financiamiento','planeacion.idcvefin','=','financiamiento.id')
						->join('oficios','planeacion.id','=','oficios.idobra')
						->join('estructura','planeacion.id','=','estructura.idobra')
						->groupBy('planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio')
						->where('oficios.nombreoficio','=','AUTORIZACION')
						->where('planeacion.idregion','=',$r)
						->where('planeacion.iddistrito','=',$d)
						->where('planeacion.idmunicipio','=',$m)
						->get(array(
			            		'planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio',
						        DB::raw( 'SUM(estructura.investatal) AS monto' ),
					    ));					
				}
			return $obras = DB::table('planeacion')
				->join('financiamiento','planeacion.idcvefin','=','financiamiento.id')
				->join('oficios','planeacion.id','=','oficios.idobra')
				->join('estructura','planeacion.id','=','estructura.idobra')
				->groupBy('planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio')
				->where('oficios.nombreoficio','=','AUTORIZACION')
				->where('planeacion.iddistrito','=',$d,'AND')
				->get(array(
	            		'planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio',
				        DB::raw( 'SUM(estructura.investatal) AS monto' ),
			    ));			
		}//filtro por distrito

		if($m != 0){
			if($l != 0){
				return $obras = DB::table('planeacion')
				->join('financiamiento','planeacion.idcvefin','=','financiamiento.id')
				->join('oficios','planeacion.id','=','oficios.idobra')
				->join('estructura','planeacion.id','=','estructura.idobra')
				->groupBy('planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio')
				->where('oficios.nombreoficio','=','AUTORIZACION')
				->where('planeacion.idregion','=',$r)
				->where('planeacion.iddistrito','=',$d)
				->where('planeacion.idmunicipio','=',$m)
				->where('planeacion.idlocalidad','=',$l)
				->get(array(
	            		'planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio',
				        DB::raw( 'SUM(estructura.investatal) AS monto' ),
			    ));						
			}
			return $obras = DB::table('planeacion')
				->join('financiamiento','planeacion.idcvefin','=','financiamiento.id')
				->join('oficios','planeacion.id','=','oficios.idobra')
				->join('estructura','planeacion.id','=','estructura.idobra')
				->groupBy('planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio')
				->where('oficios.nombreoficio','=','AUTORIZACION')
				->where('planeacion.idmunicipio','=',$m,'AND')
				->get(array(
	            		'planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio',
				        DB::raw( 'SUM(estructura.investatal) AS monto' ),
			    ));			
		}//filtro por municipio

		if($l != 0){
			return $obras = DB::table('planeacion')
				->join('financiamiento','planeacion.idcvefin','=','financiamiento.id')
				->join('oficios','planeacion.id','=','oficios.idobra')
				->join('estructura','planeacion.id','=','estructura.idobra')
				->groupBy('planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio')
				->where('oficios.nombreoficio','=','AUTORIZACION')
				->where('planeacion.idlocalidad','=',$l,'AND')
				->get(array(
	            		'planeacion.id', 'planeacion.nombreobra','financiamiento.nombrefinanciamiento','oficios.numerooficio','oficios.fechaoficio',
				        DB::raw( 'SUM(estructura.investatal) AS monto' ),
			    ));			
		}//filtro por localidad

	}


	
}
