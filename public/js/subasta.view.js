$(document).ready( function (){
	$("#zoom_01").elevateZoom({gallery:'gal1', cursor: 'pointer', galleryActiveClass: 'active'});

	//Si aparecio un error en el alta de ofertas muestro el modal
	if($("#error-0").text()){
		$('#oferta-modal').modal({
  			backdrop: 'static',
  			keyboard: true
		});
	}

/* Esto es para fijar la barra de titulo de subasta  
  var fixmeTop = $('.fixme').offset().top;
    $(window).scroll(function() {
        var currentScroll = $(window).scrollTop();
        if (currentScroll >= fixmeTop) {
            $('.fixme').css({
                  position: 'fixed',
          top: '40px',
          background: 'white',
          color: 'white',
            width: '100%',
            });
        } else {
            $('.fixme').css({
                position: 'static'
            });
        }
    });
*/

    $("#preguntar-btn").click(function(e){
      if (!$.trim($("#preguntar-txt").val())){
        alert("Se debe escribir una pregunta!");
        e.preventDefault();
      }
    });

    //Por cada boton de respuesta
    $( ".respuesta-btn" ).each(function() {

      //Cuando se clickea
      $(this).click(function(e){
        //Guardo el key de la pregunta para saber sobre que pregunta estamos
        var pregunta_id = $(this).attr("pregunta");
        //Me fijo si se escribio respuesta
        if (!$.trim($("#respuesta-txt-"+pregunta_id).val())){
          alert("Se debe escribir una respuesta!");
          e.preventDefault();
        }else{
          //Agrego la respuesta visualmente
          var texto = $("#respuesta-txt-"+pregunta_id).val();
          $("#respuesta-icon-"+pregunta_id).replaceWith('<span class="glyphicon glyphicon-arrow-right respondido-icon" id="respondido-icon"></span>');
          $("#respuesta-txt-"+pregunta_id).replaceWith("<div class='respondido-txt'>"+$("#respuesta-txt-"+pregunta_id).val()+"</div>");
          $(this).hide();
          //Agrego la respuesta a la BD
          var data = {pregunta_id:pregunta_id,texto:texto};
          $.post('/respuesta',data,function(result){
              console.log(result);
          });
        }
      });

    });



});
