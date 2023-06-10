<?php
/*include_once('../mod_menu/tblpersonalesModelo.php');
include_once('../mod_menu/tblsesionModelo.php');
include_once('../mod_menu/tblusuariorolModelo.php');
include_once('../mod_menu/tblrolopcionModelo.php');
include_once('../mod_menu/tblopcionModelo.php');
include_once('../mod_menu/tblmoduloModelo.php');*/

session_start();
//$conecto = 1;

ini_set("display_errors",1);
error_reporting(E_ALL | E_STRICT);

//-------------------------------------------------------------
/*include('../include/header.php');
$conn= getConnDB($db1); //SIRE
$conn->debug = false;

$conn2 = &ADONewConnection('postgres');
$conn2->PConnect('10.46.1.93','postgres','postgres','entes');
$conn2->debug = false;*/

//Mi EQUIPO LOCAL
include_once('../include/adodb5/adodb.inc.php');

$conn = NewADOConnection('postgres');
$conn->connect('127.0.0.1','postgres','root','cursos_online');
$conn->debug = false;
/*$conn2 = adoNewConnection('postgres');
$conn2->PConnect('127.0.0.1','postgres','root','entes');
$conn2->debug = false;*/



//$conn2= getConnDB($db5);

//-------------------------------------------------------------
//$aDefaultForm = array();
//$aPageErrors = array();

