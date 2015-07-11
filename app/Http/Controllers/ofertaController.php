<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Auth\Guard;
use App\Oferta;
use App\Subasta;
use App\OfertaGanadora;


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
			//Modifico las ofertas no leidas a leidas
			Oferta::where('subasta_id','=',$subasta->id)->where('leido','=', 0)->update(array('leido' => 1));
			//Obtengo las ofertas de la subasta
			$ofertas = Oferta::where('subasta_id','=',$subasta->id)->get();
			return view('perfil.subasta_ofertas', compact("ofertas","subasta"));
		}else{
			return view('auth.unauthorized');
		}
	}

	/**
	* Muestra las ofertas del usuario logueado
	*
	* @param Guard guard
	* @return Response
	*/
	public function show(Guard $guard){
		$mis_ofertas= Oferta::where('user_id','=', $guard->id())->orderBy('created_at','desc')->get();
		return view('perfil.ofertas',compact('mis_ofertas'));
	}

	/**
	* Marca la oferta como ganadora
	*
	* @param Oferta oferta
	* @return Response
	*/
	public function chooseOfertaWinner(Oferta $oferta,Guard $guard){
		//Me fijo si el logueado es el subastador
		if($guard->id() == $oferta->subasta->user_id){
			//Marco la oferta como ganadora
			$oferta->subasta->oferta_ganadora = $oferta->id;
			$oferta->subasta->save();
			return redirect('/perfil/subastas/'.$oferta->subasta_id.'/ofertas');
		}else{
			return view('auth.unauthorized');
		}
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
