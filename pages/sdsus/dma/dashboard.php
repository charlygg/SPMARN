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
    <meta charset="utf-8">
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
  <body class="hold-transition skin-blue sidebar-mini">
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
            	<!---------------------------------------------NOTIFICACIONES------------------------------------------------------>
            	  <?php
                	require('../../db_connect.php');
					include('calendarioFestivo.php');
					include('contarDias.php');
					$mysqli = new mysqli($servidor, $user, $passwd, $database);
                  	
					if (!$mysqli){
  						die ("Error en la conexion con el servidor de bases de datos: " . mysql_error());
					}
										/* LO enviamos sin argumentos, son todos los tramites desde el inicio*/
					$resultado = $mysqli->query("call testsecurity.sp_reporte_tramites_generico(8,'0000-00-00','0000-00-00')") or die ($mysqli->error.__LINE__);
					$i2 = 0; // Conteo de tramites urgentes
					$i = 0;  // Conteo de tramites vencidos
					$arrayTramites2 = array(); // Array de tramites urgentes
					$arrayTramiteIndividual = array(); // Array de tramites vencidos
					while($k = mysqli_fetch_array($resultado)){
						$fechaInicioTramite = $k['REP_FECHA_INICIO_TRAMITE'];
						$fechaInicioTramiteddMMYY = '0000-00-00';
						$conteoDias = '00/00/0000';
						$unixInicioTramite = 0;
						$unixVencimientoTramite = 0;
						$unixHoy = time();
						$hoy = date("d-m-Y");
						$diasTramite = 0;
						$horasDelDia = date("H",time());
						
						if((!empty($fechaInicioTramite)) || is_null($fechaInicioTramite)){
							
							if(!is_null($fechaInicioTramite)){$arrayT = explode('-',$fechaInicioTramite); }
							 
								$fechaInicioTramiteddMMYY = $arrayT[2]."/".$arrayT[1]."/".$arrayT[0];
							/* Si no es 00/00/0000 */
							if(strcmp($fechaInicioTramiteddMMYY, '00/00/0000') == 1){
								$unixInicioTramite = strtotime($fechaInicioTramite);
								$conteoDias = sumarDiasTramite($unixInicioTramite, 20);
								
								list($dia,$mes,$anio) = explode('/', $conteoDias);
								$unixVencimientoTramite = mktime(0, 0, 0, $mes, $dia, $anio);
								
								list($anioInit, $mesInit, $diaInit) = explode('-',$fechaInicioTramite);
								 $diasTramite = Evalua(DiasHabiles($diaInit.'-'.$mesInit.'-'.$anioInit, $hoy));
							}
						}
						/* If para filtrar los tramites en proceso*/
						if((($unixHoy - (2 * 3600 * $horasDelDia)) < ($unixVencimientoTramite) ) && ($diasTramite>=16 && $diasTramite<=20) ){
							$i2 = $i2 + 1;
							$arrayTramiteIndividual2 = array(
								"no_tramite" => $k['NO_TRAMITE'],
								"tramite" => $k['TRAMITE'],
								"empresa" => $k['EMPRESA'],
								"asunto" => $k['ASUNTO'],
								"turnado" => $k['TURNADO_A'],
								"inicio_tramite" => $fechaInicioTramiteddMMYY			
							);
							$arrayTramites2[] = $arrayTramiteIndividual2;
							}
						
						/* If para filtrar los tramites vencidos*/						
						if(($unixHoy - (2 * 3600 * $horasDelDia)) > ($unixVencimientoTramite)){
							$i = $i + 1;
							$arrayTramiteIndividual = array(
								"no_tramite" => $k['NO_TRAMITE'],
								"tramite" => $k['TRAMITE'],
								"empresa" => $k['EMPRESA'],
								"asunto" => $k['ASUNTO'],
								"turnado" => $k['TURNADO_A'],
								"inicio_tramite" => $fechaInicioTramiteddMMYY
							);
							$arrayTramites[] = $arrayTramiteIndividual;				
						}
					}
					$mysqli->close(); 
                  ?>
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning"><?php echo $i2; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Listado de tramites urgentes</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                    	<?php
                    	foreach($arrayTramites2 as $t){
                    		echo '
                    		 <li>
                        	<a href="#">
                          		<i class="fa fa-warning text-yellow"></i>No. '.$t['no_tramite'].' , '.$t['tramite'].'
                        	</a>
                      		</li>
                    		';
                    		}
                    	?>
                    </ul>
                  </li>
                  <li class="footer"><a href="tramites/tramites_urgentes.php">Ver todos los tramites</a></li>
                </ul>
              </li>
              	<!----------------------------------------------- FIN DE LAS NOTIFICACIONES------------------------------------->
                <!----------------------------------------------- TRAMITES VENCIDOS   ----------------------------------------->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger"><?php echo $i;?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Listado de tramites vencidos</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                    	<?php 
                    	
                    	foreach($arrayTramites as $tramite){
							echo '
                    		<li>
                       		 <a href="#">
                      	   		 <i class="fa fa-warning text-yellow"></i>No. '.$tramite['no_tramite'].' , '.$tramite['tramite'].'
                      		  </a>
                      		</li>
                    		';
                    		}
                    	?>
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="tramites/tramites_vencidos.php">Ver mas detalles</a>
                  </li>
                </ul>
              </li>
            	
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
            <li class="active"><a href="?"><i class="fa fa-link"></i><span>SMG</span></a></li>
            <li><a href="dashboardAir.php"><i class="fa fa-link"></i><span>AIR (Solo lectura)</span></a></li>
            <li><a href="empresas.php"><i class="fa fa-link"></i> <span>Empresas y Sucursales</span></a></li>
            <!--<li><a href="tramites.php"><i class="fa fa-link"></i><span>Tramites</span></a></li>-->
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Menu trámites SMG</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
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
		/* Obtencion de los totales de los tramites*/
		require('../../db_connect.php');
		
		$aux = basename($_SERVER['REQUEST_URI']);
		$arrayAux = explode("?",$aux);

		$urlParametros = "";	

		if(empty($arrayAux[1])){
		} else {
			$urlParametros = $arrayAux[1];
		}
		
		$mysqli = new mysqli($servidor, $user, $passwd, $database);
		$fi = $GLOBALS['fechaInicial'];
		$ft = $GLOBALS['fechaTermino'];
		
		$EN = 0;
		$NU = 0;
		$REC = 0;
		$PRO = 0;
		$TER_MES = 0;
		$TER = 0;
	
		if (!$mysqli){
  			die ("Error en la conexion con el servidor de bases de datos: " . mysql_error());
		}
		
		$resultado = $mysqli->query("call testsecurity.sp_reporte_tramites_generico(4,'$fi','$ft')");
		while($k = mysqli_fetch_array($resultado)){
			$EN = $k['TOTAL_TRAMITES_ENTRANTES'];
			$NU = $k['TOTAL_TRAMITES_NUEVOS'];
			$REC = $k['TOTAL_TRAMITES_RECIBIDOS'];
			$PRO = $k['TOTAL_TRAMITES_PROCESO'];
			$TER_MES = $k['TOTAL_TRAMITES_MES_T'];
			$TER = $k['TOTAL_TRAMITES_TERMINADOS'];
		}
		$mysqli->close();
		?>
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="tramites/tramites_nuevos.php?<?php echo $urlParametros ?>" style="color: #000;">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Nuevos tramites</span>
                  <span class="info-box-number"><?php echo $NU ?></span>
                  <br>
                  <span class="info-box-text">(En recepcion)</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </a>
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="tramites/tramites_proceso.php?<?php echo $urlParametros ?>" style="color: #000;">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">En Proceso (En el area)</span>
                  <span class="info-box-number"><?php echo $PRO + $TER_MES; ?></span>
                  <span class="info-box-text">Recibidos (En el area)</span>
                  <span class="info-box-number"><?php echo $REC ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </a>
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="tramites/tramites_finalizados.php?<?php echo $urlParametros ?>" style="color: #000;">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Finalizados</span>
                  <span class="info-box-number"><?php echo $TER ?></span>
                  <span class="info-box-text">Notificados</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </a>
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
           <!--	<a href="tramites/tramites_totales.php?<?php echo $urlParametros ?>" style="color: #000;"> -->
              <div class="info-box">
              	<a href="tramites/tramites_totales.php?<?php echo $urlParametros ?>" style="color: #000;">
                <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
                </a>
                <div class="info-box-content">
                <a href="tramites/tramites_totales.php?<?php echo $urlParametros ?>" style="color: #000;">
                  <span class="info-box-text">ENTRANTES DEL MES</span>
                  <span class="info-box-number"><?php echo $EN ?></span>
                  <span class="info-box-text">CUMPLIMIENTO</span>
                </a>
                  <span class="info-box-number"><?php echo number_format(($TER/$EN)*100,2)." % - ";  ?>
                  	<i style="cursor: pointer;" data-toggle="modal" data-target="#graficoModal" onclick="llenaGraficoModal()" class="fa fa-fw fa-pie-chart">Areas</i>
                  </span>
                  
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
			<!--</a>-->
            </div><!-- /.col -->         
          </div><!-- /.row -->
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Flujo de los tramites (Capturados en el dia en gris y los recibidos en azul)</li>
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
										$arrayAnio = array('2015'=>'2015',
															'2016' =>'2016');
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
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Flujo de los tramites entrantes vs finalizados</li>
                </ul>
                <div class="tab-content no-padding">
                	<div id="myChartFinalizados" style="width:100%; height:400px;"></div>                	
                </div>
              </div>
	  </section>
