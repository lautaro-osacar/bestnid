<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model {

	protected $table = 'preguntas';

	protected $fillable = ['texto'];

	public function subasta(){
		return $this->belongsTo('App\Subasta');
	}

	public function respuesta(){
		return $this->hasOne('App\Respuesta');
	}

	public function usuario(){
        return $this->belongsTo('App\User','user_id','id');
    }

}
