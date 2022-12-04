<?
	$model = new Autoproducos();

	echo json_encode($model->buscarPoliticas ($_GET['keyword']));
		
?>