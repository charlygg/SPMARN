<?php
session_start();
if(!isset($_SESSION["session_username"])){
	header("location:../../login.php?msg=errort");
}
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
        <a href="index2.html" class="logo">
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
					
					$mysqli = new mysqli($servidor, $user, $passwd, $database);
                  	
					if (!$mysqli){
  						die ("Error en la conexion con el servidor de bases de datos: " . mysql_error());
					}
										/* LO enviamos sin argumentos, son todos los tramites desde el inicio*/
					$resultado = $mysqli->query("call testsecurity.sp_reporte_tramites_generico(8,'0000-00-00','0000-00-00')") or die ($mysqli->error.__LINE__);
					$i2 = 0;
					$arrayTramites2 = array();
					
					while($k = mysqli_fetch_array($resultado)){
						
						// Esta es la fecha de incio del tramite
						$auxFechaInicio  = $k['REP_FECHA_INICIO_TRAMITE'];
						// la fecha del dia que se inicio el tramite en unix time
						$unixFechaInicio = strtotime($auxFechaInicio);
						// el dia de hoy en unix time
						
						$unixHoy = time();
						$formattedHOY = date('Y-m-d', $unixHoy);
						// los dias del tramite son 20
						
						
						//semana pasada
						$semanaPasada = strtotime('-7 day', strtotime($formattedHOY));

						$fechaVencimiento = sumarDiasTramite($unixFechaInicio,20);
						$fechaV = str_replace('/', '-', $fechaVencimiento);
						$formattedFechaVencimiento = date('Y-m-d', strtotime($fechaV));
						$unixFechaVencimiento = strtotime($formattedFechaVencimiento);
						
						/* Si la fecha de vencimiento es menor (anterior) a la fecha de hoy*/
						/* Fecha de vencimiento a una semana de hoy */
						if( ($unixFechaVencimiento > $unixHoy) && ($unixFechaVencimiento < $semanaPasada)){
							$i2 = $i2 + 1;
							$arrayTramiteIndividual2 = array(
								"no_tramite" => $k['NO_TRAMITE'],
								"tramite" => $k['TRAMITE'],
								"empresa" => $k['EMPRESA'],
								"asunto" => $k['ASUNTO'],
								"turnado" => $k['TURNADO_A'],
								"inicio_tramite" => $auxFechaInicio,
								"fecha_vencimiento" => $fechaVencimiento					
							);
							$arrayTramites2[] = $arrayTramiteIndividual2;
							} else {
								/* Se deja pasar, el tramite esta vigente aun*/
							}
						}
					
					mysqli_close($mysqli); 
                  ?>
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">40</span>
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
                          		<i class="fa fa-warning text-yellow"></i>No.  '.$t['no_tramite'].' , '.$t['tramite'].'
                        	</a>
                      		</li>
                    		';
                    	}
                    	
                    	?>
                     
                      <li>
                    </ul>
                  </li>
                  <li class="footer"><a href="tramites/tramites_urgentes.php">Ver todos los tramites</a></li>
                </ul>
              </li>
              	<!----------------------------------------------- FIN DE LAS NOTIFICACIONES------------------------------------->
                <!----------------------------------------------- TRAMITES VENCIDOS   ----------------------------------------->
              
                  <?php
					
					$mysqli = new mysqli($servidor, $user, $passwd, $database);
                  	
					if (!$mysqli){
  						die ("Error en la conexion con el servidor de bases de datos: " . mysql_error());
					}
										/* LO enviamos sin argumentos, son todos los tramites desde el inicio*/
					$resultado = $mysqli->query("call testsecurity.sp_reporte_tramites_generico(8,'0000-00-00','0000-00-00')") or die ($mysqli->error.__LINE__);
					$i = 0;
					while($k = mysqli_fetch_array($resultado)){
						// Esta es la fecha de incio del tramite
						$auxFechaInicio  = $k['REP_FECHA_INICIO_TRAMITE'];
						// la fecha del dia que se inicio el tramite en unix time
						$unixFechaInicio = strtotime($auxFechaInicio);
						// el dia de hoy en unix time
						
						$unixHoy = time();
						$formattedHOY = date('Y-m-d', $unixHoy);
						// los dias del tramite son 20

						$fechaVencimiento = sumarDiasTramite($unixFechaInicio,20);
						$fechaV = str_replace('/', '-', $fechaVencimiento);
						$formattedFechaVencimiento = date('Y-m-d', strtotime($fechaV));
						$unixFechaVencimiento = strtotime($formattedFechaVencimiento);
						
						/* Si la fecha de vencimiento es menor (anterior) a la fecha de hoy*/
						if($unixFechaVencimiento < $unixHoy){
							$i = $i + 1;
						/* EL tramite esta vencido*/
							$arrayTramiteIndividual = array(
								"no_tramite" => $k['NO_TRAMITE'],
								"tramite" => $k['TRAMITE'],
								"empresa" => $k['EMPRESA'],
								"asunto" => $k['ASUNTO'],
								"turnado" => $k['TURNADO_A'],
								"inicio_tramite" => $auxFechaInicio,
								"fecha_vencimiento" => $fechaVencimiento					
							);
							$arrayTramites[] = $arrayTramiteIndividual;
							} else {
								/* Se deja pasar, el tramite esta vigente aun*/
							}
						}
					
					mysqli_close($mysqli); 
                  ?>
              
              
              
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
                      
                      <!--<li> Task item 
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>-->
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
                      <a href="../../../myprofilesettings.php" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="../../../logoutsession.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
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
              <span class="input-group-btn">value
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Inicio</span></a></li>
            <li><a href="empresas.php"><i class="fa fa-link"></i> <span>Empresas y Sucursales</span></a></li>
            <!--<li><a href="tramites.php"><i class="fa fa-link"></i><span>Tramites</span></a></li>-->
            
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Menu trámites</span> <i class="fa fa-angle-left pull-right"></i></a>
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
           /* Funcion que nos permite obtener el ultimo dia en numero del mes x del año y, contando bisiestos*/
           	function getUltimoDiaMes($elAnio,$elMes) {
 		 		return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
			}
			/* Obtencion de los totales de los tramites*/
			/* 
			 * Comprobaremos primero si hemos mandado parametros de la URL para buscar otro periodo de fechas en lugar del mes actual con un if
			 * SI es metodo uno es seleccion de mes
			 * SI es metodo dos es seleccion por fecha
			 * SI NO 
			 * */
			 	/* Seleccion de fecha personalizada*/
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
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <!--<li class="active">Here</li>-->
          </ol>
        </section>

        <!-- Main content -->
        <!-- Your Page Content Here -->
        <section class="content">
        	<!--
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Bookmarks</span>
                  <span class="info-box-number">41,410</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
                </div><!-- /.info-box-content --
              </div><!-- /.info-box 
            </div><!-- /.col 
        </div>-->
		<?php
		 
		 /*
		echo $_SESSION['session_idusername']."<br>";
		echo $_SESSION['session_nombre']."<br>";
	 	echo $_SESSION['session_apPat']."<br>";
		echo $_SESSION['session_apMat']."<br>";
		echo $_SESSION['session_username']."<br>"; 
		echo $_SESSION['session_email']."<br>";
		echo $_SESSION['session_role']."<br>";
		echo $_SESSION['session_enabled']."<br>";
		echo "<p>Informacion del departamento</p>";
		echo $_SESSION['session_user_depto_id']."<br>";
		echo $_SESSION['session_user_depto_nombre']."<br>";
		echo $_SESSION['session_user_depto_descripcion']."<br>";
		echo $_SESSION['session_user_depto_role']."<br>";
		  
		  */
		?>		
		
		<?php
		/* Obtencion de los totales de los tramites*/
		require('../../db_connect.php');
		
		$aux = basename($_SERVER['REQUEST_URI']);
		$arrayAux = explode("?",$aux);

		$urlParametros = $arrayAux[1];	
				
		
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
		mysqli_close($mysqli);
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
           	<a href="tramites/tramites_totales.php?<?php echo $urlParametros ?>" style="color: #000;">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">ENTRANTES DEL MES</span>
                  <span class="info-box-number"><?php echo $EN ?></span>
                  <span class="info-box-text">CUMPLIMIENTO</span>
                  <span class="info-box-number"><?php echo number_format(($TER/$EN)*100,2)." %";  ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
			</a>
            </div><!-- /.col -->         
          </div><!-- /.row -->
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Flujo de los tramites (Capturados en el dia en gris y los recibidos en azul)</li>
                </ul>
                <div class="tab-content no-padding">
                	<canvas id="myChart" width="500" style="position: relative; height: 400px;"></canvas>
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
						<!--
						<tr>
							<td><label style="padding-left: 10px;">O selecciona un rango de fecha</label></td>
							<td colspan="2">
								<div class="form-group">
									<div class="input-group">
                      					<div class="input-group-addon">
                        					<i class="fa fa-calendar"></i>
				                      	</div>
                      					<input type="text" class="form-control pull-right" id="rangoFecha">
                    				</div>
								</div>
							</td>
							<td>
								<div class="form-group">
									<button class="btn btn-block btn-success" onclick="setFechaDos()">Elegir</button>
								</div>
							</td>
						</tr>-->
					</table>
					
					
                </div>
                
              </div>
              
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Flujo de los tramites entrantes vs finalizados</li>
                </ul>
                <div class="tab-content no-padding">
                	<canvas id="myChartFinalizados" width="500" style="position: relative; height: 400px;"></canvas>
                </div>
                
              </div>
	  </section>
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Anything you want
        </div>
        <!-- Default to the left -->
        <strong>SPMARN &copy; 2015 <a href="#">Company</a>.</strong> All rights reserved.
      </footer>
