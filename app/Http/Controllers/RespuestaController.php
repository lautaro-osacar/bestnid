<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use App\Respuesta;
use App\Pregunta;
use App\Subasta;

class RespuestaController extends Controller {

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
	public function store()	{	
    	//Creo la respuesta
    	$respuesta = new Respuesta();
		$respuesta->texto = Input::get('texto');
		$respuesta->pregunta_id = Input::get('pregunta_id');
		$respuesta->save();

		//Envio el mail
		$this->sendMailNotification($respuesta->pregunta->subasta,$respuesta->pregunta);

		return $respuesta->pregunta->subasta;		
	}

	/**
	* Envia una notificacion por mail al usuario que realizó la pregunta
	*/
	public function sendMailNotification(Subasta $subasta,Pregunta $pregunta){
		$data =[
			'titulo' => 'Respondieron la pregunta que enviaste',
			'cuerpo1' => 'Para ver la respuesta visita la subasta desde el link: <a href="http://homestead.app/subasta/'
							.$subasta->id.'">'.$subasta->titulo.'</a>',
			'cuerpo2' => '',
			'titulo_subasta' => $subasta->titulo,
			'email' => $pregunta->usuario->email
		];

		\Mail::send('emails.bestnid_mail_template', $data, function($message) use ($data)
       	{
           //remitente
           $message->from('bestnid.notificaciones@gmail.com', 'Bestnid');
           //asunto
           $message->subject('Respondieron tu pregunta de "'.$data['titulo_subasta'].'"');
           //receptor
           $message->to($data['email']);
       });
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
