<?
	$model = new Autoproducos();

	echo json_encode($model->buscarProductoSanRafael_1($_GET['keyword']));
		
?>