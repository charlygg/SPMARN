<?php
session_start();
if(!isset($_SESSION["session_username"])){
	header("location:../../../../login.php?msg=errort");
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
    <link rel="stylesheet" href="../../../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../../dist/css/AdminLTE.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../../plugins/datatables/dataTables.bootstrap.css">
   <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../../../dist/css/skins/_all-skins.min.css">

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
                       - <?php echo $_SESSION['session_user_depto_nombre']; ?><!--
                      <small>Member since Nov. 2012</small> -->
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="../../../../myprofilesettings.php" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="../../../../logoutsession.php" class="btn btn-default btn-flat">Sign out</a>
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
            <li><a href="../dashboard.php"><i class="fa fa-link"></i> <span>Inicio</span></a></li>
            <li class="treeview"><a href="../empresas.php"><i class="fa fa-link"></i> <span>Empresas y Sucursales</span></a></li>
            <li class="treeview active">
              <a href="#"><i class="fa fa-link"></i> <span>Menu trámites</span> <i class="fa fa-angle-left pull-right "></i></a>
              <ul class="treeview-menu">
                <li class="active"><a href="tramites_nuevos.php">Trámites nuevos</a></li>
                <li><a href="tramites_proceso.php">Trámites en proceso</a></li>
                <li><a href="#">Trámites finalizados</a></li>
              </ul>
            </li>
            <!--            
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#">Link in level 2</a></li>
                <li><a href="#">Link in level 2</a></li>
              </ul>
            </li>-->
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pagina principal
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <!--<li class="active">Here</li>-->
          </ol>
        </section>

        <!-- Main content -->
        <!-- Your Page Content Here -->
        <section class="content">
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
					 }
		?>		
       	        <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Listado de Empresas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
				<p>Listado de tramites en estado finalizados</p>
                  <table id="tblFullCaracteristicas" class="table table-bordered table-striped">
                  	<thead>
                      <tr>
                        <th>No. Tramite</th>
                        <th>Fecha de Ingreso</th>
                        <th>Empresa</th>
                        <th>Asunto	</th>
                        <th>Turnado A</th>
                        <th>Inicio tramite</th>
                        <th>Vencimiento</th>
                      </tr>
                    </thead>
                  	<tbody>
                  	<?php
					function getUltimoDiaMes($elAnio,$elMes) {
 						return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
					}
					
                  	/* Extrayendo el listado de catalogo empresas de la base de datos*/
                  	require('../../../db_connect.php');
                  	include('../calendarioFestivo.php');
					$mysqli = new mysqli($servidor, $user, $passwd, $database);
                  	
					if (!$mysqli){
  						die ("Error en la conexion con el servidor de bases de datos: " . mysql_error());
					}
					echo "<h4>Tramites del mes</h4>";
										
					$resultado = $mysqli->query("call testsecurity.sp_reporte_tramites_generico(8,'0000-00-00','0000-00-00')") or die ($mysqli->error.__LINE__);
					
					while($k = mysqli_fetch_array($resultado)){
						// Esta es la fecha de incio del tramite
						$auxFechaInicio  = $k['REP_FECHA_INICIO_TRAMITE'];
						$auxFechaInicioLabel = str_replace('-', '/', $auxFechaInicio);
						$auxFechaInicioLabel = date('d/m/Y', strtotime($auxFechaInicioLabel));
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
						/* EL tramite esta vencido*/
						$arrayTramiteIndividual = array(
								"no_tramite" => $k['NO_TRAMITE'],
								"tramite" => $k['TRAMITE'],
								"empresa" => $k['EMPRESA'],
								"asunto" => $k['ASUNTO'],
								"turnado" => $k['TURNADO_A'],
								"inicio_tramite" => $auxFechaInicioLabel,
								"fecha_vencimiento" => $fechaVencimiento					
						);
						$arrayTramites[] = $arrayTramiteIndividual;
						} else {
							/* Se deja pasar, el tramite esta vigente aun*/
						}

					}
							
					    foreach($arrayTramites as $k){
							echo "<tr>";
							echo "<td>".$k['no_tramite']."</td>";
							echo "<td>".$k['tramite']."</td>";
							echo "<td>".$k['empresa']."</td>";
							echo "<td>".$k['asunto']."</td>";
							echo "<td>".$k['turnado']."</td>";
							echo "<td>".$k['inicio_tramite']."</td>";
							echo "<td>".$k['fecha_vencimiento']."</td>";
							echo "</tr>";
                    	}
					
					mysqli_close($mysqli);
                  	?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
        </div>
		</section><!-- /.content -->
        
		</section>
		
		      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
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

    <!-- jQuery 2.1.4 -->
    <script src="../../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../../../bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../../dist/js/app.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../../../plugins/fastclick/fastclick.min.js"></script>    
    <!-- DataTables -->
    <script src="../../../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../../plugins/datatables/dataTables.bootstrap.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
    <script>
      $(function () {
        $("#tblFullCaracteristicas").DataTable();
      });
    </script>
  </body>
</html>