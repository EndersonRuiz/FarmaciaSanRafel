<?

	//INSTANCIA DE LA CLASE CATEGORIAS
	
	$Ejecuta = new Ubicaciones ();

	//MANDAR LOS VALORES A LOS METODOS GETTERS Y SETTERS

	$Ejecuta->setNombre ($_POST['Nombre']);
	$Ejecuta->setSeccion ($_POST['Seccion']);

	//INSERTAR LOS DATOS

	$Ejecuta->Insertar ();

	//CARGAR HACIA LA VISTA EMPLEADOS

	print "<script>
	window.location='index.php?view=Locations'; 
	alert('Registro exitoso');
	</script>";

?>