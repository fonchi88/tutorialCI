<?php

class MY_Email extends CI_Email{
	function MY_Email(){
		parent::__construct();
	}
	
	function prueba(){
		return 'hola';
	}
}

?>