<?PHP

    class Pedidos
    {
        private $Codigo,$Fecha,$Hora,$IdUsuario1,$Origen,$IdUsuario2,$Destino,$Estado,$Comentario;
        private $Conexion,$ConexionSql,$SentenciaSql,$Procedure;


        public function __Construct ()
        {
            $this->Conexion = new ClaseConexion ();
        }
        
        public function Insertar()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL InsertarPedido (?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                
                $this->Procedure->bindParam (1, $this->getEstado());
                $this->Procedure->bindParam (2, $this->getComentario());

                $this->Procedure->execute();
            }
            catch (Exception $exc) 
            {
                echo 'ERROR AL INSERTAR'.$exc->getMessage();
            }
            finally 
            {
                $this->Conexion->CerrarConexion ();
            }
        }

        public function InsertarDetalleEnvia($Pedido)
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL InsertarDetalleEnvia(?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                
                $this->Procedure->bindParam (1, $this->getIdUsuario1());
                $this->Procedure->bindParam (2, $this->getOrigen());
                $this->Procedure->bindParam (3, $Pedido);

                $this->Procedure->execute();
            }
            catch (Exception $exc) 
            {
                echo 'ERROR AL INSERTAR'.$exc->getMessage();
            }
            finally 
            {
                $this->Conexion->CerrarConexion ();
            }
        }

        public function InsertarDetalleRecibe($Pedido)
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL InsertarDetalleRecibe(?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                
                $this->Procedure->bindParam (1, $this->getIdUsuario2());
                $this->Procedure->bindParam (2, $this->getDestino());
                $this->Procedure->bindParam (3, $Pedido);

                $this->Procedure->execute();
            }
            catch (Exception $exc) 
            {
                echo 'ERROR AL INSERTAR'.$exc->getMessage();
            }
            finally 
            {
                $this->Conexion->CerrarConexion ();
            }
        }

        //METODO PARA DEVOLVER LA INFORMACION COMPLETA AL MODAL

        public function ObtenerDatosModalProducto($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT inventario.Codigo AS CodigoInventario,producto.Codigo AS CodigoProducto,producto.CodigoBarra,producto.NombreProducto,categoria.Nombre AS NameCategoria,categoria.Medida,casa.Nombre AS NameCasa, marca.Nombre As NameMarca,sucursales.Nombre AS NameSucursal,ubicacion.Nombre AS Location,ubicacion.Seccion,inventario.Existencia, producto.PrecioCosto,producto.PrecioVenta, producto.PrecioTope,producto.PrecioB,producto.PrecioC,producto.Descripcion,inventario.FechaVencimiento,inventario.Politica FROM inventario,producto,categoria,laboratorio,casa,marca,sucursales,ubicacion WHERE producto.Codigo = inventario.IdProducto AND categoria.Codigo = producto.IdCategoria AND casa.Codigo = laboratorio.IdCasa AND marca.Codigo = laboratorio.IdMarca AND laboratorio.Codigo = inventario.IdLaboratorio AND sucursales.Codigo = inventario.IdSucursal AND ubicacion.Codigo = inventario.IdUbicacion AND inventario.Codigo = '".$Cod."' GROUP BY inventario.Codigo";
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
                
        function getCodigo() {
            return $this->Codigo;
        }

        function getFecha() {
            return $this->Fecha;
        }

        function getHora() {
            return $this->Hora;
        }

        function getIdUsuario1() {
            return $this->IdUsuario1;
        }

        function getOrigen() {
            return $this->Origen;
        }

        function getIdUsuario2() {
            return $this->IdUsuario2;
        }

        function getDestino() {
            return $this->Destino;
        }

        function getEstado() {
            return $this->Estado;
        }

        function getComentario() {
            return $this->Comentario;
        }

        function setCodigo($Codigo) {
            $this->Codigo = $Codigo;
        }

        function setFecha($Fecha) {
            $this->Fecha = $Fecha;
        }

        function setHora($Hora) {
            $this->Hora = $Hora;
        }

        function setIdUsuario1($IdUsuario1) {
            $this->IdUsuario1 = $IdUsuario1;
        }

        function setOrigen($Origen) {
            $this->Origen = $Origen;
        }

        function setIdUsuario2($IdUsuario2) {
            $this->IdUsuario2 = $IdUsuario2;
        }

        function setDestino($Destino) {
            $this->Destino = $Destino;
        }

        function setEstado($Estado) {
            $this->Estado = $Estado;
        }

        function setComentario($Comentario) {
            $this->Comentario = $Comentario;
        }


    }
?>