<?

	//INSTANCIA DE LA CLASE CATEGORIAS
	$Ejecuta = new Inventario ();

	//MANDAR LOS VALORES A LOS METODOS GETTERS Y SETTERS
	$Ejecuta->setCodigo($_POST['Codigo']);
	$Ejecuta->setIdUbicacion ($_POST['Ubicacion']);
	$Ejecuta->setFechaVencimiento ($_POST['FechaVencimiento']);
	$Ejecuta->setPolitica ($_POST['Politica']);

	//INSERTAR LOS DATOS
	$Ejecuta->ActualizarProductoSanJuan();

	$Ejecuta->setVerificacion($_POST['Exist']);
	$Ejecuta->setIdProducto ($_POST['Busqueda']);
	$Ejecuta->setIdSucursal ($_POST['Sucursal']);
	$Ejecuta->setExistencia ($_POST['Existencia']);
	$Ejecuta->setFechaVencimiento ($_POST['FechaVencimiento']);
	//INSERTAR LOS DATOS
	$Ejecuta->Actualizar1212();


	//CARGAR HACIA LA VISTA EMPLEADOS

	print "<script>
	window.location='index.php?view=InventorySanRafa1'; 
	alert('Registro Actualizado');
	</script>";

?>