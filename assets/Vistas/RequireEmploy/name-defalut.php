<?
	//INCLUIR MODELO EMPLEADOS

	require_once '../../models/ModeloEmpleados.php';

	//INSTANCIAR LA CLASE EMPLEADOS

	$Ejecuta = new Empleados ();

	$Ejecuta->setCodigo($_REQUEST['Codigo']);

	//LLAMAR AL METODO QUE ACTUALIZARA

	$Ejecuta->Obtener ();

	//CARGAR HACIA LA VISTA EMPLEADOS

	print "<script>
	window.location='../../Vistas/Usuarios/Usuarios.php'; 
	alert('Registro eliminado');
	</script>";
	
?>