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
        <link rel="stylesheet" href="../../css/bootstrap.css">
        <link rel="stylesheet" href="../../css/estilos.css">

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <link rel="stylesheet" href="../../css/esri-leaflet-geocoder.css">
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
                        <a href="perfil.php" class="btn btn-primary btn-dist" style="border-radius: 10px;"><img class="svg" src="../../img/icon/home.svg"> Regresar</a>
                    </div>
                </ul>
                <ul class="navbar-nav my-2 my-lg-0">
                    <?php echo '
                        <a href="" class="input-group container-fluid">
                            <p style="margin-left: -30px; color: #fff; font-family: Arial; margin-top: 10px; font-size: 15px">¡Hola '.strtoupper($_SESSION['jefatura_nombre']).'!</p>    
                        </a>
                    '; ?> 
                </ul>
          </div>
        </nav>
    </header>
    <div class="row">
        <div class="nav affix flex-column nav-pills col-3 " id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link direccion-nav" id="v-pills-resolucion-tab" data-toggle="pill" href="#v-pills-resolucion" role="tab" aria-controls="v-pills-resolucion" aria-selected="true"><img class="svg" src="../../img/icon/home.svg"> Personal (Registrar/Editar)</a>

            <a class="nav-link direccion-nav" id="v-pills-map-tab" data-toggle="pill" href="#v-pills-map" role="tab" aria-controls="v-pills-map" aria-selected="false"><img class="svg" src="../../img/icon/user-tie.svg"> Información Laboral (Ver/Editar)</a>

            <a class="nav-link direccion-nav" id="v-pills-encargado-tab" data-toggle="pill" href="#v-pills-encargado" role="tab" aria-controls="v-pills-encargado" aria-selected="false"><img class="svg" src="../../img/icon/user-graduate-solid.svg"> Información Educativa (Ver/Editar)</a>
            
            <a class="nav-link direccion-nav" id="v-pills-empresas-tab" data-toggle="pill" href="#v-pills-empresas" role="tab" aria-controls="v-pills-empresas" aria-selected="false"><img class="svg" src="../../img/icon/id-card-alt.svg"> Información Personal (Ver/Editar)</a>
            
            <a class="nav-link direccion-nav" id="v-pills-programacion-tab" data-toggle="pill" href="#v-pills-programacion" role="tab" aria-controls="v-pills-programacion" aria-selected="false"><img class="svg" src="../../img/icon/address-card.svg"> Información Adicional (Ver/Editar)</a> 
            
            <a href="../../logout.php" class="nav-link direccion-nav-salir"><img class="svg" src="../../img/icon/sign-out-alt.svg"> Salir </a>
        </div>
        <div class="tab-content col-9" id="v-pills-tabContent">
            <!--Box Resoluciones-->
            <div class="tab-pane fade show active" id="v-pills-resolucion" role="tabpanel" aria-labelledby="v-pills-resolucion-tab">
                <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 30px; margin-top: 10px; color: #353535; font-weight: 650"><u>Registro de Personal</u></p>
                <div class="row justify-content-around" style="margin-top: 10px">
                    <form class="form-inline">
                        <div class="form-group">
                            <input class="form-control mr-sm-2" type="search" id="busquedaRRHH" name="busquedaRRHH"  placeholder="Buscar" aria-label="Search" autocomplete="off">
                        </div>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#obraAdd"><img class="svg2" src="../../img/icon/plus.svg">  Añadir</button>
                    </form>
                    <!-- Modal -->
                    <div class="modal fade" id="obraAdd" tabindex="-1" role="dialog" aria-labelledby="obraAdd" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Añadir Registro de Personal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form name="enviar_archivo_frm" action="addPersonal.php" method="post" enctype="multipart/form-data">
                                        <!--Datos de Personal-->
                                        <div class="form-row">
                                            <h5 class="modal-title text-center text-primary col-md-12" style="margin-top:5px; margin-bottom: 10px;">Añadir Datos de Personal:</h5>
                                            <div class="form-group col-md-6">
                                                <label for="dni" class="text-dark"><strong>DNI:</strong></label>
                                                <input type="numeric" class="form-control" id="dni" name="dni" placeholder="Ingrese Número de DNI" maxlength="8">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nombres"><strong>Nombres:</strong></label>
                                                <input type="text" class="form-control" name="nombres" placeholder="Ingrese Nombres">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="apellidos"><strong>Apellidos:</strong></label>
                                                <input type="text" class="form-control" name="apellidos" placeholder="Ingrese Apellidos">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="fnacimiento"><strong>Fecha de Nacimiento:</strong></label>
                                                <input type="date" class="form-control" name="fnac">
                                            </div>
                                            <div class="form-group col-md-6 text-center">
                                                <label for="entidad1"><strong>Sexo:</strong></label>
                                                <div>
                                                    <div class="form-group custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="masculino" value="M" name="selectSexo" class="custom-control-input">
                                                        <label class="custom-control-label" for="masculino">Masculino</label>
                                                    </div>
                                                    <div class="form-group custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="femenino" value="F" name="selectSexo" class="custom-control-input">
                                                        <label class="custom-control-label" for="femenino">Femenino</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="telefono" class="text-dark"><strong>Número de Teléfono:</strong></label>
                                                <input type="numeric" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su Número de Teléfono" maxlength="9">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email"><strong>Correo Electrónico:</strong></label>
                                                <input type="mail" class="form-control" name="email" placeholder="Ingrese Correo Electronico">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="región"><strong>Región de Residencia:</strong></label>
                                                <input type="text" class="form-control" name="región" placeholder="Ingrese región">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="Provincia"><strong>Provincia de Residencia:</strong></label>
                                                <input type="text" class="form-control" name="Provincia" placeholder="Ingrese Provincia">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="Distrito"><strong>Distrito de Residencia:</strong></label>
                                                <input type="text" class="form-control" name="Distrito" placeholder="Ingrese Distrito">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="Dirección"><strong>Dirección de Residencia:</strong></label>
                                                <input type="text" class="form-control" name="Dirección" placeholder="Ingrese Dirección">
                                            </div>
                                            <div class="form-group col-md-6">
                                               <label for="estadoCivil"><strong>Estado Civil:</strong></label>
                                               <select class="custom-select mr-sm-2 form-select" id="estadoCivil" name="estadoCivil">
                                                  <option selected>Seleccione su Estado Civil:</option>
                                                  <option value="Soltero">Soltero</option>
                                                  <option value="Casado">Casado</option>
                                                  <option value="Divorciado">Divorciado</option>
                                                  <option value="Viudo">Viudo</option>
                                                  <option value="Conviviente">Conviviente</option>
                                               </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="hijos" class="text-dark"><strong>Cantidad de Hijos:</strong></label>
                                                <input type="numeric" class="form-control" id="hijos" name="hijos" placeholder="Ingrese Código Profesional" maxlength="2">
                                            </div>
                                            <div class="form-group col-md-6 text-center">
                                                <label for="discapacidad"><strong>Discapacidad:</strong></label>
                                                <div>
                                                    <div class="form-group custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="si" value="si" name="discapacidad" class="custom-control-input">
                                                        <label class="custom-control-label" for="si">SI</label>
                                                    </div>
                                                    <div class="form-group custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="no" value="no" name="discapacidad" class="custom-control-input">
                                                        <label class="custom-control-label" for="no">NO</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 text-center">
                                                <label for="militar"><strong>Serv. Militar:</strong></label>
                                                <div>
                                                    <div class="form-group custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="siM" value="si" name="militar" class="custom-control-input">
                                                        <label class="custom-control-label" for="siM">SI</label>
                                                    </div>
                                                    <div class="form-group custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="noM" value="no" name="militar" class="custom-control-input">
                                                        <label class="custom-control-label" for="noM">NO</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Fotografía-->
                                            <div class="form-group col-md-6" id="img">
                                                <input type="file" class="custom-file-input" id="img" aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="img">Buscar Fotografía</label>
                                            </div>

                                            <!-- Información Académica -->
                                            <h5 class="modal-title text-center text-primary col-md-12" style="margin-top:5px; margin-bottom: 10px;">Añadir Datos Educativos:</h5>

                                            <!-- Selección Grado Académico -->
                                            <div class="form-group col-md-12">
                                               <label for="grado"><strong>Grado Académico:</strong></label>
                                               <select class="custom-select mr-sm-2 form-select" id="grado" name="grado" onchange="myFunction(value);">
                                                    <option selected>Seleccione su Grado Académico:</option>
                                                    <option value="Secundaria">Secundaria</option>
                                                    <option value="Superior Técnico - Egresado">Superior Técnico - Egresado</option>
                                                    <option value="Superior Técnico - Titulado">Superior Técnico - Titulado</option>
                                                    <option value="Superior Universitario - Egresado">Superior Universitario - Egresado</option>
                                                    <option value="Superior Universitario - Bachiller">Superior Universitario - Bachiller</option>
                                                    <option value="Superior Universitario - Titulado">Superior Universitario - Titulado</option>
                                                    <option value="Maestria - Egresado">Maestría - Egresado</option>
                                                    <option value="Maestria - Titulado">Maestría - Titulado</option>
                                                    <option value="Doctorado- Egresado">Doctorado- Egresado</option>
                                                    <option value="Doctorado - Titulado">Doctorado - Titulado</option>
                                               </select>
                                            </div>
                                            <div class="form-group col-md-12" id="prof" style="display: none">
                                                <label for="Profesión"><strong>Carrera Profesional:</strong></label>
                                                <input type="text" class="form-control" name="Profesión" placeholder="Ingrese Profesión">
                                            </div>
                                            <div class="form-group col-md-12" id="codP" style="display: none">
                                                <label for="codProf" class="text-dark"><strong>Código Profesional:</strong></label>
                                                <input type="numeric" class="form-control" id="codProf" name="codProf" placeholder="Ingrese Código Profesional">
                                            </div>
                                            
                                            <!-- Información Laboral -->
                                            <h5 class="modal-title text-center text-primary col-md-12" style="margin-top:5px; margin-bottom: 10px;">Añadir Datos Laborales:</h5>
                                            <div class="form-group col-md-12">
                                                <label for="Cargo"><strong>Cargo:</strong></label>
                                                <input type="text" class="form-control" name="Cargo" placeholder="Ingrese Cargo">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="Dependencia"><strong>Dependencia:</strong></label>
                                                <select class="custom-select mr-sm-2 form-select" id="dependencia" name="dependencia" onchange="myFunction(value);">
                                                    <option selected>Seleccione su Dependencia:</option>
                                                    
                                                    <?php
                                                        include('../../conexion.php');
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
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="Condición Laboral"><strong>Condición Laboral:</strong></label>
                                                <select class="custom-select mr-sm-2 form-select" id="condLab" name="condLab" onchange="myFunction(value);">
                                                    <option selected>Seleccione su Régimen Laboral:</option>
                                                    <?php
                                                        include('../../conexion.php');
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
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="FechaIni"><strong>Fecha Inicio:</strong></label>
                                                <input type="date" class="form-control" name="fechaInicio" placeholder="Ingrese Fecha Inicio">
                                            </div>

                                        </div>
                                        <button type="submit" class="btn btn-primary float-right mr-sm-2">Guardar</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Modal-->
                    <div class="container col-12">
                        <div id="tabla_resultadoRRHH">
                            
                        </div>
                    </div>
                </div>
            </div>

            <!--Box Laboral-->
            <div class="tab-pane fade" id="v-pills-map" role="tabpanel" aria-labelledby="v-pills-map-tab">
                <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 30px; margin-top: 10px; color: #353535; font-weight: 650"><u>Información Laboral</u></p>
                <div class="row justify-content-around" style="margin-top: 10px">
                    <form class="form-inline">
                        <div class="form-group">
                            <input class="form-control mr-sm-2" type="search" id="busquedaLab" name="busquedaLab"  placeholder="Buscar" aria-label="Search" autocomplete="off">
                        </div>
                    </form>
                    <div class="container col-12">
                        <div id="tabla_resultadoLab">
                            
                        </div>
                    </div>
                </div>
            </div>

            <!--Box Educativa-->
            <div class="tab-pane fade" id="v-pills-encargado" role="tabpanel" aria-labelledby="v-pills-encargado-tab">
                <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 30px; margin-top: 10px; color: #353535; font-weight: 650"><u>Información Educativa</u></p>
                <div class="row justify-content-around" style="margin-top: 10px">
                    <form class="form-inline">
                        <div class="form-group">
                            <input class="form-control mr-sm-2" type="search" id="busquedaEduc" name="busquedaEduc"  placeholder="Buscar" aria-label="Search" autocomplete="off">
                        </div>
                    </form>
                    
                    <div class="container col-12">
                        <div id="tabla_resultadoEduc">
                                
                        </div>
                    </div>
                </div>
            </div>

            <!--Box Personal-->
            <div class="tab-pane fade" id="v-pills-empresas" role="tabpanel" aria-labelledby="v-pills-empresas-tab">
                <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 30px; margin-top: 10px; color: #353535; font-weight: 650"><u>Datos Personales</u></p>
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
                <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 30px; margin-top: 10px; color: #353535; font-weight: 650"><u>Datos Adicionales</u></p>
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

    <script type="text/javascript" src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/jspdf.min.js"></script>
    <script src="peticion.js"></script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="../../js/esri-leaflet.js"></script>
    <script src="../../js/esri-leaflet-geocoder.js"></script>



    </body>
</html>
<?php    }else{
    header("location:../../index.html");
}
?>