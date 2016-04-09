<?php

require('../db_connect.php');

$mysqli = new mysqli($servidor, $user, $passwd, $database);
/* Comprobamos que no esta creada ninguna variable tipo idempresa*/
if(!isset($_POST['idempresa'])){ $idempresa = -1; } else {
	$idempresa = $_POST['idempresa'];
}				
if (!$mysqli){
	die ("Error en la conexion con el servidor de bases de datos: ".mysql_error());
}

$resultado = $mysqli->query("SELECT EST.*,EMP.representanteLegal FROM catalogo_perfilestablecimiento as EST LEFT JOIN catalogo_perfilempresa AS EMP ON EST.idcatalogo_perfilempresa = EMP.idcatalogo_perfilempresa where EST.idcatalogo_perfilempresa = $idempresa");

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