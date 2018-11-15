<?php 
		namespace ecommarg\cart;
		use ecommarg\cart\ProductInterface as Product;
	
	Interface CartInterface
	{
		
		public function add(Product $p,$quantity=1);
		public function get($id);
		public function getAll();
		//public function replace($array);
	}