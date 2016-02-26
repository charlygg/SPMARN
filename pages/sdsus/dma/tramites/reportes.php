<?php
 /*
echo "Sistema SPMARN - Subsecretar&iacute;a de Protección al Medio Ambiente y Recursos Naturales";
echo "<br><h3>&#09&#09&#09GOBIERNO DEL ESTADO DE NUEVO LEON - SECRETARIA DE DESARROLLO SUSTENTABLE</h3>";
echo "&#09&#09&#09&#09&#09SISTEMA DE TRANSPORTE ECOVIA";
echo "<br>&#09&#09&#09&#09&#09REPORTE DE QUEJAS ASIGNADAS  ";
/* Creacion de la tabla*/
header("Content-type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=Reportes_".date('d-m-Y').".xls");

date_default_timezone_set("America/Monterrey");

$jsonTodo = $_POST['jsonValues'];
$array = json_decode($jsonTodo);

echo "<table border=1>";
echo "<thead>";

foreach($array[0] as $key => $value){
	echo "<th>".utf8_decode($value)."</th>";
}

echo "</thead>";
echo "<tbody>";

foreach($array[1] as $info){
	echo "<tr>";
		foreach($info as $key => $value){
			echo "<td>".utf8_decode($value)."</td>";
		}
	echo "</tr>";
}

echo "</tbody>";
echo "</table>";

?>

