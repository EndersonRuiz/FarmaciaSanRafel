<?

    //CLASE CATEGORIAS

    class Boleta
    {
        //ATRIBUTOS DE LA CLAS
        
        private $Codigo;
        private $NumeroBoleta,$Fecha,$Hora,$Total,$SentenciaSql;
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
                $this->SentenciaSql = "CALL InsertarBoleta (?,?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                
                $this->Procedure->bindParam(1,  $this->getNumeroBoleta ());
                $this->Procedure->bindParam(2,  $this->getFecha ());
                $this->Procedure->bindParam(3,  $this->getHora());
                $this->Procedure->bindParam(4,  $this->getTotal());
                
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

        function getFecha() 
        {
            return $this->Fecha;
        }

        function getHora() 
        {
            return $this->Hora;
        }

        function getTotal() 
        {
            return $this->Total;
        }

        function setCodigo($Codigo) 
        {
            $this->Codigo = $Codigo;
        }

        function setNumeroBoleta($NumeroBoleta) 
        {
            $this->NumeroBoleta = $NumeroBoleta;
        }

        function setFecha($Fecha) 
        {
            $this->Fecha = $Fecha;
        }

        function setHora($Hora) 
        {
            $this->Hora = $Hora;
        }

        function setTotal($Total) 
        {
            $this->Total = $Total;
        }


    }
?>