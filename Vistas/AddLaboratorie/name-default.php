<?

	//INSTANCIA DE LA CLASE CATEGORIAS
	
	$Ejecuta = new Laboratorios ();

	//MANDAR LOS VALORES A LOS METODOS GETTERS Y SETTERS

	$Ejecuta->setCodigoCasa ($_POST['CodigoCasa']);
	$Ejecuta->setCodigoMarca ($_POST['CodigoMarca']);

	//INSERTAR LOS DATOS

	$Ejecuta->InsertarLaboratorio ();

	//CARGAR HACIA LA VISTA EMPLEADOS

	print "<script>
	window.location='index.php?view=Laboratories'; 
	alert('Guardando web Service');
	</script>";

?>