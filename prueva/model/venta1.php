<?
    class VentasSanJuan1
    {
        //ATRIBUTOS DE LA CLASE
        
        private $Id,$Nombre;
        private $Conexion;
        private $ConexionSql,$SentenciaSql,$Procedure;
        private $IdUsuario,$IdCliente,$IdSucursal,$Total,$Bono,$Descuento,$TotalVenta,$Cantidad,$IdInventario,
        $PrecioCosto,$Codigo,$Billete200,$Billete100,$Billete50,$Billete20,$Billete10,$Billete5,$Billete1,$Moneda1,
        $Moneda50,$Moneda25,$Sobrante,$Faltante,$CodigoRes,$Codigoo;
        private $Servidor;
        private $Usuario;
        private $Contraseña;
        private $DataBase;
        private $JuegoCaracteres;


        //CONSTRUCTOR DE LA CLASE
        
        public function  __Construct ()
        {
            $this->Usuario = 'u173607644_system';
            $this->Contraseña = '31107449Aa';
            $this->DataBase = 'dbname=u173607644_dbfarmacia;';
            $this->Servidor = 'mysql:host=localhost;';
            $this->JuegoCaract = 'charset=utf8';
        }

         public function CrearConexion ()
        {
            try
            {
                $this->ConexionSql = new PDO($this->Servidor.$this->DataBase.$this->JuegoCaract,$this->Usuario,$this->Contraseña,
                array (PDO::ATTR_PERSISTENT => true));
            }
            catch (PDOException $e)
            {
                echo "Error al crear la conexion ".$e->getMessage();
            }
            return $this->ConexionSql;
        }

        //METODO PARA CERRAR LA CONEXION

        public function CerrarConexion ()
        {
            try
            {
                $this->ConexionSql = null;
            }
            catch (Exception $e)
            {
                echo "Error al cerrar la conexion".$e->getMessage();
            }
        }

        
     
         public function ReportedeCorteCaja($Sucursal,$Fecha,$Turno)
            {  
                try
                {
                    $this->ConexionSql = $this->CrearConexion ();
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
                    $this->CerrarConexion ();
                }
            }


             public function ReportedeCorteCajas($Sucursal,$Fecha,$Turno)
            {  
                try
                {
                    $this->ConexionSql = $this->CrearConexion ();
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
                    $this->CerrarConexion ();
                }
            }

             public function ReportedeCorteCajass($Sucursal,$Fecha,$Turno)
            {  
                try
                {
                    $this->ConexionSql = $this->CrearConexion ();
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
                    $this->CerrarConexion ();
                }
            }
            
            
            public function ListarReporte1($Farmacia,$fecha)
        {
            try
            {
                $this->ConexionSql = $this->CrearConexion ();
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
                $this->CerrarConexion ();
            }  
        }


        public function ListarReporteCero($Codigo)
        {
            try
            {
                $this->ConexionSql = $this->CrearConexion ();
                $this->SentenciaSql = "SELECT b.CodigoBarra,b.NombreProducto,a.Existencia,e.Nombre as Casa,f.Nombre as Marca from inventario a,producto b,ubicacion c,laboratorio d,marca e,casa f where a.IdProducto = b.Codigo and a.IdSucursal = '".$Codigo."' and a.IdUbicacion = c.Codigo and a.IdLaboratorio = d.Codigo and d.IdCasa = e.Codigo and d.IdMarca = f.Codigo and a.Existencia = 0 order by b.NombreProducto asc";
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
                $this->CerrarConexion ();
            }  
        }


        public function ListarReporteCero1($Codigo)
        {
            try
            {
                $this->ConexionSql = $this->CrearConexion ();
                $this->SentenciaSql = " select b.CodigoBarra,b.NombreProducto,a.Existencia, e.Nombre as Casa,f.Nombre as Marca from inventario a,producto b,ubicacion c,laboratorio d,marca e,casa f where a.IdProducto = b.Codigo and a.IdSucursal = '".$Codigo."' and a.IdUbicacion = c.Codigo and a.IdLaboratorio = d.Codigo and d.IdCasa = e.Codigo and d.IdMarca = f.Codigo and a.Existencia > 0 order by b.NombreProducto asc;";
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
                $this->CerrarConexion ();
            }  
        }

         public function ListarReporteEstante($Codigo,$Estante)
        {
            try
            {
                $this->ConexionSql = $this->CrearConexion ();
                $this->SentenciaSql = " select a.FechaVencimiento,b.CodigoBarra,b.NombreProducto,a.Existencia, c.Nombre as Estante,c.Seccion as Seccion from inventario a,producto b,ubicacion c,laboratorio d,marca e,casa f where a.IdProducto = b.Codigo and a.IdSucursal = '".$Codigo."' and a.IdUbicacion = c.Codigo and a.IdLaboratorio = d.Codigo and d.IdCasa = e.Codigo and d.IdMarca = f.Codigo and a.Existencia > 0 and c.Nombre = '".$Estante."'  order by c.Seccion asc;";
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
                $this->CerrarConexion ();
            }  
        }

          public function ListarReporteFecha($Codigo,$Fecha)
        {
            try
            {
                $this->ConexionSql = $this->CrearConexion ();
                $this->SentenciaSql = "select a.FechaVencimiento,b.CodigoBarra,b.NombreProducto,a.Existencia, c.Nombre as Estante,c.Seccion as Seccion from inventario a,producto b,ubicacion c,laboratorio d,marca e,casa f where a.IdProducto = b.Codigo and a.IdSucursal = '".$Codigo."' and a.IdUbicacion = c.Codigo and a.IdLaboratorio = d.Codigo and d.IdCasa = e.Codigo and d.IdMarca = f.Codigo and a.FechaVencimiento <= '".$Fecha."' and a.Existencia > 0 order by a.FechaVencimiento asc;";
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
                $this->CerrarConexion ();
            }  
        }

         public function ListarReporteFecha1($Codigo,$Fecha,$Fecha1)
        {
            try
            {
                $this->ConexionSql = $this->CrearConexion ();
                $this->SentenciaSql = "select a.FechaVencimiento,b.CodigoBarra,b.NombreProducto,a.Existencia, c.Nombre as Estante,c.Seccion as Seccion from inventario a,producto b,ubicacion c,laboratorio d,marca e,casa f where a.IdProducto = b.Codigo and a.IdSucursal = '".$Codigo."' and a.IdUbicacion = c.Codigo and a.IdLaboratorio = d.Codigo and d.IdCasa = e.Codigo and d.IdMarca = f.Codigo and a.FechaVencimiento >= '".$Fecha."' and a.FechaVencimiento <= '".$Fecha1."' and a.Existencia > 0 order by a.FechaVencimiento asc;";
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
                $this->CerrarConexion ();
            }  
        }


        //METODOS GETTERS Y SETTERS
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