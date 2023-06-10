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
		
        case'buscar_clases':
			
            //if ($_SERVER['REQUEST_METHOD'] == "GET") {
		
        
                    //$FechaFinal 	= $_GET['fecha_final'];
                    $id_curso		= $_POST["id_curso"];//genera un array desde el string
                    
                    $SQL='SELECT cursos_usuarios.id_curso,
                            cursos_usuarios.id_usuario,
                            cursos.nombre AS nombre_curso,
                            clases.id AS id_clase,
                            clases.nombre AS nombre_clase,
                            clases.url_video,
                            clases_usuarios.status
                        FROM public.cursos_usuarios
                            LEFT JOIN public.cursos ON cursos.id = cursos_usuarios.id_curso
                            LEFT JOIN public.clases ON clases.id_curso = cursos.id
                            LEFT JOIN public.clases_usuarios ON clases_usuarios.id_clase = clases.id
                        where
                            cursos_usuarios.id_usuario = 40 AND cursos_usuarios.id_curso = 1 order by id_clase asc';
                    $rs1 = $conn->Execute($SQL);

                    //$Cod = "0";
                    //$Valores = "PRUEBA";
                    $check = '';
                    if ($rs1->RecordCount()>0){
                        
                        //Recorrido de los CHECK
                        while (!$rs1->EOF ){

                            //$respuesta[3] = [$rs1->fields['id']][$rs1->fields['id_clase']] [$rs1->fields['status']];
                            //$respuesta[3] = Array ( 'id'  =>  $rs1->fields['id']);
                            //$respuesta[3] = Array(  "id"       =>      $rs1->fields['id']);
                            //$respuesta[3] = $rs1->fields['id_clase'];
                            //$respuesta[3] =Array ( 'vaca' => "1", 'peso' => 360, 'p_leche_dia' => 40 );
                            if($check == ''){

                                $check[] = Array ( 'id_curso' =>  $rs1->fields['id_curso'], 'id_clase' => $rs1->fields['id_clase'], 'id_usuario' => $_SESSION['id_usuario'], 'status' => $rs1->fields['status'] );
                            }else{

                                $check[] = Array ( 'id_curso' =>  $rs1->fields['id_curso'], 'id_clase' => $rs1->fields['id_clase'], 'id_usuario' => $_SESSION['id_usuario'], 'status' => $rs1->fields['status'] );
                                //$check = array_combine($check, $check2);
                                //$check[] = array_merge($check, $check2);	
                            }
                            
                            /*$respuesta[3] =Array (  Array ( 'id' => "1", 'id_clase' => 1, 'id_usuario' => 40, 'status' => true ),
                                                    Array ( 'id' => "2", 'id_clase' => 2, 'id_usuario' => 40, 'status' => false ),
                                                    Array ( 'id' => "3", 'id_clase' => 3, 'id_usuario' => 40, 'status' => true ),
                                                    Array ( 'id' => "4", 'id_clase' => 4, 'id_usuario' => 40, 'status' => false )
                                                );*/
                            $rs1->MoveNext();
                            //$check = array_merge( $check);						
                        }

                        $respuesta[3] = $check;

                        $respuesta[2]='
                        <div class="attachment-block clearfix">

                            <div class="row">
                                <!-- checkbox -->
                                <div class="form-group clearfix col-sm-1">
                                <div class="icheck-success d-inline">
                                    <input type="checkbox" checked id="checkboxSuccess1">
                                    <label for="checkboxSuccess1">
                                    </label>
                                </div>
                                </div>
                                <div class="col-sm-5">
                                <div class="product-image-thumb"><video src="cursos/curso1/Video2.mp4"></video></div>
                                </div>
                                <div class="col-sm-6">
                                <h6 class="attachment-heading"><a>1Er Video</a></h6>
                                </div>

                            </div>

                        </div>';
                        
                        
                        $respuesta[0]= '1';
			            $respuesta[1]= 'Listado de Clases por curso';
                    }else{

                        
                        $respuesta[0]= '0';
			            $respuesta[1]= 'No hay listado';
                    }
        
              
                
        
            //}

			
			
			echo json_encode(array('cod'=>$respuesta[0],'msj'=>$respuesta[1],'valores'=>$respuesta[2],'check'=>$respuesta[3]));
		break;


		case'btn_cerrarSesion':
			
			//session_destroy();
			
			$respuesta[0]= '1';
			$respuesta[1]= 'Sesion Cerrada';
			
			echo json_encode(array('cod'=>$respuesta[0],'msj'=>$respuesta[1]));
		break;

	}
}
?>