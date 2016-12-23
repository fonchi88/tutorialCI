<?php 
class Valida_usuario extends CI_Controller {
   
   function index()
   {	
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
        if ($this->form_validation->run() == FALSE)
        {
			$this->load->library('maneja_vistas');
			$this->maneja_vistas->muestra_login();			  
        }
        else
        {
            $this->validaSesion();
        }
   }
   
   function validaSesion(){
		$this->load->model('Valid_user');
		$this->load->helper(array('url','form'));
		$nombre=$_POST['username'];
		$pass=$_POST['password'];
		
		$usuarioValido = $this->Valid_user->login($nombre,$pass);
		if($usuarioValido==1){
			$sess_array = array(
				'id' => $nombre,
				'username' => $pass
			);
			$this->session->set_userdata('logged_in', $sess_array);
			$this->load->library('maneja_vistas');
			$this->maneja_vistas->lista_articulos();			
		}else{

			$this->load->library('maneja_vistas');
			$this->maneja_vistas->muestra_login();
		}
   }
}
?>