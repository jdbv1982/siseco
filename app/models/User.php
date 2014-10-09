<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	public $errores;
	protected $fillable = array('nombre','email', 'password', 'idPerfil','status');

	public function isValid($data){

		$rules = array(
			'nombre' =>'required',
			'email' => 'required|email|unique:users',
			'password'  => 'min:3'
		);

		if($this->exists){
			$rules['email'] .= ',email,' . $this->id;
		}else{
			$rules['password'] .= '|required';
		}

		$validar = Validator::make($data, $rules);

		if($validar->passes()){
			return true;
		}

		$this->errores = $validar->errors();

		return false;

	}

	public function setPasswordAttribute($value)
    {
        if ( ! empty ($value))
        {
            $this->attributes['password'] = Hash::make($value);
        }
    }

	public function validAndSave($data)
    {
        // Revisamos si la data es válida
        if ($this->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $this->fill($data);
            // Guardamos el usuario
            $this->save();

            return true;
        }

        return false;
    }

	protected $table = 'users';

	protected $hidden = array('password');

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->password;
	}

	public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	public function getReminderEmail()
	{
		return $this->email;
	}

	public function verificaPermiso($id, $idpermiso){
		$permiso = DB::table('permisos')
			->where('idusuario','=',$id)
			->where('idpermiso','=',$idpermiso,'AND')
			->where('visible','=',1,'AND')
			->get();


		if(empty($permiso)){
			return 'false';
		}

		return 'true';
	}

	public function getNumNotificaciones($id){
		$cantidad = DB::table('notificaciones')
			->where('notificaciones.iddestino','=', $id)
			->where('notificaciones.estado','=',1,'AND')
			->get(array(
					 DB::raw( 'COUNT(notificaciones.id) AS cantidad' )
				));

		if ($cantidad[0]->cantidad > 0){
			return $cantidad[0]->cantidad;
		}
		return '0';
	}

	public function getNotificaciones($id){
		return DB::table('notificaciones')
			->where('notificaciones.iddestino','=', $id)
			->where('notificaciones.estado','=',1,'AND')
			->select('id','titulo','mensaje')
			->take(3)
			->get();

	}

	public function getNumMensajes($id){
		$sql = "SELECT COUNT(id) as cantidad
			FROM mensajes
			WHERE destinatario = $id
			AND STATUS = 1";

		$cantidad = DB::select(DB::raw($sql));
		return $cantidad[0]->cantidad;

		}

	public function getMensajes($id){
		$sql ="SELECT m.mensaje_id, mensaje, remitente, u.nombre, m.status
			FROM mensajes AS m
			INNER JOIN users AS u ON m.remitente = u.id
			 WHERE m.destinatario = $id
			AND m.status = 1 LIMIT 3";

		return DB::select(DB::raw($sql));

	}

	public function getUsers(){
		return $users = DB::table('users')->lists('nombre','id');
	}
}
