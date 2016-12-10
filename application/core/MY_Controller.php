<?php if (!defined('BASEPATH')) exit('No deseo permitir acceso directo a este script');
Class MY_Controller extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	public function test_controller(){
		return "prueba controlador";
	}
	
}
?>