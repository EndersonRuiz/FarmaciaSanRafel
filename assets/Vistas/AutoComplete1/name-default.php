<?
	$model = new Autoproducos();

	echo json_encode($model->buscarProductoSanRafael ($_GET['keyword']));
		
?>