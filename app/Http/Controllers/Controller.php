<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use View;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	public $categorias="I am Data";

    public function __construct() {

       View::share( 'categorias', $this->categorias);
    }  

}
