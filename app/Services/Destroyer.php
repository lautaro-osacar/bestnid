<?php namespace App\Services;

use App\Oferta;
use App\Subasta;
use App\Pregunta;
use App\Respuesta;
use App\Foto;
use App\User;
use App\RolAdmin;
use App\Tarjeta;

/**
* Destroyer es un servicio para el borrado de objetos en la base de datos
* se encarga de borrar los objetos junto con sus relaciones (cascada)
**/

class Destroyer{

	/**
	* Borra un usuario
	**/
	public function usuario(User $usuario){
		//Borro las subastas del usuario
		foreach($usuario->subastas as $subasta){
			$this->subasta($subasta);
		}
		//Borro las preguntas
		foreach($usuario->preguntas as $pregunta){
			$this->pregunta($pregunta);
		}
		//Borro Roles
		if($usuario->esAdmin){
			$this->rolAdmin($usuario->esAdmin);
		}
		//Si tiene tarjeta borro usuario y tarjeta
		if($usuario->tarjeta){
			$usuario->delete();
			return $this->tarjeta($usuario->tarjeta);
		}else{
			//Borro el usuario
			return $usuario->delete();
		}
	}

	/**
	* Borra una subasta
	**/
	public function subasta(Subasta $subasta){
		//Borro las ofertas de la subasta
		foreach($subasta->ofertas as $oferta){
			$this->oferta($oferta);	
		}
		//Borro las preguntas de la subasta
		foreach($subasta->preguntas as $pregunta){
			$this->pregunta($pregunta);
		}
		//Borro las fotos
		foreach($subasta->fotos as $foto){
			$this->foto($foto);
		}
		//Borro la subasta
		return $subasta->delete();
	}

	/**
	* Borra una oferta
	**/
	public function oferta(Oferta $oferta){
		return $oferta->delete();
	}

	public function respuesta(Respuesta $respuesta){
		return $respuesta->delete();
	}

	public function pregunta(Pregunta $pregunta){
		//Si tiene respuesta borro la pregunta y la respuesta
		if($pregunta->respuesta){
			$this->respuesta($pregunta->respuesta);
		}
		//Borro la pregunta
		return $pregunta->delete();	
	}

	public function foto(Foto $foto){
		return $foto->delete();
	}

	public function rolAdmin(RolAdmin $rolAdmin){
		return $rolAdmin->delete();
	}

	public function tarjeta(Tarjeta $tarjeta){
		return $tarjeta->delete();
	}



}