<?php
session_start();//- Iniciar una nueva sesión o reanudar la existente
//var_dump($_SESSION);
//var_dump($_SESSION["condition_question_2"][1]);
include_once('modal.php');

?>

<!doctype html>
<html lang="Es-es">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SNILPD</title>
        <!-- Bootstrap CSS  v5.1 CDN    -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    
    <!-- Bootstrap CSS  v5.1.3
        Maquetado de Header y el Menu con las opciones
        LIBRERIA COMPLETA Y LOS JS-->
    <link rel="stylesheet" href="../css/bootstrap5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font/fontello.css">
    <link rel="stylesheet" href="../css/fontelo.css">
    <!-- Bootstrap CSS  v5.1.3
        Maquetado de Header y el Menu con las opciones
        https://getbootstrap.com/docs/5.1/getting-started/introduction/
    -->
    <!--<link rel="stylesheet" href="../css/bootstrap.css">-->
    <!-- Indispensable Maquetado del Login y el efecto de transición-->
    <link rel="stylesheet" href="../css/inicio.css">
    <!-- trabaja con main.js CSS -->

    <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

   
    

    <!--<link rel="stylesheet" href="../css/estilos.css">-->

    <!--<link href="../css/formularios.css" rel="stylesheet" type="text/css" />
    <link href="../css/login.css" rel="stylesheet" type="text/css" />
    <link href="../css/font/fontello.css" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/validacion_general.js"></script>	
    <script type="text/javascript" src="validar_login.js"></script>	
    <script type="text/javascript" src="funciones.js"></script>	
    <script type="text/javascript" src="base64.js"></script>-->
</head>
<body>

