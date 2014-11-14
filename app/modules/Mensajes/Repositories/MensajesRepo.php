<?php namespace App\Modules\Mensajes\Repositories;

use DB;

use App\Modules\Mensajes\Models\Mensaje;

class MensajesRepo{

    protected $mensaje;

    public function __construct(Mensaje $mensaje){
        $this->mensaje = $mensaje;
    }



	public function getMensajes($id){
		$sql = "SELECT m.id, m.mensaje_id, destinatario,
                (SELECT nombre FROM users WHERE id = m.destinatario) AS nombre_destinatario,
                remitente,
                (SELECT nombre FROM users WHERE id = m.remitente) AS nombre_remitente,
                mensaje, created_at, status
                FROM mensajes m
                where m.mensaje_id = $id";

        return DB::select(DB::raw($sql));
	}

        public function getAllMessages($id){
            $sql = "SELECT m.mensaje_id,m.id,  CASE WHEN m.remitente = $id THEN 'Enviado' ELSE 'Recibido' END AS tipo_mensaje,
                         (SELECT nombre FROM users WHERE id = m.destinatario ) AS destinatario,
                        m.mensaje,
                        (SELECT nombre FROM users WHERE id = m.remitente) AS remitente,
                        CASE WHEN m.status = $id THEN 'NO' ELSE 'SI' END AS leido
                        FROM mensajes m
                        WHERE m.remitente = $id OR m.destinatario = $id
                        ORDER BY m.mensaje_id";


            return DB::select(DB::raw($sql));
        }

}
