<?
	$model = new Autoproducos();

	echo json_encode($model->buscarUbicaciones ($_GET['keyword']));
		
?>