<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Services\Destroyer;
use App\User;

class UserController extends Controller {

	/**
	 * Muestra listado de usuarios, vista de admin
	 *
	 * @return Response
	 */
	public function index(){
		return view('admin.usuarios');
	}

	/**
	 * Listado de usuarios con filtro por fecha_desde y fecha_hasta
	 *
	 * @return Response
	 */
	public function find(Request $request){
		if( ($request->get('fecha_desde')) and ($request->get('fecha_hasta')) ){
			$usuarios= User::whereBetween('created_at', array($request->get('fecha_desde'), $request->get('fecha_hasta')))
									->orderBy('created_at')->get();

		}elseif ($request->get('fecha_desde')) {
			$usuarios= User::where('created_at','>=',$request->get('fecha_desde'))
									->orderBy('created_at')->get();

		}elseif ($request->get('fecha_hasta')) {
			$usuarios=User::where('created_at','<=',$request->get('fecha_hasta'))
									->orderBy('created_at')->get();
		}else{
			$usuarios=User::orderBy('created_at')->get();

		}

		return view('admin.usuarios',compact('usuarios'));
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
	public function store()
	{
		//
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

	public function showAdmin(User $usuario){
		return view('admin.usuario',compact('usuario'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(User $usuario)
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
	public function destroy(User $usuario)
	{
		$destroyer = new Destroyer();
		return $destroyer->usuario($usuario);
	}

	public function delete(User $usuario)
	{
		$this->destroy($usuario);
		return redirect('admin/usuarios')->with('status','El usuario fue eliminado');
	}

	public function deleteWithAJAX(){
		$usuario = User::find(\Input::get('usuario_id'));
		$this->destroy($usuario);
	}

}
