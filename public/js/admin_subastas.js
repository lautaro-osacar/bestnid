$(document).ready( function (){
	$(function() {
        $.ajaxSetup({
            headers: {
   	         'X-XSRF-Token': $('meta[name="csrf_token"]').attr('content')
	        }
        });
    });
    
	$(".borrar-subasta-btn").each(function(){        
		$(this).click(function(e){
			//Obtengo el td actual
			var columna = $(this).closest('tr');
			//Obtengo el id de la subasta
			var subasta_id = columna.attr('subasta');

			//Muestro el cartel de confirmación
			if(!confirm('Al borrar una subasta se borraran las ofertas, preguntas, respuestas y todos sus datos asociados. ¿Desea continuar?')){
				return false;
			}

			//Mando por ajax la peticion al controlador
			var data = {subasta_id:subasta_id,_token:$('meta[name="csrf_token"]').attr('content')};
			$.post('/admin/subastas/del',data,function(result){
              columna.fadeOut();
          	});
		});
	});
});

