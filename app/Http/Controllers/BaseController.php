<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use View;

class BaseController extends Controller {

	public $categorias="I am Data";

    public function __construct() {

       View::share( 'categorias', $this->categorias);
    }  

}

