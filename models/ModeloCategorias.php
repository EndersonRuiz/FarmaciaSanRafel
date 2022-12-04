<?

    //CLASE CATEGORIAS

    class Categorias
    {
        //ATRIBUTOS DE LA CLAS
        
        private $Codigo;
        private $Nombre,$Medida,$Descripcion,$SentenciaSql;
        private $Conexion,$ConexionSql,$Procedure;


        //CONSTRUCTOR DE LA CLASE
        
        public function __construct ()
        {
            $this->Conexion = new ClaseConexion ();
        }
        
        //METODO PARA INSERTAR REGISTRO
        
        public function InsertarCategoria ()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL RegistroCategoria(?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                
                $this->Procedure->bindParam(1,  $this->getNombre ());
                $this->Procedure->bindParam(2,  $this->getMedida ());
                $this->Procedure->bindParam(3,  $this->getDescripcion());
                
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
        
    
        //METODO PARA ACTUALIZAR UN REGISTRO
        
        public function ActualizarCategoria ()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL ModificarCategoria (?,?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                
                $this->Procedure->bindParam(1,  $this->getCodigo());
                $this->Procedure->bindParam(2,  $this->getNombre ());
                $this->Procedure->bindParam(3,  $this->getMedida ());
                $this->Procedure->bindParam(4,  $this->getDescripcion());
                
                $this->Procedure->execute();
            } 
            catch (Exception $exc) 
            {
                echo "ERROR AL ACTUALIZAR ".$exc->getMessage();
            }
            finally 
            {
                $this->Conexion->CerrarConexion ();
            }
        }
        
        //METODO PARA ELIMINAR UNA CATEGORIA
        
        public function EliminarCategoria ()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL EliminarCategoria (?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                
                $this->Procedure->bindParam(1,  $this->getCodigo());
  
                $this->Procedure->execute();
            } 
            catch (Exception $exc) 
            {
                echo "ERROR AL ELIMINAR ".$exc->getMessage();
            }
            finally 
            {
                $this->Conexion->CerrarConexion ();
            }
        }

        //METODO PARA REALIZAR UNA LISTA DE LOS EMPLEADOS

        public function Listar($Cod)
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT a.Codigo,a.Nombre,a.Medida FROM categoria a,producto b WHERE a.Codigo = b.IdCategoria AND b.Codigo = '".$Cod."'";
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

        public function Listar_1()
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT Codigo,Nombre,Medida,Descripcion FROM categoria";
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

         //METODO PARA DEVOLVER DATOS

            public function Obtener()
            {
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "SELECT * FROM categoria WHERE Codigo = ?";
                    $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                    $this->Procedure->execute(array($this->getCodigo()));
                    $row = $this->Procedure->fetch();

                    $this->setCodigo($row['Codigo']);
                    $this->setNombre ($row['Nombre']);
                    $this->setMedida ($row['Medida']);
                    $this->setDescripcion($row['Descripcion']);
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

        //METODOS GETTERS Y SETTERS
        
        function getCodigo() 
        {
            return $this->Codigo;
        }

        function getNombre() 
        {
            return $this->Nombre;
        }

        function getMedida() 
        {
            return $this->Medida;
        }

        function getDescripcion() 
        {
            return $this->Descripcion;
        }

        function setCodigo($Codigo) 
        {
            $this->Codigo = $Codigo;
        }

        function setNombre($Nombre) 
        {
            $this->Nombre = $Nombre;
        }

        function setMedida($Medida) 
        {
            $this->Medida = $Medida;
        }

        function setDescripcion($Descripcion) 
        {
            $this->Descripcion = $Descripcion;
        }


    }
?>