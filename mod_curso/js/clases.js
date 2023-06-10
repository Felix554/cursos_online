//Se carga por defecto al iniciar 
$(document).ready(function(){

    //Creamos la instancia
    const valores = window.location.search;

    const urlParams = new URLSearchParams(valores);

//Accedemos a los valores
    var id_curso = urlParams.get('id_curso');
    //alert(producto)
    $.fn.clases(id_curso);
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

    $('.btn_check').unbind();
    $('.btn_check').click(function(){

       alert($(this).attr('id')) ;

        if( $('.btn_check').prop('checked') ) {
            alert($(this).attr('id')+' esta Seleccionado');
            //$('#1').prop("checked", true);
            //$('#1').prop("checked", false);
        }else{
            alert($(this).attr('id')+' NO esta Seleccionado');
        }
        //var $image_element = $(this).find('video')
        //$('.product-image').prop('src', $image_element.attr('src'))
        //$('.product-image-thumb.active').removeClass('active')
        //$(this).addClass('active')

    });

    /*$('.img_curso').unbind();
    $('.img_curso').click(function(){

        $.fn.ingresarCurso( $(this).attr('id_curso'));
        //Toma el valor del  atributo id_curso y lo enviamos por parametro
        //$(this).attr('id_curso');
        //window.location.href = "../mod_login/cerrar_sesion.php";

    });*/
        
}/*Fin de la función eventos*/
/*FIN donde se especifican los eventos*/

$.fn.clases = function(id_curso){

    url = window.location.origin;//obtiene el punto de partida o el nombre de la pagina, mas no en donde estamos ubicados
    //alert("INGRESO");
	//var url		= url+'/login_Controlador';
    //
    var data 	= '&id_curso='+'id_curso'+'&action='+'buscar_clases';
	$.ajax({
		url: url+'/Github/cursos_online/mod_curso/clases_Controlador.php',
		type: 'POST',
		data: data,
		success: function(resp) {
            //console.log(resp);

            const Respuesta = JSON.parse(resp);
            //console.log(Respuesta.cod);
            alert("PRUEBA6");
            //console.log(Respuesta.msj);
            console.log(Respuesta.check);
            let valores= Respuesta.check;
            //console.log(valores.length);
            for (let i = 0; i < valores.length; i++) {
                let valor = valores[i];
                console.log(valor.id);
                console.log(valor.id_clase);
                console.log(valor.id_usuario);
                console.log(valor.status);
            }
            //console.log(valores);
            /*Respuesta.check.forEach(function(item) {
                console.log(item.join());
            });*/
           /* for (x of Respuesta.check) {
                console.log(x.id + ' ' + x.id_clase);
              }*/
            //Respuesta_check = json_encode(Respuesta.check);
            //console.log(Respuesta_check);
            //$('#lista_video').html(Respuesta.valores);
            if(Respuesta.cod == 0){

                //$( "#div_header" ).removeClass("alert-success");//Se elimina primero la clase ya que luego se concatena y prevalece la ultima q se agrego
                /*$( "#div_header" ).addClass( "alert-danger" );
                $('#msj_respuesta').find('.modal-title').text("ALERTA!");
                $('#msj_respuesta').find('.modal-body').text(Respuesta.msj);
                $('#msj_respuesta').modal('show');//Aqui habilito el modal para que lo muestre*/

            }else{

               /* $( "#div_header" ).addClass( "alert-success" );
                $('#msj_respuesta').find('.modal-title').text("ALERTA!");
                $('#msj_respuesta').find('.modal-body').text(Respuesta.msj);
                $('#msj_respuesta').modal('show');*/
                

                //setTimeout( function() { window.location.href = "../index"; }, 1000 );
        
                    //window.location.href = "../mod_login/olvido_contra.php";
            }
          
		}
	});
}

/*$.fn.clases = function(id_curso){

    url = window.location.origin;//obtiene el punto de partida o el nombre de la pagina, mas no en donde estamos ubicados
    //alert("INGRESO");
	//var url		= url+'/login_Controlador';
    //
    var data 	= '&id_curso='+'id_curso'+'&action='+'buscar_clases';
	$.ajax({
		url: url+'/Github/cursos_online/mod_curso/clases_Controlador.php',
		type: 'POST',
		data: data,
		success: function(resp) {
            console.log(resp);
            const Respuesta = JSON.parse(resp);
            console.log(Respuesta.cod);

            console.log(Respuesta.msj);

            //$('#lista_video').html(Respuesta.valores);
        if(Respuesta.cod == 0){

                //$( "#div_header" ).removeClass("alert-success");//Se elimina primero la clase ya que luego se concatena y prevalece la ultima q se agrego
                /*$( "#div_header" ).addClass( "alert-danger" );
                $('#msj_respuesta').find('.modal-title').text("ALERTA!");
                $('#msj_respuesta').find('.modal-body').text(Respuesta.msj);
                $('#msj_respuesta').modal('show');//Aqui habilito el modal para que lo muestre*/

            //}else{

               /* $( "#div_header" ).addClass( "alert-success" );
                $('#msj_respuesta').find('.modal-title').text("ALERTA!");
                $('#msj_respuesta').find('.modal-body').text(Respuesta.msj);
                $('#msj_respuesta').modal('show');*/
                

                //setTimeout( function() { window.location.href = "../index"; }, 1000 );
        
                    //window.location.href = "../mod_login/olvido_contra.php";
            //}
          
		//}
	//});
//}*/

$.fn.cerrarSesion = function(){

    url = window.location.origin;//obtiene el punto de partida o el nombre de la pagina, mas no en donde estamos ubicados
    //alert("INGRESO");
	//var url		= url+'/login_Controlador';

    var data 	= '&action='+'btn_cerrarSesion';
	$.ajax({
		url: url+'/Github/cursos_online/mod_curso/cursos_Controlador.php',
		type: 'GET',
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

                //setTimeout( function() { window.location.href = "../index"; }, 1000 );
        
                    //window.location.href = "../mod_login/olvido_contra.php";
            }
          
		}
	});
}