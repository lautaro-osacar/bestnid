<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Auth\Guard;
use App\Foto;
use App\Categoria;
use App\Subasta;
use Validator;

class SubastaController extends Controller {

	public function __construct()
	{
		$this->middleware('auth', ['except' => ['find']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Guard $guard)
	{
		$mis_subastas = Subasta::where('user_id','=', $guard->id())->orderBy('descripcion','created_at')->get();
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
			'titulo' => 'required|max:255',
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

		return redirect('/');
	}

	public function find(Request $request){
		$subastas= Subasta::where('titulo', 'like', '%'.$request->get('busqueda_subasta').'%')->get();
		return view('subastas.find', compact("subastas"));
	}

	public function show(Subasta $subasta){
		return view('subastas.subasta', compact("subasta", "fotos"));
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
