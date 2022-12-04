<?

	//LLAMADA AL MODELO EMPLEADOS

	require_once 'models/ModeloEmpleados.php';

	//INSTANCIA DE LA CLASE EMPLEADOS

	$Ejecuta = new Empleados ();

    //LLAMAR AL METODO QUE OBTIENE EL CODIGO DEL ULTIMO REGISTRO YA QUE SERVIRA COMO REFERENCIA
    //PARA PODER CREAR LA NUEVA CARPETA EN EL SERVIDOR WEB

	$Ejecuta->ObtenerCodigo ();

    //EL VALOR OBTENIDO ES ALMACENADO TEMPORALMENTE EN UNA VARIABLE SUMANDOLE 1 
    //PARA PODER CREAR UN DIRECTORIO QUE AUN NO EXISTA

    $id_insert = $Ejecuta->getCodigo () + 1;

    //COMPROBAR SI EL ARCHIVO O FOTO NO PROPORCIONE ERRORES
    
    if($_FILES["archivo"]["error"]>0)
    {
        //echo "Error al cargar archivo"; 
    } 
    else 
    {    
        //ESTABLECEMOS EL LIMITE DEL TAMAÑO DEL ARCHIVO EN KB

        $limite_kb = 20000;

        //INDICAMOS EL NOMBRE DE LA RUTA DONDE SE ALMACENARA

        $ruta = 'assets/FotosEmpleados/'.$id_insert.'/';

        //INDICAMOS LA RUTA MAS EL NOMBRE DEL ARCHIVO

        $archivo = $ruta.$id_insert."-00".$id_insert;

        //VERIFICAMOS SI NO HA SIDO CREADA CON ANTERIORIDAD PARA PODER CREARLA
        
        if(!file_exists($ruta))
        {
            mkdir($ruta);
        }
        
        //SI NO EXISTE COPIAMOS

        if(!file_exists($archivo))
        {    
            $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);
            
            if($resultado)
            {
                //echo "Archivo Guardado".$id_insert;
            } 
            else 
            {
                //echo "Error al guardar archivo";
            }
        } 
        else 
        {
            echo "Archivo ya existe";
        }
    }


	//MANDAR LOS VALORES RECIBIDOS DEL FORMULARIO ATRAVEZ DEL METODO POST

	$Ejecuta->setCodigo($_POST['Codigo']);
	$Ejecuta->setPrimerNombre($_POST['PrimerNombre']);
	$Ejecuta->setSegundoNombre($_POST['SegundoNombre']);
	$Ejecuta->setPrimerApellido($_POST['PrimerApellido']);
	$Ejecuta->setSegundoApellido($_POST['SegundoApellido']);
	$Ejecuta->setPuesto($_POST['Puesto']);
	$Ejecuta->setUsuario($_POST['Usuario']);
	$Ejecuta->setPassword($_POST['Contrasena']);

	//INSERTAR LOS DATOS INGRESADOS

	$Ejecuta->VerificaExiste ($_POST['Usuario']);

	//header('Location: ../../views/Empleados/Empleados.php'); EN EL CASO DE HACERLO CON PHP
?>