<?php
session_start();
if(!isset($_SESSION["session_username"])){
	header("location:../../login.php?msg=errort");
}
date_default_timezone_set("America/Monterrey");
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SPMARN | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../plugins/datatables/dataTables.bootstrap.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
   <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="hold-transition skin-black sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A	</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav"> 
            	
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $_SESSION['session_nombre']." ".$_SESSION['session_apPat']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                  	<br><br>
                    <p><?php echo $_SESSION['session_nombre']." ".$_SESSION['session_apPat']; ?>
                       - <?php echo $_SESSION['session_user_depto_nombre']; ?>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="../../../myprofilesettings.php" class="btn btn-default btn-flat">Mi cuenta</a>
                    </div>
                    <div class="pull-right">
                      <a href="../../../logoutsession.php" class="btn btn-default btn-flat">Cerrar sesión</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
				<br>
				<br>
				<br>
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['session_nombre']; ?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="dashboard.php"><i class="fa fa-link"></i> <span>SMG</span></a></li>
            <li class="active"><a href="#"><i class="fa fa-link"></i> <span>AIR (Solo SO)</span></a></li>
            <li><a href="empresas.php"><i class="fa fa-link"></i> <span>Empresas y Sucursales</span></a></li>
            <!--<li><a href="tramites.php"><i class="fa fa-link"></i><span>Tramites</span></a></li>-->
            
            <li class="treeview">
            	<?php	
					if(empty($_GET)){
						echo '<li class="active"><a href="">Trámites nuevos</a></li>';
						echo '<li><a href="tramites_proceso.php">Trámites en proceso</a></li>';
						echo '<li><a href="tramites_finalizados.php">Trámites finalizados</a></li>';
						echo '<li><a href="tramites_urgentes.php">Trámites urgentes</a></li>';
						echo '<li><a href="tramites_vencidos.php">Trámites vencidos</a></li>';
					} else{
						if(isset($_GET["anio"]) && isset($_GET['metodoSeleccionFecha']) && isset($_GET['mes'])){
							$urlParametros = "?metodoSeleccionFecha=".$_GET['metodoSeleccionFecha']."&anio=".$_GET['anio']."&mes=".$_GET['mes'];
							echo '<li class="active"><a href="">Trámites nuevos</a></li>';
							echo '<li><a href="tramites_proceso.php'.$urlParametros.'">Trámites en proceso</a></li>';
							echo '<li><a href="tramites_finalizados.php'.$urlParametros.'">Trámites finalizados</a></li>';
						}
					}
          		?>
              <a href="#"><i class="fa fa-link"></i> <span>Menu trámites AIR</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="tramites/tramites_nuevos.php">Trámites nuevos</a></li>
                <li><a href="tramites/tramites_proceso.php">Trámites en proceso</a></li>
                <li><a href="tramites/tramites_finalizados.php">Trámites finalizados</a></li>
              </ul>
            </li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Estado de los tramites
           <?php
           	function getUltimoDiaMes($elAnio,$elMes) {
 		 		return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
			}
			
			 if(isset($_GET['metodoSeleccionFecha'])){
			 	
			 	if($_GET['metodoSeleccionFecha'] == 1){
			 		/* Seleccion de fecha por rango mensual*/	
			 		/* Se hara conversion de formato*/
			 		$anioSeleccionado = $_GET['anio'];
					$mesSeleccionado = $_GET['mes'];
			 		$ultimoDia = getUltimoDiaMes($anioSeleccionado,$mesSeleccionado);
					$primerDia = '01';

					$fechaInicial = $anioSeleccionado."-".$mesSeleccionado."-".$primerDia;
					$fechaTermino = $anioSeleccionado."-".$mesSeleccionado."-".$ultimoDia;
					
					$labelFechaInicial = $primerDia."-".$mesSeleccionado."-".$anioSeleccionado;					
					$labelFechaTermino = $ultimoDia."-".$mesSeleccionado."-".$anioSeleccionado;
					
					echo " desde ".$GLOBALS['labelFechaInicial']." hasta ".$GLOBALS['labelFechaTermino'];
					echo '<button class="btn btn-danger" onclick="restablecerFecha()">Restablecer fechas</button>';
			 	} else {
			 		/* Seleccion de fecha por rango personalizado*/
			 		/* Se hara conversion de formato*/
			 		$fechaI = $_GET['fechaInicial'];
					$fechaT = $_GET['fechaTermino'];
					
					$arrayI = explode('/',$fechaI);
					$arrayT = explode('/',$fechaT);
					
					$fechaInicial = $arrayI[2]."-".$arrayI[0]."-".$arrayI[1];
					$fechaTermino = $arrayT[2]."-".$arrayT[0]."-".$arrayT[1];
										
					$labelFechaInicial = $arrayI[0]."-".$arrayI[1]."-".$arrayI[2];
					$labelFechaTermino = $arrayT[0]."-".$arrayT[1]."-".$arrayT[2];
					
					echo " desde ".$GLOBALS['labelFechaInicial']." hasta ".$GLOBALS['labelFechaTermino'];
					echo '<button class="btn btn-danger" onclick="restablecerFecha()">Restablecer fechas</button>';
			 	}
			 	
			 } else {
			 	/* Fechas por defecto, la del mes actual, cuando no lleve parametros URL*/
			 	$time=date('d-m-Y',time());
				$anio=date('Y',time());
				$mesActual = date('m',time());
				
				$ultimoDia = getUltimoDiaMes($anio,$mesActual);
				$primerDia = '01';
				
				$fechaInicial = $anio."-".$mesActual."-".$primerDia;
				$fechaTermino = $anio."-".$mesActual."-".$ultimoDia;  
				
				$labelFechaInicial = $primerDia."-".$mesActual."-".$anio;					
				$labelFechaTermino = $ultimoDia."-".$mesActual."-".$anio;
				
				echo " desde ".$GLOBALS['labelFechaInicial']." hasta ".$GLOBALS['labelFechaTermino'];
			 }
			
           ?>
           
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> Dashboard</li>
            <!--<li class="active">Here</li>-->
          </ol>
        </section>

        <!-- Main content -->
        <!-- Your Page Content Here -->
        <section class="content">		
		<?php
		require('../../db_connect_air.php');
		/* Obtencion de los totales de los tramites DEL */
		$mysqli = new mysqli($servidor, $user, $passwd, $database, $port);
		$fi = $GLOBALS['fechaInicial'];
		$ft = $GLOBALS['fechaTermino'];
		
		$aux = basename($_SERVER['REQUEST_URI']);
		$arrayAux = explode("?",$aux);

		$urlParametros = "";	

		if(empty($arrayAux[1])){
		} else {
			$urlParametros = $arrayAux[1];
		}
		
		$numProceso = 0;
		$numTerminado = 0;
						
		if (!$mysqli){
  			die ("Error en la conexion con el servidor de bases de datos: " . mysql_error());
		}
		/* Consultamos la informacion que esta en proceso*/				
		$resultado = $mysqli->query("call sds.sp_reporte_diario_generico(2, '$fi','$ft')")
		or trigger_error($mysqli->error);
		
		while ($row = $resultado->fetch_array(MYSQLI_ASSOC)){
			$numProceso = $numProceso + 1;
		}	
		$mysqli->close();
		
		/* Consultamos la informacion que esta temrinada*/
		$mysqli = new mysqli($servidor, $user, $passwd, $database, $port);
		if (!$mysqli){
  			die ("Error en la conexion con el servidor de bases de datos: " . mysql_error());
		}
		$resultado = $mysqli->query("call sds.sp_reporte_diario_generico(3, '$fi','$ft')")
		or trigger_error($mysqli->error);
		
		while ($row = $resultado->fetch_array(MYSQLI_ASSOC)){
			$numTerminado = $numTerminado + 1;
		}	
		
		$mysqli->close();
		?>
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="tramitesAIR/tramitesSO_proceso.php?<?php echo $urlParametros ?>" style="color: #000;">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">En Proceso</span>
                  <span class="info-box-number"><?php echo $numProceso; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </a>
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="tramitesAIR/tramitesSO_finalizados.php?<?php echo $urlParametros; ?>" style="color: #000;">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Finalizados</span>
                  <span class="info-box-number"><?php echo $numTerminado; ?></span>
                  <span class="info-box-text"></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </a>
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
           <!--	<a href="tramites/tramites_totales.php?<?php echo $urlParametros ?>" style="color: #000;"> -->
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
                </a>
                <div class="info-box-content">
                <!-- <a href="tramites/tramites_totales.php?<?php echo $urlParametros ?>" style="color: #000;"> -->
                  <span class="info-box-text">ENTRANTES</span>
                  <span class="info-box-number"></span>
                  <span class="info-box-text">CUMPLIMIENTO</span>
                  <span class="info-box-number"><?php echo number_format(($numTerminado/$numProceso)*100,2)." % - ";  ?>
                  	<i style="cursor: pointer;" data-toggle="modal" data-target="#graficoModal" onclick="despliegaGraficoAreas()" class="fa fa-fw fa-pie-chart">Areas</i>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
			<!--</a>-->
            </div><!-- /.col -->         
          </div><!-- /.row -->
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Flujo de los tramites (Recibidos vs Finalizados)</li>
                </ul>
                <div class="tab-content no-padding"> 
					<div id="myChart" style="width:100%; height:400px;"></div>               	
					<table>
						<tr>
							<td><div class="form-group"><label style="padding-left: 10px; padding-right: 10px;">Seleccionar otro mes de actividad </label></div></td>
							<td>
								<div class="form-group">
									<select class="form-control" id="seleccionAnio">
										<option value="-1">Seleccione una opcion</option>
										<?php
										$arrayAnio2 = explode('-',$GLOBALS['labelFechaTermino']);
										$anioLabel = $arrayAnio2[2];
										$arrayAnio = array( '2009'=>'2009',
															'2010'=>'2010',
															'2011'=>'2011',
															'2012'=>'2012',
															'2013'=>'2013',
															'2014'=>'2014',
															'2015'=>'2015',
															'2016'=>'2016');
										foreach($arrayAnio as $anio=>$valor){
											if($anioLabel == $anio){
												echo "<option value=".$anio." selected='selected'>".$valor."</option>";		
											} else {
												echo "<option value=".$anio.">".$valor."</option>";	
											}
										}
										?>
									</select>
								</div>
							</td>
							<td>
								<div class="form-group">
									<select class="form-control" id="seleccionMesAnio">
										<option value="-1">Seleccione una opcion</option>
										<?php
										$arrayFecha2 = explode('-',$GLOBALS['labelFechaTermino']);
										$mesLabel = $arrayFecha2[1];
										$arraySemana = array('01' => 'Enero',
															'02' => 'Febrero',
															'03' => 'Marzo',
															'04' => 'Abril',
															'05' => 'Mayo',
															'06' => 'Junio',
															'07' => 'Julio',
															'08' => 'Agosto',
															'09' => 'Septiembre',
															'10' => 'Octubre',
															'11' => 'Noviembre',
															'12' => 'Diciembre');
										foreach($arraySemana as $numMes=>$Mes){
											if($mesLabel== $numMes){
												echo "<option value=".$numMes." selected='selected'>".$Mes."</option>";	
											} else {
												echo "<option value=".$numMes.">".$Mes."</option>";
											}	
										}
										?>
									</select>
								</div>
							</td>
							<td>
								<div class="form-group">
									<button class="btn btn-block btn-success" onclick="setFechaUno()">Elegir</button>
								</div>
							</td>
						</tr>
					</table>
                </div>
              </div>
              
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Reporte Diario de Solicitudes AIR</li>
                </ul>
                <div class="tab-content no-padding">
                	<table id="tblFullCaracteristicas" class="table table-bordered table-striped">
                  	<thead>
                        <th>No. Tramite</th>
                        <th>Tramite</th>
                        <th>Area</th>
                        <th>Empresa</th>
                        <th>Asunto</th>
                        <th>Recibido</th>
                    </thead>
                    <tbody>
                  	<?php
						require('../../db_connect_air.php');

						$aux = basename($_SERVER['REQUEST_URI']);
						$arrayAux = explode("?",$aux);

						$urlParametros = "";	

						if(empty($arrayAux[1])){
							} else {
							$urlParametros = $arrayAux[1];
						}
		
						$mysqli = new mysqli($servidor, $user, $passwd, $database, $port);
						$fi = $GLOBALS['fechaInicial'];
						$ft = $GLOBALS['fechaTermino'];
						
						if (!$mysqli){
  							die ("Error en la conexion con el servidor de bases de datos: " . mysql_error());
						}
						
						$resultado = $mysqli->query("call sds.sp_reporte_diario_generico(1, '$fi','$ft')")
						or trigger_error($mysqli->error);
						
						while ($row = $resultado->fetch_array(MYSQLI_ASSOC)){
							echo "<tr>";
							// echo "<td><a href='visor_so.php?so=".$row['salesorder_no']."'>".$row['salesorder_no']."</a></td>";
							echo "<td>".$row['salesorder_no']."</td>";
							echo "<td>".utf8_encode($row['cf_556'])."</td>";
							echo "<td>".utf8_encode($row['cf_578'])."</td>";
							echo "<td>".utf8_encode($row['accountname'])."</td>";
							echo "<td>".utf8_encode($row['tramiteDescripcion'])."</td>";
							echo "<td>".$row['cf_552']."</td>";
							echo "</tr>";
						}	
						$mysqli->close();
					?>
                    </tbody>
                    </table>
                </div>
              </div>
	  </section>
