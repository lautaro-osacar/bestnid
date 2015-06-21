<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Categoria;

class ViewServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		View::share("categorias", Categoria::lists('nombre', 'id'));
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
