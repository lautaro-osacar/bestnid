$(document).ready( function (){
 	$("#imagen1").filestyle({buttonText: "Cargar"});

 	//Cuando hay un valor en imagen1 creo imagen2
 	$("#imagen1").change(function() {
		if(!$("#imagen2").length){
    	$(".imagenes").append('<input id="imagen2" name="imagen2" type="file" class="filestyle">');
    	$("#imagen2").filestyle({buttonText: "Cargar"});
    	}
	});

 	//Cuando hay un valor en imagen2 creo imagen3
	$(".imagenes").on("change","#imagen2", function() {
		if(!$("#imagen3").length){
		$(".imagenes").append('<input id="imagen3" name="imagen3" type="file" class="filestyle">');
		$("#imagen3").filestyle({buttonText: "Cargar"});
	}
	});


});


