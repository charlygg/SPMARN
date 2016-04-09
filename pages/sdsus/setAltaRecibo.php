<?php

require('../db_connect.php');

$mysqli = new mysqli($servidor, $user, $passwd, $database);
/* Comprobamos que no esta creada ninguna variable tipo idempresa*/
if(!isset($_POST['idEmpresa'])){ $idEmpresa = -1; } else {
	$idEmpresa = $_POST['idEmpresa'];
}			

if(!isset($_POST['idSucursal'])){ $idSucursal = -1; } else {
	$idSucursal = $_POST['idSucursal'];
}	

if(!isset($_POST['idServicio'])){ $idServicio = -1; } else {
	$idServicio = $_POST['idServicio'];
}	

if(!isset($_POST['folio'])){ $folio = -1; } else {
	$folio = $_POST['folio'];
}	

if(!isset($_POST['caja'])){ $caja = -1; } else {
	$caja = $_POST['caja'];
}	

if(!isset($_POST['total'])){ $total = -1; } else {
	$total = $_POST['total'];
}	

if(!isset($_POST['fechaCorrespondencia'])){ $fechaCorrespondencia = -1; } else {
	$fechaCorrespondencia = $_POST['fechaCorrespondencia'];
	list($diaC, $mesC, $anioC) = explode('/',$fechaCorrespondencia);
	$fechaCorrespondenciaFormato = $anioC."-".$mesC."-".$diaC;
}	

if(!isset($_POST['fechaPago'])){ $fechaPago = -1; } else {
	$fechaPago = $_POST['fechaPago'];
	list($diaP, $mesP, $anioP) = explode('/',$fechaPago);
	$fechaPagoFormato = $anioP."-".$mesP."-".$diaP;
}	

if(!isset($_POST['idTipoTramite'])){ $idTipoTramite = -1; } else {
	$idTipoTramite = $_POST['idTipoTramite'];
}	

if(!isset($_POST['idTramite'])){ $idTramite = -1; } else {
	$idTramite = $_POST['idTramite'];
}	

if(!isset($_POST['descTramite'])){ $descTramite = -1; } else {
	$descTramite = $_POST['descTramite'];
}	
	
if (!$mysqli){
	die ("Error en la conexion con el servidor de bases de datos: ".mysqli_error());
}

$sp = $mysqli->prepare("call ingresos2015.sp_alta_recibo(?,?,?,?,?,?,?,?,?,?,?)");
$sp->bind_param('iiissdssiis',$idEmpresa, $idSucursal, $idServicio, $folio,  $caja, $total, $fechaCorrespondenciaFormato,
							$fechaPagoFormato, $idTramite, $idTipoTramite, $descTramite);

$sp->execute();
$resultado = $sp->get_result();

$array = array();
	while($k = $resultado->fetch_assoc()){
		$array[] = $k;
	}
$sp->free_result();
$sp->close();
$json = json_encode($array);

$mysqli->close();

echo $json;

?>