<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password','apellido','domicilio','tarjeta_id','ciudad_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


	public function tarjeta(){
        return $this->belongsTo('App\Tarjeta');
    }

    public function ciudad(){
    	return $this->belongsTo('App\Ciudad');
    }

    public function ofertas(){
        return $this->hasMany('App\Oferta');
    }

    public function subastas(){
        return $this->hasMany('App\Subasta');
    }

    public function esAdmin(){
    	return $this->belongsTo('App\RolAdmin','id','user_id');   
    }

    public function preguntas(){
    	return $this->hasMany('App\Pregunta');	
    }
}
