<?

	//INSTANCIA DE LA CLASE CATEGORIAS
	
	$Ejecuta = new Inventario ();

	//MANDAR LOS VALORES A LOS METODOS GETTERS Y SETTERS

	$Ejecuta->setIdProducto ($_POST['Busqueda']);
	$Ejecuta->setIdLaboratorio ($_POST['Laboratorio']);
	$Ejecuta->setIdUbicacion ($_POST['Ubicacion']);
	$Ejecuta->setIdSucursal ($_POST['SucursalB']);
	$Ejecuta->setExistencia ($_POST['Existencia']);
	$Ejecuta->setFechaVencimiento ($_POST['FechaVencimiento']);
	$Ejecuta->setPolitica ($_POST['Politica']);

	//INSERTAR LOS DATOS

	$Ejecuta->Insertar ();

	//CARGAR HACIA LA VISTA EMPLEADOS

	print "<script>
	window.location='index.php?view=Inventory'; 
	alert('Registro exitoso');
	</script>";

?>