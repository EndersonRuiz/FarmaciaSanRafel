<?
	$model = new Autoproducos();

	echo json_encode($model->buscarUsuario ($_GET['keyword']));
		
?>