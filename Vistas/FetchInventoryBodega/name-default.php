<?php
    // Establecemos la codificacion para las llamadas y respuestas HTTP
    mb_internal_encoding ('UTF-8');

    /* CREAMOS LA CONEXION A LA BASE DE DATOS, O BIEN LA IMPORTAMOS 
    DESDE UN ARCHIVO EXTERNO DE CONFIGURACION. */

    $Conexion = new ClaseConexion ();
    $conexion = $Conexion->CrearConexion ();
    
    /* RECUPERAMOS TODOS LOS PARAMETROS DE $_GET. LOS QUE NO APAREZCAN EN LA CONSULTA 
    RECIBIRAN UN VALOR PREDETERMINADO. ESTOS DATOS SON LOS QUE SE RECIBEN CADA VEZ QUE EL 
    PLUGIN DATATABLES LLAMA A ESTE SCRIPT. */
    $datosDeLlamada = $_GET;

    /* SE INDICA(N) LA(S) TABLA(S) QUE SE VA(N) A USAR EN LA CONSULTA. */
    $tablasDeBBDD = array(
        'inventario', 
        'producto', 
        'categoria',
        'laboratorio',
        'casa',
        'marca'
    );
    
    /* SE DEFINE LA LISTA DE COLUMNAS QUE SE DEVOLVERON PARA SER MOSTRADAS EN 
    LA TABLA HTML. 
    LOS NOMBRES DE ESTAS COLUMNAS DEBEN COINCIDIR CON LOS DE LAS COLUMNAS DE 
    LA(S) TABLA(S) AFECTADA(S) POR LA CONSULTA. */

    $columnasParaRetorno = array(
        $tablasDeBBDD[0].'.Codigo', 
        $tablasDeBBDD[1].'.CodigoBarra', 
        $tablasDeBBDD[1].'.NombreProducto',
        $tablasDeBBDD[0].'.Existencia',
        $tablasDeBBDD[1].'.PrecioVenta',
        $tablasDeBBDD[2].'.Nombre',
        $tablasDeBBDD[4].'.Nombre',
        $tablasDeBBDD[5].'.Nombre'
    );


    $columnasParaRetorno_1 = array(
        $tablasDeBBDD[0].'.Codigo', 
        $tablasDeBBDD[1].'.CodigoBarra', 
        $tablasDeBBDD[1].'.NombreProducto',
        $tablasDeBBDD[0].'.Existencia',
        $tablasDeBBDD[1].'.PrecioVenta',
        $tablasDeBBDD[2].'.Nombre',
        $tablasDeBBDD[4].'.Nombre as NameCasa',
        $tablasDeBBDD[5].'.Nombre as NameMarca'
    );
    $numeroDeColumnas = count($columnasParaRetorno);

    //////////////////////////////////////////////// REGLAS DE FILTRADO ////////////////////////////
    /* PREPARAMOS EL FILTRADO POR COLUMNAS PARA LA CAJA DE BUSQUEDA */

    $reglasDeFiltradoDeUsuario = array ();
    if (isset($datosDeLlamada['sSearch']) && $datosDeLlamada['sSearch'] !== "") {
        for($i = 0; $i < $numeroDeColumnas; $i++) {
            if (isset ($datosDeLlamada['bSearchable_'.$i]) && $datosDeLlamada['bSearchable_'.$i] == 'true') {
                $reglasDeFiltradoDeUsuario[] = $columnasParaRetorno[$i]." LIKE '%".addslashes($datosDeLlamada['sSearch'])."%'";
            }
        }
    }
    if (!empty($reglasDeFiltradoDeUsuario)){
        $reglasDeFiltradoDeUsuario = ' ('.implode(" OR ", $reglasDeFiltradoDeUsuario).') ';
    } else {
        $reglasDeFiltradoDeUsuario = '';
    }

    /* PREPARAMOS LAS REGLAS DE FILTRADO DE RELACIONES ENTRE TABLAS. 
    ESTAS SE PROGRAMAN AQUI A MANO, PORQUE PUEDEN EXISTIR O NO, 
    DEPENDIENDO DE QUE SE USE UNA TABLA O MAS DE UNA. */

    $reglasDeFiltradoDeRelaciones = '';
    $reglasDeFiltradoDeRelaciones .= " (".$tablasDeBBDD[0].".IdProducto = ".$tablasDeBBDD[1].".Codigo ";
    $reglasDeFiltradoDeRelaciones .= " AND ".$tablasDeBBDD[4].".Codigo = ".$tablasDeBBDD[3].".IdCasa ";
    $reglasDeFiltradoDeRelaciones .= " AND ".$tablasDeBBDD[5].".Codigo = ".$tablasDeBBDD[3].".IdMarca ";
    $reglasDeFiltradoDeRelaciones .= " AND ".$tablasDeBBDD[3].".Codigo = ".$tablasDeBBDD[0].".IdLaboratorio ";
    $reglasDeFiltradoDeRelaciones .= "AND ".$tablasDeBBDD[1].".IdCategoria = ".$tablasDeBBDD[2].".Codigo AND inventario.IdSucursal = '3' ) ";
    
    /* SE COMPONE TODA LA REGLA DE FILTRADO. EN ESTE CASO INCLUYE LAS 
    CLA??SULAS DE B??SQUEDA, Y LAS RELACIONES ENTRE TABLAS. 
    SIGUE SIENDO UN EJEMPLO SIMPLE, PERO M??S ELABORADO QUE EL ANTERIOR. 
    M??S ADELANTE VEREMOS OTROS USOS. 
    LO IMPORTANTE AQUI ES QUE, ADEM??S DE LAS CLAUSULAS DE B??SQUEDA 
    (VARIABLE $reglasDeFiltradoDeUsuario, QUE PUEDEN EXISTIR O NO) 
    TAMBI??N HAY UNA CLA??SULA DE RELACIONES ENTRE LAS TABLAS. SI HAY M??S 
    DE UNA TABLA SIEMPRE HABR?? UNA CLA??SULA DE RELACIONES ($reglasDeFiltradoDeRelaciones). 
    LAS IMPLEMENTAMOS COMO UNA MATRIZ PARA PODER COMPROBAR LAS QUE EXISTEN Y LAS QUE NO, 
    Y LUEGO LAS UNIMOS CON EL OPERADOR AND, SI HAY M??S DE UNA CLA??SULA DE FILTRADO. */
    $reglasDeFiltrado = array();
    if ($reglasDeFiltradoDeUsuario > '') $reglasDeFiltrado[] = $reglasDeFiltradoDeUsuario;
    if ($reglasDeFiltradoDeRelaciones > '') $reglasDeFiltrado[] = $reglasDeFiltradoDeRelaciones;
    $reglasDeFiltrado = implode(" AND ", $reglasDeFiltrado);

