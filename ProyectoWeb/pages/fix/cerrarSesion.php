<?php
	session_start();
	$temp = $_REQUEST["nombreSesion"];
	//inhabilitamos esta variable de sesion
	unset($_SESSION[$temp]);
	//redireccionamos a la pantalla del login
	header("location:./../../index.php");
?>