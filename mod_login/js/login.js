/*  VARIABLE GLOBAL PARA ALMACENAR CONEXIONES AJAX PENDIENTES O EN PROCESO  */
var xhr = [];

var form          = false;

//Se carga por defecto al iniciar 
$(document).ready(function(){

    //Inicializamos formato Tooltips por su atributo data-bs-toggle:
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    });
    //Fin Tooltips

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

    $('.redirec_login').unbind();
    $('.redirec_login').click(function(){
        //alert("Redireccionar al login");
        window.location.href = "../mod_login/login.php";

    });

    $('.btn_siguiente1').unbind();
    $('.btn_siguiente1').click(function(){
        var  condicion = 1;
        $.fn.validacion(condicion);//Validacion por medio de Bootstrap CSS  v5.1.3
        //$.fn.siguiente1();

    });
   
    /* si se llama (.) nos indica que es una CLASS pero si es (#) nos indica que es un ID*/ 
    /*.btn_Entrar*/
        $('.btn_Entrar').unbind();
        //$("p").unbind("click"); 
        $('.btn_Entrar').click(function(){

            var  condicion = 2;
            
            $.fn.validacion(condicion);//Validacion por medio de Bootstrap CSS  v5.1.3
           
        });
    /*.btn_Registrar*/
    $('.btn_registrar').unbind();
    $('.btn_registrar').click(function(){

        var  condicion = 4;
        $.fn.validacion(condicion);
       
    });
        
}/*Fin de la función eventos*/
/*FIN donde se especifican los eventos*/

//******VALIDACIONES */
$.fn.validacion = function (condicion) {
	//'use strict'
	// Ejemplo de JavaScript de inicio para deshabilitar el envío de formularios si hay campos no válidos
	var forms = document.querySelectorAll('.needs-validation')
  
	// Haz un bucle sobre ellos y evita la sumisión
	Array.prototype.slice.call(forms)
        .forEach(function (form) {
            
            //form.addEventListener('click', function (event) {
                //Esta validacion se elimino ya que el select fue resuelto y sirva para todos los formularios
           /* if( $('#cbCed_afiliado').val().trim() === ''){
                //MODAL
                $( "#div_header" ).addClass( "alert-danger" );
                $('#msj_respuesta').find('.modal-title').text("ALERTA!");
                $('#msj_respuesta').find('.modal-body').text("Los campos con * son Obligatorios");
                $('#msj_respuesta').modal('show');//Aqui habilito el modal para que lo muestre
            }else{*/
                if (!form.checkValidity()) {

                    event.preventDefault()
                    event.stopPropagation()
                    
                }
                else{
                    
                    if(condicion == 2){//SIGUIENTE 1

                        //alert('Boton Entrar');
                        var data_fmr = $('#frm').serialize();//Se utiliza serialize en vez de serializeArray porque este permite organizar bien cada imagen como un arreglo independiente debido a la manera en que se creo la imagen en la vista. A diferencia de serializeArray que lo concatenaba todo y no permitia separarlo haciendo el include dentro del mismo arreglo
                        $.fn.ingresar(data_fmr);//Llama a la funcion Ingresar
                    }

                    if(condicion == 4){//Registrar Usuario
                        
                        var data_fmr = $('#frmRegistro').serialize();
                        $.fn.RegistrarUsuario(data_fmr);

                    }

                    if(condicion == 5){//btn_consultar_saime2

                        var data_fmr = $('#frmRegistro').serialize();
                        $.fn.usuario_ya_registrado2(data_fmr);

                    }

                    if(condicion == 1){//SIGUIENTE 1
                        
                        var data_fmr = $('#frm_olvido').serialize();
                        $.fn.VerificarUsuario(data_fmr);
                       // 

                    }
                
                }
            //}
    
            form.classList.add('was-validated')
            //}, false)
        });

        $.fn.eventos();
 // }()
}

// Example starter JavaScript for disabling form submissions if there are invalid fields