<header>
<?php 
//require_once('shuffle.php');
?>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: white;">
        <div class="container-fluid ">
            <div class="logo" style="margin-left: 3%">
                <img style="width:100%; heidth:100%;" src="../imagenes/cintillo_institucional.jpg">
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02" style="margin-left:30%"> 
                <div>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item mglr-20" style="margin-right: 20px">
                            <a class="nav-link active" style="color: black; font-size: 17px;" href="../index.php">Inicio</a>
                        </li>
                        <li class="nav-item" style="margin-right: 20px">
                            <a style="color: black; font-size: 16px" class="nav-link" href="../nosotros.php">Nosotros</a>
                        </li>
                        <!--<li class="nav-item">
                            <a href="login.php">
                                <button type="button" class="btn btn-outline-primary">Iniciar Sesión</button>
                        </a>-->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
    <main>
        <div class="contenedor_todo">
            <div class="caja_trasera">
                <div class="caja_trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn_iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja_trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn_registrarse">Regístrarse</button>
                </div>
            </div>
            <!--Formulario de Login y registro  row g-3 was-validated  needs-validation" novalidate -->
            <div class="contenedor_login-register">

                <!--Login-->
                <form id="frm" name="frm" action=""  method="POST" class="formulario_login needs-validation">
                    <h2>Iniciar Sesión</h2>
                    <center><label style="color: gray;"> Datos Obligatorios (*) </label><br></center>
                        <div class="input-group">
                            <select class="form-control" style="width: 20%;" data-bs-toggle="tooltip" data-bs-placement="left" title="Nacionalidad" id="cbCed_afiliado" name="cbCed_afiliado" required>
                                <option value="">***</option>
                                <option value="V">V</option>
                                <option value="E">E</option>
                            </select>
                            <span><i class="" style="padding:5px; color: gray"></i></span>
                            <input class="form-control" type="text" style="width: 75%;" placeholder="Cédula de Identidad *" id="txt_usuario" name="txt_usuario" value="" required>
                        </div>

                        
                    <!--<span><i class="icon-cedula" style="padding:5px; color: gray"></i></span><input type="number" style="width: 71.5%;" id="txt_usuario" name="txt_usuario" placeholder="Cédula de Identidad *" maxlength="10"-->
                    <!--<input type="password" placeholder="Contraseña *" name="txt_clave">-->
                    <!--<div class="input-group">
                        <samp style="font-size: 15px;" class="icon-cerradura"></samp>
                        <input class="form-control" type="password" placeholder="Contraseña *" id="txt_clave" name="txt_clave" value="" required>
                    </div>-->
                    <div style="margin-top: 20px;">
                        <span style="font-size: 15px;" class="icon-cerradura"></span>
                        <input class="form-control" type="password" style="width: 90%; margin: -25px 0 0 35px; position:relative;" placeholder="Contraseña *" id="txt_clave" name="txt_clave" value="" required>
                    </div>
                    <!--<a href="../usuario/index.php"><button type='button' class='btn_Entrar'>Entrar</button></a>-->
                    <div class="input-group">
                        <button type='button' class='btn_Entrar'>Entrar</button>
                        <span><i class="icon-cedula" style="padding:5px; color: gray"></i></span>
                        <input type="button" style="background-color: #46A2FD; color: white; width: 60%; font-size: 16px" id="btn_olvido_clave" value="¿Olvido Contraseña?" required>
                    </div>
                </form>

                <!--olvido Contreaseña-->
                <form id="frm_olvido" name="frm_olvido" action="" method="POST" class="formulario_clave needs-validation novalidate">
                    <h2>¿Olvido Contraseña?</h2><br>
                    <center><label style="color: gray;"> Datos Obligatorios (*) </label><br></center>
                    
                    <div class="input-group">
                        <select style="width: 20%;" class="form-control"  name="nacionalidad"  id="nacionalidad" data-bs-toggle="tooltip" data-bs-placement="left" title="Nacionalidad" required>
                            <option value="">***</option>
                            <option value="V">V</option>
                            <option value="E">E</option>
                        </select>
                        <span><i class="" style="padding:5px; color: gray"></i></span>
                        <input type="text" style="width: 45%;" class="form-control" placeholder="Cédula de Identidad"  name="ced_afiliado" id="ced_afiliado" maxlength="8" required pattern="[0-9]{7,11}" data-bs-toggle="tooltip" data-bs-placement="right" title="Cédula">
                    </div>
                    <!--input type="text" class="form-control" name="nombre" id="nombre" style="width:100%" required placeholder="Nombre" disabled>
                    <input type="text" class="form-control" name="apellido" id="apellido" style="width:100%" required placeholder="Apellido" disabled  id="btn_validacion"-->
                    <input type="button"class="btn_siguiente1"  style="background-color: #46A2FD; color: white; width: 100%" value="Validar" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Validar Cuenta">
                </form>

            <!--<<<<<<<<<<<<<<<<<<<<<<<<VALIDAR PREGUNTAS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
                <form id="frm_olvido2" name="frm_olvido2" action="" method="POST" class="formulario_validacion needs-validation">
                    <h2>¿Olvido Contraseña?</h2><br>
                    <h6 id="nombress" style="color: grey;">Nombres:</h6>
                    <h6 id="apellidoss" style="color: grey;">Apellidos:</h6>
                    <h6 style="color: grey;">Para continuar con el proceso de olvido contraseña, por favor responda las siguientes preguntas:</h6>
                    <h6 id="Pregunta1" style="color: grey;">INDIQUE SU NÚMERO TELEFÓNICO:</h6>
                    <h6 id="Pregunta2" style="color: grey;">INDIQUE SU CORREO ELECTRÓNICO:</h6>                

                    <!--<br><h6 style="color: grey;">INDIQUE SU FECHA DE NACIMIENTO:</h6>
                    <div style="width: 50%;margin: 0 80px">
                        <input type="radio" id="radioPrimary13" style="width: 10%;" onclick="javascript:seleccion()" name="r7">
                        <span class="text-secondary">SI</span>
                    </div>
                    <div style="width: 50%;margin: -33px 0px 0 190px; position:relative;">
                        <input type="radio" id="radioPrimary14" style="width: 10%;" onclick="javascript:deselecion()" name="r7">
                        <span class="text-secondary">NO</span>
                    </div-->

                    <? //echo $array1[0]."<br>"; ?>
                    <? //echo $array1[1]."<br>"; ?>
                    <input type="button" style="background-color: #46A2FD; color: white;" class="btn_olvidar button" id="btn_iniciar" value="Siguiente">
                    <!--btn_iniciar = valor de un atributo que es usado en js/main el cual alista un evento y llama a la funcion iniciar
                        para mostrar y ocultar formularios-->
                    <!--button id="btn_iniciar-sesion">Siguiente</button-->
                </form>

                <!--Register-->
                <form id="frmRegistro" name="frmRegistro" action="" method="POST" class="formulario_register needs-validation">
                    <h2>Regístrarse</h2>
                    <center>
                        <label style="color: gray;"> Datos Obligatorios (*) </label><br>
                        <div class="input-group">
                            <select style="width: 20%;" class="form-control"  name="nacionalidad"  id="nacionalidad" data-bs-toggle="tooltip" data-bs-placement="left" title="Nacionalidad" required>
                                <option value="">***</option>
                                <option value="V">V</option>
                                <option value="E">E</option>
                            </select>
                            <span><i class="" style="padding:5px; color: gray"></i></span>
                            <input type="text" style="width: 45%;" class="form-control" placeholder="Cédula de Identidad"  name="ced_afiliado" id="ced_afiliado" onBlur="usuario_ya_registrado(nacionalidad.value+'|'+ced_afiliado.value);" maxlength="8" required pattern="[0-9]{6,11}">
                            <!--button type="button" class="btn btn-secondary float-right" data-bs-toggle="tooltip" data-bs-placement="right" onclick="consultar_saime(nacionalidad.value+'|'+ced_afiliado.value);" title="Buscar">B</button-->
                            
                        </div>

                        <div class="input-group">
                            <input style="width:40%;margin-bottom:-10px;" type="text" class="form-control" placeholder="Primer Nombre*" name="nombre_afiliado1" id="nombre_afiliado1" maxlength="15" required pattern="[A-Za-zÑ-ñÁ-Éó-úÍ ]{3,15}">
                            <span><i class="" style="padding:5px; color: gray"></i></span>
                            <input style="width:40%;margin-bottom:-10px;" type="text" class="form-control" placeholder="Segundo Nombre" name="nombre_afiliado2" id="nombre_afiliado2" maxlength="15" pattern="[A-Za-zÑ-ñÁ-Éó-úÍ ]{3,15}">
                        </div>
                        <!--
                        <select style="width: 20%;" name="cbCed_afiliado">
						    <option value="">*</option>
						    <option value="V">V-.</option>
						    <option value="E">E.-</option>
                        </select>
                        <span><i class="icon-cedula" style="padding:5px; color: gray"></i></span><input type="number" style="width: 70%;" placeholder="Cédula de Identidad*" name="ced_afiliado" min="3000000" max="50000000">
                        <span><i class="icon-at" style="padding:5px; color: gray"></i></span><input style="width:40%;margin-bottom:-10px;" type="text" placeholder="Primer Nombre*" name="name">
                        <span><i class="icon-at" style="padding:5px; color: gray"></i></span><input style="width:42.5%;margin-bottom:-10px;" type="text" placeholder="Segundo Nombre" name="name2">-->

                    </center>
                    <center>
                    <!--<span><i class="icon-at" style="padding:5px; color: gray"></i></span><input style="width:40%;margin-bottom:-10px;" type="text" placeholder="Primer Apellido*" name="name3">
                    <span><i class="icon-at" style="padding:5px; color: gray"></i></span><input style="width:42.5%;margin-bottom:-10px;" type="text" placeholder="Segundo Apellido" name="name4"-->
                    <div class="input-group">
                        <input style="width:40%;margin-bottom:-10px;" class="form-control" type="text" placeholder="Primer Apellido*" name="apellido_afiliado1" id="apellido_afiliado1" maxlength="15" required pattern="[A-Za-zÑ-ñÁ-Éó-úÍ ]{3,15}">
                        <span><i class="" style="padding:5px; color: gray"></i></span>
                        <input style="width:40%;margin-bottom:-10px;" class="form-control" type="text" placeholder="Segundo Apellido" name="apellido_afiliado2" id="apellido_afiliado2" maxlength="15" pattern="[A-Za-zÑ-ñÁ-Éó-úÍ ]{3,15}">
                    </div>
                    </center>
                    <!--<label>Sexo *:</label-->
                    <select class="form-control" name="cbSexo_afiliado"  id="cbSexo_afiliado" required>
                        <option value="" selected="selected">Sexo *</option>
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                    </select>
                    <center>
                        <!--<label> Fecha de Nacimiento *: </label><br-->
                        <input type="DATE" style="text-align: center; color: rgb(104, 103, 103);" class="form-control" data-bs-toggle="tooltip" data-bs-placement="left" title="Fecha de Nacimiento" name="fnacimiento_afiliado" id="fnacimiento_afiliado" required>
                        <!--<input type="DATE" style="color: gray;">
                        <label style="color: grey;"> Fecha de Nacimiento: </label><br>
                        <input style="text-align: center; color: rgb(104, 103, 103); width: 90%" type="date" name="fnacimiento_afiliado" min="1" max="31"><span><i class="icon-calendario" style="padding:5px; color: gray"></i></span-->
                    </center>
                    <input type="text" class="form-control" name="telefono_afiliado" id="telefono_afiliado" data-bs-toggle="tooltip" data-bs-placement="left" title="Teléfono Personal" placeholder="Ejm: 04143778578 *" maxlength="11" required pattern="[0-9]{11,11}"/>
                    <input type="email" class="form-control" data-bs-toggle="tooltip" data-bs-placement="left" title="Correo Electrónico" placeholder="Ejm: xxx@gmail.com *" name="email_afiliado" id="email_afiliado" required>
                    <input type="email" class="form-control" data-bs-toggle="tooltip" data-bs-placement="left" title="Confirmar Correo Electrónico" placeholder="Ejm: xxx@gmail.com *" name="email_afiliado2" id="email_afiliado2" required >
                    <button type='button' class="btn btn-primary btn_registrar" style="width:100%;" data-bs-toggle="tooltip" data-bs-placement="right" title="Registrar Usuario">Regístrarse</button>
                </form>
            </div>
        </div>
    </main>
    <!-- Script's -->
    <!-- CDN -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->

    <script type="text/javascript" src="../css/bootstrap5.1.3/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../css/bootstrap5.1.3/js/popper.min.js"></script>
    <!-- popper es indispensable para el manejo de los Tooltips Editados con bootstrap.bundle -->

    <!--<script type="text/javascript" src="../css/bootstrap5.1.3/js/bootstrap.js"></script> -->
    

     <!-- //Libreria principal jquery-3.6.0-->
     <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
     <!--<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>-->

    <script type="text/javascript" src="js/login.js"></script>
    
    <script src="js/main.js"></script>
</body>
</html>