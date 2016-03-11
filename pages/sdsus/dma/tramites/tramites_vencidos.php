<?php
session_start();
if(!isset($_SESSION["session_username"])){
	header("location:../../../../login.php?msg=errort");
}
date_default_timezone_set("America/Monterrey");
set_time_limit(0);
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
   <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../../../dist/css/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
              <a href="#"><i class="fa fa-link"></i><span>Menu trámites</span> <i class="fa fa-angle-left pull-right "></i></a>
              <ul class="treeview-menu">
                <li><a href="tramites_nuevos.php">Trámites nuevos</a></li>
                <li><a href="tramites_proceso.php">Trámites en proceso</a></li>
                <li><a href="tramites_finalizados.php">Trámites finalizados</a></li>
                <li><a href="tramites_finalizados.php">Trámites urgentes</a></li>
                <li class="active"><a href="#">Trámites vencidos</a></li>
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
            Trámites vencidos
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard -> </a>Trámites vencidos</li>
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
                  <h3 class="box-title">Consulta de Tramites</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                	<button class="btn btn-primary btn-lg" onclick="getFilasYColumnas()">Exportar a Excel</button>
                  <table id="tblFullCaracteristicas" class="table table-bordered table-striped">
                  	<thead>
                      <tr>
                        <th>No. Tramite</th>
                        <th>Tramite</th>
                        <th>Area</th>
                        <th>Empresa</th>
                        <th>Asunto</th>
                        <th>Inicio tramite</th>
                        <th>Vencimiento</th>
                        <th>Dias tramite</th>
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
					include('../contarDias.php');
					$mysqli = new mysqli($servidor, $user, $passwd, $database);
                  	
					if (!$mysqli){
  						die ("Error en la conexion con el servidor de bases de datos: " . mysql_error());
					}
										
					$resultado = $mysqli->query("call testsecurity.sp_reporte_tramites_generico(8,'0000-00-00','0000-00-00')") or die ($mysqli->error.__LINE__);
					
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
						
						if(($unixHoy - (2 * 3600 * $horasDelDia)) > ($unixVencimientoTramite)){
							echo "<tr>";
							echo "<td>".$k['NO_TRAMITE']."</td>";
							echo "<td>".$k['TRAMITE']."</td>";
							echo "<td>".$k['TURNADO']."</td>";
							echo "<td>".$k['EMPRESA']."</td>";
							echo "<td>".$k['ASUNTO']."</td>";
							echo "<td>".$fechaInicioTramiteddMMYY."</td>";
							echo "<td>".$conteoDias."</td>";
							echo "<td>".$diasTramite."</td>";
							echo "</tr>";						
						}
					}
					mysqli_close($mysqli);
                  	?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
        </div>
		</section><!-- /.content -->
		</section>
      <div class="control-sidebar-bg"></div>
      </div><!-- /.content-wrapper -->
      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Anything you want
        </div>
        <!-- Default to the left -->
        <strong>SPMARN &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
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
    <!-- Table Export Plugin for Datatable-->
    <script src="../../../../plugins/datatables/extensions/Export/datatables.min.js"></script>  
    <!-- DataTables -->
    <script src="../../../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Yatch -->
    <script src="../../../../plugins/yadcf-master/jquery.dataTables.yadcf.js"></script>
       	<!-- Sort Date dd/mm/YYYY -->
   	<script src="../../../../plugins/datatables/extensions/dataTables.dateFormat.js"></script>  
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
    <script>
      $(function () {
        $("#tblFullCaracteristicas").dataTable({
        	 "bProcessing": true,
			"aoColumns": [
				null,
				null,
				null,
				null,
				null,
				{ "sType": "eu_date" },
				{ "sType": "eu_date" },
				null
			]
		}).yadcf([
		{column_number : 1}, /* Columnas donde queremos aplicar un filtro em combobox*/
		{column_number : 2},
		{column_number : 3}
		]);
      });
      
      	function getFilasYColumnas(){
		var table = $('#tblFullCaracteristicas').DataTable();
		var info = table.page.info();
		var numOfPages = info.pages;
		var arrTodos = new Array();
		var arrEncabezado = new Object();
		
		arrEncabezado['Encabezado1'] = 'Num. de Tramite';
		arrEncabezado['Encabezado2'] = 'Tramite';
		arrEncabezado['Encabezado3'] = 'Area';
		arrEncabezado['Encabezado4'] = 'Empresa';
		arrEncabezado['Encabezado5'] = 'Asunto';
		arrEncabezado['Encabezado6'] = 'Fecha de Recibido';
		arrEncabezado['Encabezado7'] = 'Fecha de finalización';
		arrEncabezado['Encabezado8'] = 'Dias tramite';
		
		for(var i = 0; i < numOfPages; i++){
		table.page(i).draw('page');	
		console.log("Se ha cambiado a la pagina numero " + (i+1));
		$('#tblFullCaracteristicas tbody tr').each(function(index){
		var arrT = new Object();
		/* Convertir la informacion existente en la datatable filtrada o no en un JSON para enviar a reportes.php */
		$(this).children("td").each(function(index2){
			switch(index2){
					case 0: arrT['NO_TRAMITE'] = $(this).text();
					break;
					
					case 1: arrT['TRAMITE'] = $(this).text();
					break;
					
					case 2: arrT['AREA'] = $(this).text();
					break;
					
					case 3: arrT['EMPRESA'] = $(this).text();
					break;
					
					case 4: arrT['ASUNTO'] = $(this).text();
					break;
					
					case 5: arrT['FECHA_RECIBIDO'] = $(this).text();
					break;
					
					case 6: arrT['FECHA_TERMINADO'] = $(this).text();
					break;
					
					case 7: arrT['DIAS_TRAMITE'] = $(this).text();
					break;
				}
			});
			arrTodos.push(arrT);
		});
		}
		
		var arrTodo = new Array();
		
		arrTodo[0] = arrEncabezado;
		arrTodo[1] = arrTodos;
		
		var jsonTodo = JSON.stringify(arrTodo);
		
		console.log(jsonTodo);
		
		/* Se enviara la informacion en un form oculto*/
		var form = document.createElement("form");
		form.setAttribute('method', 'post');
		form.setAttribute('action', 'reportes.php');
		
		var hiddenField = document.createElement("input");
   		hiddenField.setAttribute("type", "hidden");
	    hiddenField.setAttribute("name", "jsonValues");
	    hiddenField.setAttribute("value", jsonTodo);
	    form.appendChild(hiddenField);

	    document.body.appendChild(form);
    	form.submit();
	}
    </script>
  </body>
</html>