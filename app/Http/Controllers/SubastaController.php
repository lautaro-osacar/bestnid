<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;
use Illuminate\Http\Request;
use Illuminate\Auth\Guard;
use App\Services\Destroyer;
use App\Foto;
use App\Categoria;
use App\Subasta;
use App\Oferta;
use Validator;
use DB;

class SubastaController extends Controller {

	public function __construct()
	{
		$this->middleware('auth', ['except' => ['find','show']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Guard $guard)
	{
		//Consulta directa a la BD, trae las subastas del usuario y la cantidad de ofertas no leidas
		$mis_subastas = DB::select('select (select count(ofertas.id) FROM ofertas where ofertas.subasta_id = subastas.id  and leido=0) as cant_ofertas, subastas.* from `subastas` 
									left join ofertas on subastas.id = ofertas.subasta_id
									where subastas.user_id='. $guard->id().'
									group by subastas.id
									order by cant_ofertas desc, estado desc');

		return view('perfil.subastas',compact('mis_subastas'));
	}
	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categorias = Categoria::lists('nombre', 'id');

		return view('subastas.create',compact("categorias"));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request){
		//Hace las validaciones
		$this->validate($request, [
			'titulo' => 'required|max:40',
			'descripcion' => 'required|max:400',
			'categoria' => 'not_in:0',
			'imagen1' => 'image|max:500',
			'imagen2' => 'image|max:500',
			'imagen3' => 'image|max:500',
		]);

		//Creo subasta
		$subasta = new Subasta();
		$subasta->user_id = $request->user()->id;
		$subasta->categoria_id = $request->get('categoria');
		$subasta->titulo = $request->get('titulo');
		$subasta->descripcion = $request->get('descripcion');
		$subasta->estado = 'A';
		$subasta->fecha_fin = date('Y-m-d H:i:s',strtotime('+30 days'));
		$subasta->save();
		
		//Creo fotos
		$images = Array();
		if($request->hasFile('imagen1')) $images[] = $request->file('imagen1');
		if($request->hasFile('imagen2')) $images[] = $request->file('imagen2');
		if($request->hasFile('imagen3')) $images[] = $request->file('imagen3');
		foreach ($images as $key => $file) {
			$foto = new Foto();
			//El nombre de la foto tiene [hora]+[nombre_original]
            $name = time(). '-' .$file->getClientOriginalName();
            $foto->filePath = '/images/'.$name;
            $foto->subasta_id = $subasta->id;           
            $file->move(public_path().'/images/', $name);
	        $foto->save();
		}

		return redirect('/subasta/'.$subasta->id)->with('status', 'La subasta ha sido creada exitosamente!');
	}


	/**
	* Realiza la busqueda de subastas (filtro por nombre y categoria)
	* @param Request request
	* @return Array subastas
	**/
	public function find(Request $request){
		//Si no se elije categoria, filtra solo por nombre
		if ($request->get('categoria') == '0') {
			$subastas= Subasta::where('titulo', 'like', '%'.$request->get('busqueda_subasta').'%')
								->where('estado',"=",'A')
								->get();
		} 
		//Si se selecciono categoria agrego filtro de categoria
		else{
			$subastas=Subasta::where('titulo', 'like', '%'.$request->get('busqueda_subasta').'%')
								->where('estado',"=",'A')
								->where('categoria_id', '=', $request->get('categoria'))->get();
		} 

		return view('subastas.find', compact("subastas"));
	}

	/**
	* Muestra la informacion de una subasta especifica
	* @param Subasta subasta
	* @return Array subasta
	**/
	public function show(Subasta $subasta){
		return view('subastas.subasta', compact("subasta"));
	}

	public function sendOfertaGanadoraNotification(){
		/*
		$data =[
			'titulo' => 'Gasnaste la subasta!',
			'cuerpo1' => 'Tu oferta en el producto blablabla se elegió como ganadora',
			'cuerpo2' => ''];

		\Mail::send('emails.bestnid_mail_template', $data, function($message)
       {
           //remitente
           $message->from('bestnid.notificaciones@gmail.com', 'Bestnid');
 
           //asunto
           $message->subject('Tu oferta ha sido elegida!');
 
           //receptor
           $message->to('lautaro.eo@gmail.com');
 
       });
       */
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
	public function destroy(Subasta $subasta)
	{
		$destroyer = new Destroyer();
		$destroyer->subasta($subasta);
	}

	public function delete(Subasta $subasta){
		$this->destroy($subasta);
		return redirect('admin/subastas')->with('status','La subasta fue eliminada');	
	}

	public function deleteWithAJAX(){
		$subasta = Subasta::find(Input::get('subasta_id'));
		$this->destroy($subasta);
	}

	public function findAdmin(Request $request)
	{
		if( ($request->get('fecha_desde')) and ($request->get('fecha_hasta')) ){
			$subastas= Subasta::whereBetween('created_at', array($request->get('fecha_desde'), $request->get('fecha_hasta')))
									->orderBy('created_at')->get();

		}elseif ($request->get('fecha_desde')) {
			$subastas= Subasta::where('created_at','>=',$request->get('fecha_desde'))
									->orderBy('created_at')->get();

		}elseif ($request->get('fecha_hasta')) {
			$subastas=Subasta::where('created_at','<=',$request->get('fecha_hasta'))
									->orderBy('created_at')->get();
		}else{
			$subastas=Subasta::orderBy('created_at')->get();

		}

		return view('admin.subastas',compact('subastas'));
	}

	public function indexAdmin()
	{
		return view('admin.subastas');
	}


}
