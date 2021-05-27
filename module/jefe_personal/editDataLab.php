<?php

include ('../../conexion.php');

$cargo = utf8_decode($_POST['cargo']);
$dependencia = $_POST['dependencia'];
$condLab = utf8_decode($_POST['condLab']);
$fechaInicio = $_POST['fechaInicio'];
$id = $_POST['id'];

$query = "UPDATE inflaboral
SET cargo = '$cargo',
fechaIng = '$fechaInicio', 
idCondLaboral = '$condLab', 
idDependencia = '$dependencia'
WHERE idInfLaboral = '$id'";

if($db->query($query)){
	header('Location: registro.php');
}else{
	echo'<script type="text/javascript"> alert("No se pudo registrar los datos. Por favor intente nuevamente."); window.location.href="registro.php";</script>';
}

?>