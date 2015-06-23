<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model {

	protected $table = 'ofertas';

	public function subasta(){
		return $this->belongsTo('App\Subasta');
	}

	public function usuario(){
        return $this->belongsTo('App\Usuario');
    }

    

}
