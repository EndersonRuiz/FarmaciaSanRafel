<?
	//INSTANCIA DE LA CLASE EMPLEADOS

	$Ejecuta = new Categorias ();

	//MANDAR LOS VALORES RECIBIDOS DEL FORMULARIO ATRAVEZ DEL METODO POST

	$Ejecuta->setCodigo($_POST['Codigo']);
	$Ejecuta->setNombre($_POST['Nombre']);
	$Ejecuta->setMedida($_POST['Medida']);
	$Ejecuta->setDescripcion ($_POST['Descripcion']);

	//ACTUALIZAR LOS DATOS INGRESADOS
        
	$Ejecuta->ActualizarCategoria();

	//CARGAR HACIA LA VISTA EMPLEADOS

	print "<script>
	window.location='index.php?view=Categorys'; 
	alert('Registro Actualizado');
	</script>";

	//header('Location: ../../views/Empleados/Empleados.php'); EN EL CASO DE HACERLO CON PHP
?>