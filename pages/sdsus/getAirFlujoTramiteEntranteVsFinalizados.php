<?php

require('../db_connect_air.php');

$mysqli = new mysqli($servidor, $user, $passwd, $database, $port);
/* Comprobamos que no esta creada ninguna variable tipo idempresa*/				
if (!$mysqli){
	die ("Error en la conexion con el servidor de bases de datos: ".mysql_error());
}
$fechaInicial = $_POST['fechaInicio'];
$fechaTermino = $_POST['fechaTermino'];

$resultado = $mysqli->query("call sds.sp_flujo_tramite_personalizado(2, '$fechaInicial', '$fechaTermino')");

$array = array();

/* Comprobamos que contiene datos, en caso contrario mostrar un mesaje json de error*/
if($resultado->num_rows>0){
	while($k = mysqli_fetch_assoc($resultado)){
		$array[] = $k;
	}
} else { $array[] = array('message' => 'error en el proceso');}

$json = json_encode($array);

$mysqli->close();

echo $json;

?>