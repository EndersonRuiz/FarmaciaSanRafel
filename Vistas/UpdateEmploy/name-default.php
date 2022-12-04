<?

    //INSTANCIA DE LA CLASE EMPLEADOS

    $Ejecuta = new Empleados ();

    //MANDAR LOS VALORES RECIBIDOS DEL FORMULARIO ATRAVEZ DEL METODO POST

    $Ejecuta->setCodigo($_POST['Codigo']);
    $var = $Ejecuta->getCodigo ();
    $Ejecuta->setPrimerNombre($_POST['PrimerNombre']);
    $Ejecuta->setSegundoNombre($_POST['SegundoNombre']);
    $Ejecuta->setPrimerApellido($_POST['PrimerApellido']);
    $Ejecuta->setSegundoApellido($_POST['SegundoApellido']);
    $Ejecuta->setPuesto($_POST['Puesto']);
    $Ejecuta->setUsuario($_POST['Usuario']);
    $Ejecuta->setPassword($_POST['Contraseña']);

    //SI CAMBIAN LA CONTRASEÑA DE USUARIO

    if ($_POST['Contraseña'] == "")
    {
        
    }
    else
    {
        $Ejecuta->setCodigo($var);
        $Ejecuta->setPassword($_POST['Contraseña']);
        $Ejecuta->ActualizarPassword();
    }

    //ACTUALIZAR LOS DATOS INGRESADOS
        
    $Ejecuta->Modificar ();

    $id_insert = $var;

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

        $archivo = $ruta.$id_insert."-00".$id_insert.uniqid(rand());

        //VERIFICAMOS SI NO HA SIDO CREADA CON ANTERIORIDAD PARA PODER CREARLA

        function eliminarDir($carpeta)
        {
            foreach(glob($carpeta . "/*") as $archivos_carpeta)
            {
                if (is_dir($archivos_carpeta))
                {
                    eliminarDir($archivos_carpeta);
                }
                else
                {
                    unlink($archivos_carpeta);
                }
            }
            rmdir($carpeta);
        }

       eliminarDir('assets/FotosEmpleados/'.$id_insert);

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

    //CARGAR HACIA LA VISTA EMPLEADOS

    print "<script>
    window.location='index.php?view=Users'; 
    alert('Registro Actualizado');
    </script>";

    //header('Location: ../../views/Empleados/Empleados.php'); EN EL CASO DE HACERLO CON PHP
?>