<?php

require('../db_connect.php');

$mysqli = new mysqli($servidor, $user, $passwd, $database);
/* Comprobamos que no esta creada ninguna variable tipo idempresa*/				
if (!$mysqli){
	die ("Error en la conexion con el servidor de bases de datos: ".mysql_error());
}
$fechaInicial = $_POST['fechaInicio'];
$fechaTermino = $_POST['fechaTermino'];
/*
$time=date('d-m-Y',time());
$anio=date('Y',time());
$mesActual = date('m',time());
$ultimoDia = getUltimoDiaMes($anio,$mesActual);
$primerDia = '01';

$fechaInicial = $anio."-".$mesActual."-".$primerDia;
$fechaTermino = $anio."-".$mesActual."-".$ultimoDia;	
*/

$resultado = $mysqli->query("call testsecurity.sp_reporte_tramites_generico(9, '$fechaInicial', '$fechaTermino')");

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