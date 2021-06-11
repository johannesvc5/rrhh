<!DOCTYPE html>
 
<html lang="es">
 
<head>
<title>Gobierno Regional Pasco</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="css/estilos.css" />
<link rel="icon" type="image/png" href="img/logo.png">

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/main.js"></script>

</head>
<body style="background: #F9F9F9">
   <section class="container mx-auto" style="margin-top: 5%;">
      <div class="row mx-auto justify-content-center align-items-center">
         <div class="col-md-7">
            <div class="panel panel-default row" style="background-color: #fff ;box-shadow: 2px 2px 2px 1px #474747; padding: 20px; border-radius: 15px;">
               <div class="col-12 col-md-4 d-flex align-self-center justify-content-center">
                  <img src="img/logo.png" class="img-fluid">              
               </div>        
               <div class="panel-body col-12 col-md-8" style="color: #02416A">
                  <div class="page-header">
                     <h4 class="text-center">Gobierno Regional Pasco - Dirección de Recursos Humanos</h4>
                  </div>
                  <form action="inSession.php" method="POST" style="font-size: 13px; font-weight: 650">
                     <div class="form-row">
                        <div class="form-group col-12 col-md-12">
                           <label for="dni">DNI:</label>
                           <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese número de DNI" required autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                           <label for="pass">Password:</label>
                           <input type="password" class="form-control" id="pass" name="pass" placeholder="Ingrese su contraseña" required>
                        </div>
                        <div class="form-group col-md-12">
                           <label for="rol">Rol:</label>
                           <select class="custom-select mr-sm-2 form-select" id="rol" name="rol">
                              <option selected>Seleccione su Rol:</option>
                              <option value="gerencia">Gerencia</option>
                              <option value="direccion">Dirección RR.HH</option>
                              <option value="jefatura">Jefe de Personal</option>
                              <option value="informatica">Informática</option>
                           </select>
                        </div>
                     <button type="submit" name="login" class="btn btn-primary">Ingresar</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   
   <script type="text/javascript" src="js/main.js"></script>
   <script type="text/javascript" src="js/jquery.js"></script>
   <script src="js/bootstrap.js" charset="utf-8"></script>
</body>
</html>