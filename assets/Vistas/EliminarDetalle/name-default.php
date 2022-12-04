<? 
	//CONTINUAR LAS SESIONES

	session_start();

	//CREAR ARRAY PARA DEVOLVER PORMEDIO DE JSON UN ALERTIFY NOTIFICACION

	$json = array();
	$json['name'] = 'position';
	$json['defaultValue'] = 'top-right';
	$json['msj'] = '<font color="#ffffff"><i class="fa fa-check"></i> Producto Eliminado</font>';
	$json['success'] = true;

	//COMPROBAR SI SE RECIBE CORRECTAMENTE EL ITEM Y QUITAR DE LA LISTA

	if (isset($_POST['id'])) 
	{
		try 
		{
			unset($_SESSION['Detalle'][$_POST['id']]);
			$json['success'] = true;
			echo json_encode($json);
		} 
		catch (PDOException $e)
		{
			$json['msj'] = $e->getMessage();
			$json['success'] = false;
			echo json_encode($json);
		}
	}

?>