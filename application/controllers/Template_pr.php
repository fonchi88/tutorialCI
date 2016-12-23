<?php
class Template_pr extends MY_Controller{		
	function index(){		
		$this->load->helper('url');
		$this->load->view('template_pr');		
		//echo 'hola';	
	}		
}
?>