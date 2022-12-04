<?
    class Ventas
    {
        //ATRIBUTOS DE LA CLASE
        
        private $Id,$Nombre;
        private $Conexion;
        private $ConexionSql,$SentenciaSql,$Procedure;
        private $IdUsuario,$IdCliente,$IdSucursal,$Total,$Bono,$Descuento,$TotalVenta,$Cantidad,$IdInventario,
        $PrecioCosto,$Codigo,$Billete200,$Billete100,$Billete50,$Billete20,$Billete10,$Billete5,$Billete1,$Moneda1,
        $Moneda50,$Moneda25,$Sobrante,$Faltante,$CodigoRes,$Codigoo;


        //CONSTRUCTOR DE LA CLASE
        
        public function  __Construct ()
        {
            $this->Conexion = new ClaseConexion ();
        }

             public function RastrearProductoSalida1($Producto,$FechaInicio,$FechaFin)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select d.NombreProducto,sum(a.Cantidad) as Total from detallepedido a,pedido b,inventario c,producto d,detallepedidoenvia e,usuario f,sucursales g,
                        detallerecibe h,sucursales i,usuario j where b.Codigo = a.pedido and c.Codigo = a.IdInventario and
                        d.Codigo = c.IdProducto and e.pedido = b.Codigo and d.Codigo = '".$Producto."' and f.Codigo = e.UsuarioEnvia and
                 g.Codigo = e.SucursalEnvia and h.pedido = b.Codigo and i.codigo = h.SucursalRecibe and j.Codigo = h.UsuarioRecibe 
and b.fecha >= '".$FechaInicio."' and b.fecha <= '".$FechaFin."' order by b.Fecha desc";  
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

             public function ListarDetalleVenta90901()
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "select a.NombreProducto, b.Cantidad,b.PrecioCosto,b.SubTotal, d.codigo, d.Fecha,d.Hora, concat(e.PrimerNombre,' ',e.PrimerApellido,' ',e.SegundoApellido) as NombreCompleto, d.Total1 from producto a, detalleventasanrafael1 b,inventario c, ventasanrafael1 d,usuario e where b.idinventario = c.Codigo and a.Codigo = c.IdProducto and d.Codigo = b.Idventa and d.Estado = 1 and d.IdSucursal = '5' and d.IdUsuario = e.Codigo;";
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

           public function RastrearProductoSalida($Producto,$FechaInicio,$FechaFin)
            {  
                try
                {

                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select a.Pedido,d.NombreProducto,a.Cantidad,b.fecha,b.hora,concat(f.PrimerNombre,' ',f.SegundoNombre,' ',f.PrimerApellido) 
                        as NombreEnvia,g.Nombre as SucursalEnvia,concat(j.PrimerNombre,' ',j.SegundoNombre,' ',j.PrimerApellido) as NombreRecibe,i.Nombre from detallepedido a,pedido b,inventario c,producto d,detallepedidoenvia e,usuario f,sucursales g,
                       detallerecibe h,sucursales i,usuario j where b.Codigo = a.pedido and c.Codigo = a.IdInventario and d.Codigo = c.IdProducto and e.pedido = b.Codigo and d.Codigo = '".$Producto."' and f.Codigo = e.UsuarioEnvia and g.Codigo = e.SucursalEnvia and h.pedido = b.Codigo and i.codigo = h.SucursalRecibe and j.Codigo = h.UsuarioRecibe and b.fecha >= '".$FechaInicio."' and b.fecha <= '".$FechaFin."' order by b.Fecha desc";  
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


         public function RastrearProductoVenta1($Sucursal,$Producto,$Fecha,$Fecha1)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select c.NombreProducto,sum(a.Cantidad) as CantidadTotal,sum(a.SubTotal) as TotalVenta from detalleventa a , inventario b,producto c,venta d,sucursales e,usuario f where b.Codigo = a.idinventario and c.Codigo = b.IdProducto and d.codigo = a.idventa and e.Codigo = d.IdSucursal and d.IdSucursal = '".$Sucursal."' and a.idinventario = '".$Producto."' and d.Fecha >= '".$Fecha."' and d.Fecha <= '".$Fecha1."' and f.Codigo = d.IdUsuario ORDER by a.codigo DESC";  
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


                 public function RastrearProductoVenta1zy($Sucursal,$Producto,$Fecha,$Fecha1)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select c.NombreProducto,sum(a.Cantidad) as CantidadTotal,sum(a.SubTotal) as TotalVenta from detalleventasanjuan a , inventario b,producto c,ventasanjuan d,sucursales e,usuario f where b.Codigo = a.idinventario and c.Codigo = b.IdProducto and d.codigo = a.idventa and e.Codigo = d.IdSucursal and d.IdSucursal = '".$Sucursal."' and a.idinventario = '".$Producto."' and d.Fecha >= '".$Fecha."' and d.Fecha <= '".$Fecha1."' and f.Codigo = d.IdUsuario ORDER by a.codigo DESC";  
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

             public function RastrearProductoVentazy($Sucursal,$Producto,$Fecha,$Fecha1)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = " SELECT a.idventa,c.NombreProducto,a.Cantidad,a.PrecioCosto,a.SubTotal,d.Fecha,d.Hora,concat(f.PrimerNombre,' ',f.SegundoNombre,' ',f.PrimerApellido) as nombreCompleto,e.Nombre from detalleventasanjuan a , inventario b,producto c,ventasanjuan d,sucursales e,usuario f where b.Codigo = a.idinventario and c.Codigo = b.IdProducto and d.codigo = a.idventa and e.Codigo = d.IdSucursal and d.IdSucursal = '".$Sucursal."' and a.idinventario = '".$Producto."' and d.Fecha >= '".$Fecha."' and d.Fecha <= '".$Fecha1."' and f.Codigo = d.IdUsuario ORDER by a.codigo DESC";  
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


             public function RastrearProductoVenta1zx($Sucursal,$Producto,$Fecha,$Fecha1)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select c.NombreProducto,sum(a.Cantidad) as CantidadTotal,sum(a.SubTotal) as TotalVenta from detalleventasanrafael1 a , inventario b,producto c,ventasanrafael1 d,sucursales e,usuario f where b.Codigo = a.idinventario and c.Codigo = b.IdProducto and d.codigo = a.idventa and e.Codigo = d.IdSucursal and d.IdSucursal = '".$Sucursal."' and a.idinventario = '".$Producto."' and d.Fecha >= '".$Fecha."' and d.Fecha <= '".$Fecha1."' and f.Codigo = d.IdUsuario ORDER by a.codigo DESC";  
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

             public function RastrearProductoVentazx($Sucursal,$Producto,$Fecha,$Fecha1)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = " SELECT a.idventa,c.NombreProducto,a.Cantidad,a.PrecioCosto,a.SubTotal,d.Fecha,d.Hora,concat(f.PrimerNombre,' ',f.SegundoNombre,' ',f.PrimerApellido) as nombreCompleto,e.Nombre from detalleventasanrafael1 a , inventario b,producto c,ventasanrafael1 d,sucursales e,usuario f where b.Codigo = a.idinventario and c.Codigo = b.IdProducto and d.codigo = a.idventa and e.Codigo = d.IdSucursal and d.IdSucursal = '".$Sucursal."' and a.idinventario = '".$Producto."' and d.Fecha >= '".$Fecha."' and d.Fecha <= '".$Fecha1."' and f.Codigo = d.IdUsuario ORDER by a.codigo DESC";  
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

        public function RastrearProductoVenta($Sucursal,$Producto,$Fecha,$Fecha1)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = " SELECT a.idventa,c.NombreProducto,a.Cantidad,a.PrecioCosto,a.SubTotal,d.Fecha,d.Hora,concat(f.PrimerNombre,' ',f.SegundoNombre,' ',f.PrimerApellido) as nombreCompleto,e.Nombre from detalleventa a , inventario b,producto c,venta d,sucursales e,usuario f where b.Codigo = a.idinventario and c.Codigo = b.IdProducto and d.codigo = a.idventa and e.Codigo = d.IdSucursal and d.IdSucursal = '".$Sucursal."' and a.idinventario = '".$Producto."' and d.Fecha >= '".$Fecha."' and d.Fecha <= '".$Fecha1."' and f.Codigo = d.IdUsuario ORDER by a.codigo DESC";  
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


             public function ReporteVentasSanRafa111s($Inicio,$Sucursal,$Turnos)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select concat(c.PrimerNombre,' ',c.PrimerApellido,' ',c.SegundoApellido) as NombreCompleto,sum(a.Total) as Total,sum(a.Bono) as Bono, 
                        sum(a.descuento) as Descuento, sum(Total1) as TotalCobrado
                        from ventasanrafael1 a,abrircaja b, usuario c where a.Fecha = '".$Inicio."' and a.IdCaja = b.Codigo and a.IdUsuario = c.Codigo and b.Turnos = '".$Turnos."' and a.Estado = 0 and a.IdSucursal = '".$Sucursal."' group by a.IdUsuario";  
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

         public function ReporteVentasSanRafa11s($Inicio,$Sucursal,$Turnos)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select sum(a.Total) as Total,sum(a.Bono) as Bono, sum(a.descuento) as Descuento, sum(Total1) as TotalCobrado
                        from ventasanrafael1 a,abrircaja b 
                        where a.Fecha = '".$Inicio."' and a.IdCaja = b.Codigo
                        and b.Turnos = '".$Turnos."' and a.Estado = 0 and a.IdSucursal = '".$Sucursal."'";  
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

        public function ReporteVentasSanRafa1s($Inicio,$Sucursal,$Turnos)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select a.Codigo,a.Fecha,a.Hora,concat(c.PrimerNombre,' ',c.PrimerApellido,' ',c.SegundoApellido) as NombreCompleto,
                     a.Total,a.Bono,a.Descuento,a.Total1
                     from ventasanrafael1 a,abrircaja b, usuario c
                     where a.Fecha = '".$Inicio."' and a.IdCaja = b.Codigo and a.IdUsuario = c.Codigo
                     and b.Turnos = '".$Turnos."' and a.Estado = 0 and  a.IdSucursal = '".$Sucursal."' ";  
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

        public function ReporteVentasSanRafa111($Inicio,$Sucursal,$Turnos)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select concat(c.PrimerNombre,' ',c.PrimerApellido,' ',c.SegundoApellido) as NombreCompleto,sum(a.Total) as Total,sum(a.Bono) as Bono, 
                        sum(a.descuento) as Descuento, sum(Total1) as TotalCobrado
                        from venta a,abrircaja b, usuario c where a.Fecha = '".$Inicio."' and a.IdCaja = b.Codigo and a.IdUsuario = c.Codigo and b.Turnos = '".$Turnos."' and a.Estado = 0 and a.IdSucursal = '".$Sucursal."' group by a.IdUsuario";  
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

         public function ReporteVentasSanRafa11($Inicio,$Sucursal,$Turnos)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select sum(a.Total) as Total,sum(a.Bono) as Bono, sum(a.descuento) as Descuento, sum(Total1) as TotalCobrado
                        from venta a,abrircaja b 
                        where a.Fecha = '".$Inicio."' and a.IdCaja = b.Codigo
                        and b.Turnos = '".$Turnos."' and a.Estado = 0 and a.IdSucursal = '".$Sucursal."'";  
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

        public function ReporteVentasSanRafa1($Inicio,$Sucursal,$Turnos)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select a.Codigo,a.Fecha,a.Hora,concat(c.PrimerNombre,' ',c.PrimerApellido,' ',c.SegundoApellido) as NombreCompleto,
                     a.Total,a.Bono,a.Descuento,a.Total1
                     from venta a,abrircaja b, usuario c
                     where a.Fecha = '".$Inicio."' and a.IdCaja = b.Codigo and a.IdUsuario = c.Codigo
                     and b.Turnos = '".$Turnos."' and a.Estado = 0 and  a.IdSucursal = '".$Sucursal."' ";  
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

         public function ReportedeCorteCaja($Sucursal,$Fecha,$Turno)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "call ConsultaCerrarCorte('".$Sucursal."','".$Fecha."','".$Turno."')";  
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

             public function ReportedeCorteCajas($Sucursal,$Fecha,$Turno)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "call ConsultaCerrarCorte1('".$Sucursal."','".$Fecha."','".$Turno."')";  
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

             public function ReportedeCorteCajass($Sucursal,$Fecha,$Turno)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "call ConsultaCerrarCorte2('".$Sucursal."','".$Fecha."','".$Turno."')";  
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



        public function CerrarCajaSanRfa()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "call RegistroCerrarCaja(?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1, $this->getId());
                $this->Procedure->bindParam(2, $this->getBillete200());
                $this->Procedure->bindParam(3, $this->getBillete100());
                $this->Procedure->bindParam(4, $this->getBillete50());
                $this->Procedure->bindParam(5, $this->getBillete20());
                $this->Procedure->bindParam(6, $this->getBillete10());
                $this->Procedure->bindParam(7, $this->getBillete5());
                $this->Procedure->bindParam(8, $this->getBillete1());
                $this->Procedure->bindParam(9, $this->getMoneda1());
                $this->Procedure->bindParam(10, $this->getMoneda50());
                $this->Procedure->bindParam(11, $this->getMoneda25());
                $this->Procedure->bindParam(12, $this->getTotal());
                $this->Procedure->bindParam(13, $this->getTotalVenta());
                $this->Procedure->execute ();
            } 
            catch (Exception $ex) 
            {
                echo 'error'.$ex->getMessage();
            }
            finally 
            {
                $this->Conexion->CerrarConexion ();
            }
        }


        public function ObtenerMontoCaja($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "select MontoVenta from abrircaja where Codigo = '".$Cod."'";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->execute();
                $row = $this->Procedure->fetch();
                $this->setId($row['MontoVenta']);
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }
        }   

        public function InsertarSalidasss()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "call RegistroSalidasEfectivo(?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1, $this->getCodigo());
                $this->Procedure->bindParam(2, $this->getBono());
                $this->Procedure->bindParam(3, $this->getIdUsuario());
                $this->Procedure->execute ();
            } 
            catch (Exception $ex) 
            {
                echo 'error'.$ex->getMessage();
            }
            finally 
            {
                $this->Conexion->CerrarConexion ();
            }
        }

       
          public function ExtraerDatosCaja()
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "select max(Codigo) as Codigo,max(Estado) as Estado from abrircaja where IdSucursal = '5'";
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

        public function AbrirCaja1()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "call RegistroAbrirCaja(?,5,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1, $this->getCodigo());
                $this->Procedure->bindParam(2, $this->getBono());
                $this->Procedure->bindParam(3, $this->getCantidad());
                $this->Procedure->execute ();
            } 
            catch (Exception $ex) 
            {
                echo 'error'.$ex->getMessage();
            }
            finally 
            {
                $this->Conexion->CerrarConexion ();
            }
        }


         public function EliminarDatosVenta()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "call QuitaVentaSanRafael1(?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1, $this->getCodigo());
                $this->Procedure->execute ();
            } 
            catch (Exception $ex) 
            {
                echo 'error'.$ex->getMessage();
            }
            finally 
            {
                $this->Conexion->CerrarConexion ();
            }
        }

        public function InsertarVentass()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "call CobrarSanRafael1(?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1, $this->getIdUsuario());
                $this->Procedure->bindParam(2, $this->getTotalVenta());
                $this->Procedure->bindParam(3, $this->getIdCliente());
                $this->Procedure->execute ();
            } 
            catch (Exception $ex) 
            {
                echo 'error'.$ex->getMessage();
            }
            finally 
            {
                $this->Conexion->CerrarConexion ();
            }
        }

        

        public function ObtenerDatosVenta($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT a.Codigo,a.Total1,b.Codigo as CodigoCaja from ventasanrafael1 a,abrircaja b where a.Codigo = '".$Cod."' and b.IdSucursal = '5' and b.Estado = '1'";
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

         public function ObtenerCodigo11($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT Codigo,CodigoReservado FROM usuario where CodigoReservado = '".$Cod."'";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->execute();
                $row = $this->Procedure->fetch();
                $this->setCodigoo($row['Codigo']);
                $this->setCodigoRes($row['CodigoReservado']);
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }
        }   


        public function ObtenerCodigo1($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT Codigo,CodigoReservado FROM usuario where CodigoReservado = '".$Cod."'";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->execute();
                $row = $this->Procedure->fetch();
                $this->setCodigo($row['Codigo']);
                $this->setCodigoRes($row['CodigoReservado']);
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }
        }   

        //Obtener Codigo Para Las Ventas
        public function ObtenerCodigo($cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT MAX(a.Codigo) AS Codigo,b.Codigo as cod,b.CodigoReservado as Cod2 FROM ventasanrafael1 a,usuario b where b.CodigoReservado = '".$cod."'";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                $row = $this->Procedure->fetch();
                $this->setCodigo($row['Codigo']);
                $this->setCodigoo($row['cod']);
                $this->setCodigoRes($row['Cod2']);
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }
        }   
        
        //METODO PARA INSERTAR UNA CASA
        
        public function InsertarVenta()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "call InsertarVenta1(?,?,?,?,?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1, $this->getCodigo());
                $this->Procedure->bindParam(2, $this->getIdUsuario());
                $this->Procedure->bindParam(3, $this->getIdCliente());
                $this->Procedure->bindParam(4, $this->getTotal());
                $this->Procedure->bindParam(5, $this->getBono());
                $this->Procedure->bindParam(6, $this->getDescuento());
                $this->Procedure->bindParam(7, $this->getTotalVenta());
                $this->Procedure->execute ();
            } 
            catch (Exception $ex) 
            {
                echo 'error'.$ex->getMessage();
            }
            finally 
            {
                $this->Conexion->CerrarConexion ();
            }
        }

         public function Insertar()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "call RegistroDetalleVenta1(?,?,?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                
                $this->Procedure->bindParam(1,  $this->getId());
                $this->Procedure->bindParam(2,  $this->getIdInventario());
                $this->Procedure->bindParam(3,  $this->getCantidad());
                $this->Procedure->bindParam(4,  $this->getPrecioCosto());
                $this->Procedure->bindParam(5,  $this->getTotal());
                
                $this->Procedure->execute();
            } 
            catch (Exception $exc) 
            {
                echo "ERROR AL INSERTAR ".$exc->getMessage();
            }
            finally 
            {
                $this->Conexion->CerrarConexion ();
            }
        }

        public function ListarDetalleVenta($Cod)
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "select a.NombreProducto, b.Cantidad,b.PrecioCosto,b.SubTotal 
                from producto a, detalleventasanrafael1 b,inventario c
                where b.idinventario = c.Codigo and a.Codigo = c.IdProducto and b.idVenta = '".$Cod."'";
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


        public function ListarVentas()
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "select a.Codigo,a.Fecha,a.Hora,concat(b.PrimerNombre,' ',b.PrimerApellido,' ',b.SegundoApellido) as NombreCompleto,
                    a.Total,a.Bono,a.descuento,a.Total1 
                    from ventasanrafael1 a, usuario b
                    where b.Codigo = a.IdUsuario and a.IdSucursal = '5' and a.Estado = 0
                    and a.Fecha = Date_format((DATE_SUB(NOW(),INTERVAL 6 HOUR)),'%Y/%m/%d') order by a.Codigo desc";
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



        //METODO PARA REALIZAR UNA LISTA DE LOS EMPLEADOS

        public function Listar()
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "select a.Codigo,a.Fecha,a.Hora,
                concat(b.PrimerNombre,' ',b.PrimerApellido,' ',b.SegundoApellido) as NombreCompleto, a.Total1
                from ventasanrafael1 a, usuario b
                where a.IdUsuario = b.Codigo and a.Estado = '1' order by a.Codigo;";
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


         public function Listar1()
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "call ConsultaParaCerrarCaja()";
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
        public function getCodigoo() {
            return $this->Codigoo;
        }

        public function setCodigoo($Codigoo){
            $this->Codigoo = $Codigoo;
        }

        public function getCodigoRes() {
            return $this->CodigoRes;
        }

        public function setCodigoRes($CodigoRes){
            $this->CodigoRes = $CodigoRes;
        }

        //METODOS GETTERS Y SETTERS
         public function getBillete200() 
        {
            return $this->Billete200;
        }
        public function setBillete200($Billete200) 
        {
            $this->Billete200 = $Billete200;
        }


         public function getPrecioCosto() 
        {
            return $this->PrecioCosto;
        }
        public function setPrecioCosto($PrecioCosto) 
        {
            $this->PrecioCosto = $PrecioCosto;
        }



         public function getIdInventario() 
        {
            return $this->IdInventario;
        }
        public function setIdInventario($IdInventario) 
        {
            $this->IdInventario = $IdInventario;
        }



         public function getCantidad() 
        {
            return $this->Cantidad;
        }
        public function setCantidad($Cantidad) 
        {
            $this->Cantidad = $Cantidad;
        }



        public function getTotalVenta() 
        {
            return $this->TotalVenta;
        }
        public function setTotalVenta($TotalVenta) 
        {
            $this->TotalVenta = $TotalVenta;
        }



        public function getDescuento() 
        {
            return $this->Descuento;
        }
        public function setDescuento($Descuento) 
        {
            $this->Descuento = $Descuento;
        }



        public function getBono() 
        {
            return $this->Bono;
        }
        public function setBono($Bono) 
        {
            $this->Bono = $Bono;
        }



        public function getTotal() 
        {
            return $this->Total;
        }
        public function setTotal($Total) 
        {
            $this->Total = $Total;
        }


        public function getIdSucursal() 
        {
            return $this->IdSucursal;
        }
        public function setIdSucursal($IdSucursal) 
        {
            $this->IdSucursal = $IdSucursal;
        }



        public function getIdCliente() 
        {
            return $this->IdCliente;
        }
        public function setIdCliente($IdCliente) 
        {
            $this->IdCliente = $IdCliente;
        }



        public function getIdUsuario() 
        {
            return $this->IdUsuario;
        }
        public function setIdUsuario($IdUsuario) 
        {
            $this->IdUsuario = $IdUsuario;
        }


        
        public function getId() 
        {
            return $this->Id;
        }
        public function setId($Id) 
        {
            $this->Id = $Id;
        }



        public function getNombre() 
        {
            return $this->Nombre;
        }

        public function setNombre($Nombre) 
        {
            $this->Nombre = $Nombre;
        }



        public function getCodigo() 
        {
            return $this->Codigo;
        }

        public function setCodigo($Codigo) 
        {
            $this->Codigo = $Codigo;
        }


         public function getBillete100() 
        {
            return $this->Billete100;
        }
        public function setBillete100($Billete100) 
        {
            $this->Billete100 = $Billete100;
        }


         public function getBillete50() 
        {
            return $this->Billete50;
        }
        public function setBillete50($Billete50) 
        {
            $this->Billete50 = $Billete50;
        }


         public function getBillete20() 
        {
            return $this->Billete20;
        }
        public function setBillete20($Billete20) 
        {
            $this->Billete20 = $Billete20;
        }


        public function getBillete10() 
        {
            return $this->Billete10;
        }
        public function setBillete10($Billete10) 
        {
            $this->Billete10 = $Billete10;
        }



        public function getBillete5() 
        {
            return $this->Billete5;
        }
        public function setBillete5($Billete5) 
        {
            $this->Billete5 = $Billete5;
        }


        public function getBillete1() 
        {
            return $this->Billete1;
        }
        public function setBillete1($Billete1) 
        {
            $this->Billete1 = $Billete1;
        }


        public function getMoneda1() 
        {
            return $this->Moneda1;
        }
        public function setMoneda1($Moneda1) 
        {
            $this->Moneda1 = $Moneda1;
        }


        public function getMoneda50() 
        {
            return $this->Moneda50;
        }
        public function setMoneda50($Moneda50) 
        {
            $this->Moneda50 = $Moneda50;
        }


        public function getMoneda25() 
        {
            return $this->Moneda25;
        }
        public function setMoneda25($Moneda25) 
        {
            $this->Moneda25 = $Moneda25;
        }


        public function getFaltante() 
        {
            return $this->Faltante;
        }
        public function setFaltante($Faltante) 
        {
            $this->Faltante = $Faltante;
        }



        public function getSobrante() 
        {
            return $this->Sobrante;
        }
        public function setSobrante($Sobrante) 
        {
            $this->Sobrante = $Sobrante;
        }




    }
?>