if (isset($_POST['action'])){
	$Cod = "";
	$Msj = "";
	$Valores ="";
	switch($_POST["action"]){
		
		case'btnentrar':
			
			$clave=$_POST['txt_clave'];
			$clave_md5=md5($clave);

			$usuario = $_REQUEST['cbCed_afiliado'].$_REQUEST['txt_usuario'];
			//$usuario = $_REQUEST['txt_usuario'];
			
			$SQL="select * From public.usuarios where cedula='".$usuario."' and clave = '".$clave_md5."'";
		 	$rs1 = $conn->Execute($SQL);

			//$Cod = "0";
			//$Valores = "PRUEBA";
			if ($rs1->RecordCount()>0){
				/**
				 * Crea Sesiones Generales de inicio 
				 */
				$_SESSION['sUsuario']=$_REQUEST['txt_usuario'];
				$_SESSION['cedula']=$usuario;
				$_SESSION['status']=$rs1->fields['status'];
				//$usuario = $_REQUEST['nacionalidad'].$_REQUEST['ced_afiliado'];

						//$SQL2="select * From public.personas where cedula='".$usuario."'";
						//$rs2 = $conn->Execute($SQL2);

				$_SESSION['id_usuario']=$rs1->fields['id'];
				//$_SESSION['ced_afiliado']=$rs2->fields['cedula'];
				//$_SESSION['sesiones']=$rs2->fields['sesiones'];
				
				$Cod = "1";
				$Valores = "INGRESO";
				
			}else{

				$Cod = "0"; //Positivo
				$Valores = "USUARIO O CONTRASEÑA ERRADA";
				
			}
			//if($conecto == 1){
				//$bValidateSuccess=true;
				//if($_POST['txt_clave'] == '' or $_POST['txt_usuario'] == '' or $_POST['nnacionalidad'] == '0'){
					//$GLOBALS['aPageErrors'][]= "- Ningun campo debe quedar vacio!";
					//$bValidateSuccess=false;
				//}
				//else{

					//print "<script>document.location='../vista.php'</script>";
				//}
			//}else{
				//$GLOBALS['aPageErrors'][]= "- Problemas de conexion a la base de datos. Comuniquese con el administrador del sistema.";
				//$bValidateSuccess=false;
			//}
			$status= $_SESSION['status'];
			echo $Cod."|".$Valores."|".$status;
		break;
		
		case'VerificarUsuario':
			//Eliminamos primero posibles sesiones creadas
			unset($_SESSION["nombres"]);
			unset($_SESSION["apellidos"]);
			unset($_SESSION["VALIDUSER"]);
			unset($_SESSION["VALIDUSERCI"]);
			unset($_SESSION["condition_question_1"]);
			unset($_SESSION["condition_question_2"]);

			$_SESSION["VALIDUSER"] = $usuario = $_REQUEST['nacionalidad'].$_REQUEST['ced_afiliado'];//PARA VALIDAR EN OTRO PROCESO DE ESTE FICHERO
			$_SESSION["VALIDUSERCI"] = $_REQUEST['ced_afiliado'];
			$SQL3=" SELECT 
				id,cedula,nombres,apellidos,nacionalidad,tipo_usuario, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido
				FROM personas
				WHERE cedula='".$usuario."'
				AND status='A'
				LIMIT 1 ";

				$rs3=$conn->Execute($SQL3);

				if ($rs3->RecordCount()>0){
					
					$Valores1=trim($rs3->fields['primer_nombre'])." ".trim($rs3->fields['segundo_nombre']);
					$_SESSION["nombres"]=$Valores1;
					$Valores2=trim($rs3->fields['primer_apellido'])." ".trim($rs3->fields['segundo_apellido']);
					$_SESSION["apellidos"]=$Valores2;

			/*<<<<<<<<<<<<<<<<<<<INICIO DE ELECCION DE PREGUNTAS*/
				//Primera opcion TELEFONO
					
					$_SESSION["condition_question_1"] = array(1, 2);
					
					shuffle($condition_question_1);//reorganizar el Array

					if($_SESSION["condition_question_1"][1] == 1){// VERDADERO

						//$_SESSION['condition_question_1']=true;
						$condicion1='SI ';

						$sql="select telefono from personas WHERE cedula='".$usuario."'	AND status='A'  LIMIT 1";
						$rs= $conn->Execute($sql);

						if($rs->RecordCount()>0){
								$query_1 = $rs->fields[0];
								$condicion1='SI ';
						}
						//else{
								//$query_1 ='04126290121';
								//$condicion1='NO ';
						//}
					}
					if($_SESSION["condition_question_1"][1] == 2){// FALSO
						//$_SESSION['condition_question_1']=false;
						//$condicion1='NO ';

						$sql="SELECT telefono	FROM personas	
						where  cedula<>'".$usuario."'	AND status='A'  ORDER BY RANDOM () LIMIT 1";
						if($rs= $conn->Execute($sql))	
						$query_1 = $rs->fields[0];	

						//$respuesta1=2;
					}
					//'.$condicion1.'
					/*
					<div class="form-check row">
								<input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" required>
								<label class="form-check-label" for="validationFormCheck2">NO</label>
				
							</div>

					<div class="input-group">
							<div class="form-check">
								<input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" required>
								<label class="form-check-label" for="validationFormCheck2">SI</label>
							</div>
						</div>

						<div class="input-group">
							<div class="form-check">
								<input type="radio" class="form-check-input" id="validationFormCheck1" name="radio-stacked" required>
								<label class="form-check-label" for="validationFormCheck1">NO</label>
							</div>
						</div>
					*/ 
					$Preguntas[0] =
						'
						<br><h6 style="color: grey;"><b>INDIQUE SI SU NUMERO TELEFONICO ES EL SIGUIENTE:</b>'.$query_1.'</h6>

						<div style="width: 50%;margin: 0 80px">
							<input type="radio" style="width: 10%;" class="form-check-input" name="respuesta1" value="1" required>
							<span class="text-secondary">SI</span>
						</div>
						<div style="width: 50%;margin: -33px 0px 0 190px; position:relative;">
							<input type="radio" style="width: 10%;" class="form-check-input" name="respuesta1" value="2"  required>
							<span class="text-secondary">NO</span>
						</div>
						';
						/*
						<tr>
							<tr>
								<td align="lefth" class=""><font color="#585858"><b>INDIQUE SI SU NUMERO TELEFONICO '.$condicion1.'ES EL SIGUIENTE:</b>			</font>
								</td>
							</tr>
							<tr>
							  	<td align="lefth" class=""><font color="#585858">NUMERO TELEFONICO REGISTRADO:  '.$query_1.'</font>
								</td>
							</tr
						<tr>
						<td align="lefth"  id="td_respuesta1" width="30%"><b> 
						
							  &nbsp;&nbsp;
							  SI
							  <input type="radio" name="respuesta1" id="valor1"  value="1"/>
							  &nbsp;&nbsp;
							  NO
							   <input type="radio" name="respuesta1" id="valor2"  value="2"/>
							  &nbsp;&nbsp;     
							  <span>*</span></b>
							  </td>
						</tr>
						*/

						
				// ./Primera opcion TELEFONO

				//SEGUNDA  opcion Fecha de Nacimineto
				//$GLOBALS["condition_question_2"]=  $condition_question_2 = array(true, false);
				
				$_SESSION["condition_question_2"]=  array(1, 2);// Fecha de Nacimineto
				
				shuffle($_SESSION["condition_question_2"]);//reorganizar el Array

				if($_SESSION["condition_question_2"][1] == 1){// VERDADERO

					$sql2="select f_nacimiento from personas WHERE cedula='".$usuario."'	AND status='A'  LIMIT 1";
					$rs2= $conn->Execute($sql2);

					if($rs2->RecordCount()>0){
							$query_2 = $rs2->fields[0];
					}
		
				}
				if($_SESSION["condition_question_2"][1] == 2){// FALSO

					$sql2="SELECT f_nacimiento	FROM personas	
					where  cedula<>'".$usuario."'	AND status='A'  ORDER BY RANDOM () LIMIT 1";
					if($rs2= $conn->Execute($sql2))	
					$query_2 = $rs2->fields[0];	

				}
				//'.$condicion2.'  <input type="text" style="width: 45%;" class="form-control" placeholder="Cédula de Identidad"  name="ced_afiliado" id="ced_afiliado" maxlength="11" required pattern="[0-9]{7,11}" data-bs-toggle="tooltip" data-bs-placement="right" title="Cédula">
				$Preguntas[1] =
				'
				<br><h6 style="color: grey;"><b>INDIQUE SI SU FECHA DE NACIMIENTO ES LA SIGUIENTE:</b>'.$query_2.'</h6>
				<div style="width: 50%;margin: 0 80px">
					<input type="radio" style="width: 10%;" class="form-check-input" name="respuesta2"  value="1" required>
					<span class="text-secondary">SI</span>
				</div>
				<div style="width: 50%;margin: -33px 0px 0 190px; position:relative;">
					<input type="radio" style="width: 10%;" class="form-check-input" name="respuesta2"  value="2" required>
					<span class="text-secondary">NO</span>
				</div>
			';
					
			// ./Segunda opcion TELEFONO
				$preguntar = shuffle_assoc($Preguntas);
					/*
					//Validacion
					if($_POST['respuesta1']==1 && $condition_question_1)$valida++;
								
					if($_POST['respuesta1']==2 && !$condition_question_1)$valida++;


					if ($valida==2){
						//if($_SESSION['nacionalidad']=='1')$nacionalidad='V';
						//if($_SESSION['nacionalidad']=='2')$nacionalidad='E';
						$SQL="UPDATE public.personas SET clave =  md5('".trim($_REQUEST['ced_afiliado'])."') WHERE cedula = '".$_SESSION["VALIDUSER"]."'";	
						$rs= $conn->Execute($SQL);

							if($rs){
								$Cod = "1";
								$Msj = "Su nueva contrase\u00F1a de acceso es:".$_REQUEST['ced_afiliado'];
							?>
								<script>
								//alert("Su nueva contrase\u00F1a de acceso es: <?=$_SESSION['cedula']?> \n y por medida de seguridad debe cambiarla al ingresar al sistema"); 
								//window.location="/ceet/mod_login/login.php";
								</script> 
								<?
							}							
										
					}else{
							$_SESSION['intentos']=$_SESSION['intentos'] + 1;
							//if($_SESSION['intentos']>3){	
								$Cod = "0";
								$Msj = "Su registro ha sido bloqueado.... ";
						?>
						<script>
						//alert("su registro ha sido bloqueado.... ");	
						//window.location="/ceet/mod_login/login.php";						
						</script> <?
											
							//}else{
						?>
						<script>
						//alert("Respuestas Incorrectas, por favor verifique e intente de nuevo. Recuerde que al ingresar las respuesta erradas en tres (3) intentos consecutivos, su acceso será bloqueado por medidas de seguridad. ");							
						</script>
						<?
							//}
						}	*/		
			/*FIN >>>>>>>>>>>>>>>>>>>>>>>>>>>>*/
					$Cod = "1";
					$Msj = "Usuario Inscrito en SNILPD";

				}else{

					$Cod = "0";
					$Msj = "Usuario no registrado";

				}

			echo $Cod."|".$Msj."|".$Valores1."|".$Valores2."|".$preguntar;

		break;
		case'btnvalidarPreguntas':

			$bValidateSuccess=true;
			$bValidateSuccess2=true;

			//Validacion de los campos en PHP
			if($_REQUEST['respuesta1'] == '' || $_REQUEST['respuesta2'] == '' ){
				//|| isset($_REQUEST['respuesta3']) == ''
					//$GLOBALS['aPageErrors'][]= "- Ningun campo debe quedar vacio!";
					$bValidateSuccess=false;
					
					
					$respuesta[0]	=	'0';
					$respuesta[1]	=	'ERROR FALTAN CAMPOS POR SELECCIONAR!';
			}

			if($bValidateSuccess){
				//$_SESSION["condition_question_1"] -> Telefono
				//$_SESSION["condition_question_2"] -> Fecha de Nacimineto
				
				if($_SESSION["condition_question_1"][1] == 1 && $_REQUEST['respuesta1'] == 2 ){// FALSO 

					$bValidateSuccess2 = false;
					
				}
				if($_SESSION["condition_question_1"][1] == 2 && $_REQUEST['respuesta1'] == 1 ){// FALSO 

					$bValidateSuccess2 = false;
					
				}
				if($_SESSION["condition_question_2"][1] == 1 && $_REQUEST['respuesta2'] == 2 ){// FALSO 

					$bValidateSuccess2 = false;
					
				}
				if($_SESSION["condition_question_2"][1] == 2 && $_REQUEST['respuesta2'] == 1 ){// FALSO 

					$bValidateSuccess2 = false;
					
				}
				

					if($bValidateSuccess2){
						//Se procede a actualizar la clave de usuario
						//$_SESSION["VALIDUSERCI"] = "123456";
						$clave_md5=md5($_SESSION["VALIDUSERCI"]);
						
						
						$Sql = "UPDATE public.usuarios	SET  clave='".$clave_md5."', status= 'U'
								WHERE cedula='".$_SESSION["VALIDUSER"]."'";
						
						$rs= $conn->Execute($Sql);

							if($rs){
								$respuesta[0]	=	'1';
								$respuesta[1]	=	'ACTUALIZACION EXITOSA DE CLAVE ES:'.$_SESSION["VALIDUSERCI"];
								//$respuesta[1]	=	'ACTUALIZACION EXITOSA DE CLAVE! VALOR ='.$_SESSION["condition_question_2"][1].'TELEF='.$_SESSION["condition_question_2"][1].'Clave ='.$_SESSION["VALIDUSERCI"];
							}else{
								$respuesta[0]	=	'0';
								$respuesta[1]	=	'Error al actualizar consulte con el administrador del sistema';
							}

					}else{

						$respuesta[0]	=	'0';
						$respuesta[1]	=	'Error de selección';
						//$respuesta[1]	=	'Error de selección F/N='.$_SESSION["condition_question_2"][1].'TELEF='.$_SESSION["condition_question_2"][1];
					}
				
			}
		
			echo json_encode(array('cod'=>$respuesta[0],'msj'=>$respuesta[1]));
		break;
		case'Siguiente':

			$usuario = $_REQUEST['nacionalidad'].$_REQUEST['ced_afiliado'];
			
			$SQL3=" SELECT 
				id,cedula,nombres,apellidos,nacionalidad,tipo_usuario, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido
				FROM personas
				WHERE cedula='".$usuario."'
				AND status='A'
				LIMIT 1 ";

				$rs3=$conn->Execute($SQL3);

				if ($rs3->RecordCount()>0){
					
					$Valores1=trim($rs3->fields['primer_nombre'])." ".trim($rs3->fields['segundo_nombre']);

					$Valores2=trim($rs3->fields['primer_apellido'])." ".trim($rs3->fields['segundo_apellido']);
					
					
					$Cod = "1";
					$Msj = "Usuario Inscrito en SNILPD";

				}else{

					$Cod = "0";
					$Msj = "Usuario no registrado";
					
				}

			echo $Cod."|".$Msj."|".$Valores1."|".$Valores2;
		break;
		case'validarUsuarioRegistrado':

			//Primero se consulta en la tabla del SAIME para obtener algunos datos
			//list($letra, $cedula) = explode('|',$_REQUEST['txt_usuario']);
			
			if($_REQUEST['ced_afiliado'] == '' || $_REQUEST['nacionalidad'] == ''){
				$Cod = "3"; //NEGATIVO y No TRAE RESULTADOS
				$Msj = "Verificar la Nacionalidad o el número de Cédula de Identidad";
			}else{
				$SQL1="select * from public.usuarios where cedula='".$_REQUEST['nacionalidad'].$_REQUEST['ced_afiliado']."'"; 
				$rs1= $conn->Execute($SQL1);

				if ($rs1->RecordCount()>0){
					
					$Valores.=trim($rs1->fields['primer_nombre'])."|";
					//$Valores.=trim($rs1->fields['segundo_nombre'])."|";
					//$Valores.=trim($rs1->fields['primer_apellido'])."|";
					//$Valores.=trim($rs1->fields['segundo_apellido'])."|";
					//$Valores.=trim($rs1->fields['sexo'])."|";

					//$data= trim($rs1->fields['fechanac']);
					//$Valores.= date($data,"d-m-Y");
					//$Valores.= trim($rs1->fields['fechanac']);
					
					$Cod = "1";
					$Msj = "Usuario ya registrado en sistema";
					
				}else {
					$Cod = "0"; //NEGATIVO y No TRAE RESULTADOS
					$Msj = "Debe completar su registro, \n agregando información en los campos requeridos(*)";
				}
			}
			//echo json_encode(array('cod'=>$respuesta[0],'msj'=>$respuesta[1]));
			echo $Cod."|".$Msj."|".$Valores;
			//echo $Cod."|".$Valores;
			//$conn->close();????????????????????????????????????? CERRAR CONEXIONES
		break;
		case'RegistrarUsuario':
			$error_validar = 0;
			//Validacion de PHP
			if($_REQUEST['email_afiliado'] == "" || $_REQUEST['email_afiliado2'] == ""){

					$Cod	= "0";
					$Msj	= "Los campos de correos no deben estar en vacios";
					$error_validar = 1;

				if($_REQUEST['email_afiliado'] != $_REQUEST['email_afiliado2']){

					$Cod	= "0";
					$Msj	= "Los correos deben ser identicos";
					$error_validar = 1;
				}
			}

			if($error_validar === 0){
				$SQL0="select * from public.usuarios where cedula='".$_REQUEST['nacionalidad'].$_REQUEST['ced_afiliado']."'"; 
				$rs0= $conn->Execute($SQL0);

				if ($rs0->RecordCount()>0){
					
					$Cod = "0";
					$Msj = "Usuario ya registrado en sistema";
					
				}else{
				
					//<<<<<<<<<<<<<<<<<<<
					$cedula=$_POST['nacionalidad'].$_POST['ced_afiliado'];
					//$clave=generar_clave();
					$clave=$_POST['ced_afiliado'];
					$clave_md5=md5($clave);
					$sfecha=date('Y-m-d');
						
						/*if($_POST['nacionalidad']=='V'){
							$nacionalidad='1';
						}else{
							$nacionalidad='2';
						}*/

						/*if($_POST['nacionalidad']=='F'){
							$sexo='1';
						}else{
							$sexo='2';
						}*/
					
					$correo= $_POST['email_afiliado']; 
					
					//Tabla para el manejo de las sesiones '".$nacionalidad."', nacionalidad
					$sql=
						"INSERT INTO usuarios
						(cedula, primer_nombre,segundo_nombre,primer_apellido,segundo_apellido, sexo, f_nacimiento, telefono, correo, clave,tipo_usuario, status
						)
						VALUES 
						(
							'".strtoupper($cedula)."',
							'".strtoupper($_POST['nombre_afiliado1'])."',
							'".strtoupper($_POST['nombre_afiliado2'])."',
							'".strtoupper($_POST['apellido_afiliado1'])."',
							'".strtoupper($_POST['apellido_afiliado2'])."',
							'".strtoupper($_POST['cbSexo_afiliado'])."',
							'".$_POST['fnacimiento_afiliado']."',
							'".$_POST['telefono_afiliado']."',
							'".$correo."',
							'".$clave_md5."',
							'2',
							'A'
						)";

						$rs = $conn->Execute($sql);

					if ($rs){

						$Cod = "1"; //NEGATIVO y No TRAE RESULTADOS
						$Msj = "Registro Exitoso! Su contraseña es: ".$cedula;

					}else{
						$Cod = "0"; //NEGATIVO y No TRAE RESULTADOS
						//$Msj = var_dump($rs4);
						$Msj = "Error al crear el registro Cod = 01";
					}
					//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
				}
			}

			echo $Cod."|".$Msj."|".$Valores;

		break;

	}
}

function shuffle_assoc(&$array) {
	//Creo las variables para enviarlas ya como un string separado
	$pregunta1= '';
	$pregunta2= '';
	//$pregunta3= '';

	//array_keys = Devuelve todas las claves de un array o un subconjunto de claves de un array
	$keys = array_keys($array);//

	shuffle($keys);//Mezcla un array

	foreach($keys as $key) {

		$new[$key] = $array[$key];

		if($pregunta1 ==''){

			$pregunta1 = $new[$key];
		}elseif($pregunta2 ==''){

			$pregunta2 = $new[$key];
		}
	}

	//$array = $new;
	return $Preguntar_reordenadas= $pregunta1."|".$pregunta2;

	//return true;
}

/*
function generar_clave()
{
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $cad = "";
        for($i=0;$i<8;$i++) 
        {
            $cad .= substr($str,rand(0,62),1);
        }	
        return  strtoupper($cad);
}*/

// Imprimir el arreglo de errores
//print (isset($aPageErrors) && count($aPageErrors)> 0)?"<script>alert('".join('\n', $aPageErrors)."')</script>":"";
?>
