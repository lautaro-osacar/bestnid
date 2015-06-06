<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Nombre extends Model {

	protected $table = 'nombre';

	protected $primaryKey = 'nombre';

	protected $fillable = ['nombre'];

	public $timestamps = false;
}
