<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model {

	protected $table = 'tarjeta';

	protected $fillable = ['nombre_propietario','numero','codigo','vencimiento'];

}
