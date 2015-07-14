<?php
use App\Ciudad;
use App\Subasta;
use App\Oferta;
use App\Categoria;
use App\User;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::get('test','TestController@index');

Route::get('nombres','tst@index');

Route::bind('nombres', function($nombre){
	return \App\Nombre::find($nombre);
});

/*
Route::get('/nombres/{nombre}','tst@viewNombre');

Route::get('/nombres/{nombre}/edit','tst@editNombre');

Route::patch('/personas/{personas}/edit','personasController@update');
*/

Route::resource('nombres', 'tst');

Route::bind('personas', function($personas){
	return \App\Persona::find($personas);
});

Route::resource('personas','personasController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/**
* recibe provincia_id
* retorna Json con arreglo(error,ciudades)
**/
Route::post('/servicios/getCiudad', function(){         
    //Validaciones sobre el id de la provincia   
    $validator = Validator::make(Input::all(), 
        array(
            'provincia_id' => 'required|integer'
    ));        
    if ($validator->fails()) {
        return Response::json(array('error' => 1, 'message' => 'Error cargando provincia'));
    }
    else{
        $cities = Ciudad::where('provincia_id', '=', Input::get('provincia_id'))->get();
        return Response::json(array('error' => 0, 'cities' => $cities));
    }
});


Route::resource('subasta', 'SubastaController');

Route::get('perfil/subastas','SubastaController@index');

Route::get('perfil/subastas/{subasta}/ofertas','ofertaController@index');

Route::get('perfil/datos',function(){
    return view('perfil.datos');
});

Route::get('/busqueda', 'SubastaController@find');

Route::get('subastas/{subasta}','SubastaController@show');
Route::bind('subasta', function($id){
        return App\Subasta::where('id', $id)->first();
 });

Route::resource('oferta','ofertaController');

Route::get('perfil/ofertas','ofertaController@show');

Route::get('/ofertaGanadora/{oferta}','ofertaController@chooseOfertaWinner');
Route::bind('oferta', function($id){
        return App\Oferta::where('id', $id)->first();
 });

Route::resource('pregunta','PreguntaController');

Route::resource('respuesta','RespuestaController');

Route::get('admin',function(){
    return view('admin.admin');
});

Route::bind('categoria', function($nombre){
        return App\Categoria::where('nombre', $nombre)->first();
});

Route::bind('usuario', function($id){
        return App\User::where('id', $id)->first();
});

Route::group(['middleware' => ['auth','admin']], function(){
    Route::get('admin',function(){return view('admin/categorias');});
    Route::resource('admin/categorias','CategoriasController');
    Route::get('admin/categorias/del/{categoria}','CategoriasController@destroy');
    Route::resource('admin/usuarios','UserController');
    Route::post('admin/usuarios/find','UserController@find');
    Route::post('admin/subastas','SubastaController@findAdmin');
    Route::get('admin/subastas','SubastaController@indexAdmin');
    Route::get('admin/subastas/del/{subasta}','SubastaController@delete');
    Route::post('admin/subastas/del','SubastaController@deleteWithAJAX');
    Route::get('admin/subastas/{subasta}/ofertas','ofertaController@indexAdmin');
    Route::get('admin/subastas/{subasta}/ofertas/del/{oferta}','ofertaController@delete');
    Route::get('admin/usuario/{usuario}','UserController@showAdmin');
    Route::get('admin/usuarios/del/{usuario}','UserController@delete');
    Route::post('admin/usuarios/del','UserController@deleteWithAJAX');
    Route::post('admin/usuarios/nuevoadmin','UserController@newAdministratorAJAX');
    Route::post('admin/usuarios/sacaradmin','UserController@removeAdministratorAJAX');
});

