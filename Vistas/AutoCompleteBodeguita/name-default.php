<?
	$model = new Autoproducos();

	echo json_encode($model->buscarProductoBodeguita($_GET['keyword']));
		
?>