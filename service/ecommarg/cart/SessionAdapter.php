<?php

	namespace ecommarg\cart;
	use Symfony\Component\HttpFoundation\Session\SessionInterface as Session;
	/**
	* 
	*/
	class SessionAdapter implements SaveAdapterInterface
	{
		private $session;
		public function __construct(Session $session)
		{
			$this->session=$session; 
		}
		public function set($key,$value)
		{
			$this -> session->set($key,$value);
		}
		public function get($id)
		{
			return $this->session->get($id);
		}
	}