//////////////////////////////////////////// FIN DE REGLAS DE FILTRADO ///////////////////////////
    
/////////////////////////// REGLAS DE ORDENACION ////////////////////////
    /* SE COMPONE LA REGLA DE ORDENACION. */
    $reglasDeOrdenacion = array ();
    if (isset($datosDeLlamada['iSortCol_0'] )) {
        $columnasDeOrdenacion = intval($datosDeLlamada['iSortingCols']);
        for($i = 0; $i < $columnasDeOrdenacion; $i ++) {
            if ($datosDeLlamada['bSortable_'.intval($datosDeLlamada['iSortCol_'.$i])] == 'true') {
                $reglasDeOrdenacion [] = $columnasParaRetorno[intval($datosDeLlamada['iSortCol_'.$i])].($datosDeLlamada['sSortDir_'.$i] === 'asc'?' asc':' desc');
            }
        }
    }

    if (!empty($reglasDeOrdenacion)) {
        $reglasDeOrdenacion = " ORDER BY ".implode(", ", $reglasDeOrdenacion);
    } else {
        $reglasDeOrdenacion = "";
    }
    
    /* SE COMPONE LA REGLA DE LIMITACION DE REGISTROS. */
    $reglaDeLimitacion = ($datosDeLlamada['iDisplayLength'] > 0)?' LIMIT '.$datosDeLlamada['iDisplayStart'].', '.$datosDeLlamada['iDisplayLength'].';':';';
