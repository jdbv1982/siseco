<?php namespace App\Modules\Reportes\Models;

use DB;

class Informacion extends \Eloquent{
	public function getInformacion(){
		return DB::select( DB::raw("SELECT
	p.id, p.ppi, p.nombreppi, p.numeroobra,p.nombreobra, p.ejercicio, p.depejecutora, p.nombreaccion, p.cantidad, p.total, p.bmujeres, p.bhombres, p.bjornales, p.caracteristicas,
	p.comentarios, p.concejecutar, p.observaciones, p.codigoaccion, p.observacionesseg, p.ninforme,p.idclasseguimiento,p.idsubclasseguimiento,
	(SELECT nombre_region FROM regiones WHERE id = p.idregion) AS nombre_region,
	(SELECT nombre FROM distritos WHERE id = p.iddistrito) AS nombre_distrito,
	(SELECT nombre_municipio FROM municipios WHERE id = p.idmunicipio) AS nombre_municipio,
	(SELECT nombre_localidad FROM localidades WHERE id = p.idlocalidad) AS nombre_localidad,
	(SELECT nombreprograma FROM programas WHERE id = p.idprograma) AS nombreprograma,
	(SELECT nombresubprograma FROM subprogramas WHERE id = p.idsubprograma) AS nombresubprograma,
	(SELECT nombretipo FROM tipoprogramas WHERE id = p.idtipo) AS nombretipo,
	(SELECT nombre_fuente FROM fuentes WHERE id = p.idfuente) AS nombre_fuente,
	(SELECT nombresubfuente FROM subfuentes WHERE id = p.idsubfuente) AS nombresubfuente,
	(SELECT nombreorigen FROM origenes WHERE id = p.idsuborigen) AS nombreorigen,
	(SELECT nombresuborigen FROM suborigen WHERE id = p.idsuborigen) AS nombresuborigen,
	(SELECT nombreclasificacion FROM classuborigen WHERE id = p.idclassuborigen) AS nombreclasificacion,
	(SELECT nombrefinanciamiento FROM financiamiento WHERE id = p.idcvefin) AS nombrefinanciamiento,
	(SELECT nombresituacion FROM situacion WHERE id = p.idsituacion) AS nombresituacion,
	(SELECT nombremedida FROM medidas WHERE id = p.idunidadmedida) AS nombremedida,
	(SELECT nombremeta FROM metas WHERE id = p.idmeta) AS nombremeta,
	(SELECT nombrepoblacion FROM poblacion WHERE id = p.idpoblacion) AS nombrepoblacion,
	(SELECT nombremodalidad FROM modalidad WHERE id = p.idmodalidad) AS nombremodalidad,
	(SELECT fuentegeneral FROM fuentegeneral WHERE id = p.idfgeneral) AS fuentegeneral,
	(SELECT razsoc FROM contratistas WHERE id = lic.l_idempresa) AS razsoc,
	(SELECT nombre FROM estados WHERE id = lic.l_origen) AS estado,
	(SELECT nombre FROM eventos WHERE id = o.idevento) AS evento,
	(SELECT SUM(afisico) FROM avances WHERE idobra = p.id) AS afisico,
	(SELECT SUM(afinanciero) FROM avances WHERE idobra = p.id) AS afinanciero,
	lic.l_procedimiento,lic.l_contrato,lic.l_montocontratado,lic.l_anticipo,lic.l_fecha,lic.l_ndias,lic.l_finicio,lic.l_ffinal,lic.l_cmic,lic.l_modcontrato,
	o.poa,o.observaciones,
	a.clc,a.felab,a.frecp,a.numfactura,a.concepto,a.fianza,a.ministrado,a.porc5,a.porc2,a.radicado,a.orden,a.amort_cred_pte
FROM planeacion AS p
LEFT JOIN licitaciones AS lic ON p.id = lic.id
LEFT JOIN obras AS o ON p.id = o.id
LEFT JOIN administracion AS a ON p.id = a.idobra") );
	}


	public function getInformacionId($id){
		$datos = DB::select( DB::raw("SELECT
	p.id, p.ppi, p.nombreppi, p.numeroobra,p.nombreobra, p.ejercicio, p.depejecutora, p.nombreaccion, p.cantidad, p.total, p.bmujeres, p.bhombres, p.bjornales, p.caracteristicas,
	p.comentarios, p.concejecutar, p.observaciones, p.codigoaccion, p.observacionesseg, p.ninforme,p.idclasseguimiento,p.idsubclasseguimiento,
	(SELECT nombre_region FROM regiones WHERE id = p.idregion) AS nombre_region,
	(SELECT nombre FROM distritos WHERE id = p.iddistrito) AS nombre_distrito,
	(SELECT nombre_municipio FROM municipios WHERE id = p.idmunicipio) AS nombre_municipio,
	(SELECT nombre_localidad FROM localidades WHERE id = p.idlocalidad) AS nombre_localidad,
	(SELECT nombreprograma FROM programas WHERE id = p.idprograma) AS nombreprograma,
	(SELECT nombresubprograma FROM subprogramas WHERE id = p.idsubprograma) AS nombresubprograma,
	(SELECT nombretipo FROM tipoprogramas WHERE id = p.idtipo) AS nombretipo,
	(SELECT nombre_fuente FROM fuentes WHERE id = p.idfuente) AS nombre_fuente,
	(SELECT nombresubfuente FROM subfuentes WHERE id = p.idsubfuente) AS nombresubfuente,
	(SELECT nombreorigen FROM origenes WHERE id = p.idsuborigen) AS nombreorigen,
	(SELECT nombresuborigen FROM suborigen WHERE id = p.idsuborigen) AS nombresuborigen,
	(SELECT nombreclasificacion FROM classuborigen WHERE id = p.idclassuborigen) AS nombreclasificacion,
	(SELECT nombrefinanciamiento FROM financiamiento WHERE id = p.idcvefin) AS nombrefinanciamiento,
	(SELECT nombresituacion FROM situacion WHERE id = p.idsituacion) AS nombresituacion,
	(SELECT nombremedida FROM medidas WHERE id = p.idunidadmedida) AS nombremedida,
	(SELECT nombremeta FROM metas WHERE id = p.idmeta) AS nombremeta,
	(SELECT nombrepoblacion FROM poblacion WHERE id = p.idpoblacion) AS nombrepoblacion,
	(SELECT nombremodalidad FROM modalidad WHERE id = p.idmodalidad) AS nombremodalidad,
	(SELECT fuentegeneral FROM fuentegeneral WHERE id = p.idfgeneral) AS fuentegeneral,
	(SELECT razsoc FROM contratistas WHERE id = lic.l_idempresa) AS razsoc,
	(SELECT nombre FROM estados WHERE id = lic.l_origen) AS estado,
	(SELECT nombre FROM eventos WHERE id = o.idevento) AS evento,
	(SELECT SUM(afisico) FROM avances WHERE idobra = p.id) AS afisico,
	(SELECT SUM(afinanciero) FROM avances WHERE idobra = p.id) AS afinanciero,
	(SELECT nombre FROM residencias WHERE id = p.idresidencia) AS residencia,
	lic.l_procedimiento,lic.l_contrato,lic.l_montocontratado,lic.l_anticipo,lic.l_fecha,lic.l_ndias,lic.l_finicio,lic.l_ffinal,lic.l_cmic,lic.l_modcontrato,
	o.poa,p.observaciones,
	a.clc,a.felab,a.frecp,a.numfactura,a.concepto,a.fianza,a.ministrado,a.porc5,a.porc2,a.radicado,a.orden,a.amort_cred_pte
FROM planeacion AS p
LEFT JOIN licitaciones AS lic ON p.id = lic.id
LEFT JOIN obras AS o ON p.id = o.id
LEFT JOIN administracion AS a ON p.id = a.idobra
WHERE p.id = $id") );

	return $datos;
	}
}
