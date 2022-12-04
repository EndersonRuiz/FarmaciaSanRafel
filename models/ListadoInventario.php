<?
	class Existencias
	{

		//ATRIBUTOS DE LA CLASE

        private $Conexion;
        private $ConexionSql,$SentenciaSql,$Procedure;


        //CONSTRUCTOR DE LA CLASE
        
        public function  __Construct ()
        {
            $this->Conexion = new ClaseConexion ();
        }
        
        	public function ReporteDR($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = " select producto.NombreProducto,sum(inventario.Existencia) AS Cantidad
                    from producto,inventario,sucursales, categoria
                    where producto.codigo = inventario.IdProducto and categoria.Codigo = producto.IdCategoria
                    and inventario.IdSucursal = sucursales.Codigo and producto.Doctor = '".$Cod."'
                    group by producto.NombreProducto;";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }  
        }
        
        
        public function ReporteDRporcentaje($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "call sp_consultaaa('".$Cod."')";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }  
        }


		public function Listar($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT inventario.Codigo as CodInventario,inventario.FechaVencimiento, producto.CodigoBarra,producto.NombreProducto,inventario.Existencia,producto.PrecioCosto,producto.PrecioTope,producto.PrecioVenta,categoria.Nombre, categoria.Medida,ubicacion.Nombre as Estante,ubicacion.Seccion,casa.Nombre as NameCasa,marca.Nombre as NameMarca,sucursales.Nombre as Sucursal FROM inventario,producto,categoria,ubicacion,casa,marca,sucursales,laboratorio WHERE producto.Codigo = inventario.IdProducto AND categoria.Codigo = producto.IdCategoria AND ubicacion.Codigo = inventario.IdUbicacion AND casa.Codigo = laboratorio.IdCasa AND marca.Codigo = laboratorio.IdMarca AND laboratorio.Codigo = inventario.IdLaboratorio AND sucursales.Codigo = inventario.IdSucursal
                AND inventario.Existencia > 0 AND sucursales.Codigo = '".$Cod."' GROUP BY inventario.Codigo ";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }  
        }


        public function ListarReporte1($Farmacia,$fecha)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "call ListarEntradas('".$Farmacia."','".$fecha."')";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }  
        }

         public function ListarL($Cod,$Inicio,$Sucursal,$Sucursal1,$HoraInicio,$HoraFin)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "select d.fecha,d.hora,e.NombreProducto,c.Cantidad,e.PrecioTope,e.PrecioVenta,f.FechaVencimiento,b.nombre as SucursalEnvia,
                concat( a.PrimerNombre,' ',a.PrimerApellido,' ',a.SegundoApellido) as NombreEnvia,
                i.nombre as SucursalRecibe, concat( j.PrimerNombre,' ',j.PrimerApellido,' ',j.SegundoApellido) as NombreRecive
                from detallepedido c, pedido d,producto e, inventario f,detallepedidoenvia g, sucursales b,
                usuario a, detallerecibe h, sucursales i,usuario j
                where c.pedido = d.codigo and d.fecha = '".$Inicio."' and c.IdInventario = f.codigo and 
                f.IdProducto = e.Codigo and g.pedido = d.codigo and g.sucursalenvia = b.codigo and g.SucursalEnvia = '".$Sucursal."' and
                g.UsuarioEnvia = a.codigo and h.pedido = d.codigo and h.sucursalrecibe = i.codigo and h.SucursalRecibe = '".$Sucursal1."'
                and h.UsuarioRecibe = j.Codigo and d.hora >= '".$HoraInicio."' and d.hora <= '".$HoraFin."'";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }  
        }


        public function Listarz125($Cod,$Inicio,$Inicio1)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "call VentasTotal1('".$Inicio."','".$Inicio1."')";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }  
        }


        public function Listarz1255($Cod,$Usuario,$Inicio,$Inicio1)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "call VentasTotal2('".$Usuario."','".$Inicio."','".$Inicio1."')";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }  
        }


        public function Listarz12($Cod,$Sucursal,$Inicio,$Inicio1)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "call VentasTotal('".$Sucursal."','".$Inicio."','".$Inicio1."')";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }  
        }


        public function Listarz1($Cod,$Inicio,$HoraInicio,$HoraFin,$Sucursal)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "select 'Total Venta' as total,sum(c.TotalVendido) as resultado1
