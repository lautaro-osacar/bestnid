<?php namespace App\Services;

use App\Oferta;
use App\Subasta;
use App\Pregunta;
use App\Respuesta;
use App\Foto;

class Destroyer{
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

}