<?php
class Login extends CI_Controller {

   function index($nombre=null)
   {
		$this->load->helper(array('url','form'));
		if($this->session->userdata('logged_in')){
				redirect('articulos', 'refresh');
		}else{
			  $datos = array (
					'btn_text' => 'Login',
					'msg_text' => 'Not registered?',
					'link_text'=> 'Create an account'
			  );
			  
			  //echo 'Bienvenido a mi primer controlador en CodeIgniter '.$nombre;
			  
			  //$this->load->view('cabecera');
			  //$this->load->view('login',$datos);
			  
			  $datos_plantilla['titulo']='Login...Bienvenido al sitio';
			  $datos_plantilla['cabecera']=$this->load->view('cabecera','',true);
			  $datos_plantilla['cuerpo']=$this->load->view('login',$datos,true);
			  $this->load->view('plantilla_principal',$datos_plantilla);

		}
	
   }
   
}
?>