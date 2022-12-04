<?
	//CLASE MODELO EMPLEADOS

	class Empleados
	{
            //ATRIBUTOS DE LA CLASE

            private $Codigo;
            private $PrimerNombre,$SegundoNombre,$PrimerApellido,$SegundoApellido;
            private $Puesto;
            private $Usuario,$Pasword;
            private $ConexionSql;
            private $Conexion;
            private $SentenciaSql;
            private $Procedure;
            private $Result;

            //CONSTRUCTOR DE LA CLASE

            public function __Construct ()
            {
                $this->Conexion = new ClaseConexion();
            }

            //METODO PARA INSERTAR UN EPLEADO

            public function InsertarEmpleado ()
            {
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "CALL RegistroUsuario(?,?,?,?,?,?,?)";
                    $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                    $this->Procedure->bindParam(1, $this->getPrimerNombre());
                    $this->Procedure->bindParam(2, $this->getSegundoNombre());
                    $this->Procedure->bindParam(3, $this->getPrimerApellido());
                    $this->Procedure->bindParam(4, $this->getSegundoApellido());
                    $this->Procedure->bindParam(5, $this->getPuesto());
                    $this->Procedure->bindParam(6, $this->getUsuario());
                    $this->Procedure->bindParam(7, $this->getPassword());

                    $this->Procedure->execute();
                }
                catch (Exception $e)
                {
                    echo "ERROR AL INSERTAR REGISTRO ".$e->getMessage();
                }
                finally
                {
                    $this->Conexion->CerrarConexion ();
                }
            }

            //METODO QUE SIRVE PARA ACTUALIZAR EMPLEADO

            public function Modificar ()
            {
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "CALL ModificarUsuario(?,?,?,?,?,?,?,?)";
                    $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                    $this->Procedure->bindParam(1, $this->getCodigo());
                    $this->Procedure->bindParam(2, $this->getPrimerNombre());
                    $this->Procedure->bindParam(3, $this->getSegundoNombre());
                    $this->Procedure->bindParam(4, $this->getPrimerApellido());
                    $this->Procedure->bindParam(5, $this->getSegundoApellido());
                    $this->Procedure->bindParam(6, $this->getPuesto());
                    $this->Procedure->bindParam(7, $this->getUsuario());
                    $this->Procedure->bindParam(8, $this->getPassword());
                    
                    $this->Procedure->execute();
                }
                catch (Exception $e)
                {
                    echo "ERROR AL ACTUALIZAR".$e->getMessage();
                }
                finally
                {
                    $this->Conexion->CerrarConexion();
                }
            }

            //METODO PARA ACTUALIZAR PASSWORD

            public function ActualizarPassword()
            {
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "CALL ActualizarPdw(?,?)";
                    $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);
                    $this->Procedure->bindParam(1, $this->getCodigo());
                    $this->Procedure->bindParam(2, $this->getPassword());
                    $this->Procedure->execute();
                }
                catch (Exception $e)
                {
                    echo 'ERROR AL ACTUALIZAR PASSWORD '.$e->getMessage ();
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
                    $this->SentenciaSql = "SELECT Codigo,PrimerNombre,SegundoNombre,PrimerApellido,SegundoApellido,Puesto,Usuario,Contraseña FROM usuario WHERE CONCAT (Codigo,PrimerNombre,SegundoNombre,PrimerApellido,SegundoApellido) LIKE CONCAT('%".$Buscado."%')";
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

            public function Reporte()
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "SELECT Codigo,PrimerNombre,SegundoNombre,PrimerApellido,SegundoApellido,Puesto,Usuario,Contraseña FROM usuario";
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
                    $this->SentenciaSql = "SELECT * FROM usuario WHERE Codigo = ?";
                    $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                    $this->Procedure->execute(array($this->getCodigo()));
                    $row = $this->Procedure->fetch();

                    $this->setCodigo($row['Codigo']);
                    $this->setPrimerNombre ($row['PrimerNombre']);
                    $this->setSegundoNombre ($row['SegundoNombre']);
                    $this->setPrimerApellido ($row['PrimerApellido']);
                    $this->setSegundoApellido ($row['SegundoApellido']);
                    $this->setPuesto ($row['Puesto']);
                    $this->setUsuario ($row['Usuario']);
                    $this->setPassword ($row['Contraseña']);
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

            //METODO PARA OBTENER EL CODIGO

            public function ObtenerCodigo()
            {
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "SELECT MAX(Codigo) AS Codigo FROM usuario";
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


            //METODO PARA ELIMINAR UN REGISTRO

            public function EliminarEmpleado ()
            {
                try 
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion();
                    $this->SentenciaSql = "CALL EliminarUsuario(?)";
                    $this->Procedure = $this->ConexionSql->prepare($this->SentenciaSql);

                    $this->Procedure->bindParam(1, $this->getCodigo());

                    $this->Procedure->execute ();	
                } 
                catch (Exception $e) 
                {
                    echo "ERROR AL ELIMINAR REGISTRO".$e->getMessage();	
                }
                finally
                {
                    $this->Conexion->CerrarConexion ();
                }
            }


            //METODO PARA REALIZAR UNA LISTA DE LOS EMPLEADOS

            public function ListarBusqueda($Buscado)
            {  
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "SELECT PrimerNombre,SegundoNombre,PrimerApellido,SegundoApellido,Puesto FROM usuario WHERE CONCAT (PrimerNombre,SegundoNombre,PrimerApellido,
                        SegundoApellido) LIKE CONCAT('%".$Buscado."%')";
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

            //METODO PARA VALIDAR SI EL USUARIO HA SIDO REGISTRADO PREVIAMENTE O ES NUEVO

            public function VerificaExiste ($Var)
            {
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "SELECT Usuario FROM usuario WHERE Usuario = '".$Var."'";
                    $this->Procedure = $this->ConexionSql->prepare ($this->SentenciaSql);
                    $this->Procedure->execute ();
                    $row = $this->Procedure->fetch ();

                    if ($row['Usuario'] == "")
                    {
                        $this->InsertarEmpleado ();
                        print "<script>
                        window.location='index.php?view=Users'; 
                        alert('Registro Exitoso');
                        </script>";
                    }
                    else
                    {
                        print "<script>
                        window.location='index.php?view=Users'; 
                        alert('Error al registrar el nombre de Usuario proporcionado ya existe..!');
                        </script>";
                    }
                }
                catch (Exception $e)
                {
                    echo "Error al validar Usuario".$e->getMessage ();
                }
                finally
                {
                    $this->Conexion->CerrarConexion ();
                }
            }


            //metodo para Verificar el Codigo
             public function ValidarCodigo1($Codigo)
            {
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "SELECT * FROM usuario WHERE Codigo = '".$Codigo."'";
                    $this->Procedure = $this->ConexionSql->prepare ($this->SentenciaSql);
                    $this->Procedure->execute ();
                    $row = $this->Procedure->fetch ();

                    $CodigoUsuario = $row['Codigo'];

                    if ($Codigo == $CodigoUsuario)
                    {
                        print "<script>
                        window.location='index.php?view=SistemaCajaFSR1'; 
                        alert('Codigo Correcto');
                        </script>";
        
                       
                    }
                    else
                    {
                        print "<script>
                            window.location='index.php?view=SistemaCajaFSR1'; 
                            alert('Error verifica tu Codigo');
                            </script>";
                    }

                }
                catch (Exception $e)
                {
                    echo "error".$e->getMessage ();
                }
                finally
                {
                    $this->Conexion->CerrarConexion ();
                }
            }

           
            //METODO PARA VALIDAR EL INICIO DE SECION

            public function ValidarUsuario ($Sucursal,$User,$Contrasena)
            {
                try
                {
                    $this->ConexionSql = $this->Conexion->CrearConexion ();
                    $this->SentenciaSql = "SELECT * FROM usuario WHERE usuario = '".$User."'";
                    $this->Procedure = $this->ConexionSql->prepare ($this->SentenciaSql);
                    $this->Procedure->execute ();
                    $row = $this->Procedure->fetch ();

                    $CodigoUsuario = $row['Codigo'];
                    $PrimerName = $row['PrimerNombre'];
                    $SegundoName = $row['SegundoNombre'];
                    $PrimerApp = $row['PrimerApellido'];
                    $SegundoApp = $row['SegundoApellido'];


                    $UsuarioObtenito = $row['Usuario'];
                    $PassObtenido = $row['Contraseña'];
                    $Pue = $row['Puesto'];
                    $SucursalObtenido = $Sucursal;

                    if (($Sucursal == $SucursalObtenido) and ($User == $UsuarioObtenito) and ($Contrasena == $PassObtenido))
                    {
                        if ($row['Puesto'] == 'Administrador' and $SucursalObtenido == 'Admin')
                        {
                            session_start(); 

                            $_SESSION["CodigoUs"] = $CodigoUsuario;
                            $_SESSION["Pass"] = $PassObtenido;
                            $_SESSION["NombreUsuario"] = $UsuarioObtenito;
                            $_SESSION['PuestoUsuario'] = $Pue;
                            $_SESSION['Admin'] = $SucursalObtenido;
                            $_SESSION['NameComplete'] = $PrimerName." ".$SegundoName." ".$PrimerApp." ".$SegundoApp;
                            $_SESSION['CodigoUser'] = $CodigoUsuario;
                            print "<script>
                            window.location='index.php?view=Menu'; 
                            alert('Bienvenido al Sistema');
                            </script>";
                        }
                       

                         if ($row['Puesto'] == 'Dependiente' and $SucursalObtenido == 'SanJuan')
                        {
                            session_start(); 

                            $_SESSION["NombreUsuario"] = $UsuarioObtenito;
                            $_SESSION['PuestoUsuario'] = $Pue; 
                            $_SESSION['SanJuan'] = $SucursalObtenido;
                            $_SESSION['NameComplete'] = $PrimerName." ".$SegundoName." ".$PrimerApp." ".$SegundoApp;
                            $_SESSION['CodigoUser'] = $CodigoUsuario;
                            $_SESSION["CodigoUs"] = $CodigoUsuario;

                            print "<script>
                            window.location='index.php?view=Menu'; 
                            alert('Bienvenido al Sistema');
                            </script>";
                        }

                         if ($row['Puesto'] == 'Dependiente' and $SucursalObtenido == 'SanRafael')
                        {
                            session_start(); 

                            $_SESSION["NombreUsuario"] = $UsuarioObtenito;
                            $_SESSION['PuestoUsuario'] = $Pue; 
                            $_SESSION['SanRafael'] = $SucursalObtenido;
                            $_SESSION['NameComplete'] = $PrimerName." ".$SegundoName." ".$PrimerApp." ".$SegundoApp;
                            $_SESSION['CodigoUser'] = $CodigoUsuario;
                            $_SESSION["CodigoUs"] = $CodigoUsuario;

                            print "<script>
                            window.location='index.php?view=Menu'; 
                            alert('Bienvenido al Sistema');
                            </script>";
                        }


                         if ($row['Puesto'] == 'Dependiente' and $SucursalObtenido == 'SanRafael1')
                        {
                            session_start(); 

                            $_SESSION["NombreUsuario"] = $UsuarioObtenito;
                            $_SESSION['PuestoUsuario'] = $Pue; 
                            $_SESSION['SanRafael1'] = $SucursalObtenido;
                            $_SESSION['NameComplete'] = $PrimerName." ".$SegundoName." ".$PrimerApp." ".$SegundoApp;
                            $_SESSION['CodigoUser'] = $CodigoUsuario;
                             $_SESSION["CodigoUs"] = $CodigoUsuario;

                            print "<script>
                            window.location='index.php?view=Menu'; 
                            alert('Bienvenido al Sistema');
                            </script>";
                        }


                         if ($row['Puesto'] == 'Caja' and $SucursalObtenido == 'SanRafael1')
                        {
                            session_start(); 

                            $_SESSION["NombreUsuario"] = $UsuarioObtenito;
                            $_SESSION['PuestoUsuario'] = $Pue; 
                            $_SESSION['SanRafael1'] = $SucursalObtenido;
                            $_SESSION['NameComplete'] = $PrimerName." ".$SegundoName." ".$PrimerApp." ".$SegundoApp;
                            $_SESSION['CodigoUser'] = $CodigoUsuario;
                             $_SESSION["CodigoUs"] = $CodigoUsuario;

                            print "<script>
                            window.location='index.php?view=Menu'; 
                            alert('Bienvenido al Sistema');
                            </script>";
                        }

                        if ($row['Puesto'] == 'Caja' and $SucursalObtenido == 'SanJuan')
                        {
                            session_start(); 

                            $_SESSION["NombreUsuario"] = $UsuarioObtenito;
                            $_SESSION['PuestoUsuario'] = $Pue; 
                            $_SESSION['SanRafael1'] = $SucursalObtenido;
                            $_SESSION['NameComplete'] = $PrimerName." ".$SegundoName." ".$PrimerApp." ".$SegundoApp;
                            $_SESSION['CodigoUser'] = $CodigoUsuario;
                             $_SESSION["CodigoUs"] = $CodigoUsuario;

                            print "<script>
                            window.location='index.php?view=Menu'; 
                            alert('Bienvenido al Sistema');
                            </script>";
                        }

                        if ($row['Puesto'] == 'Caja' and $SucursalObtenido == 'SanRafael')
                        {
                            session_start(); 

                            $_SESSION["NombreUsuario"] = $UsuarioObtenito;
                            $_SESSION['PuestoUsuario'] = $Pue; 
                            $_SESSION['SanRafael1'] = $SucursalObtenido;
                            $_SESSION['NameComplete'] = $PrimerName." ".$SegundoName." ".$PrimerApp." ".$SegundoApp;
                            $_SESSION['CodigoUser'] = $CodigoUsuario;
                             $_SESSION["CodigoUs"] = $CodigoUsuario;

                            print "<script>
                            window.location='index.php?view=Menu'; 
                            alert('Bienvenido al Sistema');
                            </script>";
                        }


                         if ($row['Puesto'] == 'Dependiente' and $SucursalObtenido == 'Clinica')
                        {
                            session_start(); 

                            $_SESSION["NombreUsuario"] = $UsuarioObtenito;
                            $_SESSION['PuestoUsuario'] = $Pue; 
                            $_SESSION['Clinica'] = $SucursalObtenido;
                            $_SESSION['NameComplete'] = $PrimerName." ".$SegundoName." ".$PrimerApp." ".$SegundoApp;
                            $_SESSION['CodigoUser'] = $CodigoUsuario;
                             $_SESSION["CodigoUs"] = $CodigoUsuario;

                            print "<script>
                            window.location='index.php?view=Menu'; 
                            alert('Bienvenido al Sistema');
                            </script>";
                        }


                        if ($row['Puesto'] == 'Digitador')
                        {
                            session_start(); 

                            $_SESSION["NombreUsuario"] = $UsuarioObtenito;
                            $_SESSION['PuestoUsuario'] = $Pue;
                            $_SESSION['NameComplete'] = $PrimerName." ".$SegundoName." ".$PrimerApp." ".$SegundoApp;
                            $_SESSION['CodigoUser'] = $CodigoUsuario;
                             $_SESSION["CodigoUs"] = $CodigoUsuario;

                            print "<script>
                            window.location='index.php?view=Menu'; 
                            alert('Bienvenido al Sistema');
                            </script>";
                        }
                    }
                    else
                    {
                        print "<script>
                            window.location='index.php?view=Loguin123'; 
                            alert('Error verifica tu Usuario o Contraseña');
                            </script>";
                    }

                }
                catch (Exception $e)
                {
                    echo "error".$e->getMessage ();
                }
                finally
                {
                    $this->Conexion->CerrarConexion ();
                }
            }

            //METODOS GETTERS Y SETTERS SOBRE TODOS LOS ATRIBUTOS

            public function setCodigo ($NewCodigo)
            {
                    $this->Codigo = $NewCodigo;
            }

            public function getCodigo()
            {
                    return $this->Codigo;
            }

            public function setPrimerNombre ($NewPrimerNombre)
            {
                    $this->PrimerNombre = $NewPrimerNombre;
            }

            public function getPrimerNombre ()
            {
                    return $this->PrimerNombre;
            }

            public function setSegundoNombre ($NewSegundoNombre)
            {
                    $this->SegundoNombre = $NewSegundoNombre;
            }

            public function getSegundoNombre ()
            {
                    return $this->SegundoNombre;
            }

            public function setPrimerApellido ($NewPrimerApellido)
            {
                    $this->PrimerApellido = $NewPrimerApellido;
            }

            public function getPrimerApellido ()
            {
                    return $this->PrimerApellido;
            }

            public function setSegundoApellido ($NewSegundoApellido)
            {
                    $this->SegundoApellido = $NewSegundoApellido;
            }

            public function getSegundoApellido ()
            {
                    return $this->SegundoApellido;
            }

            public function setPuesto ($NewPuesto)
            {
                    $this->Puesto = $NewPuesto;
            }

            public function getPuesto ()
            {
                    return $this->Puesto;
            }

            public function setUsuario ($NewUsuario)
            {
                    $this->Usuario = $NewUsuario;
            }

            public function getUsuario ()
            {
                    return $this->Usuario;
            }

            public function setPassword ($NewPasword)
            {
                    $this->Pasword = $NewPasword;
            }

            public function getPassword ()
            {
                    return $this->Pasword;
            }

            //FIN DE LA LOGICA
	}
?>