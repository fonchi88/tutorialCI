<?php

class Controla_prueba extends CI_Controller {

	function index(){
		
		$this->load->library('email');
		echo $this->email->prueba();;
	}
}

?>