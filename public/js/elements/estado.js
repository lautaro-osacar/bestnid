$(document).ready(function (){
	$('.estado').each(function(){
		var estado = $(this).html();
		
		switch(estado) {
			case "A":
				$(this).html("Activa");
				break;
			case "P":
				$(this).html("Pendiente");
				break;	
			case "F":
				$(this).html("Finalizada");
				break;
			case "I":
				$(this).html("Inactiva");
				break;	
		}
	});
});