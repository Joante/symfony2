<?php
	class Producto{
	   private $idProducto;
       private $prdPrecio;
       private $prdNombre;
       private $idMarca;
       private $idCategoria;
       private $prdPresentacion;
       private $prdStock;
       private $prdImagen;
       
       public function listarProductos(){
            
            $link = Conexion::conectar();
            $sql = "SELECT idProducto, prdPrecio, prdNombre, mkNombre, catNombre, prdPresentacion, prdStock, prdImagen FROM productos INNER JOIN marcas,categorias WHERE productos.idCategoria=categorias.idCategoria AND productos.idMarca = marcas.idMarca";
            $resultado = $link->query($sql);
            $listadoProductos = $resultado->fetchAll();
            return $listadoProductos;    
        }
        public function verProductoPorId($id){
            $link = Conexion::conectar();
            $sql = "SELECT idProducto, prdPrecio, prdNombre, mkNombre,productos.idMarca, catNombre, productos.idCategoria, prdPresentacion, prdStock, prdImagen FROM productos INNER JOIN marcas,categorias WHERE productos.idCategoria=categorias.idCategoria AND productos.idMarca = marcas.idMarca AND idProducto=:idProducto"; 
            $stmt = $link->prepare($sql);
            $stmt -> bindParam(':idProducto', $id, PDO::PARAM_INT);
            $stmt -> execute();
            return $stmt -> fetch();
        }
        public function cargarDatosDesdeForm(){

            if(isset($_POST['idProducto'])){
                $this -> setIdProducto($_POST['idProducto']);
            }
            if(isset($_POST['prdPrecio'])){
                $this -> setPrdPrecio($_POST['prdPrecio']);
            }
            if(isset($_POST['prdNombre'])){
                $this -> setPrdNombre($_POST['prdNombre']);
            }
            if(isset($_POST['idMarca'])){
                $this -> setIdMarca($_POST['idMarca']);
            }
            if(isset($_POST['idCategoria'])){
                $this -> setIdCategoria($_POST['idCategoria']);
            }
            if(isset($_POST['prdPresentacion'])){
                $this -> setPrdPresentacion($_POST['prdPresentacion']);
            }
            if(isset($_POST['prdStock'])){
                $this -> setPrdStock($_POST['prdStock']);
            }
            $this -> setPrdImagen($this -> subirImagen());
        }
        public function subirImagen(){

            $prdImagen = 'noDisponible.jpg';
            if(isset ($_POST['prdImagenOriginal'])){
                $prdImagen = $_POST['prdImagenOriginal'];
            }
            $ruta = 'images/productos/';
            if($_FILES['prdImagen']['error'] == 0){
                $prdImagenTMP = $_FILES['prdImagen']['tmp_name'];
                $prdImagen = $_FILES['prdImagen']['name'];
                move_uploaded_file($prdImagenTMP, $ruta.$prdImagen);
            }
            return $prdImagen;
        }
        public function agregarProducto(){
           $this->cargarDatosDesdeForm();
            $link = Conexion::conectar();
            $sql = "INSERT INTO productos
                        (prdNombre,prdPrecio,idMarca,idCategoria,prdPresentacion,prdStock,prdImagen)
                        VALUES(:prdNombre,:prdPrecio,:idMarca,:idCategoria,:prdPresentacion,:prdStock,:prdImagen)";
            $stmt = $link -> prepare($sql);
            $prdNombre = $this -> getPrdNombre();
            $prdPrecio = $this -> getPrdPrecio();
            $idMarca = $this -> getIdMarca();
            $idCategoria = $this -> getIdCategoria();
            $prdPresentacion = $this -> getPrdPresentacion();
            $prdStock = $this -> getPrdStock();
            $prdImagen = $this -> getPrdImagen();
            $stmt->bindParam(':prdNombre', $prdNombre, PDO::PARAM_STR);
            $stmt->bindParam(':prdPrecio', $prdPrecio, PDO::PARAM_INT);
            $stmt->bindParam(':idMarca', $idMarca, PDO::PARAM_INT);
            $stmt->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
            $stmt->bindParam(':prdPresentacion', $prdPresentacion, PDO::PARAM_STR);
            $stmt->bindParam(':prdStock', $prdStock, PDO::PARAM_INT);
            $stmt->bindParam(':prdImagen', $prdImagen, PDO::PARAM_STR);
           if($stmt->execute()){
                 $this->setIdProducto($link->lastInsertId());
                 return true;
            }
            return false;
        }
        public function editarProducto(){
            $this -> cargarDatosDesdeForm();
            $link = Conexion::conectar();
            $sql = "UPDATE productos
                        SET prdNombre=:prdNombre,
                        prdPrecio=:prdPrecio,
                        idMarca=:idMarca,
                        idCategoria=:idCategoria,
                        prdPresentacion=:prdPresentacion,
                        prdStock=:prdStock,
                        prdImagen=:prdImagen
                        WHERE idProducto=:idProducto";
            $stmt = $link -> prepare($sql);
            $prdNombre = $this -> getPrdNombre();
            $prdPrecio = $this -> getPrdPrecio();
            $idMarca = $this -> getIdMarca();
            $idCategoria = $this -> getIdCategoria();
            $prdPresentacion = $this -> getPrdPresentacion();
            $prdStock = $this -> getPrdStock();
            $prdImagen = $this -> getPrdImagen();
            $idProducto = $this -> getIdProducto();
            $stmt->bindParam(':prdNombre', $prdNombre, PDO::PARAM_STR);
            $stmt->bindParam(':prdPrecio', $prdPrecio, PDO::PARAM_INT);
            $stmt->bindParam(':idMarca', $idMarca, PDO::PARAM_INT);
            $stmt->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
            $stmt->bindParam(':prdPresentacion', $prdPresentacion, PDO::PARAM_STR);
            $stmt->bindParam(':prdStock', $prdStock, PDO::PARAM_INT);
            $stmt->bindParam(':prdImagen', $prdImagen, PDO::PARAM_STR);
            $stmt->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
            $stmt->execute();
            return $chequeo = $stmt -> rowCount();
        }
        public function getIdProducto()
        {
            return $this->idProducto;
        }
        public function setIdProducto($idProducto)
        {
            $this->idProducto = $idProducto;
        }

        public function getPrdNombre()
        {
            return $this->prdNombre;
        }
        public function setPrdNombre($prdNombre)
        {
            $this->prdNombre = $prdNombre;
        }

        public function getPrdPrecio()
        {
            return $this->prdPrecio;
        }
        public function setPrdPrecio($prdPrecio)
        {
            $this->prdPrecio = $prdPrecio;
        }

        public function getIdMarca()
        {
            return $this->idMarca;
        }
        public function setIdMarca($idMarca)
        {
            $this->idMarca = $idMarca;
        }

        public function getIdCategoria()
        {
            return $this->idCategoria;
        }
        public function setIdCategoria($idCategoria)
        {
            $this->idCategoria = $idCategoria;
        }

        public function getPrdPresentacion()
        {
            return $this->prdPresentacion;
        }
        public function setPrdPresentacion($prdPresentacion)
        {
            $this->prdPresentacion = $prdPresentacion;
        }

        public function getPrdStock()
        {
            return $this->prdStock;
        }

        public function setPrdStock($prdStock)
        {
            $this->prdStock = $prdStock;
        }

        public function getPrdImagen()
        {
            return $this->prdImagen;
        }
        public function setPrdImagen($prdImagen)
        {
            $this->prdImagen = $prdImagen;
        }
	
}
?>