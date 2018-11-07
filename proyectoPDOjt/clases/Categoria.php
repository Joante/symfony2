<?php
	class Categoria{
	   private $idCategoria;
       private $catNombre;
       
       public function listarCategorias()
       {
        $link = Conexion::conectar();
        $sql = "SELECT idCategoria, catNombre FROM categorias";
        $resultado = $link->query($sql);
        return $listadoCategorias = $resultado->fetchAll();   
       }
       public function verCategoriaPorId($id)
       {
        $link = Conexion::conectar();
        $sql = "SELECT idCategoria, catNombre FROM categorias WHERE idCategoria=".$id;
        $resultado = $link->query($sql);
        return $detalleCategoria= $resultado->fetch();
       }
	   public function getIdCategoria(){
            return $this->idCategoria;
        }
        public function setIdCategoria($idCategoria){
            $this->idCategoria=$idCategoria;
        }
        public function getCatNombre(){
            return $this->CatNombre;
        }
        public function setCatNombre($CatNombre){
            $this->CatNombre=$CatNombre;
        }
}
?>