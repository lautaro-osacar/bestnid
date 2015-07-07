$(document).ready( function (){
	$("#zoom_01").elevateZoom({gallery:'gal1', cursor: 'pointer', galleryActiveClass: 'active'});

	//Si aparecio un error en el alta de ofertas muestro el modal
	if($("#error-0").text()){
		$('#oferta-modal').modal({
  			backdrop: 'static',
  			keyboard: true
		});
	}

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

});
