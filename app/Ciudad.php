<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model {

	protected $table = 'ciudad';

	protected $fillable = ['nombre','provincia_id'];

	public function ciudad(){
		return $this->hasOne('App\Provincia');
	}

}
