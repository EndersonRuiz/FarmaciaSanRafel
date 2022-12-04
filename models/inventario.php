<?
    class Inventario
    {
        //ATRIBUTOS DE LA CLASE
        
        private $Codigo,$IdProducto,$IdLaboratorio,$IdUbicacion,$IdSucursal,$Existencia;
        private $FechaVencimiento,$Politica,$verificacion;
        private $Conexion;
        private $ConexionSql,$SentenciaSql,$Procedure;


        //CONSTRUCTOR DE LA CLASE
        
        public function  __Construct ()
        {
            $this->Conexion = new ClaseConexion ();
        }
        
        //METODO PARA INSERTAR UN INVENTARIO
        
        public function Insertar ()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL RegistroInventario(?,?,?,?,?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1, $this->getIdProducto ());
                $this->Procedure->bindParam(2, $this->getIdLaboratorio ());
                $this->Procedure->bindParam(3, $this->getIdUbicacion ());
                $this->Procedure->bindParam(4, $this->getIdSucursal ());
                $this->Procedure->bindParam(5, $this->getExistencia ());
                $this->Procedure->bindParam(6, $this->getFechaVencimiento ());
                $this->Procedure->bindParam(7, $this->getPolitica ());
                
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

         public function InsertarBodega ()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL InsertarVariosRegistros(?,?,?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1, $this->getIdProducto ());
                $this->Procedure->bindParam(2, $this->getIdLaboratorio ());
                $this->Procedure->bindParam(3, $this->getIdUbicacion ());
                $this->Procedure->bindParam(4, $this->getFechaVencimiento ());
                $this->Procedure->bindParam(5, $this->getPolitica ());
                
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
        
        public function Actualizar1212()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "INSERT into controlfechas(Usuario,Producto,Sucursal,Existencia,Fecha,Hora,FechaCambiada) values(?,?,?,?,Date_format((DATE_SUB(NOW(),INTERVAL 6 HOUR)),'%Y/%m/%d'),Date_format((DATE_SUB(NOW(),INTERVAL 6 HOUR)),'%H:%i:%s'),?);";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1, $this->getVerificacion ());
                $this->Procedure->bindParam(2, $this->getIdProducto ());
                $this->Procedure->bindParam(3, $this->getIdSucursal ());
                $this->Procedure->bindParam(4, $this->getExistencia ());
                $this->Procedure->bindParam(5, $this->getFechaVencimiento ());
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

        public function Actualizar12 ()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL ControlMod(?,?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1, $this->getVerificacion ());
                $this->Procedure->bindParam(2, $this->getIdProducto ());
                $this->Procedure->bindParam(3, $this->getIdSucursal ());
                $this->Procedure->bindParam(4, $this->getExistencia ());
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
        //METODO PARA ACTUALIZAR INVENTARIO
        
        //METODO PARA ACTUALIZAR INVENTARIO
        public function ActualizarProductoSanJuan()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "UPDATE inventario SET IdUbicacion = ?,FechaVencimiento = ?,Politica = ? WHERE Codigo = ?;";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1, $this->getIdUbicacion ());
                $this->Procedure->bindParam(2, $this->getFechaVencimiento ());
                $this->Procedure->bindParam(3, $this->getPolitica ());
                $this->Procedure->bindParam(4, $this->getCodigo ());

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
        
        public function Actualizar ()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL ModificarInventario(?,?,?,?,?,?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1, $this->getCodigo ());
                $this->Procedure->bindParam(2, $this->getIdProducto ());
                $this->Procedure->bindParam(3, $this->getIdLaboratorio ());
                $this->Procedure->bindParam(4, $this->getIdUbicacion ());
                $this->Procedure->bindParam(5, $this->getIdSucursal ());
                $this->Procedure->bindParam(6, $this->getExistencia ());
                $this->Procedure->bindParam(7, $this->getFechaVencimiento ());
                $this->Procedure->bindParam(8, $this->getPolitica ());

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
        
        public function Eliminar()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL EliminarInventario (?)";
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

        //METODO PARA ACTUALIZAR INVENTARIO
        
        public function ActualizarLaboratorio ($Labb,$CodInve)
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "UPDATE inventario SET IdLaboratorio = ? WHERE Codigo = '".$CodInve."'";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->bindParam(1, $Labb);

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

          public function Listar()
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "call InventarioGeneral";
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
         //METODO PARA REALIZAR UNA LISTA DE INVENTARIO

        public function ObtenerDatosParaEditar($Cod)
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT * FROM inventario WHERE Codigo = '".$Cod."'";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                $row = $this->Procedure->fetch();

                $this->setCodigo($row['Codigo']);
                $this->setIdProducto($row['IdProducto']);
                $this->setIdLaboratorio($row['IdLaboratorio']);
                $this->setIdUbicacion($row['IdUbicacion']);
                $this->setIdSucursal($row['IdSucursal']);
                $this->setExistencia($row['Existencia']);
                $this->setFechaVencimiento($row['FechaVencimiento']);
                $this->setPolitica($row['Politica']);
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

        public function ObtenerProducto($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT Codigo,NombreProducto FROM producto WHERE Codigo = '".$Cod."'";
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

        //OBTENER LABORATORIO

        public function ObtenerLaboratorio($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT laboratorio.Codigo as LabCod,casa.Nombre as NomCasa, marca.Nombre as NomMarca FROM laboratorio,casa,marca WHERE casa.Codigo = laboratorio.IdCasa and marca.Codigo = laboratorio.IdMarca and laboratorio.Codigo = '".$Cod."'";
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

        //METODO PARA VERIFICAR SI EXISTE EXISTENCIA SUFUCIENTE

        public function VerificaStock ($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT Existencia FROM inventario WHERE Codigo = '".$Cod."'";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
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


        //OBTENER POLITICA

        public function ObtenerPolitica($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT Codigo,FechaPolitica,FechaVencimiento FROM politica WHERE Codigo = '".$Cod."'";
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

        //OBTENER UBICACION

        public function ObtenerUbicacion($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT Codigo,Nombre,Seccion AS Exacta FROM ubicacion WHERE Codigo = '".$Cod."'";
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

        //OBTENER UBICACION

        public function ObtenerSucursal($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT * FROM sucursales WHERE Codigo = '".$Cod."'";
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

        //METODO PARA DEVOLVER LA INFORMACION COMPLETA AL MODAL

         public function ObtenerDatosModalProducto($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT inventario.Codigo AS CodigoInventario,producto.Codigo AS CodigoProducto,producto.CodigoBarra,producto.NombreProducto,categoria.Nombre AS NameCategoria,categoria.Medida,casa.Nombre AS NameCasa, marca.Nombre As NameMarca,sucursales.Nombre AS NameSucursal,ubicacion.Nombre AS Location,ubicacion.Seccion,inventario.Existencia, producto.PrecioCosto,producto.PrecioVenta, producto.PrecioTope,producto.Descripcion,inventario.FechaVencimiento,inventario.Politica FROM inventario,producto,categoria,laboratorio,casa,marca,sucursales,ubicacion WHERE producto.Codigo = inventario.IdProducto AND categoria.Codigo = producto.IdCategoria AND casa.Codigo = laboratorio.IdCasa AND marca.Codigo = laboratorio.IdMarca AND laboratorio.Codigo = inventario.IdLaboratorio AND sucursales.Codigo = inventario.IdSucursal AND ubicacion.Codigo = inventario.IdUbicacion AND inventario.Codigo = '".$Cod."' GROUP BY inventario.Codigo";
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



        //OBTENER PRODUCTO

        public function ObtenerProductoF($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT inventario.Codigo,producto.NombreProducto,producto.PrecioVenta,producto.PrecioTope,sucursales.Nombre as NameSucursal FROM producto,inventario,sucursales WHERE inventario.IdProducto = producto.Codigo AND inventario.IdSucursal = sucursales.Codigo AND inventario.Codigo = '".$Cod."' GROUP BY inventario.Codigo";
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

        public function ObtenerDescuentosModal ($IdProduct)
        {
            try
            {
                $datos = array();
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT Codigo,Descuento FROM descuentos WHERE Producto = '".$IdProduct."'";
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
                $this->SentenciaSql = "SELECT Codigo,Descuento FROM descuentos WHERE Producto = '".$IdProduct."'";
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

        public function Alerta1($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT inventario.Codigo,producto.NombreProducto,producto.PrecioVenta,sucursales.Nombre as NameSucursal, inventario.FechaVencimiento,ubicacion.Nombre as Estante, ubicacion.Seccion FROM producto,inventario,sucursales,ubicacion WHERE inventario.IdProducto = producto.Codigo AND inventario.IdSucursal = sucursales.Codigo AND ubicacion.Codigo = inventario.IdUbicacion AND inventario.Codigo = '".$Cod."' GROUP BY inventario.Codigo";
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
        function getVerificacion() {
            return $this->verificacion;
        }

        
        function getCodigo() {
            return $this->Codigo;
        }

        function getIdProducto() {
            return $this->IdProducto;
        }

        function getIdLaboratorio() {
            return $this->IdLaboratorio;
        }

        function getIdUbicacion() {
            return $this->IdUbicacion;
        }

        function getIdSucursal() {
            return $this->IdSucursal;
        }

        function getExistencia() {
            return $this->Existencia;
        }

        function setCodigo($Codigo) {
            $this->Codigo = $Codigo;
        }

        public function setVerificacion($verificacion) {
            $this->verificacion = $verificacion;
        }

        public function setIdProducto($IdProducto) {
            $this->IdProducto = $IdProducto;
        }

        public function setIdLaboratorio($IdLaboratorio) {
            $this->IdLaboratorio = $IdLaboratorio;
        }

        public function setIdUbicacion($IdUbicacion) {
            $this->IdUbicacion = $IdUbicacion;
        }

        public function setIdSucursal($IdSucursal) {
            $this->IdSucursal = $IdSucursal;
        }

        public function setExistencia($Existencia) {
            $this->Existencia = $Existencia;
        }

        function getPolitica() {
            return $this->Politica;
        }

        function setPolitica($Politica) {
            $this->Politica = $Politica;
        }

        function getFechaVencimiento() {
            return $this->FechaVencimiento;
        }

        function setFechaVencimiento($FechaVencimiento) {
            $this->FechaVencimiento = $FechaVencimiento;
        }


    }
?>
