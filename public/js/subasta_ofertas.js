$(document).ready( function (){
	//Se fija en cada necesidad si se paso el maximo del ancho
	$( ".mostrado" ).each(function() {
		if ($(this)[0].scrollWidth <=  $(this).innerWidth()) {
			var id_oferta = $(this).attr("id");	
			//Si no supero el ancho borro el icono +
	    	$("#"+id_oferta+".expandir").remove();
		}
	});

	//Cuando se clickea el icono + se expande el texto
    $(".expandir").click(function(){
    	//obtengo el id de esa oferta
    	var id_oferta = $(this).attr("id");
    	//expando el texto y borro el texto en su version corta y el icono
        $("#"+id_oferta+".escondido").collapse('show');
        $("#"+id_oferta+".mostrado").remove();
        $(this).remove();
    });
});
