<?php
session_start();
/* Requiere la conexion y comprobacion del usuario si existe y esta logueado* lo pasa a la pagina principal */
require ("pages/db_connect.php");

if(isset($_SESSION["session_username"])){
	header("Location: starter.php");
}

/* Si no esta creada la sesion entonces comprobamos usuario y password si los envio del form*/
$u = $_POST["username"];
$p = $_POST["password"];
	
$mysqli = new mysqli($servidor, $user, $passwd, $database);

if (!$mysqli){
  die ("Error en la conexion con el servidor de bases de datos: " . mysql_error());
}

$resultado = $mysqli->query("call sp_login_info('$u','$p')");

if(!resultado){ die("Error en el sp ".$mysqli->errno); }

if($resultado->num_rows>0){
	while($k = mysqli_fetch_array($resultado)){
		/* Informacion del usuario*/
		$_SESSION['session_idusername'] = $k['U_ID'];
		$_SESSION['session_nombre'] = $k['U_NOMBRE'];
		$_SESSION['session_apPat'] = $k['U_APPAT'];
		$_SESSION['session_apMat'] = $k['U_APMAT'];
		$_SESSION['session_username'] = $k['U_USERNAME'];
		$_SESSION['session_email'] = $k['U_EMAIL'];
		$_SESSION['session_role'] = $k['U_ROLE'];
		$_SESSION['session_enabled'] = $k['U_ENABLED'];
		/* Informacion del departamento*/
		$_SESSION['session_user_depto_id'] = $k['A_ID'];
		$_SESSION['session_user_depto_nombre'] = $k['A_NOMBRE'];
		$_SESSION['session_user_depto_descripcion'] = $k['A_D'];
		$_SESSION['session_user_depto_role'] = $k['A_ROLE'];
		header("Location: starter.php");
	}
} else{
	header("Location:login.php?msg=error");
}

if($mysqli){ $mysqli->close(); }
?>