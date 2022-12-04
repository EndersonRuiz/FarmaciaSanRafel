<?

	//INSTANCIA DE LA CLASE CATEGORIAS
	
	$Ejecuta = new Laboratorios ();

	//MANDAR LOS VALORES A LOS METODOS GETTERS Y SETTERS

	$Ejecuta->setCodigo ($_POST['Codigo']);
	$Ejecuta->setCodigoCasa ($_POST['CodigoCasa']);
	$Ejecuta->setCodigoMarca ($_POST['CodigoMarca']);

	//INSERTAR LOS DATOS

	$Ejecuta->ActualizarLaboratorio();

	//CARGAR HACIA LA VISTA EMPLEADOS

	print "<script>
	window.location='index.php?view=Laboratories'; 
	alert('Registro actualizado');
	</script>";

?>