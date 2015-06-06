<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use App\Nombre;

class tst extends Controller {

	function index(){
		$nombres = Nombre::get();

		return view('test',compact('nombres'));
	}


	function show($nombre){

		return view('nombre',compact('nombre'));
	}

	function update($nombre, Request $request){

		$nombre->fill(['nombre' => $request->get('nombre')])->save();

		return redirect('nombres');

	}

	function edit($nombre){

		return view('edit',compact('nombre'));
	}




}
