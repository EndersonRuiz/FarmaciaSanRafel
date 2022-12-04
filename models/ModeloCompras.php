<?

    //CLASE LABORATORIOS
    
    class Compras
    {
        //ATRIBUTOS DE LA CLASE
        private $Conexion,$ConexionSql,$SentenciaSql,$Procedure;
        private $Codigo,$IdUsuario,$Total,$NoFactura,$Hora,$Fecha,$laboratorio;
        private $IdCompra,$producto,$Bonificacion,$PrecioCosto,$PrecioTope,$PrecioVenta,$FechaVencimiento;
        private $Existencia,$IdProducto,$Cantidad,$Factura,$Descripcion;
        

        //CONSTRUCTOR DE LA CLASE
        
        public function __construct (){
            $this->Conexion = new ClaseConexion ();
        }


        //METODO PARA CREAR FACTURA DE COMPRAS
    
        public function Insertar()
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL RegistroCompras(?,?,?,?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1,  $this->getNoFactura());
                $this->Procedure->bindParam(2,  $this->getLaboratorio());
                $this->Procedure->bindParam(3,  $this->getIdUsuario ());
                $this->Procedure->bindParam(4,  $this->getTotal());
                $this->Procedure->bindParam(5,  $this->getFactura());
                $this->Procedure->bindParam(6,  $this->getDescripcion());
                
                $this->Procedure->execute();
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

            public function ObtenerComentario($Buscado)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select Descripcion from compra where Codigo = '".$Buscado."' " ;
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


            public function ConsultaPorMes($Cod,$Sucursal1,$Sucursal2,$Fecha1,$Fecha2)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "call ConsultaPorFecha('".$Sucursal1."','".$Sucursal2."','".$Fecha1."','".$Fecha2."')";
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

        //METODO PARA CREAR FACTURA DE COMPRAS
    
        public function InsertarDetalle ()
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL RegistroDetalleCompra(?,?,?,?,?,?,?,?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1,  $this->getIdCompra());
                $this->Procedure->bindParam(2,  $this->getProducto());
                $this->Procedure->bindParam(3,  $this->getCantidad());
                $this->Procedure->bindParam(4,  $this->getBonificacion());
                $this->Procedure->bindParam(5,  $this->getPrecioCosto());
                $this->Procedure->bindParam(6,  $this->getPrecioTope());
                $this->Procedure->bindParam(7,  $this->getPrecioVenta ());
                $this->Procedure->bindParam(8,  $this->getFechaVencimiento());
                $this->Procedure->bindParam(9,  $this->getExistencia ());
                $this->Procedure->bindParam(10,  $this->getIdProducto ());
               
                $this->Procedure->execute();
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
        



        public function BuscarComprass12($codigo)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select a.Codigo,a.FechaFac1,a.Fecha,a.Hora,a.NumeroFactura,a.Laboratorio,
                      concat(b.PrimerNombre,' ',b.PrimerApellido,' ',b.SegundoApellido) as NombreUsuario,a.Total 
                       from compra a, usuario b where  b.Codigo = a.IdUsuario and a.Fecha = '".$codigo."'" ;
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





              //buscar compras
        public function BuscarComprass1($codigo)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select a.Codigo,a.FechaFac1,a.Fecha,a.Hora,a.NumeroFactura,a.Laboratorio,
                       concat(b.PrimerNombre,' ',b.PrimerApellido,' ',b.SegundoApellido) as NombreUsuario,a.Total 
                     from compra a, usuario b where  b.Codigo = a.IdUsuario and a.Codigo = '".$codigo."'" ;
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



        //buscar compras
        public function BuscarCompras()
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select a.Codigo,a.FechaFac1,a.Fecha,a.Hora,a.NumeroFactura,a.Laboratorio,
                        concat(b.PrimerNombre,' ',b.PrimerApellido,' ',b.SegundoApellido) as NombreUsuario,a.Total 
                        from compra a, usuario b where  b.Codigo = a.IdUsuario and Fecha = Date_format((DATE_SUB(NOW(),INTERVAL 6 HOUR)),'%Y/%m/%d');" ;
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

             //buscar compras
        public function BuscarCompras321()
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select a.Codigo,a.FechaFac1,a.Fecha,a.Hora,a.NumeroFactura,a.Laboratorio,
                        concat(b.PrimerNombre,' ',b.PrimerApellido,' ',b.SegundoApellido) as NombreUsuario,a.Total 
                        from compra a, usuario b where  b.Codigo = a.IdUsuario" ;
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


             public function BuscarComprasProducto($Buscado)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select c.PrecioCosto,a.CodigoBarra,d.Fecha,d.Hora,d.NumeroFactura,d.Laboratorio,
                        a.NombreProducto from producto a,inventario b,detallecompra c,compra d
                        where a.Codigo = b.IdProducto and b.IdSucursal = 3 and b.Codigo = c.IdInventario and d.Codigo = c.IdCompra and b.Codigo = '".$Buscado."'" ;
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


            //buscar compras

           public function BuscarDetalleCompra($Buscado)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select a.Codigo,a.NombreProducto,c.Cantidad,c.Bonificacion,c.PrecioCosto,
                   c.PrecioTope,c.PrecioVenta,c.FechaVencimiento,d.Total,d.Laboratorio,d.NumeroFactura
                   from producto a,inventario b,detallecompra c,
                  compra d where a.Codigo = b.IdProducto and b.Codigo = c.IdInventario and c.IdCompra = d.Codigo
                   and d.Codigo = '".$Buscado."' " ;
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


        //AQUI SE EJECUTA 

        public function Eliminar() //ES ESTE METODO
        {
            try { 
                $this->ConexionSql = $this->Conexion->CrearConexion();
                $this->SentenciaSql= "call Eliminardetallecompra(?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1, $this->getCodigo());

                $this->Procedure->execute();
                
            } catch (Exception $exc) {
                echo "ERROR AL ELIMINAR".$exc->getMessage;
                
            }
            finally{
                $this->Conexion->CerrarConexion();
            }
        }

        //listar ultimo registro

        public function ObtenerCodigo ()
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT MAX(Codigo) AS Codigo FROM compra";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->execute();
                $row = $this->Procedure->fetch();

                $this->setCodigo($row['Codigo']);
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


        public function ObtenerNombres1($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT a.Factura,c.Codigo as Codigoo,c.PrimerNombre,c.PrimerApellido,a.Total
                from compras a, detallecompra b, usuario c
                where b.Codigo= '".$Cod."' and a.Codigo = b.IdCompra and c.Codigo=a.IdUsuario";
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

        //OBTENER ´PRODUCTO
        

         public function ObtenerProducto1($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT a.Codigo, c.NombreProducto, b.Existencia,d.Nombre
                ,e.Nombre as nombre1,h.Nombre as nombre2
               from detallecompra a, inventario b, producto c, sucursales d, laboratorio f,casa e,marca h
              where a.Codigo = '".$Cod."' and b.Codigo =a.Idinventario and c.Codigo=b.IdProducto and d.Codigo=b.IdSucursal and f.Codigo = b.IdLaboratorio and e.Codigo = f.IdCasa and h.Codigo = f.IdMarca";
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

        public function ObtenerProducto($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT inventario.Codigo,producto.NombreProducto 
                FROM producto,inventario WHERE inventario.IdProducto = producto.Codigo
                AND inventario.Codigo = '".$Cod."' GROUP BY inventario.Codigo";
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
        

        //METODOS GETTERS Y SETTERS
        function getDescripcion() {
            return $this->Descripcion;
        }

        function setDescripcion($Descripcion) {
            $this->Descripcion = $Descripcion;
        }

        function getFactura() {
            return $this->Factura;
        }
        function setFactura($Factura) {
            $this->Factura = $Factura;
        }

        
         function getCantidad() {
            return $this->Cantidad;
        }
        function setCantidad($Cantidad) {
            $this->Cantidad = $Cantidad;
        }
        function getLaboratorio() {
            return $this->laboratorio;
        }
        function setLaboratorio($laboratorio) {
            $this->laboratorio = $laboratorio;
        }

        function getIdProducto() {
            return $this->IdProducto;
        }
        function setIdProducto($IdProducto) {
            $this->IdProducto = $IdProducto;
        }

        function getExistencia() {
            return $this->Existencia;
        }
        function setExistencia($Existencia) {
            $this->Existencia = $Existencia;
        }

        function getFechaVencimiento() {
            return $this->FechaVencimiento;
        }
        function setFechaVencimiento($FechaVencimiento) {
            $this->FechaVencimiento = $FechaVencimiento;
        }


         function getPrecioVenta() {
            return $this->PrecioVenta;
        }
        function setPrecioVenta($PrecioVenta) {
            $this->PrecioVenta = $PrecioVenta;
        }

         function getPrecioTope() {
            return $this->PrecioTope;
        }
        function setPrecioTope($PrecioTope) {
            $this->PrecioTope = $PrecioTope;
        }

         function getPrecioCosto() {
            return $this->PrecioCosto;
        }
        function setPrecioCosto($PrecioCosto) {
            $this->PrecioCosto = $PrecioCosto;
        }

         function getBonificacion() {
            return $this->Bonificacion;
        }
        function setBonificacion($Bonificacion) {
            $this->Bonificacion = $Bonificacion;
        }

         function getProducto() {
            return $this->producto;
        }
        function setProducto($producto) {
            $this->producto = $producto;
        }

         function getIdCompra() {
            return $this->IdCompra;
        }
        function setIdCompra($IdCompra) {
            $this->IdCompra = $IdCompra;
        }

         function getFecha() {
            return $this->Fecha;
        }
        function setFecha($Fecha) {
            $this->Fecha = $Fecha;
        }

         function getHora() {
            return $this->IdHora;
        }
        function setHora($Hora) {
            $this->Hora = $Hora;
        }

         function getNoFactura() {
            return $this->NoFactura;
        }
        function setNoFactura($NoFactura) {
            $this->NoFactura = $NoFactura;
        }

         function getTotal() {
            return $this->Total;
        }
        function setTotal($Total) {
            $this->Total = $Total;
        }

        function getIdUsuario() {
            return $this->IdUsuario;
        }
        function setIdUsuario($IdUsuario) {
            $this->IdUsuario = $IdUsuario;
        }

         function getCodigo() {
            return $this->Codigo;
        }
        function setCodigo($Codigo) {
            $this->Codigo = $Codigo;
        }


    }
?>
