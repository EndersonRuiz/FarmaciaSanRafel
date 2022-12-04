<?
    //CLASE CATEGORIAS

    class Kardex
    {
        //ATRIBUTOS DE LA CLASE
        
        private $Codigo,$IdUsuario,$IdInventario,$Cantidad,$Tipo,$Total,$IdSucursal;
        private $Conexion,$ConexionSql,$Procedure,$SentenciaSql;


        //CONSTRUCTOR DE LA CLASE
        
        public function __construct ()
        {
            $this->Conexion = new ClaseConexion ();
        }
        
        public function ProductosVendidosFSR1($FechaInicio,$FechaFin){
            try{
                $this->ConexionSql = $this->Conexion->CrearConexion();
                $this->SentenciaSql = "select d.NombreProducto, sum(a.Cantidad) as CantidadProductoVendido,d.PrecioCosto,d.PrecioTope,
                    concat(sum(a.cantidad) * d.PrecioCosto) as TotalPrecioCosto,
                    concat(sum(a.Cantidad) * d.PrecioTope) as TotalPrecioTope, 
                    concat((sum(a.Cantidad) * d.PrecioTope)-(sum(a.cantidad) * d.PrecioCosto)) as GananciaTotal,b.Fecha
                    from detalleventasanrafael1 a, ventasanrafael1 b, inventario c, producto d
                    where b.Codigo = a.idventa and c.Codigo = a.idinventario 
                    and d.Codigo = c.IdProducto and b.Fecha >= '".$FechaInicio."' and b.Fecha <= '".$FechaFin."'
                    group by d.Codigo;";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }finally{
                $this->Conexion->CerrarConexion();
            }
        }

        public function ProductosVendidosFSR($FechaInicio,$FechaFin){
            try{
                $this->ConexionSql = $this->Conexion->CrearConexion();
                $this->SentenciaSql = "select d.NombreProducto, sum(a.Cantidad) as CantidadProductoVendido,d.PrecioCosto,d.PrecioTope,
                    concat(sum(a.cantidad) * d.PrecioCosto) as TotalPrecioCosto,
                    concat(sum(a.Cantidad) * d.PrecioTope) as TotalPrecioTope, 
                    concat((sum(a.Cantidad) * d.PrecioTope)-(sum(a.cantidad) * d.PrecioCosto)) as GananciaTotal
                    from detalleventa a, venta b, inventario c, producto d
                    where b.Codigo = a.idventa and c.Codigo = a.idinventario 
                    and d.Codigo = c.IdProducto and b.Fecha >= '".$FechaInicio."' and b.Fecha <= '".$FechaFin."'
                    group by d.Codigo;";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }finally{
                $this->Conexion->CerrarConexion();
            }
        }

        public function ProductosVendidoFSJ($FechaInicio,$FechaFin){
            try{
                $this->ConexionSql = $this->Conexion->CrearConexion();
                $this->SentenciaSql = "select d.NombreProducto, sum(a.Cantidad) as CantidadProductoVendido,d.PrecioCosto,d.PrecioTope,
                    concat(sum(a.cantidad) * d.PrecioCosto) as TotalPrecioCosto,
                    concat(sum(a.Cantidad) * d.PrecioTope) as TotalPrecioTope, 
                    concat((sum(a.Cantidad) * d.PrecioTope)-(sum(a.cantidad) * d.PrecioCosto)) as GananciaTotal
                    from detalleventasanjuan a, ventasanjuan b, inventario c, producto d
                    where b.Codigo = a.idventa and c.Codigo = a.idinventario 
                    and d.Codigo = c.IdProducto and b.Fecha >= '".$FechaInicio."' and b.Fecha <= '".$FechaFin."'
                    group by d.Codigo;";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }finally{
                $this->Conexion->CerrarConexion();
            }
        }

        public function ProductosSinVender($FechaInicio,$FechaFin){
            try{
                $this->ConexionSql = $this->Conexion->CrearConexion();
                $this->SentenciaSql = "call TempSanRafael1('".$FechaInicio."','".$FechaFin."');";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }finally{
                $this->Conexion->CerrarConexion();
            }
        }

        public function ProductosSinVenderJuan($FechaInicio,$FechaFin){
            try{
                $this->ConexionSql = $this->Conexion->CrearConexion();
                $this->SentenciaSql = "call TempSanJuan('".$FechaInicio."','".$FechaFin."');";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }finally{
                $this->Conexion->CerrarConexion();
            }
        }

        public function ProductosSinVenderRafael($FechaInicio,$FechaFin){
            try{
                $this->ConexionSql = $this->Conexion->CrearConexion();
                $this->SentenciaSql = "call TempSanRafael('".$FechaInicio."','".$FechaFin."');";
                $this->Result = array();
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                return $this->Procedure->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }finally{
                $this->Conexion->CerrarConexion();
            }
        }

        
        //METODO PARA INSERTAR REGISTRO
        public function Insertar ()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL RegistroCardex (?,?,?,?,?,?)";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                
                $this->Procedure->bindParam(1,  $this->getIdUsuario ());
                $this->Procedure->bindParam(2,  $this->getIdInventario ());
                $this->Procedure->bindParam(3,  $this->getCantidad());
                $this->Procedure->bindParam(4,  $this->getTipo());
                $this->Procedure->bindParam(5,  $this->getTotal());
                $this->Procedure->bindParam(6,  $this->getIdSucursal ());
                
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

        
        
        
        //METODO PARA ELIMINAR UNA CATEGORIA
        
        public function Eliminar ()
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "CALL EliminarKardex(?)";
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

        //METODO PARA ANULAR UNA SALIDA DE PRODUCTOS

        public function AnularSalida ($Cod)
        {
            try 
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "UPDATE cardex SET Tipo = '0' WHERE Codigo = '".$Cod."'";
                $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                $this->Procedure->execute();
                print "<script>alert('Salida anulada exitosamente'); </script>";
            } 
            catch (Exception $exc) 
            {
                echo "ERROR AL ANULAR LA SALIDA ".$exc->getMessage();
            }
            finally 
            {
                $this->Conexion->CerrarConexion ();
            }
        }

        //METODO PARA REALIZAR UNA LISTA DE LOS EMPLEADOS

        public function DatosPedido()
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT * FROM pedido WHERE CODIGO = (SELECT MAX(CODIGO) FROM pedido)";
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

        public function Envia()
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT usuario.PrimerNombre, usuario.SegundoNombre, usuario.PrimerApellido,usuario.SegundoApellido, sucursales.Nombre FROM detallepedidoenvia,sucursales,usuario WHERE sucursales.Codigo = detallepedidoenvia.SucursalEnvia and usuario.Codigo = detallepedidoenvia.UsuarioEnvia and detallepedidoenvia.Pedido = (SELECT MAX(CODIGO) FROM pedido)";
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

        public function Recibe()
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT usuario.PrimerNombre, usuario.SegundoNombre, usuario.PrimerApellido,usuario.SegundoApellido, sucursales.Nombre FROM detallerecibe,sucursales,usuario WHERE sucursales.Codigo = detallerecibe.SucursalRecibe and usuario.Codigo = detallerecibe.UsuarioRecibe and detallerecibe.Pedido = (SELECT MAX(CODIGO) FROM pedido)";
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

        public function DetallePedido()
        {  
            try
            {
                $this->ConexionSql = $this->Conexion->CrearConexion ();
                $this->SentenciaSql = "SELECT producto.NombreProducto, producto.CodigoBarra,producto.PrecioVenta, detallepedido.Cantidad,inventario.Codigo FROM inventario,producto,detallepedido,pedido WHERE producto.Codigo = inventario.IdProducto AND inventario.Codigo = detallepedido.IdInventario and detallepedido.Pedido = pedido.Codigo AND pedido.Codigo = (SELECT MAX(CODIGO) FROM pedido)";
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
        
        //METODOS GETTERS AND SETTERS
        
        function getCodigo() {
            return $this->Codigo;
        }

        function getIdUsuario() {
            return $this->IdUsuario;
        }

        function getIdInventario() {
            return $this->IdInventario;
        }

        function getCantidad() {
            return $this->Cantidad;
        }

        function getTipo() {
            return $this->Tipo;
        }

        function getTotal() {
            return $this->Total;
        }

        function getIdSucursal() {
            return $this->IdSucursal;
        }

        function setCodigo($Codigo) {
            $this->Codigo = $Codigo;
        }

        function setIdUsuario($IdUsuario) {
            $this->IdUsuario = $IdUsuario;
        }

        function setIdInventario($IdInventario) {
            $this->IdInventario = $IdInventario;
        }

        function setCantidad($Cantidad) {
            $this->Cantidad = $Cantidad;
        }

        function setTipo($Tipo) {
            $this->Tipo = $Tipo;
        }

        function setTotal($Total) {
            $this->Total = $Total;
        }


        function setIdSucursal($Total) {
            $this->IdSucursal = $Total;
        }


    }
?>