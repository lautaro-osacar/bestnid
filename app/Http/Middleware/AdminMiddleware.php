<?php namespace App\Http\Middleware;

use Closure;

class AdminMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next){	
		//Me fijo si esta en la tabla de administradores
		$es_admin = \DB::table('administradores')
    				->where('user_id', '=', $request->user()->id)
    				->first();
   
		if (!is_null($es_admin)) {
			//Si esta lo devuelvo a la vista que queria entrar
			return $next($request);
		}else{
			//Si no esta no lo dejo entrar
			return view("auth.unauthorized");
		}
	}

}
