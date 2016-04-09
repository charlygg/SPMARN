<?php

require('../db_connect.php');

$mysqli = new mysqli($servidor, $user, $passwd, $database);
/* Comprobamos que no esta creada ninguna variable tipo idempresa*/
if(!isset($_POST['idNoTramite'])){ $idNoTramite = -1; } else {
	$idNoTramite = $_POST['idNoTramite'];
}			

if(!isset($_POST['idTipoTramite'])){ $idTipoTramite = -1; } else {
	$idTipoTramite = $_POST['idTipoTramite'];
}	
	
if (!$mysqli){
	die ("Error en la conexion con el servidor de bases de datos: ".mysql_error());
}

$resultado = $mysqli->query("call ingresos2015.sp_consulta_tramites_by_id_tipo($idNoTramite,$idTipoTramite)");

$array = array();
/* Comprobamos que contiene datos, en caso contrario mostrar un mesaje json de error*/
if(!$resultado){
	$array[] = array('message' => 'error en el sp o base de datos');
	$json = json_encode($array);	
	$mysqli->close();
	echo $json;
} else {

if($resultado->num_rows>0){
	while($k = mysqli_fetch_assoc($resultado)){
		$array[] = $k;
	}
} else {
	 $array[] = array('message' => 'no hay empresas con esa informacion');
}

$json = json_encode($array);

$mysqli->close();

echo $json;

}
?>