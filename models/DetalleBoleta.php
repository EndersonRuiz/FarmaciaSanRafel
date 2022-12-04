<?

    //CLASE CATEGORIAS

    class DetalleBoleta
    {
        //ATRIBUTOS DE LA CLASE
        
        private $Codigo;
        private $NumeroBoleta,$Producto,$Cantidad,$SubTotal,$SentenciaSql;
        private $Conexion,$ConexionSql,$Procedure;


        //CONSTRUCTOR DE LA CLASE
        
        public function __construct ()
        {
            $this->Conexion = new ClaseConexion ();
        }
        
        //METODO PARA INSERTAR REGISTRO
        
        public function Insertar ()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL InsertarDetalleBoleta (?,?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                
                $this->Procedure->bindParam(1,  $this->getNumeroBoleta ());
                $this->Procedure->bindParam(2,  $this->getProducto ());
                $this->Procedure->bindParam(3,  $this->getCantidad());
                $this->Procedure->bindParam(4,  $this->getSubTotal());
                
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
        

        //METODOS GETTERS Y SETTERS

        function getCodigo() 
        {
            return $this->Codigo;
        }

        function getNumeroBoleta() 
        {
            return $this->NumeroBoleta;
        }

        function getProducto()
        {
            return $this->Producto;
        }

        function getCantidad() 
        {
            return $this->Cantidad;
        }

        function getSubTotal() 
        {
            return $this->SubTotal;
        }

        function setCodigo($Codigo)
        {
            $this->Codigo = $Codigo;
        }

        function setNumeroBoleta($NumeroBoleta) 
        {
            $this->NumeroBoleta = $NumeroBoleta;
        }

        function setProducto($Producto) 
        {
            $this->Producto = $Producto;
        }

        function setCantidad($Cantidad) 
        {
            $this->Cantidad = $Cantidad;
        }

        function setSubTotal($SubTotal) 
        {
            $this->SubTotal = $SubTotal;
        }
    }
?>