</div><!-- /.content-wrapper -->
<!-- VENTANA Modal PARA MOSTRAR EL % DE CUMPLIMIENTO A NIVEL AREA, SE MUESTRA CUANDO SE LE DA CLIC AL BOTON DE GRAFICO -->
<div class="modal fade" id="graficoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: auto; max-width: 600px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Cumplimiento por áreas</h4>
      </div>
       <div class="modal-body">
      	<div class="row">
      		<div class="col-md-12">
				<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto;"></div>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
 <!-- Main Footer -->
<?php include("../footer.php"); ?>
</div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../../bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/app.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../../plugins/fastclick/fastclick.min.js"></script>    
    <!-- DataTables -->
    <script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- HighCharts Plugin-->
    <script src="../../../plugins/highcharts/js/highcharts.js"></script>
    <script src="../../../plugins/highcharts/js/modules/exporting.js"></script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
    <script>
      $(function (){
      	var table =	$('#tblFullCaracteristicas').dataTable();
      	/* Si no elejimos que fecha de inicio y termino queremos, por defecto traera las del mes actuales desde el primer dia
      	 hasta el ultimo segun sea el mes*/
      	llenaGraficoUno();    
      	Highcharts.setOptions({
      		lang: {
      			months: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
      			weekdays: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Sabado'],
      			shortMonths: ['Ene', 'Feb', 'Mar', 'Abr','May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
      			printChart: 'Imprimir gráfico',
      			downloadPNG: 'Descargar como imagen PNG',
      			downloadJPEG: 'Descargar como imagen JPEG',
      			downloadPDF: 'Descargar como documento PDF',
      			downloadSVG: 'Descargar como imagen vector SVG',
      			exportButtonTitle: 'Exportar grafico',
      			loading: 'cargando',
      			printButtonTitle: 'Imprimir el grafico',
      			resetZoom: 'Resetear zoom',
      			resetZoomTitle: 'Reiniciar zoom a 1:1'
      		}
      	});
	  });
    </script>
    <script>
    	function recargarGraficoUno(){
    		llenaGraficoUno();
    	}
    	
    	function llenaGraficoUno(){
    	//$('#rangoFecha').daterangepicker();
      	var fechaInicio = "<?php echo $GLOBALS['fechaInicial']; ?>";
      	var fechaTermino = "<?php echo $GLOBALS['fechaTermino']; ?>";
      	/*
      	 * AJAX QUE RELLENA EL GRAFICO NUMERO UNO DE LOS TRAMITES CAPTURADOS CONTRA LOS RECIBIDOS
      	 */
      	$.ajax({
        	data: { "fechaInicio" : fechaInicio, "fechaTermino" : fechaTermino},
        	type: "POST",
        	dataType: "json",
        	url: "../getAirTramitesEntranteVsSaliente.php",
        })
        .done(function(data, textStatus, jqXHR){
        	if(console && console.log){
        		console.log("La solicitud se ha completado correctamente");
        	}
        	llenaGrafico(data);
        })
        .fail(function(jqXHR, textStatus, errorThrown){
        	if(console && console.log){
        		console.log("La solicitud ha fallado " + textStatus + " " + errorThrown);
        		recargarGraficoUno();
        	}
        });
 }
        
        function llenaGrafico(data2){
        console.log(data2);

      	var arrayDias = new Array();
      	var arrayTramites = new Array();
      	var arrayTramites2 = new Array();
      	
      	var fechaInicio = "<?php echo $GLOBALS['labelFechaInicial']; ?>";
      	var fechaTermino = "<?php echo $GLOBALS['labelFechaTermino']; ?>";
      	
		var i = 0;
      	for(var key in data2){
      		/* Algunas fechas dan null en un arreglo mienstras que en el otro no, el if es para detectar esos nulls*/
   	 		arrayDias[i] = data2[key].FECHA_RECIBIDO;
      
      		var num = isNaN(parseInt(data2[key].NUM_TRAMITES_RECIBIDOS)) ? 0 : parseInt(data2[key].NUM_TRAMITES_RECIBIDOS)
			arrayTramites[i] = num;
			
			var num2 = isNaN(parseInt(data2[key].NUM_TRAMITES_FINALIZADOS)) ? 0 : parseInt(data2[key].NUM_TRAMITES_FINALIZADOS)
			arrayTramites2[i] = num2;
			i++;
      	}     
      	
      	$('#myChart').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'Flujo de los trámites mensuales'
        },
        subtitle: {
            text: 'Fechas: Desde ' + fechaInicio + ' hasta ' + fechaTermino
        },
        xAxis: {
            categories: arrayDias
        },
        yAxis: {
            title: {
                text: 'No. de Trámites'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: true
            }
        },
        series: [{
            name: 'Tramites finalizados',
            data: arrayTramites2
        }, {
            name: 'Tramites recibidos',
            data: arrayTramites
        }]
    });
}

       	
    /* Funciones Javascript separadas*/
    	function setFechaUno(){
    		var metodo = 1;
			var anio = document.getElementById("seleccionAnio");
			var mes = document.getElementById("seleccionMesAnio");
			var actualURL = window.location.href.split('?')[0];
			window.location.href= actualURL+"?metodoSeleccionFecha="+metodo+"&anio="+anio.value+"&mes="+mes.value;
		}
		
		function setFechaDos(){
			var metodo=2;
			var rangoDate = document.getElementById("rangoFecha");
			console.log(rangoDate);
			var fechaInicial = rangoDate.value.split(' ')[0];
			console.log(fechaInicial);
			var fechaTermino = rangoDate.value.split('- ')[1];
			var actualURL = window.location.href.split('?')[0];
			window.location.href= actualURL+"?metodoSeleccionFecha="+metodo+"&fechaInicial="+fechaInicial+"&fechaTermino="+fechaTermino;
		}
		
		function restablecerFecha(){
			var nuevaURL = window.location.href.split('?')[0];
			window.location.href = nuevaURL;
		}
		
		function despliegaGraficoAreas(){
		var fechaInicio = "<?php echo $GLOBALS['fechaInicial']; ?>";
      	var fechaTermino = "<?php echo $GLOBALS['fechaTermino']; ?>";
      	$.ajax({
        	data: { "fechaInicio" : fechaInicio, "fechaTermino" : fechaTermino},
        	type: "POST",
        	dataType: "json",
        	url: "../getAirFlujoTramiteFinalizadoPorArea.php",
        })
        .done(function(data, textStatus, jqXHR){
        	if(console && console.log){
        		console.log("La solicitud se ha completado correctamente");
        	}
        	setGraficoPay(data);
        })
        .fail(function(jqXHR, textStatus, errorThrown){
        	if(console && console.log){
        		console.log("La solicitud ha fallado " + textStatus + " " + errorThrown);
        	}
        });	
		}
		
		function setGraficoPay(data){
		setTimeout(function() {
		console.log(data);
		var datas = [];
		i=0;
		for(var k in data){
			var aux = data[k].NUM_TRAMITES;
			var yAux = parseFloat( ( aux / <?php echo $numTerminado; ?> ) * 100 );
			var serie = new Object();
			serie.name = data[k].DEPARTAMENTO;
			serie.y = yAux;
			serie.drilldown = data[k].DEPARTAMENTO;
			datas.push(serie);
		}

		var jsonConfig = JSON.stringify(datas);
		console.log(jsonConfig);
		
		$('#container').highcharts({
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Cumplimiento de las Áreas'
        },
        subtitle: {
            text: ''
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y:.1f}%'
                }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },
        series: [{
            name: 'Tramites',
            colorByPoint: true,
            data: datas
        	}]
    	}); // Fin Chart
		}, 200);
	}
   </script>
  </body>
</html>