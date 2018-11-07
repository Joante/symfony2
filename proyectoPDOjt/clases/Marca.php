<?php

    class Marca{
        
        private $idMarca;
        private $mkNombre;
        
        public function listarMarcas(){
            
            $link = Conexion::conectar();
            $sql = "SELECT idMarca, mkNombre FROM marcas";
            $resultado = $link->query($sql);
            $listadoMarcas = $resultado->fetchAll();
            return $listadoMarcas;    
        }
        public function verMarcaPorId($id){
            $link = Conexion::conectar();
            $sql = "SELECT idMarca, mkNombre FROM marcas WHERE idMarca=".$id;
            $resultado = $link->query($sql);
            return $detalleMarca = $resultado->fetch();
        }
        public function cargarDatosDesdeForm()
        {
            if(isset($_POST['idMarca'])){
                $this->setIdMarca($_POST['idMarca']);
            }
            if (isset($_POST['mkNombre'])) {
                $this->setMkNombre($_POST['mkNombre']);
            }
        }

        public function agregarMarca(){
            $this->cargarDatosDesdeForm();
            $link = Conexion::conectar();
            $sql = "INSERT INTO marcas
                        (mkNombre)
                        VALUES(:mkNombre)";
            $stmt = $link->prepare($sql);
            $mkNombre = $this->getMkNombre();
            $stmt->bindParam(':mkNombre', $mkNombre, PDO::PARAM_STR);
            if($stmt->execute()){
                $this->setIdMarca($link->last_insert_id());
                return true;
            }
            return false;
        }
        
        
        public function getIdMarca(){
            return $this->idMarca;
        }
        public function setIdMarca($idMarca){
            $this->idMarca=$idMarca;
        }
        public function getMkNombre(){
            return $this->mkNombre;
        }
        public function setMkNombre($mkNombre){
            $this->mkNombre=$mkNombre;
        }
    }