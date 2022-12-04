<?
    //INSTANCIA DE LA CLASE CATEGORIAS

    $Ejecutar = new Sucursales ();

    if($_POST["Fp"])
    {
        //MANDAR LOS VALORES A LOS METODOS GETTERS Y SETTERS

        $Ejecutar->setNombre ($_POST["Fp"]);

        //INSERTAR LOS DATOS

        $Ejecutar->Insertar ();

        //CARGAR HACIA LA VISTA EMPLEADOS

       /* print "<script>
        window.location='index.php?view=Inventory'; 
        alert('Registro exitoso');
        </script>";*/
    }
?>