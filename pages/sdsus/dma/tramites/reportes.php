<?php
 /*
echo "Sistema SPMARN - Subsecretar&iacute;a de Protección al Medio Ambiente y Recursos Naturales";
echo "<br><h3>&#09&#09&#09GOBIERNO DEL ESTADO DE NUEVO LEON - SECRETARIA DE DESARROLLO SUSTENTABLE</h3>";
echo "&#09&#09&#09&#09&#09SISTEMA DE TRANSPORTE ECOVIA";
echo "<br>&#09&#09&#09&#09&#09REPORTE DE QUEJAS ASIGNADAS  ";
/* Creacion de la tabla*/


date_default_timezone_set("America/Monterrey");

header("Content-type: application/vnd-ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Tramites_".date('d-m-Y').".xls");
$json = $_POST['jsonValues'];
$array = json_decode($json);

echo "<table border=1>";
echo "<thead>";
echo "<th>Encabezado de la tabla</th>";
echo "<th>Encabezado dos</th>";
echo "</thead>";
echo "<tbody>";
foreach($array as $a){
echo "<tr>";
	
}
echo "<td>Fila</td>";
echo "<td>".print_r($array)."</td>";
echo "</tr>";
echo "</tbody>";
echo "</table>";
?>