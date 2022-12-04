<?php

//CLASS MODULE PARA URL ENCRIPTADAS PARA MAS SEGURIDAD

class Module 
{

	//ATRIBUTOS DE LA CLASE

	public static $module;
	public static $view;
	public static $message;

	//MODULO POR DEFAULT O DEFECTO

	public static function setModule($module)
	{
		self::$module = $module;
	}

	//CARGAR LA VISTA

	public static function loadLayout()
	{
		include "Vistas/".Module::$module."/name-default.php";
	}


	//VALIDACION DEL MODULO

	public static function isValid()
	{
		$valid = false;
		$folder = "Vistas/".Module::$module;
		
		if(is_dir($folder))
		{
			$valid = true;
		}
		else 
		{ 
			self::$message= "<b>404 NOT FOUND</b> Module <b>".Module::$module."</b> folder  !!"; 
		}
		return $valid;
	}

	//MENSAJE DE ERROR

	public static function Error()
	{
		echo self::$message;
		die();
	}
}

?>