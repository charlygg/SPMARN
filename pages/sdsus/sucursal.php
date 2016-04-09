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
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
   <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

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
                  <!-- The user image in the navbar-->
                  <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $_SESSION['session_nombre']." ".$_SESSION['session_apPat']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p><?php echo $_SESSION['session_nombre']." ".$_SESSION['session_apPat']; ?>
                       - <?php echo $_SESSION['session_user_depto_nombre']; ?><!--
                      <small>Member since Nov. 2012</small> -->
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="../../myprofilesettings.php" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="../../logoutsession.php" class="btn btn-default btn-flat">Sign out</a>
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
              <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['session_nombre']." ".$_SESSION['session_apPat']; ?></p>
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
            <?php
            switch($_SESSION['session_user_depto_id']){
				case 3:
					echo '<li><a href="dma/dashboard.php"><i class="fa fa-link"></i> <span>Inicio</span></a></li>';
					echo '<li><a href="dma/empresas.php"><i class="fa fa-link"></i> <span>Empresas y Sucursales</span></a></li>';
					echo '
			<li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Menu trámites</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="dma/tramites/tramites_nuevos.php">Trámites nuevos</a></li>
                <li><a href="dma/tramites/tramites_proceso.php">Trámites en proceso</a></li>
                <li><a href="dma/tramites/tramites_finalizados.php">Trámites finalizados</a></li>
              </ul>
            </li>';
					break;
            }
            ?>
            <!--
            <li class="active"><a href="tramitesinfo.php"><i class="fa fa-link"></i> <span>Tramites</span></a></li>
            <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
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
          	<?php
          	switch($_SESSION['session_user_depto_id']){
				case 3:
					echo '<li><a href="#"><i class="fa fa-dashboard"></i> <a href="dma/dashboard.php">Inicio</a> -> <a href="dma/empresas.php">Empresas</a> -> <strong><font id="txtEmpresa2"></font></strong></a></li>';
					break;
				default:
				    echo '<li><a href="#"><i class="fa fa-dashboard"></i> <a href="#">Inicio</a> -> <a href="#">Empresas</a> -> <strong><font id="txtEmpresa2"></font></strong></a></li>';
          	}
          	
          	?>
            <!--<li class="active">Here</li>-->
          </ol>
        </section>

        <!-- Main content -->
        <!-- Your Page Content Here -->
                
        <section class="content">
		<div class="row">
			<div class="col-md-9">
				<div class="box box-primary">
					<div class="box-header with-border">
						<div class="box-title"><h4 class="box-title">Informacion de la Empresa</h4></div>
					</div>
				  <form role="form">
                  <div class="box-body">
                    	<div class="form-group">
	                      <label for="lblNombreEmpresa">Empresa</label>
	                      <input type="text" name="txtEmpresa" class="form-control" id="txtEmpresa" disabled="true"> 
	                    </div>
	                    
	                    <div class="form-group">
	                      <label for="lblRepforLegal">Representante Legal</label>
	                      <input type="text" name="txtRepLegal" class="form-control" id="txtRepLegal" disabled="true">
	                    </div>
	              </div><!-- /.box-body -->
	              </form>					
				</div>
			</div>
			
		</div>
		</section><!-- /.content -->
        <section class="content">
       		<div class="box box-success">
       			<div class="box-header with-border">
                  <h3 class="box-title">Sucursales</h3>
                </div>
       			<div id="tablaSucursales" class="box-body table-responsive">
       				<!--------------------Se rellena automatico con ajax----------------------------->
       			</div>
       		</div>
       	</section>

<!-- VENTANA Modal PARA CUANDO SE SELECCIONA LOS TRAMITES DE UNA EMPRESA-->

<div class="modal fade" id="tramitesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: auto; max-width: 1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Seleccionado</h4>
      </div>
      <div class="modal-body">
        <div id="tablaTramites" class="box-body table-responsive">
       				<!---------------------Se rellena automatico con ajax---------------------------->
       	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div> <!-- Fin de ventana modal-->
