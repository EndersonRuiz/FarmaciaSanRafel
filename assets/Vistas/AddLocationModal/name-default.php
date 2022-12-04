<?
    //INSTANCIA DE LA CLASE CATEGORIAS

    $Ejecutar = new Ubicaciones ();

    if($_POST["Fp"] and $_POST["Fv"])
    {
        //MANDAR LOS VALORES A LOS METODOS GETTERS Y SETTERS

        $Ejecutar->setNombre ($_POST["Fp"]);
        $Ejecutar->setSeccion ($_POST["Fv"]);

        //INSERTAR LOS DATOS

        $Ejecutar->Insertar ();

        //CARGAR HACIA LA VISTA EMPLEADOS

       /* print "<script>
        window.location='index.php?view=Inventory'; 
        alert('Registro exitoso');
        </script>";*/
    }
?>