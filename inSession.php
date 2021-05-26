<?php

$dni= $_POST["dni"];
$pass= $_POST["pass"];
$rol= $_POST["rol"];
 
include ('conexion.php');

if ($rol == 'gerencia') {
	$proceso= $db->query("SELECT
	usuariogrp.idUser,
	usuariogrp.dniUser,
	usuariogrp.passUser,
	usuariogrp.nombreUser,
	usuariogrp.apellidosUser,
	rol.rolGRP
	FROM
	rol
	INNER JOIN usuariogrp ON usuariogrp.idRol = rol.idRol
	WHERE usuariogrp.dniUser = '$dni' AND usuariogrp.passUser = '$pass' AND rol.rolGRP = '$rol'");

	if($resultado = mysqli_fetch_array($proceso)){
		if ($rol=='gerencia' AND 'gerencia' == $resultado[5] AND $dni == $resultado[1] AND $pass == $resultado[2]) {
			session_start();
		   	$_SESSION['gerencia_id'] = $resultado[0];
		   	$_SESSION['gerencia_dni'] = $resultado[1];
		   	$_SESSION['gerencia_nombre'] = $resultado[3];
		   	$_SESSION['gerencia_apellidos'] = $resultado[4];
		   			 	
		    header("Location: module/gerencia/perfil.php");
		 
		   exit();
		}else{
		    header("Location: index.php");
		}
	}else{
		header("Location: index.php");
	}
}
elseif ($rol == 'direccion') {
	$proceso= $db->query("SELECT
	usuariogrp.idUser,
	usuariogrp.dniUser,
	usuariogrp.passUser,
	usuariogrp.nombreUser,
	usuariogrp.apellidosUser,
	rol.rolGRP
	FROM
	rol
	INNER JOIN usuariogrp ON usuariogrp.idRol = rol.idRol
	WHERE usuariogrp.dniUser = '$dni' AND usuariogrp.passUser = '$pass' AND rol.rolGRP = '$rol'");

	if($resultado = mysqli_fetch_array($proceso)){
		if ($rol=='direccion' AND 'direccion' == $resultado[5] AND $dni == $resultado[1] AND $pass == $resultado[2]) {
			session_start();
		   	$_SESSION['direccion_id'] = $resultado[0];
		   	$_SESSION['direccion_dni'] = $resultado[1];
		   	$_SESSION['direccion_nombre'] = $resultado[3];
		   	$_SESSION['direccion_apellidos'] = $resultado[4];
		 	
		    header("Location: module/direccion/perfil.php");
		 
		   exit();
		}else{
		    header("Location: index.php");
		}
	}else{
		header("Location: index.php");
	}
}
elseif ($rol == 'jefatura') {
	$proceso= $db->query("SELECT
	usuariogrp.idUser,
	usuariogrp.dniUser,
	usuariogrp.passUser,
	usuariogrp.nombreUser,
	usuariogrp.apellidosUser,
	rol.rolGRP
	FROM
	rol
	INNER JOIN usuariogrp ON usuariogrp.idRol = rol.idRol
	WHERE usuariogrp.dniUser = '$dni' AND usuariogrp.passUser = '$pass' AND rol.rolGRP = '$rol'");

	if($resultado = mysqli_fetch_array($proceso)){
		if ($rol=='jefatura' AND 'jefatura' == $resultado[5] AND $dni == $resultado[1] AND $pass == $resultado[2]) {
			session_start();
		   	$_SESSION['jefatura_id'] = $resultado[0];
		   	$_SESSION['jefatura_dni'] = $resultado[1];
		   	$_SESSION['jefatura_nombre'] = $resultado[3];
		   	$_SESSION['jefatura_apellidos'] = $resultado[4];
		 	
		    header("Location: module/jefe_personal/perfil.php");
		 
		   exit();
		}else{
		    header("Location: index.php");
		}
	}else{
		header("Location: index.php");
	}
}else{
	header("Location: index.php");
}

?>