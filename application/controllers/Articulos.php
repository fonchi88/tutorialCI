<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Articulos extends CI_Controller {
   function index(){
      //cargo el helper de url, con funciones para trabajo con URL del sitio
      $this->load->helper('url');
	  if($this->session->userdata('logged_in')){
		  $this->load->library('maneja_vistas');
		  $this->maneja_vistas->lista_articulos();
		}else{
			redirect('login', 'refresh');
		}  
   }
   
    function logout()
	 {
	   $this->load->helper('url');
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('login', 'refresh');
	   
	 }
	 
	 function muestra($id=0){
		  $this->load->library('maneja_vistas');
		  $this->maneja_vistas->detalle_articulo($id);			
	 }
}
?>