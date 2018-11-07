<?php

	session_start();
	//autoloader
	spl_autoload_register(function($clase){
		require_once 'clases/'.$clase.'.php';
	});

	/*
		function miAutocarga($clase){
			require_once 'clase/'.$clase.'.php';
		}
		spl_autoload_register('miAutocarga');
	*/
  ?>