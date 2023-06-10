<?php


session_start();
//$conecto = 1;

ini_set("display_errors",1);
error_reporting(E_ALL | E_STRICT);

//Mi EQUIPO LOCAL
include_once('../include/adodb5/adodb.inc.php');

$conn = NewADOConnection('postgres');
$conn->connect('127.0.0.1','postgres','root','cursos_online');
$conn->debug = false;

//-------------------------------------------------------------

if (isset($_POST['action'])){
	$Cod = "";
	$Msj = "";
	$Valores ="";
	switch($_POST["action"]){
		
		case'btn_cerrarSesion':
			
			session_destroy();
			
			$respuesta[0]= '1';
			$respuesta[1]= 'Sesion Cerrada';
			
			echo json_encode(array('cod'=>$respuesta[0],'msj'=>$respuesta[1]));
		break;

	}
}
?>