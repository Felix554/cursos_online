//Se carga por defecto al iniciar 
$(document).ready(function(){

    //Cargar la funcion jqurey al cargar la pagina y con ello se puedan ejecutar los eventos
    //form = $('#frm');//Se le asigna el formulario
    /*Array.from(document.querySelectorAll(".button")).forEach((x) => {
            
        x.onclick = leeForma;
        //click
      });*/
    
    $.fn.eventos();


 });

 /******************************************/
/*Función donde se especifican los eventos*/
/******************************************/
$.fn.eventos = function(){

    $('.btn_salir').unbind();
    $('.btn_salir').click(function(){

        $.fn.cerrarSesion();
        //window.location.href = "../mod_login/cerrar_sesion.php";

    });

    $('.img_curso').unbind();
    $('.img_curso').click(function(){

        $.fn.ingresarCurso( $(this).attr('id_curso'));
        //Toma el valor del  atributo id_curso y lo enviamos por parametro
        //$(this).attr('id_curso');
        //window.location.href = "../mod_login/cerrar_sesion.php";

    });
        
}/*Fin de la función eventos*/
/*FIN donde se especifican los eventos*/
$.fn.ingresarCurso = function(id_curso){
    
    //alert(id_curso);
    //PAsamos la variable por parametro en la URL y luego obtenerla via Get
    window.location.href = "clases.php?id_curso="+id_curso;
}



$.fn.cerrarSesion = function(){

    url = window.location.origin;//obtiene el punto de partida o el nombre de la pagina, mas no en donde estamos ubicados
    //alert("INGRESO");
	//var url		= url+'/login_Controlador';

    var data 	= '&action='+'btn_cerrarSesion';
	$.ajax({
		url: url+'/Github/cursos_online/mod_curso/cursos_Controlador.php',
		type: 'POST',
		data: data,
		success: function(resp) {

            const Respuesta = JSON.parse(resp);
            console.log(Respuesta.cod);

            console.log(Respuesta.msj);

        if(Respuesta.cod == 0){

                //$( "#div_header" ).removeClass("alert-success");//Se elimina primero la clase ya que luego se concatena y prevalece la ultima q se agrego
                $( "#div_header" ).addClass( "alert-danger" );
                $('#msj_respuesta').find('.modal-title').text("ALERTA!");
                $('#msj_respuesta').find('.modal-body').text(Respuesta.msj);
                $('#msj_respuesta').modal('show');//Aqui habilito el modal para que lo muestre

            }else{

                $( "#div_header" ).addClass( "alert-success" );
                $('#msj_respuesta').find('.modal-title').text("ALERTA!");
                $('#msj_respuesta').find('.modal-body').text(Respuesta.msj);
                $('#msj_respuesta').modal('show');

                setTimeout( function() { window.location.href = "../index"; }, 1000 );
        
                    //window.location.href = "../mod_login/olvido_contra.php";
            }
          
		}
	});
}