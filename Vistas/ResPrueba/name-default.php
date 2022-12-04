<?php
	
	$Conexion = new ClaseConexion ();
	$ConexionSql = $Conexion->CrearConexion ();

	/* Nombre de La Tabla */
	$sTabla = array(
		'inventario',
        'producto',
        'categoria',
        'ubicacion',
        'sucursales'
	);
	
	/* Array que contiene los nombres de las columnas de la tabla*/
	$aColumnas = array(
		'inventario.Codigo', 
        'producto.CodigoBarra', 
        'producto.NombreProducto',
        'categoria.Nombre',
        'inventario.Existencia',
        'iroducto.PrecioVenta'
	);
	
	/* columna indexada */
	$sIndexColumn = "inventario.Codigo";
	
	// Paginacion

	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
		$sLimit = "LIMIT ".$_GET['iDisplayStart'].", ".$_GET['iDisplayLength'];
	}
	
	
	//Ordenacion
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
		{
			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
			{
				$sOrder .= $aColumnas[ intval( $_GET['iSortCol_'.$i] ) ]."
				".$_GET['sSortDir_'.$i] .", ";
			}
		}
		
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}
	}
	
	//Filtracion
	
	$sWhere = "WHERE producto.Codigo = inventario.IdProducto AND categoria.Codigo = producto.IdCategoria and ubicacion.Codigo = inventario.IdUbicacion AND sucursales.Codigo = inventario.IdSucursal GROUP by inventario.Codigo";
	
	if ( $_GET['sSearch'] != "" )
	{
		$sWhere = "WHERE (";
		for ( $i=0 ; $i<count($aColumnas) ; $i++ )
		{
			$sWhere .= $aColumnas[$i]." LIKE '%".$_GET['sSearch']."%' OR ";
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}
	
	// Filtrado de columna individual 

	for ( $i=0 ; $i<count($aColumnas) ; $i++ )
	{
		if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= $aColumnas[$i]." LIKE '%".$_GET['sSearch_'.$i]."%' ";
		}
	}
	
	
	//Obtener datos para mostrar SQL queries
	$sQuery = "
	SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumnas))."
	FROM   $sTabla[0],$sTabla[1],$sTabla[2],$sTabla[3],$sTabla[4]
	$sWhere
	$sOrder
	$sLimit
	";
	//echo "".$sQuery."<br></br>";

	$rResult = $ConexionSql->prepare($sQuery);
	$rResult->execute();
	
	/* Data set length after filtering */

	$sQuery = "
	SELECT FOUND_ROWS()
	";
	$rResultFilterTotal = $ConexionSql->prepare($sQuery);
	$rResultFilterTotal->execute();
	$aResultFilterTotal = $rResultFilterTotal->fetch();
	$iFilteredTotal = $aResultFilterTotal[0];

	
	/* Total data set length */
	$sQuery = "
	SELECT COUNT(".$sIndexColumn.")
	FROM   $sTabla[0]
	";
	$rResultTotal = $ConexionSql->prepare($sQuery);
	$rResultTotal->execute();
	$aResultTotal = $rResultTotal->fetch();
	$iTotal = $aResultTotal[0];
	
	/*
		* Output
	*/
	$output = array(
	"sEcho" => intval($_GET['sEcho']),
	"iTotalRecords" => $iTotal,
	"iTotalDisplayRecords" => $iFilteredTotal,
	"aaData" => array()
	);

	$ProductId;
	
	while ( $aRow = $rResult->fetch())
	{
		$row = array();
		for ( $i=0 ; $i<count($aColumnas) ; $i++ )
		{
			if ( $aColumnas[$i] == "version" )
			{
				/* Special output formatting for 'version' column */
				$row[] = ($aRow[ $aColumnas[$i] ]=="0") ? '-' : $aRow[ $aColumnas[$i] ];
			}
			else if ( $aColumnas[$i] != ' ')
			{
				/* General output */

				$row[] = $aRow[$i];
				$ProductId = $aRow[0];
			}
		}

		//$row[] = '<td><center><a href="#" data-toggle="modal" data-target="#infoProduct" onclick="DataProduct('.$ProductId.')"><i class="fa fa-eye"></i></a></center></td>';
		
		$output['aaData'][] = $row;
	}
	
	echo json_encode( $output );
?>