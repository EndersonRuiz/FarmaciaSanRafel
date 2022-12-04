<?

	//INSTANCIA DE LA CLASE CATEGORIAS
	
	$Ejecuta = new Categorias ();

	//MANDAR LOS VALORES A LOS METODOS GETTERS Y SETTERS

	$Ejecuta->setNombre ($_POST['Nombre']);
	$Ejecuta->setMedida ($_POST['Medida']);
	$Ejecuta->setDescripcion ($_POST['Descripcion']);

	//INSERTAR LOS DATOS

	$Ejecuta->InsertarCategoria ();

	//CARGAR HACIA LA VISTA EMPLEADOS

	print "<script>
	window.location='index.php?view=Categorys'; 
	alert('Registro exitoso');
	</script>";

?>