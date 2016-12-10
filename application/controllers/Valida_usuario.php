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
		//echo $nombre."<br>";
		//echo $pass;
		
		$usuarioValido = $this->Valid_user->login($nombre,$pass);
		if($usuarioValido==1){
			$sess_array = array(
				'id' => $nombre,
				'username' => $pass
			);
			$this->session->set_userdata('logged_in', $sess_array);

			//redirect('articulos', 'refresh');
						
		  
			//cargo el modelo de artículos
			$this->load->model('Articulos_model');
		  
			//pido los ultimos artículos al modelo
			$ultimosArticulos = $this->Articulos_model->dame_ultimos_articulos();
			//print_r($ultimosArticulos);
			//creo el array con datos de configuración para la vista
			$datos_vista = array('rs_articulos' => $ultimosArticulos);
		  
			//print_r($datos_vista);
			//cargo la vista pasando los datos de configuacion
			//$this->load->view('cabecera');
			//$this->load->view('articulos', $datos_vista);
		  
			$datos_plantilla['titulo']='Catalogo de articulos...Bienvenido al sitio';
			$datos_plantilla['cabecera']=$this->load->view('cabecera','',true);
			$datos_plantilla['cuerpo']=$this->load->view('articulos', $datos_vista,true);
			$this->load->view('plantilla_principal',$datos_plantilla);
			
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