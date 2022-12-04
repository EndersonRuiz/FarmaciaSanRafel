<?

	//INSTANCIA DE LA CLASE PRODUCTOS

	$Ejecuta = new Productos ();
    
    //MANDAR LOS VALORES RECIBIDOS DEL FORMULARIO ATRAVEZ DEL METODO POST

    $Ejecuta->setCodigo($_POST['Codigo']);

    $id_insert = $Ejecuta->getCodigo ();

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

        $ruta = 'assets/FotosProductos/'.$id_insert.'/';

        //INDICAMOS LA RUTA MAS EL NOMBRE DEL ARCHIVO

        $archivo = $ruta.$_FILES["archivo"]["name"].".Sfr";

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

        eliminarDir('assets/FotosProductos/'.$id_insert);

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

    $Ejecuta->setCodigoBarra($_POST['CodigoBarra']);
    $Ejecuta->setNombre($_POST['Nombre']);
    $Ejecuta->setCategoria($_POST['Categoria']);
    $Ejecuta->setPrecioCosto ($_POST['PrecioCosto']);
    $Ejecuta->setPrecioVenta ($_POST['PrecioVenta']);
    $Ejecuta->setPrecioTope ($_POST['PrecioTope']);
    $Ejecuta->setDescripcion ($_POST['Descripcion']);

    //REGISTRAR EL PRODUCTO 

    $Ejecuta->Actualizar();

    //MANDAR A ALMACENAR LOS DESCUENTOS

    $Cod1 = array_column($Ejecuta->ObtenerDescuentosModalCodigo($id_insert),'value')[0];
    $Cod2 = array_column($Ejecuta->ObtenerDescuentosModalCodigo($id_insert),'value')[1];
    $Cod3 = array_column($Ejecuta->ObtenerDescuentosModalCodigo($id_insert),'value')[2];
    $Cod4 = array_column($Ejecuta->ObtenerDescuentosModalCodigo($id_insert),'value')[3];
    $Cod5 = array_column($Ejecuta->ObtenerDescuentosModalCodigo($id_insert),'value')[4];
    $Cod6 = array_column($Ejecuta->ObtenerDescuentosModalCodigo($id_insert),'value')[5];

    if (isset($_REQUEST['Descuento1']))
    {
        $Ejecuta->setDescuento ('0');
        $Ejecuta->setEstado ('0');
        $Ejecuta->setProd ($id_insert);
        $Ejecuta->ActualizarDescuento($id_insert,$Cod1);
    }
    else
    {
        $Ejecuta->setDescuento ('0');
        $Ejecuta->setEstado ('0');
        $Ejecuta->setProd ($id_insert);
        $Ejecuta->ActualizarDescuento($id_insert,$Cod1);
    }



    if (isset($_REQUEST['Descuento2']))
    {
        $Ejecuta->setDescuento ('10');
        $Ejecuta->setEstado ('0');
        $Ejecuta->setProd ($id_insert);
        $Ejecuta->ActualizarDescuento($id_insert,$Cod2);
    }
    else
    {
        $Ejecuta->setDescuento ('0');
        $Ejecuta->setEstado ('0');
        $Ejecuta->setProd ($id_insert);
        $Ejecuta->ActualizarDescuento($id_insert,$Cod2);
    }

    if (isset($_REQUEST['Descuento3']))
    {
        $Ejecuta->setDescuento ('15');
        $Ejecuta->setEstado ('0');
        $Ejecuta->setProd ($id_insert);
        $Ejecuta->ActualizarDescuento($id_insert,$Cod3);
    }
    else
    {
        $Ejecuta->setDescuento ('0');
        $Ejecuta->setEstado ('0');
        $Ejecuta->setProd ($id_insert);
        $Ejecuta->ActualizarDescuento($id_insert,$Cod3);
    }

    if (isset($_REQUEST['Descuento4']))
    {
        $Ejecuta->setDescuento ('20');
        $Ejecuta->setEstado ('0');
        $Ejecuta->setProd ($id_insert);
        $Ejecuta->ActualizarDescuento($id_insert,$Cod4);
    }
    else
    {
        $Ejecuta->setDescuento ('0');
        $Ejecuta->setEstado ('0');
        $Ejecuta->setProd ($id_insert);
        $Ejecuta->ActualizarDescuento($id_insert,$Cod4);
    }

    if (isset($_REQUEST['Descuento5']))
    {
        $Ejecuta->setDescuento ('25');
        $Ejecuta->setEstado ('0');
        $Ejecuta->setProd ($id_insert);
        $Ejecuta->ActualizarDescuento($id_insert,$Cod5);
    }
    else
    {
        $Ejecuta->setDescuento ('0');
        $Ejecuta->setEstado ('0');
        $Ejecuta->setProd ($id_insert);
        $Ejecuta->ActualizarDescuento($id_insert,$Cod5);
    }

    if (isset($_REQUEST['Descuento6']))
    {
        $Ejecuta->setDescuento ('35');
        $Ejecuta->setEstado ('0');
        $Ejecuta->setProd ($id_insert);
        $Ejecuta->ActualizarDescuento($id_insert,$Cod6);
    }
    else
    {
        $Ejecuta->setDescuento ('0');
        $Ejecuta->setEstado ('0');
        $Ejecuta->setProd ($id_insert);
        $Ejecuta->ActualizarDescuento($id_insert,$Cod6);
    }

	//CARGAR HACIA LA VISTA PRODUCTOS

	print "<script>
	window.location='index.php?view=Products'; 
	alert('Registro actualizado');
	</script>";

	//header('Location: ../../views/Empleados/Empleados.php'); EN EL CASO DE HACERLO CON PHP
?>