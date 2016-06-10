<?php

require('../../../db_connect.php');

$mysqli = new mysqli($servidor, $user, $passwd, $database);
/* Comprobamos que no esta creada ninguna variable tipo idempresa*/				
if (!$mysqli){
	die ("Error en la conexion con el servidor de bases de datos: ".mysql_error());
}
$fechaInicial = $_POST['fechaInicio'];
$fechaTermino = $_POST['fechaTermino'];
$noArea = $_POST['noArea'];

$resultado = $mysqli->query("call testsecurity.sp_flujo_tramite_personalizado_otro(2, ".$noArea.", '$fechaInicial', '$fechaTermino')");

$array = array();

/* Comprobamos que contiene datos, en caso contrario mostrar un mesaje json de error*/
if($resultado->num_rows>0){
	while($k = mysqli_fetch_assoc($resultado)){
		$array[] = $k;
	}
} else { $array[] = array('message' => 'error en el proceso'); }

$json = json_encode($array);

$mysqli->close();

echo $json;

?>