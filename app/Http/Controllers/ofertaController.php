<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Auth\Guard;
use App\Oferta;
use App\Subasta;

class ofertaController extends Controller {
	
	public function __construct(){
		$this->middleware('auth');
	}

	/**
	 * Muestra las ofertas de una subasta especifica.
	 *
	 * @return Response
	 */
	public function index(Subasta $subasta,Guard $guard)
	{	
		//Me fijo si el usuario corresponde al dueño de la subasta
		if($guard->id() == $subasta->user_id){
			//Obtengo las ofertas de la subasta
			$ofertas = Oferta::where('subasta_id','=',$subasta->id)->get();
			return view('perfil.subasta_ofertas', compact("ofertas"));
		}else{
			return view('auth.unauthorized');
		}
	}

	public function show(Guard $guard){

		$mis_ofertas= Oferta::where('user_id','=', $guard->id())->orderBy('created_at','asc')->get();
		return view('perfil.ofertas',compact('mis_ofertas'));
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
			'monto' => 'required|integer|min:1|not_in:0'
		]);

		//Creo la oferta y la guardo en la BD
		$oferta = new Oferta();
		$oferta->user_id = $request->user()->id;
		$oferta->subasta_id = $request->get('subasta_id');
		$oferta->monto = $request->get('monto');
		$oferta->necesidad = $request->get('necesidad');
		$oferta->leido = false;
		$oferta->save();

		return redirect('/subasta/'.$request->get('subasta_id'))->with('status','La oferta ha sido enviada!');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

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
