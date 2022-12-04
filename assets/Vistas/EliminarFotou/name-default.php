<?php
	print "<script>alert('si entra');</script>";
	$file = $_POST['Codigo'];
	
	if(is_file($file)){
		chmod($file,0777);
		if(!unlink($file)){
		echo false;
		}
	}
	
?>