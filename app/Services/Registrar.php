<?php namespace App\Services;

use App\User;
use App\Tarjeta;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			'apellido' => 'required|max:255',
			'ciudad_id' => 'required',
			'domicilio' => 'required|max:255',
			'nombre_propietario' => 'required|max:255',
			'tarjeta_numero' => 'required|max:20',
			'card_code' => 'required|max:3',
			//'vencimiento' => 'required|date_format:m/Y'
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{	
		//Seteo el dia en la fecha de vencimiento de la tarjeta (primer dia del mes)
		$fecha_venc = $data['fecha_vencimiento']."-01";
		$fecha_venc = strtotime($fecha_venc);

		$tarjeta = Tarjeta::create([
			'nombre_propietario' => $data['nombre_propietario'],
			'numero' => $data['tarjeta_numero'],
			'codigo' => $data['card_code'],
			'vencimiento' => date("Y-m-d",$fecha_venc)
			]);

		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'apellido' => $data['apellido'],			
			'ciudad_id' => $data['ciudad_id'],
			'domicilio' => $data['domicilio'],
			'tarjeta_id' => $tarjeta->id
		]);

	}

}
