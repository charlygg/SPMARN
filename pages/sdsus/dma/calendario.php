<?php
	echo	"Pagina en fase de pruebas para un calendario de tramites";
	// El programa ya cuenta con los dias habiles sin sabados ni domingos
	// Para los dias feriados asuetos vacaciones, etc. haremos lo siguiente
    // Guardamos en una variable los dias festivos, asuetos, ect. en varios arrays con formato
    // $dias_festivos[año][mes] = [dias festivos];
    $dias_festivos = array(
        "2015"=>array(12 => [25,31]), /* Navidad y año nuevo 2015*/
        "2016"=>array(1 => [1,6]),
		"2016"=>array(2 => [5]) /* Semana santa, festivo del 18 al 31 */
    );
    $dias_saltados = array(0,6); // 0: domingo, 1: lunes... 6:sabado
    // dias a sumar 20 dias en este ejemplo
    $dias = $dias_origin = 20;
    // dias que el programa ha contado
    $dias_contados = 0;
    // timestamp actual
    $time = time();
    // duracion (en segundos) que tiene un día
    $dia_time = 3600*24; //3600 segundos en una hora * 24 horas que tiene un dia.


    function esFestivo($time) {
        global $dias_saltados;
        global $dias_festivos;
        
        
        $w = date("w",$time); // dia de la semana en formato 0-6
        if(in_array($w, $dias_saltados)) return true;
        $j = date("j",$time); // dia en formato 1 - 31
        $n = date("n",$time); // mes en formato 1 - 12
        $y = date("Y",$time); // año en formato XXXX
        if(isset($dias_festivos[$y]) && isset($dias_festivos[$y][$n]) && in_array($j,$dias_festivos[$y][$n])) return true;

        return false;
    }
    
    
    while($dias != 0) {
        $dias_contados++;
        $tiempoContado = $time+($dia_time*$dias_contados); // Sacamos el timestamp en la que estamos ahora mismo comprobando
        if(esFestivo($tiempoContado) == false)
            $dias--;
    }
	
    echo "El programa ha recorrido ".$dias_contados." (ha saltado ".($dias_contados-$dias_origin).") hasta llegar la fecha que deseabas:".PHP_EOL
        .date("D, d/m/Y",$tiempoContado);
    echo PHP_EOL;
	
	

?>