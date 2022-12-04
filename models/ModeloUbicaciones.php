<?
    //CLASE LABORATORIOS
    
    class Ubicaciones
    {
        //ATRIBUTOS DE LA CLASE
        
        private $Codigo,$Nombre,$Seccion;
        private $Conexion,$ConexionSql,$SentenciaSql,$Procedure;
        
        //CONSTRUCTOR DE LA CLASE
        
        public function __construct ()
        {
            $this->Conexion = new ClaseConexion ();
        }

        //METODO PARA INSERTAR
        
        public function Insertar ()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL RegistroUbicacion(?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                
                $this->Procedure->bindParam(1,  $this->getNombre());
                $this->Procedure->bindParam(2,  $this->getSeccion());
                
                $this->Procedure->execute();
            }
            catch (Exception $exc) 
            {
                echo "ERROR AL INSERTAR".$exc->getMessage();
            }
            finally 
            {
                $this->Conexion->CerrarConexion ();
            }
        }
        
        //METODO PARA MODIFICAR LABORATORIO
        
        public function Actualizar()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL ModificarUbicacion(?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                
                $this->Procedure->bindParam(1,  $this->getCodigo());
                $this->Procedure->bindParam(2,  $this->getNombre());
                $this->Procedure->bindParam(3,  $this->getSeccion());
                
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

        //METODO PARA ELIMINAR UN REGISTRO
        
        public function EliminarRegistro ()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL EliminarUbicacion(?)";
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

        public function Listar($Buscado)
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT Codigo,Nombre,Seccion FROM ubicacion WHERE CONCAT (Codigo,Nombre) LIKE CONCAT('%".$Buscado."%')";
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

        public function Listar_2()
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT Codigo,Nombre,Seccion FROM ubicacion WHERE Codigo = (SELECT MAX(Codigo) FROM ubicacion)";
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
                $this->SentenciaSql = "SELECT * FROM ubicacion WHERE Codigo = ?";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->execute(array($this->getCodigo()));
                $row = $this->Procedure->fetch();

                $this->setCodigo($row['Codigo']);
                $this->setNombre ($row['Nombre']);
                $this->setSeccion ($row['Seccion']);
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

        function getSeccion() 
        {
            return $this->Seccion;
        }

        function setCodigo($Codigo) 
        {
            $this->Codigo = $Codigo;
        }

        function setNombre($Nombre)
        {
            $this->Nombre = $Nombre;
        }

        function setSeccion($Seccion)
        {
            $this->Seccion = $Seccion;
        }



    }
?>