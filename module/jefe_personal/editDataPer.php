<?php

include ('../../conexion.php');

$telefono = $_POST['telefono'];
$email = $_POST['email'];
$region = $_POST['region'];
$Provincia = $_POST['Provincia'];
$Distrito = $_POST['Distrito'];
$Direccion = $_POST['Direccion'];
$estadoCivil = $_POST['estadoCivil'];
$hijos = $_POST['hijos'];
$id = $_POST['id'];

$query = "UPDATE infpersonal 
SET correo = '$email',
telefono = '$telefono', 
departamentoRes = '$region',
provinciaRes = '$Provincia',
distritoRes = '$Distrito', 
domicilioRes = '$Direccion',
estadoCivil = '$estadoCivil',
cantHijos = '$hijos'
WHERE idInfPersonal = '$id'";

if($db->query($query)){
	header('Location: registro.php');
}else{
	echo'<script type="text/javascript"> alert("No se pudo registrar los datos. Por favor intente nuevamente."); window.location.href="registro.php";</script>';
}

?>