<?php
	
	class Autoproducos
	{
		private $Conexion;
		private $ConexionSql;
		private $SentenciaSql;
		private $Stm;
		private $Result;

		public function __construct()
		{
			$this->Conexion = new ClaseConexion ();
		}
		
		//METODO PARA BUSCAR PRODUCTOS EN EL CHOSEN

		public function buscarProducto ($Producto)
		{
			try
			{
				$datos = array();
				$this->ConexionSql = $this->Conexion->CrearConexion ();
				$this->SentenciaSql = "SELECT producto.Codigo,producto.CodigoBarra,producto.NombreProducto,categoria.Nombre,categoria.Medida FROM producto,categoria  WHERE categoria.Codigo = producto.IdCategoria and CONCAT (CodigoBarra,NombreProducto) LIKE CONCAT('%".$Producto."%') limit 30";
				$this->Stm = $this->ConexionSql->prepare($this->SentenciaSql);
				$this->Stm->execute();
				$this->Result = $this->Stm->fetchAll();
				foreach ($this->Result as $key => $value) {
					$datos[] = array("value" => $value['Codigo'],
						"caption" => $value['NombreProducto']." = (".$value['Nombre']." ".$value['Medida'].")"
				);}
				return $datos;
			}
		    catch(Exception $e)
		    {
		    	echo "Error al buscar".$e->getMessage();
		    }
		    finally
		    {
		    	$this->Conexion->CerrarConexion ();
		    }
		}

		//METODO PARA BUSCAR CATEGORIAS EN EL CHOSEN

		public function buscarCategorias ($Producto)
		{
			try
			{
				$datos = array();
				$this->ConexionSql = $this->Conexion->CrearConexion ();
				$this->SentenciaSql = "SELECT Codigo,Nombre,Medida FROM categoria WHERE CONCAT(Nombre,Medida) LIKE CONCAT('%".$Producto."%') limit 30";
				$this->Stm = $this->ConexionSql->prepare($this->SentenciaSql);
				$this->Stm->execute();
				$this->Result = $this->Stm->fetchAll();
				foreach ($this->Result as $key => $value) {
					$datos[] = array("value" => $value['Codigo'],
						"caption" => $value['Nombre']." (".$value['Medida'].")"
				);}
				return $datos;
			}
		    catch(Exception $e)
		    {
		    	echo "Error al buscar".$e->getMessage();
		    }
		    finally
		    {
		    	$this->Conexion->CerrarConexion ();
		    }
		}


		//METODO PARA BUSCAR LABORATORIOS

		public function buscarLaboratorios ($Producto)
		{
			try
			{
				$datos = array();
				$this->ConexionSql = $this->Conexion->CrearConexion ();
				$this->SentenciaSql = "SELECT laboratorio.Codigo as LabCod,casa.Nombre as NomCasa, marca.Nombre as NomMarca FROM laboratorio,casa,marca WHERE casa.Codigo = laboratorio.IdCasa and marca.Codigo = laboratorio.IdMarca and CONCAT(casa.Nombre,marca.Nombre) LIKE CONCAT('%".$Producto."%') limit 30";
				$this->Stm = $this->ConexionSql->prepare($this->SentenciaSql);
				$this->Stm->execute();
				$this->Result = $this->Stm->fetchAll();
				foreach ($this->Result as $key => $value) {
					$datos[] = array("value" => $value['LabCod'],
						"caption" => $value['NomCasa']." (".$value['NomMarca'].")"
				);}
				return $datos;
			}
		    catch(Exception $e)
		    {
		    	echo "Error al buscar".$e->getMessage();
		    }
		    finally
		    {
		    	$this->Conexion->CerrarConexion ();
		    }
		}

		//METODO PARA BUSCAR POLITICAS

		public function buscarPoliticas ($Producto)
		{
			try
			{
				$datos = array();
				$this->ConexionSql = $this->Conexion->CrearConexion ();
				$this->SentenciaSql = "SELECT Codigo,FechaVencimiento,FechaPolitica FROM politica WHERE CONCAT(FechaVencimiento,FechaPolitica) LIKE CONCAT('%".$Producto."%') limit 30";
				$this->Stm = $this->ConexionSql->prepare($this->SentenciaSql);
				$this->Stm->execute();
				$this->Result = $this->Stm->fetchAll();
				foreach ($this->Result as $key => $value) {
					$datos[] = array("value" => $value['Codigo'],
						"caption" => "Vencimiento (".$value['FechaVencimiento'].")   Politica (".$value['FechaPolitica'].")"
				);}
				return $datos;
			}
		    catch(Exception $e)
		    {
		    	echo "Error al buscar".$e->getMessage();
		    }
		    finally
		    {
		    	$this->Conexion->CerrarConexion ();
		    }
		}

		//METODO PARA BUSCAR POLITICAS

		public function buscarUbicaciones ($Producto)
		{
			try
			{
				$datos = array();
				$this->ConexionSql = $this->Conexion->CrearConexion ();
				$this->SentenciaSql = "SELECT Codigo,Nombre,Seccion FROM ubicacion WHERE CONCAT(Nombre,Seccion) LIKE CONCAT('%".$Producto."%') limit 30";
				$this->Stm = $this->ConexionSql->prepare($this->SentenciaSql);
				$this->Stm->execute();
				$this->Result = $this->Stm->fetchAll();
				foreach ($this->Result as $key => $value) {
					$datos[] = array("value" => $value['Codigo'],
						"caption" => $value['Nombre']." (".$value['Seccion'].")"
				);}
				return $datos;
			}
		    catch(Exception $e)
		    {
		    	echo "Error al buscar".$e->getMessage();
		    }
		    finally
		    {
		    	$this->Conexion->CerrarConexion ();
		    }
		}

		//METODO PARA BUSCAR SUCURSAL

		public function buscarSucursales ($Producto)
		{
			try
			{
				$datos = array();
				$this->ConexionSql = $this->Conexion->CrearConexion ();
				$this->SentenciaSql = "SELECT * FROM sucursales WHERE Nombre LIKE CONCAT('%".$Producto."%') limit 30";
				$this->Stm = $this->ConexionSql->prepare($this->SentenciaSql);
				$this->Stm->execute();
				$this->Result = $this->Stm->fetchAll();
				foreach ($this->Result as $key => $value) {
					$datos[] = array("value" => $value['Codigo'],
						"caption" => $value['Nombre']
				);}
				return $datos;
			}
		    catch(Exception $e)
		    {
		    	echo "Error al buscar".$e->getMessage();
		    }
		    finally
		    {
		    	$this->Conexion->CerrarConexion ();
		    }
		}

		//METODO PARA BUSCAR PRODUCTOS EN EL CHOSEN A COMPRAR

		public function buscarProductoComprar ($Producto)
		{
			try
			{
				$datos = array();
				$this->ConexionSql = $this->Conexion->CrearConexion ();
				$this->SentenciaSql = "SELECT inventario.Codigo,producto.CodigoBarra,producto.NombreProducto,sucursales.Nombre as NameSucursal,casa.Nombre as NameHome, marca.Nombre as MarkName FROM producto,inventario,sucursales,laboratorio,casa,marca  WHERE inventario.IdProducto = producto.Codigo AND inventario.IdSucursal = sucursales.Codigo 
				and sucursales.Codigo = 3  and casa.Codigo = laboratorio.IdCasa and marca.Codigo = laboratorio.IdMarca and laboratorio.Codigo = inventario.IdLaboratorio  AND CONCAT (producto.CodigoBarra,producto.NombreProducto) LIKE CONCAT ('%".$Producto."%') GROUP BY inventario.Codigo LIMIT 30";
				$this->Stm = $this->ConexionSql->prepare($this->SentenciaSql);
				$this->Stm->execute();
				$this->Result = $this->Stm->fetchAll();
				foreach ($this->Result as $key => $value) {
					$datos[] = array("value" => $value['Codigo'],
						"caption" => $value['NombreProducto']
				);}
				return $datos;
			}
		    catch(Exception $e)
		    {
		    	echo "Error al buscar".$e->getMessage();
		    }
		    finally
		    {
		    	$this->Conexion->CerrarConexion ();
		    }
		}

		//METODO PARA BUSCAR PRODUCTOS EN EL CHOSEN A VENDER

		public function buscarProductoSanRafael ($Producto)
		{
			try
			{
				$datos = array();
				$this->ConexionSql = $this->Conexion->CrearConexion ();
				$this->SentenciaSql = "SELECT inventario.Codigo,producto.CodigoBarra,producto.NombreProducto,inventario.Existencia,categoria.Nombre as NameCategory, categoria.Medida FROM producto,inventario,sucursales,categoria WHERE inventario.IdProducto = producto.Codigo AND categoria.Codigo = producto.IdCategoria AND inventario.IdSucursal = sucursales.Codigo AND CONCAT (producto.CodigoBarra,producto.NombreProducto) LIKE CONCAT ('%".$Producto."%') AND sucursales.Codigo = '4' GROUP BY inventario.Codigo LIMIT 30";
				$this->Stm = $this->ConexionSql->prepare($this->SentenciaSql);
				$this->Stm->execute();
				$this->Result = $this->Stm->fetchAll();
				foreach ($this->Result as $key => $value) {
					$datos[] = array("value" => $value['Codigo'],
						"caption" => $value['NombreProducto']." = ".$value['NameCategory']."(".$value['Medida'].")"
				);}
				return $datos;
			}
		    catch(Exception $e)
		    {
		    	echo "Error al buscar".$e->getMessage();
		    }
		    finally
		    {
		    	$this->Conexion->CerrarConexion ();
		    }
		}



		//METODO PARA BUSCAR PRODUCTOS EN EL CHOSEN A VENDER EN LA SUCURSAL SAN RAFAEL _1

		public function buscarProductoSanRafael_1 ($Producto)
		{
			try
			{
				$datos = array();
				$this->ConexionSql = $this->Conexion->CrearConexion ();
				$this->SentenciaSql = "SELECT inventario.Codigo,producto.CodigoBarra,producto.NombreProducto,inventario.Existencia,categoria.Nombre as NameCategory, categoria.Medida FROM producto,inventario,sucursales,categoria WHERE inventario.IdProducto = producto.Codigo AND categoria.Codigo = producto.IdCategoria AND inventario.IdSucursal = sucursales.Codigo AND CONCAT (producto.CodigoBarra,producto.NombreProducto) LIKE CONCAT ('%".$Producto."%') AND sucursales.Codigo = '5' GROUP BY inventario.Codigo LIMIT 30";
				$this->Stm = $this->ConexionSql->prepare($this->SentenciaSql);
				$this->Stm->execute();
				$this->Result = $this->Stm->fetchAll();
				foreach ($this->Result as $key => $value) {
					$datos[] = array("value" => $value['Codigo'],
						"caption" => $value['NombreProducto']." = ".$value['NameCategory']."(".$value['Medida'].")"
				);}
				return $datos;
			}
		    catch(Exception $e)
		    {
		    	echo "Error al buscar".$e->getMessage();
		    }
		    finally
		    {
		    	$this->Conexion->CerrarConexion ();
		    }
		}

		//METODO PARA BUSCAR PRODUCTOS EN EL CHOSEN A VENDER EN LA SUCURSAL SAN RAFAEL _1

		public function buscarComprasPorNumFac($Producto)
		{
			try
			{
				$datos = array();
				$this->ConexionSql = $this->Conexion->CrearConexion ();
				$this->SentenciaSql = "select a.codigo,a.fecha,a.NumeroFactura,a.Laboratorio,a.Total
                    from compra a where a.NumeroFactura like concat('%".$Producto."%');";
				$this->Stm = $this->ConexionSql->prepare($this->SentenciaSql);
				$this->Stm->execute();
				$this->Result = $this->Stm->fetchAll();
				foreach ($this->Result as $key => $value) {
					$datos[] = array("value" => $value['codigo'],
						"caption" => $value['NumeroFactura']." = ".$value['Laboratorio']."(".$value['Total'].")"
				);}
				return $datos;
			}
		    catch(Exception $e)
		    {
		    	echo "Error al buscar".$e->getMessage();
		    }
		    finally
		    {
		    	$this->Conexion->CerrarConexion ();
		    }
		}

		public function buscarProductoSanJuan($Producto)
		{
			try
			{
				$datos = array();
				$this->ConexionSql = $this->Conexion->CrearConexion ();
				$this->SentenciaSql = "SELECT inventario.Codigo,producto.CodigoBarra,producto.NombreProducto,inventario.Existencia,categoria.Nombre as NameCategory, categoria.Medida FROM producto,inventario,sucursales,categoria WHERE inventario.IdProducto = producto.Codigo AND categoria.Codigo = producto.IdCategoria AND inventario.IdSucursal = sucursales.Codigo AND CONCAT (producto.CodigoBarra,producto.NombreProducto) LIKE CONCAT ('%".$Producto."%') AND sucursales.Codigo = '1' GROUP BY inventario.Codigo LIMIT 30";
				$this->Stm = $this->ConexionSql->prepare($this->SentenciaSql);
				$this->Stm->execute();
				$this->Result = $this->Stm->fetchAll();
				foreach ($this->Result as $key => $value) {
					$datos[] = array("value" => $value['Codigo'],
						"caption" => $value['NombreProducto']." = ".$value['NameCategory']."(".$value['Medida'].")"
				);}
				return $datos;
			}
		    catch(Exception $e)
		    {
		    	echo "Error al buscar".$e->getMessage();
		    }
		    finally
		    {
		    	$this->Conexion->CerrarConexion ();
		    }
		}

		//METODO PARA BUSCAR PRODUCTOS EN EL CHOSEN A VENDER EN LA SUCURSAL SAN RAFAEL _1

		public function buscarProductoBodega($Producto)
		{
			try
			{
				$datos = array();
				$this->ConexionSql = $this->Conexion->CrearConexion ();
				$this->SentenciaSql = "SELECT inventario.Codigo,producto.CodigoBarra,producto.NombreProducto,inventario.Existencia,categoria.Nombre as NameCategory, categoria.Medida FROM producto,inventario,sucursales,categoria WHERE inventario.IdProducto = producto.Codigo AND categoria.Codigo = producto.IdCategoria AND inventario.IdSucursal = sucursales.Codigo AND CONCAT (producto.CodigoBarra,producto.NombreProducto) LIKE CONCAT ('%".$Producto."%') AND sucursales.Codigo = '3' GROUP BY inventario.Codigo LIMIT 30";
				$this->Stm = $this->ConexionSql->prepare($this->SentenciaSql);
				$this->Stm->execute();
				$this->Result = $this->Stm->fetchAll();
				foreach ($this->Result as $key => $value) {
					$datos[] = array("value" => $value['Codigo'],
						"caption" => $value['NombreProducto']." = ".$value['NameCategory']."(".$value['Medida'].")"
				);}
				return $datos;
			}
		    catch(Exception $e)
		    {
		    	echo "Error al buscar".$e->getMessage();
		    }
		    finally
		    {
		    	$this->Conexion->CerrarConexion ();
		    }
		}

		//METODO PARA BUSCAR PRODUCTOS EN EL CHOSEN A VENDER EN LA SUCURSAL SAN RAFAEL _1

		public function buscarProductoBodeguita($Producto)
		{
			try
			{
				$datos = array();
				$this->ConexionSql = $this->Conexion->CrearConexion ();
				$this->SentenciaSql = "SELECT inventario.Codigo,producto.CodigoBarra,producto.NombreProducto,inventario.Existencia,categoria.Nombre as NameCategory, categoria.Medida FROM producto,inventario,sucursales,categoria WHERE inventario.IdProducto = producto.Codigo AND categoria.Codigo = producto.IdCategoria AND inventario.IdSucursal = sucursales.Codigo AND CONCAT (producto.CodigoBarra,producto.NombreProducto) LIKE CONCAT ('%".$Producto."%') AND sucursales.Codigo = '2' GROUP BY inventario.Codigo LIMIT 30";
				$this->Stm = $this->ConexionSql->prepare($this->SentenciaSql);
				$this->Stm->execute();
				$this->Result = $this->Stm->fetchAll();
				foreach ($this->Result as $key => $value) {
					$datos[] = array("value" => $value['Codigo'],
						"caption" => $value['NombreProducto']." = ".$value['NameCategory']."(".$value['Medida'].")"
				);}
				return $datos;
			}
		    catch(Exception $e)
		    {
		    	echo "Error al buscar".$e->getMessage();
		    }
		    finally
		    {
		    	$this->Conexion->CerrarConexion ();
		    }
		}

		//METODO PARA BUSCAR USUARIO EN EL CHOSEN

		public function buscarUsuario ($Producto)
		{
			try
			{
				$datos = array();
				$this->ConexionSql = $this->Conexion->CrearConexion ();
				$this->SentenciaSql = "SELECT Codigo,PrimerNombre,PrimerApellido FROM usuario WHERE CONCAT(PrimerNombre,PrimerApellido) LIKE CONCAT('%".$Producto."%') limit 30";
				$this->Stm = $this->ConexionSql->prepare($this->SentenciaSql);
				$this->Stm->execute();
				$this->Result = $this->Stm->fetchAll();
				foreach ($this->Result as $key => $value) {
					$datos[] = array("value" => $value['Codigo'],
						"caption" => $value['PrimerNombre']." ".$value['PrimerApellido'].""
				);}
				return $datos;
			}
		    catch(Exception $e)
		    {
		    	echo "Error al buscar".$e->getMessage();
		    }
		    finally
		    {
		    	$this->Conexion->CerrarConexion ();
		    }
		}
	}
?>