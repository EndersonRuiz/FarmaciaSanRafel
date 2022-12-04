<?
	$model = new Autoproducos();

	echo json_encode($model->buscarSucursales ($_GET['keyword']));
		
?>