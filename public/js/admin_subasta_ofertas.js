$(document).ready( function (){
	$(function() {
        $.ajaxSetup({
            headers: {
   	         'X-XSRF-Token': $('meta[name="csrf_token"]').attr('content')
	        }
        });
    });
    
	$(".borrar-oferta-btn").each(function(){        
		$(this).click(function(e){
			//Obtengo el tr actual
			var columna = $(this).closest('tr');
			//Obtengo el id de la oferta
			var oferta_id = columna.attr('oferta');

			//Muestro el cartel de confirmación
			if(!confirm('Una vez eliminada la oferta no podrá recuperarse ¿Desea continuar?')){
				return false;
			}

			//Mando por ajax la peticion al controlador
			var data = {oferta_id:oferta_id,_token:$('meta[name="csrf_token"]').attr('content')};
			$.post('/admin/subastas/ofertas/del',data,function(result){
              columna.fadeOut("slow",function(){
            		columna.replaceWith('<tr><td colspan="100%"><span class="glyphicon glyphicon-ok"></span>&nbsp;Oferta eliminada!</td></tr>');
            	});
          	});
		});
	});
});
