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
    <link rel="stylesheet" href="../../../../plugins/yadcf-master/jquery.dataTables.yadcf.css" />
    
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../../plugins/datatables/dataTables.bootstrap.css">
    <!-- Export Plugin for Datatables -->
	<link rel="stylesheet" href="../../../../plugins/datatables/extensions/Export/datatables.min.css"/>
	
    <!-- FixedColumns fro Datatables -->
   <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../../../dist/css/skins/_all-skins.min.css"> 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Sobreescritura de los css para mejor personalizacion en la pagina-->
    <style type="text/css">
    	.yadcf-filter{
    		width: 100%;
    	}
    </style>
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
        <a class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A	</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Administración</b></span>
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
              	<?php	
					if(empty($_GET)){
						echo '<li><a href="tramites_nuevos.php">Trámites nuevos</a></li>';
						echo '<li><a href="tramites_proceso.php">Trámites en proceso</a></li>';
						echo '<li class="active"><a href="">Trámites finalizados</a></li>';
						echo '<li><a href="tramites_vencidos.php">Trámites vencidos</a></li>';
					} else{
						if(isset($_GET["anio"]) && isset($_GET['metodoSeleccionFecha']) && isset($_GET['mes'])){
							$urlParametros = "?metodoSeleccionFecha=".$_GET['metodoSeleccionFecha']."&anio=".$_GET['anio']."&mes=".$_GET['mes'];
							echo '<li><a href="tramites_nuevos.php'.$urlParametros.'">Trámites nuevos</a></li>';
							echo '<li><a href="tramites_proceso.php'.$urlParametros.'">Trámites en proceso</a></li>';
							echo '<li class="active"><a href="">Trámites finalizados</a></li>';
							echo '<li><a href="tramites_vencidos.php'.$urlParametros.'">Trámites vencidos</a></li>';
						}
					}
          		?>
              </ul>
            </li>
          </ul><!-- /.sidebar-menu -->
        </section>
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>

            Tramites Finalizados
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard -> </a> Trámites finalizados</li>
            <!--<li class="active">Here</li>-->
          </ol>
        </section>

        <!-- Main content -->
        <!-- Your Page Content Here -->
        <section class="content">
		<?php		  
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
                  <h3 class="box-title"><?php echo "Consulta de Tramites desde ".$labelFechaInicial." hasta ".$labelFechaTermino; ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  	<?php
					function getUltimoDiaMes($elAnio,$elMes) {
 						return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
					}
					
                  	/* Extrayendo el listado de catalogo empresas de la base de datos*/
                  	require('../../../db_connect.php');
					$mysqli = new mysqli($servidor, $user, $passwd, $database);
                  	
					if (!$mysqli){
  						die ("Error en la conexion con el servidor de bases de datos: " . mysql_error());
					}
										
					$arrayT = array();
					$arrayInformacion = array();
					$resultado = $mysqli->query("call testsecurity.sp_reporte_tramites_generico(7,'$fechaInicial','$fechaTermino')") or die ($mysqli->error.__LINE__);
	
					while($k = mysqli_fetch_array($resultado)){
							$arr = ($k['TURNADO_A']);
							$arrInfo = array(
								'NO_TRAMITE' => $k['NO_TRAMITE'],
								'TRAMITE' => $k['TRAMITE'],
								'TURNADO' => $k['TURNADO_A'],
								'EMPRESA' => $k['EMPRESA'],
								'ASUNTO' => $k['ASUNTO'],
								'FECHA_INICIO' => $k['REP_FECHA_INICIO_TRAMITE'],
								'FECHA_TERMINO' => $k['REP_FECHA_CIERRE_TRAMITE']
							);
							$arrayT[] = $arr;
							$arrayInformacion[] = $arrInfo;
					}
					$arrayT = array_unique($arrayT);
					mysqli_close($mysqli);
                  	?>
                   <table id="tblFullCaracteristicas" class="display table table-bordered table-striped">
                  	<thead>
                      <tr>
                        <th>No. Tramite</th>
                        <th>Tramite</th>
                        <th>Area</th>
                        <th>Empresa</th>
                        <th>Asunto</th>
                        <th>Recibido</th>
                        <th>Terminado</th>
                      </tr>
                    </thead>
                  <tbody>
                  <?php
                  	foreach($arrayInformacion as $I){
                  		echo "<tr>";
						echo "<td>$I[NO_TRAMITE]</td>";
						echo "<td>$I[TRAMITE]</td>";
						echo "<td>$I[TURNADO]</td>";
						echo "<td>$I[EMPRESA]</td>";
						echo "<td>$I[ASUNTO]</td>";
						echo "<td>$I[FECHA_INICIO]</td>";
						echo "<td>$I[FECHA_TERMINO]</td>";
						echo "</tr>";
                  	}
                  	?>
                   </tbody>
                  </table>
                </div><!-- /.box-body -->
        	</div>
		</section><!-- /.content -->
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
    <!-- FixedColumn Datatable, para establecer la tabla que no se mueva -->
    <!-- Yatch -->
    <script src="../../../../plugins/yadcf-master/jquery.dataTables.yadcf.js"></script>
    <!-- Table Export Plugin for Datatable-->
    <script src="../../../../plugins/datatables/extensions/Export/datatables.min.js"></script>
	    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
    <script>
    $(document).ready(function(){
			
		var table = $('#tblFullCaracteristicas').dataTable({
			         "processing": true,
         			 "dom": 'lBfrtip',
        "buttons": [
            {
                extend: 'collection',
                text: 'Exportar',
                buttons: [
                    'excel',
                    'csv'
                ]
            }
        ]
		}).yadcf([
   	   	  {column_number : 1},
  		  {column_number : 2},
  		  {column_number : 3}
  		  ]);
		$('#contain2er').css( 'display', 'block');
	});
    </script>
  </body>
</html>