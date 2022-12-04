<?
	//INCLUIR MODELO EMPLEADOS

	require_once 'models/ModeloEmpleados.php';

	//INSTANCIAR LA CLASE EMPLEADOS

	$Ejecuta = new Empleados ();

	$Ejecuta->setCodigo($_REQUEST['Codigo']);

	//LLAMAR AL METODO QUE ACTUALIZARA

	$Ejecuta->EliminarEmpleado ();

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

	eliminarDir('assets/FotosEmpleados/'.$Ejecuta->getCodigo ());

	//CARGAR HACIA LA VISTA EMPLEADOS

	print "<script>
	window.location='index.php?view=Users'; 
	alert('Registro eliminado');
	</script>";
	
?>