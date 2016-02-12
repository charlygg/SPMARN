<?php

session_start();
if(!isset($_SESSION['session_user_depto_id'])){
	header("Location: ../../starter.php");
} 



switch($_SESSION['session_user_depto_id']){
	case 1:
		header("Location: recepcion/index.php");
		break;
	case 3:
		header("Location: dma/dashboard.php");
		break;
	case 5:
		header("Location: iv/index.php");
		break;
	case 9:
		header("Location: it/index.php");
		break;
	default:
		header("Location: index.php");
		
}

?>