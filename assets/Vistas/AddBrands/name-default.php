<?
	//INSTANCIA DE LA CLASE CATEGORIAS
	
	$Ejecutar = new CatalogoMarcas ();

      if($_POST["NombreMarca"])
   	  {
		//MANDAR LOS VALORES A LOS METODOS GETTERS Y SETTERS

		$Ejecutar->setNombre ($_POST["NombreMarca"]);

		//INSERTAR LOS DATOS

		$Ejecutar->Insertar ();

		//CARGAR HACIA LA VISTA EMPLEADOS

		print "<script>
		window.location='index.php?view=Laboratories'; 
		alert('Registro exitoso');
		</script>";
	}

?>