<?php 
	namespace ecommarg\cart;
	
	use ecommarg\cart\SaveAdapterInterface as SaveAdapter;
	use ecommarg\cart\ProductInterface as Product;
	use ecommarg\cart\FileAdapter as File;
		
	Class Cart implements CartInterface{
			
		private	$adapters;
		public function __construct (SaveAdapter $session){
			$this-> adapters = $this->addAdapter($session);
		}
		public function addAdapter(SaveAdapter $session)
		{
			$adapters = [
						"session" => $session
						];
			return $adapters;
		}
		public function add(Product $producto,  $quantity = 1){
			$quantity=(int)$quantity;
			if($quantity<=0)
			{
				throw new \Exception("Cantidad invalida");
				
			}
			$id=$producto->getId();
			foreach ( $this-> adapters as $adapter) {	
				$adapter->set(
					$id,
					json_encode(
								[
								  'quantity' => $quantity,
								  'producto' => $producto
								])
				);
			}
		}
		public function get($id){

			return $this-> adapters['session']->get($id);
		}
		public function getAll(){
			$all = $this-> adapters['session']->getAll();
			foreach ($all as &$item) {
				$item = json_decode(($item));
			}
			return $all; 
		}
		/*public function replace($array){
			return $this->adapters['session']->replace($array);
		}*/
	}