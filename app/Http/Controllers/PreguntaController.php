<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Pregunta;
use App\Subasta;
use App\User;

class PreguntaController extends Controller {

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
		//Creo la pregunta y la guardo en BD
		$pregunta = new Pregunta();
		$pregunta->texto = $request->get('preguntar-txt');
		$pregunta->subasta_id = $request->get('subasta_id');
		$pregunta->user_id = $request->user()->id;
		$pregunta->save();

		//Envio mail al subastador notificando nueva pregunta
		$this->sendMailNotification($pregunta->subasta);
		
		return redirect('/subasta/'.$request->get('subasta_id'))->with('status', 'La pregunta ha sido enviada!');
	}

	/**
	* Envía una notificacion por mail al usuario dueño de la subasta
	*/
	public function sendMailNotification(Subasta $subasta){
		$data =[
			'titulo' => 'Hay una nueva pregunta en tu subasta',
			'cuerpo1' => 'Alguien realizó una pregunta en tu subasta "'.$subasta->titulo.'"',
			'cuerpo2' => 'Ingresá a Bestnid y accede a tus subastas desde tu perfil para responder las preguntas',
			'titulo_subasta' => $subasta->titulo,
			'email' => $subasta->usuario->email];

		\Mail::send('emails.bestnid_mail_template', $data, function($message) use ($data)
       	{
           //remitente
           $message->from('bestnid.notificaciones@gmail.com', 'Bestnid');
           //asunto
           $message->subject('Alguien realizó una consulta en "'.$data['titulo_subasta'].'"');
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
