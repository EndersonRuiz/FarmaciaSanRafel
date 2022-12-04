<?

	//INSTANCIA DE LA CLASE CATEGORIAS
	
	$Ejecuta = new Visitador ();

	//MANDAR LOS VALORES A LOS METODOS GETTERS Y SETTERS

	$Ejecuta->setNombres ($_POST['Nombre']);
	$Ejecuta->setApellidos ($_POST['Apellido']);
	$Ejecuta->setNit ($_POST['Nit']);
	$Ejecuta->setTelefono ($_POST['Telefono']);

	//INSERTAR LOS DATOS

	$Ejecuta->Insertar();

	//CARGAR HACIA LA VISTA EMPLEADOS


?>