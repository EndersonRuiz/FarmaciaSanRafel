<?

	//INSTANCIA DE LA CLASE CATEGORIAS
	
	$Ejecuta = new Inventario ();

	//MANDAR LOS VALORES A LOS METODOS GETTERS Y SETTERS

	$Ejecuta->setCodigo($_REQUEST['Codigo']);

	//INSERTAR LOS DATOS

	$Ejecuta->Eliminar ();

	//CARGAR HACIA LA VISTA EMPLEADOS

	print "<script>
	window.location='index.php?view=Inventory'; 
	alert('Registro Eliminado');
	</script>";

?>