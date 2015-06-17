<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model {

	protected $table = 'fotos';

	public function subasta(){
		return $this->belongsTo('App\Subasta');
	}
       
}
