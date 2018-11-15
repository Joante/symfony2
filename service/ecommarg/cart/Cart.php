<?php 
	namespace ecommarg\cart;
	
	use ecommarg\cart\SaveAdapterInterface as SaveAdapter;
	use ecommarg\cart\ProductInterface as Product;
	use ecommarg\cart\FileAdapter as File;
		
	Class Cart implements CartInterface{
			
		private	$adapters;
		public function __construct (SaveAdapter $session, SaveAdapter $file){
			$this-> adapters = $this->addAdapter($session,$file);
		}
		public function addAdapter(SaveAdapter $session,SaveAdapter $file)
		{
			$adapters = [
						"session" => $session,
						"file" => $file
						];
			return $adapters;
		}
		public function add(Product $producto){
			$id=$producto->getId();
			foreach ( $this-> adapters as $adapter) {	
				$adapter->set(
					$id,
					json_encode($producto)
				);
			}
		}
		public function get($id){
			return $this-> adapters['session']->get($id);
		}
		public function getAll(){
			return $this-> adapters['session']->getAll();
		}
		/*public function replace($array){
			return $this->adapters['session']->replace($array);
		}*/
	}