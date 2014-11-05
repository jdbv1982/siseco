<?php namespace App\Modules\Reportes\Models;

use DB;

class Anexos extends \Eloquent{
	public function get_anexo6($id){
		$datos = DB::select( DB::raw("SELECT p.ppi, p.codigoaccion, p.depejecutora, p.nombreobra, l.l_contrato, l.l_montocontratado,l.l_anticipo,l.l_fecha,l.l_finicio,l.l_ffinal,p.observacionesseg,p.observaciones,
			(SELECT UPPER(nombre_municipio) FROM municipios WHERE id = p.idmunicipio) AS nombre_municipio,
			(SELECT UPPER(nombre_localidad) FROM localidades WHERE id = p.idlocalidad) AS nombre_localidad,
			(SELECT nombremodalidad FROM modalidad WHERE id = p.idmodalidad) AS nombremodalidad,
			(SELECT nombre FROM fondo_seguimiento WHERE id = p.idfondoseguimiento) AS fondo_seguimiento,
			(SELECT nombrefinanciamiento FROM financiamiento WHERE id = p.idcvefin) AS nombrefinanciamiento,
			(SELECT UPPER(numerooficio) FROM oficios WHERE idobra = p.id AND nombreoficio = 'AUTORIZACION') AS numerooficio
			FROM planeacion AS p
			LEFT JOIN licitaciones AS l ON p.id = l.id
			WHERE p.id =$id") );

		return $datos[0];
	}

	public function get_datos_reporte($id){
		$datos_reporte = DB::table('datos_reportes')
			->where('id','=',$id)
			->get();

		return $datos_reporte[0];
	}

	public function get_estructura($id){
		$est = DB::select(DB::raw("SELECT SUM(e.invfederal) AS federal, SUM(e.investatal) AS estatal,SUM(e.invmunicipal) AS municipal, SUM(e.invparticipantes) AS participantes,
			SUM(e.invfederal)  + SUM(e.investatal) + SUM(e.invmunicipal) + SUM(e.invparticipantes) AS total
			FROM estructura AS e
			WHERE idobra = $id"));

		return $est[0];
	}

	public function get_programado($id){
		$programado = DB::select(DB::raw("SELECT 	SUM(enero) AS enero,
			SUM(febrero) AS febrero,
			SUM(marzo) AS marzo,
			SUM(abril) AS abril,
			SUM(mayo) AS mayo,
			SUM(junio) AS junio,
			SUM(julio) AS julio,
			SUM(agosto) AS agosto,
			SUM(septiembre) AS septiembre,
			SUM(octubre) AS octubre,
			SUM(noviembre) AS noviembre,
			SUM(diciembre) AS diciembre,
			SUM(enero) + SUM(febrero) + SUM(marzo) + SUM(abril) + SUM(mayo) + SUM(junio) + SUM(julio) + SUM(agosto) + SUM(septiembre) + SUM(octubre) +SUM(noviembre) + SUM(diciembre) AS total
		FROM calendarizacion
			WHERE idobra = $id
		"));

		$prg = array();
		$programado[0]->enero = $programado[0]->enero * 100 / $programado[0]->total;
		$programado[0]->febrero = $programado[0]->febrero * 100 / $programado[0]->total;
		$programado[0]->marzo = $programado[0]->marzo * 100 / $programado[0]->total;
		$programado[0]->abril = $programado[0]->abril* 100 / $programado[0]->total;
		$programado[0]->mayo = $programado[0]->mayo * 100 / $programado[0]->total;
		$programado[0]->junio = $programado[0]->junio * 100 / $programado[0]->total;
		$programado[0]->julio = $programado[0]->julio * 100 / $programado[0]->total;
		$programado[0]->agosto = $programado[0]->agosto * 100 / $programado[0]->total;
		$programado[0]->septiembre = $programado[0]->septiembre * 100 / $programado[0]->total;
		$programado[0]->octubre = $programado[0]->octubre * 100 / $programado[0]->total;
		$programado[0]->noviembre = $programado[0]->noviembre * 100 / $programado[0]->total;
		$programado[0]->diciembre = $programado[0]->diciembre * 100 / $programado[0]->total;
		$programado[0]->total = $programado[0]->total * 100 / $programado[0]->total;

		array_push($prg,$programado[0]->enero ,$programado[0]->febrero ,$programado[0]->marzo ,$programado[0]->abril ,$programado[0]->mayo ,$programado[0]->junio ,$programado[0]->julio ,$programado[0]->agosto ,$programado[0]->septiembre ,$programado[0]->octubre ,$programado[0]->noviembre ,$programado[0]->diciembre ,$programado[0]->total);

		return $prg;
	}

	public function get_real($id, $campo){
		$p  = DB::select(DB::raw("  SELECT
		        SUM(IF((MONTH(created_at) = 1),$campo,0)) AS enero,
		        SUM(IF((MONTH(created_at) = 2),$campo,0)) AS febrero,
		        SUM(IF((MONTH(created_at) = 3),$campo,0)) AS marzo,
		        SUM(IF((MONTH(created_at) = 4),$campo,0)) AS abril,
		        SUM(IF((MONTH(created_at) = 5),$campo,0)) AS mayo,
		        SUM(IF((MONTH(created_at) = 6),$campo,0)) AS junio,
		        SUM(IF((MONTH(created_at) = 7),$campo,0)) AS julio,
		        SUM(IF((MONTH(created_at) = 8),$campo,0)) AS agosto,
		        SUM(IF((MONTH(created_at) = 9),$campo,0)) AS septiembre,
		        SUM(IF((MONTH(created_at) = 10),$campo,0)) AS octubre,
		        SUM(IF((MONTH(created_at) = 11),$campo,0)) AS noviembre,
		        SUM(IF((MONTH(created_at) = 12),$campo,0)) AS diciembre,
		        SUM($campo) AS total
		FROM avances
		WHERE idobra = $id
		"));
		$prg = array();
		array_push($prg,$p[0]->enero ,
			$p[0]->febrero ,
			$p[0]->marzo ,
			$p[0]->abril ,
			$p[0]->mayo ,
			$p[0]->junio ,
			$p[0]->julio ,
			$p[0]->agosto ,
			$p[0]->septiembre ,
			$p[0]->octubre ,
			$p[0]->noviembre ,
			$p[0]->diciembre ,
			$p[0]->total);

		return $prg;
	}

	public function get_prorrogas($id){
		$prorrogas = DB::table('convenios')
			->select('finicio','ffinal')
			->where('idobra','=',$id)
			->get();

		return $prorrogas;

	}
}