function leeForma(evento) {
    let validoo = false;
    let forma = evento.target.parentNode;
    //noValidate
    //console.log(forma);
    //alert("Leyo la forma '" + forma.id + "'");
  
    if (forma.checkValidity()) validoo = valida(forma);
  
    if (validoo){
        //frm_olvido2
        var data_fmr = $('#frm_olvido2').serialize();//Se utiliza serialize en vez de serializeArray porque este permite organizar bien cada imagen como un arreglo independiente debido a la manera en que se creo la imagen en la vista. A diferencia de serializeArray que lo concatenaba todo y no permitia separarlo haciendo el include dentro del mismo arreglo
        var data 	= data_fmr+'&action='+'btnvalidarPreguntas';
        $.ajax({
            url: '/snilpd/mod_login/login_Controlador.php',
            type: 'POST',
            data: data,
            success: function(resp) {
                var resultado = JSON.parse(resp);
                console.log("ARRAYRESULTADO="+resultado.msj);
                //1  Funciona
                // console.log(resp);
                //var resultado=resp.split("|");
                //console.log(resultado[0]+"="+resultado[1]);
                if(resultado.cod == 0){//ERROR

                    $( "#div_header" ).removeClass("alert-success");//Se elimina primero la clase ya que luego se concatena y prevalece la ultima q se agrego
                    $( "#div_header" ).addClass( "alert-danger" );
                    $('#msj_respuesta').find('.modal-title').text("ALERTA!");
                    $('#msj_respuesta').find('.modal-body').text(resultado.msj);
                    $('#msj_respuesta').modal('show');//Aqui habilito el modal para que lo muestre

                }else{

                    $( "#div_header" ).removeClass("alert-danger");//Se elimina primero la clase ya que luego se concatena y prevalece la ultima q se agrego
                    $( "#div_header" ).addClass( "alert-success" );
                    $('#msj_respuesta').find('.modal-title').text("ALERTA!");
                    $('#msj_respuesta').find('.modal-body').text(resultado.msj);
                    $('#msj_respuesta').modal('show');//Aqui habilito el modal para que lo muestre
                    
                setTimeout( function() { window.location.href = "../mod_login/login.php"; }, 5000 );

                }
                
            }
        });
        //alert("¡Fifa!");
    } 
    else{

        //forma.classList.add('was-validated')
        $( "#div_header" ).removeClass("alert-success");//Se elimina primero la clase ya que luego se concatena y prevalece la ultima q se agrego
        $( "#div_header" ).addClass( "alert-danger" );
        $('#msj_respuesta').find('.modal-title').text("ALERTA!");
        $('#msj_respuesta').find('.modal-body').text("ERROR VALIDAR RADIO");
        $('#msj_respuesta').modal('show');//Aqui habilito el modal para que lo muestre
        //alert("Ta malo");
    } 
    return validoo;
  }
  
  function valida(forma) {

    //alert("Validación de la forma " + forma.id);
    return true;
  }
//.VAlidaciones


$.fn.ingresar = function(data_fmr){

    url = window.location.origin;//obtiene el punto de partida o el nombre de la pagina, mas no en donde estamos ubicados
    //alert("INGRESO");
	//var url		= url+'/login_Controlador';

    var data 	= data_fmr+'&action='+'btnentrar';
	$.ajax({
		url: url+'/Github/cursos_online/mod_login/login_Controlador.php',
		type: 'POST',
		data: data,
		success: function(resp) {
            //alert("INGRESO")
			//console.log(jsonData.cod);
            //1  Funciona
            //console.log(resp);
            var resultado=resp.split("|");
            
            console.log(resultado[0]+"="+resultado[1]+"status"+resultado[2]);


        if(resultado[0] == 0){//NO EXISTE EL USUARIO

            $( "#div_header" ).removeClass("alert-success");//Se elimina primero la clase ya que luego se concatena y prevalece la ultima q se agrego
		    $( "#div_header" ).addClass( "alert-danger" );
		    $('#msj_respuesta').find('.modal-title').text("ALERTA!");
		    $('#msj_respuesta').find('.modal-body').text(resultado[1]);
		    $('#msj_respuesta').modal('show');//Aqui habilito el modal para que lo muestre

        }else{
            if(resultado[2] == 'A'){

                window.location.href = "../mod_curso/cursos.php";
           // setTimeout( function() { window.location.href = "https://professor-falken.com"; }, 5000 );
    
            }else{
                //window.location.href = "../mod_login/olvido_contra.php";
            }

        }
          
		}
	});
}

function usuario_ya_registrado(cedula){
    
    var  condicion = 5;//Validar si el usuario ya esta registrado
    $.fn.validacion(condicion);

  
}

