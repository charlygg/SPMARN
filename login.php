<?php
session_start();
if(isset($_SESSION["session_username"])){
	header("Location: starter.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gobierno del Estado de Nuevo León</title>

    <!-- Bootstrap core CSS -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  </head>
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="login.php"><b>
        	<img src="imagenes/SGN.png" width="320" height="150"/>
        </b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <h4 class="login-box-msg">Sistema Integral de Tramites</h4>
        <form action="procedimiento.php" method="post">
          <div class="form-group has-feedback">
            <input type="username" id="username" name="username" class="form-control" placeholder="Usuario">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-5">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar sesion</button>
            </div><!-- /.col -->
          </div>
        </form>
        <?php
        if(isset($_GET['msg'])){
        	$tipo_error = $_GET['msg'];
			echo "<br>";
			switch($tipo_error){
					
				case "errorsp":
					echo "<p>Error en el inicio de sesion, usuario y/o password invalidos</p>";
					break; 	
				
				case "errortramites":
					echo "<p>No autorizado para ver el contenido de la pagina</p>";
					break;
					
				default: 
					echo "<p>Error en el inicio de sesión</p>";
			}
        } 
        ?>
		<br>
        <a href="lostpassword.php">He olvidado mi password</a><br>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>

</html>