<?
    class Sucursales
    {
        //ATRIBUTOS DE LA CLASE
        
        private $Id,$Nombre;
        private $Conexion;
        private $ConexionSql,$SentenciaSql,$Procedure;


        //CONSTRUCTOR DE LA CLASE
        
        public function  __Construct ()
        {
            $this->Conexion = new ClaseConexion ();
        }
        
        //METODO PARA INSERTAR UNA CASA
        
        public function Insertar ()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL RegistroSucursales(?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1, $this->getNombre ());
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
        
        //METODO PARA ACTUALIZAR CASA
        
        public function Actualizar ()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CerrarConexion ();
                $this->SentenciaSql = "CALL ActualizarMarca (?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->bindParam(1, $this->getId ());
                $this->Procedure->bindParam(2, $this->getNombre ());
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
        
        //METODO PARA ELIMINAR CASA
        
        public function Eliminar ()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CerrarConexion ();
                $this->SentenciaSql = "CALL EliminarMarca (?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->bindParam(1, $this->getId ());;
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

        //METODO PARA REALIZAR UNA LISTA DE LOS EMPLEADOS

        public function Listar()
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT Codigo,Nombre FROM sucursales order by Nombre";
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

        public function Listarrw()
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT DISTINCTROW Nombre from ubicacion order by Nombre";
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
                $this->SentenciaSql = "SELECT Codigo,PrimerNombre,PrimerApellido FROM usuario";
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
        
        public function getId() 
        {
            return $this->Id;
        }

        public function getNombre() 
        {
            return $this->Nombre;
        }

        public function setId($Id) 
        {
            $this->Id = $Id;
        }

        public function setNombre($Nombre) 
        {
            $this->Nombre = $Nombre;
        }


    }
?>