/////////////////////////////////////// FIN DE REGLAS DE ORDENACION ////////////////////

    /* SE PREPARA LA CONSULTA DE RECUPERACION DEL DATASET SOLICITADO. */
    $consulta = "SELECT ".implode(', ', $columnasParaRetorno_1)." ";
    $consulta .= "FROM ".implode(', ', $tablasDeBBDD)." ";
    $consulta .= "WHERE 1 ";
    if ($reglasDeFiltrado > "") $consulta .= "AND (".$reglasDeFiltrado.") ";
    $consulta .= $reglasDeOrdenacion;
    $consulta .= $reglaDeLimitacion;


   // echo $consulta."<br></br>";



    $hacerConsulta = $conexion->prepare($consulta);
    $hacerConsulta->execute();
    $DataSet = $hacerConsulta->fetchAll(PDO::FETCH_ASSOC);
    $hacerConsulta->closeCursor();
    
    /* SI ES NECESARIO ADAPTAR ALGUN DATO PARA PRESENTACION, SE ADAPTA AQUI. 
    SI ES NECESARIOS AGREGAR ENLACES, REFERENCIAS A IMAGENES, O CUALQUIER OTRA COSA, 
    SE INCLUYE EN ESTA SECCION. 
    EN ESTE CASO, LO ??NICO QUE VAMOS A HACER ES DARLE FORMATO AL SALARIO ANUAL. 
    foreach ($DataSet as $keyDL=>$DL){
        $DataSet[$keyDL]['fecha_de_ingreso'] = date("d-m-Y", strtotime($DL['fecha_de_ingreso']));
        $DataSet[$keyDL]['salario_bruto_anual'] = number_format($DL['salario_bruto_anual'], 2, ",", ".").' ???';
    }*/
    
    /* CALCULO DE DATOS INFORMATIVOS DE REGISTROS. */
    $numeroDeRegistrosDelDataSet = count($DataSet);
    
    /* CALCULO DEL TOTAL DE REGISTROS QUE CUMPLEN LAS REGLAS 
    DE FILTRADO SIN ORDENACION NI LIMITACION. */
    $consulta = "SELECT COUNT(".$columnasParaRetorno[0].") ";
    $consulta .= "FROM ".implode(', ', $tablasDeBBDD)." ";
    $consulta .= "WHERE 1 ";
    if ($reglasDeFiltrado > "") $consulta .= "AND (".$reglasDeFiltrado.") ";
    $hacerConsulta = $conexion->prepare($consulta);
    $hacerConsulta->execute();
    $totalDeRegistrosConFiltrado = $hacerConsulta->fetch(PDO::FETCH_NUM)[0];
    $hacerConsulta->closeCursor();
    /* TOTAL DE REGISTROS DE LA TABLA PRIMARIA (O UNICA, SI SOLO HAY UNA). */
    $consulta = "SELECT COUNT(".$columnasParaRetorno[0].") ";
    $consulta .= "FROM ".$tablasDeBBDD[0].";";
    $hacerConsulta = $conexion->prepare($consulta);
    $hacerConsulta->execute();
    $totalDeRegistrosEnBruto = $hacerConsulta->fetch(PDO::FETCH_NUM)[0];
    $hacerConsulta->closeCursor();

    // SE PREPARA UNA MATRIZ CON TODOS LOS DATOS NECESARIOS PARA LA SALIDA.
    $matrizDeSalida = array(
        "sEcho" => intval($datosDeLlamada['sEcho']),
        "iTotalRecords" => strval($totalDeRegistrosEnBruto),
        "iTotalDisplayRecords" => strval($totalDeRegistrosConFiltrado),
        "aaData" => array () 
    );
    foreach ($DataSet as $DL){
        $registro = array();
        foreach ($DL as $dato) $registro[] = $dato;
        $ProductId = $registro[0];

        $registro[] = '<td><center><a href="#" data-toggle="modal" data-target="#infoProduct" onclick="DataProduct('.$ProductId.')"><i class="fa fa-eye"></i></a></center></td>';

         $registro[] = '<td><center><a class="btn btn-primary" href="#" data-toggle="modal" data-target="#" onclick="IngresarProducto('.$ProductId.')">Entrada</a></center></form></td>';

        $matrizDeSalida['aaData'][] = $registro;
        unset($registro);
    }

    $salidaDeDataSet = json_encode ($matrizDeSalida, JSON_HEX_QUOT);
    
    /* SE DEVUELVE LA SALIDA */
    echo $salidaDeDataSet;
?>