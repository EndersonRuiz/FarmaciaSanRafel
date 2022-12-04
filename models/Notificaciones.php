<?
	class Notifications
	{
		//ATRIBUTOS DE LA CLASE

        private $Codigo;
        private $ConexionSql;
        private $Conexion;
        private $SentenciaSql;
        private $Procedure;
        private $Result;
        private $CodigoRes;

        //CONSTRUCTOR DE LA CLASE

        public function __Construct ()
        {
            $this->Conexion = new ClaseConexion();
        }

        //METODO PARA REALIZAR UNA LISTA DE LOS EMPLEADOS

        public function CodigoReservado1($Cod)
        {
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT Codigo,CodigoReservado FROM usuario where CodigoReservado = '".$Cod."'";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                $this->Procedure->execute();
                $row = $this->Procedure->fetch();
                $this->setCodigo($row['Codigo']);
                $this->setCodigoRes($row['CodigoReservado']);
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



        public function ListarBusqueda()
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "select a.Codigo,a.fecha,a.hora,a.estado,a.comentario,c.Nombre,
 concat(d.PrimerNombre,' ',d.PrimerApellido,' ',d.SegundoApellido) as NombreCompleto
from pedido a, detallerecibe b, sucursales c,usuario d
where a.Codigo = b.Pedido and c.Codigo = b.SucursalRecibe
and a.Estado = '1' and d.Codigo = b.UsuarioRecibe";
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

        public function infoPedido($Buscado)
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT * FROM pedido WHERE Codigo = '".$Buscado."'";
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

        public function Envia($Buscado)
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT usuario.PrimerNombre, usuario.SegundoNombre, usuario.PrimerApellido,usuario.SegundoApellido, sucursales.Nombre FROM detallepedidoenvia,sucursales,usuario WHERE sucursales.Codigo = detallepedidoenvia.SucursalEnvia and usuario.Codigo = detallepedidoenvia.UsuarioEnvia and detallepedidoenvia.Pedido = '".$Buscado."'";
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

        public function Recibe($Buscado)
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT usuario.PrimerNombre, usuario.SegundoNombre, usuario.PrimerApellido,usuario.SegundoApellido, sucursales.Nombre FROM detallerecibe,sucursales,usuario WHERE sucursales.Codigo = detallerecibe.SucursalRecibe and usuario.Codigo = detallerecibe.UsuarioRecibe and detallerecibe.Pedido = '".$Buscado."'";
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

        public function DetallePedido($Buscado)
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT producto.NombreProducto, producto.CodigoBarra,producto.PrecioVenta, detallepedido.Cantidad,inventario.Codigo FROM inventario,producto,detallepedido,pedido WHERE producto.Codigo = inventario.IdProducto AND inventario.Codigo = detallepedido.IdInventario and detallepedido.Pedido = pedido.Codigo AND pedido.Codigo = '".$Buscado."'";
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

        public function MarcarPedido($Buscado,$Usuario)
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "call SumarInventario('".$Buscado."','".$Usuario."')";

                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
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

        public function AumentarInventario($Buscado,$Cantidad)
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "UPDATE inventario SET Existencia = (Existencia + '".$Cantidad."') WHERE Codigo = '".$Buscado."'";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
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


         public function getCodigo(){
            return $this->Codigo;
        }

        public function setCodigo($Codigo){
            $this->Codigo = $Codigo;
        }


         public function getCodigoRes() {
            return $this->CodigoRes;
        }

        public function setCodigoRes($CodigoRes){
            $this->CodigoRes = $CodigoRes;
        }
	}
?>