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
        'Pedido',
        'DetallePedido',
        'Inventario',
        'Producto'
    );
    
    /* SE DEFINE LA LISTA DE COLUMNAS QUE SE DEVOLVERON PARA SER MOSTRADAS EN 
    LA TABLA HTML. 
    LOS NOMBRES DE ESTAS COLUMNAS DEBEN COINCIDIR CON LOS DE LAS COLUMNAS DE 
    LA(S) TABLA(S) AFECTADA(S) POR LA CONSULTA. */

    $columnasParaRetorno = array(
        $tablasDeBBDD[0].'.Codigo', 
        $tablasDeBBDD[1].'.Codigo',
        $tablasDeBBDD[2].'.Codigo', 
        $tablasDeBBDD[3].'.NombreProducto',
        $tablasDeBBDD[1].'.Cantidad',
        $tablasDeBBDD[0].'.Fecha'
    );

     $columnasParaRetorno_1 = array(
        $tablasDeBBDD[0].'.Codigo', 
        $tablasDeBBDD[1].'.Codigo as CodDetalle',
        $tablasDeBBDD[2].'.Codigo as ProductCode', 
        $tablasDeBBDD[3].'.NombreProducto',
        $tablasDeBBDD[1].'.Cantidad',
        $tablasDeBBDD[0].'.Fecha'
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

    $reglasDeFiltradoDeRelaciones = '(';
    $reglasDeFiltradoDeRelaciones .= " ".$tablasDeBBDD[1].".Pedido = ".$tablasDeBBDD[0].".Codigo ";
    $reglasDeFiltradoDeRelaciones .= "AND ".$tablasDeBBDD[2].".Codigo = ".$tablasDeBBDD[1].".IdInventario ";
    $reglasDeFiltradoDeRelaciones .= "AND ".$tablasDeBBDD[3].".Codigo = ".$tablasDeBBDD[2].".IdProducto)";


    
    /* SE COMPONE TODA LA REGLA DE FILTRADO. EN ESTE CASO INCLUYE LAS 
    CLAÚSULAS DE BÚSQUEDA, Y LAS RELACIONES ENTRE TABLAS. 
    SIGUE SIENDO UN EJEMPLO SIMPLE, PERO MÁS ELABORADO QUE EL ANTERIOR. 
    MÁS ADELANTE VEREMOS OTROS USOS. 
    LO IMPORTANTE AQUI ES QUE, ADEMÁS DE LAS CLAUSULAS DE BÚSQUEDA 
    (VARIABLE $reglasDeFiltradoDeUsuario, QUE PUEDEN EXISTIR O NO) 
    TAMBIÉN HAY UNA CLAÚSULA DE RELACIONES ENTRE LAS TABLAS. SI HAY MÁS 
    DE UNA TABLA SIEMPRE HABRÁ UNA CLAÚSULA DE RELACIONES ($reglasDeFiltradoDeRelaciones). 
    LAS IMPLEMENTAMOS COMO UNA MATRIZ PARA PODER COMPROBAR LAS QUE EXISTEN Y LAS QUE NO, 
    Y LUEGO LAS UNIMOS CON EL OPERADOR AND, SI HAY MÁS DE UNA CLAÚSULA DE FILTRADO. */

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
    if ($reglasDeFiltrado > "") $consulta .= "AND (".$reglasDeFiltrado.") group by DetallePedido.Codigo";
    $consulta .= $reglasDeOrdenacion;
    $consulta .= $reglaDeLimitacion;
    

    //echo $consulta."<br></br>";

    $hacerConsulta = $conexion->prepare($consulta);
    $hacerConsulta->execute();
    $DataSet = $hacerConsulta->fetchAll(PDO::FETCH_ASSOC);
    $hacerConsulta->closeCursor();
    

    $numeroDeRegistrosDelDataSet = count($DataSet);
    
    $consulta = "SELECT COUNT(DetallePedido.Codigo) FROM DetallePedido WHERE 1;";

    //echo "".$consulta;


    if ($reglasDeFiltrado > "") $consulta .= "AND (".$reglasDeFiltrado.") ";
    $hacerConsulta = $conexion->prepare($consulta);
    $hacerConsulta->execute();
    $totalDeRegistrosConFiltrado = $hacerConsulta->fetch(PDO::FETCH_NUM)[0];
    $hacerConsulta->closeCursor();


    $consulta = "SELECT COUNT(DetallePedido.Codigo) FROM DetallePedido WHERE 1;";
    $hacerConsulta = $conexion->prepare($consulta);
    $hacerConsulta->execute();
    $totalDeRegistrosEnBruto = $hacerConsulta->fetch(PDO::FETCH_NUM)[0];
    $hacerConsulta->closeCursor();

    $matrizDeSalida = array(
        "sEcho" => intval($datosDeLlamada['sEcho']),
        "iTotalRecords" => strval($totalDeRegistrosEnBruto),
        "iTotalDisplayRecords" => strval($totalDeRegistrosConFiltrado),
        "aaData" => array () 
    );
    foreach ($DataSet as $DL){
        $registro = array();
        foreach ($DL as $dato) $registro[] = $dato;
        $ProductId = $registro[2];
        $DetalleId = $registro[1];

        $registro[] = '<td><center><a href="#" data-toggle="modal" data-target="#infoProduct" onclick="DataProducts('.$ProductId.')"><i class="fa fa-eye"></i></a></center></td>';

        $registro[] = '<td><center><a href="#" data-toggle="modal" data-target="#infoCompra" onclick="DataFacture('.$DetalleId.')"><i class="fa fa-eye"></i></a></center></td>';

         $registro[] = "<td><center><a href='#' data-href='index.php?view=DeleteInventory&Codigo=".$ProductId."' data-toggle='modal' data-target='#confirm-delete'><span class='glyphicon glyphicon-trash'></span></a></td></td>";

        $matrizDeSalida['aaData'][] = $registro;
        unset($registro);
    }

    $salidaDeDataSet = json_encode ($matrizDeSalida, JSON_HEX_QUOT);
  
    echo $salidaDeDataSet;
?>