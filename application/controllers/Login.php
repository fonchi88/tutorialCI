<?php
class Login extends MY_Controller {

   function index($nombre=null)
   {
		
		$this->load->helper(array('url','form'));
		if($this->session->userdata('logged_in')){
				$this->load->library('maneja_vistas');
				$this->maneja_vistas->lista_articulos();
		}else{
			$this->load->library('maneja_vistas');
			$this->maneja_vistas->muestra_login();	
		}
		

		//echo $this->test_controller();
   }
   
}
?>