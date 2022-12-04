<?
	//INSTANCIA DE LA CLASE CATEGORIAS
	
	$Ejecuta = new CatalogoCasas ();

	if($_POST["fname"])
   	{

		//MANDAR LOS VALORES A LOS METODOS GETTERS Y SETTERS

		$Ejecuta->setNombre ($_POST['fname']);

		//INSERTAR LOS DATOS

		$Ejecuta->Insertar ();

		//CARGAR HACIA LA VISTA EMPLEADOS

		print "<script>
		window.location='index.php?view=Laboratories'; 
		alert('Registro exitoso');
		</script>";
	}
?>