from producto a, inventario b, cardex c, usuario d
where a.codigo = b.IdProducto and b.Codigo = c.IdInventario and c.fecha = '".$Inicio."'
and d.codigo = c.IdUsuario and d.codigo = c.IdUsuario 
and c.hora >= '".$HoraInicio."' and c.hora <= '".$HoraFin."' and c.IdSucursal = '".$Sucursal."' and d.Codigo = '".$Cod."'";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }  
        }

        public function Listarz1as($Cod,$Inicio,$HoraInicio,$HoraFin,$Sucursal)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "select 'Suma Total' as total,sum(c.TotalVendido) as resultado1
                from producto a, inventario b, cardex c, usuario d
                where a.codigo = b.IdProducto and b.Codigo = c.IdInventario and c.fecha = '".$Inicio."'
                and d.codigo = c.IdUsuario and d.codigo = c.IdUsuario 
                and c.hora >= '".$HoraInicio."' and c.hora <= '".$HoraFin."' and c.IdSucursal = '".$Sucursal."'";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }  
        }

         public function Listarz1as1($cod,$FechaInicio,$FechaFin)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "call VercosasJa('".$FechaInicio."','".$FechaFin."')";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }  
        }

         public function ReportePastel($Cod,$Inicio,$Fin)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "select concat(a.PrimerNombre,' ',a.PrimerApellido,' ',a.SegundoApellido) as NombreCompleto, sum(b.Total1) as Resultado1
                    from usuario a,ventasanrafael1 b
                    where a.Codigo = b.IdUsuario  and b.Fecha >= '".$Inicio."' and b.Fecha <= '".$Fin."' group by NombreCompleto order by Resultado1 desc";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }  
        }


         public function ReportePastel123($Cod,$Inicio,$Fin)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "select concat(a.PrimerNombre,' ',a.PrimerApellido,' ',a.SegundoApellido) as NombreCompleto, sum(b.Total1) as Resultado1
                    from usuario a,ventasanjuan b
                    where a.Codigo = b.IdUsuario  and b.Fecha >= '".$Inicio."' and b.Fecha <= '".$Fin."' group by NombreCompleto order by Resultado1 desc";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }  
        }


         public function ReportePastel1234($Cod,$Inicio,$Fin)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "select concat(a.PrimerNombre,' ',a.PrimerApellido,' ',a.SegundoApellido) as NombreCompleto, sum(b.Total1) as Resultado1
                    from usuario a,venta b
                    where a.Codigo = b.IdUsuario  and b.Fecha >= '".$Inicio."' and b.Fecha <= '".$Fin."' group by NombreCompleto order by Resultado1 desc";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }  
        }


          public function Listarzz3($Cod,$Inicio,$HoraInicio,$HoraFin,$Sucursal)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = " SELECT a.NombreProducto, c.cantidad,a.PrecioTope,c.TotalVendido,c.hora,
                  concat(d.PrimerNombre,' ' ,d.SegundoNombre,' ', d.PrimerApellido) as NombreCompleto,d.Codigo
                   from producto a, inventario b, cardex c, usuario d
                   where a.codigo = b.IdProducto and b.Codigo = c.IdInventario and c.fecha = '".$Inicio."'
                  and d.codigo = c.IdUsuario and c.hora >= '".$HoraInicio."' and c.hora <= '".$HoraFin."' and c.IdSucursal = ".$Sucursal." order by NombreCompleto";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }  
        }

        public function ProductosAvencer($Cod)
        {
            try
            {
                $datos = array();
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT inventario.Codigo,producto.NombreProducto,inventario.FechaVencimiento,ubicacion.Nombre,ubicacion.Seccion FROM inventario,producto,ubicacion,sucursales WHERE producto.Codigo = inventario.IdProducto and ubicacion.Codigo = inventario.IdUbicacion AND inventario.IdSucursal = sucursales.Codigo and sucursales.Codigo = '".$Cod."' and (DATE(FechaVencimiento) = DATE(NOW()) OR DATE(FechaVencimiento) < DATE(NOW()) OR DATEDIFF(FechaVencimiento,NOW()) <= 150) GROUP by inventario.Codigo";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
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