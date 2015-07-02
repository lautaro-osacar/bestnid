$(document).ready( function (){
    $(".expandir").click(function(){
    	var id_oferta = $(this).attr("oferta");

        $("#"+id_oferta+".collapse").collapse('show');
        $("#"+id_oferta+".mostrado").remove();
        $(this).remove();

    });
});
