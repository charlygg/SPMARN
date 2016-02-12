<?php
/* AUto direccionamiento de areas*/

session_start();
if(!isset($_SESSION["session_username"])){
	header("location:login.php?msg=errort");
} else {
	header("location:pages/sdsus/filtroDepartamento.php");
}
?>