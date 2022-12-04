<?
 
    //CLASE LABORATORIOS
    
    class Productos
    {
        //ATRIBUTOS DE LA CLASE
        
        private $Codigo,$CodigoBarra,$Nombre,$Categoria,$Descripcion;
        private $PrecioCosto,$PrecioVenta,$PrecioTope,$Existencia;
        private $Conexion,$ConexionSql,$SentenciaSql,$Procedure;
        private $Descuento,$Estado,$Prod,$CodDescuento;
        
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
                $this->SentenciaSql = "CALL RegistroProducto(?,?,?,?,?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                
                $this->Procedure->bindParam(1,  $this->getCodigoBarra());
                $this->Procedure->bindParam(2,  $this->getNombre());
                $this->Procedure->bindParam(3,  $this->getCategoria());
                $this->Procedure->bindParam(4,  $this->getPrecioCosto());
                $this->Procedure->bindParam(5,  $this->getPrecioVenta());
                $this->Procedure->bindParam(6,  $this->getPrecioTope());
                $this->Procedure->bindParam(7,  $this->getDescripcion());
                
                $this->Procedure->execute();

                print "<script>alert ('Registro exitoso..!');</script>";
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

        //METODO PARA INSERTAR DESCUENTOS 

        public function InsertarDescuento ()
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "INSERT INTO Descuentos VALUES (null,?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                
                $this->Procedure->bindParam(1,  $this->getDescuento());
                $this->Procedure->bindParam(2,  $this->getEstado());
                $this->Procedure->bindParam(3,  $this->getProd());
                
                $this->Procedure->execute();
            }
            catch (Exception $e)
            {
                echo "Error al insertar descuento".$e->getMessage();
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
                $this->SentenciaSql = "CALL ModificarProducto(?,?,?,?,?,?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1,  $this->getCodigo()); 
                $this->Procedure->bindParam(2,  $this->getCodigoBarra());
                $this->Procedure->bindParam(3,  $this->getNombre());
                $this->Procedure->bindParam(4,  $this->getCategoria());
                $this->Procedure->bindParam(5,  $this->getPrecioCosto());
                $this->Procedure->bindParam(6,  $this->getPrecioVenta());
                $this->Procedure->bindParam(7,  $this->getPrecioTope());
                $this->Procedure->bindParam(8,  $this->getDescripcion());
                
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

        public function ActualizarDescuento($Productos,$Codigo)
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "UPDATE descuentos SET Descuento = ? WHERE Producto ='".$Productos."' AND Codigo='".$Codigo."'";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->bindParam(1,  $this->getDescuento());
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
                $this->SentenciaSql = "CALL EliminarProducto(?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                
                $this->Procedure->bindParam(1,  $this->getCodigo());
                
                $this->Procedure->execute();
                 print "<script>alert ('Registro eliminado..');</script>";
            }
            catch (Exception $exc) 
            {
                 print "<script>alert ('NO SE PUEDE ELIMINAR UN REGISTRO QUE ESTA EN USO EN LAS SUCURSALES');</script>";
                echo "ERROR AL ELIMINAR ".$exc->getMessage();
            }
            finally 
            {
                $this->Conexion->CerrarConexion ();
            }
        }


        //listar ultimo registro

        public function ListarMax()
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT producto.Codigo,producto.NombreProducto FROM producto where producto.Codigo = (SELECT MAX(producto.Codigo) FROM producto)";
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

        //METODO PARA OBTENER EL CODIGO

        public function ObtenerCodigo ()
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT MAX(Codigo) AS Codigo FROM producto";
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

        //METODO PARA OBTENER TODOS LOS DATOS

        public function ObtenerDatos ()
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT * FROM producto where Codigo = ?";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->execute(array($this->getCodigo()));
                $row = $this->Procedure->fetch();

                $this->setCodigo($row['Codigo']);
                $this->setCodigoBarra($row['CodigoBarra']);
                $this->setNombre($row['NombreProducto']);
                $this->setCategoria($row['IdCategoria']);
                $this->setPrecioCosto($row['PrecioCosto']);
                $this->setPrecioVenta($row['PrecioVenta']);
                $this->setPrecioTope($row['PrecioTope']);
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

        //METODO PARA OBTENER TODOS LOS DATOS PARA DEVOLVERLOS AL MODAL 

        public function ObtenerDatosModal ($IdProduct)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT producto.Codigo,producto.CodigoBarra,producto.NombreProducto,categoria.Nombre,producto.PrecioCosto,producto.PrecioVenta,producto.PrecioTope,producto.Descripcion FROM producto,categoria  where categoria.Codigo = producto.IdCategoria AND producto.Codigo = '".$IdProduct."'";
                

                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);  
                $this->Result = array();
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
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

        public function ObtenerDescuentosModal ($IdProduct)
        {
            try
            {
                $datos = array();
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT Codigo,Descuento FROM descuentos WHERE producto = '".$IdProduct."'";
                $this->Stm = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Stm->execute();
                $this->Result = $this->Stm->fetchAll();
                foreach ($this->Result as $key => $value) {
                    $datos[] = array(
                        "caption" => $value['Descuento']
                );}
                return $datos;
            }
            catch(Exception $e)
            {
                echo "Error al buscar".$e->getMessage();
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }
        }

        public function ObtenerDescuentosModalCodigo ($IdProduct)
        {
            try
            {
                $datos = array();
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT Codigo,Descuento FROM descuentos WHERE producto = '".$IdProduct."'";
                $this->Stm = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Stm->execute();
                $this->Result = $this->Stm->fetchAll();
                foreach ($this->Result as $key => $value) {
                    $datos[] = array(
                        "value" => $value['Codigo'],
                        "caption" => $value['Descuento']
                );}
                return $datos;
            }
            catch(Exception $e)
            {
                echo "Error al buscar".$e->getMessage();
            }
            finally
            {
                $this->Conexion->CerrarConexion ();
            }
        }



        
        function getCodigo() {
            return $this->Codigo;
        }

        function getCodigoBarra() {
            return $this->CodigoBarra;
        }

        function getNombre() {
            return $this->Nombre;
        }

        function getCategoria() {
            return $this->Categoria;
        }

        function getDescripcion() {
            return $this->Descripcion;
        }

        function getPrecioCosto() {
            return $this->PrecioCosto;
        }

        function getPrecioVenta() {
            return $this->PrecioVenta;
        }

        function getPrecioTope() {
            return $this->PrecioTope;
        }

        function setCodigo($Codigo) {
            $this->Codigo = $Codigo;
        }

        function setCodigoBarra($CodigoBarra) {
            $this->CodigoBarra = $CodigoBarra;
        }

        function setNombre($Nombre) {
            $this->Nombre = $Nombre;
        }

        function setCategoria($Categoria) {
            $this->Categoria = $Categoria;
        }

        function setDescripcion($Descripcion) {
            $this->Descripcion = $Descripcion;
        }

        function setPrecioCosto($PrecioCosto) {
            $this->PrecioCosto = $PrecioCosto;
        }

        function setPrecioVenta($PrecioVenta) {
            $this->PrecioVenta = $PrecioVenta;
        }

        function setPrecioTope($PrecioTope) {
            $this->PrecioTope = $PrecioTope;
        }

        function getExistencia() {
            return $this->Existencia;
        }

        function setExistencia($Existencia) {
            $this->Existencia = $Existencia;
        }

        function setDescuento($Descuentos) {
            $this->Descuento = $Descuentos;
        }

        function setEstado($Estado) {
            $this->Estado = $Estado;
        }

        function getDescuento() {
            return $this->Descuento;
        }

        function getEstado() {
            return $this->Estado;
        }

        function getProd ()
        {
            return $this->Prod;
        }

        function setProd($Prod) {
            $this->Prod = $Prod;
        }

        function setCodigoDescuento ($Cod)
        {
            $this->CodDescuento = $Cod;
        }

        function getCodigoDescuento ()
        {
            return $this->CodDescuento;
        }
    }
?>