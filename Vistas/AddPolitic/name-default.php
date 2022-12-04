<?
    //INSTANCIA DE LA CLASE CATEGORIAS

    $Ejecutar = new Politicas ();

    if($_POST["Fp"] and $_POST["Fv"])
    {
        //MANDAR LOS VALORES A LOS METODOS GETTERS Y SETTERS

        $Ejecutar->setFechaVencimiento ($_POST["Fp"]);
        $Ejecutar->setFechaPolitica ($_POST["Fv"]);

        //INSERTAR LOS DATOS

        $Ejecutar->Insertar ();

        //CARGAR HACIA LA VISTA EMPLEADOS

       /* print "<script>
        window.location='index.php?view=Inventory'; 
        alert('Registro exitoso');
        </script>";*/
    }
?>