<?
	session_start();

	if(isset($_POST['CodigoUser']))
	{
		$_SESSION['CodigoUser'] = $_POST['CodigoUser'];
		echo json_encode('success');
	}
?>