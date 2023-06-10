$(document).ready(function() {

	Array.from(document.querySelectorAll(".button")).forEach((x) => {
		x.onclick = leeForma;
		
	});

	$('input[id=pswd]').keyup(function() {
		// set password variable
		var pswd = $(this).val();
		//validate the length Debe tener + de 10 caracteres para ser valido
			if ( pswd.length < 11 ) {
				$('#length').removeClass('text-success').addClass('text-danger');
			} else {
				$('#length').removeClass('text-danger').addClass('text-success');
			}
			//validate letter
			if ( pswd.match(/[a-z]/) ) {
				//$('#letter').removeClass('invalid').addClass('valid');
				$('#letter').removeClass('text-danger').addClass('text-success');
			} else {
				$('#letter').removeClass('text-success').addClass('text-danger');
			}
			
			//validate capital letter
			if ( pswd.match(/[A-Z]/) ) {
				$('#capital').removeClass('text-danger').addClass('text-success');
			} else {
				$('#capital').removeClass('text-success').addClass('text-danger');
			}
			
			//validate number
			if ( pswd.match(/\d/) ) {
				$('#number').removeClass('text-danger').addClass('text-success');
			} else {
				$('#number').removeClass('text-success').addClass('text-danger');
			}
			
			//validate character
			if ( pswd.match(/(?=[@#%&]|-|_)/) ) {
				$('#character').removeClass('text-danger').addClass('text-success');
			} else {
				$('#character').removeClass('text-success').addClass('text-danger');
			}
			
			//}).focus(function() {
			//	$('#pswd_info').show();
			//}).blur(function() {
			//	$('#pswd_info').hide();
	});


	$('input[id=pswd2]').keyup(function() {
		// set password variable
		var campo1 = document.getElementById("pswd").value;
		var campo2 = document.getElementById("pswd2").value;
		//validate the length
			if ( campo1 == campo2 ) {
				$('#letter2').removeClass('text-danger').addClass('text-success');
			} else {
				$('#letter2').removeClass('text-success').addClass('text-danger');
			}

			//}).focus(function() {
			//	$('#pswd_info2').show();
			//}).blur(function() {
			//	$('#pswd_info2').hide();
	});

	$.fn.eventos();
});

/******************************************/
/*Función donde se especifican los eventos*/
/******************************************/
$.fn.eventos = function(){

    $('.redirec_index').unbind();
    $('.redirec_index').click(function(){

        window.location.href = "../mod_snilpd/index.php";

    });
        
}/*Fin de la función eventos*/
/*FIN donde se especifican los eventos*/

//--------------------------------------------------------------------------------------------------

//-Tiene letras y n�meros: +30% 
//-Tiene may�sculas y min�sculas: +30% 
//-Tiene entre 4 y 5 caracteres: +10% 
//-Tiene entre 6 y 8 caracteres: +30% 
//-Tiene m�s de 8 caracteres: +40%

function seguridad_clave(pswd){
   var seguridad = 0;
   if (pswd.length!=0){
      if (tiene_numeros(pswd) && tiene_letras(pswd)){
         seguridad += 20;
      }
      if (tiene_minusculas(pswd) && tiene_mayusculas(pswd)){
         seguridad += 20;
      }
	  if (tiene_caracterespeciales(pswd)){
         seguridad += 20;
      }
      if (pswd.length >= 4 && pswd.length <= 5){
         seguridad += 10;
      }else{
         if (pswd.length >= 6 && pswd.length <= 8){
            seguridad += 30;
         }else{
            if (pswd.length > 8){
               seguridad += 40;
            }
         }
      }
   }
   return seguridad            
} 

function muestra_seguridad_clave(pswd,formulario){
   seguridad=seguridad_clave(pswd);
   document.getElementById("seguridad").innerHTML="Nivel de Seguridad: " + seguridad + "%";
}

var numeros="0123456789";

function tiene_numeros(texto){
   for(i=0; i<texto.length; i++){
      if (numeros.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}

var letras="abcdefghyjklmn�opqrstuvwxyz";

function tiene_letras(texto){
   texto = texto.toLowerCase();
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}

var letras="abcdefghyjklmn�opqrstuvwxyz";

function tiene_minusculas(texto){
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}

var letras_mayusculas="ABCDEFGHYJKLMN�OPQRSTUVWXYZ";

function tiene_mayusculas(texto){
   for(i=0; i<texto.length; i++){
      if (letras_mayusculas.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}

var caracterespeciales="@#%&";

function tiene_caracterespeciales(texto){
   for(i=0; i<texto.length; i++){
      if (caracterespeciales.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}

//--------------------------------------------------------------------------------------------------

function aceptar(saction){
	valido=1;
	condicion=1;
	var pswd = $("#pswd").val();
	
	mensaje="ESTIMADO USUARIO SE DEBE CUMPLIR CON TODAS LAS CONDICIONES \n\n";

	if($("#pswd").val()==''){
	 document.getElementById("pswd").style.borderColor= 'Red';
	 mensaje+= "- DEBE LLENAR LOS CAMPOS REQUERIDOS. \n";
	 valido=0;
	 condicion=0;
	}else{
		document.getElementById("pswd").style.borderColor= '';
	
		if ( pswd.length < 10 ) { 
			condicion=0;
		}
		//validate letter
		if ( pswd.match(/[a-z]/) ) {
		}else{
			condicion=0;
		}
		//validate capital letter
		if ( pswd.match(/[A-Z]/) ) {
		}else{
			condicion=0;
		}
		//validate number
		if ( pswd.match(/\d/) ) {
		}else{
			condicion=0;
		}
		//validate character
		if ( pswd.match(/(?=[@#%&]|-|_)/) ) {
		}else{
			condicion=0;
		}
	}
	
	if(condicion==0){
		alert(mensaje);
	}

	if($("#pswd2").val()=='' && condicion==1){
	 document.getElementById("pswd2").style.borderColor= 'Red';
	 alert('DEBE LLENAR LOS CAMPOS REQUERIDOS');
	 valido=0;		
	}
	
	if(valido==1 && condicion==1){
		if($("#pswd2").val()!=$("#pswd").val()){
			alert("LAS CONTRASE\u00D1AS NO COINCIDEN");
			//$("#pswd").val('');
			$("#pswd2").val('');
			//$('#length').removeClass('valid').addClass('invalid');
			//$('#letter').removeClass('valid').addClass('invalid');
			//$('#capital').removeClass('valid').addClass('invalid');
			//$('#number').removeClass('valid').addClass('invalid');
			//$('#character').removeClass('valid').addClass('invalid');
		}else{
			var form = document.form;
			form.action.value=saction;
			form.submit();
			$("#loader").show();
		}
	}
}

function regresar(saction){
	var form = document.form;
	form.action.value=saction;
	form.submit();
	$("#loader").show();
}

/*function limpiar(){
			$("#pswd").val('');
			$("#pswd2").val('');
			$('#length').removeClass('valid').addClass('invalid');
			$('#letter').removeClass('valid').addClass('invalid');
			$('#capital').removeClass('valid').addClass('invalid');
			$('#number').removeClass('valid').addClass('invalid');
			$('#character').removeClass('valid').addClass('invalid');
			$('#letter2').removeClass('valid').addClass('invalid');
}*/

function leeForma(evento) {
    let validoo = false;
    let forma = evento.target.parentNode;
    //noValidate
    //console.log(forma);
    //alert("Leyo la forma '" + forma.id + "'");
  
    if (forma.checkValidity()){
		validoo = true;
	}

	forma.classList.add('was-validated')//Le agrego atributo a la clase del Formulario

    if (validoo){
        //frm_olvido2
        var data_fmr = $('#'+forma.id).serialize();//Se utiliza serialize en vez de serializeArray porque este permite organizar bien cada imagen como un arreglo independiente debido a la manera en que se creo la imagen en la vista. A diferencia de serializeArray que lo concatenaba todo y no permitia separarlo haciendo el include dentro del mismo arreglo
        var data 	= data_fmr+'&action='+'btn_actualizar_clave';
        $.ajax({
            url: '/Github/cursos_online/mod_login/olvido_contra_controlador.php',
            type: 'POST',
            data: data,
            success: function(resp) {
                var resultado = JSON.parse(resp);
                console.log("ARRAYRESULTADO="+resultado.msj);
                //1  Funciona
            	// console.log(resp);

                //var resultado=resp.split("|");
                
                //console.log(resultado[0]+"="+resultado[1]);


				//if(resultado[0] == 0){//NO EXISTE EL USUARIO
				if(resultado.cod == 0){//ERROR
					//alert("CODIGO 0");
					$( "#div_header" ).removeClass("alert-success");//Se elimina primero la clase ya que luego se concatena y prevalece la ultima q se agrego
					$( "#div_header" ).addClass( "alert-danger" );
					$('#msj_respuesta').find('.modal-title').text("ALERTA!");
					$('#msj_respuesta').find('.modal-body').text(resultado.msj);
					$( "#btn_cerrar" ).removeClass( "redirec_index" );
					$('#msj_respuesta').modal('show');//Aqui habilito el modal para que lo muestre

				}else{

					$( "#div_header" ).removeClass("alert-danger");//Se elimina primero la clase ya que luego se concatena y prevalece la ultima q se agrego
					$( "#div_header" ).addClass( "alert-success" );
					$('#msj_respuesta').find('.modal-title').text("ALERTA!");
					$('#msj_respuesta').find('.modal-body').text(resultado.msj);
					$( "#btn_cerrar" ).addClass( "redirec_index" );
					$('#msj_respuesta').modal('show');//Aqui habilito el modal para que lo muestre
					//window.location.href = "../mod_snilpd/index.php";//mod_snilpd
				//setTimeout( function() { window.location.href = "../mod_login/login.php"; }, 5000 );

				}
				
				$.fn.eventos();
                //$.fn.resp_ingresar(e);
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

