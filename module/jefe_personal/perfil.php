<?php
    session_start();
    if(isset($_SESSION['jefatura_id'])){
?>
<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <title>Gobierno Regional Pasco - RR.HH</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Literata&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../css/bootstrap.css">
        <link rel="stylesheet" href="../../css/estilos.css">

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
                        <a href="../logout.php" class="btn btn-danger btn-dist" style="border-radius: 10px;"><img class="svg" src="../../img/icon/sign-out-alt.svg"> Cerrar Sesión</a>
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
    
    <div class="container" style="margin-top: 100px;">
        <div class="row d-flex justify-content-center align-items-center"> 
            <div class="columna col-6 col-md-2" style="margin-top: 10px; margin-bottom: 20px;">
                <div class="container text-center cuadro" id="cuadro_uno">
                    <img src="../../img/icon/user-tie.svg" width="40%">
                    <p class="text-center">Gestión de Registro de Personal</p>
                    <a href="registro.php" class="btn btn-light boton">Ver Más</a>    
                </div>
            </div>
            <div class="columna col-6 col-md-2" style="margin-top: 10px; margin-bottom: 20px;">
                <div class="container text-center cuadro" id="cuadro_dos">
                    <img src="../../img/icon/id-card-alt.svg" width="50%">
                    <p class="text-center">Reportes e Informes de Personal</p>
                    <a href="reportes/reporteador.php" class="btn btn-light boton">Ver Más</a>    
                </div>
            </div>
            <div class="columna col-6 col-md-2" style="margin-top: 10px; margin-bottom: 20px;">
                <div class="container text-center cuadro" id="cuadro_tres">
                    <img src="../../img/icon/chart-line.svg" width="60%">
                    <p class="text-center">Reportes de Estadísticos</p>
                    <a href="informeEstadistico.php" class="btn btn-light boton">Ver Más</a>    
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/anima.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    
    </body>
</html>
<?php    }else{
    header("location:../../index.html");
}
?>