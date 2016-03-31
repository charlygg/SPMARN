<?php
session_start();
if(!isset($_SESSION["session_username"])){
	header("location:../../../login.php?msg=errort");
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
    <!-- Select2-->
    <link rel="stylesheet" href="../../../plugins/select2/select2.min.css">
        <!-- daterange picker -->
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="../../../dist/css/skins/skin-blue.min.css">
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
              <!-- Notifications Menu -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li><!-- end notification -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks Menu -->
              <li class="dropdown tasks-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- Inner menu: contains the tasks -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <!-- Task title and progress text -->
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <!-- The progress bar -->
                          <div class="progress xs">
                            <!-- Change the css width attribute to simulate progress -->
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="../../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $_SESSION['session_nombre']." ".$_SESSION['session_apPat']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="../../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p><?php echo $_SESSION['session_nombre']." ".$_SESSION['session_apPat']; ?>
                       - <?php echo $_SESSION['session_user_depto_nombre']; ?><!--
                      <small>Member since Nov. 2012</small> -->
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
              <img src="../../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
          <?php
          /* Creacion de un menu personalizado segun el departamento*/
			
          ?>
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Inicio</span></a></li>
            <li><a href="captura_recibos_correspondencia.php"><i class="fa fa-link"></i> <span>Captura de Recibos</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#">Link in level 2</a></li>
                <li><a href="#">Link in level 2</a></li>
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
          <h1>Captura de comprobantes de Pago</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <!--<li class="active">Here</li>-->
          </ol>
        </section>

        <!-- Main content -->
        <!-- Your Page Content Here -->             
        <section class="content">
        <div class="box">
                <div class="box-header with-border">
                  <h2 class="box-title" style="font-weight: 600;">Datos de la empresa</h2>
                </div><!-- /.box-header -->
                <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <p>Empresas</p>
                    <select id="cmbEmpresas" class="form-control select2" style="width: 100%;" onchange="seleccionarEmpresa(this)" onkeyup="seleccionarEmpresa(this)" onkeydown="seleccionarEmpresa(this)" onkeypress="seleccionarEmpresa(this)">
                    	<option value="0" selected="selected">Seleccione una empresa</option>
                    	<?php
                  		/* Extrayendo el listado de catalogo empresas de la base de datos*/
                  		require('../../db_connect.php');
						$mysqli = new mysqli($servidor, $user, $passwd, $database);
                  	
						if (!$mysqli){
  							die ("Error en la conexion con el servidor de bases de datos: " . mysql_error());
						}

						$resultado = $mysqli->query("call ingresos2015.sp_consultat_perfilempresa()");
					
						while($k = mysqli_fetch_array($resultado)){
							echo '<option value="'.$k['idcatalogo_perfilempresa'].'">'.$k['nombreEmpresa'].'</option>';
						}
						$mysqli->close();                    	
                    	?>
                    </select>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <p>Sucursales</p>
                    <select class="form-control select2" style="width: 100%;" id="cmbSucursales" onchange="seleccionarSucursal(this)" onkeyup="seleccionarSucursal(this)" onkeydown="seleccionarSucursal(this)" onkeypress="seleccionarSucursal(this)">
                      <option value="0" selected="selected">Seleccione una sucursal</option>
                    </select>
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
              </div><!-- /.row -->
              <hr/>
              <form class="form-horizontal">
                <div class="box-body">
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <p for="inputRepLegal" class="col-sm-2 control-label">Rep. Legal</p>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="repLegal" disabled="true" />
                    </div>
				  </div>
				</div><!-- div class col md 6-->
				</div><!-- div class row -->
				
				<div class="row">
				  <div class="col-md-6">
				  	<div class="form-group">
                    	<p for="inputRepLegal" class="col-sm-2 control-label">Calle</p>
                    	<div class="col-sm-10">
                    		<input type="text" class="form-control" id="calle" disabled="true"/>
                    	</div>
				  	</div><!-- div class form group -->
				  </div><!-- div class col-md-9 -->
				  
				  <div class="col-md-6">
				  	<div class="form-group">
                    	<p for="inputRepLegal" class="col-sm-3 control-label">No. Ext.</p>
                    	<div class="col-sm-9">
                    		<input type="text" class="form-control" id="noExt" disabled="true" />
                    	</div>
				  	</div><!-- div class form group -->
				  </div><!-- div class col-md-3 -->
				</div><!-- div class row -->
				
				<div class="row">
				  <div class="col-md-6">
				  	<div class="form-group">
                    	<p for="inputRepLegal" class="col-sm-2 control-label">Colonia</p>
                    	<div class="col-sm-10">
                    		<input type="text" class="form-control" id="colonia" disabled="true"/>
                    	</div>
				  	</div><!-- div class form group -->
				  </div><!-- div class col-md-9 -->
				  
				  <div class="col-md-6">
				  	<div class="form-group">
                    	<p for="inputRepLegal" class="col-sm-3 control-label">No. Int.</p>
                    	<div class="col-sm-9">
                    		<input type="text" class="form-control" id="noInt" disabled="true" />
                    	</div>
				  	</div><!-- div class form group -->
				  </div><!-- div class col-md-3 -->
				</div><!-- div class row -->
				
				<div class="row">
				  <div class="col-md-6">
				  	<div class="form-group">
                    	<p for="inputRepLegal" class="col-sm-2 control-label">Municipio</p>
                    	<div class="col-sm-10">
                    		<input type="text" class="form-control" id="municipio" disabled="true" />
                    	</div>
				  	</div><!-- div class form group -->
				  </div><!-- div class col-md-9 -->
				  
				  <div class="col-md-6">
				  	<div class="form-group">
                    	<p for="inputRepLegal" class="col-sm-3 control-label">Teléfono</p>
                    	<div class="col-sm-9">
                    		<input type="text" class="form-control" id="telefono"  disabled="true"/>
                    	</div>
				  	</div><!-- div class form group -->
				  </div><!-- div class col-md-6-->
				</div><!-- div class row -->
				<hr>
				<h4 class="box-title" style="font-weight: 600;">Trámite a Facturar</h4>
				
				<div class="row">
				  <div class="col-md-6">
				  	<div class="form-group">
						<div class="col-sm-2">
							<p for="inputRepLegal" class="control-label">No.</p>
						</div>				  		
                    	<div class="col-sm-10">
                    		<input type="text" class="form-control" id="noTramite" disabled="true" />
                    	</div>
				  	</div><!-- div class form group -->
				  </div><!-- div class col-md-6 -->
				  
				  <div class="col-md-6">
				  	<div class="form-group">
				  		<div class="col-md-6"><input type="button" id="btnAgregarNoTramite" class="btn btn-success" disabled="true" value="Agregar No. Tramite"/></div>
				  		<div class="col-md-6"><input type="button" id="btnAgregarTramite" class="btn btn-success" disabled="true" data-toggle="modal" data-target="#tramitesModal" value="Agregar Tramite" onclick="busquedaTramites()"/></div>
				  	</div><!-- div class form group -->
				  </div><!-- div class col-md-6 -->
				</div><!-- div class row -->
				
				<div class="row">
				  <div class="col-md-6">
				  	<div class="form-group">
						<div class="col-sm-2">
							<p for="inputRepLegal" class="control-label">Trámite</p>
						</div>				  		
                    	<div class="col-sm-10">
                    		<input type="text" class="form-control" id="tramite" />
                    	</div>
				  	</div><!-- div class form group -->
				  </div><!-- div class col-md-12 -->
				</div><!-- div class row -->
				<hr>
				<h4 class="box-title" style="font-weight: 700;">Concepto de Pago</h4>
				
				<div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <p for="inputRepLegal" class="col-sm-1 control-label">Servicio</p>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;">
                    		<option>Opcion uno</option>
                    	</select>
                    </div>
				  </div>
				</div>
				</div><!-- div class row -->

				<div class="row">
				  <div class="col-md-6">
				  	<div class="form-group">
                    	<p for="inputRepLegal" class="col-sm-2 control-label">Precio</p>
                    	<div class="col-sm-10">
                    		<input type="text" class="form-control" id="precio" />
                    	</div>
				  	</div><!-- div class form group -->
				  </div><!-- div class col-md-9 -->
				  
				  <div class="col-md-6">
				  	<div class="form-group">
                    	<p for="inputRepLegal" class="col-sm-3 control-label">Folio</p>
                    	<div class="col-sm-9">
                    		<input type="text" class="form-control" id="folio" />
                    	</div>
				  	</div><!-- div class form group -->
				  </div><!-- div class col-md-6-->
				</div><!-- div class row -->
				
				<div class="row">
				  <div class="col-md-6">
                  <div class="form-group">
                    <p>Fecha de Pago:</p>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input id="fechaPago" type="text" class="form-control col-sm-10" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->	
				  </div><!-- div class col-md-9 -->
				  <div class="col-md-6">
                  <div class="form-group">
                    <p>Fecha de Correspondencia:</p>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input id="fechaCorrepondencia" type="text" class="form-control col-sm-10" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->				  	
				  </div><!-- div class col-md-6-->
				</div><!-- div class row -->
				
				<div class="row">
				  <div class="col-md-6">
				  	<div class="form-group">
                    	<p for="inputRepLegal" class="col-sm-2 control-label">No. Factura</p>
                    	<div class="col-sm-10">
                    		<input type="text" class="form-control" id="noFactura" />
                    	</div>
				  	</div><!-- div class form group -->
				  </div><!-- div class col-md-9 -->
				  
				  <div class="col-md-6">
				  	<div class="form-group">
                    	<p for="inputRepLegal" class="col-sm-3 control-label">Caja</p>
                    	<div class="col-sm-9">
                    		<input type="text" class="form-control" id="caja" />
                    	</div>
				  	</div><!-- div class form group -->
				  </div><!-- div class col-md-6-->
				</div><!-- div class row -->
				
				<div class="row">
				  <div class="col-md-12">
				  	<div class="form-group">
				  		<div class="col-sm-3">
				  			<a class="btn btn-app">
                    			<i class="fa fa-plus-square"></i> Nuevo
                  			</a>	
				  		</div>
				  		<div class="col-sm-3">
				  			<a class="btn btn-app">
                    			<i class="fa fa-save"></i> Guardar
                  			</a>	
				  		</div>
				  		<div class="col-sm-3">
				  			<a class="btn btn-app">
                    			<i class="fa fa-edit"></i> Editar
                  			</a>	
				  		</div>
				  		<div class="col-sm-3">
				  			<a class="btn btn-app">
                    			<i class="fa fa-bitbucket"></i> Borrar
                  			</a>	
				  		</div>			  		
				  	</div><!-- div class form group -->
				  </div><!-- div class col-md-9 -->
				</div><!-- div class row -->				
				
				
                </div><!-- /.box-body -->
              </form>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
<!-- VENTANA MODAL PARA AGREGAR LOS TRAMITES UNA VEZ SELECCIONADA LA EMPRESA, SUCURSAL Y DANDOLE CLIC AL BOTON AGREGAR TRAMITE-->
<div class="modal fade" id="tramitesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: auto; max-width: 1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Trámites de la Empresa</h4>
      </div>
      <div class="modal-body">
        <div id="tablaTramites" class="box-body">
       		<!---------------------Se rellena automatico con ajax---------------------------->
       	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div> <!-- Fin de ventana modal-->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
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
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    
    <!-- jQuery 2.1.4 -->
    <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../../bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/app.min.js"></script>
    <!-- DataTables -->
    <script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- InputMask -->
    <script src="../../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
    
    <!-- SlimScroll -->
    <script src="../../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../../plugins/fastclick/fastclick.min.js"></script>    
    <!-- Select2 -->
    <script src="../../../plugins/select2/select2.full.min.js"></script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
    <script>
      $(function () {
        $(".select2").select2();
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});       
      });
    </script>
    
    <script>
    	function seleccionarEmpresa(idEmpresa){
    	console.log(idEmpresa.value);
    	if(idEmpresa.value == 0){
    		
    	limpiarCampos();
    	var txtRepLegal = document.getElementById("repLegal");	
    	txtRepLegal.value = "";
    	
		$('#cmbSucursales').find('option').remove().end();
		// var cmbSucursales = document.getElementById("cmbSucursales");
		$('#cmbSucursales').append("<option value='0' selected='selected' >Seleccione una sucursal</option>").val("0");    	
    	
    	} else {
    	limpiarCampos();
        $.ajax({
        	data: { "idempresa" : idEmpresa.value},
        	type: "POST",
        	dataType: "json",
        	url: "../getSucursalesFromIdEmpresa.php",
        })
        .done(function(data, textStatus, jqXHR){
        	if(console && console.log){
        		console.log("La solicitud se ha completado correctamente");
        	}
        	llenaDatosSucursales(data, idEmpresa);
        })
        .fail(function(jqXHR, textStatus, errorThrown){
        	if(console && console.log){
        		console.log("La solicitud ha fallado " + textStatus + " " + errorThrown);
        	}
        });
       	} // else
    	} // seleccionarEmpresa
    	
    	function llenaDatosSucursales(data, idEmpresa){
    		console.log(data);
    		/* Rellenar Rep. Legal al seleccionar la Empresa*/
			var repLegal = data[0].representanteLegal;
			var txtRepLegal = document.getElementById("repLegal");
			txtRepLegal.value = repLegal;
			/* Limpiar combo de las sucursales que tenga para cargar las nuevas seleccionadas*/
			$('#cmbSucursales').find('option').remove().end();
			// var cmbSucursales = document.getElementById("cmbSucursales");
			$('#cmbSucursales').append("<option value='0'>Seleccione una sucursal</option>").val("0");
			for(var key in data){
				var nombreEmpresa = data[key].nombreEmpresa;
				var calle = data[key].calle;
				var numExt = data[key].numeroExterior;
				var idSucursal = data[key].idcatalogo_perfilestablecimiento;
				var textoCombo = nombreEmpresa + "( "+calle+" / " + numExt + " )";
				
				$('#cmbSucursales').append($('<option>', {
					value: idSucursal,
					text: textoCombo
				}));				
			}
			$('#cmbSucursales option')[0].selected = true;
			$('#select2-cmbSucursales-container').text("Seleccione una sucursal");
			$('#select2-cmbSucursales-container').attr('title', "Seleccione una sucursal");
    	}
    	
    	function seleccionarSucursal(idSucursal){
    	console.log(idSucursal.value);
    	if(idSucursal.value == 0){
    		limpiarCampos();
    	} else {
    		
    	var idEmpresa = document.getElementById("cmbEmpresas");
        $.ajax({
        	data: { "idempresa" : idEmpresa.value , "idsucursal" : idSucursal.value},
        	type: "POST",
        	dataType: "json",
        	url: "../getInfoFromSucursal.php",
        })
        .done(function(data, textStatus, jqXHR){
        	if(console && console.log){
        		console.log("La solicitud se ha completado correctamente");
        	}
        	llenaCamposSucursales(data);
        })
        .fail(function(jqXHR, textStatus, errorThrown){
        	if(console && console.log){
        		console.log("La solicitud ha fallado " + textStatus + " " + errorThrown);
        	}
        });	//ajax
        
    	  } // else
    	} // seleccionarSucursal
    	
    	function llenaCamposSucursales(data){
    		console.log(data);
    			var txtCalle = document.getElementById("calle");
				var txtNoExt = document.getElementById('noExt');
				var txtNoInt = document.getElementById('noInt');
				var txtColonia = document.getElementById('colonia');
				var txtMunicipio = document.getElementById('municipio');
				var txtTelefono = document.getElementById('telefono');
				
				txtCalle.value = data[0].CALLE;
				txtNoInt.value = data[0].NO_INTERIOR;
				txtNoExt.value = data[0].NO_EXTERIOR;
				txtColonia.value = data[0].COLONIA;
				txtMunicipio.value = data[0].MUNICIPIO;
				txtTelefono.value = data[0].TELEFONO;
				
				$("#btnAgregarTramite").prop('disabled',false);
			} // llenaCamposSucursal
    	
    	function limpiarCampos(){
    		    var txtCalle = document.getElementById("calle");
				var txtNoExt = document.getElementById('noExt');
				var txtNoInt = document.getElementById('noInt');
				var txtColonia = document.getElementById('colonia');
				var txtMunicipio = document.getElementById('municipio');
				var txtTelefono = document.getElementById('telefono');
				
				txtCalle.value = "";
				txtNoExt.value = "";
				txtNoInt.value = "";
				txtColonia.value = "";
				txtMunicipio.value = "";
				txtTelefono.value = "";
				
				$("#btnAgregarTramite").prop('disabled',true);
			} // limpiarCampos
			
	    function busquedaTramites(){
	    	var idEmpresa = document.getElementById("cmbEmpresas");
	    	var idSucursal = document.getElementById("cmbSucursales");
	    	
	    	if((idEmpresa.value == 0 ) || (idSucursal.value == 0 )){
	    		//no procede
	    	} else {
				$.ajax({
		        	data: { "idempresa" : idEmpresa.value , "idsucursal" : idSucursal.value},
		        	type: "POST",
        			dataType: "json",
		        	url: "../getTramitesFromIdSucYEmp.php",
        		})
		        .done(function(data, textStatus, jqXHR){
		        	if(console && console.log){
		        		console.log("La solicitud se ha completado correctamente");
		        	}
		        	llenaTramitesEmpresa(data);
        		})
		        .fail(function(jqXHR, textStatus, errorThrown){
		        	if(console && console.log){
		        		console.log("La solicitud ha fallado " + textStatus + " " + errorThrown);
		        	}
        		});	//ajax
	    	}
	    }	
	    
	    function llenaTramitesEmpresa(data){
			console.log(data);
			var divTabla = document.getElementById("tablaTramites");
			var strTabla = '<table id="tblFullCaracteristicas" class="table table-bordered table-striped">';
		    strTabla += '<thead>';
      		strTabla += '<tr>';
      		strTabla += '<th>No. Tramite</th>';
      		strTabla += '<th>Tramite</th>';
      		strTabla += '<th>Facturado</th>';
      		strTabla += '<th>No. Factura</th>';
      		strTabla += '<th>Seleccion</th>';
	      	strTabla += '</tr>';
      		strTabla += '</thead>';
      		strTabla += '<tbody>';
      		for(var key in data){
      			strTabla += '<tr>';
      			strTabla += '<td>' + data[key].ID_NUM_TRAMITE+'</td>';
      			strTabla += '<td>' + data[key].TRAMITE+'</td>';
      			strTabla += '<td>' + data[key].FACTURADO+'</td>';
      			strTabla += '<td>' + data[key].NO_FACTURA+'</td>';
      			strTabla += '<td>';
      			console.log(data[key].FACTURADO);
      			var aux = data[key].FACTURADO;
      			if(aux == 'NO'){
      				strTabla += '<input type="button" class="btn btn-success" data-dismiss="modal" value="Agregar"/>';
      			} else {
      				strTabla += '<input type="button" class="btn" data-dismiss="modal" disabled="true" value="Agregar"/>';
      			}
      			strTabla += '</td>';
      			strTabla += '</tr>';      			
      		}
       		strTabla += '';
      		divTabla.innerHTML = strTabla;
      		declararTablaTramites();
	    }
	    
      function declararTablaTramites(){
      	var table = $('#tblFullCaracteristicas').DataTable();
      	$('#tblFullCaracteristicas tbody').on( 'click', 'tr', function () {
        	if ( $(this).hasClass('selected') ) {
            	$(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        	}
    	}); 
      }
    </script>
  </body>
</html>