</div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

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
    <script src="../../../plugins/chartjs/Chart.js"></script>
        <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../../../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
    <script>
    /* Ajax y jQuery*/
      $(function () {
      	/* Si no elejimos que fecha de inicio y termino queremos, por defecto traera las del mes actuales desde el primer dia
      	 hasta el ultimo segun sea el mes*/
      	//Date range picker
      	llenaGraficoUno();    
      	setTimeout(function() { llenaGraficoDos();}, 1000);
      	
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
    		
    	$('#rangoFecha').daterangepicker();
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
        
        function llenaGrafico(data2){
        	
        console.log(data2);

      	var arrayDias = new Array();
      	var arrayTramites = new Array();
      	
      	var arrayDias2 = new Array();
      	var arrayTramites2 = new Array();
      	
		var i = 0;
      	for(var key in data2){
      		arrayDias[i] = data2[key].fechaCaptura;
			arrayTramites[i] = data2[key].noTramiteCapturados;
			arrayTramites2[i] = data2[key].noTramiteRecibidos;
			i++;
      	}        	
      	

      	var data = {
   		 labels: arrayDias,
    	datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: arrayTramites
        },
        {
            label: "Tramites entrantes",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: arrayTramites2
        }
    ]
};
        var ctx = document.getElementById("myChart").getContext("2d");
		var myNewChart = new Chart(ctx).Line(data, {
			responsive: true,
			scaleOverride : true,
        	scaleSteps : 8,
        	scaleStepWidth : 10,
        	scaleStartValue : 0
		});
        }
}
    
		function llenaGraficoDos(){
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
        
        function llenaGraficoDos(data2){
        	
        console.log(data2);

      	var arrayDias = new Array();
      	var arrayTramites = new Array();
      	
      	var arrayDias2 = new Array();
      	var arrayTramites2 = new Array();
      	
		var i = 0;
      	for(var key in data2){
      		arrayDias[i] = data2[key].fechaRecibido;
			arrayTramites[i] = data2[key].noTramiteFinalizados;
			arrayTramites2[i] = data2[key].noTramiteRecibidos;
			i++;
      	}        	
      	

      	var data = {
   		 labels: arrayDias,
    	datasets: [
        {
            label: "My Second dataset",
            fillColor: "rgba(243, 156, 18, 0.2)",
            strokeColor: "rgba(243, 156, 18, 1)",
            pointColor: "rgba(243, 156, 18, 1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(243, 156, 18, 1)",
            data: arrayTramites
        },
        {
            label: "Tramites entrantes",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: arrayTramites2
        }
    ]
};
        var ctx = document.getElementById("myChartFinalizados").getContext("2d");
		var myNewChart = new Chart(ctx).Line(data, {
			responsive: true,
			scaleOverride : true,
        	scaleSteps : 8,
        	scaleStepWidth : 10,
        	scaleStartValue : 0
		});
        }
			
		}    
    
    /* Funciones Javascript*/
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
 
   </script>
  </body>
</html>