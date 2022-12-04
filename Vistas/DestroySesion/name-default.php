<?
	session_start();
	unset($_SESSION['NombreUsuario']);
	unset($_SESSION["Pass"]);
	unset($_SESSION['PuestoUsuario']);
	unset($_SESSION['NameComplete']);
	unset($_SESSION['CodigoUser']);
	session_destroy();
		print "<script>
	window.location='index.php?view=Loguin'; 
	</script>";
?>