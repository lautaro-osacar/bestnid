$(document).ready( function (){
	//Seteo ajax para que funcione
	$(function() {
        $.ajaxSetup({
            headers: {
   	         'X-XSRF-Token': $('meta[name="csrf_token"]').attr('content')
	        }
        });
    });
    
    //Cuando se clickea un boton de borrar
	$(".borrar-usuario-btn").each(function(){        
		$(this).click(function(e){
			//Obtengo el td actual
			var columna = $(this).closest('tr');
			//Obtengo el id del usuario
			var usuario_id = columna.attr('usuario');
			
			//Muestro el cartel de confirmación
			if(!confirm('Al borrar un usuario se borraran sus subastas, ofertas, preguntas y sus datos asociados. ¿Desea continuar?')){
				return false;
			}

			//Mando por ajax la peticion al controlador
			var data = {usuario_id:usuario_id,_token:$('meta[name="csrf_token"]').attr('content')};
			$.post('/admin/usuarios/del',data,function(result){
            	columna.fadeOut();
          	});
		});
	});

	//Cuando se clickea un boton de nombrar administrador
	$(".nuevo-admin-btn").each(function(){
		$(this).click(function(e){
			//Obtengo el td actual
			var columna = $(this).closest('tr');
			//Obtengo el id del usuario
			var usuario_id = columna.attr('usuario');

			//Mando por ajax la peticion al controlador
			var data = {usuario_id:usuario_id,_token:$('meta[name="csrf_token"]').attr('content')};
			$.post('/admin/usuarios/nuevoadmin',data,function(result){
            	columna.find('.nuevo-admin-btn').fadeOut("slow",function(){
            		columna.find('td#admin').append('<span class="glyphicon glyphicon-ok"></span>&nbsp;Ahora es administrador');	
            	});	
          	});
        });
	});

	//Cuando se clickea un boton de nombrar administrador
	$(".sacar-admin-btn").each(function(){
		$(this).click(function(e){
			//Obtengo el td actual
			var columna = $(this).closest('tr');
			//Obtengo el id del usuario
			var usuario_id = columna.attr('usuario');

			//Mando por ajax la peticion al controlador
			var data = {usuario_id:usuario_id,_token:$('meta[name="csrf_token"]').attr('content')};
			$.post('/admin/usuarios/sacaradmin',data,function(result){
            	columna.find('.sacar-admin-btn').fadeOut("slow",function(){
            		columna.find('td#admin').append('<span class="glyphicon glyphicon-ok"></span>&nbsp;Privilegios removidos');	
            	});	
          	});
        });
	});

});

