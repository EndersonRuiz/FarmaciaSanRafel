<?
	//INSTANCIAR LA CLASE EMPLEADOS

	$Ejecuta = new Laboratorios ();

	$Ejecuta->setCodigo($_REQUEST['Codigo']);

	//LLAMAR AL METODO QUE ACTUALIZARA

	$Ejecuta->EliminarRegistro ();

	//CARGAR HACIA LA VISTA EMPLEADOS

	print "<script>
	window.location='index.php?view=Laboratories'; 
	alert('Registro eliminado');
	</script>";
	
?>