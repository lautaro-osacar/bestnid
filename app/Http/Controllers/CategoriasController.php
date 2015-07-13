<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Categoria;
use Illuminate\Http\Request;

use App\Subasta;

class CategoriasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//No le paso $categorias porque es una variable global

		return view('admin.categorias');
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
		$this->validate($request, [
			'categoria' => 'required|max:40'
		]);

		$categoria= new Categoria();
		$categoria->nombre= $request->get('categoria');
		$categoria->save();

		return redirect('admin/categorias')->with('status','La categoria ha sido creada!');
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
	public function destroy(Categoria $categoria){
		$hay_subastas = Subasta::where('categoria_id',"=",$categoria->id)->get()->first();
		if($hay_subastas){
			return redirect('admin/categorias')->with('status-error','No se puede eliminar "'.$categoria->nombre.
				'" porque existen subastas con esta categoría');
		}else{
			$nombre = $categoria->nombre;
			$categoria->delete();
			return redirect('admin/categorias')->with('status','La categoría "'.$nombre.'" fue eliminada');
		}
	}

}