</div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- Default to the left -->
        <strong>Subsecretaría de Protección al Medio Ambiente y Recursos Naturales &copy; 2016</strong>
      </footer>
    </div><!-- ./wrapper -->
    
	<!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->a
    <script src="../../dist/js/app.min.js"></script>
    <!-- DataTables -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>   
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
    <script>
    function obtenerTramites(idsucursal){
    	var idEmp = document.getElementById("idEmpresa_hidden");
    	var title = document.getElementById("myModalLabel");
      	/* Ajax para obtener los tramites de la empresa y la sucursal seleccionada con el boton*/
      	$.ajax({
      		data: { "idempresa" : idEmp.value , "idsucursal" : idsucursal},
      		type: "POST",
      		dataType: "json",
      		url: "getTramitesFromIdSucYEmp.php",
      	})
      	.done(function(data, textStatus, jqXHR){
      		if(console && console.log){
      			console.log("La solicitud se ha completado correctamente");
      		}
      		fillTablaTramites(data);
      	})
      	.fail(function(jqXHR, textStatus, errorThrown){
      		if(console && console.log){
      			console.log("La solicitud ha fallado " + textStatus + " " + errorThrown);
      		}
      	});
      	
    	}
    	
    	function fillTablaTramites(tramites){
   		console.log(tramites);	
   		$("#myModalLabel").innerHTML="Seleccionado la sucursal";
   		var divTabla = document.getElementById("tablaTramites");
   		$("#tablaTramites").empty();
      	var strTabla = '<table id="tblFullTramites" class="table table-bordered table-condensed">';
      	strTabla += '<thead>';
      	strTabla += '<tr>';
      	strTabla += '<th>No. Tramite</th>';
      	strTabla += '<th>Tramite</th>';
      	strTabla += '<th>Estado</th>';
      	strTabla += '<th>Fecha de inicio</th>';
      	strTabla += '</tr>';
      	strTabla += '</thead>';
      	strTabla += '<tbody>';
      	var i = 0;      	
      	for(var key in tramites){
      		console.log(tramites[key]);
      		var erroralguno = false;
      		var errormsg = '';
      		if(tramites[key].hasOwnProperty('code')){ 
      			var idnumcode = tramites[key].code;
      			if(idnumcode==0) {errormsg="No tiene tramites";}
      			else {errormsg="Ocurrio un problema con el sp de la base de datos";}
      			
      			strTabla += '<tr>';
      			strTabla += '<td colspan=4>'+errormsg+'</td>';
      			strTabla += '<td></td>';
      			strTabla += '<td></td>';
      			strTabla += '<td></td>';
      			strTabla += '</tr>';
      			erroralguno = true;
      		
      		} else {
      			strTabla += '<tr>';
      			strTabla += '<td>' + tramites[key].ID_NUM_TRAMITE+'</td>';
      			strTabla += '<td>' + tramites[key].TRAMITE+'</td>';
      			strTabla += '<td>' + tramites[key].ESTATUS+'</td>';
      			strTabla += '<td>' + tramites[key].FECHA_INICIO_TRAMITE+'</td>';
      			strTabla += '</tr>';
      		}
      		if(erroralguno==true) break;
      	}
      	strTabla += '</tbody>';
      	strTabla += '</table>';
      	divTabla.innerHTML = strTabla;
    	$("#tblFullTramites").DataTable();
    	}
    
      $(function () {    	
      	/* Funcion de ajax para obtener los parametros de la url*/
		$.urlParam = function(name){
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			if (results==null){
				return null;
			}else{
				return results[1] || 0;
			}
		}
		      	
        /* Obtenemos el parametro idempresa de la url*/
        var idEmpresa = decodeURIComponent($.urlParam('idempresa'));
        
		/* Obtenemos todas las sucursales con getSucursalesFromIdEmpresa.php con metodo Ajax + Json para
		 	intercambio de datos */
        $.ajax({
        	data: { "idempresa" : idEmpresa},
        	type: "POST",
        	dataType: "json",
        	url: "getSucursalesFromIdEmpresa.php",
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
        
        
      function llenaDatosSucursales(data, idEmpresa){
      	console.log(data);
      	var nombreEmpresa = data[0].nombreEmpresa;
      	var repLegal = data[0].representanteLegal;
      	var n = document.getElementById("txtEmpresa");
      	var r = document.getElementById("txtRepLegal");
      	var d = document.getElementById("txtEmpresa2");
      	n.value = nombreEmpresa;
      	r.value = repLegal;
      	d.innerHTML = nombreEmpresa;
      	/* Escribimos dinamicamente el codigo usando javascript*/
      	var divTabla = document.getElementById("tablaSucursales");
      	var strTabla = '<table id="tblFullCaracteristicas" class="table table-bordered table-condensed">';
      	strTabla += '<input type="hidden" id="idEmpresa_hidden" value='+idEmpresa+'>';
      	strTabla += '<thead>';
      	strTabla += '<tr>';
      	strTabla += '<th>No. Suc</th>';
      	strTabla += '<th>Calle</th>';
      	strTabla += '<th>Numero exterior</th>';
      	strTabla += '<th>Numero interior</th>';
      	strTabla += '<th>Colonia</th>';
      	strTabla += '<th>Municipio</th>';
      	strTabla += '<th>Tramites</th>';
      	strTabla += '</tr>';
      	strTabla += '</thead>';
      	strTabla += '<tbody>';
      	var i = 0;
      	for(var key in data){
      		console.log(data[key]);
      		i = i + 1;
      		strTabla += '<tr>';
      		strTabla += '<td>'+i+'</td>';
      		strTabla += '<td>' + data[key].calle+'</td>';
      		strTabla += '<td>' + data[key].numeroExterior+'</td>';
      		strTabla += '<td>' + data[key].numeroInterior+'</td>';
      		strTabla += '<td>' + data[key].colonia+'</td>';
      		strTabla += '<td>' + data[key].municipio+'</td>';
      		strTabla += '<td><input type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#tramitesModal" value="Ver tramites" onclick="obtenerTramites('+data[key].idcatalogo_perfilestablecimiento+')" ></td>'
      		strTabla += '</tr>';
      	}
      	strTabla += '</tbody>';
      	strTabla += '</table>';
      	divTabla.innerHTML = strTabla;
      	declararTablaSucursales();
      	}
      });
      
      function declararTablaSucursales(){
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