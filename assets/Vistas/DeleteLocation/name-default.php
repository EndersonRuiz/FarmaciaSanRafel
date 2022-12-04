<?
	//INSTANCIAR LA CLASE EMPLEADOS

	$Ejecuta = new Ubicaciones ();

	$Ejecuta->setCodigo($_REQUEST['Codigo']);

	//LLAMAR AL METODO QUE ACTUALIZARA

	$Ejecuta->EliminarRegistro ();

	//CARGAR HACIA LA VISTA EMPLEADOS

	print "<script>
	window.location='index.php?view=Locations'; 
	alert('Registro eliminado');
	</script>";
	
?>