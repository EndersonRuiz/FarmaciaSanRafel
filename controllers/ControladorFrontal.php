<?php

//CARGAR ARCHIVO MODULE

include 'Module.php';

//CLASS VIEW PARA MANEJAR URLS SEGURAS O ENCRIPTADAS

class View 
{

	//METODO QUE CARGA INICIALMENTE

	public static function load($view)
	{
		if(!isset($_GET['view']))
		{
			include "Vistas/".Module::$module."/".$view."/name-default.php";
		}
		else
		{
			if(View::isValid())
			{
				include "Vistas/".Module::$module."/".$_GET['view']."/name-default.php";			
			}
			else
			{
				View::Error("<b>404 NOT FOUND</b> View <b>".$_GET['view']."</b> folder  !!");
			}
		}
	}

	//METODO QUE VALIDA SI LA URL ES VALIDA

	public static function isValid()
	{
		$valid=false;
		if(file_exists($file = "Vistas/".Module::$module."/".$_GET['view']."/name-default.php"))
		{
			$valid = true;
		}
		return $valid;
	}

	//METODO PARA RETORNAR O IMPRIMIR UN ERROR

	public static function Error($message)
	{
		print $message;
	}

}

?>