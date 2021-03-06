<?php
    session_start();
    if(isset($_SESSION['jefatura_id'])){
?>
<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <title>Gobierno Regional Pasco - RR.HH.</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Literata&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/bootstrap.css">
        <link rel="stylesheet" href="../../../css/estilos.css">

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <link rel="stylesheet" href="../../../css/esri-leaflet-geocoder.css">
        <style>
            body { margin:0; padding:0; }
            #mapid { width: 1000px; height: 400px;}
        </style>
    </head>
    <body>
    <header style="background-color: #02416A">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="perfil.php">Gobierno Regional Pasco</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <div class="d-flex justify-content-center">
                        <a href="../perfil.php" class="btn btn-primary btn-dist" style="border-radius: 10px;"><img class="svg" src="../../../img/icon/home.svg"> Regresar</a>
                    </div>
                </ul>
                <ul class="navbar-nav my-2 my-lg-0">
                    <?php echo '
                        <a href="" class="input-group container-fluid">
                            <p style="margin-left: -30px; color: #fff; font-family: Arial; margin-top: 10px; font-size: 15px">??Hola '.strtoupper($_SESSION['jefatura_nombre']).'!</p>    
                        </a>
                    '; ?> 
                </ul>
          </div>
        </nav>
    </header>
    <div class="row">
        <div class="nav affix flex-column nav-pills col-3 " id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link direccion-nav" id="v-pills-resolucion-tab" data-toggle="pill" href="#v-pills-resolucion" role="tab" aria-controls="v-pills-resolucion" aria-selected="true"><img class="svg" src="../../../img/icon/home.svg"> 
            Reportes Generales </a>

            <a class="nav-link direccion-nav" id="v-pills-map-tab" data-toggle="pill" href="#v-pills-map" role="tab" aria-controls="v-pills-map" aria-selected="false"><img class="svg" src="../../../img/icon/user-tie.svg"> Reportes Laborales</a>

            <a class="nav-link direccion-nav" id="v-pills-encargado-tab" data-toggle="pill" href="#v-pills-encargado" role="tab" aria-controls="v-pills-encargado" aria-selected="false"><img class="svg" src="../../../img/icon/user-graduate-solid.svg"> Reportes Profesionales</a>
            <!--
            <a class="nav-link direccion-nav" id="v-pills-empresas-tab" data-toggle="pill" href="#v-pills-empresas" role="tab" aria-controls="v-pills-empresas" aria-selected="false"><img class="svg" src="../../../img/icon/id-card-alt.svg"> Informaci??n Personal (Ver/Editar)</a>
            
            <a class="nav-link direccion-nav" id="v-pills-programacion-tab" data-toggle="pill" href="#v-pills-programacion" role="tab" aria-controls="v-pills-programacion" aria-selected="false"><img class="svg" src="../../../img/icon/address-card.svg"> Informaci??n Adicional (Ver/Editar)</a> -->
            
            <a href="../../../logout.php" class="nav-link direccion-nav-salir"><img class="svg" src="../../../img/icon/sign-out-alt.svg"> Salir </a>
        </div>
        <div class="tab-content col-9" id="v-pills-tabContent">
            <!--Box Resoluciones-->
            <div class="tab-pane fade show active" id="v-pills-resolucion" role="tabpanel" aria-labelledby="v-pills-resolucion-tab">
                <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 30px; margin-top: 10px; color: #353535; font-weight: 650"><u>Semaforo de Vencimiento de Contratos: </u></p>
                <div class="row justify-content-around" style="margin-top: 10px">
                    <!-- Semaforo de contratos -->
                    <div class="col-3" style="background-color:#009900; border-radius: 10px; padding-top:15px; padding-bottom:15px; box-shadow: 2px 2px 2px #5c5c5c;">
                        <div class="row">
                            <div class="col-3">
                                <img class="svg4" src="../../../img/icon/address-card.svg">
                            </div>
                            <div class="col-9">
                                <p class="text-center" style="color:#FFF; font-size:14px; font-weight:600; text-shadow: 1px 1px 1px #000; padding:0px; margin:0px;">Vence en M??s de 10 d??as</p>
                                <p class="text-center" style="color:#FFF; font-size:20px; font-weight:800; padding:0px; margin:0px; text-shadow: 1px 1px 1px #000;">1000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4" style="background-color:#ffce09; border-radius: 10px; padding-top:15px; padding-bottom:15px; box-shadow: 2px 2px 2px #5c5c5c;">
                        <div class="row">
                            <div class="col-2">
                                <img class="svg4" src="../../../img/icon/address-card.svg">
                            </div>
                            <div class="col-10">
                                <p class="text-center" style="color:#FFF; font-size:14px; font-weight:600; text-shadow: 1px 1px 1px #000; padding:0px; margin:0px;">Vence en Menos de 10 d??as y M??s de 5 d??as</p>
                                <p class="text-center" style="color:#FFF; font-size:20px; font-weight:800; padding:0px; margin:0px; text-shadow: 1px 1px 1px #000;">1000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3" style="background-color:#ee0006; border-radius: 10px; padding-top:15px; padding-bottom:15px; box-shadow: 2px 2px 2px #5c5c5c;">
                        <div class="row">
                            <div class="col-3">
                                <img class="svg4" src="../../../img/icon/address-card.svg">
                            </div>
                            <div class="col-9">
                                <p class="text-center" style="color:#FFF; font-size:14px; font-weight:600; text-shadow: 1px 1px 1px #000; padding:0px; margin:0px;">Vence en Menos de 5 d??as</p>
                                <p class="text-center" style="color:#FFF; font-size:20px; font-weight:800; padding:0px; margin:0px; text-shadow: 1px 1px 1px #000;">1000</p>
                            </div>
                        </div>
                    </div>
                    <!-- Reportes Varios -->
                    <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 30px; margin-top: 10px; color: #353535; font-weight: 650"><u>Reportes Varios</u></p>
                    <div class="col-6">
                        <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 22px; margin-top: 10px; color: #353535; font-weight: 650">Servicio Militar:</p>
                        <div class="form-group col-md-12">
                            <form action="reportMilitar.php" method="post" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <select class="form-control" id="militar" name="militar">
                                        <option selected>Servicio Militar:</option>
                                        <option value="si">SI</option>
                                        <option value="no">NO</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary float-right mr-sm-2">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-6">
                        <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 22px; margin-top: 10px; color: #353535; font-weight: 650">Discapacidad:</p>
                        <div class="form-group col-md-12">
                            <form action="reportDisc.php" method="post" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <select class="form-control" id="discap" name="discap">
                                        <option selected>Discapacidad:</option>
                                        <option value="si">SI</option>
                                        <option value="no">NO</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary float-right mr-sm-2">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-6">
                        <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 22px; margin-top: 10px; color: #353535; font-weight: 650">Condici??n Familiar:</p>
                        <div class="form-group col-md-12">
                            <form action="reportFam.php" method="post" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <select class="form-control" id="fam" name="fam">
                                        <option selected>Condici??n Familiar:</option>
                                        <option value="F">Madre</option>
                                        <option value="M">Padre</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary float-right mr-sm-2">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-6">
                        <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 22px; margin-top: 10px; color: #353535; font-weight: 650">Etapa de Vida:</p>
                        <div class="form-group col-md-12">
                            <form action="reportEtapa.php" method="post" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <select class="form-control" id="etapa" name="etapa">
                                        <option selected>Etapa de Vida:</option>
                                        <option value="Juventud">Juventud - 18 a??os a 26 a??os</option>
                                        <option value="Adultez">Adultez - 27 a??os a 59 a??os</option>
                                        <option value="Vejez">Vejez - 60 a??os a m??s</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary float-right mr-sm-2">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!--Box Laboral-->
            <div class="tab-pane fade" id="v-pills-map" role="tabpanel" aria-labelledby="v-pills-map-tab">
                <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 30px; margin-top: 10px; color: #353535; font-weight: 650"><u>Reportes Laborales (Generales)</u></p>
                <div class="row justify-content-around" style="margin-top: 10px">
                    <div class="col-6">
                        <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 22px; margin-top: 10px; color: #353535; font-weight: 650">Condici??n Laboral:</p>
                        <div class="form-group col-md-12">
                            <form action="reportRL.php" method="post" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <select class="form-control" id="condLab" name="condLab">
                                        <option selected>Seleccione el R??gimen Laboral:</option>
                                        <?php
                                            include('../../../conexion.php');
                                            $select2="SELECT condlaboral.idCondLaboral, condlaboral.condLaboral FROM condlaboral";
                                            $result2=$db->query($select2);
                                            $option='';
                                            if($result2->num_rows > 0){
                                                while($fila2 = $result2->fetch_assoc())
                                                {
                                                    $option.='<option value="'.$fila2['idCondLaboral'].'">'.utf8_encode($fila2['condLaboral']).'</option>';
                                                }
                                            }
                                            echo $option;
                                        ?>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary float-right mr-sm-2">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-6">
                        <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 22px; margin-top: 10px; color: #353535; font-weight: 650">Dependencia:</p>
                        <div class="form-group col-md-12">
                            <form action="reportDEP.php" method="post" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <select class="form-control" id="dependencia" name="dependencia" onchange="myFunction(value);">
                                        <option selected>Seleccione la Dependencia:</option>
                                                            
                                        <?php
                                            include('../../../conexion.php');
                                            $select="SELECT idDependencia, dependencia FROM dependencia ORDER BY dependencia ASC";
                                            $result=$db->query($select);
                                            $option='';
                                            if($result->num_rows > 0){
                                                while($fila = $result->fetch_assoc())
                                                {
                                                    $option.='<option value="'.$fila['idDependencia'].'">'.utf8_encode($fila['dependencia']).'</option>';
                                                }
                                            }
                                            echo $option;
                                        ?>

                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary float-right mr-sm-2">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-6">
                        <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 22px; margin-top: 10px; color: #353535; font-weight: 650">Cargo:</p>
                        <div class="form-group col-md-12">
                            <form action="reportCargo.php" method="post" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="cargo" placeholder="Ingrese Cargo">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary float-right mr-sm-2">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 30px; margin-top: 10px; color: #353535; font-weight: 650"><u>Reportes Laborales (Especificos)</u></p>
                <div class="row justify-content-around" style="margin-top: 10px">
                    <div class="col-10">
                        <form action="reportLABESP.php" method="post" enctype="multipart/form-data">
                            <div class="input-group mb-3">
                                <select class="form-control" id="condLab" name="condLab">
                                    <option selected>Seleccione el R??gimen Laboral:</option>
                                    <?php
                                        include('../../../conexion.php');
                                        $select2="SELECT condlaboral.idCondLaboral, condlaboral.condLaboral FROM condlaboral";
                                        $result2=$db->query($select2);
                                        $option='';
                                        if($result2->num_rows > 0){
                                            while($fila2 = $result2->fetch_assoc())
                                            {
                                                $option.='<option value="'.$fila2['idCondLaboral'].'">'.utf8_encode($fila2['condLaboral']).'</option>';
                                            }
                                        }
                                        echo $option;
                                    ?>
                                </select>
                                <select class="form-control" id="dependencia" name="dependencia" onchange="myFunction(value);">
                                    <option selected>Seleccione la Dependencia:</option>
                                                                
                                        <?php
                                            include('../../../conexion.php');
                                            $select="SELECT idDependencia, dependencia FROM dependencia ORDER BY dependencia ASC";
                                            $result=$db->query($select);
                                            $option='';
                                            if($result->num_rows > 0){
                                                while($fila = $result->fetch_assoc())
                                                {
                                                    $option.='<option value="'.$fila['idDependencia'].'">'.utf8_encode($fila['dependencia']).'</option>';
                                                }
                                            }
                                            echo $option;
                                        ?>

                                </select>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary float-right mr-sm-2">Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--Box Educativa-->
            <div class="tab-pane fade" id="v-pills-encargado" role="tabpanel" aria-labelledby="v-pills-encargado-tab">
                <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 30px; margin-top: 10px; color: #353535; font-weight: 650"><u>Reportes Profesionales (Generales)</u></p>
                <div class="row justify-content-around" style="margin-top: 10px">
                    <div class="col-6">
                        <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 22px; margin-top: 10px; color: #353535; font-weight: 650">Grado Acad??mico:</p>
                        <div class="form-group col-md-12">
                            <form action="reportGRADO.php" method="post" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <select class="form-control" id="grado" name="grado">
                                        <option selected>Seleccione su Grado Acad??mico:</option>
                                        <option value="Secundaria">Secundaria</option>
                                        <option value="Superior T??cnico - Egresado">Superior T??cnico - Egresado</option>
                                        <option value="Superior T??cnico - Titulado">Superior T??cnico - Titulado</option>
                                        <option value="Superior Universitario - Egresado">Superior Universitario - Egresado</option>
                                        <option value="Superior Universitario - Bachiller">Superior Universitario - Bachiller</option>
                                        <option value="Superior Universitario - Titulado">Superior Universitario - Titulado</option>
                                        <option value="Maestria - Egresado">Maestr??a - Egresado</option>
                                        <option value="Maestria - Titulado">Maestr??a - Titulado</option>
                                        <option value="Doctorado- Egresado">Doctorado- Egresado</option>
                                        <option value="Doctorado - Titulado">Doctorado - Titulado</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary float-right mr-sm-2">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-6">
                        <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 22px; margin-top: 10px; color: #353535; font-weight: 650">Profesi??n:</p>
                        <div class="form-group col-md-12">
                            <form action="reportPROF.php" method="post" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="profesion" placeholder="Ingrese Profesi??n">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary float-right mr-sm-2">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 30px; margin-top: 10px; color: #353535; font-weight: 650"><u>Reportes Profesionales (Especificos)</u></p>
                <div class="row justify-content-around" style="margin-top: 10px">
                    <div class="col-10">
                        <form action="reportPROFESP.php" method="post" enctype="multipart/form-data">
                            <div class="input-group mb-3">
                                <select class="form-control" id="grado" name="grado">
                                    <option selected>Seleccione su Grado Acad??mico:</option>
                                    <option value="Secundaria">Secundaria</option>
                                    <option value="Superior T??cnico - Egresado">Superior T??cnico - Egresado</option>
                                    <option value="Superior T??cnico - Titulado">Superior T??cnico - Titulado</option>
                                    <option value="Superior Universitario - Egresado">Superior Universitario - Egresado</option>
                                    <option value="Superior Universitario - Bachiller">Superior Universitario - Bachiller</option>
                                    <option value="Superior Universitario - Titulado">Superior Universitario - Titulado</option>
                                    <option value="Maestria - Egresado">Maestr??a - Egresado</option>
                                    <option value="Maestria - Titulado">Maestr??a - Titulado</option>
                                    <option value="Doctorado- Egresado">Doctorado- Egresado</option>
                                    <option value="Doctorado - Titulado">Doctorado - Titulado</option>
                                </select>
                                <input type="text" class="form-control" name="profesion" placeholder="Ingrese Profesi??n">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary float-right mr-sm-2">Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--Box Personal-->
            <div class="tab-pane fade" id="v-pills-empresas" role="tabpanel" aria-labelledby="v-pills-empresas-tab">
                <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 30px; margin-top: 10px; color: #00568D;"><u>Datos Personales</u></p>
                <div class="row justify-content-around" style="margin-top: 10px">
                    <form class="form-inline">
                        <div class="form-group">
                            <input class="form-control mr-sm-2" type="search" id="busquedaPers" name="busquedaPers"  placeholder="Buscar" aria-label="Search" autocomplete="off">
                        </div>
                    </form>
                    
                    <div class="container col-12">
                        <div id="tabla_resultadoPers">
                                
                        </div>
                    </div>
                </div>
            </div>

            <!--Box Otros-->
            <div class="tab-pane fade" id="v-pills-programacion" role="tabpanel" aria-labelledby="v-pills-programacion-tab">
                <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 30px; margin-top: 10px; color: #00568D;"><u>Datos Adicionales</u></p>
                <div class="row justify-content-around" style="margin-top: 10px">
                    <form class="form-inline">
                        <div class="form-group">
                            <input class="form-control mr-sm-2" type="search" id="busquedaOtros" name="busquedaOtros"  placeholder="Buscar" aria-label="Search" autocomplete="off">
                        </div>
                    </form>
                    
                    <div class="container col-11">
                        <div id="tabla_resultadoOtros">
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../../../js/jquery-3.4.1.min.js"></script>
    <script src="../../../js/main.js"></script>
    <script src="../../../js/bootstrap.js"></script>
    <script src="../../../js/jspdf.min.js"></script>
    <script src="peticion.js"></script>

    </body>
</html>
<?php    }else{
    header("location:../../../index.html");
}
?>