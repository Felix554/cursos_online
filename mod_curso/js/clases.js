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

        //Creamos la instancia
        const valores = window.location.search;

        const urlParams = new URLSearchParams(valores);

        //Accedemos a los valores
        var id_curso = urlParams.get('id_curso');

        //alert($(this).attr('id'))
        let id_clase = $(this).attr('id');

        if($(this).attr('id') == 1 ){
            $('input[type=checkbox]').each(function(){
                var isChecked = this.checked;

                if($(this).attr('id') == 1 ){

                    alert(isChecked)
                    $.fn.check_video(isChecked, id_curso, id_clase);
                }           
            });
        }
        if($(this).attr('id') == 2 ){
            $('input[type=checkbox]').each(function(){
                var isChecked = this.checked;

                if($(this).attr('id') == 2 ){

                    alert(isChecked)
                    $.fn.check_video(isChecked, id_curso, id_clase);
                }           
            });
        }
        if($(this).attr('id') == 3 ){
            $('input[type=checkbox]').each(function(){
                var isChecked = this.checked;

                if($(this).attr('id') == 3 ){

                    alert(isChecked)
                    $.fn.check_video(isChecked, id_curso, id_clase);
                }           
            });
        }
        if($(this).attr('id') == 4 ){
            $('input[type=checkbox]').each(function(){
                var isChecked = this.checked;

                if($(this).attr('id') == 4 ){

                    alert(isChecked)
                    $.fn.check_video(isChecked, id_curso, id_clase);
                }           
            });
        }


        //var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        //$('#1').prop("checked", "checked");
        /*checkboxes.forEach(function(checkbox) {
            //checkbox.addEventListener('click', function() {
            checkbox.addEventListener('click', function() {

                var isChecked = this.checked;
                if($(this).attr('id')){
                    alert("id"+$(this).attr('id'));
                    //check_video(isChecked, id_curso,id_clase);
                }
                
                // Aquí puedes hacer algo con el valor de isChecked
            });
        });*/
       
        //var checkbox = document.querySelector('input[type="checkbox"]');
        //alert("VALOR DE "+checkbox);
        //var isChecked = checkbox.checked;
        //let name = document.getElementById("1").element.nodeName;
        //alert("Elemento = "+name);
        //$.fn.check_video(id_curso,id_clase);
        /*Array.from(document.querySelectorAll(".btn_check")).forEach((x) => {
            
            //x.onclick = leeForma;

            x.onclick = check_video;

            //;
            

            //click
        });*/
        //El método .is(selector)

        //alert($(this).attr('id')) ;

        //if( $('btn_check').prop('checked') ) {
            //alert($(this).attr('id')+' esta Seleccionado');
            //$('#1').prop("checked", true);
            //$('#1').prop("checked", false);
        //}else{
            //alert($(this).attr('id')+' NO esta Seleccionado');
        //}

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

/*function check_video(isChecked, evento, cfe) {

    alert(isChecked);
    //let forma = evento.target.parentNode;
    //alert("forma = "+forma);
}*/



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
            //alert("CHECK PRUEBA3");
            //console.log(Respuesta.msj);
            console.log(Respuesta.check);
            let valores= Respuesta.check;
            //console.log(valores.length);
            for (let i = 0; i < valores.length; i++) {
                let valor = valores[i];

                if(valor.status === "t"){

                    //alert("ID = "+valor.id_curso+"VAlor ="+valor.status);

                    $('#'+valor.id_clase).attr("checked", true);
                }else{

                    $('#'+valor.id_clase).attr("checked", false);

                }
                //console.log(valor.id_curso);
                //console.log(valor.id_clase);
                //console.log(valor.id_usuario);
                //console.log(valor.status);
            }
            //console.log(valores);
            
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

$.fn.check_video = function(check, id_curso, id_clase){
    //, id_curso, id_clase
    //alert("CKECK = "+ check)
    //alert("ID CURSO = "+ id_curso)
    //alert("IDE CLASE = "+id_clase)


    //exit()
    //let forma = evento.target.parentNode;

    //alert("evento = "+forma);
    url = window.location.origin;//obtiene el punto de partida o el nombre de la pagina, mas no en donde estamos ubicados
    //alert("check_video"+id_clase);
	//var url		= url+'/login_Controlador';
    
    var data 	= '&id_curso='+id_curso+'&id_clase='+id_clase+'&check='+check+'&action='+'check_video';
	$.ajax({
		url: url+'/Github/cursos_online/mod_curso/clases_Controlador.php',
		type: 'POST',
		data: data,
		success: function(resp) {
            //console.log(resp);
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