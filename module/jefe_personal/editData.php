<?php

include ('../../conexion.php');

$dni = $_POST['dni'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$fnac = $_POST['fnac'];
$selectSexo = $_POST['selectSexo'];
$idPersonal = $_POST['idPersonal'];


$query = "UPDATE personal
SET dniPersonal = '$dni', 
nombreP = '$nombres', 
apellidosP = '$apellidos',
generoP = '$selectSexo',
fNacimiento = '$fnac'
WHERE idPersonal = '$idPersonal'";

if($db->query($query)){
	header('Location: registro.php');
}else{
	echo'<script type="text/javascript"> alert("No se pudo registrar los datos. Por favor intente nuevamente."); window.location.href="registro.php";</script>';
}

?>