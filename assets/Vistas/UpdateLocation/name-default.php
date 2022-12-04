<?
	//INSTANCIA DE LA CLASE EMPLEADOS

	$Ejecuta = new Ubicaciones ();

	//MANDAR LOS VALORES RECIBIDOS DEL FORMULARIO ATRAVEZ DEL METODO POST

	$Ejecuta->setCodigo($_POST['Codigo']);
	$Ejecuta->setNombre($_POST['Nombre']);
	$Ejecuta->setSeccion($_POST['Seccion']);

	//ACTUALIZAR LOS DATOS INGRESADOS
        
	$Ejecuta->Actualizar();

	//CARGAR HACIA LA VISTA EMPLEADOS

	print "<script>
	window.location='index.php?view=Locations'; 
	alert('Registro Actualizado');
	</script>";

	//header('Location: ../../views/Empleados/Empleados.php'); EN EL CASO DE HACERLO CON PHP
?>