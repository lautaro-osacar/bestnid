<?php
use App\Ciudad;

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