$.fn.usuario_ya_registrado2 = function(data_fmr){
    //var url = window.location.origin;
    //console.log(url);
    var data_fmr = $('#frmRegistro').serialize();//Se utiliza serialize este permite organizar bien cada campo como un arreglo independiente.
    //var data 	= data_fmr+'&txt_usuario='+cedula+'&action='+'consultar_SAIME';
    var data 	= data_fmr+'&action='+'validarUsuarioRegistrado';
  
        $.ajax({
            type: 'POST',
            url:'/Github/cursos_online/mod_login/login_Controlador.php',
            data: data,
            success: function(resp) {
                console.log("Resultado desde el controlador = "+resp)
                //usuario= JSON.parse(resp)
                //console.log(usuario.cod+"<=RESPUESTA");
                //alert(usuario.msj)
                //alert('Validar usuario en BD');
                var usuario=resp.split("|");
                console.log(usuario[0]+"="+usuario[1]+usuario[2]);
                
                if(usuario[0] == 0){//NO EXISTE EL USUARIO EN LA PRIMERA CONSULTA
                    //$('#txt_usuario').val(null);
                    $('#nombre_afiliado1').val(null);
                    $('#nombre_afiliado2').val(null);
                    $('#nombre_afiliado2').val(null);
                    $('#nombre_afiliado2').val(null);
                    $('#telefono_afiliado').val(null);
                    $('#email_afiliado').val(null);
                    $('#email_afiliado2').val(null);
                    document.getElementById("cbSexo_afiliado").value="";
                    //Con los nombres de los ID
                    //$('input[type="text"]').val('');//Limpia todos los campos Input
                    $( "#div_header" ).removeClass("alert-danger");//Se elimina primero la clase ya que luego se concatena y prevalece la ultima q se agrego
                    $( "#div_header" ).addClass( "alert-warning" );
                    $('#msj_respuesta').find('.modal-title').text("ALERTA!");
                    $('#msj_respuesta').find('.modal-body').text(usuario[1]);
                    $('#msj_respuesta').modal('show');//Aqui habilito el modal para que lo muestre
        
                }
                if(usuario[0] == 1){//Muestra los datos para culminar

                    $('#nombre_afiliado1') .val(usuario[2]);
                    $('#nombre_afiliado2') .val(usuario[3]);
                    $('#apellido_afiliado1') .val(usuario[4]);
                    $('#apellido_afiliado2') .val(usuario[5]);

                    document.getElementById("cbSexo_afiliado").value=usuario[6];
                    $('#fnacimiento_afiliado') .val(usuario[7]);


                    $( "#div_header" ).removeClass("alert-danger");//Se elimina primero la clase ya que luego se concatena y prevalece la ultima q se agrego
                    $( "#div_header" ).addClass( "alert-warning" );
                    $('#msj_respuesta').find('.modal-title').text("ALERTA!");
                    $('#msj_respuesta').find('.modal-body').text(usuario[1]);
                    $( "#btn_cerrar" ).removeClass( "redirec_login" );
                    $('#msj_respuesta').modal('show');//Aqui habilito el modal para que lo muestre
                    //1= USUARIO SI EXISTE EN EL SAIME
                    // setTimeout( function() { window.location.href = "https://professor-falken.com"; }, 5000 );
                }
                if(usuario[0] == 2){//Usuario ya registrado

                    $('#nombre_afiliado1').val(null);
                    $('#nombre_afiliado2').val(null);
                    $('#apellido_afiliado1').val(null);
                    $('#apellido_afiliado2').val(null);
                    $('#fnacimiento_afiliado').val(null);
                    $('#telefono_afiliado').val(null);
                    $('#email_afiliado').val(null);
                    $('#email_afiliado2').val(null);
                    document.getElementById("cbSexo_afiliado").value="";
                    
                    $("#div_header" ).removeClass("alert-warning");//Se elimina primero la clase ya que luego se concatena y prevalece la ultima q se agrego
                    $( "#div_header" ).addClass( "alert-danger" );
                    $('#msj_respuesta').find('.modal-title').text("ALERTA!");
                    $('#msj_respuesta').find('.modal-body').text(usuario[1]);
                    $( "#btn_cerrar" ).addClass( "redirec_login" );
                    $('#msj_respuesta').modal('show');//Aqui habilito el modal para que lo muestre

                    $.fn.eventos();

                }
                if(usuario[0] == 3){//ALGUN CAMPO VACIO

                    //$('#txt_usuario').val(null);
                    $('#nombre_afiliado1').val(null);
                    $('#nombre_afiliado2').val(null);
                    $('#nombre_afiliado2').val(null);
                    $('#nombre_afiliado2').val(null);
                    $('#telefono_afiliado').val(null);
                    $('#email_afiliado').val(null);
                    $('#email_afiliado2').val(null);
                    document.getElementById("cbSexo_afiliado").value="";

                    $( "#div_header" ).removeClass("alert-danger");//Se elimina primero la clase ya que luego se concatena y prevalece la ultima q se agrego
                    $( "#div_header" ).addClass( "alert-warning" );
                    
                    $('#msj_respuesta').find('.modal-title').text("ALERTA!");
                    $('#msj_respuesta').find('.modal-body').text(usuario[1]);
                    $( "#btn_cerrar" ).removeClass( "redirec_login" );
                    $('#msj_respuesta').modal('show');//Aqui habilito el modal para que lo muestre
                    
                    
                }
                
            }
        });
    //}
}
    
