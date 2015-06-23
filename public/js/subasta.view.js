$(document).ready( function (){
	$("#zoom_01").elevateZoom({gallery:'gal1', cursor: 'pointer', galleryActiveClass: 'active'});

	//Si aparecio un error en el alta de ofertas muestro el modal
	if($("#error-1").text()){
		$('#oferta-modal').modal({
  			backdrop: 'static',
  			keyboard: true
		});
	}
});
