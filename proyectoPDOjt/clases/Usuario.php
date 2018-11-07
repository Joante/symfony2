<?php
	class Usuario
	{

		private $idUsuario;
		private $usuNombre;
		private $usuApellido;
		private $usuEmail;
		private $usuPass;
		private $usuEstado;

		public function login()
		{
			$usuEmail = $_POST['usuEmail'];
			$usuPass = $_POST['usuPass'];
			$link = Conexion::conectar();
			$sql = "SELECT usuNombre, usuApellido FROM usuarios
						WHERE usuEmail = :usuEmail
						 AND usuPass = :usuPass";
			$stmt = $link->prepare($sql);
			$stmt -> bindParam(':usuEmail', $usuEmail, PDO::PARAM_STR);
			$stmt -> bindParam(':usuPass', $usuPass, PDO::PARAM_STR);
			$stmt -> execute();
            $detalleUsuario = $stmt->fetch();
           if($stmt->rowCount()==0){
				header('location: formLogin.php?error=1');
			}else{

				//RUTINA DE AUTENTICACION
				$_SESSION['login']=1;
                $_SESSION['usuNombre']=$detalleUsuario['usuNombre'];
                $_SESSION['usuApellido']=$detalleUsuario['usuApellido'];
				//redireccion
				
				header('location: admin.php');

			}
		}
		public function logout(){
			session_destroy();
			header('refresh: 3; url=formLogin.php');
		}
		public function editarUsuario(){

		}
		public function cargarDatosDesdeElForm(){

		}
		public function agregarUsuario(){

		}
		public function getIdUsuarioUsuNombre()
        {
            return $this->idUsuarioUsuNombre;
        }
        public function setIdUsuarioUsuNombre($idUsuarioUsuNombre)
        {
            $this->idUsuarioUsuNombre = $idUsuarioUsuNombre;
        }
        public function getUsuNombre()
        {
            return $this->usuNombre;
        }
        public function setUsuNombre($UsuNombre)
        {
            $this->usuNombre = $usuNombre;
        }

        public function getUsuApellido()
        {
            return $this->usuApellido;
        }
        public function setUsuApellido($usuApellido)
        {
            $this->usuApellido = $usuApellido;
        }
        public function getUsuEmail()
        {
            return $this->usuEmail;
        }
        public function setUsuEmail($UsuEmail)
        {
            $this->usuEmail = $usuEmail;
        }

        public function getUsuPass()
        {
            return $this->usuPass;
        }
        public function setUsuPass($usuPass)
        {
            $this->usuPass = $usuPass;
        }
        public function getUsuEstado()
        {
            return $this->usuEstado;
        }
        public function setUsuEstado($usuEstado)
        {
            $this->usuEstado = $usuEstado;
        }
	}