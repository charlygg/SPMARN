<?php

require('../db_connect.php');

$mysqli = new mysqli($servidor, $user, $passwd, $database);
/* Comprobamos que no esta creada ninguna variable tipo idempresa*/
if(!isset($_POST['idempresa'])){ $idempresa = -1; } else {
	$idempresa = $_POST['idempresa'];
}			

if(!isset($_POST['idsucursal'])){ $idsucursal = -1; } else {
	$idsucursal = $_POST['idsucursal'];
}	
	
if (!$mysqli){
	die ("Error en la conexion con el servidor de bases de datos: ".mysql_error());
}

$resultado = $mysqli->query("call testsecurity.sp_consulta_data_from_establecimiento($idempresa,$idsucursal)");

$array = array();
/* Comprobamos que contiene datos, en caso contrario mostrar un mesaje json de error*/
if($resultado->num_rows>0){
	while($k = mysqli_fetch_assoc($resultado)){
		$array[] = $k;
	}
} else { $array[] = array('message' => 'error en el proceso');}

$json = json_encode($array);

mysqli_close($mysqli);

echo $json;

?>