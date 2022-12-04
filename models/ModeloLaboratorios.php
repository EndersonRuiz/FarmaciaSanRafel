<?

    //CLASE LABORATORIOS
    
    class Laboratorios
    {
        //ATRIBUTOS DE LA CLASE
        
        private $Codigo,$CodigoCasa,$CodigoMarca,$NombreCasa,$NombreMarca;
        private $Conexion,$ConexionSql,$SentenciaSql,$Procedure;
        private $PrimerNombre,$SegundoNombre,$PrimerApellido,$SegundoApellido;
        private $Direccion,$Celular,$Edad,$Sexo;
        private $CodigoPaciente,$peso,$Temperatura,$TotalPago,$NumeroP,$Observacion;
        
        //CONSTRUCTOR DE LA CLASE
        
        public function __construct ()
        {
            $this->Conexion = new ClaseConexion ();
        }

        //METODO PARA INSERTAR
        
        public function InsertarLaboratorio ()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL RegistroLaboratorio(?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                
                $this->Procedure->bindParam(1,  $this->getCodigoCasa());
                $this->Procedure->bindParam(2,  $this->getCodigoMarca());
                
                $this->Procedure->execute();
            }
            catch (Exception $exc) 
            {
                echo "ERROR AL INSERTAR LABORATORIO".$exc->getMessage();
            }
            finally 
            {
                $this->Conexion->CerrarConexion ();
            }
        }






        //METODO DE REGISTRO PARA RESERVAR PUESTO
        public function InsertarConsulta(){
            try{

                $this->ConexionSql = $this->Conexion->CrearConexion();
                $this->SentenciaSql = "CALL RegistroConsulta(?,?,?,?,?,?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1, $this->getCodigoPaciente());
                $this->Procedure->bindParam(2, $this->getPeso());
                $this->Procedure->bindParam(3, $this->getTemperatura());
                $this->Procedure->bindParam(4, $this->getTotalPago());
                $this->Procedure->bindParam(5, $this->getNumeroP());
                $this->Procedure->bindParam(6, $this->getObservacion());
                $this->Procedure->bindParam(7, $this->getCelular());
                $this->Procedure->bindParam(8, $this->getEdad());

                $this->Procedure->execute();

            }catch(Exception $exc){
                echo "ERROR AL INSERTAR PACIENTE A CONSULTA".$exc->getMessage();
            }
            finally{
                $this->Conexion->CerrarConexion();
            }
        }

        public function InsertarHistorial(){
            try{

                $this->ConexionSql = $this->Conexion->CrearConexion();
                $this->SentenciaSql = "CALL RegistroHistorial(?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1, $this->getCodigo());
                $this->Procedure->bindParam(2, $this->getPrimerNombre());

                $this->Procedure->execute();

            }catch(Exception $exc){
                echo "ERROR AL INSERTAR PACIENTE A CONSULTA".$exc->getMessage();
            }
            finally{
                $this->Conexion->CerrarConexion();
            }
        }



        public function ListarBusqueda1()
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select a.Codigo,a.CodigoPaciente,a.NumeroP,c.PrimerNombre,c.SegundoNombre,c.PrimerApellido,c.SegundoApellido,a.Fecha,a.Hora,a.Observacion
                    from reserva a, pacientes c
                    where c.Codigo = a.CodigoPaciente and a.Estado = 1 and Fecha = current_date()";
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


         public function ListarBusqueda2($codigo)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select a.Codigo,a.CodigoPaciente,a.NumeroP,c.PrimerNombre,c.SegundoNombre,c.PrimerApellido,c.SegundoApellido,
                   c.Direcion,c.Celular,c.Edad,c.Sexo,a.Peso,a.Temperatura,a.TotalPago,a.Fecha,a.Hora,a.Observacion
                   from reserva a, pacientes c
                    where c.Codigo = a.CodigoPaciente and a.Codigo = '".$codigo."'";
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

            public function ListarBusqueda3($codigo)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "select f.Codigo as Codi,a.Codigo,a.CodigoPaciente,a.NumeroP,a.Peso,a.Temperatura,a.Fecha,a.Hora,f.Historial
                    from reserva a, pacientes c, historialmedico f
                   where c.Codigo = a.CodigoPaciente and f.CodigoReserva = a.Codigo and a.CodigoPaciente = '".$codigo."' order by f.Codigo desc";
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










        //METODO PARA REGISTRAR UN NUEVO PACIENTE
        public function InsertarPaciente(){
            try{

                $this->ConexionSql = $this->Conexion->CrearConexion();
                $this->SentenciaSql = "CALL RegistroPaciente(?,?,?,?,?,?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1, $this->getPrimerNombre());
                $this->Procedure->bindParam(2, $this->getSegundoNombre());
                $this->Procedure->bindParam(3, $this->getPrimerApellido());
                $this->Procedure->bindParam(4, $this->getSegundoApellido());
                $this->Procedure->bindParam(5, $this->getDireccion());
                $this->Procedure->bindParam(6, $this->getCelular());
                $this->Procedure->bindParam(7, $this->getEdad());
                $this->Procedure->bindParam(8, $this->getSexo());

                $this->Procedure->execute();

            }catch(Exception $exc){
                echo "ERROR AL INSERTAR PACIENTE".$exc->getMessage();
            }
            finally{
                $this->Conexion->CerrarConexion();
            }
        }


        public function Listar321($Buscado)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "SELECT Codigo,PrimerNombre,SegundoNombre,PrimerApellido,SegundoApellido,Direcion,Celular,Edad,Sexo FROM pacientes WHERE CONCAT (Codigo,PrimerNombre,SegundoNombre,PrimerApellido,SegundoApellido) LIKE CONCAT('%".$Buscado."%')";
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

             public function EliminarPacientes ()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL EliminarPacientes(?)";
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


        public function ObtenerPaciente()
            {
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "SELECT * FROM pacientes WHERE Codigo = ?";
                    $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                    $this->Procedure->execute(array($this->getCodigo()));
                    $row = $this->Procedure->fetch();

                    $this->setCodigo($row['Codigo']);
                    $this->setPrimerNombre ($row['PrimerNombre']);
                    $this->setSegundoNombre ($row['SegundoNombre']);
                    $this->setPrimerApellido ($row['PrimerApellido']);
                    $this->setSegundoApellido ($row['SegundoApellido']);
                    $this->setDireccion ($row['Direcion']);
                    $this->setCelular ($row['Celular']);
                    $this->setEdad ($row['Edad']);
                    $this->setSexo ($row['Sexo']);
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
         //FIN DEL METODO DE REGISTRO DE PACIENTES









        
        //METODO PARA MODIFICAR LABORATORIO
        
        public function ActualizarLaboratorio()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL ModificarLaboratorio(?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                
                $this->Procedure->bindParam(1,  $this->getCodigo());
                $this->Procedure->bindParam(2,  $this->getCodigoCasa());
                $this->Procedure->bindParam(3,  $this->getCodigoMarca());
                
                $this->Procedure->execute();
            }
            catch (Exception $exc) 
            {
                echo "ERROR AL ACTUALIZAR LABORATORIO ".$exc->getMessage();
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
                $this->SentenciaSql = "CALL EliminarLaboratorio(?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                
                $this->Procedure->bindParam(1,  $this->getCodigo());
                
                $this->Procedure->execute();
            }
            catch (Exception $exc) 
            {
                echo "ERROR AL ELIMINAR LABORATORIO ".$exc->getMessage();
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
                $this->SentenciaSql = "SELECT laboratorio.Codigo,casa.Nombre,marca.Nombre as NomMarca FROM laboratorio,casa,marca WHERE casa.Codigo = laboratorio.IdCasa and marca.Codigo = laboratorio.IdMarca order by laboratorio.Codigo";
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

        //LISTAR 2

        public function Listar_1()
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT laboratorio.Codigo as LabCod,casa.Codigo as CodCasa,casa.Nombre as NomCasa,marca.Codigo as CodCasa FROM laboratorio,casa,marca WHERE casa.Codigo = laboratorio.IdCasa and marca.Codigo = laboratorio.IdMarca order by laboratorio.Codigo";
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

        //LISTA PARA PRODUCTOS

         public function Listar_2()
         {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT laboratorio.Codigo as LabCod,casa.Codigo as CodCasa,casa.Nombre as NomCasa,marca.Codigo as CodCasa, marca.Nombre as NomMarca FROM laboratorio,casa,marca WHERE casa.Codigo = laboratorio.IdCasa and marca.Codigo = laboratorio.IdMarca order by laboratorio.Codigo desc";
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

        //LISTA PARA PRODUCTOS

         public function Listar_3()
         {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT laboratorio.Codigo as LabCod,casa.Nombre as NomCasa, marca.Nombre as NomMarca FROM laboratorio,casa,marca WHERE casa.Codigo = laboratorio.IdCasa and marca.Codigo = laboratorio.IdMarca and laboratorio.Codigo = (SELECT MAX(Codigo) FROM laboratorio)";
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
                    $this->SentenciaSql = "SELECT laboratorio.Codigo,casa.Codigo as CodCasa,casa.Nombre as NomCasa,marca.Codigo as CodMarca,marca.Nombre as NomMarca FROM laboratorio,casa,marca WHERE casa.Codigo = laboratorio.IdCasa and marca.Codigo = laboratorio.IdMarca and laboratorio.Codigo = ?";
                    $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                    $this->Procedure->execute(array($this->getCodigo()));
                    $row = $this->Procedure->fetch();

                    $this->setCodigo($row['Codigo']);
                    $this->setCodigoCasa ($row['CodCasa']);
                    $this->setNombreCasa ($row['NomCasa']);
                    $this->setCodigoMarca ($row['CodMarca']);
                    $this->setNombreMarca ($row['NomMarca']);
               
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
        public function getCodigoPaciente(){
            return $this->CodigoPaciente;
        }

        public function setCodigoPaciente($CodigoPaciente){
            $this->CodigoPaciente = $CodigoPaciente;
        }

        public function getPeso(){
            return $this->Peso;
        }

        public function setPeso($Peso){
            $this->Peso = $Peso;
        }

        public function getTemperatura(){
            return $this->Temperatura;
        }

        public function setTemperatura($Temperatura){
            $this->Temperatura = $Temperatura;
        }

        public function getTotalPago(){
            return $this->TotalPago;
        }

        public function setTotalPago($TotalPago){
            $this->TotalPago = $TotalPago;
        }

        public function getNumeroP(){
            return $this->NumeroP;
        }

        public function setNumeroP($NumeroP){
            $this->NumeroP = $NumeroP;
        }

        public function getObservacion(){
            return $this->Observacion;
        }

        public function setObservacion($Observacion){
            $this->Observacion = $Observacion;
        }




        public function getPrimerNombre(){
            return $this->PrimerNombre;
        }

        public function setPrimerNombre($PrimerNombre){
            $this->PrimerNombre = $PrimerNombre;
        }

        public function getSegundoNombre(){
            return $this->SegundoNombre;
        }

        public function setSegundoNombre($SegundoNombre){
            $this->SegundoNombre = $SegundoNombre;
        }

        public function getPrimerApellido(){
            return $this->PrimerApellido;
        }

        public function setPrimerApellido($PrimerApellido){
            $this->PrimerApellido = $PrimerApellido;
        }

        public function getSegundoApellido(){
            return $this->SegundoApellido;
        }

        public function setSegundoApellido($SegundoApellido){
            $this->SegundoApellido = $SegundoApellido;
        }

        public function getDireccion(){
            return $this->Direccion;
        }

        public function setDireccion($Direccion){
            $this->Direccion = $Direccion;
        }

        public function getCelular(){
            return $this->Celular;
        }

        public function setCelular($Celular){
            $this->Celular = $Celular;
        }

        public function getEdad(){
            return $this->Edad;
        }

        public function setEdad($Edad){
            $this->Edad = $Edad;
        }

        public function getSexo(){
            return $this->Sexo;
        }

        public function setSexo($Sexo){
            $this->Sexo = $Sexo;
        }
        
        public function getCodigo() {
            return $this->Codigo;
        }

        public function getCodigoCasa() {
            return $this->CodigoCasa;
        }

        public function getCodigoMarca() {
            return $this->CodigoMarca;
        }

        public function setCodigo($Codigo) {
            $this->Codigo = $Codigo;
        }

        public function setCodigoCasa($CodigoCasa) {
            $this->CodigoCasa = $CodigoCasa;
        }

        public function setCodigoMarca($CodigoMarca) {
            $this->CodigoMarca = $CodigoMarca;
        }

        public function getNombreCasa() 
        {
            return $this->NombreCasa;
        }

        public function getNombreMarca() 
        {
            return $this->NombreMarca;
        }

        public function setNombreCasa($NombreCasa) 
        {
            $this->NombreCasa = $NombreCasa;
        }

        public function setNombreMarca($NombreMarca) 
        {
            $this->NombreMarca = $NombreMarca;
        }


    }
?>