<?
	//INSTANCIAR LA CLASE EMPLEADOS

	$Ejecuta = new Productos ();

	$Ejecuta->setCodigo($_REQUEST['Codigo']);

	//LLAMAR AL METODO QUE ACTUALIZARA

	$Ejecuta->EliminarRegistro ();
	
	function eliminarDir($carpeta)
	{
		foreach(glob($carpeta . "/*") as $archivos_carpeta)
		{
			if (is_dir($archivos_carpeta))
			{
				eliminarDir($archivos_carpeta);
			}
			else
			{
				unlink($archivos_carpeta);
			}
		}
		rmdir($carpeta);
	}

	eliminarDir('assets/FotosProductos/'.$Ejecuta->getCodigo ());

	//CARGAR HACIA LA VISTA EMPLEADOS

	print "<script>
	window.location='index.php?view=Products'; 
	</script>";
	
?>