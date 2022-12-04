<?
	class Logueo
	{
		//ATRIBUTOS DE LA CLASE

		private $Conexion;
		private $ConexionSql;
		private $Usuario,$Contraseña,$Pass;
		private $Procedure;

		//CONSTRUCTOR DE LA CLASE

		public function __Construct ()
		{
			$this->Conexion = new ClaseConexion ();
		} 

		//METODO PARA VERIFICAR SI EL USUARIO EXISTE

		public function CheckLoguin ()
		{
			try
			{
				$this->ConexionSql = $this->Conexion->CrearConexion ();
				$this->SentenciaSql = "SELECT Usuario,Contraseña FROM empleado WHERE Usuario = ?";
				$this->Procedure = $this->ConexionSql->prepare ($this->SentenciaSql);
				$this->Procedure->execute(array($this->getCodigo()));
                $row = $this->Procedure->fetch();

                $this->setUsuario ($row['Usuario']);
                $this->setContraseña ($row['Pass']);

                if(pasword_verify ($this->getPass()) == $this->getContraseña())
                {
                	$_SESSION['loggedin'] = true;
					$_SESSION['name'] = $row['Usuario'];
					$_SESSION['start'] = time();
					$_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ;
                }
			}
			catch (Exception $e)
			{
				echo "error".$e->getMessage();
			}
			finally
			{
				$this->Conexion->CerrarConexion ();
			}
		}

		//METODO PARA CERRAR CECION

		public function CerrarSesion ()
		{
			try
			{
				session_start();
				session_unset($_SESSION['Usuario']);
				session_destroy();

				//header('Location: ../PHPLogin/');
			}
			catch (Exception $e)
			{
				echo "error".$e->getMessage ();
			}
		}

		//METODO GET

		public function getUsuario ()
		{
			return $this->Usuario;
		}

		public function getContraseña ()
		{
			return $this->Contraseña;
		}

		public function setUsuario ($Usuario)
		{
			$this->Usuario = $Usuario;
		}

		public function setContraseña ($Contraseña)
		{
			$this->Contraseña = $Contraseña;
		}

		public function setPass ($Contraseña)
		{
			$this->Pass = $Contraseña;
		}

		public function getContraseña ()
		{
			return $this->Pass;
		}
	}
?>