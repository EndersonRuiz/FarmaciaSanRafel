<?
	//INSTANCIAR LA CLASE EMPLEADOS

	$Ejecuta = new Categorias ();

	$Ejecuta->setCodigo($_REQUEST['Codigo']);

	//LLAMAR AL METODO QUE ACTUALIZARA

	$Ejecuta->EliminarCategoria ();

	//CARGAR HACIA LA VISTA EMPLEADOS

	print "<script>
	window.location='index.php?view=Categorys'; 
	alert('Registro eliminado');
	</script>";
	
?>