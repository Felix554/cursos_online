<?
    include('header.php');

    include("../include/DB.php");

    if(isset($_GET['id'])){
        $id = $_GET ['id'];

        $buscar = mysql_connect($cn, "SELECT * FROM usuarios WHERE cedula='".$id."';");
    }
?>
            <div class="col-sm-12">
                <div class="jumbotron" style="height: 200px;">
                    <h1 class="display-4">Bienvenido <? $buscar['nombres'] ?></h1>
                    <img src="../imagenes/hombre.png" style="position: absolute;width: 120px;height: 120px; left: 83%; border-radius: 150px; margin: -125px 0 0 0;">
                    <hr class="my-2">
                    <!--h6 style="text-align: left;"> Fecha 05-12-2022 / Hora 12:15 pm</h6-->
                    <h6 style="text-align: center;"> Hoy es: <span id="dia"></span>-<span id="mes"></span>-<span id="year"></span> / Hora: <span id="horas"></span>:<span id="minutos"></span> <span id="segundos"></span> <span id="ap"></span> / C.I: 30.699.868</h6>
                    <!--h6 style="text-align: right;"> Fecha 05-12-2022 / Hora 12:15 pm</h6-->
                </div>
            </div>
            <div class="col-md-4 animado4" style="margin-bottom: 40px">
                <div class="card" style="height: 430px; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
                    <img class="card-img-top" src="../imagenes/datos_personales.jpg" style="height: 275px">
                    <div class="card-body">
                        <h4 class="card-header">Datos Personales</h4>
                        <br>
                        <a href="datos_personales.php">
                            <div type="submit" class="btn btn-outline-primary b-radius-5">Ingresar</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 animado5" style="margin-bottom: 40px">
                <div class="card" style="height: 430px; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
                    <img class="card-img-top" src="../imagenes/discapacidad.jpg" style="height: 275px">
                    <div class="card-body">
                        <h4 class="card-header">Discapacidad</h4>
                        <br>
                        <a href="discapacidad.php">
                            <div type="submit" class="btn btn-outline-primary b-radius-5">Ingresar</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 animado3" style="margin-bottom: 40px">
                <div class="card" style="height: 430px; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
                    <img class="card-img-top" src="../imagenes/educacion.jpg" style="height: 275px">
                    <div class="card-body">
                        <h4 class="card-header">Educación</h4>
                        <br>
                        <a href="educacion.php">
                            <div type="submit" class="btn btn-outline-primary b-radius-5">Ingresar</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 animado4" style="margin-bottom: 40px">
                <div class="card" style="height: 430px; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
                    <img class="card-img-top" src="../imagenes/capacitacion_recibida.jpg" style="height: 275px">
                    <div class="card-body">
                        <h4 class="card-header">Capacitación</h4>
                        <br>
                        <a href="capacitacion.php">
                            <div type="submit" class="btn btn-outline-primary b-radius-5">Ingresar</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 animado5" style="margin-bottom: 40px">
                <div class="card" style="height: 430px; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
                    <img class="card-img-top" src="../imagenes/ocupacion_laboral.jpg" style="height: 275px">
                    <div class="card-body">
                        <h4 class="card-header">Situación Ocupacional</h4>
                        <br>
                        <a href="situacion_ocupacional.php">
                            <div type="submit" class="btn btn-outline-primary b-radius-5">Ingresar</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 animado3" style="margin-bottom: 40px">
                <div class="card" style="height: 430px; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
                    <img class="card-img-top" src="../imagenes/experiencia_laboral.PNG" style="height: 275px">
                    <div class="card-body">
                        <h4 class="card-header">Experiencia Laboral</h4>
                        <br>
                        <a href="experiencia_laboral.php">
                            <div type="submit" class="btn btn-outline-primary b-radius-5">Ingresar</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 animado4" style="margin-bottom: 40px">
                <div class="card" style="height: 430px; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
                    <img class="card-img-top" src="../imagenes/foto.jpg" style="height: 275px">
                    <div class="card-body">
                        <h4 class="card-header">Foto</h4>
                        <br>
                        <a href="foto.php">
                            <div type="submit" class="btn btn-outline-primary b-radius-5">Ingresar</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 animado5" style="margin-bottom: 40px">
                <div class="card" style="height: 430px; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
                    <img class="card-img-top" src="../imagenes/Formatos.jpg" style="height: 275px">
                    <div class="card-body">
                        <h4 class="card-header">Formato</h4>
                        <br>
                        <a href="formatos.php">
                            <div type="submit" class="btn btn-outline-primary b-radius-5">Ingresar</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 animado3" style="margin-bottom: 40px">
                <div class="card" style="height: 430px; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
                    <img class="card-img-top" src="../imagenes/oportunidad_trabajo.jpg" style="height: 275px">
                    <div class="card-body">
                        <h4 class="card-header">Oportunidad de Trabajo</h4>
                        <br>
                        <a href="oportunidad_trabajo.php">
                            <div type="submit" class="btn btn-outline-primary b-radius-5">Ingresar</div>
                        </a>
                    </div>
                </div>
            </div>
            <script src="reloj.js"></script>

            <!--div class="col-md-6 animado3" style="margin-bottom: 40px">
                <div class="card" style="height: 430px; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
                    <img class="card-img-top" src="" style="height: 275px">
                    <div class="card-body">
                        <h4 class="card-title">Título Inspirador</h4>
                        <a href="#">
                            <div type="submit" class="btn btn-outline-primary b-radius-5">Ingresar</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 animado4" style="margin-bottom: 40px">
                <div class="card" style="height: 430px; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
                    <img class="card-img-top" src="" style="height: 275px">
                    <div class="card-body">
                        <h4 class="card-title">Título Inspirador</h4>
                        <br>
                        <a href="#">
                            <div type="submit" class="btn btn-outline-primary b-radius-5">Ingresar</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 animado3" style="margin-bottom: 40px">
                <div class="card" style="height: 430px; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
                    <img class="card-img-top" src="" style="height: 275px">
                    <div class="card-body">
                        <h4 class="card-title">Título Inspirador</h4>
                        <a href="#">
                            <div type="submit" class="btn btn-outline-primary b-radius-5">Ingresar</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 animado4" style="margin-bottom: 40px">
                <div class="card" style="height: 430px; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
                    <img class="card-img-top" src="" style="height: 275px">
                    <div class="card-body">
                        <h4 class="card-title">Título Inspirador</h4>
                        <br>
                        <a href="#">
                            <div type="submit" class="btn btn-outline-primary b-radius-5">Ingresar</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 animado3" style="margin-bottom: 40px">
                <div class="card" style="height: 430px; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
                    <img class="card-img-top" src="" style="height: 275px">
                    <div class="card-body">
                        <h4 class="card-title">Título Inspirador</h4>
                        <a href="#">
                            <div type="submit" class="btn btn-outline-primary b-radius-5">Ingresar</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 animado4" style="margin-bottom: 40px">
                <div class="card" style="height: 430px; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
                    <img class="card-img-top" src="" style="height: 275px">
                    <div class="card-body">
                        <h4 class="card-title">Título Inspirador</h4>
                        <br>
                        <a href="#">
                            <div type="submit" class="btn btn-outline-primary b-radius-5">Ingresar</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 animado3" style="margin-bottom: 40px">
                <div class="card" style="height: 430px; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
                    <img class="card-img-top" src="" style="height: 275px">
                    <div class="card-body">
                        <h4 class="card-title">Título Inspirador</h4>
                        <a href="#">
                            <div type="submit" class="btn btn-outline-primary b-radius-5">Ingresar</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 animado4" style="margin-bottom: 40px">
                <div class="card" style="height: 430px; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
                    <img class="card-img-top" src="" style="height: 275px">
                    <div class="card-body">
                        <h4 class="card-title">Título Inspirador</h4>
                        <br>
                        <a href="#">
                            <div type="submit" class="btn btn-outline-primary b-radius-5">Ingresar</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 animado3" style="margin-bottom: 40px">
                <div class="card" style="height: 430px; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
                    <img class="card-img-top" src="" style="height: 275px">
                    <div class="card-body">
                        <h4 class="card-title">Título Inspirador</h4>
                        <a href="#">
                            <div type="submit" class="btn btn-outline-primary b-radius-5">Ingresar</div>
                        </a>
                    </div>
                </div>
            </div-->
<?
    include('footer.php');
?>