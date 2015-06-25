<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Oferta;

class ofertaController extends Controller {
	
	public function __construct(){
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//Hace las validaciones
		$this->validate($request, [
			'necesidad' => 'required|max:255',
			'monto' => 'required|integer|not_in:0'
		]);

		//Creo la oferta y la guardo en la BD
		$oferta = new Oferta();
		$oferta->user_id = $request->user()->id;
		$oferta->subasta_id = $request->get('subasta_id');
		$oferta->monto = $request->get('monto');
		$oferta->necesidad = $request->get('necesidad');
		$oferta->leido = false;
		$oferta->save();

		return redirect('subasta/'.$request->get('subasta_id'));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