</div><!-- /.content-wrapper -->
<!-- VENTANA Modal PARA MOSTRAR EL % DE CUMPLIMIENTO A NIVEL AREA, SE MUESTRA CUANDO SE LE DA CLIC AL BOTON DE GRAFICO -->
<div class="modal fade" id="graficoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Gráfico de cumplimiento</h4>
      </div>
       <div class="modal-body">
      	<div class="row">
      		<div class="col-md-12">
				<!-- <canvas id="chartCumpimiento"></canvas> -->
				<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto;"></div>
			</div>
			<!-- <div class="col-md-5" id="tablaColoresCumplimiento"> -->
			<!-- </div> -->
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<?php include("../footer.php"); ?>
 <!-- Main Footer -->
</div><!-- ./wrapper -->
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
        <!-- Chart JS -->
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
    <script>
      $(function (){
      	/* Si no elejimos que fecha de inicio y termino queremos, por defecto traera las del mes actuales desde el primer dia
      	 hasta el ultimo segun sea el mes actuals*/
      	llenaGraficoUno();    
      	setTimeout(function() { llenaGraficoD();}, 1000);
		/* Traducciones de HighCharts al español*/      	
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
        $("#tblFullCaracteristicas").DataTable();
	  });
    </script>
    <script>
    	function recargarGraficoUno(){
    		llenaGraficoUno();
    	}
    	
    	function recargarGraficoDos(){
    		llenaGraficoDos();
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
        	url: "../getFlujoTramitePersonalizado.php",
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
      	var arrayTramitesNum = new Array();
      	
      	var arrayDias2 = new Array();
      	var arrayTramites2 = new Array();
      	
      	var fechaInicio = "<?php echo $GLOBALS['labelFechaInicial']; ?>";
      	var fechaTermino = "<?php echo $GLOBALS['labelFechaTermino']; ?>";
      	
		var i = 0;
      	for(var key in data2){
      		/* Algunas fechas dan null en un arreglo mienstras que en el otro no, el if es para detectar esos nulls*/
      	    if (data2[key].fechaRecibido == null) { 
      	 		arrayDias[i] = data2[key].fechaCaptura;
      	 	} else {
      	 		arrayDias[i] = data2[key].fechaRecibido;
      	 	}
      
      		var num = isNaN(parseInt(data2[key].noTramiteCapturados)) ? 0 : parseInt(data2[key].noTramiteCapturados)
			arrayTramites[i] = num;
			
			var num2 = isNaN(parseInt(data2[key].noTramiteRecibidos)) ? 0 : parseInt(data2[key].noTramiteRecibidos)
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
            name: 'Tramites capturados',
            data: arrayTramites
        }, {
            name: 'Tramites recibidos',
            data: arrayTramites2
        }]
    });
}

		function llenaGraficoD(){
		/*
        	AJAX QUE RELLENA EL GRAFICO DE LOS TRAMITES ENTRANTES CONTRA LOS FINALIZADOS
        */
        var fechaInicio = "<?php echo $GLOBALS['fechaInicial']; ?>";
      	var fechaTermino = "<?php echo $GLOBALS['fechaTermino']; ?>";
      	
        
        $.ajax({
        	data: { "fechaInicio" : fechaInicio, "fechaTermino" : fechaTermino},
        	type: "POST",
        	dataType: "json",
        	url: "../getFlujoTramiteEntranteVsFinalizados.php",
        })
        .done(function(data, textStatus, jqXHR){
        	if(console && console.log){
        		console.log("La solicitud se ha completado correctamente");
        	}
        	llenaGraficoDos(data);
        })
        .fail(function(jqXHR, textStatus, errorThrown){
        	if(console && console.log){
        		console.log("La solicitud ha fallado " + textStatus + " " + errorThrown);
        		recargarGraficoDos();
        	}
        });
}
        
        function llenaGraficoDos(data2){
        console.log(data2);
        
        var fechaInicio = "<?php echo $GLOBALS['labelFechaInicial']; ?>";
      	var fechaTermino = "<?php echo $GLOBALS['labelFechaTermino']; ?>";
      	
      	var arrayDias = new Array();
      	var arrayTramites = new Array();
      	
      	var arrayDias2 = new Array();
      	var arrayTramites2 = new Array();
      	
		var i = 0;
      	for(var key in data2){
      		
      	 	if (data2[key].fechaRecibido == null) { 
      	 		arrayDias[i] = data2[key].fechaFinalizados;
      	 	} else {
      	 		arrayDias[i] = data2[key].fechaRecibido;
      	 	}
      		
      		var num = isNaN(parseInt(data2[key].noTramiteFinalizados)) ? 0 : parseInt(data2[key].noTramiteFinalizados)
			arrayTramites[i] = num;
			
			var num2 = isNaN(parseInt(data2[key].noTramiteRecibidos)) ? 0 : parseInt(data2[key].noTramiteRecibidos)
			arrayTramites2[i] = num2;
			i++;
      	}        
      	
      	$('#myChartFinalizados').highcharts({
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
            data: arrayTramites
        }, {
            name: 'Tramites recibidos',
            data: arrayTramites2
        }]
    });	
}
	
		function llenaGraficoModal(){
		/*	Ajax para rellenar el grafico de % de cumplimiento a nivel area*/
        var fechaInicio = "<?php echo $GLOBALS['fechaInicial']; ?>";
      	var fechaTermino = "<?php echo $GLOBALS['fechaTermino']; ?>";
        $.ajax({
        	data: { "fechaInicio" : fechaInicio, "fechaTermino" : fechaTermino},
        	type: "POST",
        	dataType: "json",
        	url: "../getFlujoTramiteFinalizadoPorArea.php",
        })
        .done(function(data, textStatus, jqXHR){
        	if(console && console.log){
        		console.log("La solicitud se ha completado correctamente");
        		setGraficoPay(data);
        	}
        	
        })
        .fail(function(jqXHR, textStatus, errorThrown){
        	if(console && console.log){
        		console.log("La solicitud ha fallado " + textStatus + " " + errorThrown);
        		alert("Algo ha fallado " + textStatus + " " + errorThrown);
        	}
        }); /* Fin de Ajax*/
} /* Fin de llenaGraficoTres*/ 	

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
			setTimeout(function() { llenaGraficoModal();}, 200);
		}
		
		function setGraficoPay(data){
		setTimeout(function() {
		console.log(data);
		var datas = [];
		i=0;
		for(var k in data){
			var aux = parseFloat(data[k].NUM_TRAMITES);
			var yAux = parseFloat( ( aux / <?php echo $TER; ?> ) * 100 );
			var serie = new Object();
			serie.name = data[k].vc_departamento;
			serie.y = yAux;
			serie.drilldown = data[k].vc_departamento;
			datas.push(serie);
		}
		// objConfig.data = arrayDatos;
		// arrData[0] = objConfig;
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
            // [{
                // name: 'Microsoft Internet Explorer',
                // y: 56.33,
                // drilldown: 'Microsoft Internet Explorer'
            // }, {
                // name: 'Chrome',
                // y: 24.03,
                // drilldown: 'Chrome'
            // }]
        }]
        // usaremos el drilldown por si se quiere mostrar un desplegado de los tramites
        // drilldown: { 
            // series: [{
                // name: 'Microsoft Internet Explorer',
                // id: 'Microsoft Internet Explorer',
                // data: [
                    // ['v11.0', 24.13],
                    // ['v8.0', 17.2],
                    // ['v9.0', 8.11],
                    // ['v10.0', 5.33],
                    // ['v6.0', 1.06],
                    // ['v7.0', 0.5]
                // ]
            // }, {
                // name: 'Chrome',
                // id: 'Chrome',
                // data: [
                    // ['v40.0', 5],
                    // ['v41.0', 4.32],
                    // ['v42.0', 3.68],
                    // ['v39.0', 2.96],
                    // ['v36.0', 2.53],
                    // ['v43.0', 1.45],
                    // ['v31.0', 1.24],
                    // ['v35.0', 0.85],
                    // ['v38.0', 0.6],
                    // ['v32.0', 0.55],
                    // ['v37.0', 0.38],
                    // ['v33.0', 0.19],
                    // ['v34.0', 0.14],
                    // ['v30.0', 0.14]
                // ]
            // }]
        // }
    	}); // Fin Chart
	}, 200);
		}
   </script>
  </body>
</html>