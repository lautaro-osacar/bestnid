<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Subasta extends Model {

	protected $table = 'subastas';

	protected $fillable = ['categoria_id','titulo','descripcion','estado'];

	public function usuario(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }

    public function fotos(){
        return $this->hasMany('App\Foto');
    }

    public function ofertas(){
        return $this->hasMany('App\Oferta');
    }

    public function ofertaGanadora(){
        return $this->belongsTo('App\Oferta','oferta_ganadora','id');   
    }

    public function preguntas(){
        return $this->hasMany('App\Pregunta');
    }

}
