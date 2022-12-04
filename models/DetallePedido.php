<?
    class DetallePedido
    {
        private $Codigo,$IdPedido,$IdInventario,$Cantidad;
        private $Conexion,$ConexionSql,$SentenciaSql,$Procedure;

        public function __Construct ()
        {
            $this->Conexion = new ClaseConexion ();
        }
        
        public function InsertarDetalle()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL InsertarDetallePedido(?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                
                $this->Procedure->bindParam (1, $this->getIdPedido());
                $this->Procedure->bindParam (2, $this->getIdInventario());
                $this->Procedure->bindParam (3, $this->getCantidad());

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



        //METODO PARA OBTENER EL CODIGO DE LA SALIDA REALIZADA

        public function ObtenerCodigo ()
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT MAX(Codigo) AS Codigo FROM pedido";
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
        
        function getCodigo() {
            return $this->Codigo;
        }

        function getIdPedido() {
            return $this->IdPedido;
        }

        function getIdInventario() {
            return $this->IdInventario;
        }

        function getCantidad() {
            return $this->Cantidad;
        }

        function setCodigo($Codigo) {
            $this->Codigo = $Codigo;
        }

        function setIdPedido($IdPedido) {
            $this->IdPedido = $IdPedido;
        }

        function setIdInventario($IdInventario) {
            $this->IdInventario = $IdInventario;
        }

        function setCantidad($Cantidad) {
            $this->Cantidad = $Cantidad;
        }


    }
?>