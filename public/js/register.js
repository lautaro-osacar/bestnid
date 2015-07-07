$(document).ready( function (){

    $("[name='provincia_id']").change(function(){
            cargar_ciudades();
    });

    //Cargo la ciudad seleccionada anteriormente (se guarda en un campo oculto)
    if( $("[name='provincia_id']").val() != "0" ){
        cargar_ciudades();
        var ciudad_old = $("[name='ciudad_old']").val();
        
        //Tengo que esperar a que se carguen las ciudades (termine el ajax)
        $(document).ajaxStop(function(){
            $("[name='ciudad_id']").val(ciudad_old);
        });
    }
});

function cargar_ciudades(){
            //Vacio las ciudades anteriores
            $("[name='ciudad_id']").empty();            

            $.ajax({
                
                    type: "POST",
                    dataType: "json",
                    url : "/servicios/getCiudad",
                    //le paso todos los datos del form (despues pruebo pasarle provincia nomas)
                    data : $('#reg_form').serialize(),
                    success:function(data){
                            if(data.error === 0 ){ // no hay errores                                
                                for (var i = 0; i < data.cities.length; i++) {
                                    $("[name='ciudad_id']").append("<option value='"+data.cities[i].id+"'>"+data.cities[i].nombre+"</option>");
                                }
                            }else{
                                //DEBUG: alert(data); 
                            }
                    }
            });                         
}