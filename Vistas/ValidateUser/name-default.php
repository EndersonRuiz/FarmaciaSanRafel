<?

	$Ejecuta = new Empleados ();

	if (isset($_POST['Sucursal']) and isset($_POST['Usuario']) and isset($_POST['Contraseña']))
	{
		$Ejecuta->ValidarUsuario($_POST['Sucursal'],$_POST['Usuario'],$_POST['Contraseña']);
	}
	else
	{
		print "<scrip>alert ('campos vacios');</script>";
	}

	
?>