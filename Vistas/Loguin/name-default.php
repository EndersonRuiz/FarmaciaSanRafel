<? 

	session_start();
	$User = $_SESSION["NombreUsuario"];
	$Pass = $_SESSION["Pass"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="shortcut icon" href="assets/img/logo.png">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/material.min.js" ></script>
	<script src="js/sweetalert2.min.js" ></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="js/main.js" ></script>
</head>
<body class="cover">
	<div class="container-login">
		<div class="logueo" >
			<img class="avatar" src="assets/img/logo.png">
		</div>
		<br><br><br><br> <br><br>
		<p class="text-center text-condensedLight">Iniciar Sesion</p>
		<form method="POST" action="index.php?view=ValidateUser" autocomplete="off">

			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<h6><font color="BLUE">SUCURSAL:</font></h6>
												<select required="" class ="mdl-textfield__input" name="Sucursal" id="Sucursal">
													<option>...</option>
													<option>SanJuan</option>
													<option>SanRafael</option>
													<option>SanRafael1</option>
													<option>Clinica</option>
													<option>Admin</option>
												</select>
			</div>

			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			    <input class="mdl-textfield__input" type="text" id="Usuario" name="Usuario" required="" value="<?echo $User; ?>">
			    <label class="mdl-textfield__label" for="userName" >Usuario</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			    <input class="mdl-textfield__input" type="password" id="Contraseña" name="Contraseña" required="">
			    <label class="mdl-textfield__label" for="pass">Contraseña</label>
			</div>
		
			<button id="SingIn" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #3F51B5; float:right;">Siguiente <i class="zmdi zmdi-mail-send"></i>
			</button>
		</form>
	</div>
</body>
</html>