$.fn.RegistrarUsuario = function(data_fmr){
    //url = window.location.origin;
    //alert("Registro de Usurio1");
	//var url		= url+'/login_Controlador';
    var data 	= data_fmr+'&action='+'RegistrarUsuario';
	$.ajax({
		url: '/Github/cursos_online/mod_login/login_Controlador.php',
		type: 'POST',
		data: data,
		success: function(resp) {
            //console.log(resp)
		
            var resultado=resp.split("|");
            
            console.log(resultado[0]+"="+resultado[1]);

        if(resultado[0] == 0){//ERROR AL REGISTRAR USUARIO EN ALGUN PROCESO
            $( "#div_header" ).removeClass("alert-primary");
            $( "#div_header" ).removeClass("alert-warning");//Se elimina primero la clase ya que luego se concatena y prevalece la ultima q se agrego
		    $( "#div_header" ).addClass( "alert-danger" );
		    $('#msj_respuesta').find('.modal-title').text("ALERTA!");
		    $('#msj_respuesta').find('.modal-body').text(resultado[1]);
		    $('#msj_respuesta').modal('show');//Aqui habilito el modal para que lo muestre

        }else{//REGISTRO EXITOSO

            $('input[type="text"]').val('');//Limpia todos los campos Input
            $('#telefono_afiliado').val(null);
            $('#email_afiliado').val(null);
            $('#email_afiliado2').val(null);
            document.getElementById("cbSexo_afiliado").value="";
            document.getElementById("fnacimiento_afiliado").value="";
            

            $( "#div_header" ).removeClass("alert-warning");
            $( "#div_header" ).removeClass("alert-danger");
            //$( "#div_header" ).removeClass("alert-success");//Se elimina primero la clase ya que luego se concatena y prevalece la ultima q se agrego
		    $( "#div_header" ).addClass( "alert-primary" );
		    $('#msj_respuesta').find('.modal-title').text("Registro");
		    $('#msj_respuesta').find('.modal-body').text(resultado[1]);
		    $('#msj_respuesta').modal('show');//Aqui habilito el modal para que lo muestre
            //window.location.href = "../mod_login/login.php";
            //setTimeout( function() { window.location.href = "../mod_login/login.php"; }, 5000 );

        }
			
		}
	});
}

$.fn.VerificarUsuario = function(data_fmr){
    
    var data 	= data_fmr+'&action='+'VerificarUsuario';
	$.ajax({
		url: '/snilpd/mod_login/login_Controlador.php',
		type: 'POST',
		data: data,
		success: function(resp) {
		
            var resultado=resp.split("|");
            
            //console.log(resultado[0]+"="+resultado[1]+"="+resultado[2]+"="+resultado[3]);

        if(resultado[0] == 0){//USUARIO NO EXISTE
            $( "#div_header" ).removeClass("alert-primary");
            $( "#div_header" ).removeClass("alert-warning");//Se elimina primero la clase ya que luego se concatena y prevalece la ultima q se agrego
		    $( "#div_header" ).addClass( "alert-danger" );
		    $('#msj_respuesta').find('.modal-title').text("ALERTA!");
		    $('#msj_respuesta').find('.modal-body').text(resultado[1]);
		    $('#msj_respuesta').modal('show');//Aqui habilito el modal para que lo muestre


        }else{//MUESTRA LOS VALORES ENCONTRADOS

           //var data 	= data_fmr+'&nombress='+resultado[2]+'&apellidoss='+resultado[3];
           //SE ACTUALIZAN LAS ETIQUETAS SEGUN SU ID, MODIFICANDO SU VALOR EN EL HTML SIN RECARGAR LA PAGINA
           $('#nombress').html('<h6 id="nombress" style="color: grey;"><strong>Nombres: </strong>'+resultado[2]+'</h6>');
           $('#apellidoss').html('<h6 id="apellidoss" style="color: grey;"><strong>Apellidos: </strong>'+resultado[3]+'</h6>');
           $('#Pregunta1').html('<h6 id="Pregunta1" style="color: grey;"><strong></strong>'+resultado[4]+'</h6>');
           $('#Pregunta2').html('<h6 id="Pregunta2" style="color: grey;"><strong></strong>'+resultado[5]+'</h6>');
            //$.fn.siguiente1(data);
            if (window.innerWidth > 850){
                formulario_register.style.display = "none";
                
                formulario_validacion.style.display = "block";//Mostrar

                contenedor_login_register.style.left = "410px";
                contenedor_login_register.style.left = "410px";
                formulario_login.style.display = "none";
                formulario_clave.style.display = "none";
                caja_trasera_register.style.opacity = "0";
                caja_trasera_login.style.opacity = "1";
            }else{
                formulario_register.style.display = "none";
                formulario_validacion.style.display = "block";
                contenedor_login_register.style.left = "0px";
                formulario_login.style.display = "none";
                formulario_clave.style.display = "none";
                caja_trasera_register.style.display = "none";
                caja_trasera_login.style.display = "block";
                caja_trasera_login.style.opacity = "1";
            }

        }
          
		}
	});
}